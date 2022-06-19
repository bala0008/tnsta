<?php require APPROOT . '/views/_inc/header.php'; ?>
<?php require APPROOT . '/views/_inc/nav.php'; ?>
<style>
    label,
    input,
    textarea {
        display: block;
        width: 100%;
    }

    ul {
        list-style: none;
        margin: 0;
        padding: 0;
    }

    li {
        padding: 0.3em;
    }

    span {
        font-weight: 700;
        color: #102a43;
        line-height: 35px;
        line-height: 2.5rem;
        font-size: 12px;
        font-size: 0.8rem;
        text-transform: uppercase;
    }


    .container.form {
        width: 460px;
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

    .required-star {
        color: #fc4366;
    }

    input,
    textarea {
        width: 100%;
        padding: 9px 20px;
        border: 1px solid #e1e2eb;
        background-color: #fff;
        color: #102a43;
        caret-color: #829ab1;
        box-sizing: border-box;
        font-size: 14px;
        font-size: 1rem;
        line-height: 29px;
        line-height: 2rem;
        box-shadow: inset 0 2px 4px 0 rgba(206, 209, 224, 0.2);
        border-radius: 3px;
        line-height: 29px;
        line-height: 2rem;
    }

    input[type=submit] {
        width: 50%;
        padding: 4px 20px;
        border: 1px solid #e1e2eb;
        background-color: #2196F3;
        color: #fff;
        caret-color: #829ab1;
        box-sizing: border-box;
        font-size: 14px;
        font-size: 1rem;
        line-height: 29px;
        line-height: 2rem;
        box-shadow: inset 0 2px 4px 0 rgba(206, 209, 224, 0.2);
        border-radius: 3px;
        line-height: 29px;
        line-height: 2rem;
        display: block;
        margin: 0 auto;
        border-radius: 18px;
    }
</style>
<div class="container form">
    <form method="POST" name="loginform" id="loginform" autocomplete="off">

        <ul>
            <li>
                <div id="message">
                    <div class="alert alert-warning alert-dismissible fade show" role="alert" id="alert-message">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            </li>
            <li>
                <label for="name"><span>User Name <span class="required-star">*</span></span></label>
                <input type="text" id="user_name" name="user_name">
            </li>
            <li>
                <label for="mail"><span>Password <span class="required-star">*</span></span></label>
                <input type="password" id="user_password" name="user_password">
            </li>
            <li>
                <input type="submit" name="submit" id="submit" value="Login">
            </li>
        </ul>
    </form>
</div>
<?php  require APPROOT . '/views/_inc/logo_slide.php'; 
?>
<?php require APPROOT . '/views/_inc/footer.php'; ?>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#message").hide();
    });
    var redirectUrl = '<?php echo URLROOT; ?>AdminController/index';
    $.validator.setDefaults({
        submitHandler: function() {
            $.ajax({
                type: 'post',
                url: 'UserController/login',
                data: $('#loginform').serialize(),
                dataType: 'json',
                success: function(response) {
                    if (response.message == 0) {
                        $("#message").show();
                        $('#alert-message').html(response.response);
                        window.location.href = redirectUrl;
                    } else if (response.message == 1) {
                        $("#message").show();
                        $('#alert-message').html(response.response);
                    } else {
                        $("#message").show();
                        $('#alert-message').html(response.response);
                    }
                }
            });
        }
    });

    $(document).ready(function() {
        $("#loginform").validate({
            rules: {
                user_name: "required",
                user_password: "required"
            },
            messages: {
                user_name: "**Please Enter Your User Name",
                user_password: "**Please Enter Yout Password",
            },
            errorElement: "em",
            errorPlacement: function(error, element) {
                // Add the `invalid-feedback` class to the error element
                error.addClass("invalid-feedback");

                if (element.prop("type") === "checkbox") {
                    error.insertAfter(element.next("label"));
                } else {
                    error.insertAfter(element);
                }
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass("is-invalid").removeClass("is-valid");
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).addClass("is-valid").removeClass("is-invalid");
            }
        });

    });
</script>