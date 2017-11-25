	<?php

	$sql = "SELECT * FROM  products WHERE featured = 1";
	$result = $conn->query($sql);

	while ($pro = $result->fetch_assoc()) : ?>
		
		<div class=" col-xs-6 col-md-3">
			<div class="">
					<img src=<?= $pro['image']; ?> alt=<?= $pro['title']; ?> class="img-thumb">
					<h4><?= $pro['title']; ?></h4>
					<p class="list-price text-danger">List Price: <s>£<?= $pro['price']; ?></s></p>
					<p>Our Price: £<?= $pro['our_price']; ?></p>
					<button type="button" class="btn btn-sm btn-success" onclick="featuredetails(<?= $pro['id']; ?>)">View product</button>
			</div>
		</div>



	<?php endwhile; ?>