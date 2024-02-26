<section class="section padding-large">
    <div class="container">
        <div class="form-content-wrap mb-3">
            <div class="mt-4 mb-4">
                <h1 class="mb-4 text-center">
                    Profile
                </h1>
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-6 d-flex">
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
                                        <?php
                                        $userName = $this->session->userdata('userName');
                                        if ($userName !== false && !empty($userName)) {
                                            echo $userName;
                                        } else {
                                            echo "-";
                                        }
                                        ?>
                                    </p>
                                </div>
                                <div class="form-input">
                                    <label><strong>Email:</strong></label>
                                    <p>
                                        <?php
                                        $userEmail = $this->session->userdata('userEmail');
                                        if ($userEmail !== false && !empty($userEmail)) {
                                            echo $userEmail;
                                        } else {
                                            echo "-";
                                        }
                                        ?>
                                    </p>
                                </div>
                                <div class="form-input">
                                    <label><strong>Phone:</strong></label>
                                    <p>
                                        <?php
                                        $userPhone = $this->session->userdata('userPhone');
                                        if ($userPhone !== false && !empty($userPhone)) {
                                            echo $userPhone;
                                        } else {
                                            echo "-";
                                        }
                                        ?>
                                    </p>
                                </div>
                                <div class="form-input">
                                    <label><strong>Password:</strong></label>
                                    <p>
                                        <?php
                                        $userPassword = $this->session->userdata('userPassword');
                                        if ($userPassword !== false && !empty($userPassword)) {
                                            echo $userPassword;
                                        } else {
                                            echo "-";
                                        }
                                        ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-buttons">
            <a href="authentication/logout" class="btn btn-primary">Logout</a>
        </div>
    </div>
</section>