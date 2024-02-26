<div class="admin-list">
    <div class="card-header">
        <h4>Order List</h4>
    </div>
    <table class="table">
        <thead class="table-light">
            <tr>
                <th scope="col">Order ID</th>
                <th scope="col">Customer</th>
                <!-- <th scope="col">Chasier</th> -->
                <th scope="col">Products</th>
                <th scope="col">Total Price</th>
                <th scope="col">Date</th>
                <th scope="col">Status Payment</th>
                <th scope="col">Method Payment</th>
                <!-- <th scope="col">Action</th> -->
            </tr>
        </thead>
        <tbody>
            <?php foreach ($orders as $order): ?>
                <tr>
                    <th scope="row">#
                        <?php echo $order['orderID']; ?>
                    </th>
                    <td>
                        <?php echo $order['userName']; ?>
                    </td>
                    <td>
                        <ul>
                            <?php foreach ($orders as $option): ?>
                                <li>
                                    <?php echo $option['productName']; ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </td>
                    <td>
                        <?php echo $order['orderTotalPrice']; ?>0 IDR
                    </td>
                    <td>
                        <?php echo $order['orderDate']; ?>
                    </td>
                    <td>
                        <?php echo $order['orderStatus']; ?>
                    </td>
                    <td>
                        <?php echo $order['orderMethod']; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>