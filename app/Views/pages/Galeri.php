.video-kegiatan-page {
    background: #fbf8f2;
    padding: 60px 80px;
    font-family: 'Poppins', sans-serif;
}

/* ROW */
.video-row {
    display: flex;
    align-items: center;
    gap: 70px;
    margin-bottom: 120px;
}

.video-row.right {
    flex-direction: row-reverse;
}

/* ======================
   VIDEO FRAME (LAYERED)
====================== */
.video-frame-wrapper {
    position: relative;
    width: 50%;
    min-width: 520px;
    height: 360px;
}

.video-layer {
    position: absolute;
    border-radius: 22px;
    overflow: hidden;
}

/* BACK LAYER */
.video-layer.back {
    width: 100%;
    height: 100%;
    background: #d9d9d9;
    top: 18px;
    left: 18px;
    opacity: 0.6;
}

/* FRONT LAYER */
.video-layer.front {
    width: 100%;
    height: 100%;
    background: #eee;
    z-index: 2;
    text-decoration: none;
    box-shadow: 0 18px 35px rgba(0,0,0,0.18);
}

.video-layer.front img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

/* PLAY ICON */
.play-icon {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 68px;
    height: 68px;
    background: rgba(255,255,255,0.9);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 24px;
    color: #000;
}

/* FOOTER VIDEO */
.video-footer {
    position: absolute;
    bottom: 0;
    width: 100%;
    background: #fff;
    padding: 14px;
    text-align: center;
}

.video-footer h4 {
    font-size: 14px;
    font-weight: 700;
    margin-bottom: 4px;
}

.video-footer span {
    font-size: 12px;
    color: #555;
}

/* ======================
   DESCRIPTION
====================== */
.video-info {
    width: 50%;
}

.video-info h2 {
    font-size: 22px;
    font-weight: 800;
    margin-bottom: 18px;
}

.video-info p {
    font-size: 15px;
    line-height: 1.9;
    color: #333;
    max-width: 520px;
}
