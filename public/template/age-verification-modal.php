<?php
$verification_active = VerificationAdmin::get_business_verification_by_slug('verification-active');
$verification_background_image = VerificationAdmin::get_business_verification_by_slug('verification-background-image');
$verification_title = VerificationAdmin::get_business_verification_by_slug('verification-title');
$verification_sub_title = VerificationAdmin::get_business_verification_by_slug('verification-sub-title');
$verification_accept_button = VerificationAdmin::get_business_verification_by_slug('verification-accept-button');
$verification_deny_button = VerificationAdmin::get_business_verification_by_slug('verification-deny-button');
$verification_deny_button_link = VerificationAdmin::get_business_verification_by_slug('verification-deny-button-link');
$verification_link = VerificationAdmin::get_business_verification_by_slug('verification-link');

$business_logo_short = VerificationAdmin::get_business_verification_by_slug('business-logo-short');

if($verification_active == true) {
?>
<!-- Age Verification Modal -->
<div id="ageVerificationModal" class="modal" tabindex="-1" role="dialog"
    style="display:none; background-color: rgba(00,00,00,.70);">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content modal-background-image"
            style="background-image: url('<?php echo $verification_background_image; ?>'); background-size: cover; background-position: center; height: auto;"
            role="document">
            <div class="modal-header modal-content-area">
            <img class="m-auto" style="display: block; height: 150px; widht: auto;" src="<?php
                    if (!empty ($business_logo_short)) {
                        echo esc_html($business_logo_short);
                    } ?>" />
            </div>
            <div class="modal-body modal-content-area  text-center">
                <h2 class="text-center text-white">
                    <?php echo $verification_title; ?>
                </h2>
                <h5 class="text-white  text-center">
                    <?php echo $verification_sub_title; ?>
                </h5>
                <button type="button" class="btn btn-success" id="verifyAge">
                    <?php echo $verification_accept_button; ?>
                </button>
                </br>
                <a href="<?= $verification_deny_button_link; ?>" type="button" class="btn btn-default" id="">
                    <?php echo $verification_deny_button; ?>
                </a>
            </div>
            <div class="modal-footer modal-content-area">
                <button type="button" class="btn btn-link btn-danger m-auto" id="">
                    <?php echo $verification_link; ?>
                </button>
            </div>
        </div>
    </div>
</div>
<?php 
}