<div class="admin-list">
    <div class="card-header">
        <h4>Sales List</h4>
        <form action="<?php echo base_url('admin/salesData/generatePdf'); ?>" method="post">
            <select name="salesfilter" id="salesfilter" class="btn btn-primary form-control"
                onchange="this.form.submit()">
                <option value="">
                    <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M25.3333 10.6667H6.66663C4.45329 10.6667 2.66663 12.4533 2.66663 14.6667V20C2.66663 21.4667 3.86663 22.6667 5.33329 22.6667H7.99996V25.3333C7.99996 26.8 9.19996 28 10.6666 28H21.3333C22.8 28 24 26.8 24 25.3333V22.6667H26.6666C28.1333 22.6667 29.3333 21.4667 29.3333 20V14.6667C29.3333 12.4533 27.5466 10.6667 25.3333 10.6667ZM20 25.3333H12C11.2666 25.3333 10.6666 24.7333 10.6666 24V18.6667H21.3333V24C21.3333 24.7333 20.7333 25.3333 20 25.3333ZM25.3333 16C24.6 16 24 15.4 24 14.6667C24 13.9333 24.6 13.3333 25.3333 13.3333C26.0666 13.3333 26.6666 13.9333 26.6666 14.6667C26.6666 15.4 26.0666 16 25.3333 16ZM22.6666 4H9.33329C8.59996 4 7.99996 4.6 7.99996 5.33333V8C7.99996 8.73333 8.59996 9.33333 9.33329 9.33333H22.6666C23.4 9.33333 24 8.73333 24 8V5.33333C24 4.6 23.4 4 22.6666 4Z"
                            fill="white" />
                    </svg>Print Sales
                </option>
                <?php foreach ($months as $month): ?>
                    <option value="<?php echo $month['month']; ?>" <?php if (isset($selectedMonth) && $selectedMonth == $month['month'])
                           echo 'selected'; ?>>
                        <?php echo date('F Y', strtotime($month['month'])); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </form>
    </div>
    <table id="salesTable" class="table">
        <form method="post" action="<?php echo base_url('admin/salesData'); ?>">
            <select name="salesfilter" id="salesfilter" class="btn btn-primary btn-filter form-control"
                onchange="this.form.submit()">
                <option value="">Filter</option>
                <?php foreach ($months as $month): ?>
                    <option value="<?php echo $month['month']; ?>" <?php if (isset($selectedMonth) && $selectedMonth == $month['month'])
                           echo 'selected'; ?>>
                        <?php echo date('F Y', strtotime($month['month'])); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </form>
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
            <?php foreach ($orders as $order): ?>
                <tr>
                    <th scope="row" class="align-middle">
                        <?= $order['orderID']; ?>
                    </th>
                    <td class="align-middle">
                        <?= $order['userName']; ?>
                    </td>
                    <td class="align-middle">
                        <?= $order['cartQuantity']; ?>
                    </td>
                    <td class="align-middle">
                        <?= number_format($order['orderTotalPrice'], 0, '.', '.'); ?> IDR
                    </td>
                    <td class="align-middle">
                        <?= $order['orderDate']; ?>
                    </td>
                    <td class="align-middle">
                        <?= $order['orderMethod']; ?>
                        <div class="badge <?= ($order['orderStatus'] == 'pending') ? 'badge-warning' : 'badge-success'; ?>">
                            <?= $order['orderStatus']; ?>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>