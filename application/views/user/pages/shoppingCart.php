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
						<!-- Your cart items will be dynamically generated here -->
						<?php foreach ($products as $product): ?>
							<tr>
								<td class="align-middle">
									<img src="<?= base_url(); ?>assets/img/<?= $product['productImage']; ?>"
										alt="Product Image">
								</td>
								<th class="align-middle">
									<?= $product['productName']; ?>
								</th>
								<td class="align-middle">
									<?= $product['productSellingPrice']; ?>0 IDR
								</td>
								<td>
									<input type="number" value="1" min="1">
								</td>
								<td>
									<div class="btn-group" role="group" aria-label="Basic mixed styles example">
										<button onclick="confirmDeleteProduct(24)" class="btn btn-danger">
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
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
			<div class="col-md-1">

			</div>
			<div class="col-md-3">
				<div class="sticky-cart">
					<div class="row mb-3">
						<div class="col-md-12">
							<!-- Display product list with prices -->
							<table class="table mb-3">
								<tbody>
									<tr>
										<td colspan="2">
											<div class="row">
												<div class="col-md-12 text-center">
													<p class="text-black h4 text-uppercase">Payment Details</p>
												</div>
											</div>
										</td>
									</tr>
									<?php foreach ($products as $item): ?>
										<tr>
											<td>
												<?= $item['productName']; ?>
											</td>
											<td class="text-right">
												<?= $item['productPrice']; ?>0 IDR
											</td>
										</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
							<div class="row mb-5">
								<div class="col-md-6">
									<span class="text-black">Subtotal</span>
								</div>
								<div class="col-md-6 text-right">
									<strong class="text-black">
										<!-- Total price will be dynamically calculated and displayed here -->
									</strong>
								</div>
							</div>
							<a href="<?= base_url('checkout'); ?>"
								class="btn btn-black btn-lg py-3 btn-block">Checkout</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>