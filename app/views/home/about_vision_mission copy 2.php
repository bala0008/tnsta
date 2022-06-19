<?php require APPROOT . '/views/_inc/header.php'; ?>
<?php require APPROOT . '/views/_inc/nav.php'; ?>
<style>
    .container.form {
        width: 90%;
        margin: 2em auto;
    }

    form {
        background-color: #ffffff;
        padding-top: 40px;
        padding-right: 40px;
        padding-bottom: 40px;
        padding-left: 40px;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        border-radius: 3px;
        overflow: hidden;
    }
</style>
<?php
$page_contentsql = json_decode(json_encode($data['Mst_Aboutus']), true);
$profile_name =  $_SESSION['lang'] . "_profile_name";
$profile_position =  $_SESSION['lang'] . "_profile_position";
$title=$page_contentsql[$profile_position];
$title_lang1 = substr($title, 11);
$profile_qualification =  $_SESSION['lang'] . "_profile_qualification";
$profile_constis_name =  $_SESSION['lang'] . "_profile_constis_name";
$profile_party =  $_SESSION['lang'] . "_profile_party";
$profile_contact =  $_SESSION['lang'] . "_profile_contact";
$profile_fax =  $_SESSION['lang'] . "_profile_fax";
$profile_email =  $_SESSION['lang'] . "_profile_email";
$profile_address =  $_SESSION['lang'] . "_profile_address";
$uploadPath = 'profile' . '/' . $page_contentsql['profile_photo'];
$file_location = $uploadPath;
?>
<div class="container form">
    <form method="POST" name="loginform" id="loginform" autocomplete="off">
        <section class="">
            <div class="">
                <div class="container pb-2">
                    <div class="row">
                        <div class="col-lg-12">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><?php echo $title_lang1 ?></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="container about">
                    <div class="breadcrumb-title">
                        <h2>Transport Minister </h2>
                    </div>
                    <div id="about_us" class="about-us">
                        <div class="container">
                            <div class="about-row row">
                                <div class="image-col col-md-6">
                                    <img src="<?php echo $file_location ?>" class="img-fluid" alt="">
                                </div>
                                <div class="detail-col col-md-6" style=" position: relative;top: 35px;">
                                    <h6><?php echo $page_contentsql[$profile_name]; ?></h6>
                                    <h4><?php echo $page_contentsql[$profile_position]; ?></h4>
                                </div>
                            </div>
                            <div class="about-row row">
                                <div class="detail-col col-md-12">
                                    <hr>
                                    <!-- <p>There are many variations of passages of Lorem Ipsum available but the majority is have suffered alteration in that some form by injected humour or randomised that words which don't look even slightly believable. If you are going a to use a passage of Lorem Ipsum you need to be sure there isn't anything embarrassing. There are is many variations of passages available.</p> -->
                                    <div class="row justify-content-center">
                                        <div class="col-md-6 col-12  offset-md-1">
                                            <div class="container">
                                                <div class="table-responsive">
                                                    <div class="table-wrapper">
                                                        <table class="table table-striped table-cm">
                                                            <tbody>
                                                                <tr>
                                                                    <td>Position</td>
                                                                    <td><?php echo $page_contentsql[$profile_name]; ?></td>

                                                                </tr>
                                                                <tr>
                                                                    <td>Constituency Name</td>
                                                                    <td><?php echo $page_contentsql[$profile_constis_name]; ?></td>

                                                                </tr>
                                                                <tr>
                                                                    <td>Party Name</td>
                                                                    <td><?php echo $page_contentsql[$profile_party]; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Contact</th>
                                                                    <td><?php echo $page_contentsql[$profile_contact]; ?></td>

                                                                </tr>
                                                                <tr>
                                                                    <td>Address</td>
                                                                    <td><?php echo $page_contentsql[$profile_address]; ?></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </section>
    </form>
</div>
<?php require APPROOT . '/views/_inc/logo_slide.php';
?>
<?php require APPROOT . '/views/_inc/footer.php'; ?>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script> -->