<?php require APPROOT . '/views/_inc/header.php'; ?>
<?php require APPROOT . '/views/_inc/nav.php'; ?>
<?php //require APPROOT . '/views/_inc/slide.php'; 
?>
<?php // require APPROOT . '/views/home/_inc/common_link.php'; 
?>
<base href="<?php echo URLROOT; ?>" />
<link rel="stylesheet" href="datatable/css/custom.css">
<link rel="stylesheet" href="datatable/css/jquery.dataTables.min.css">
<style>
    .sub-division .container {
        margin-top: 20px;
        padding: 40px 20px;
    }

    /* .sub-division .box {
        padding: 40px 30px;
        transition: all .4s ease-in-out;
        cursor: pointer;
    } */
    .sub-division .box {
        padding: 20px 20px;
        transition: all .4s ease-in-out;
        cursor: pointer;
    }

    .sub-division .box:hover {
        box-shadow: 2px 2px 10px #a5a5a5;
        transform: scale(1.03);
    }

    .sub-division a:hover {
        text-decoration: none;
    }

    .sub-division img {
        object-fit: contain;
        width: 35px;
        height: 35px;
        /* padding: 20px; */
    }

    .sub-division p.text-muted {
        margin: 0;
        font-size: 0.9rem;
    }

    /* .sub-division b {
        font-size: 1.12rem;
    } */

    .sub-division b {
        font-size: 1.25rem;
        font-weight: bold;
        color: #004757;
    }

    .sub-division.rounded-circle {
        width: 60px;
        height: 60px;
        background-color: red;
    }

    .sub-division .blue {
        background-color: #bedcfa;
        /* transform: rotate(90deg); */
    }

    .sub-division .pale-blue {
        background-color: #eff8ff;
    }

    .sub-division .pale-orange {
        background-color: #ffe5b9;
    }

    .sub-division .pale-purple {
        background-color: #e8e8e8;
    }

    .sub-division .pale-cyan {
        background-color: #cffffe;
    }

    .sub-division .pale-pink {
        background-color: #ffe4e4;
    }

    .sub-division .pale-pale {
        background-color: #f4eeff;
    }

    .sub-division .pale-green {
        background-color: #a0ffe6;
    }

    .sub-division .pale-pista {
        background-color: #dbf6e9;
    }

    #tender-table td a {
        padding: 10px 15px;
    }
</style>
<?php
$page_contentsql = json_decode(json_encode($data['Mst_Aboutus']), true);
$profile_name =  $_SESSION['lang'] . "_profile_name";
$uploadPath = 'profile' . '/' . $page_contentsql['profile_photo'];
$profile_name =  $_SESSION['lang'] . "_profile_name";
$profile_position =  $_SESSION['lang'] . "_profile_position";
$file_location = $uploadPath;
$profile_contentsql_tm = json_decode(json_encode($data['Mst_Aboutusmt']), true);
$profile_name_mt =  $_SESSION['lang'] . "_profile_name";
$profile_position_mt =  $_SESSION['lang'] . "_profile_position";
$uploadPath = 'profile' . '/' . $profile_contentsql_tm['profile_photo'];
$file_location_tm = $uploadPath;

