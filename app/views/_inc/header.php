<?php
$lang = (!isset($_SESSION['lang'])) ? 'en' : trim($_SESSION['lang']);
$_SESSION['lang'] = $lang;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <base href="<?php echo URLROOT; ?>" />
    <script src="common_file/js/bootstrap.bundle.min.js"></script>
    <link href="common_file/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="common_file/css/font-awesome.min.4.7.css">
    <link rel="stylesheet" href="tnweb/css/responsive.css" />
    <link rel="stylesheet" href="tnweb/css/style.css" />
    <link href="common_file/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <link href="slide/stylesheets/screen.css" media="screen, projection" rel="stylesheet" type="text/css" />
    <link href="slide/stylesheets/print.css" media="print" rel="stylesheet" type="text/css" />
    <link href="slide/stylesheets/responsive-carousel.css" media="screen, projection" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="tab/css/tabs.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="logoslide/css/slide.css" />
    <link rel="stylesheet" href="logoslide/css/style.css">
    <link rel="stylesheet" href="tnweb/css/nicepage.css" media="screen">
    <link rel="stylesheet" href="tnweb/css/version_style.css" media="screen">


    <style type="text/css">
        /* ============ desktop view ============ */
        @media all and (min-width: 992px) {

            .dropdown-menu li {
                position: relative;
            }

            .dropdown-menu .submenu {
                display: none;
                position: absolute;
                left: 100%;
                top: -7px;
            }

            .dropdown-menu .submenu-left {
                right: 100%;
                left: auto;
            }

            .dropdown-menu>li:hover {
                background-color: #f1f1f1
            }

            .dropdown-menu>li:hover>.submenu {
                display: block;
            }
        }

        /* ============ desktop view .end// ============ */

        /* ============ small devices ============ */
        @media (max-width: 991px) {

            .dropdown-menu .dropdown-menu {
                margin-left: 0.7rem;
                margin-right: 0.7rem;
                margin-bottom: .5rem;
            }

        }

        /* ============ small devices .end// ============ */
    </style>


    <script type="text/javascript">
        //	window.addEventListener("resize", function() {
        //		"use strict"; window.location.reload(); 
        //	});


        document.addEventListener("DOMContentLoaded", function() {


            /////// Prevent closing from click inside dropdown
            document.querySelectorAll('.dropdown-menu').forEach(function(element) {
                element.addEventListener('click', function(e) {
                    e.stopPropagation();
                });
            })



            // make it as accordion for smaller screens
            if (window.innerWidth < 992) {

                // close all inner dropdowns when parent is closed
                document.querySelectorAll('.navbar .dropdown').forEach(function(everydropdown) {
                    everydropdown.addEventListener('hidden.bs.dropdown', function() {
                        // after dropdown is hidden, then find all submenus
                        this.querySelectorAll('.submenu').forEach(function(everysubmenu) {
                            // hide every submenu as well
                            everysubmenu.style.display = 'none';
                        });
                    })
                });

                document.querySelectorAll('.dropdown-menu a').forEach(function(element) {
                    element.addEventListener('click', function(e) {

                        let nextEl = this.nextElementSibling;
                        if (nextEl && nextEl.classList.contains('submenu')) {
                            // prevent opening link if link needs to open dropdown
                            e.preventDefault();
                            console.log(nextEl);
                            if (nextEl.style.display == 'block') {
                                nextEl.style.display = 'none';
                            } else {
                                nextEl.style.display = 'block';
                            }
                        }
                    });
                })
            }
            // end if innerWidth

        });
        // DOMContentLoaded  end
    </script>
</head>

<body>
    <!-- Page Wrapper -->
    <div id="wrap" class="layout-1">
        <!-- Top bar -->
        <div class="top-bar">
            <div class="container">
                <div class="row">
                    <div class="col-4 col-md-6 header-icon-text text-xs-right">
                        <p><a href="#.">Skip To Main Content</a></p>
                    </div>
                    <div class="col-8 col-md-6 text-xs-left">
                        <div class="right-sec">
                            <ul>
                                <li><a href="#."><i class="fa fa-font" aria-hidden="true">+</i> </a></li>
                                <li><a href="#."><i class="fa fa-font" aria-hidden="true"></i> </a></li>
                                <li><a href="#."><i class="fa fa-font" aria-hidden="true">-</i> </a></li>
                                <li><a href=""><i class='fa fa-circle'></i></a></li>
                                <li><a>
                                        <select class="translate" id="translate">
                                            <option value="en">English</option>
                                            <option value="tn">தமிழ்</option>
                                        </select>
                                    </a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header -->
        <header>
            <div class="header-bottom">
                <div class="container">
                    <div class="grid grid-space-between">
                        <div class="logo">
                            <a href="" title="Commissionerate of Transport and Road Safety ">
                                <div class="logo-wrapper grid grid-align-center">
                                    <div class="logo-image">
                                        <img src="https://cdn.s3waas.gov.in/s31651cf0d2f737d7adeab84d339dbabd3/uploads/2018/03/2018032627.png" alt="State Emblem of India" style="position: relative; top: 6px;">
                                    </div>
                                    <div class="logo-text">
                                        <!-- <h1> Government of India  </h1> -->
                                        <h2 class="lang" key="top_title"> Commissionerate of Transport and Road Safety </h2>
                                        <h3 class="lang" key="top_sub_title"> Government of Tamil Nadu</h3>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <!-- end of header logo-->
                        <!-- start of minister slider -->
                        <div class="top-minister top-minister-desktop grid grid-align-center">
                            <div class="minister-wrapper grid grid-align-center">
                                <div class="grid grid-align-center">

                                    <?php
                                    if ((!isset($_SESSION['username']) == ' ') || $_SESSION['username'] == '') { ?>
                                        <div class="minister-image">
                                            <a href="AdminController/adminlogin" title="Login"> <img class="admin-img" src="https://thumbs.dreamstime.com/b/vector-illustration-isolated-white-background-login-button-icon-126999949.jpg" alt="Login"></a>
                                        </div>
                                    <?php } else {
                                    ?>
                                        <div class="minister-image">
                                            <a href="AdminController/logout" title="Logout"> <img class="admin-img" src="https://c8.alamy.com/zooms/9/8b41def909934e1584c9677c611fb8eb/2bhaee1.jpg" alt="Logout"></a>
                                        </div>
                                    <?php }    ?>
                                </div>
                            </div>
                        </div>
                        <div class="logo-right-mobile grid grid-align-center">
                            <div class="mobile-menu">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end of top minister -->
            </div>