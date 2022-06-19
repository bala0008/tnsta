    <?php require APPROOT . '/views/admin/header.php'; ?>
<?php require APPROOT . '/views/admin/admin-nav.php'; ?>
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

    /* input[type=submit] {
background-color: #04AA6D;
color: white;
padding: 5px 10px;
border: none;
border-radius: 4px;
cursor: pointer;
}

input[type=button] {
background-color: #04AA6D;
color: white;
padding: 5px 10px;
border: none;
border-radius: 4px;
cursor: pointer;
} */


    .add-role_honour.container {
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

    /* Clear floats after the columns */
    /* .row:after {
content: "";
display: table;
clear: both;
} */

    /* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
    @media screen and (max-width: 600px) {

        .col-25,
        .col-75,
        input[type=submit] {
            width: 100%;
            margin-top: 0;
        }
    }
</style>
<script>

</script>
<!-- Page Content  -->
<div class="main-content">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card" style="min-height: 485px">
                <div class="card-content">
                    <div class="container">
                        <form method="POST" name="role_honour_form" id="role_honour_form" autocomplete="off" enctype="multipart/form-data">
                            <div class="row ">
                                <div class="col-sm-6 form-group mb-0 float-right">
                                    <h5 class="text-left">Create Role Honour
                                    </h5>
                                </div>

                                <div class="col-sm-6 form-group mb-0 text-right">
                                    <div class="wrapper">
                                        <h1>Tamil Language </h1>
                                        <label class="switch">
                                            <input type="checkbox" id="tamil-switch" class="tamil-switch">
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row jumbotron">
                                <div class="col-sm-6 form-group">
                                    <label for="name-f"><span style="background:#18accd ;padding:5px;border-radius:4px;color:#fff">English</span> Name</label>
                                    <input type="text" name="en_role_honor_name" id="en_role_honor_name" value="<?php if (isset($data['sql']->role_honor_id) && ($data['sql']->role_honor_id) != '') {
                                                                                                                    echo $data['sql']->en_role_honor_name;
                                                                                                                } ?>">
                                </div>
                                <div class="col-sm-6 form-group tn_role_honour_title">
                                    <label for="name-f"><span style="background:#18accd ;padding:5px;border-radius:4px;color:#fff">Tamil</span> Title</label>
                                    <input type="text" name="tn_role_honor_name" id="tn_role_honor_name" value="<?php if (isset($data['sql']->role_honor_id) && ($data['sql']->role_honor_id) != '') {
                                                                                                                    echo $data['sql']->tn_role_honor_name;
                                                                                                                } ?>">
                                </div>

                                <?php
                                if (isset($data['sql']->role_honor_id) && ($data['sql']->role_honor_id) != '') {
                                    $effect_from_date = date('d-m-Y', strtotime($data['sql']->role_honor_fromdate));
                                    $effect_to_date = date('d-m-Y', strtotime($data['sql']->role_honor_todate));
                                } else {
                                    $effect_from_date = date('d-m-Y');
                                    $effect_to_date = date('d-m-Y');
                                }

                                ?>
                                <div class="col-sm-6 form-group">
                                    <label for="address-1">From Date<span style='color:red'>*</span> </label>
                                    <input type="text" class="form-control" name="role_honor_fromdate" id="role_honor_fromdate" value="<?php echo $effect_from_date; ?>" readonly>
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label for="address-1">To Date<span style='color:red'>*</span> </label>
                                    <input type="text" class="form-control" name="role_honor_todate" id="role_honor_todate" readonly disabled value="<?php echo $effect_to_date; ?>">
                                </div>
                                <div class="col-sm-12 form-group mb-0 text-center">
                                    <!-- <input type="submit" class="btn btn-primary btn-sm" name="save_role_honour" id="save_role_honour" value="Submit"> -->
                                    <input type="button" value="Submit" name="save_role_honour" class="btn btn-primary btn-sm" onclick="save();">
                                    <input type="button" value="Cancel" class="btn btn-success btn-sm" onclick="history.back();">
                                    <input type="hidden" name="id" id="id" value="<?php if (isset($data['sql']->role_honor_id) && ($data['sql']->role_honor_id) != '') {
                                                                                        echo $data['sql']->role_honor_id;
                                                                                    } ?>">
                                    <input type="hidden" name="action" id="action" value="<?php if (isset($data['sql']->role_honor_id) && ($data['sql']->role_honor_id) != '') {
                                                                                                echo "edit";
                                                                                            } else {
                                                                                                echo "new";
                                                                                            }
                                                                                            ?>">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require APPROOT . '/views/admin/footer.php'; ?>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
<link type="text/css" rel="Stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/start/jquery-ui.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
<script>
    $(document).ready(function() {
        $(".tn_role_honour_title").hide();
    });
    $('#tamil-switch').change(function() {
        var id = $(this).val(); // this gives me null
        var checked = $(this).is(':checked');
        if (checked == true) {
            $(".tn_role_honour_title").show();
        } else {
            $(".tn_role_honour_title").hide();
        }

    });

    function save() {
        var email = $('#email').val();
        var psw = $('#pwd').val();

        var id = $('#id').val();
        var action = $('#action').val();
        var baseurl = "<?php echo URLROOT; ?>AdminController/role_honour_save";
        var rediecturl = "<?php echo URLROOT; ?>AdminController/list_role_honour";

        var formData = new FormData();
        var files = $('input[type=file]');

        for (var i = 0; i < files.length; i++) {
            if (files[i].value) {
                formData.append(files[i].name, files[i].files[0]);
            }
        }
        var formSerializeArray = $("#role_honour_form").serializeArray();
        for (var i = 0; i < formSerializeArray.length; i++) {
            formData.append(formSerializeArray[i].name, formSerializeArray[i].value)
        }
        Swal.fire({
            title: 'Do you want to Save The Data?',
            showDenyButton: true,
            confirmButtonText: 'Yes',
            denyButtonText: 'No',
            customClass: {
                actions: 'my-actions',
                confirmButton: 'order-2',
                denyButton: 'order-3',
                timer: 2000,
                showConfirmButton: false
            }
        }).then((result) => {
            if (result.isConfirmed) {
                jQuery.ajax({
                    url: baseurl,
                    data: formData,
                    contentType: false,
                    processData: false,
                    cache: false,
                    type: 'post',
                    // dataType: 'json',
                    success: function(response) {
                        // alert(response);
                        if (response.message) {
                            Swal.fire(response.response + 'successfully!', '', 'success')
                            setTimeout(function() { // wait for 5 secs(2)
                                // location.reload(); // then reload the page.(3)
                                window.location.href = rediecturl;
                            }, 1500);
                        }
                    }
                });
            } else if (result.isDenied) {
                Swal.fire('Changes are not' + response.response, '', 'info')
                window.location.href = rediecturl;
            }
        })
        // $.ajax({
        //     type: 'POST',
        //     url: url,
        //     data: formData,
        //     contentType: false,
        //     processData: false,
        //     cache: false,
        //     // dataType: 'json',
        //     success: function(response) {
        //         window.location.href = rediecturl;
        //     }
        // });
    }
</script>
<script>
    $.datepicker.setDefaults({
        changeMonth: true,
        changeYear: true,
        inline: true,
        altField: "#datep",
        showOn: "button",
        buttonImage: "datepicker.png",
        buttonText: "Date Picker",
        buttonImageOnly: true,
        dateFormat: 'dd-mm-yy',
        // minDate: 'dateToday',
    });
    $(function() {
        $("#role_honor_fromdate").datepicker();
        $('#role_honor_todate').prop('disabled', false);
        $("#role_honor_todate").datepicker();
    });

    // $("#role_honor_fromdate").datepicker({
    //   format: 'dd-m-yyyy',
    //   autoclose: true,
    // }).on('changeDate', function (selected) {
    //     var startDate = new Date(selected.date.valueOf());
    //     $('#role_honor_todate').datepicker('setStartDate', startDate);
    // }).on('clearDate', function (selected) {
    //     $('#role_honor_todate').datepicker('setStartDate', null);
    // });

    // $("#role_honor_todate").datepicker({
    //      format: 'dd-m-yyyy',
    //    autoclose: true,
    // }).on('changeDate', function (selected) {
    //    var endDate = new Date(selected.date.valueOf());
    //    $('#role_honor_fromdate').datepicker('setEndDate', endDate);
    // }).on('clearDate', function (selected) {
    //    $('#role_honor_fromdate').datepicker('setEndDate', null);
    // });
</script>