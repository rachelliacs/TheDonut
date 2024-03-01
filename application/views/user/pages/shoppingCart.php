<div class="section padding-large">
	<div class="container">
		<div class="row">
			<div class="col-md-8 mb-5">
				<!-- Cart items display -->
				<table class="table table-transparent table-striped">
					<tbody>
						<tr>
							<td colspan="5">
								<h1>Cart</h1>
							</td>
						</tr>
						<!-- Check if the cart is empty -->
						<?php if (empty($carts)): ?>
							<tr>
								<td colspan="5" class="text-center">
									<p class="mb-5 mt-5">Your cart is empty <a href="<?= base_url(); ?>#selling-products">Go
											Shopping</a></p>
								</td>
							</tr>
						<?php else: ?>
							<!-- Your cart items will be dynamically generated here -->
							<?php foreach ($carts as $cart): ?>
								<?php if ($cart['userID'] == $this->session->userdata('userID')): ?>
									<tr>
										<td class="align-middle">
											<img src="<?= base_url(); ?>assets/img/<?= $cart['productImage']; ?>"
												alt="Product Image">
										</td>
										<th class="align-middle">
											<?= $cart['productName']; ?>
										</th>
										<td class="align-middle">
											<?= $cart['productSellingPrice']; ?>0 IDR
										</td>
										<td class="align-middle">
											<?= $cart['cartQuantity']; ?>
										</td>
										<td>
											<div class="btn-group" role="group" aria-label="Basic mixed styles example">
												<button onclick="confirmDeleteProductCart(<?php echo $cart['cartID']; ?>)"
													class="btn btn-danger">
													<svg width="32" height="32" viewBox="0 0 32 32" fill="none"
														xmlns="http://www.w3.org/2000/svg">
														<path
															d="M8.00002 25.3333C8.00002 26.0406 8.28097 26.7189 8.78107 27.219C9.28117 27.719 9.95944 28 10.6667 28H21.3334C22.0406 28 22.7189 27.719 23.219 27.219C23.7191 26.7189 24 26.0406 24 25.3333V9.33333H8.00002V25.3333ZM10.6667 12H21.3334V25.3333H10.6667V12ZM20.6667 5.33333L19.3334 4H12.6667L11.3334 5.33333H6.66669V8H25.3334V5.33333H20.6667Z"
															fill="white"></path>
													</svg>
												</button>
											</div>
										</td>
									</tr>
								<?php endif; ?>
							<?php endforeach; ?>
							<tr>
								<td colspan="5" class="text-center">
									<p><a href="<?= base_url(); ?>#selling-products">Continue Shopping</a></p>
								</td>
							</tr>
						<?php endif; ?>
					</tbody>
				</table>
			</div>
			<div class="col-md-1"></div>
			<div class="col-md-3">
				<div class="sticky-cart">
					<div class="row mb-3">
						<div class="col-md-12">
							<?php if (!empty($carts)): ?>
								<!-- Display product list with prices -->
								<table class="table mb-3">
									<tbody>
										<tr>
											<td colspan="2">
												<div class="row">
													<div class="col-12 text-center">
														<p class="text-black h4 text-uppercase">Payment Details</p>
													</div>
												</div>
											</td>
										</tr>
										<?php
										// Initialize subtotal
										$subtotal = 0;
										?>
										<!-- Iterate over products to display their names and total prices -->
										<?php foreach ($carts as $cart): ?>
											<?php if ($cart['userID'] == $this->session->userdata('userID')): ?>
												<tr>
													<td>
														<?= $cart['productName']; ?>
													</td>
													<td class="text-right">
														<?php
														// Calculate total price for the product
														$totalprice = ($cart['productSellingPrice'] * $cart['cartQuantity']) * 1000;
														// Add total price to subtotal
														$subtotal += $totalprice;
														// Display total price
														echo number_format($totalprice, 0, '.', '.');
														?> IDR
													</td>
												</tr>
											<?php endif; ?>
										<?php endforeach; ?>
									</tbody>
								</table>
								<div class="row mb-5" style="margin-left: 0px;">
									<div class="col-md-6">
										<span class="text-black">Subtotal</span>
									</div>
									<div class="col-md-6 text-right">
										<strong class="text-black">
											<!-- Total price will be dynamically calculated and displayed here -->
											<?php echo number_format($subtotal, 0, '.', '.'); ?> IDR
										</strong>
									</div>
								</div>
								<a href="<?= base_url('checkout'); ?>" class="btn btn-black btn-lg py-3 btn-block"
									id="checkout-btn">Checkout</a>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>