// $profile_contentsql_tm = json_decode(json_encode($data['profile_tm']), true);
// $profile_name_tm =   $_SESSION['lang'] . "_profile_name";
// $uploadPath_tm = 'profile' . '/' . $profile_contentsql_tm['profile_photo'];
// $file_location_tm = $uploadPath_tm;
?>
<section class="mt-4 mb-2 tabs-bg">
    <div class="container mt-2  ">
        <div class="row">
            <div class="col-lg-3">
                <div class="row">
                    <div class="col-6 col-md-12">
                        <div class="division-individual">
                            <?php if (isset($file_location)) { ?>
                                <div class="listmnistr">

                                    <a href="">
                                        <div class="mnstr-img"><img src="<?= $file_location ?>" alt="Minister Image3"></div>
                                        <div class="info-mnstr">
                                            <strong><?php echo $page_contentsql[$profile_name]; ?> </strong>
                                            <span><?php echo $page_contentsql[$profile_position]; ?> </span>
                                        </div>
                                    </a>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-6 col-md-12 text-center">
                        <div class="division-individual">
                            <div class="listmnistr">
                                <a href="">
                                    <div class="mnstr-img1"><img src="<?= $file_location_tm ?>" alt="Honourable Minister for Transport"></div>
                                    <div class="info-mnstr">
                                        <strong><?php echo $profile_contentsql_tm[$profile_name_mt]; ?> </strong>
                                        <span> <?php echo $profile_contentsql_tm[$profile_position_mt]; ?></span>
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
                                <a class="nav-link active lang" data-toggle="tab" href="#home1" role="tab" key="lbl_whatsnew">What's New</a>
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
                    <button class="button button1_service button1_service_3 lang" key="lbl_sarathiepay">
                        SARATHI E-PAYMENT
                        <i class="fa fa-chevron-right fa-lg first_i"></i><i class="fa fa-chevron-right fa-lg second_i"></i></button>
                </div>
                <div class="row">
                    <button class="button button1_service button1_service_4 lang" key="lbl_fancynumber">
                        FANCY NUMBER BOOKING
                        <i class="fa fa-list-alt fa-lg services_button_icon"></i></button>
                </div>
            </div>
        </div>
</section>
<section class="sub-division container-fluid bg-light">
    <div class="container bg-light rounded">
        <div class="row">
            <div class="col-lg-4 col-md-6 my-lg-0 my-3">
                <div class="box bg-white">
                    <div class="d-flex align-items-center">
                        <div class="rounded-circle mx-3 text-center d-flex align-items-center justify-content-center blue">
                            <img src="https://5.imimg.com/data5/VP/EL/MY-1180946/question-bank-paper-500x500.jpg" alt="">
                        </div>
                        <div class="d-flex flex-column">

                            <a href="about_us/Stall_questionBank_Report.pdf" target="_blank">
                                <b>LL Question Bank</b>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 my-lg-0 my-3">
                <div class="box bg-white">
                    <div class="d-flex align-items-center">
                        <div class="rounded-circle mx-3  d-flex align-items-center justify-content-center pale-orange">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSxJDmUcMyQAZv6YwhHoW8GIJwx8FgOtqvZTQ&usqp=CAU" alt="">
                        </div>
                        <div class="d-flex flex-column">
                            <a href="https://sarathi.parivahan.gov.in/sarathiservice/stateSelection.do" target="_blank">
                                <b>LL Test Practice</b>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 my-lg-0 my-3">
                <div class="box bg-white">
                    <div class="d-flex align-items-center">
                        <div class="rounded-circle mx-3  d-flex align-items-center justify-content-center pale-purple">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQmf7ox8iImKYPqBPNdV0MWT-K6OzySN1SSoA&usqp=CAU" alt="">
                        </div>
                        <div class="d-flex flex-column">
                            <a href="#">
                                <b>RTI</b>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 my-lg-3 my-3">
                <div class="box bg-white">
                    <div class="d-flex align-items-center">
                        <div class="rounded-circle mx-3  d-flex align-items-center justify-content-center pale-cyan">
                            <img src="https://w7.pngwing.com/pngs/448/230/png-transparent-bell-notification-communication-icon-announcement-information.png" alt="">
                        </div>
                        <div class="d-flex flex-column">
                            <a href="about_us/Arani_Upgradation.pdf" target="_blank">
                                <b>Announcement</b>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 my-lg-3 my-3">
                <div class="box bg-white">
                    <div class="d-flex align-items-center">
                        <div class="rounded-circle mx-3  d-flex align-items-center justify-content-center pale-pink">
                            <img src="https://cdn.iconscout.com/icon/premium/png-256-thumb/insurance-policy-2588024-2159741.png" alt="">
                        </div>
                        <div class="d-flex flex-column">
                            <a href="#">
                                <b>Policy Note</b>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 my-lg-3 my-3">
                <div class="box bg-white">
                    <div class="d-flex align-items-center">
                        <div class="rounded-circle mx-3  d-flex align-items-center justify-content-center pale-orange">
                            <img src="https://play-lh.googleusercontent.com/YqOG9GBAB3n9Cw9NbkdlgcV8H1UuxqtotohizT8BjFK8QWVgjSEoEO1Gr-AyJMg5Tw" alt="">
                        </div>
                        <div class="d-flex flex-column">
                            <a href="#">
                                <b>mParivahan</b>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 my-lg-0 my-3">
                <div class="box bg-white">
                    <div class="d-flex align-items-center">
                        <div class="rounded-circle mx-3  d-flex align-items-center justify-content-center pale-orange">
                            <img src="https://tnsta.gov.in/images/vahan.jpg" alt="">
                        </div>
                        <div class="d-flex flex-column">
                            <a href="#">
                                <b>Vahan</b>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 my-lg-0 my-3">
                <div class="box bg-white">
                    <div class="d-flex align-items-center">
                        <div class="rounded-circle mx-3  d-flex align-items-center justify-content-center pale-green">
                            <img src="https://p.kindpng.com/picc/s/210-2102589_sunvalley-icon-05-car-maintenance-icon-png-transparent.png" alt="">
                        </div>
                        <div class="d-flex flex-column">
                            <a href="#">
                            <b>Vehicle Status</b>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 my-lg-0 my-3">
                <div class="box bg-white">
                    <div class="d-flex align-items-center">
                        <div class="rounded-circle mx-3  d-flex align-items-center justify-content-center pale-pista">
                            <img src="https://joblolo.com/wp-content/uploads/2021/04/png-transparent-identity-document-computer-icons-driver-s-license-driving-driving-text-drivers-license.png" alt="">
                        </div>
                        <div class="d-flex flex-column">
                            <a href="#">
                            <b>License Status</b>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php require APPROOT . '/views/_inc/logo_slide.php';
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