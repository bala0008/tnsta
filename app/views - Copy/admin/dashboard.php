<?php require APPROOT . '/views/admin/header.php'; ?>
<?php require APPROOT . '/views/admin/admin-nav.php'; ?>
<!-- <link rel="stylesheet" href="assets/css/bootstrap.min.css"> -->
<style>
    * {
        box-sizing: border-box;
    }

    @media (min-width: 576px) {
        .jumbotron {
            padding: 1.5em 4rem;
        }
    }

    input[type=text],
    input[type=file],
    select,
    textarea {
        width: 100%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 4px;
        resize: vertical;
    }

    label {
        padding: 12px 12px 12px 0;
        display: inline-block;
    }

    .add-whatsnew.container {
        border-radius: 5px;
        background-color: #f2f2f2;
        padding: 20px;
    }

    .col-25 {
        float: left;
        width: 25%;
        margin-top: 6px;
    }

    .col-75 {
        float: left;
        width: 75%;
        margin-top: 6px;
    }

    @media screen and (max-width: 600px) {

        .col-25,
        .col-75,
        input[type=submit] {
            width: 100%;
            margin-top: 0;
        }
    }

    .section-dash .container {
        font-size: 14px;
        display: flex;
        flex-wrap: wrap;
        font-family: Arial, Helvetica, sans-serif;
    }

    .section-dash a .card {
        flex-basis: 30%;
        min-width: 250px;
        text-align: center;
        margin: 0px 20px 20px 0px;
        padding: 10px;
    }

    /* Card Header */
    .section-dash a .card .card-header {
        padding: 15px 0px;
        color: white;
        text-transform: uppercase;
    }


    .section-dash .card-header .time {
        margin: 5px 0px;
        background: #81ac80;
        padding: 10px;
    }

    .section-dash .card-header.allrecord .business-model {
        margin: 5px 0px;
        background: #81ac80;
        padding: 10px;
    }

    .section-dash .card-header.allpublished .business-model {
        margin: 5px 0px;
        background: #415164;
        padding: 10px;
    }

    .section-dash .card-header.allunpublished .business-model {
        margin: 5px 0px;
        background: #6e747b;
        ;
        padding: 10px;
    }

    .section-dash .business-model {
        letter-spacing: 3px;
    }


    .section-dash .card-header.allrecord {
        background-color: #529251 !important;
    }

    .section-dash .card-header.allpublished {
        background-color: #1d2733 !important;
    }

    .section-dash .card-header.allunpublished {
        background-color: #3f4751 !important;
    }

    .section-dash .card-header.small-business {
        background-color: #2c4985 !important;
    }

    .section-dash .card-header.enterprise {
        background-color: black !important;
    }

    .section-dash .money {
        margin: 0px;
        font-size: 5rem;
        font-weight: 400;
    }

    .section-dash .unit {
        color: #8c9a8c;
    }

    /* Card Body */
    .section-dash .list-content {
        margin: 0px;
        padding: 0px;
        list-style-type: none;
    }

    .section-dash .list-content .content-item {
        padding: 7px 0px;
        border: 1px solid rgba(228, 226, 226, 0.933);
        border-top: none;
        background-color: #f7f7f7;
    }

    /* Card Footer */
    .section-dash .card-footer {
        border: 1px solid rgba(228, 226, 226, 0.933);
        border-top: none;
        padding: 13px 0px;
    }

    .section-dash .card-footer a {
        padding: 4px 8px;
        border-radius: 15px;
        border: 1px solid grey;
        background-color: inherit;
        font-weight: 700;
        color: #529251;
    }

    .business-model {
        color: aliceblue !important;
    }

    .money {
        color: aliceblue !important;
    }

    .section-dash .card-footer .btn-choose:hover {
        background-color: rgb(199, 174, 174);
    }
</style>
<script>

</script>
<!-- Page Content  -->
<div class="main-content">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card" style="height:500px">
                <div class="card-content">
                    <div class="container">
                        <form method="POST" name="menur_form" id="menur_form" autocomplete="off" enctype="multipart/form-data">
                            <div class="row jumbotron">
                                <div class="col-sm-6 form-group">
                                    <label for="address-1">Parent Menu : <span style='color:red'>*</span></label>
                                    <select name="parent_id" id="parent_id">
                                        <option value="">----Select Parent Menu----</option>
                                        <?php
                                        foreach ($data['current_menu'] as $sn => $c_menu) {
                                            print_r($c_menu);
                                        ?>
                                            <option value="<?php echo $c_menu['menu_id']; ?>"><?php echo $c_menu['en_menu_name']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-sm-6" id="response">

                                </div>
                            </div>
                            <section class="section-dash">
                                <div class="container" id="submenudash">

                                </div>
                            </section>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
<?php require APPROOT . '/views/admin/footer.php'; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    $(document).ready(function() {
        // $(".section-dash").hide();
        $("#parent_id").change(function() {
            var baseurl = "<?php echo URLROOT; ?>AdminController/ajaxresponsefordashboardmenu";
            var rediecturl = "<?php echo URLROOT; ?>AdminController/index";
            var selectedparent_menu = $("#parent_id option:selected").val();
            $.ajax({
                type: "POST",
                url: baseurl,
                data: {
                    selectedparent_menu: selectedparent_menu
                }
            }).done(function(data) {
                $("#response").html(data);
            });
        });

    });
    $(document).on('change', '.sub_menu', function() {
        var baseurl = "<?php echo URLROOT; ?>AdminController/ajaxresponsesectiondash";
        var element = $("option:selected", this);
        var myTag = element.attr("myTag");
        $.ajax({
            type: "POST",
            url: baseurl,
            data: {
                myTag: myTag
            }
        }).done(function(data) {
            $("#submenudash").html(data);
        });
    });
</script>