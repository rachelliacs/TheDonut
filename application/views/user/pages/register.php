<div class="section padding-small">
    <div class="container">
        <?php
        if ($this->session->flashdata('error') != '') {
            echo '<div class="alert alert-danger" role="alert">';
            echo $this->session->flashdata('error');
            echo '</div>';
        }
        ?>
        <form method="post" action="<?= base_url(); ?>register/process" class="form">
            <div class="form-content-wrap">
                <h1>Register</h1>
                <div class="form-input-group">
                    <div class="form-input">
                        <label for="username" class="form-label">User Name</label>
                        <input type="text" name="username" id="username" class="form-control"
                            placeholder="Enter your desire user name">
                    </div>
                    <div class="form-input">
                        <label for="useremail" class="form-label">Email address</label>
                        <input type="email" class="form-control" name="useremail" id="useremail"
                            placeholder="Enter your email">
                    </div>
                    <div class="form-input">
                        <label for="userphone" class="form-label">Phone Number</label>
                        <input type="text" class="form-control" name="userphone" id="userphone"
                            placeholder="Enter your phone number">
                    </div>
                    <div class="form-input">
                        <label for="userpassword" class="form-label">Password</label>
                        <input type="password" class="form-control" name="userpassword" id="userpassword"
                            placeholder="Enter your password" aria-describedby="userpasswordHelp">
                        <div id="userpasswordHelp" class="form-text">Create 8 character long password.</div>
                    </div>
                </div>
                <div class="form-buttons">
                    <button type="submit" class="btn btn-primary">Register</button>
                </div>
            </div>
        </form>
    </div>
</div>