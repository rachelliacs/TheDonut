<section id="hero" class="section section-hero">
	<div class="container">
		<div class="row">
			<div class="col-md-10">
				<h2 class="banner-title">
					<?php foreach ($storedatas as $storedata): ?>
						<?php echo $storedata['storeDesc']; ?>
					<?php endforeach; ?>
				</h2>
				<div class="btn-wrap">
					<a href="#selling-products" class="btn btn-light d-flex align-items-center" tabindex="0">Read Menu
						<i class="icon icon-arrow-io"></i>
					</a>
				</div>
			</div>
		</div>
	</div>
</section>
<section id="selling-products" class="product-store padding-large">
	<div class="container">
		<div class="section-header center">
			<h2 class="section-title">Our products</h2>
		</div>
		<ul class="tabs list-unstyled">
			<li data-tab-target="#all" class="active tab">All needs</li>
			<?php foreach ($productcategories as $productcategory): ?>
				<?php
				$productCategoryName = $productcategory['productCategoryName'];
				$words = explode(' ', $productCategoryName);
				?>
				<li data-tab-target="#<?php echo end($words); ?>" class="tab">
					<?php echo $productcategory['productCategoryName']; ?>
				</li>
			<?php endforeach; ?>
		</ul>
		<div class="tab-content">
			<div id="all" data-tab-content="" class="active">
				<div class="product-item-wrap">
					<?php foreach ($products as $product): ?>
						<a href="<?php echo base_url('product/view/' . $product['productID']); ?>">
							<div class="product-item">
								<div class="image-holder">
									<img src="<?= base_url(); ?>assets/img/<?= $product['productImage'] ?>"
										alt="<?= $product['productImage'] ?>" class="product-image" />
								</div>
								<div class="product-detail">
									<h3 class="product-title">
										<?php echo $product['productName']; ?>
									</h3>
									<div class="item-price text-primary">
										<?php echo $product['productPrice']; ?>0 IDR
									</div>
								</div>
							</div>
						</a>
					<?php endforeach; ?>
				</div>
			</div>
			<?php foreach ($productcategories as $productcategory): ?>
				<?php
				$productCategoryName = $productcategory['productCategoryName'];
				$words = explode(' ', $productCategoryName);
				?>
				<div id="<?php echo end($words); ?>" data-tab-content="">
					<div class="product-item-wrap">
						<?php foreach ($products as $product): ?>
							<?php if ($product['productCategoryID'] == $productcategory['productCategoryID']): ?>
								<a href="<?php echo base_url('product/view/' . $product['productID']); ?>">
									<div class="product-item">
										<div class="image-holder">
											<img src="<?= base_url(); ?>assets/img/<?= $product['productImage'] ?>"
												alt="<?= $product['productImage'] ?>" class="product-image" />
										</div>
										<div class="product-detail">
											<h3 class="product-title">
												<?php echo $product['productName']; ?>
											</h3>
											<div class="item-price text-primary">
												<?php echo $product['productPrice']; ?>0 IDR
											</div>
										</div>
									</div>
								</a>
							<?php endif; ?>
						<?php endforeach; ?>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>