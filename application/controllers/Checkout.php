<?php
class Checkout extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Auth');
        $this->load->model('Data');
        $this->load->library('session');
        $this->load->config('midtrans');
        $this->load->helper('url');
        require_once(APPPATH . 'libraries/Midtrans.php');
        require_once './Midtrans/Midtrans/Config.php';
        require_once './Midtrans/Midtrans/Snap.php';
        require_once './Midtrans/Midtrans/Sanitizer.php';
        require_once './Midtrans/Midtrans/ApiRequestor.php';

    }

    public function index()
    {
        \Midtrans\Config::$serverKey = 'SB-Mid-server-uXlK-JboSjnzbCyhfx5jGpg_';
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Tangkap data form
            $username = $_POST['username'];
            $useremail = $_POST['useremail'];
            $userphone = $_POST['userphone'];
            $useraddress = $_POST['useraddress'];

            $userid = $_SESSION['userID'];

            $dsn = "mysql:host=localhost;dbname=db_chasierapp";
            $dsnusername = "thedonutadmin";
            $dsnpassword = "rESO1A";


            try {
                $conn = new PDO($dsn, $dsnusername, $dsnpassword);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                // Buat query SQL untuk mengambil produk dari tabel keranjang belanja yang terkait dengan pengguna yang sedang login
                $sql = "SELECT c.cartID, p.productName, p.productSellingPrice, c.cartQuantity 
                FROM tb_cart c 
                JOIN tb_product p ON c.productID = p.productID
                WHERE c.userID = :userID";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':userID', $userid);
                $stmt->execute();

                // Proses hasil query
                $cartProducts = $stmt->fetchAll(PDO::FETCH_ASSOC);

            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }

            // Tutup koneksi ke database
            $conn = null;

            $itemDetails = [];

            foreach ($cartProducts as $product) {
                // Format setiap produk ke dalam struktur yang sesuai dengan Midtrans Snap
                $cartid = $product['cartID'];
                $price = $product['productSellingPrice'] * 1000;
                $cartquantity = $product['cartQuantity'];
                $item = [
                    'id' => $cartid, // ID produk
                    'price' => $price, // Harga produk
                    'quantity' => $cartquantity, // Jumlah produk
                    'name' => $product['productName'] // Nama produk
                ];

                // Tambahkan produk yang telah diformat ke dalam array $itemDetails
                $itemDetails[] = $item;
            }

            // Generate order ID
            $orderid = rand(); // Or use any other method to generate a unique order ID
            $transaction_time = date('Y-m-d H:i:s');
            $subtotal = 0;
            foreach ($itemDetails as $item) {
                $subtotal += $item['price'] * $item['quantity'];
            }

            // Bentuk parameter transaksi
            $params = array(
                'transaction_details' => array(
                    'order_id' => $orderid,
                    'gross_amount' => $subtotal,
                    'transaction_time' => $transaction_time
                ),
                'customer_details' => array(
                    'first_name' => $username,
                    'email' => $useremail,
                    'phone' => $userphone,
                    'address' => $useraddress,
                ),
                'item_details' => $itemDetails
            );

            $transaction = array(
                'orderID' => $orderid,
                'userID' => $userid,
                'cartID' => $cartid,
                'cartQuantity' => $cartquantity,
                'orderDate' => $transaction_time,
                'orderTotalPrice' => $subtotal,
                'orderMethod' => 'transfer',
                'orderStatus' => 'done',
            );

            $data = [
                'snapToken' => \Midtrans\Snap::getSnapToken($params)
            ];

            $this->db->insert('tb_order', $transaction);
        }

        $this->Auth->check_customer(); // Memeriksa apakah pengguna adalah customer

        $data['title'] = 'Checkout';
        $table = 'tb_store';

        $this->load->database();

        $data['storedatas'] = $this->Data->getStoreData($table);
        $StoreName = '';
        if (!empty($data['storedatas'])) {
            $StoreName = $data['storedatas'][0]['storeName'];
        }
        $data['StoreName'] = $StoreName;

        $userid = $this->session->userdata('userID');
        // Get the count of items in the cart
        $cart_count = $this->Cart->countItems($userid); // This function should return the count of items

        // Pass the count to the header view
        $data['cart_count'] = $cart_count;

        $this->load->view('user/templates/header', $data);
        $this->load->view('user/pages/checkout', $data);
        $this->load->view('user/templates/footer');
    }
}