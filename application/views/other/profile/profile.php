<section class="section padding-large">
    <div class="container">
        <div class="form-content-wrap mb-3">
            <div class="mt-4 mb-4">
                <h1 class="mb-5 text-center">
                    Profile
                </h1>
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-6">
                        <!-- User Image -->
                        <img class="user-image" src="<?= base_url(); ?>assets/img/thedonut-user.jpg" alt="User Image">
                    </div>
                    <div class="col-md-6">
                        <!-- User Data -->
                        <div class="form">
                            <div class="form-input-group">
                                <div class="form-input">
                                    <label>
                                        <strong>Username:</strong>
                                    </label>
                                    <p>
                                        <?= $this->session->userdata('username'); ?>
                                    </p>
                                </div>
                                <div class="form-input">
                                    <label><strong>Email:</strong></label>
                                    <p>
                                        <?= $this->session->userdata('useremail'); ?>
                                    </p>
                                </div>
                                <div class="form-input">
                                    <label><strong>Phone:</strong></label>
                                    <p>
                                        <?= $this->session->userdata('userphone'); ?>
                                    </p>
                                </div>
                                <div class="form-input">
                                    <label><strong>Password:</strong></label>
                                    <p>
                                        <?= $this->session->userdata('userpassword'); ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-buttons">
            <a href="login/logout" class="btn">Logout</a>
        </div>
    </div>
</section>