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

    <?php
    // echo"<Pre>";
    // print_r($data['Mst_Contactus']);
    // die;
    $page_contentsql = json_decode(json_encode($data['Mst_Contactus']), true);
    if ($page_contentsql) {
        $title_lang =  $_SESSION['lang'] . "_title";
        $title = $page_contentsql[$title_lang];
        $title_lang1 = substr($title, 13);
        $pdf_lang =  $_SESSION['lang'] . "_pdf";
        $uploadPath = 'contactus' . '/' . $page_contentsql[$pdf_lang];
        $file_location = $uploadPath;
        if ($uploadPath == 'contactus/') {
            include('contactus_error.php');
        } else {
    ?>
            <div class="container pb-2">
                <div class="row">
                    <div class="col-lg-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><?php echo "Home (Transport) Department"; ?></li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="breadcrumb-content pt-2">
                    <h3 style="text-align:center; padding: 15px;"><?php echo $page_contentsql[$title_lang]; ?></h3>
                </div>
            </div>
            <div class="container" style="padding-bottom: 5em">
                <div class="row">
                    <div class="message-home col-lg-12">
                        <!-- Tabs with Background on Card -->
                        <!-- Tab panes -->

                        <object data="<?php echo $file_location; ?>" width="90%" height="500px">
                            <?php echo $file_location; ?>
                        </object>

                    </div>
                    <!-- End Tabs on plain Card -->
                </div>
            </div>
    <?php }
    } else {
        include('contactus_error.php');
    }?>
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