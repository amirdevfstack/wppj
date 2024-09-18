<?php

/**
 * Template Name: TNC Menu Page
 * Description: Custom front page template from TNC.
 */

include get_theme_file_path('/public/tnc-header.php');

?>
<div class="section" style="margin-top: 50px;">
    <div class="container">
        <h2 class="section-title">Find what you need</h2>
        <div class="row">
            <div class="col-md-3">
                <div class="collapse-panel">
                    <div class="card-body">
                        <div class="card card-refine card-plain">
                            <h4 class="card-title">
                                Refine
                                <button class="btn btn-default btn-icon btn-neutral pull-right" rel="tooltip" title=""
                                    data-original-title="Reset Filter">
                                    <i class="arrows-1_refresh-69 now-ui-icons"></i>
                                </button>
                            </h4>
                            <div class="card-header" role="tab" id="headingOne">
                                <h6 class="mb-0">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"
                                        aria-expanded="true" aria-controls="collapseOne">
                                        Price Range
                                        <i class="now-ui-icons arrows-1_minimal-down"></i>
                                    </a>
                                </h6>
                            </div>
                            <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
                                <div class="card-body">
                                    <span id="price-left" class="price-left pull-left" data-currency="€">€42</span>
                                    <span id="price-right" class="price-right pull-right" data-currency="€">€880</span>
                                    <div class="clearfix"></div>
                                    <div id="sliderRefine"
                                        class="slider slider-refine noUi-target noUi-ltr noUi-horizontal">
                                        <div class="noUi-base">
                                            <div class="noUi-origin" style="left: 1.37931%;">
                                                <div class="noUi-handle noUi-handle-lower" data-handle="0"
                                                    style="z-index: 5;"></div>
                                            </div>
                                            <div class="noUi-connect" style="left: 1.37931%; right: 2.29885%;"></div>
                                            <div class="noUi-origin" style="left: 97.7011%;">
                                                <div class="noUi-handle noUi-handle-upper" data-handle="1"
                                                    style="z-index: 4;"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card card-refine card-plain">
                            <div class="card-header" role="tab" id="headingTwo">
                                <h6 class="mb-0">
                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion"
                                        href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Clothing
                                        <i class="now-ui-icons arrows-1_minimal-down"></i>
                                    </a>
                                </h6>
                            </div>
                            <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo">
                                <div class="card-body">
                                    <div class="checkbox">
                                        <input id="checkbox1" type="checkbox" checked="">
                                        <label for="checkbox1">
                                            Blazers
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <input id="checkbox2" type="checkbox">
                                        <label for="checkbox2">
                                            Casual Shirts
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <input id="checkbox3" type="checkbox">
                                        <label for="checkbox3">
                                            Formal Shirts
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <input id="checkbox4" type="checkbox">
                                        <label for="checkbox4">
                                            Jeans
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <input id="checkbox5" type="checkbox">
                                        <label for="checkbox5">
                                            Polos
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <input id="checkbox6" type="checkbox">
                                        <label for="checkbox6">
                                            Pijamas
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <input id="checkbox7" type="checkbox">
                                        <label for="checkbox7">
                                            Shorts
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <input id="checkbox8" type="checkbox">
                                        <label for="checkbox8">
                                            Trousers
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card card-refine card-plain">
                            <div class="card-header" role="tab" id="headingThree">
                                <h6 class="mb-0">
                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion"
                                        href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        Designer
                                        <i class="now-ui-icons arrows-1_minimal-down"></i>
                                    </a>
                                </h6>
                            </div>
                            <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree">
                                <div class="card-body">
                                    <div class="checkbox">
                                        <input id="checkbox9" type="checkbox">
                                        <label for="checkbox9">
                                            All
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <input id="checkbox10" type="checkbox">
                                        <label for="checkbox10">
                                            Polo Ralph Lauren
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <input id="checkbox11" type="checkbox">
                                        <label for="checkbox11">
                                            Wooyoungmi
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <input id="checkbox12" type="checkbox">
                                        <label for="checkbox12">
                                            Alexander McQueen
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <input id="checkbox13" type="checkbox">
                                        <label for="checkbox13">
                                            Tom Ford
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <input id="checkbox14" type="checkbox">
                                        <label for="checkbox14">
                                            AMI
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <input id="checkbox15" type="checkbox">
                                        <label for="checkbox15">
                                            Berena
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <input id="checkbox16" type="checkbox">
                                        <label for="checkbox16">
                                            Thom Sweeney
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <input id="checkbox17" type="checkbox">
                                        <label for="checkbox17">
                                            Burberry Prorsum
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <input id="checkbox18" type="checkbox">
                                        <label for="checkbox18">
                                            Calvin Klein
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <input id="checkbox19" type="checkbox">
                                        <label for="checkbox19">
                                            Kingsman
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <input id="checkbox20" type="checkbox">
                                        <label for="checkbox20">
                                            Club Monaco
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <input id="checkbox21" type="checkbox">
                                        <label for="checkbox21">
                                            Dolce &amp; Gabbana
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <input id="checkbox22" type="checkbox">
                                        <label for="checkbox22">
                                            Gucci
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <input id="checkbox23" type="checkbox">
                                        <label for="checkbox23">
                                            Biglioli
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <input id="checkbox24" type="checkbox">
                                        <label for="checkbox24">
                                            Lanvin
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <input id="checkbox25" type="checkbox">
                                        <label for="checkbox25">
                                            Loro Piana
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <input id="checkbox26" type="checkbox">
                                        <label for="checkbox26">
                                            Massimo Alba
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card card-refine card-plain">
                            <div class="card-header" role="tab" id="headingfour">
                                <h6 class="mb-0">
                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion"
                                        href="#collapsefour" aria-expanded="false" aria-controls="collapsefour">
                                        Colour
                                        <i class="now-ui-icons arrows-1_minimal-down"></i>
                                    </a>
                                </h6>
                            </div>
                            <div id="collapsefour" class="collapse" role="tabpanel" aria-labelledby="headingfour">
                                <div class="card-body">
                                    <div class="checkbox">
                                        <input id="checkbox27" type="checkbox">
                                        <label for="checkbox27">
                                            All
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <input id="checkbox28" type="checkbox">
                                        <label for="checkbox28">
                                            Black
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <input id="checkbox29" type="checkbox">
                                        <label for="checkbox29">
                                            Blue
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <input id="checkbox30" type="checkbox">
                                        <label for="checkbox30">
                                            Brown
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <input id="checkbox31" type="checkbox">
                                        <label for="checkbox31">
                                            Gray
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <input id="checkbox32" type="checkbox">
                                        <label for="checkbox32">
                                            Green
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <input id="checkbox33" type="checkbox">
                                        <label for="checkbox33">
                                            Neutrals
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <input id="checkbox34" type="checkbox">
                                        <label for="checkbox34">
                                            Purple
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="card card-product card-plain">
                            <div class="card-image">
                                <a href="#">
                                    <img src="../assets/img/polo.jpg" alt="...">
                                </a>
                            </div>
                            <div class="card-body">
                                <a href="#">
                                    <h4 class="card-title">Polo Ralph Lauren</h4>
                                </a>
                                <p class="card-description">
                                    Impeccably tailored in Italy from lightweight navy wool.
                                </p>
                                <div class="card-footer">
                                    <div class="price-container">
                                        <span class="price"> € 300</span>
                                    </div>
                                    <button class="btn btn-danger btn-neutral btn-icon btn-round pull-right"
                                        rel="tooltip" title="" data-placement="left"
                                        data-original-title="Remove from wishlist">
                                        <i class="now-ui-icons ui-2_favourite-28"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- end card -->
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="card card-product card-plain">
                            <div class="card-image">
                                <a href="#">
                                    <img src="../assets/img/tom-ford.jpg" alt="...">
                                </a>
                            </div>
                            <div class="card-body">
                                <a href="#">
                                    <h4 class="card-title">Tom Ford</h4>
                                </a>
                                <p class="card-description">
                                    Immaculate tailoring is TOM FORD's forte.
                                </p>
                                <div class="card-footer">
                                    <div class="price-container">
                                        <span class="price"> € 879</span>
                                    </div>
                                    <button class="btn btn-neutral btn-icon btn-round pull-right" rel="tooltip" title=""
                                        data-placement="left" data-original-title="Add to wishlist">
                                        <i class="now-ui-icons ui-2_favourite-28"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- end card -->
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="card card-product card-plain">
                            <div class="card-image">
                                <a href="#">
                                    <img src="../assets/img/wooyoungmi.jpg" alt="...">
                                </a>
                            </div>
                            <div class="card-body">
                                <a href="#">
                                    <h4 class="card-title">Wooyoungmi</h4>
                                </a>
                                <p class="card-description">
                                    Dark-grey slub wool, pintucked notch lapels.
                                </p>
                                <div class="card-footer">
                                    <div class="price-container">
                                        <span class="price">€ 555</span>
                                    </div>
                                    <button class="btn btn-neutral btn-icon btn-round pull-right" rel="tooltip" title=""
                                        data-placement="left" data-original-title="Add to wishlist">
                                        <i class="now-ui-icons ui-2_favourite-28"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- end card -->
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="card card-product card-plain">
                            <div class="card-image">
                                <a href="#">
                                    <img src="../assets/img/sweeney.jpg" alt="...">
                                </a>
                            </div>
                            <div class="card-body">
                                <a href="#">
                                    <h4 class="card-title">Thom Sweeney</h4>
                                </a>
                                <p class="card-description">
                                    It's made from lightweight grey wool woven.
                                </p>
                                <div class="card-footer">
                                    <div class="price-container">
                                        <span class="price"> € 680</span>
                                    </div>
                                    <button class="btn btn-neutral btn-icon btn-round pull-right" rel="tooltip" title=""
                                        data-placement="left" data-original-title="Add to wishlist">
                                        <i class="now-ui-icons ui-2_favourite-28"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- end card -->
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="card card-product card-plain">
                            <div class="card-image">
                                <a href="#">
                                    <img src="../assets/img/kingsman.jpg" alt="...">
                                </a>
                            </div>
                            <div class="card-body">
                                <a href="#">
                                    <h4 class="card-title">Kingsman</h4>
                                </a>
                                <p class="card-description">
                                    Crafted from khaki cotton and fully canvassed.
                                </p>
                                <div class="card-footer">
                                    <div class="price-container">
                                        <span class="price"> € 725</span>
                                    </div>
                                    <button class="btn btn-neutral btn-icon btn-round pull-right" rel="tooltip" title=""
                                        data-placement="left" data-original-title="Remove from wishlist">
                                        <i class="now-ui-icons ui-2_favourite-28"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- end card -->
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="card card-product card-plain">
                            <div class="card-image">
                                <a href="#">
                                    <img src="../assets/img/boglioli.jpg" alt="...">
                                </a>
                            </div>
                            <div class="card-body">
                                <a href="#">
                                    <h4 class="card-title">Boglioli</h4>
                                </a>
                                <p class="card-description">
                                    Masterfully crafted in Northern Italy.
                                </p>
                                <div class="card-footer">
                                    <div class="price-container">
                                        <span class="price">€ 699</span>
                                    </div>
                                    <button class="btn btn-neutral btn-icon btn-round pull-right" rel="tooltip" title=""
                                        data-placement="left" data-original-title="Add to wishlist">
                                        <i class="now-ui-icons ui-2_favourite-28"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- end card -->
                    </div>
                    <div class="col-md-3 ml-auto mr-auto">
                        <button rel="tooltip" class="btn btn-primary btn-round" data-original-title="" title="">Load
                            more...</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php

include get_theme_file_path('/public/tnc-header.php');

?>