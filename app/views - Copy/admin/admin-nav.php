<style>
    #translate {
        padding: 0px;
    }
</style>
<div class="body-overlay"></div>
<!-- Sidebar  -->
<nav id="sidebar">
    <ul class="list-unstyled components">
        <li class="active">
            <a class="dashboard"><i class="fa fa-user"></i><span><?php echo $_SESSION['rolename']; ?></span></a>
        </li>

        <div class="small-screen navbar-display">
            <li class="d-lg-none d-md-block d-xl-none d-sm-block">
                <a href="#"><i class="material-icons">apps</i><span>apps</span></a>
            </li>

            <li class="d-lg-none d-md-block d-xl-none d-sm-block">
                <a href="#"><i class="material-icons">person</i><span>user</span></a>
            </li>

            <li class="d-lg-none d-md-block d-xl-none d-sm-block">
                <a href="#"><i class="material-icons">settings</i><span>setting</span></a>
            </li>
        </div>


        <li class="dropdown">
            <a href="#homeSubmenu1" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <i class="fa fa-clone"></i><span>Whats New</span></a>
            <ul class="collapse list-unstyled menu" id="homeSubmenu1">
                <?php
                if (($_SESSION['roleid'] == 1) || ($_SESSION['roleid'] == 2) || ($_SESSION['roleid'] == 3)) {
                ?>
                    <li>
                        <a href="AdminController/whatsnew">Create New</a>
                    </li>
                <?php } ?>
                <li>
                    <a href="AdminController/list_whatsnew">Edit</a>
                </li>

                <li>
                    <a href="AdminController/list_whatsnew?status=<?php echo "1" ?>">View</a>
                </li>
            </ul>
        </li>
        <li class="dropdown">
            <a href="#notification" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <i class="fa fa-clone"></i><span>Notification</span></a>
            <ul class="collapse list-unstyled menu" id="notification">
                <?php
                if (($_SESSION['roleid'] == 1) || ($_SESSION['roleid'] == 2) || ($_SESSION['roleid'] == 3)) {
                ?>
                    <li>
                        <a href="AdminController/notification">Create New</a>
                    </li>
                <?php } ?>
                <li>
                    <a href="AdminController/list_notification">Edit</a>
                </li>
                <li>
                    <a href="AdminController/list_notification?status=<?php echo "1" ?>">View</a>
                </li>
            </ul>
        </li>
        <li class="dropdown">
            <a href="#homeSubmenu2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <i class="fa fa-clone"></i><span>Tender</span></a>
            <ul class="collapse list-unstyled menu" id="homeSubmenu2">
                <?php
                if (($_SESSION['roleid'] == 1) || ($_SESSION['roleid'] == 2) || ($_SESSION['roleid'] == 3)) {
                ?>
                    <li>
                        <a href="AdminController/tender">Create New</a>
                    </li>
                <?php } ?>
                <li>
                    <a href="AdminController/list_tender">Edit</a>
                </li>
                <li>
                    <a href="AdminController/list_tender?status=<?php echo "1" ?>">View</a>
                </li>
            </ul>
        </li>
        <li class="dropdown">
            <a href="#profile" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <i class="fa fa-clone"></i><span>Profile</span></a>
            <ul class="collapse list-unstyled menu" id="profile">
                <?php
                if (($_SESSION['roleid'] == 1) || ($_SESSION['roleid'] == 2) || ($_SESSION['roleid'] == 3)) {
                ?>
                    <li>
                        <a href="AdminController/profile">Create New</a>
                    </li>
                <?php } ?>
                <li>
                    <a href="AdminController/list_tender">Edit</a>
                </li>
                <li>
                    <a href="AdminController/list_tender?status=<?php echo "1" ?>">View</a>
                </li>
            </ul>
        </li>
        <?php
        if (($_SESSION['roleid'] == 1) || ($_SESSION['roleid'] == 2) || ($_SESSION['roleid'] == 3)) {
        ?>
            <li class="dropdown">
                <a href="#homeSubmenu3" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="fa fa-clone"></i><span>Menu</span></a>
                <ul class="collapse list-unstyled menu" id="homeSubmenu3">

                    <li>
                        <a href="AdminController/menu">Create New</a>
                    </li>
                </ul>
            </li>
        <?php } ?>


        <!-- <li class="">
                    <a href="#"><i class="material-icons">date_range</i><span>copy</span></a>
                </li> -->
        <li class="dropdown">
            <a href="#page" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <i class="fa fa-clone"></i><span>Page</span></a>
            <ul class="collapse list-unstyled menu" id="page">
                <?php
                if (($_SESSION['roleid'] == 1) || ($_SESSION['roleid'] == 2) || ($_SESSION['roleid'] == 3)) {
                ?>
                    <li>
                        <a href="AdminController/page">Create New</a>
                    </li>
                <?php } ?>
                <li>
                    <a href="AdminController/list_page">Edit</a>
                </li>
                <li>
                    <a href="AdminController/list_page?status=<?php echo "1" ?>">View</a>
                </li>
            </ul>
        </li>
        <li class="">
            <a href="AdminController/logout"><i class="fa fa-sign-out" style="font-size:24px;color:red"></i><span>LogOut</span></a>
        </li>
    </ul>
</nav>
<div id="content">

    <div class="top-navbar">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">

                <button type="button" id="sidebarCollapse" class="d-xl-block d-lg-block d-md-mone d-none">
                    <span class="fa fa-bars"></span>
                </button>

                <a class="navbar-brand" href="AdminController/index"> Dashboard </a>

                <button class="d-inline-block d-lg-none ml-auto more-button" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="fa fa-bars">
                    </span>
                </button>

                <div class="collapse navbar-collapse d-lg-block d-xl-block d-sm-none d-md-none d-none" id="navbarSupportedContent">
                    <ul class="nav navbar-nav ml-auto">
                        <li class="dropdown nav-item active">
                            <a href="#" class="nav-link" data-toggle="dropdown">
                                <span class=""><i class="fa fa-user" style="color: #fff;font-size: 20px"></i></span>
                                <span class="material-icons"> &nbsp;<?php echo $_SESSION['username']; ?> </span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a>[<?php echo $_SESSION['rolename']; ?>]</a>
                                </li>
                                <li>
                                    <a data-bs-toggle="modal" data-bs-target="#myModal">
                                        <i class="fa fa-lock icon-response" style="font-size:24px;" aria-hidden="true"></i>&nbsp;
                                        Change Password
                                    </a>
                                </li>
                                <li>
                                    <a href="AdminController/logout"><i class="fa fa-sign-out icon-response" style="font-size:24px;color:red" aria-hidden="true"></i>&nbsp;
                                        Log Out</a>
                                </li>

                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <!-- The Modal -->
    <div class="modal" id="myModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Modal Heading</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    Modal body..
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>