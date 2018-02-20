	<?php

	$sql = "SELECT * FROM  products WHERE featured = 1";
	$result = $conn->query($sql);

	while ($pro = $result->fetch_assoc()) : ?>
		<section id="best-sellers">
			<div class="col-md-3 col-sm-6 col-xs-6">
						<img src=<?= $pro['image']; ?> alt=<?= $pro['title']; ?> class="img-thumb">
						<h4 class="text-center"><?= $pro['title']; ?></h4>
						<div class="content text-center">
							<!-- <p class="list-price text-danger">£<?= $pro['price']; ?></p> -->
							<h3 style="color: green;">Price: £<?= $pro['our_price']; ?></h3>
						</div>
						<button type="button" class="btn btn-main btn-block" onclick="featuredetails(<?= $pro['id']; ?>)">View product</button>
			</div>
		</section>
	<?php endwhile; ?>