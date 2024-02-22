<section class="section padding-large">
    <div class="container">
        <h1 class="mb-5">
            Profile
        </h1>
        <div class="profile-info">
            <label>Username:</label>
            <p>
                <?= $this->session->userdata('username'); ?>
            </p>
        </div>
        <div class="profile-info">
            <label>Email:</label>
            <p>
                <?= $this->session->userdata('useremail'); ?>
            </p>
        </div>
        <div class="profile-info">
            <label>Phone:</label>
            <p>
                <?= $this->session->userdata('userphone'); ?>
            </p>
        </div>
        <div class="profile-info">
            <label>Password:</label>
            <p>
                <?= $this->session->userdata('userpassword'); ?>
            </p>
        </div>
        <a href="<?= base_url(); ?>profile/edit" class="btn">Edit</a>
    </div>
</section>