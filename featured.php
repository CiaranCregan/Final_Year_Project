	<?php

	$sql = "SELECT * FROM  products WHERE featured = 1";
	$result = $conn->query($sql);

	while ($pro = $result->fetch_assoc()) : ?>
		<section id="best-sellers">
			<div class="col-md-3 col-sm-6 col-xs-6">
						<img src=<?= $pro['image']; ?> alt=<?= $pro['title']; ?> class="img-thumb">
						<div class="content">
							<h4><?= $pro['title']; ?></h4>
							<p class="list-price text-danger">List Price: <s>£<?= $pro['price']; ?></s></p>
							<p>Our Price: £<?= $pro['our_price']; ?></p>
							<button type="button" class="btn btn-default" onclick="featuredetails(<?= $pro['id']; ?>)">View product</button>
						</div>
			</div>
		</section>
	<?php endwhile; ?>