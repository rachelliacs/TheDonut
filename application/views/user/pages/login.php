<div class="section section-auth padding-small">
    <div class="container">
        <form method="post" action="<?= base_url(); ?>authentication/login" class="form">
            <div class="form-content-wrap">
                <h1>Login</h1>
                <div class="form-input-group">
                    <div class="form-input">
                        <label for="username" class="form-label">User Name</label>
                        <input type="text" name="username" id="username" class="form-control"
                            placeholder="Enter your username">
                    </div>
                    <div class="form-input">
                        <label for="userpassword" class="form-label">Password</label>
                        <input type="password" class="form-control" name="userpassword" id="userpassword"
                            placeholder="Enter your password">
                    </div>
                </div>
                <?php
                if (validation_errors()) {
                    echo '<div class="alert alert-danger" role="alert">';
                    echo validation_errors();
                    echo '</div>';
                }
                ?>
                <div class="form-buttons">
                    <button name="submit" type="submit" class="btn btn-primary">Login</button>
                    <a href="<?= base_url(); ?>register" class="btn btn-primary">Register</a>
                </div>
            </div>
        </form>
    </div>
</div>
<?php
if ($this->session->flashdata('error') != '') {
    echo '<script type="text/javascript">';
    echo 'alert("Login gagal! Silakan cek kembali username dan password Anda.");';
    echo '</script>';
}
?>