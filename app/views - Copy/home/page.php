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
<?php
$page_contentsql = json_decode(json_encode($data['page']), true);
$page_title =  $_SESSION['lang'] . "_title";
$page_content =  $_SESSION['lang'] . "_page_content";
// foreach($data['page'] as $v_page)
// {
// 	echo $v_page;
// }
?>
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
									<li class="breadcrumb-item active" aria-current="page"><?php echo $page_contentsql[$page_title]; ?></li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
				<div class="container">
					<div class="breadcrumb-title">
						<h2><?php echo $page_contentsql[$page_title]; ?> </h2>
					</div>
					<div class="breadcrumb-content pt-4">

						<p><?php echo $page_contentsql[$page_content]; ?></p>
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
				url: 'AdminController/login',
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