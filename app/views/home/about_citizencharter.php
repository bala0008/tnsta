<?php require APPROOT . '/views/_inc/header.php'; ?>
<?php require APPROOT . '/views/_inc/nav.php'; ?>
<style>
    .table__head {
        color: #FFF;
        font-weight: 700;
        background: #9b4085;
        background: -moz-linear-gradient(-45deg, #9b4085 0%, #608590 100%);
        background: -webkit-linear-gradient(-45deg, #9b4085 0%, #608590 100%);
        background: linear-gradient(135deg, #9b4085 0%, #608590 100%);
        white-space: nowrap;
    }

    .table-bordered td,
    .table-bordered th {
        border: 0px solid #FFF;
    }

    .about-level .winner__table ul {
        /* width: 130px; */


    }

    .about-level .winner__table ul#level_11 {
        /* list-style: lower-roman; */
        list-style: auto;
        /* width: 130px; */

    }

    .about-level .winner__table ul li {
        padding: 5px 5px;
    }

    .about-level .winner__table ul#form {
        list-style: decimal;
        /* width: 130px; */

    }

    .coin {
        width: 8%;
        margin-left: 5px;
        -webkit-animation: spin 4s linear infinite;
        -moz-animation: spin 4s linear infinite;
        animation: spin 4s linear infinite;
    }

    @-moz-keyframes spin {
        100% {
            -moz-transform: rotate(360deg);
        }
    }

    @-webkit-keyframes spin {
        100% {
            -webkit-transform: rotate(360deg);
        }
    }

    @keyframes spin {
        100% {
            -webkit-transform: rotate(360deg);
            transform: rotate(360deg);
        }
    }

    .winner__table {
        white-space: nowrap;
    }

    @media screen and (max-width: 567px) {

        .winner__table {
            font-size: 12px;
        }

        .coin {
            width: 15%;
            margin-left: 2px;
        }
    }

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

    select.demoInputBox{
        padding: 5px;
        font-size: 16px;
        font-weight: 600;
    }
</style>
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
                                    <li class="breadcrumb-item active" aria-current="page"><?php echo "CITIZEN CHARTER"; ?></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="breadcrumb-content pt-2">
                        <h3 style="text-align:center;">CITIZEN CHARTER</h3>
                    </div>

                    <div class="row" style="text-align:center">
                        <div class="col-12 form-group  pt-2">
                            <select name="level_1" id="level1-list" class="demoInputBox level1" onChange="getLevel_1(this.value);">
                                <option value disabled selected>Select</option>
                                <?php
                                foreach ($data['Result'] as $level1) {
                                ?>
                                    <option value="<?php echo $level1["level_1_id"]; ?>"><?php echo $level1["level_1_menu_name"]; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-12 form-group  pt-2">
                            <select name="level_2" id="level2-list" class="demoInputBox" onChange="getLevel_2(this.value);">
                                <option value disabled selected>Select </option>
                            </select>
                        </div>
                        <div class="col-12 form-group  pt-2">
                            <div class="response" id="response">

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