<div class="admin-list">
    <div class="card-header">
        <h4>
            <?= $title ?> Data
        </h4>
    </div>
    <!-- DATA LIST -->
    <table class="text-nowrap mb-0 table">
        <thead class="table-light">
            <tr>
                <th scope="column">Store Name</th>
                <th scope="column">Store Logo</th>
                <th scope="column">Store Desc</th>
                <th scope="column">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($storedatas as $storedata): ?>
                <tr>
                    <th scope="row">
                        <?php echo $storedata['storeName']; ?>
                    </th>
                    <td>
                        <img alt="<?php echo $storedata['storeName']; ?> logo"
                            src="<?= base_url(); ?>assets/img/<?= $storedata['storeLogo']; ?>">
                    </td>
                    <td>
                        <?php echo $storedata['storeDesc']; ?>
                    </td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                            <button data-storeid="<?php echo $storedata['storeID']; ?>"
                                data-storename="<?php echo $storedata['storeName']; ?>"
                                data-storelogo="<?php echo $storedata['storeLogo']; ?>"
                                data-storedesc="<?php echo $storedata['storeDesc']; ?>" class="btn btn-success edit-btn">
                                <svg width="32" height="32" viewBox="0 0 32 32" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M9.33331 22.6835L15.2173 22.6635L28.06 9.94355C28.564 9.43955 28.8413 8.77021 28.8413 8.05821C28.8413 7.34621 28.564 6.67688 28.06 6.17288L25.9453 4.05821C24.9373 3.05021 23.1786 3.05554 22.1786 4.05421L9.33331 16.7769V22.6835ZM24.06 5.94354L26.1786 8.05421L24.0493 10.1635L21.9346 8.05021L24.06 5.94354ZM12 17.8889L20.04 9.92488L22.1546 12.0395L14.116 20.0009L12 20.0075V17.8889Z"
                                        fill="white" />
                                    <path
                                        d="M6.66667 28H25.3333C26.804 28 28 26.804 28 25.3333V13.776L25.3333 16.4427V25.3333H10.8773C10.8427 25.3333 10.8067 25.3467 10.772 25.3467C10.728 25.3467 10.684 25.3347 10.6387 25.3333H6.66667V6.66667H15.796L18.4627 4H6.66667C5.196 4 4 5.196 4 6.66667V25.3333C4 26.804 5.196 28 6.66667 28Z"
                                        fill="white" />
                                </svg>
                            </button>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <!-- POPUP FORM -->
    <div id="edit-popup" class="popup-form">
        <form id="edit-form" method="post" action="<?= base_url(); ?>admin/StoreData/update">
            <div class="form-content-wrap">
                <h6 class="card-header">
                    Update
                    <?= $title ?>
                    <div class="btn-close" id="close-edit-popup"></div>
                </h6>
                <div class="form-input-group">
                    <div class="form-input">
                        <input type="hidden" name="storeid" id="storeid" class="form-control">
                    </div>
                    <div class="form-input">
                        <label for="storename" class="form-label">Store Name</label>
                        <input type="text" name="storename" id="storename" class="form-control"
                            placeholder="Enter store name">
                    </div>
                    <div class="form-input">
                        <label for="storelogo" class="form-label">Store Logo</label>
                        <input type="text" name="storelogo" id="storelogo" class="form-control"
                            placeholder="Enter store image filename">
                    </div>
                    <div class="form-input">
                        <label for="storedesc" class="form-label">Store Description</label>
                        <input type="text" name="storedesc" id="storedesc" class="form-control"
                            placeholder="Enter store description">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">
                    <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M14 26.6663C14 27.1968 14.2107 27.7055 14.5858 28.0806C14.9608 28.4556 15.4695 28.6663 16 28.6663C16.5304 28.6663 17.0391 28.4556 17.4142 28.0806C17.7893 27.7055 18 27.1968 18 26.6663V17.9997H26.6666C27.1971 17.9997 27.7058 17.789 28.0809 17.4139C28.4559 17.0388 28.6666 16.5301 28.6666 15.9997C28.6666 15.4692 28.4559 14.9605 28.0809 14.5855C27.7058 14.2104 27.1971 13.9997 26.6666 13.9997H18V5.33301C18 4.80257 17.7893 4.29387 17.4142 3.91879C17.0391 3.54372 16.5304 3.33301 16 3.33301C15.4695 3.33301 14.9608 3.54372 14.5858 3.91879C14.2107 4.29387 14 4.80257 14 5.33301V13.9997H5.33331C4.80288 13.9997 4.29417 14.2104 3.9191 14.5855C3.54403 14.9605 3.33331 15.4692 3.33331 15.9997C3.33331 16.5301 3.54403 17.0388 3.9191 17.4139C4.29417 17.789 4.80288 17.9997 5.33331 17.9997H14V26.6663Z"
                            fill="white" />
                    </svg>
                    Update
                    <?= $title; ?>
                </button>
            </div>
        </form>
    </div>
</div>