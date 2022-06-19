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


    .add-page.container {
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
                        <form method="POST" id="page-form">
                            <div class="row">
                                <div class="col-sm-6 form-group mb-0 float-right">
                                    <h5 class="text-left">Page Creation
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
                                <div class="col-6">
                                    <div class="col-sm-12 form-group">
                                        <label for="name-f"><span style="background:#18accd ;padding:5px;border-radius:4px;color:#fff">English</span> Title</label>
                                        <input type="text" name="en_title" id="en_title" value="<?php if (isset($data['sql']->page_id) && ($data['sql']->page_id) != '') {
                                                                                                        echo $data['sql']->en_title;
                                                                                                    } ?>">
                                    </div>
                                    <div class=" col-sm-12 form-group">
                                        <label for="name-f"><span style="background:#18accd ;padding:5px;border-radius:4px;color:#fff">English</span> Page Content </label>
                                        <textarea id='en_page_content' name='en_page_content'><?php if (isset($data['sql']->page_id) && ($data['sql']->page_id) != '') {
                                                                                                                                                                                    echo $data['sql']->en_page_content;
                                                                                                                                                                                } ?></textarea><br>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="col-sm-12 form-group tn_page_title">
                                        <label for="name-f"><span style="background:#18accd ;padding:5px;border-radius:4px;color:#fff">Tamil</span> Title</label>
                                        <input type="text" name="tn_title" id="tn_title" value="<?php if (isset($data['sql']->page_id) && ($data['sql']->page_id) != '') {
                                                                                                        echo $data['sql']->tn_title;
                                                                                                    } ?>">
                                    </div>
                                    <div class="col-sm-12 form-group tn_page_title">
                                        <label for="name-f"><span style="background:#18accd ;padding:5px;border-radius:4px;color:#fff">Tamil</span> Page Content </label>
                                        <textarea id='tn_page_content' name='tn_page_content'><?php if (isset($data['sql']->page_id) && ($data['sql']->page_id) != '') {
                                                                                                                                                                                    echo $data['sql']->tn_page_content;
                                                                                                                                                                                } ?></textarea><br>
                                    </div>
                                </div>
                                <div class="col-sm-12 form-group mb-0 text-center">
                                    <input type="button" value="Submit" name="save_page" class="btn btn-primary btn-sm" onclick="save();">
                                    <input type="button" value="Cancel" class="btn btn-success btn-sm" onclick="history.back();">
                                    <input type="hidden" name="id" id="id" value="<?php if (isset($data['sql']->page_id) && ($data['sql']->page_id) != '') {
                                                                                        echo $data['sql']->page_id;
                                                                                    } ?>">
                                    <input type="hidden" name="action" id="action" value="<?php if (isset($data['sql']->page_id) && ($data['sql']->page_id) != '') {
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
<base href="<?php echo URLROOT; ?>" />

<?php require APPROOT . '/views/admin/footer.php'; ?>

<script src="ckeditor/ckeditor.js"></script>

<script type="text/javascript">
    // Initialize CKEditor

    CKEDITOR.replace('en_page_content', {

        width: "500px",
        height: "200px"

    });
    CKEDITOR.replace('tn_page_content', {

        width: "500px",
        height: "200px"

    });
</script>

<script>
    $(document).ready(function() {
        $(".tn_page_title").hide();
    });
    $('#tamil-switch').change(function() {
        var id = $(this).val(); // this gives me null
        var checked = $(this).is(':checked');
        if (checked == true) {
            $(".tn_page_title").show();
        } else {
            $(".tn_page_title").hide();
        }

    });

    function save() {
        var id = $('#id').val();
        var action = $('#action').val();
        var baseurl = "<?php echo URLROOT; ?>AdminController/page_save";
        var rediecturl = "<?php echo URLROOT; ?>AdminController/list_page";3
        for (instance in CKEDITOR.instances)
            CKEDITOR.instances[instance].updateElement();
        var form = $("#page-form").serializeArray();
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
                    data: form,
                    type: 'post',
                    // dataType: 'json',
                    success: function(response) {
                        alert(response);
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
    }
</script>
<script>
    $.datepicker.setDefaults({
        showOn: "button",
        buttonImage: "datepicker.png",
        buttonText: "Date Picker",
        buttonImageOnly: true,
        dateFormat: 'dd-mm-yy',
        minDate: 'dateToday',
    });
    $(function() {
        $("#page_from_date").datepicker();
        $('#page_to_date').prop('disabled', false);
        $("#page_to_date").datepicker();
    });
</script>