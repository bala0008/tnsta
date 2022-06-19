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
                        <form method="POST" name="menur_form" id="menur_form" autocomplete="off" enctype="multipart/form-data">
                            <div class="row ">
                                <div class="col-sm-6 form-group mb-0 float-right">
                                    <h5 class="text-left">Create Menu
                                    </h5>
                                </div>

                                <div class="col-sm-6 form-group mb-0 text-right">
                                    <div class="wrapper">
                                        <h6>Tamil Language </h6>
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
                                    <label for="name-f"><span style="background:#18accd ;padding:5px;border-radius:4px;color:#fff">English</span> Menu Name</label>
                                    <input type="text" name="en_menu_name" id="en_menu_name" value="<?php if (isset($data['sql']->tender_id) && ($data['sql']->tender_id) != '') {
                                                                                                        echo $data['sql']->en_menu_name;
                                                                                                    } ?>">
                                </div>
                                <div class="col-sm-6 form-group mst_menukey_hide">
                                    <label for="name-f"><span style="background:#18accd ;padding:5px;border-radius:4px;color:#fff">English</span> Menu Name</label>
                                    <input type="text" name="mst_menukey" id="mst_menukey" value="">
                                </div>
                                <div class="col-sm-6 form-group tn_menu_name">
                                    <label for="name-f"><span style="background:#18accd ;padding:5px;border-radius:4px;color:#fff">Tamil</span> Title</label>
                                    <input type="text" name="tn_menu_name" id="tn_menu_name" value="<?php if (isset($data['sql']->tender_id) && ($data['sql']->tender_id) != '') {
                                                                                                        echo $data['sql']->tn_menu_name;
                                                                                                    } ?>">
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label for="address-1">Menu Type : <span style='color:red'>*</span></label>
                                    <select name='menu_type' id="menu_type">
                                        <option value="" class="form-control">----Select Menu Type----</option>
                                        <?php
                                        foreach ([1 => 'Page', 'External', 'Pdf'] as $key => $value) :

                                            //foreach ([1 => 'Page', 'Internal', 'External', 'Pdf'] as $key => $value) :
                                            $selected = "";

                                        ?>
                                            <option <?php echo $selected; ?> value="<?php echo $key; ?>"><?php echo $value; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-sm-6 form-group menulinkDiv" style="display:none">
                                    <label for="name-f">Link :</label>
                                    <input type="text" name="menu_link" id="menu_link" value="<?php if (isset($data['sql']->tender_id) && ($data['sql']->tender_id) != '') {
                                                                                                    echo $data['sql']->menu_link;
                                                                                                } ?>">
                                    <label for="name-f">Goverment Link :</label>
                                    <input type="checkbox" name="is_redirect_popup" id="is_redirect_popup" value="1">
                                </div>

                                <div class="col-sm-6 form-group attachmentDiv" style="display:none">
                                    <label for="address-1"> Attachment : <span style='color:red'>*</span></label>
                                    <input type="file" class="form-control" name="menu_attachment" id="menu_attachment">
                                </div>
                                <div class="col-sm-6 form-group pageContainer">
                                    <label for="address-1">Page : <span style='color:red'>*</span></label>
                                    <select name="menu_page" id="menu_page">
                                        <option value="">----Select Menu----</option>
                                        <?php
                                        foreach ($data['current_page'] as $sn => $c_menu) {
                                        ?>
                                            <option value="<?php echo $c_menu['page_id']; ?>"><?php echo $c_menu['en_title']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label for="address-1">Level : <span style='color:red'>*</span></label>
                                    <select name="level_id" id="level_id">
                                        <option value="">----Select Menu----</option>
                                        <option value="0">Main Menu</option>
                                        <option value="1">SubMenu</option>
                                    </select>
                                </div>
                                <div class="col-sm-6 form-group" id="subcategory">
                                    <label for="address-1">Parent Menu :<span style='color:red'>*</span></label>
                                    <select name="parent_id" id="parent_id">
                                        <option value="">----Select Parent Menu----</option>
                                        <?php
                                        foreach ($data['current_menu'] as $sn => $c_menu) {
                                        ?>
                                            <option value="<?php echo $c_menu['menu_id']; ?>"><?php echo $c_menu['en_menu_name']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="col-sm-12 form-group mb-0 text-center">
                                    <!-- <input type="submit" class="btn btn-primary btn-sm" name="save_whatsnew" id="save_whatsnew" value="Submit"> -->
                                    <input type="button" value="Submit" name="save_tender" class="btn btn-primary btn-sm" onclick="save();">
                                    <input type="button" value="Cancel" class="btn btn-success btn-sm" onclick="history.back();">
                                    <input type="hidden" name="id" id="id" value="<?php if (isset($data['sql']->tender_id) && ($data['sql']->tender_id) != '') {
                                                                                        echo $data['sql']->tender_id;
                                                                                    } ?>">
                                    <input type="hidden" name="action" id="action" value="<?php if (isset($data['sql']->tender_id) && ($data['sql']->tender_id) != '') {
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

<script>
    $("#is_redirect_popup").change(function() {
        if ($(this).prop('checked')) {
            alert("Goverment Link Selected");
        } else {
            alert("Goverment Link deselect");
        }
    });
    $("select[name='menu_type']").on('change', function() {

        if ($(this).val() == 1) {
            $(".attachmentDiv").hide();
            $(".menulinkDiv").hide();
            $(".pageContainer").show();
            $('#menu_link').val('#');
        } else if ($(this).val() == 2) {
            $(".attachmentDiv").hide();
            $(".pageContainer").hide();
            $(".menulinkDiv").show();
            $('#menu_link').val('');

        } else if ($(this).val() == 3) {
            $(".attachmentDiv").show();
            $(".menulinkDiv").hide();
            $(".pageContainer").hide();
            $('#menu_link').val('#');
        } else {
            $(".attachmentDiv").hide();
            $(".menulinkDiv").hide();
            $(".pageContainer").show();
            $('#menu_link').val('#');
        }
    });
    $('#subcategory').hide();

    $('#level_id').on('change', function() {
        var level = (this.value);
        if (level != 0) {
            $('#subcategory').show();
        } else {
            $('#subcategory').hide();
        }

    });
</script>
<script>
    $(document).ready(function() {
        $(".mst_menukey_hide").hide();
    });

    function save() {
        var id = $('#id').val();
        var action = $('#action').val();
        var baseurl = "<?php echo URLROOT; ?>AdminController/menu_save";
        var rediecturl = "<?php echo URLROOT; ?>AdminController/list_menu";

        var formData = new FormData();
        var files = $('input[type=file]');

        for (var i = 0; i < files.length; i++) {
            if (files[i].value) {
                formData.append(files[i].name, files[i].files[0]);
            }
        }
        var formSerializeArray = $("#menur_form").serializeArray();
        for (var i = 0; i < formSerializeArray.length; i++) {
            formData.append(formSerializeArray[i].name, formSerializeArray[i].value)
        }
        Swal.fire({
            title: 'Do you want to Change The Data?',
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
                $.ajax({
                    url: baseurl,
                    data: formData,
                    contentType: false,
                    processData: false,
                    cache: false,
                    type: 'post',
                    // dataType: 'json',
                    success: function(response) {
                        alert(response);
                        if (response.message == 1) {
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
    }
    $(document).on('change', '#en_menu_name', function() {
        var menu_name = $("#en_menu_name").val();
        menu_name = (menu_name.replace(/[^a-z0-9\s]/gi, '').replace(/[_\s]/g, ''));
        $("#mst_menukey").val(menu_name);
    });
</script>