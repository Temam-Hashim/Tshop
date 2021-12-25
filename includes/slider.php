<section id="aa-slider" style="background-image:url('images/slider/dark.jpg');" data-image-src="images/slider/dark.jpg">
    <div class="aa-slider-area">
      <div id="sequence" class="seq">
        <div class="seq-screen">
        <?php
            $sql = "SELECT * FROM `promo_images` ORDER BY rand() limit 5";
            $result = $connect->query($sql);
      ?>
          <ul class="seq-canvas">
            <!-- single slide item -->
            <?php while($row = $result->fetch_assoc()){ ?>
            <li>
              <div class="seq-model">
                <img class="img-responsive" data-seq class="text-cneter" src="<?php echo $row['images'] ?>" alt=" <?php echo $row['name'] ?>" />
              </div>
              <div class="seq-title">
               <span data-seq style="color:black;">Save Up to <?php echo $row['discount'] ?>% Off</span>
                <h2 data-seq style="color:black;"> <?php echo $row['name'] ?></h2>
                <p data-seq style="background-color:black;"> <?php echo $row['desc'] ?></p>
                <a data-seq href="product.php" class="aa-shop-now-btn aa-secondary-btn">SHOP NOW</a>
             </div>
             </li>
             <?php } ?>
             </ul>
             </div>

        <fieldset class="seq-nav" aria-controls="sequence" aria-label="Slider buttons">
          <a type="button" class="seq-prev" aria-label="Previous"><span class="fa fa-angle-left"></span></a>
          <a type="button" class="seq-next" aria-label="Next"><span class="fa fa-angle-right"></span></a>
        </fieldset>
      </div>
    </div>
  </section>