<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <img id="mainImage" class="product-image"
                    src="<?= base_url(); ?>assets/img/<?= $product['productImage']; ?>"
                    alt="<?php echo $product['productName']; ?>">
                <!-- Small images -->
                <div class="row mt-4" id="smallImagesRow">
                    <?php foreach ($smallImages as $index => $image): ?>
                        <div class="col-md-3">
                            <img src="<?= base_url(); ?>assets/img/<?= $image['filename']; ?>" alt="Small Image"
                                class="img-fluid small-image"
                                data-main-image="<?= base_url(); ?>assets/img/<?= $product['productImage']; ?>"
                                data-small-image-index="<?= $index; ?>">
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="col-md-4">
                <table class="table mb-5">
                    <h2 class="mb-4">
                        <?php echo $product['productName']; ?>
                    </h2>
                    <tr>
                        <th>Price</th>
                        <td>
                            <?php echo $product['productPrice']; ?>0 IDR
                        </td>
                    </tr>
                    <tr>
                        <th>Stock</th>
                        <td>
                            <?php echo $product['productStock']; ?> pcs
                        </td>
                    </tr>
                    <tr>
                        <th>Description</th>
                        <td>
                            <?php if (!empty($product['productDesc'])): ?>
                                <?php echo $product['productDesc']; ?>
                            <?php else: ?>
                                No description for this product
                            <?php endif; ?>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="col-md-3">
                <div class="sticky-cart">
                    <h5 class="mb-5">Amount Order</h5>
                    <form id="add-to-cart-form" class="form formAdd">
                        <div class="form-content-wrap">
                            <input type="hidden" name="productid" value="<?php echo $product['productID']; ?>">
                            <input type="number" name="quantity" value="1" min="1">
                            <button type="submit" class="btn btn-primary">Add to Cart</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>