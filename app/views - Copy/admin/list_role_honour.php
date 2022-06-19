<?php require APPROOT . '/views/admin/header.php'; ?>
<?php require APPROOT . '/views/admin/admin-nav.php'; ?>
<base href="<?php echo URLROOT; ?>" />
<link rel="stylesheet" href="datatable/css/custom.css">
<link rel="stylesheet" href="datatable/css/jquery.dataTables.min.css">
<script src="datatable/js/jquery.dataTables.min.js"></script>

<div class="main-content">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card" style="min-height:calc(100% - 550px);">
                <div class="card-content">
                    <div class="container">
                        <form>
                            <div class="row">
                                <div class="col-md-6">
                                <h5 class="h5 text-left">Role Of Honour</h5>
                                </div>
                                <?php
                                if (($_SESSION['roleid'] == 1) || ($_SESSION['roleid'] == 2) || ($_SESSION['roleid'] == 3)) {
                                ?>
                                <div class="col-md-6 text-right">
                               <a href="AdminController/role_honour"> <button type="button" class="btn btn-info text-white">Add New</button></a> 
                                </div>
                                <?php } ?>
                            </div>
                                
                                <hr>
                                <div class="col-md-12 ">
                                    <div class="card-content table-responsive table-bordered">
                                        <table id="whatsnew-table" class="display" style="width:100%;padding: 15px 0px;">
                                            <thead>
                                                <tr>
                                                    <th>Name of the Commissioner</th>
                                                    <th>From Date</th>
                                                    <th>To Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                foreach ($data['current_role_honour'] as $sn => $role_honourlist) {
                                                    $whatsnewid = $role_honourlist['role_honor_id'];
                                                    $effect_from_date = date('d-m-Y', strtotime($role_honourlist['role_honor_fromdate']));
                                                    $effect_to_date = date('d-m-Y', strtotime($role_honourlist['role_honor_todate']));
                                                ?>
                                                    <tr>
                                                       
                                                        <td class="pdf_href"><?php echo $role_honourlist['en_role_honor_name'] ?></td>
                                                        <td><?php echo $effect_from_date?></td>
                                                        <td><?php echo $effect_to_date ?></td>
                                                       
                                                    </tr>
                                                <?php } ?>
                                            </tbody>

                                        </table>
                                    </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <?php require APPROOT . '/views/admin/footer.php'; ?>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#whatsnew-table').DataTable({
                "pageLength": 5,
                "lengthMenu": [5, 10, 50, 100],
                autoFill: true
            });
        });
        $('.whatsnew-delete').click(function() {
            var role_honor_id = $(this).attr('data-id');
            var baseurl = "<?php echo URLROOT; ?>AdminController/whatsnew_delete";
            var rediecturl = "<?php echo URLROOT; ?>AdminController/list_whatsnew";
            Swal.fire({
                title: 'Do you want to Delete The Data?',
                showDenyButton: true,
                confirmButtonText: 'Yes',
                denyButtonText: 'No',
                customClass: {
                    actions: 'my-actions',
                    confirmButton: 'order-2',
                    denyButton: 'order-3',
                    timer: 2000,
                    showConfirmButton: false
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    jQuery.ajax({
                        url: baseurl,
                        data: {
                            role_honor_id: role_honor_id
                        },
                        type: 'post',
                        dataType: 'json',
                        success: function(response) {
                            if (response.message == 1) {
                                Swal.fire('Deleted successfully!', '', 'success')
                                setTimeout(function() { // wait for 5 secs(2)
                                    location.reload(); // then reload the page.(3)
                                }, 1500);
                            }
                        }
                    });
                } else if (result.isDenied) {
                    Swal.fire('Changes are not Delete', '', 'info')
                }
            })

        });

        $('.whatsnew-publish').click(function() {
            var role_honor_id = $(this).attr('data-id');
            var baseurl = "<?php echo URLROOT; ?>AdminController/whatsnew_publish";
            var rediecturl = "<?php echo URLROOT; ?>AdminController/list_whatsnew";
            Swal.fire({
                title: 'Want To Publish?',
                showDenyButton: true,
                confirmButtonText: 'Yes',
                denyButtonText: 'No',
                customClass: {
                    actions: 'my-actions',
                    confirmButton: 'order-2',
                    denyButton: 'order-3',
                    timer: 2000,
                    showConfirmButton: false
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    jQuery.ajax({
                        url: baseurl,
                        data: {
                            role_honor_id: role_honor_id
                        },
                        type: 'post',
                        dataType: 'json',
                        success: function(response) {
                            if (response.message == 1) {
                                Swal.fire('Published succesfully!', '', 'success')
                                setTimeout(function() { // wait for 5 secs(2)
                                    location.reload(); // then reload the page.(3)
                                }, 1500);
                            }
                        }
                    });
                } else if (result.isDenied) {
                    Swal.fire('Changes are not Publish', '', 'info')
                }
            })

        });
    </script>