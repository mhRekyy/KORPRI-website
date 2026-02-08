<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Admin KORPRI</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/auth/login.css') ?>">
</head>
<body>

<div class="auth-wrapper">
    <div class="auth-card">

        <div class="auth-header">
            <h1>Admin KORPRI</h1>
            <p>Portal Manajemen Internal</p>
        </div>

        <?php if (session()->getFlashdata('error')) : ?>
            <div class="alert-error">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>

        <form action="<?= base_url('/login') ?>" method="post">
            <?= csrf_field() ?>

            <div class="form-group">
                <label>Email</label>
                <input
                    type="email"
                    name="email"
                    value="<?= old('email') ?>"
                    placeholder="admin@korpri.go.id"
                    required
                >
            </div>

            <div class="form-group">
                <label>Password</label>
                <input
                    type="password"
                    name="password"
                    placeholder="••••••••"
                    required
                >
            </div>

            <button type="submit" class="btn-login">
                Login
            </button>
        </form>

        <div class="auth-footer">
            © <?= date('Y') ?> KORPRI • Sistem Internal
        </div>
    </div>
</div>

</body>
</html>
