<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <base href="<?php echo URLROOT; ?>" />
    <!-- <link rel="stylesheet" href="tnweb/css/bootstrap.css" /> -->

    <!-- <link rel="stylesheet" href="tnweb/css/main.css" /> -->
    <link rel="stylesheet" href="tnweb/css/responsive.css" />

    <link rel="stylesheet" href="tnweb/css/style.css" />

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
                <p>Government of Tamil Nadu</p>
                <div class="right-sec">
                    <ul>
                        <li><a href="#.">Skip To Main Content</a></li>
                        <li><a href="#."><i class="fa fa-font" aria-hidden="true">+</i> </a></li>
                        <li><a href="#."><i class="fa fa-font" aria-hidden="true"></i> </a></li>
                        <li><a href="#."><i class="fa fa-font" aria-hidden="true">-</i> </a></li>
                        <li><a href="#.">Screen Reader Access</a></li>
                    </ul>
                </div>
            </div>
        </div>


        <!-- Header -->
        <header>
            <div class="header-bottom">
                <div class="container">
                    <div class="grid grid-space-between">
                        <div class="logo">
                            <a href="#" title="Commissionerate of Transport and Road Safety">
                                <div class="logo-wrapper grid grid-align-center">
                                    <div class="logo-image">
                                        <img src="https://commerce.gov.in/wp-content/themes/m-commerce/assets/images/logo.png" alt="Commissionerate of Transport and Road Safety">
                                    </div>
                                    <div class="logo-text">
                                        <!-- <h1>Government of Tamil Nadu </h1> -->
                                        <h2> Commissionerate of Transport and Road Safety</h2>
                                        <h3> Government of Tamil Nadu </h3>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <!-- end of header logo-->
                        <!-- start of minister slider -->
                        <div class="top-minister top-minister-desktop grid grid-align-center">


                            <div class="minister-wrapper grid grid-align-center">
                                <div class="grid grid-align-center">
                                    <div class="azadi-image no-post">
                                        <img src="https://commerce.gov.in/wp-content/themes/m-commerce/assets/images/120w_75_azadi.png" alt="75_azad">

                                    </div>
                                    <div class="minister-image">
                                        <a href="AdminController/adminlogin" title="Login"> <img class="admin-img" src="https://www.actechindia.org/pkd-admin/images/6.png" alt="Login"></a>
                                    </div>
                                </div>
                                <!-- <div class="">
                                        <div class="minister-name">Login</div>
                                    </div> -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end of top minister -->
            </div>
       
          