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
                <form action="#" method="post" class="form formAdd">
                    <div class="form-content-wrap">
                        <h1>Check ur order out</h1>
                        <div class="form-input-group">
                            <div class="form-input">
                                <label class="form-label" for="username">Name:</label>
                                <input class="form-control" type="text" id="username" name="username"
                                    placeholder="Enter your name" required>
                            </div>
                            <div class="form-input">
                                <label class="form-label" for="useremail">Email:</label>
                                <input class="form-control" type="email" id="useremail" name="useremail"
                                    placeholder="Enter your email" required>
                            </div>
                            <div class="form-input">
                                <label class="form-label" for="userphone">Phone:</label>
                                <input class="form-control" type="text" id="userphone" name="userphone"
                                    placeholder="Enter your phone number" required>
                            </div>
                            <div class="form-input">
                                <label class="form-label" for="useraddress">Address:</label>
                                <textarea id="useraddress" name="useraddress" placeholder="Enter your home address"
                                    required></textarea>
                            </div>
                            <div class="form-buttons">
                                <button class="btn btn-primary">Cash</button>
                                <button id="pay-button">QRIS</button>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- <pre><div id="result-json">JSON result will appear here after payment:<br></div></pre>  -->
            </div>
        </div>
    </div>
</section>