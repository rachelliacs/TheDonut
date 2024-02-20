<div class="section padding-small">
	<div class="container">
		<h1 class="mb-5">Cart</h1>
		<div class="d-flex flex-wrap">
			<div class="col-md-8 row mb-5">
				<!-- Cart items display -->
				<table class="table">
					<tbody>
						<!-- <?php foreach ($cart_items as $item): ?>
							<tr>
								<td>
									<?= $item['product_name']; ?>
								</td>
								<td>
									<?= $item['quantity']; ?>
								</td>
								<td>
									<?= $item['price']; ?>
								</td>
							</tr>
						<?php endforeach; ?> -->
					</tbody>
				</table>
			</div>
			<div class="col-md-4">
				<div class="row">
					<div class="col-md-12 text-right border-bottom mb-5">
						<h3 class="text-black h4 text-uppercase">Payment Details</h3>
					</div>
				</div>
				<div class="row mb-3">
					<div class="col-md-6">
						<span class="text-black">Subtotal</span>
					</div>
					<div class="col-md-6 text-right">
						<strong class="text-black">
							<!-- <?= $total_price; ?>0 IDR -->
						</strong>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<a href="<?= base_url('checkout'); ?>" class="btn btn-black btn-lg py-3 btn-block">Checkout</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>