<?php require APPROOT . '/views/_inc/header.php'; ?>
<?php require APPROOT . '/views/_inc/nav.php'; ?>
<?php require APPROOT . '/views/_inc/slide.php'; ?>
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


<section class="mt-4 mb-2 tabs-bg">
    <div class="container mt-2  ">
        <div class="row">
            <div class="col-lg-3">
                <div class="row">
                    <div class="col-6 col-md-12">
                        <div class="division-individual">
                            <div class="listmnistr">

                                <a href="">
                                    <div class="mnstr-img"><img src="tnweb/images/header/cm.png" alt="Minister Image3"></div>
                                    <div class="info-mnstr">
                                        <strong> Thiru M.K.Stalin</strong>
                                        <span> Honourable Chief Minister of Tamil Nadu</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-12 text-center">
                        <div class="division-individual">
                            <div class="listmnistr">
                                <a href="">
                                    <div class="mnstr-img1"><img src="tnweb/images/header/SS_Sivasankar.jpg" alt="Honourable Minister for Transport"></div>
                                    <div class="info-mnstr">
                                        <strong>Thiru S.S.Sivasankar</strong>
                                        <span> Honourable Minister for Transport</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="message-home col-lg-6">
                <!-- Tabs with Background on Card -->
                <div class="card">
                    <div class="card-header">
                        <ul id="mytab" class="nav nav-tabs nav-tabs-neutral " role="tablist" data-background-color="orange">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#home1" role="tab">What's New</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#profile1" role="tab">Notification</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#messages1" role="tab"> Tender</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <!-- Tab panes -->
                        <div class="tab-content home-banner">
                            <div class="tab-pane active" id="home1" role="tabpanel">
                                <marquee behavior="scroll" direction="up" scrollamount="3" style="height: 320px;" onmouseover="this.stop();" onmouseout="this.start();">

                                    <strong class="marquee-text-col">
                                        <?php
                                        foreach ($data['current_whatsnew'] as $sn => $whatsnew) {
                                            // echo "<pre>";
                                            // print_r($whatsnew);
                                            $whatsnew_date = date('Y-m-d', strtotime($whatsnew['wh_new_from_date']));
                                            //echo $date;
                                            //echo $date;
                                            $wh_new_lang =  $_SESSION['lang'] . "_wh_new_pdf";
                                            $uploadPath = 'whatsnew' . '/' . $whatsnew[$wh_new_lang];
                                            $file_location = $uploadPath;
                                        ?>
                                            <p>
                                            <h6 class="p-0 m-0">
                                                <a class="pdf_href" href="<?= $uploadPath ?>" target="_blank"><i class="fa fa-share"></i>
                                                    <?php
                                                    $wh_new_lang =  $_SESSION['lang'] . "_whatsnew_title";
                                                    echo $whatsnew[$wh_new_lang];
                                                    ?>
                                                </a>
                                            </h6>
                                            </p>
                                            <br>
                                        <?php } ?>
                                    </strong>
                                </marquee>
                                <div class="text-center">
                                    <a href="" target="_self" class="btn btn-sm btn-gov" aria-label="View More" title="View More">View More</a>
                                </div>
                            </div>
                            <div class="tab-pane" id="profile1" role="tabpanel">
                                <marquee behavior="scroll" direction="up" scrollamount="3" style="height: 320px;" onmouseover="this.stop();" onmouseout="this.start();">

                                    <strong class="marquee-text-col">
                                        <?php
                                        foreach ($data['current_notification'] as $sn => $v_notification) {
                                            $notification_from_date = date('Y-m-d', strtotime($v_notification['notification_from_date']));
                                            //echo $date;
                                            //echo $date;
                                            $notification_lang =  $_SESSION['lang'] . "_notification_pdf";
                                            $uploadPath = 'notification' . '/' . $v_notification[$notification_lang];
                                            $file_location = $uploadPath;
                                        ?>
                                            <p>
                                            <h6 class="p-0 m-0">
                                                <a class="pdf_href" href="<?= $uploadPath ?>" target="_blank"> <i class="fa fa-share"></i>
                                                    <?php
                                                    $notification_lang =  $_SESSION['lang'] . "_notification_title";
                                                    echo $v_notification[$notification_lang];
                                                    ?>
                                                </a>
                                            </h6>
                                            </p>
                                            <br>
                                        <?php } ?>
                                    </strong>
                                </marquee>
                                <div class="text-center">
                                    <a href="" target="_self" class="btn btn-sm btn-gov" aria-label="View More" title="View More">View More</a>
                                </div>
                            </div>
                            <div class="tab-pane" id="messages1" role="tabpanel">
                                <div class=" table-responsive table-bordered">
                                    <table id="tendertable" class="display table-bordered" style="width:100%;padding: 15px 0px;">
                                        <thead>
                                            <tr>
                                                <th>S.No</th>
                                                <th>Description</th>
                                                <th>Details</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 1;
                                            foreach ($data['current_tender'] as $sn => $v_tender) {
                                                $tender_from_date = date('Y-m-d', strtotime($v_tender['tender_from_date']));
                                                //echo $date;
                                                //echo $date;
                                                $tender_title_lang =  $_SESSION['lang'] . "_tender_pdf";
                                                $uploadPath = 'tender' . '/' . $v_tender[$tender_title_lang];
                                                $file_location = $uploadPath;
                                            ?>

                                                <tr>
                                                    <td><?php echo $i; ?></td>
                                                    <td><?php $tender_title_lang =  $_SESSION['lang'] . "_tender_title";
                                                        echo $v_tender[$tender_title_lang];  ?></td>
                                                    <td><a class="pdf_href" href="<?= $uploadPath ?>" target="_blank"><button style="font-size:16px;color:red;line-height:1.5;font-weight:bold">view <i class="fa fa-file-pdf-o"></i></button></a></td>
                                                </tr>
                                            <?php $i++;
                                            } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- End Tabs on plain Card -->
            </div>
            <div class="col-lg-3">

                <div class="row">
                    <button class="button button1_service button1_service_1">
                        SEARCH
                        <i class="fa fa-search fa-lg services_button_icon"></i></button>
                </div>
                <div class="row">
                    <button class="button button1_service button1_service_2">
                        E-PAYMENT
                        <i class="fa fa-inr fa-lg services_button_icon"></i></button>
                </div>
                <div class="row">
                    <button class="button button1_service button1_service_3">
                        SARATHI E-PAYMENT
                        <i class="fa fa-chevron-right fa-lg first_i"></i><i class="fa fa-chevron-right fa-lg second_i"></i></button>
                </div>
                <div class="row">
                    <button class="button button1_service button1_service_4">
                        FANCY NUMBER BOOKING
                        <i class="fa fa-list-alt fa-lg services_button_icon"></i></button>
                </div>
            </div>
        </div>
</section>
<?php  require APPROOT . '/views/_inc/logo_slide.php'; 
?>
<?php require APPROOT . '/views/_inc/footer.php'; ?>
<script src="datatable/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
        $('#tendertable').DataTable({
            "pageLength": 4,
            "lengthMenu": [4, 8, 12],
            autoFill: true
        });
    });
</script>