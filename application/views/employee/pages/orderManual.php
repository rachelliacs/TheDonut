<div>
    <div id="add-popup" class="card-add">
        <form id="id" method="post" action="<?= base_url(); ?>employee/ordermanual/add" class="form formAdd">
            <div class="form-content-wrap">
                <div class="card-header">
                    <h6>
                        Add New Order
                    </h6>
                </div>
                <div class="form-input-group row">
                    <div class="form-input">
                        <label for="userid" class="form-label">Customer Name</label>
                        <select name="userid" id="userid" class="form-control">
                            <?php foreach ($users as $user): ?>
                                <?php if ($user['userStatus'] == 'customer'): ?>
                                    <option value="<?php echo $user['userID']; ?>">
                                        <?php echo $user['userName']; ?>
                                    </option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-input">
                        <label for="orderstatus" class="form-label">Status Payment</label>
                        <select name="orderstatus" id="orderstatus" class="form-control">
                            <?php foreach ($orderstatuses as $orderstatus): ?>
                                <option value="<?php echo $orderstatus; ?>">
                                    <?php echo $orderstatus; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-input">
                        <label for="ordermethod" class="form-label">Order Method</label>
                        <select name="ordermethod" id="ordermethod" class="form-control">
                            <?php foreach ($ordermethods as $ordermethod): ?>
                                <option value="<?php echo $ordermethod; ?>">
                                    <?php echo $ordermethod; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-input">
                        <label for="">Order</label>
                        <?php foreach ($products as $product): ?>
                            <div class="form-input-radio">
                                <input type="checkbox" name="products[]" id="product_<?= $product['productID']; ?>"
                                    class="form-input-radio" value="<?= $product['productID']; ?>">
                                <label for="product_<?= $product['productID']; ?>" class="form-label">
                                    <?= $product['productName']; ?>
                                </label>
                                <input type="number" name="orderTotalItem[]"
                                    id="orderTotalItem_<?= $product['productID']; ?>" min="0"
                                    class="form-input-number form-control">
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary"><svg width="32" height="32" viewBox="0 0 32 32"
                        fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M14 26.6663C14 27.1968 14.2107 27.7055 14.5858 28.0806C14.9608 28.4556 15.4695 28.6663 16 28.6663C16.5304 28.6663 17.0391 28.4556 17.4142 28.0806C17.7893 27.7055 18 27.1968 18 26.6663V17.9997H26.6666C27.1971 17.9997 27.7058 17.789 28.0809 17.4139C28.4559 17.0388 28.6666 16.5301 28.6666 15.9997C28.6666 15.4692 28.4559 14.9605 28.0809 14.5855C27.7058 14.2104 27.1971 13.9997 26.6666 13.9997H18V5.33301C18 4.80257 17.7893 4.29387 17.4142 3.91879C17.0391 3.54372 16.5304 3.33301 16 3.33301C15.4695 3.33301 14.9608 3.54372 14.5858 3.91879C14.2107 4.29387 14 4.80257 14 5.33301V13.9997H5.33331C4.80288 13.9997 4.29417 14.2104 3.9191 14.5855C3.54403 14.9605 3.33331 15.4692 3.33331 15.9997C3.33331 16.5301 3.54403 17.0388 3.9191 17.4139C4.29417 17.789 4.80288 17.9997 5.33331 17.9997H14V26.6663Z"
                            fill="white" />
                    </svg>
                    Add
                    <?= $title; ?>
                </button>
            </div>
        </form>
    </div>
</div>