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
                            <select class="country">
                                <option>Select</option>
                                <option id="drivinglicence" value="drivinglicence">Driving Licence</option>
                                <option id="conductorlicence" value="conductorlicence">Conductors
                                    Licence-Fresh</option>
                                <option id="registervehicles" value="registervehicles">Registration of
                                    Motor Vehicles</option>
                                <option id="permitcon-permit" value="permitcon-permit">Permit-Contract
                                    Carriage Permit</option>
                                <option id="permitgood-permit" value="permitgood-permit">Permit-Goods Carriage
                                    Permit</option>
                                <option id="permitstage-permit" value="permitstage-permit">Permit-Stage Carriage
                                    Permit</option>
                                <option id="permitprivate-permit" value="7">Permit-Private
                                    Service Vehicle Permit</option>
                                <option id="permiteducat-permit" value="8">Permit-Educational
                                    Institution Bus Permit</option>
                                <option id="permitev-permit" value="9">Permit-E.V Permit</option>
                                <option id="permittemp-permit" value="10">Permit-Temporary
                                    Permit</option>
                                <option id="permitsur-permit" value="11">Permit-Surrender of
                                    Permit</option>
                            </select>
                        </div>
                        <div class="col-12 form-group  pt-2 response-sub">
                            <select class="" id="response">

                            </select>
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
<script>
    $(document).ready(function() {
        $(".response-sub").hide();
        $("select.country").change(function() {
            var baseurl = "<?php echo URLROOT; ?>AdminController/ajaxstatic";
            var selectedCountry = $(".country option:selected").val();
            $.ajax({
                type: "POST",
                url: baseurl,
                data: {
                    country: selectedCountry
                }
            }).done(function(data) {
                $("#response").html(data);
            });
        });
        $("#response").change(function() {
            var response = $("#response option:selected").val();
            alert(response);
            $(".response-sub").show();
        });
    });
</script>