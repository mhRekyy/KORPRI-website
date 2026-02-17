<?= $this->extend('layout/main_inner') ?>
<?= $this->section('content') ?>

<link rel="stylesheet" href="<?= base_url('assets/css/pages/struktur.css') ?>">


<section class="page-wrap">
<div class="page-container">
  <!-- Watermark Background -->
  <div class="watermark-bg"></div>

<?php
/* ===================
   HELPER CARD 
====================== */
function renderCard($title, $subtitle, $image, $variant = 'small', $nodeId = null, $parentId = null) {
  $titleEsc = htmlspecialchars($title, ENT_QUOTES, 'UTF-8');
  $subEsc   = htmlspecialchars($subtitle, ENT_QUOTES, 'UTF-8');
  $imgEsc   = htmlspecialchars($image, ENT_QUOTES, 'UTF-8');

  $cls = $variant === 'big' ? 'card card--big' : 'card card--small';
?>
  <div class="<?= $cls ?>"
       <?= $nodeId ? 'data-node="'.htmlspecialchars($nodeId, ENT_QUOTES, "UTF-8").'"' : '' ?>
       <?= $parentId ? 'data-parent="'.htmlspecialchars($parentId, ENT_QUOTES, "UTF-8").'"' : '' ?>>
    <div class="card__top">
      <div class="card__avatar">
        <img src="<?= $imgEsc ?>" alt="<?= $titleEsc ?>">
      </div>
    </div>
    <div class="card__body">
      <div class="card__title"><?= $titleEsc ?></div>
      <div class="card__sub"><?= nl2br($subEsc) ?></div>
    </div>
  </div>
<?php } ?>

<?php
/* ===================
   HELPER ICON 
====================== */
function getIconByJabatan(string $jabatan): string
{
  $map = [
    'Organisasi'    => 'icon_organisasi.png',
    'Perlindungan'  => 'icon_hukum.png',
    'Usaha'         => 'icon_usaha.png',
    'Keagamaan'     => 'icon_agama.png',
    'Olahraga'      => 'icon_olahraga.png',
    'Disiplin'      => 'icon_disiplin.png',
    'Sekretariat'   => 'icon_sekretariat.png',
    'Pengabdian'    => 'icon_masyarakat.png',
  ];

  foreach ($map as $key => $icon) {
    if (stripos($jabatan, $key) !== false) {
      return base_url('assets/img/' . $icon);
    }
  }

  return base_url('assets/img/avatar.png');
}
?>

<?php
  // wakil II = index 1 sesuai view kamu sekarang
  $wk2 = $wakil[1] ?? null;
  $wk2IdNode = $wk2 ? ('wk-' . $wk2['id']) : null;
?>

<div class="chart" id="orgChart" <?= $wk2IdNode ? 'data-wakil2="'.$wk2IdNode.'"' : '' ?>>

  <!-- SVG overlay untuk menggambar konektor -->
  <svg class="chart__svg" id="chartSvg" aria-hidden="true"></svg>

  <!-- ================= LEVEL 1 : KETUA ================= -->
  <div class="row row--ketua">
    <div class="col">
    <?php
      renderCard(
        $ketua['jabatan'],
        $ketua['nama'],
        base_url('assets/img/avatar.png'),
        'small',
        'ketua',
        null
      );
    ?>
  </div>
  </div>

  <!-- ================= LEVEL 2 : WAKIL ================= -->
  <div class="row row--wakil">
    <div class="grid grid--4">
      <?php foreach ($wakil as $i => $wk): ?>
        <div class="col col--<?= $i + 1 ?>">
          <?php
            renderCard(
              $wk['jabatan'],
              $wk['nama'],
              base_url('assets/img/avatar.png'),
              'small',
              'wk-' . $wk['id'],
              'ketua'
            );
          ?>
        </div>
      <?php endforeach; ?>
    </div>
  </div>

  <!-- ================= LEVEL 3 : 1 ANAK TIAP WAKIL ================= -->
  <div class="row row--l3">
    <div class="grid grid--4">
      <?php for ($i = 0; $i < 4; $i++): ?>
        <div class="col col--<?= $i + 1 ?>">
          <?php
            $wk = $wakil[$i] ?? null;
            $child = $wk ? ($children[$wk['id']][0] ?? null) : null;

            if ($child) {
              renderCard(
                $child['jabatan'],
                $child['nama'],
                getIconByJabatan($child['jabatan']),
                'big',
                'n-' . $child['id'],
                'wk-' . $wk['id']
              );
            }
          ?>
        </div>
      <?php endfor; ?>
    </div>
  </div>

  <!-- ================= LEVEL 4 : KHUSUS WAKIL II (4 ANAK TAMBAHAN) ================= -->
  <?php
    $wk2Children = $wk2 && isset($children[$wk2['id']])
      ? array_slice($children[$wk2['id']], 1) // sisanya (selain anak pertama yang sudah tampil di level 3)
      : [];
  ?>

  <?php if (!empty($wk2Children)): ?>
    <div class="row row--l4 wakil2">
      <div class="grid grid--5">
        <?php foreach ($wk2Children as $node): ?>
          <div class="col">
            <?php
              renderCard(
                $node['jabatan'],
                $node['nama'],
                getIconByJabatan($node['jabatan']),
                'big',
                'n-' . $node['id'],
                $wk2IdNode // parent = wakil II
              );
            ?>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  <?php endif; ?>

