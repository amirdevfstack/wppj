jQuery(document).ready(function($) {
    // Limit for links, social feeds, and social icons
    var maxLinks = 5;
    var maxSocialFeeds = 3;
    var maxSocialIcons = 5;

    // Add new link field (About Us and Market Links)
    $('.add-link').on('click', function(e) {
        e.preventDefault();
        var wrapper = $(this).closest('.repeatable-links-wrapper');
        var index = wrapper.find('.repeatable-link-row').length;

        if (index >= maxLinks) {
            alert('You can only add up to ' + maxLinks + ' links.');
            return;
        }

        // Remove the "Add Link" button temporarily
        var addButton = $(this).detach();

        // Create the new field with dynamic indexes for About Us or Market
        var section = $(this).data('section'); // Dynamically differentiate sections (about_us_links, market_links)
        var newField = `<div class="repeatable-link-row">
                          <input type="text" class="regular-text" name="footer_customization_options[${section}][${index}][label]" value="" placeholder="Link Label" />
                          <input type="url" class="regular-text" name="footer_customization_options[${section}][${index}][url]" value="" placeholder="Link URL" />
                          <button type="button" class="remove-link button">Remove</button>
                        </div>`;

        // Append the new field and then re-append the "Add Link" button at the bottom
        wrapper.append(newField).append(addButton);
    });

    // Remove link field (About Us and Market Links)
    $(document).on('click', '.remove-link', function(e) {
        e.preventDefault();
        var wrapper = $(this).closest('.repeatable-links-wrapper');
        var index = wrapper.find('.repeatable-link-row').length;

        // Prevent deletion if there is only one field left
        if (index === 1) {
            alert('You must have at least one link.');
            return;
        }

        $(this).closest('.repeatable-link-row').remove();
    });

    // Add new text field (Social Feed)
    $('.add-text').on('click', function(e) {
        e.preventDefault();
        var wrapper = $(this).closest('.repeatable-text-wrapper');
        var index = wrapper.find('.repeatable-text-row').length;

        if (index >= maxSocialFeeds) {
            alert('You can only add up to ' + maxSocialFeeds + ' social feeds.');
            return;
        }

        // Remove the "Add Text" button temporarily
        var addButton = $(this).detach();

        // Create the new field with dynamic indexes
        var newField = `<div class="repeatable-text-row">
                          <input type="text" class="regular-text" name="footer_customization_options[social_feed][${index}]" value="" placeholder="Feed Text" />
                          <button type="button" class="remove-text button">Remove</button>
                        </div>`;

        // Append the new field and then re-append the "Add Text" button at the bottom
        wrapper.append(newField).append(addButton);
    });

    // Remove text field (Social Feed)
    $(document).on('click', '.remove-text', function(e) {
        e.preventDefault();
        var wrapper = $(this).closest('.repeatable-text-wrapper');
        var index = wrapper.find('.repeatable-text-row').length;

        // Prevent deletion if there is only one field left
        if (index === 1) {
            alert('You must have at least one social feed.');
            return;
        }

        $(this).closest('.repeatable-text-row').remove();
    });

    // Add new icon field (Social Media Icons)
    $('.add-icon').on('click', function(e) {
        e.preventDefault();
        var wrapper = $(this).closest('.repeatable-social-icons-wrapper');
        var index = wrapper.find('.repeatable-social-icon-row').length;

        if (index >= maxSocialIcons) {
            alert('You can only add up to ' + maxSocialIcons + ' social media icons.');
            return;
        }

        // Remove the "Add Icon" button temporarily
        var addButton = $(this).detach();

        // Create the new field with dynamic indexes
        var newField = `<div class="repeatable-social-icon-row">
                          <input type="text" class="regular-text" name="footer_customization_options[social_icons][${index}][icon]" value="" placeholder="FontAwesome Icon Class (e.g., fa-twitter)" />
                          <input type="url" class="regular-text" name="footer_customization_options[social_icons][${index}][url]" value="" placeholder="Social Media URL" />
                          <button type="button" class="remove-icon button">Remove</button>
                        </div>`;

        // Append the new field and then re-append the "Add Icon" button at the bottom
        wrapper.append(newField).append(addButton);
    });

    // Remove icon field (Social Media Icons)
    $(document).on('click', '.remove-icon', function(e) {
        e.preventDefault();
        var wrapper = $(this).closest('.repeatable-social-icons-wrapper');
        var index = wrapper.find('.repeatable-social-icon-row').length;

        // Prevent deletion if there is only one field left
        if (index === 1) {
            alert('You must have at least one social media icon.');
            return;
        }

        $(this).closest('.repeatable-social-icon-row').remove();
    });
});
