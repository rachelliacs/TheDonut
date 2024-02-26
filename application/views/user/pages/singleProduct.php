<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <!-- Main Image -->
                <img id="mainImage" class="product-image"
                    src="<?= base_url(); ?>assets/img/<?= $product['productImage']; ?>"
                    alt="<?php echo $product['productName']; ?>">
                <!-- Small images -->
                <div class="row mt-4" id="smallImagesRow">
                    <?php foreach ($products as $index => $image): ?>
                        <?php if ($image['productID'] == $product['productID']): ?>
                            <div class="col-md-3">
                                <img src="<?= base_url(); ?>assets/img/<?= $image['productImage']; ?>" alt="Small Image"
                                    class="img-fluid product-small-image"
                                    data-small-image="<?= base_url(); ?>assets/img/<?= $image['productImage']; ?>"
                                    data-small-image-index="<?= $index; ?>">
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                    <?php foreach ($smallImages as $index => $image): ?>
                        <?php if ($image['productID'] == $product['productID']): ?>
                            <div class="col-md-3">
                                <img src="<?= base_url(); ?>assets/img/<?= $image['productImage']; ?>" alt="Small Image"
                                    class="img-fluid product-small-image"
                                    data-small-image="<?= base_url(); ?>assets/img/<?= $image['productImage']; ?>"
                                    data-small-image-index="<?= $index; ?>">
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="col-md-5">
                <h2 class="mb-4">
                    <?php echo $product['productName']; ?>
                </h2>
                <p>
                    <strong>Price:</strong>
                    <?php echo $product['productPrice']; ?>0 IDR
                </p>
                <p>
                    <strong>Stock:</strong>
                    <?php echo $product['productStock']; ?> pcs
                </p>
                <p>
                    <strong>Description:</strong>
                    <?php if (!empty($product['productDesc'])): ?>
                        <?php echo $product['productDesc']; ?>
                    <?php else: ?>
                        No description for this product
                    <?php endif; ?>
                </p>
            </div>
            <div class="col-md-3">
                <div class="sticky-cart">
                    <form id="add-to-cart-form" class="form formAdd">
                        <div class="form-content-wrap">
                            <p>Amount Order</p>
                            <input type="hidden" name="productid" value="<?php echo $product['productID']; ?>">
                            <input type="number" name="cartquantity" value="1" min="1">
                            <button type="submit" class="btn btn-primary">Add to Cart</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>