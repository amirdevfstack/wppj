jQuery(document).ready(function (jQuery) {
    function fetchTransactions(page = 1, search = '', perPage = 10) {
        jQuery.ajax({
            url: treesNCloudsAjax.ajax_url,
            type: 'post',
            data: {
                action: 'fetch_customer_transaction',
                page: page,
                search: search,
                per_page: perPage
            },
            success: function (response) {
                if (response.success && response.data.data.length > 0) {
                    var table = jQuery('<table style="width: 100%;" class="table" style="margin: 15px 0px;">').addClass('wp-list-table table');
                    var thead = jQuery('<thead>').append('<tr><th>ID</th><th>Date</th><th>Items</th><th>Total</th><th>Sub-Total</th><th>Tax</th><th>Transaction Type</th><th>Order Source</th></tr>');
                    var tbody = jQuery('<tbody>');

                    jQuery.each(response.data.data, function (index, transaction) {
                        var row = jQuery('<tr>');
                        row.append(jQuery('<td>').text(transaction.transactionId));
                        row.append(jQuery('<td>').text(transaction.transactionDate));
                        var itemsCount = transaction.items ? JSON.parse(transaction.items).length : 0;
                        row.append(jQuery('<td>').append(jQuery('<a href="#" class="toggle-items">').text(itemsCount + ' items')));
                        row.append(jQuery('<td>').text(transaction.total));
                        row.append(jQuery('<td>').text(transaction.subtotal));
                        row.append(jQuery('<td>').text(transaction.tax));
                        row.append(jQuery('<td>').text(transaction.transactionType));
                        row.append(jQuery('<td>').text(transaction.orderSource));
                        tbody.append(row);

                        // Sub-table row (initially hidden)
                        var subTableRow = jQuery('<tr class="sub-table-row" style="display: none;">');
                        var subTableCell = jQuery('<td colspan="10">'); // Span across all columns
                        var subTable = jQuery('<table>').addClass('wp-list-table table table-striped');
                        var subThead = jQuery('<thead>').append('<tr><th>Product ID</th><th>Product Name</th><th>Vendor</th><th>Quantity</th><th>Unit Price</th><th>Total Price</th></tr>');
                        var subTbody = jQuery('<tbody>');

                        if (transaction.items) {
                            var items = JSON.parse(transaction.items);
                            jQuery.each(items, function (i, item) {
                                var subRow = jQuery('<tr>');
                                subRow.append(jQuery('<td>').text(item.productId));
                                subRow.append(jQuery('<td>').text(item.productName));
                                subRow.append(jQuery('<td>').text(item.vendor));
                                subRow.append(jQuery('<td>').text(item.quantity));
                                subRow.append(jQuery('<td>').text(item.unitPrice));
                                subRow.append(jQuery('<td>').text(item.totalPrice));
                                subTbody.append(subRow);
                            });
                        }

                        subTable.append(subThead, subTbody);
                        subTableCell.append(subTable);
                        subTableRow.append(subTableCell);
                        tbody.append(subTableRow); // Append sub-table row after the main row
                    });

                    table.append(thead, tbody);
                    jQuery('#transaction-table-container').empty().append(table);

                    // Toggle sub-table visibility
                    jQuery('.toggle-items').click(function (e) {
                        e.preventDefault();
                        jQuery(this).closest('tr').next('.sub-table-row').toggle();
                    });

                    // Pagination
                    var pagination = jQuery('<div>', { id: 'pagination-container' });
                    var totalPages = response.data.total_pages;
                    var startPage = Math.max(1, page - 2);
                    var endPage = Math.min(totalPages, page + 2);

                    if (page > 1) {
                        pagination.append(jQuery('<a style="margin: 5px" href="#" data-page="' + (page - 1) + '">Previous</a>'));
                    }

                    for (var i = startPage; i <= endPage; i++) {
                        var link = jQuery('<a style="margin: 5px" href="#" data-page="' + i + '">' + i + '</a>');
                        if (i === page) link.css('font-weight', 'bold');
                        pagination.append(link);
                    }

                    if (page < totalPages) {
                        pagination.append(jQuery('<a style="margin: 5px" href="#" data-page="' + (page + 1) + '">Next</a>'));
                    }

                    jQuery('#transaction-table-container').append(pagination);

                    // Pagination click event
                    jQuery('#pagination-container a').on('click', function (e) {
                        e.preventDefault();
                        var pageNum = jQuery(this).data('page');
                        fetchTransactions(pageNum, search, perPage);
                    });

                } else {
                    jQuery('#transaction-table-container').html('<p>No transaction data available.</p>');
                }
            },
            error: function (xhr, status, error) {
                console.error('AJAX error:', status, error);
            }
        });
    }

    // Initial fetch
    fetchTransactions();

    // Search functionality
    jQuery('#transaction-search').on('keyup', function () {
        fetchTransactions(1, jQuery(this).val(), jQuery('#results-per-page').val());
    });

    // Results per page dropdown
    jQuery('#results-per-page').on('change', function () {
        fetchTransactions(1, jQuery('#transaction-search').val(), jQuery(this).val());
    });
});
