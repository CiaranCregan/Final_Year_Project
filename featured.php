	<?php

	$sql = "SELECT * FROM  products WHERE featured = 1";
	$result = $conn->query($sql);

	while ($pro = $result->fetch_assoc()) : ?>
		<section id="best-sellers">
			<div class="col-md-3 col-sm-3 col-xs-12">
						<img src=<?= $pro['image']; ?> alt=<?= $pro['title']; ?> class="img-thumb">
						<h4 class="text-center"><?= $pro['title']; ?></h4>
						<h4 class="text-center"><b><?=(($pro['storage'] == 0)?'without Drawers':'with Drawers');?></b></h4>
						<h4 class="text-center"><?= $pro['size']; ?> Bed</h4>
						<div class="content text-center">
							<h3 class="text-success">Price: £<?= $pro['our_price']; ?></h3>
						</div>
						<button type="button" class="btn btn-main btn-block" onclick="featuredetails(<?= $pro['id']; ?>)">View product</button>
			</div>
		</section>
	<?php endwhile; ?>