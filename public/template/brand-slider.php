<?php
   // Fetch the slider data from the WordPress options table
   $slider_data = get_option('brands_slider_data', []);
   $slider_data = maybe_unserialize($slider_data);
   if (!is_array($slider_data)) {
       $slider_data = [];
   }
   ?>
<div class="container d-none d-md-block">
   <div class="title text-center">
      <?php if(!empty($slider_data)): ?>
      <h3>Featured</h3>
      <?php endif; ?>
   </div>
   <div class="row justify-content-center ">
      <div class="col-12">
         <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
               <?php foreach ($slider_data as $index => $slide): ?>
               <li data-target="#carouselExampleIndicators" data-slide-to="<?= $index; ?>" class="<?= $index === 0 ? 'active' : ''; ?>"></li>
               <?php endforeach; ?>
            </ol>
            <div class="carousel-inner" role="listbox">
               <?php foreach ($slider_data as $index => $slide): ?>
               <div class="carousel-item <?= $index === 0 ? 'active' : ''; ?>">
               <!-- SIDE BY SIDE START -->
               <div style="display: flex; width: 100%; height: 600px;">
                  <div style="text-align: center; padding: 25px; flex: 1; display: flex; align-items: center; justify-content: center;">
                        <div>
                           <h1 class="title" style="margin: 0;"><?= esc_attr($slide['name']); ?></h1>
                           <p><?= esc_html($slide['description']); ?></p>
                        </div>
                  </div>
                  <div style="flex: 1; background-image: url('<?= esc_url($slide['image']); ?>'); background-size: cover; background-position: center;"></div>
               </div>   
               <!-- SIDE BY SIDE END -->
               <!-- OVERLAY START -->
               <!-- <img class="d-block" src="<?= esc_url($slide['image']); ?>" alt="<?= esc_attr($slide['name']); ?>">
                  <div class="carousel-caption d-none d-md-block">
                     <h2><?= esc_attr($slide['name']); ?></h2>
                     <h5><?= esc_html($slide['description']); ?></h5>
                     <a class="btn btn-success" href="<?= esc_url($slide['link']); ?>">Shop <?= esc_attr($slide['name']); ?></a>
                  </div> -->
               <!-- OVERLAY END -->
               </div>
               <?php endforeach; ?>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <i class="now-ui-icons arrows-1_minimal-left"></i>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <i class="now-ui-icons arrows-1_minimal-right"></i>
            </a>
         </div>
      </div>
   </div>
</div>
<?php if(!empty($slider_data)): ?>
<div class="row d-block d-md-none mobile-slider">
   <div class="col-12">
      <div id="mobileCarouselIndicators" class="carousel slide" data-ride="carousel">
         <div class="carousel-inner" role="listbox">
            <?php foreach ($slider_data as $index => $slide): ?>
            <div class="carousel-item <?= $index === 0 ? 'active' : ''; ?>">
               <img class="d-block w-100" src="<?= esc_url($slide['image']); ?>" alt="<?= esc_attr($slide['name']); ?>">
               <div class="carousel-caption">
                  <h2><?= esc_attr($slide['name']); ?></h2>
                  <h5><?= esc_html($slide['description']); ?></h5>
                  <a class="btn btn-success" href="<?= esc_url($slide['link']); ?>">Shop <?= esc_attr($slide['name']); ?></a>
               </div>
            </div>
            <?php endforeach; ?>
         </div>
         <a class="carousel-control-prev" href="#mobileCarouselIndicators" role="button" data-slide="prev">
         <i class="now-ui-icons arrows-1_minimal-left"></i>
         </a>
         <a class="carousel-control-next" href="#mobileCarouselIndicators" role="button" data-slide="next">
         <i class="now-ui-icons arrows-1_minimal-right"></i>
         </a>
      </div>
   </div>
</div>
<?php endif; ?>
