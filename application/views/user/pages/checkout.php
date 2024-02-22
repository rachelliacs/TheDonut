<section class="section">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-6">
                <div class="form-left text-center align-middle">
                    <?php foreach ($storedatas as $storedata): ?>
                        <h1>
                            <?= $storedata['storeName']; ?>
                        </h1>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-5">
                <form action="<?php echo base_url('checkout/process'); ?>" method="post" class="form formAdd">
                    <div class="form-content-wrap">
                        <h1>Check ur order out</h1>
                        <div class="form-input-group">
                            <div class="form-input">
                                <label class="form-label" for="name">Name:</label>
                                <input class="form-control" type="text" id="name" name="name"
                                    placeholder="Enter your name" required>
                            </div>
                            <div class="form-input">
                                <label class="form-label" for="email">Email:</label>
                                <input class="form-control" type="email" id="email" name="email"
                                    placeholder="Enter your email" required>
                            </div>
                            <div class="form-input">
                                <label class="form-label" for="address">Address:</label>
                                <textarea id="address" name="address" placeholder="Enter your home address"
                                    required></textarea>
                            </div>
                            <div class="form-buttons">
                                <button class="btn btn-primary">QRIS</button>
                                <button class="btn btn-primary">Cash</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>