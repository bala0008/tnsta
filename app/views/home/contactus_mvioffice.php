<?php require APPROOT . '/views/_inc/header.php'; ?>
<?php require APPROOT . '/views/_inc/nav.php'; ?>
<?php // require APPROOT . '/views/home/_inc/common_link.php'; 
?>
<base href="<?php echo URLROOT; ?>" />
<link rel="stylesheet" href="datatable/css/custom.css">
<link rel="stylesheet" href="datatable/css/jquery.dataTables.min.css">
<style>
    #tender-table td a {
        padding: 10px 15px;
    }
</style>
<section class="mt-4 mb-2">
    <div class="container pb-2">
        <div class="row">
            <div class="col-lg-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo "Contact Us - MVI Office"; ?></li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="breadcrumb-content pt-2">
            <h3 style="text-align:center; padding: 15px;">Contact Us - MVI Office</h3>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="message-home col-lg-12">
                <!-- Tabs with Background on Card -->
                <!-- Tab panes -->
                <div class="">
                    <div class=" table-responsive table-bordered">
                        <table id="contact_table" class="display table-bordered" style="width:100%;padding: 15px 0px;">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Office Code</th>
                                    <th>Office Name</th>
                                    <th>Office Address</th>
                                    <th>Office Landline</th>
                                    <th>Cug No</th>
                                    <th>Office Mail Id</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($data['current_contactus_mvioffice'] as $sn => $v_contactus_home) {

                                ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $v_contactus_home['officecode'];  ?></td>

                                        <td><?php $name_lang =  $_SESSION['lang'] . "_officename";
                                            echo $v_contactus_home[$name_lang];  ?></td>
                                        <td><?php $address_lang =  $_SESSION['lang'] . "_officeaddress";
                                            echo $v_contactus_home[$address_lang];  ?></td>
                                        <td><?php echo $v_contactus_home['office_no'];  ?></td>
                                        <td><?php echo $v_contactus_home['cugno'];  ?></td>
                                       
                                        <td><?php echo $v_contactus_home['mail_id'];  ?></td>

                                    </tr>
                                <?php $i++;
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- End Tabs on plain Card -->
        </div>
    </div>
</section>
<?php require APPROOT . '/views/_inc/logo_slide.php';
?>
<?php require APPROOT . '/views/_inc/footer.php'; ?>
<script src="datatable/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
        $('#contact_table').DataTable({
            "pageLength": 5,
            "lengthMenu": [5, 10, 15],
            autoFill: true
        });
    });
</script>