<section class="section padding-small">
    <div class="container">
        <?= validation_errors(); ?>
        <form id="edit-form" method="post" action="<?= base_url(); ?>profile/updatedata">
            <div class="form-content-wrap mb-3">
                <div class="mt-4 mb-4">
                    <h1 class="mb-4 text-center">
                        Edit Profile
                    </h1>
                    <div class="row align-items-center justify-content-center">
                        <div class="col-md-6 d-flex">
                            <!-- User Image -->
                            <img class="user-image" src="<?= base_url(); ?>assets/img/thedonut-user.jpg"
                                alt="User Image">
                        </div>
                        <div class="col-md-3">
                            <div class="form-input-group">
                                <input type="hidden" name="userid" id="userid" value="">
                                <div class="form-input">
                                    <label for="username" class="form-label"><strong>Username</strong></label>
                                    <input type="text" name="username" id="username" class="form-control"
                                        placeholder="Enter your desire user name">
                                </div>
                                <div class="form-input">
                                    <label for="useremail" class="form-label"><strong>Email</strong></label>
                                    <input type="email" class="form-control" name="useremail" id="useremail"
                                        placeholder="Enter your email">
                                </div>
                                <div class="form-input">
                                    <label for="userphone" class="form-label"><strong>Phone</strong></label>
                                    <input type="text" class="form-control" name="userphone" id="userphone"
                                        placeholder="Enter your phone number">
                                </div>
                                <div class="form-input">
                                    <label for="userpassword" class="form-label"><strong>Password</strong></label>
                                    <input type="password" class="form-control" name="userpassword" id="userpassword"
                                        placeholder="Enter your password" aria-describedby="userpasswordHelp">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3"></div>
                    </div>
                </div>
            </div>
            <div class="form-buttons">
                <button type="submit" class="btn btn-primary">Edit Profile
                </button>
            </div>
        </form>
    </div>
</section>