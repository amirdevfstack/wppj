/**
 * Initializes functionality once the DOM is fully loaded.
 */
jQuery(document).ready(function ($) {
    // Retrieve dynamic data passed from WordPress.
    var dynamicData = ajax_object.dynamic_data;

    /**
     * Handles the form submission event.
     */
    $('#api_key_form').on('submit', function (e) {
        e.preventDefault(); // Prevent the default form submission.
        var formData = $(this).serialize(); // Serialize the form data for AJAX submission.
        var nonce = $('#your_nonce_name').val(); // Retrieve the nonce value.

        // Perform an AJAX request to handle form submission.
        $.ajax({
            url: ajax_object.ajax_url, // URL to WordPress AJAX handling.
            type: 'POST',
            data: formData + '&action=your_custom_action', // Append action to the serialized form data.
            success: function (response) {
                // Create the HTML structure for message display.
                var messageHtml = '<div class="notice">';
                messageHtml += '<span class="close-btn">&times;</span>'; // Add a close button.

                if (response.success) {
                    // If the AJAX request is successful, display the success message.
                    messageHtml += '<p>' + response.data + '</p>';
                    $('#message-container').html(messageHtml).addClass('notice-success');

                    // Re-initialize the DataTable with the updated data.
                    initializeDataTable('#dataTable', ajax_object, dynamicData.columns, dynamicData.subcolumns, ajax_object.allowDeletion);

                } else {
                    // If the AJAX request fails, display the error message.
                    messageHtml += '<p>' + response.data + '</p>';
                    $('#message-container').html(messageHtml).addClass('notice-error');
                }
            },
            error: function (xhr, status, error) {
                // Handle any other errors that might occur during the AJAX request.
                $('#message-container').html('<div class="notice notice-error"><span class="close-btn">&times;</span><p>An error occurred: ' + error + '</p></div>');
            }
        });
    });

    /**
     * Handles the click event on the close button to hide the notice message.
     */
    $(document).on('click', '.close-btn', function () {
        $(this).parent('.notice').fadeOut(); // Hides the parent notice message.
    });


    /**
     * Initializes the DataTable with dynamic columns and data.
     * 
     * @param {string} containerSelector - The selector for the DataTable container.
     * @param {Object} ajax_object - The AJAX object containing URL and action details.
     * @param {Array} baseColumns - The base columns for the DataTable.
     * @param {Array} subcolumns - The subcolumns for additional data.
     * @param {boolean} allowDeletion - Flag to allow deletion of rows.
     */

    function initializeDataTable(containerSelector, ajax_object, baseColumns, subcolumns, allowDeletion) {
        var container = $(containerSelector);

        if ($.fn.DataTable.isDataTable(containerSelector)) {
            $(containerSelector).DataTable().destroy();
            container.empty();
        }

        var uniqueTableId = 'dataTable-' + Math.floor(Math.random() * 1000);
        container.html('<table id="' + uniqueTableId + '" class="display" style="width:100%"></table>');

        var columns = JSON.parse(JSON.stringify(baseColumns));

        if (subcolumns && subcolumns.length > 0) {
            columns[0].render = function (data, type, row) {
                return '<a href="#" class="details-control">' + data + '</a>';
            };
        }

        if (allowDeletion) {
            columns.push({
                data: null,
                defaultContent: "<button class='button-primary delete-btn'>Delete</button>",
                orderable: false
            });
        }

        var table = $('#' + uniqueTableId).DataTable({
            "processing": true,
            "serverSide": true, // Enable server-side processing
            "ajax": {
                "url": ajax_object.ajax_url,
                "type": "POST",
                "data": function (d) {
                    // Add custom parameters to AJAX data
                    $.extend(d, {
                        'action': ajax_object.dynamic_data.get_data_url
                    });
                }
            },
            "columns": columns,
            "order": [[1, 'asc']],
            "dom": '<"dataTable-header"Bfl>t<"dataTable-footer"ip>',
            "buttons": [
                {
                    text: 'Sync Data',
                    className: 'button-primary table-header-button',
                    action: function (e, dt, node, config) {
                        $.ajax({
                            url: ajax_object.ajax_url,
                            type: 'POST',
                            data: {
                                'action': ajax_object.dynamic_data.sync_data_url, // The WordPress AJAX action for syncing
                                // additional data if necessary
                            },
                            success: function (response) {
                                // Handle the response
                                console.log(response);
                                // Optionally, reload the DataTable here
                                dt.ajax.reload(null, false); // Reload the data without resetting the paging
                            },
                            error: function (xhr, status, error) {
                                // Handle errors
                                console.error('Error:', error);
                            }
                        });
                    }
                }
            ]
        });

        $('#' + uniqueTableId + ' tbody').on('click', '.delete-btn', function () {
            var row = table.row($(this).parents('tr'));
            var rowData = row.data();

            if (confirm("Are you sure you want to delete this record?")) {
                $.ajax({
                    url: ajax_object.ajax_url,
                    type: 'POST',
                    data: {
                        'action': 'delete_record',
                        'id': rowData.whoamiId,
                        'security': ajax_object.delete_nonce
                    },
                    success: function (response) {
                        if (response.success) {
                            row.remove().draw();
                        } else {
                            alert('Error occurred: ' + response.data);
                        }
                    },
                    error: function (xhr, textStatus, errorThrown) {
                        alert('Error occurred while deleting record: ' + errorThrown);
                    }
                });
            }
        });

        if (subcolumns && subcolumns.length > 0) {
            $('#' + uniqueTableId + ' tbody').on('click', 'a.details-control', function (e) {
                e.preventDefault();
                var tr = $(this).closest('tr');
                var row = table.row(tr);

                if (row.child.isShown()) {
                    row.child.hide();
                    tr.removeClass('shown');
                } else {
                    row.child(formatChildRow(row.data(), subcolumns)).show();
                    tr.addClass('shown');
                }
            });
        }

        /**
         * Formats the child row to display subcolumn data.
         * 
         * @param {Object} data - The row data.
         * @param {Array} subcolumns - The subcolumns to display.
         * @returns {string} - The HTML content for the child row.
         */
        function formatChildRow(data, subcolumns) {
            var subHtml = '<div style="display: flex; flex-wrap: wrap; gap: 10px; padding-left: 50px;">';
            $.each(subcolumns, function (index, subcolumn) {
                subHtml += '<div style="flex: 1;"><strong>' + subcolumn.title + ':</strong> ' + data[subcolumn.data] + '</div>';
            });
            subHtml += '</div>';
            return subHtml;
        }

        $('.sync-data-button').attr('id', 'syncDataButton');
    }


    // Initialize DataTable with dynamic data
    initializeDataTable('#dataTable', ajax_object, dynamicData.columns, dynamicData.subcolumns, ajax_object.allowDeletion);
});