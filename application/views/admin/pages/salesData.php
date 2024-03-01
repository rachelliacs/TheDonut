<div class="admin-list">
    <div class="card-header">
        <h4>Sales List</h4>
        <select name="salesfilter" id="salesfilter" class="btn btn-primary form-control">
            <?php foreach ($sales as $sale): ?>
                <option value="<?php echo $sale['orderID']; ?>">
                    <?php echo $sale['orderDate']; ?>
                </option>
            <?php endforeach; ?>
        </select>
        <button href="#" class="btn btn-primary"><svg width="32" height="32" viewBox="0 0 32 32" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M25.3333 10.6667H6.66663C4.45329 10.6667 2.66663 12.4533 2.66663 14.6667V20C2.66663 21.4667 3.86663 22.6667 5.33329 22.6667H7.99996V25.3333C7.99996 26.8 9.19996 28 10.6666 28H21.3333C22.8 28 24 26.8 24 25.3333V22.6667H26.6666C28.1333 22.6667 29.3333 21.4667 29.3333 20V14.6667C29.3333 12.4533 27.5466 10.6667 25.3333 10.6667ZM20 25.3333H12C11.2666 25.3333 10.6666 24.7333 10.6666 24V18.6667H21.3333V24C21.3333 24.7333 20.7333 25.3333 20 25.3333ZM25.3333 16C24.6 16 24 15.4 24 14.6667C24 13.9333 24.6 13.3333 25.3333 13.3333C26.0666 13.3333 26.6666 13.9333 26.6666 14.6667C26.6666 15.4 26.0666 16 25.3333 16ZM22.6666 4H9.33329C8.59996 4 7.99996 4.6 7.99996 5.33333V8C7.99996 8.73333 8.59996 9.33333 9.33329 9.33333H22.6666C23.4 9.33333 24 8.73333 24 8V5.33333C24 4.6 23.4 4 22.6666 4Z"
                    fill="white" />
            </svg>
            Print
            <?= $title; ?>
        </button>
    </div>
    <table class="table">
        <thead class="table-light">
            <tr>
                <th scope="col">Order ID</th>
                <th scope="col">Customer</th>
                <th scope="col">Item Bought</th>
                <th scope="col">Total Pay</th>
                <th scope="col">Date</th>
                <th scope="col">Payment</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Query untuk mengambil total item yang dibeli oleh setiap user
            $this->db->select('userID, SUM(cartQuantity) AS totalItems');
            $this->db->from('tb_cart');
            $this->db->group_by('userID');
            $query = $this->db->get();
            $totals = $query->result_array();

            // Buat array untuk menyimpan total item berdasarkan userID
            $total_items_by_user = array();
            foreach ($totals as $total) {
                $total_items_by_user[$total['userID']] = $total['totalItems'];
            } ?>
            <?php foreach ($sales as $sale): ?>
                <?php
                // Ambil total item untuk user yang terkait dengan penjualan saat ini
                $total_items = isset($total_items_by_user[$sale['userID']]) ? $total_items_by_user[$sale['userID']] : 0;
                ?>
                <tr>
                    <?php
                    // Fetch product names associated with the current sale
                    $product_names = array();
                    foreach ($carts as $cart) {
                        if ($cart['userID'] == $this->session->userdata('userID') && $cart['cartID'] == $sale['cartID']) {
                            $product_names[] = $cart['productName'];
                        }
                    }
                    ?>
                    <th scope="row" class="align-middle">
                        <?= $sale['orderID']; ?>
                    </th>
                    <td class="align-middle">
                        <?= $sale['userName']; ?>
                    </td>
                    <td class="align-middle">
                        <?= $total_items; ?>
                    </td>
                    <td class="align-middle">
                        <?php
                        $subtotal = $sale['orderTotalPrice'];
                        echo number_format($subtotal, 0, '.', '.');
                        ?> IDR
                    </td>
                    <td class="align-middle">
                        <?= $sale['orderDate']; ?>
                    </td>
                    <td class="align-middle">
                        <?= $sale['orderMethod']; ?>
                        <?php
                        $badge_color = ($sale['orderStatus'] == 'pending') ? 'badge-warning' : 'badge-success';
                        ?>
                        <div class="badge <?= $badge_color; ?>">
                            <?= $sale['orderStatus']; ?>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>