<div class="card-add">
    <form method="post" action="<?= base_url(); ?>admin/StoreData/update" class="form formAdd">
        <div class="form-content-wrap">
            <h6 class="card-header">
                Update
                <?= $title ?>
            </h6>
            <div class="form-input-group">
                <div class="form-input">
                    <label for="storename" class="form-label">Store Name</label>
                    <input type="text" name="storename" id="storename" class="form-control"
                        placeholder="Enter store name" value="<?= $storedata->storeName; ?>">
                </div>
                <div class="form-input">
                    <label for="storelogo" class="form-label">Store Logo</label>
                    <input type="text" name="storelogo" id="storelogo" class="form-control"
                        placeholder="Enter store image filename" value="<?= $storedata->storeLogo; ?>">
                </div>
                <div class="form-input">
                    <label for="storedesc" class="form-label">Store Description</label>
                    <input type="text" name="storedesc" id="storedesc" class="form-control"
                        placeholder="Enter store description" value="<?= $storedata->storeDesc; ?>">
                </div>
            </div>
            <button type="submit" class="btn btn-primary"><svg width="32" height="32" viewBox="0 0 32 32" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
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