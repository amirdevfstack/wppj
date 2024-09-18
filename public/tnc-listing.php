<?php
/**
 * Template Name: TNC Listings
 * Description: A page template for displaying business listings on a Google Map.
 */

function tnc_enqueue_and_localize_scripts()
{
    // Assuming 'listing-map' is the handle for your script file
    wp_enqueue_script('listing-map', get_template_directory_uri() . '/public/theme/js/listing-map.js', array('jquery'), null, true);

    // Fetch the slider data from the WordPress options table
    $listings_data = get_option('business_listings_data', array());

    // Localize the script with your listings data
    wp_localize_script('listing-map', 'listingsData', $listings_data);

    error_log(print_r($listings_data, true));
}

add_action('wp_enqueue_scripts', 'tnc_enqueue_and_localize_scripts');

include get_theme_file_path('/public/tnc-header.php');

?>

<main class="site-main" style="position: fixed; top: 60px; right: 0; bottom: 75px; left: 0;" role="main">
    <div id="map" style="height: 100%; width: 100%;"></div>
    <div style="position: fixed; top: 150px; bottom: 100px; left: 15px; width: 475px; overflow-y: auto; z-index: 1;">
        <div id="sidebar-wrapper">
            <?php $listings_data = get_option('business_listings_data', []); ?>
            <?php if (!empty($listings_data) && is_array($listings_data)): ?>
                <?php foreach ($listings_data as $business): ?>
                    <div class="list-group" style="margin-top: 15px;">
                        <div class="list-group-item bg-light" style="background-color: rgba(0,0,0,.85) !important;">
                            <h5 class="mb-1 text-white">
                                <?= esc_html($business['name']) ?>
                            </h5>
                            <div>
                                <strong class="text-white">Contact:</strong>
                                <p class="text-white">
                                    Phone:
                                    <?= esc_html($business['phone']) ?><br>
                                    Email: <a href="mailto:<?= esc_attr($business['email']) ?>">
                                        <?= esc_html($business['email']) ?>
                                    </a><br>
                                    Address:
                                    <?= esc_html($business['street']) . (isset($business['street2']) ? ', ' . esc_html($business['street2']) : '') . ' ' . esc_html($business['city']) . ', ' . esc_html($business['state']) . ' ' . esc_html($business['postal_code']) . ', ' . esc_html($business['country']) ?>
                                </p>
                            </div>
                            <?php if ((isset($business['delivery']) && !empty($business['delivery'])) || (isset($business['pickup']) && !empty($business['pickup'])) || (isset($business['curbside']) && !empty($business['curbside']))): ?>
                                <div>
                                    <strong class="text-white">Services:</strong>
                                    <ul class="text-white">
                                        <?php if (isset($business['delivery']) && !empty($business['delivery'])): ?>
                                            <li>Delivery Available</li>
                                        <?php endif; ?>
                                        <?php if (isset($business['pickup']) && !empty($business['pickup'])): ?>
                                            <li>Pickup Available</li>
                                        <?php endif; ?>
                                        <?php if (isset($business['curbside']) && !empty($business['curbside'])): ?>
                                            <li>Curbside Pickup Available</li>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                            <?php endif; ?>

                            <?php if (!empty($business['hours'])): ?>
                                <div>
                                    <strong class="text-white">Hours:</strong>
                                    <p class="text-white">
                                        <?= esc_html($business['hours']) ?>
                                    </p>
                                </div>
                            <?php endif; ?>
                            <div>
                                <strong class="text-white">More Info:</strong>
                                <p class="text-white"><a href="<?= esc_url($business['website']) ?>" target="_blank">Website</a>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No listings data available.</p>
            <?php endif; ?>
        </div>
    </div>
</main>

<?php
include get_theme_file_path('/public/tnc-footer.php');
?>
<?php
$best_rating = 5;
$html_json_ld = "";
foreach ($listings_data[0]['day_range'] as $key => $value) {
    $convertedArray = '';
    foreach ($value as $day) {
        $convertedArray .= '"' . $day . '",';
    }
    $html_json_ld .= '{
          "@type": "OpeningHoursSpecification",
          "dayOfWeek": [
            ' . $convertedArray . '
          ],
          "opens": "' . $listings_data[0]['opening_hours'][0][$key] . '",
          "closes": "' . $listings_data[0]['closing_hours'][0][$key] . '"
        },
        ';
}


?>
<script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "<?php echo $listings_data[0]['type_select']; ?>",
      "image": [
        "<?php echo $listings_data[0]['image']; ?>"
       ],
      "name": "<?php echo $listings_data[0]['name']; ?>",
      "address": {
        "@type": "PostalAddress",
        "streetAddress": "<?php echo $listings_data[0]['street2']; ?>",
        "addressLocality": "<?php echo $listings_data[0]['city']; ?>",
        "addressRegion": "<?php echo $listings_data[0]['state']; ?>",
        "postalCode": "<?php echo $listings_data[0]['postal_code']; ?>",
        "addressCountry": "<?php echo $listings_data[0]['country']; ?>"
      },
      "review": {
        "@type": "Review",
        "reviewRating": {
          "@type": "Rating",
          "ratingValue": "<?php echo $listings_data[0]['review_rating']; ?>",
          "bestRating": "<?php echo $best_rating; ?>"
        },
        "author": {
          "@type": "Person",
          "name": "<?php echo $listings_data[0]['author_name']; ?>"
        }
      },
      "geo": {
        "@type": "GeoCoordinates",
        "latitude": "<?php echo $listings_data[0]['latitude']; ?>",
        "longitude": "<?php echo $listings_data[0]['longitude']; ?>"
      },
      "url": "<?php echo home_url('/'); ?>",
      "telephone": "<?php echo $listings_data[0]['phone']; ?>",
      "servesCuisine": "<?php echo $listings_data[0]['cuisine'][0]; ?>",
      "priceRange": "<?php echo $listings_data[0]['dropdown_price']; ?>",
      "openingHoursSpecification": [
        "<?php echo $html_json_ld; ?>" 
      ],
      "menu": "<?php echo $listings_data[0]['menu_url']; ?>"
    }
    </script>