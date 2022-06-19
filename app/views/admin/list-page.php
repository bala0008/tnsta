<?php require APPROOT . '/views/admin/header.php'; ?>
<?php require APPROOT . '/views/admin/admin-nav.php'; ?>
<base href="<?php echo URLROOT; ?>" />
<link rel="stylesheet" href="datatable/css/custom.css">
<link rel="stylesheet" href="datatable/css/jquery.dataTables.min.css">
<script src="datatable/js/jquery.dataTables.min.js"></script>

<div class="main-content">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card" style="min-height: 550px">
                <div class="card-content">
                    <div class="container">
                        <form>
                            <div class="row">
                                <div class="col-md-6">
                                    <h5 class="h5 text-left">Page</h5>
                                </div>
                                <?php
                                if (($_SESSION['roleid'] == 1) || ($_SESSION['roleid'] == 2) || ($_SESSION['roleid'] == 3)) {
                                ?>
                                    <div class="col-md-6 text-right ">
                                        <a href="AdminController/page"> <button type="button" class="btn btn-info text-white">Add New</button></a>
                                    </div>
                                <?php } ?>
                            </div>
                            <hr>

                            <div class="col-md-12 ">
                                <div class="card-content table-responsive table-bordered">
                                    <table id="page-table" class="display" style="width:100%;padding: 15px 0px;">
                                        <thead>
                                            <tr>
                                                <th>Action</th>
                                                <th>Tamil Title </th>
                                                <th>English Title </th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($data['current_page'] as $sn => $pagelist) {
                                                $pageid = $pagelist['page_id'];
                                            ?>
                                                <tr>
                                                    <td>
                                                        <div class="btn-group" role="group" aria-label="Basic example">
                                                            <?php
                                                            if (($_SESSION['roleid'] == 1) || ($_SESSION['roleid'] == 2)) {

                                                            ?>
                                                                <a href="<?php echo URLROOT; ?>AdminController/page_edit_id?id=<?php echo $pagelist['page_id']; ?>"> <button type="button" class="btn btn-success"><i class="fa fa-edit"></i></button></a>&nbsp;
                                                                <button type="button" class="btn btn-danger page-delete" data-id="<?php echo $pagelist['page_id'] ?>"><i class="fa fa-trash"></i></button> &nbsp;

                                                                <?php if ($pagelist['status'] != 1) {
                                                                ?>
                                                                    <button type="button" class="btn btn-primary page-publish" data-id="<?php echo $pagelist['page_id'] ?>"><i class="fa fa-bullhorn"></i></button> &nbsp;
                                                                <?php
                                                                } ?>
                                                            <?php } else if ($_SESSION['roleid'] == 3) {
                                                            ?>
                                                                <a href="<?php echo URLROOT; ?>AdminController/page_edit_id?id=<?php echo $pagelist['page_id']; ?>"> <button type="button" class="btn btn-success"><i class="fa fa-edit"></i></button></a>&nbsp;
                                                            <?php
                                                            } else {
                                                            ?>
                                                                <?php if ($pagelist['status'] != 1) {
                                                                ?>
                                                                    <button type="button" class="btn btn-primary page-publish" data-id="<?php echo $pagelist['page_id'] ?>"><i class="fa fa-bullhorn"></i></button> &nbsp;
                                                            <?php
                                                                }
                                                            }
                                                            ?>
                                                        </div>
                                                    </td>
                                                    <td class="pdf_href"><?php echo $pagelist['tn_title'] ?></td>
                                                    <td class="pdf_href"><?php echo $pagelist['en_title'] ?></td>

                                                    <td>
                                                        <?php if ($pagelist['status'] == 1) {
                                                            echo '<button type="button" class="btn btn-success btn-sm" title = "Status Active">Active</button>';
                                                        } else {
                                                            echo '<button type="button" class="btn btn-danger btn-sm" title = "Status InActive">InActive</button>';
                                                        }   ?>
                                                    </td>
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
            $('#page-table').DataTable({
                "pageLength": 5,
                "lengthMenu": [5, 10, 50, 100],
                autoFill: true
            });
        });
        $('.page-delete').click(function() {
            var page_id = $(this).attr('data-id');
            var baseurl = "<?php echo URLROOT; ?>AdminController/page_delete";
            var rediecturl = "<?php echo URLROOT; ?>AdminController/list_page";
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
                            page_id: page_id
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

        $('.page-publish').click(function() {
            var page_id = $(this).attr('data-id');
            var baseurl = "<?php echo URLROOT; ?>AdminController/page_publish";
            var rediecturl = "<?php echo URLROOT; ?>AdminController/list_page";
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
                            page_id: page_id
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