</div> <!-- /.chart -->

</div> <!-- /.page-container -->

</section>

<script>
(() => {
  const svg = document.getElementById('chartSvg');
  const chart = document.getElementById('orgChart');

  const CFG = {
    // Ketua -> Wakil (group connector)
    trunkFromKetua: 30,   // turun dari ketua sebelum bar
    dropToWakil: 5,      // jarak bar ke top wakil

    // Wakil biasa (1,3,4) -> anak level-3
    gapToChildTop: 0,   

    // Wakil II (keluar dari kanan)
    wk2SideOut: 20,       // seberapa jauh keluar dari sisi kanan wakil II
    wk2TrunkMin: 30,      // minimal turun dulu sebelum bar (biar mirip desain)
    wk2DropToChild: 30,   // jarak bar ke top anak-anak (wk2)

    stroke: '#1f1f1f',
    strokeWidth: 3,
  };

  function isMobile(){
    return window.matchMedia('(max-width: 991px)').matches;
  }

  function applyResponsiveCFG(){
    if(isMobile()){
      CFG.trunkFromKetua = 16;
      CFG.dropToWakil = 4;

      CFG.gapToChildTop = 0;

      CFG.wk2SideOut = 8;
      CFG.wk2TrunkMin = 14;
      CFG.wk2DropToChild = 14;

      CFG.strokeWidth = 1;
    }else{
      CFG.trunkFromKetua = 30;
      CFG.dropToWakil = 5;

      CFG.gapToChildTop = 0;

      CFG.wk2SideOut = 20;
      CFG.wk2TrunkMin = 30;
      CFG.wk2DropToChild = 30;

      CFG.strokeWidth = 3;
    }
  }

  function rectRel(el){
    const r = el.getBoundingClientRect();        // posisi elemen [web:41]
    const cr = chart.getBoundingClientRect();
    return { left:r.left-cr.left, top:r.top-cr.top, width:r.width, height:r.height, right:r.right-cr.left, bottom:r.bottom-cr.top };
  }
  function topCenter(el){ const r=rectRel(el); return { x:r.left+r.width/2, y:r.top }; }
  function bottomCenter(el){ const r=rectRel(el); return { x:r.left+r.width/2, y:r.bottom }; }
  function rightMiddle(el){ const r=rectRel(el); return { x:r.right, y:r.top+r.height/2 }; }

  function mkPath(d){
    const p = document.createElementNS('http://www.w3.org/2000/svg', 'path');
    p.setAttribute('d', d);                      // bentuk path via d [web:64]
    p.setAttribute('fill', 'none');
    p.setAttribute('stroke', CFG.stroke);
    p.setAttribute('stroke-width', CFG.strokeWidth);
    p.setAttribute('stroke-linecap', 'round');
    p.setAttribute('stroke-linejoin', 'round');
    return p;
  }
  function mkPolyline(points){
    const pl = document.createElementNS('http://www.w3.org/2000/svg', 'polyline');
    pl.setAttribute('points', points.map(p => `${p.x},${p.y}`).join(' ')); // polyline [web:54]
    pl.setAttribute('fill', 'none');
    pl.setAttribute('stroke', CFG.stroke);
    pl.setAttribute('stroke-width', CFG.strokeWidth);
    pl.setAttribute('stroke-linecap', 'round');
    pl.setAttribute('stroke-linejoin', 'round');
    return pl;
  }

  function setSvgSize(){
    const cr = chart.getBoundingClientRect();
    svg.setAttribute('viewBox', `0 0 ${cr.width} ${cr.height}`);
  }

  // 1) Ketua -> 4 Wakil (trunk + bar + drop)
  function drawKetuaToWakil(){
    const ketua = chart.querySelector('[data-node="ketua"]');
    if (!ketua) return;

    const wakils = Array.from(chart.querySelectorAll('.row--wakil [data-node^="wk-"]'));
    if (!wakils.length) return;

    const a = bottomCenter(ketua);
    const tops = wakils.map(w => topCenter(w)).sort((p,q)=>p.x-q.x);

    const barY = Math.min(...tops.map(p => p.y)) - CFG.dropToWakil;
    const trunkY = Math.min(barY, a.y + CFG.trunkFromKetua);

    svg.appendChild(mkPath(`M ${a.x} ${a.y} V ${trunkY}`));

    const left = tops[0], right = tops[tops.length-1];
    svg.appendChild(mkPolyline([{x:left.x, y:trunkY}, {x:right.x, y:trunkY}]));

    wakils.forEach(w => {
      const t = topCenter(w);
      svg.appendChild(mkPath(`M ${t.x} ${trunkY} V ${t.y}`));
    });
  }

  // 2) Wakil 1,3,4 -> 1 anak (langsung vertikal)
  function drawWakilToChildDefault(){
  const wakilCols = Array.from(chart.querySelectorAll('.row--wakil .col'));
  wakilCols.forEach((col, idx) => {
    if (idx === 1) return; // WAKIL II khusus

    const wakil = col.querySelector('[data-node^="wk-"]');
    if (!wakil) return;

    const childCol = chart.querySelector(`.row--l3 .col--${idx+1}`);
    const child = childCol ? childCol.querySelector(`[data-parent="${wakil.getAttribute('data-node')}"]`) : null;
    if (!child) return;

    const a = bottomCenter(wakil);
    const b = topCenter(child);
    svg.appendChild(mkPath(`M ${a.x} ${a.y} V ${b.y - CFG.gapToChildTop}`));
  });
}


  // 3) Wakil II: keluar dari KANAN -> trunk turun -> bar -> drop ke 5 anak
  function drawWk2RightToL3ThenDownToL4(){
  const wk2Id = chart.getAttribute('data-wakil2');
  if(!wk2Id) return;

  const wk2 = chart.querySelector(`[data-node="${wk2Id}"]`);
  if(!wk2) return;

  // anak level-3 wakil II (kolom 2)
  const childL3 = chart.querySelector(`.row--l3 .col--2 [data-parent="${wk2Id}"]`);
  if(!childL3) return;

  // anak level-4 wakil II
  const childrenL4 = Array.from(chart.querySelectorAll(`.row--l4.wakil2 [data-parent="${wk2Id}"]`));
  if(childrenL4.length < 2) return;

  // titik start: sisi kanan wakil II (tengah vertikal)
  const s = rightMiddle(wk2);

  // titik masuk ke anak level-3: sisi kanan anak level-3 (tengah vertikal)
  const c3Rect = rectRel(childL3);
  const c3 = { x: c3Rect.right, y: c3Rect.top + c3Rect.height/2 };

  // buat “kolom trunk” di kanan (agar garis dari wakil II turun di sisi kanan)
  const trunkX = Math.max(s.x, c3.x) + CFG.wk2SideOut;

  // 1) keluar kanan dari wakil II ke trunkX
  // 2) turun sampai sejajar y anak level-3
  // 3) masuk ke sisi kanan anak level-3
  svg.appendChild(mkPath(`M ${s.x} ${s.y} H ${trunkX} V ${c3.y} H ${c3.x}`)); // H & V via d [web:64]

  // lanjut: dari titik anak level-3, tarik balik sedikit ke trunkX, lalu turun ke bar level-4
  const targets4 = childrenL4.map(el => topCenter(el)).sort((a,b)=>a.x-b.x);
  const barY = Math.min(...targets4.map(t => t.y)) - CFG.wk2DropToChild;

  // 4) balik ke trunkX, 5) turun sampai barY
  svg.appendChild(mkPath(`M ${c3.x} ${c3.y} H ${trunkX} V ${barY}`));

  // bar horizontal level-4
  const left = targets4[0], right = targets4[targets4.length - 1];
  svg.appendChild(mkPolyline([{x:left.x, y:barY}, {x:right.x, y:barY}])); // polyline [web:54]

  // drop ke tiap anak level-4
  childrenL4.forEach(el => {
    const t = topCenter(el);
    svg.appendChild(mkPath(`M ${t.x} ${barY} V ${t.y}`));
  });
}


  function draw(){
  applyResponsiveCFG();
  setSvgSize();
  svg.innerHTML = '';
  drawKetuaToWakil();
  drawWakilToChildDefault();
  drawWk2RightToL3ThenDownToL4();
}


  window.addEventListener('load', draw);
  window.addEventListener('resize', draw);
  window.addEventListener('scroll', draw, true); // posisi berubah saat scroll [web:41]
  setTimeout(draw, 400);
})();
</script>

<?= $this->endSection() ?>
