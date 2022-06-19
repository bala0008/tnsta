<?php require APPROOT . '/views/admin/header.php'; ?>
<?php require APPROOT . '/views/admin/admin-nav.php'; ?>
<base href="<?php echo URLROOT; ?>" />
<link rel="stylesheet" href="datatable/css/custom.css">
<link rel="stylesheet" href="datatable/css/jquery.dataTables.min.css">
<script src="datatable/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.0/themes/smoothness/jquery-ui.css" type="text/css">

<div class="main-content">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card" style="min-height: 550px">
                <div class="card-content">
                    <div class="container">
                        <form>
                            <h5 class="text-left">Dashboard</h5>
                            <hr>
                            <div class="col-md-12 ">
                                <div class="card-content table-responsive table-bordered">
                                    <table class="table table-striped table-bordered" id="menu_reorder">
                                        <thead style="cursor:all-scroll;">
                                            <tr>
                                                <th>Tn MenuName</th>
                                                <th>En MenuName</th>
                                                <th>Order</th>
                                            </tr>
                                        </thead>
                                        <tbody style="cursor: all-scroll;"></tbody>
                                    </table>
                                </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <?php require APPROOT . '/views/admin/footer.php'; ?>
    <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js" integrity="sha256-eGE6blurk5sHj+rmkfsGYeKyZx3M4bG+ZlFyA7Kns7E=" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#whatsnew-table').DataTable({
                "pageLength": 5,
                "lengthMenu": [5, 10, 50, 100],
                autoFill: true
            });
        });
    </script>
    <script>
 $(function() {
    load_data();
    var baseurl = "<?php echo URLROOT; ?>AdminController/ajaxresponsemenuorder";

    $('tbody').sortable({
        placeholder: "ui-state-highlight",
        update: function(event, ui) {

            var page_id_array = new Array();
            $('tbody tr').each(function() {
                page_id_array.push($(this).attr('id'));
            });

            $.ajax({
                url: baseurl,
                method: "POST",
                data: {
                    page_id_array: page_id_array,
                    action: 'update'
                },
                success: function() {
                    load_data();
                }
            })
        }
    });
});

function load_data() {
    var baseurl = "<?php echo URLROOT; ?>AdminController/ajaxresponsemenuorder";

   
    $.ajax({
        url: baseurl,
        method: "POST",
        data: {
            action: 'fetch_data'
        },
        dataType: 'json',
        success: function(data) {
            var html = '';
            for (var count = 0; count < data.length; count++) {
                html += '<tr id="' + data[count].menu_id + '">';
                html += '<td>' + data[count].tn_menu_name + '</td>';
                html += '<td>' + data[count].en_menu_name + '</td>';
                html += '<td>' + data[count].menu_order + '</td>';
                html += '</tr>';
            }
            $('tbody').html(html);
        }
    })
}


</script>