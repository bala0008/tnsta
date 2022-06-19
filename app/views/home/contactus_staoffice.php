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
                        <li class="breadcrumb-item active" aria-current="page"><?php echo "Contact Us - STA Office"; ?></li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="breadcrumb-content pt-2">
            <h3 style="text-align:center; padding: 15px;">Contact Us - STA Office (Transport) Department</h3>
        </div>
    </div>
    <div class="container" style="padding-bottom: 5em">
        <div class="row">
            <div class="message-home col-lg-12">

                <?php
                $page_contentsql = json_decode(json_encode($data['Mst_Contactus']), true);

                $pdf_lang =  $_SESSION['lang'] . "_pdf";
                $uploadPath = 'contactus' . '/' . $page_contentsql[$pdf_lang];
                $file_location = $uploadPath;
                ?>
                <!-- Tabs with Background on Card -->
                <!-- Tab panes -->
                <iframe src="<?php echo $file_location; ?>" width="90%" height="500px">
                </iframe>

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
            "pageLength": 4,
            "lengthMenu": [4, 8, 12],
            autoFill: true
        });
    });
</script>