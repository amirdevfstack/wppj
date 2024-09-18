jQuery(document).ready(function($) {
    console.log('HERE IS THE DATE PICKER')
    // Assuming you have a suitable Date+Time picker plugin/addon
    $('.datetime-picker').datetimepicker({
        dateFormat: 'yy-mm-dd',
        timeFormat: 'HH:mm:ss'
        // Additional options as needed
    });
});
