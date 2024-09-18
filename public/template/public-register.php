<?php
$authenticate_data = AuthenticateAdmin::get_authenticate_data();
$profile_bg_url = isset($authenticate_data['authenticate_bg_image']) ? esc_url($authenticate_data['authenticate_bg_image']) : '../assets/img/bg18.jpg';

echo '<p>Debug: Entered public-register.php</p>';
?>
<div class="page-header section-image">
    <div class="page-header-image" style="background-image:url('<?= $profile_bg_url; ?>')"></div>
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mr-auto">
                    <div class="social text-center mb-4">
                        <h4 class="card-description text-white">Social Registration</h5>
                        <button class="btn btn-icon btn-round btn-twitter">
                            <i class="fa fa-twitter"></i>
                        </button>
                        <button class="btn btn-icon btn-round btn-danger">
                            <i class="fa fa-google"></i>
                        </button>
                        <button class="btn btn-icon btn-round btn-facebook">
                            <i class="fa fa-facebook"> </i>
                        </button>
                    </div>
                    <div class="card card-signup">
                    <div class="card-body">
                        <h4 class="card-title text-center text-dark">Email / Password</h4>
                        <?php echo do_shortcode('[tnc_authentication_form]'); ?>
                    </div>
                </div>
                </div>
                <div class="col-md-4 ml-auto mr-auto">
                <?php
                    for ($i = 1; $i <= 3; $i++) {
                        $card_data = AuthenticateAdmin::get_card_data($i);
                        $image_url = isset($card_data['bg_image']) ? $card_data['bg_image'] : '';
                        $icon_class = isset($card_data['icon_class']) ? $card_data['icon_class'] : '';
                        $title = isset($card_data['title']) ? $card_data['title'] : '';
                        $text = isset($card_data['text']) ? $card_data['text'] : '';
                        ?>
                        <div class="info info-horizontal">
                            <div class="icon icon-primary">
                                <i class="<?= $icon_class ?>"></i>
                            </div>
                            <div class="description">
                                <h5 class="info-title"><?=  $title ?></h5>
                                <p class="description">
                                <?=  $text ?>
                                </p>
                            </div>
                        </div>
                        <?php } ?>
                </div>
              
            </div>
        </div>
    </div>
</div>