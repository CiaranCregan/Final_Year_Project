<?php 

    // https://www.egrappler.com/edmin/index.html
    require_once 'core/init.php';
    include 'includes/overall/m_header.php';

    $sql = "SELECT * FROM  products WHERE archived != 1";
    $result = $conn->query($sql);
?>
    <div class="jumbotron">
      <div class="container text-center">
          <h2 class="primary-color">Welcome to The Mattress Man Belfast</h2>
          <a href="#" class="btn btn-default">View all Beds</a>
          <a href="#" class="btn btn-default">View all Mattresses</a>
          <a href="#" class="btn btn-default">View all Headboards</a>
      </div>
    </div>

    <section id="beds">
        <div class="col-md-10 pull-right">
          <h2 class="text-center">Beds</h2>
          <?php while ($pro = $result->fetch_assoc()) : ?>
          <div class="col-md-3 col-sm-3 col-xs-12">
            <img src=<?= $pro['image']; ?> alt=<?= $pro['title']; ?> class="img-thumb">
            <h4 class="text-center"><?= $pro['title']; ?></h4>
            <div class="content text-center">
              <!-- <p class="list-price text-danger">£<?= $pro['price']; ?></p> -->
              <h3 style="color: green;">Price: £<?= $pro['our_price']; ?></h3>
            </div>
            <button type="button" class="btn btn-main btn-block" onclick="featuredetails(<?= $pro['id']; ?>)">View product</button>
      </div>
      <?php endwhile; ?>
        </div>
    </section>
    <?php include 'includes/overall/m_footer.php'; ?>