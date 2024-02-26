<footer class="py-5 mg-auto-top">
    <div class="container">
        <div class="row d-flex flex-wrap">
            <div class="col-lg-4">
                <a href="/" class="d-flex align-items-center mb-3 link-body-emphasis text-decoration-none">
                    <h5>
                        <?php echo $StoreName ?>
                    </h5>
                </a>
                <p class="text-body-secondary">TheDonuts is the best donut restaurant in the Malang area. </p>
            </div>
            <div class="col-lg-2">
            </div>
            <div class="col-lg-3">
                <h5 class="mb-3">Need Help?</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Franchise</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Partnership</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Contact</a></li>
                </ul>
            </div>

            <div class="col-lg-3">
                <h5 class="mb-3">Follow Us On:</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Facebook</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">LinkedIn</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Instagram</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-eaP5uTo2Ar44qT5R"></script>
    <script type="text/javascript">
      document.getElementById('pay-button').onclick = function(){
        // SnapToken acquired from previous step
        snap.pay('<?=$snapToken?>', {
          // Optional
          onSuccess: function(result){
            /* You may add your own js here, this is just example */ document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
          },
          // Optional
          onPending: function(result){
            /* You may add your own js here, this is just example */ document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
          },
          // Optional
          onError: function(result){
            /* You may add your own js here, this is just example */ document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
          }
        });
      };
    </script>
<script>
    // EDITS
    // Event listener for edit button click
    $('.edit-btn').click(function () {
        // Get data from the clicked edit button
        var productImage = $(this).data('productimage');
        $('#productimage').attr('src', productImage); // Set image source

        var userID = $(this).data('userid');
        var userName = $(this).data('username');
        var userStatus = $(this).data('userstatus');
        var userEmail = $(this).data('useremail');
        var userPhone = $(this).data('userphone');
        var userPassword = $(this).data('userpassword');
        var storeID = $(this).data('storeid');
        var storeName = $(this).data('storename');
        var storeLogo = $(this).data('storelogo');
        var storeDesc = $(this).data('storedesc');
        var productID = $(this).data('productid');
        var productName = $(this).data('productname');
        var productDesc = $(this).data('productdesc');
        var productStock = $(this).data('productstock');
        var productPrice = $(this).data('productprice');
        var productSellingPrice = $(this).data('productsellingprice');
        var productCategoryID = $(this).data('productcategoryid');
        var productCategoryName = $(this).data('productcategoryname');

        // Set data to the form fields
        $('#userid').val(userID);
        $('#username').val(userName);
        $('#userstatus').val(userStatus);
        $('#useremail').val(userEmail);
        $('#userphone').val(userPhone);
        $('#userpassword').val(userPassword);
        $('#storeid').val(storeID);
        $('#storename').val(storeName);
        $('#storelogo').val(storeLogo);
        $('#storedesc').val(storeDesc);
        $('#productid').val(productID);
        $('#productname').val(productName);
        $('#productdesc').val(productDesc);
        $('#productstock').val(productStock);
        $('#productprice').val(productPrice);
        $('#productsellingprice').val(productSellingPrice);
        $('#productcategoryid').val(productCategoryID);
        $('#productcategoryname').val(productCategoryName);

        // Show the popup form
        $('#edit-popup').show();
    });

    $('.add-btn').click(function () {
        // Show the popup form
        $('#add-popup').show();
    });

    // Event listener for close button click
    $('#close-edit-popup').click(function () {
        // Hide the popup form
        $('#edit-popup').hide();
    });

    // Event listener for close button click
    $('#close-add-popup').click(function () {
        // Hide the popup form
        $('#add-popup').hide();
    });
</script>
<script>
    $(document).ready(function () {
        // Click event handler for small images
        $('.small-image').click(function () {
            // Get the URL of the clicked small image
            var smallImageUrl = $(this).data('small-image');

            // Update the main image src attribute
            $('#mainImage').attr('src', smallImageUrl);
        });
    });
</script>
<script>
    $(document).ready(function () {
        // Handle small image click
        $('.product-small-image').click(function () {
            var mainImage = $('#mainImage');
            var smallImageIndex = $(this).data('small-image-index');
            var smallImagePath = $(this).attr('src');
            var mainImagePath = $(this).data('main-image');

            // Update the main image source
            mainImage.attr('src', smallImagePath);

            // Optionally, you can also update the alt attribute or perform other actions
            // mainImage.attr('alt', 'New Alt Text');

            // Reset the previous clicked small image to its original state
            $('.small-image').removeClass('active');
            // Add a class to the clicked small image to highlight it
            $(this).addClass('active');
        });
    });
</script>
<script>
    // AOS.init();
</script>
<script>
    document.querySelector('.dropdown-toggle').addEventListener('click', function () {
        document.querySelector('.dropdown-menu').classList.toggle('show');
    });
</script>
<script>
    $(document).ready(function () {
        // Product link click event handler
        $(".product-link").click(function (e) {
            e.preventDefault(); // Prevent default link behavior

            // Retrieve Product ID from data attribute
            var productID = $(this).data("product-id");

            // AJAX request to fetch product details
            $.ajax({
                url: "fetch_product_details.php", // Replace with your server endpoint
                method: "POST",
                data: { productID: productID },
                success: function (response) {
                    // Update product details container with fetched details
                    $("#product-details-container").html(response);
                },
                error: function (xhr, status, error) {
                    console.error("Error fetching product details:", error);
                }
            });
        });
    });
</script>
<!-- Local JS -->
<!-- <script src="<?= base_url(); ?>application/assets/js/script.js"></script> -->
<script src="<?= base_url(); ?>templates/Ultras/js/jquery-1.11.0.min.js"></script>
<script src="<?= base_url(); ?>templates/Ultras/js/plugins.js"></script>
<script src="<?= base_url(); ?>templates/Ultras/js/script.js"></script>
<!--  -->
<!-- Online JS -->
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
<!--  -->
</body>

</html>