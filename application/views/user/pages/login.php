<div class="section padding-small">
    <div class="container">
        <?php
        if ($this->session->flashdata('error') != '') {
            echo '<div class="alert alert-danger" role="alert">';
            echo $this->session->flashdata('error');
            echo '</div>';
        }
        ?>
        <?php
        if ($this->session->flashdata('success_register') != '') {
            echo '<div class="alert alert-info" role="alert">';
            echo $this->session->flashdata('success_register');
            echo '</div>';
        }
        ?>
        <form method="post" action="<?= base_url(); ?>login/process" class="form">
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
                <div class="form-buttons">
                    <button type="submit" class="btn btn-primary">Login</button>
                    <button type="submit" class="btn btn-primary">Register</button>
                </div>
            </div>
        </form>
    </div>
</div>