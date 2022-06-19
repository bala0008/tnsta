<?php require APPROOT . '/views/_inc/header.php'; ?>
<?php require APPROOT . '/views/_inc/nav.php'; ?>

<?php
$page_contentsql = json_decode(json_encode($data['page']), true);
$page_title =  $_SESSION['lang'] . "_title";
$page_content =  $_SESSION['lang'] . "_page_content";
// foreach($data['page'] as $v_page)
// {
// 	echo $v_page;
// }
?>

<section class="p-4 m-4">
	<div class="">
		<div class="container pb-2">
			<div class="row">
				<div class="col-lg-12">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="#">Home</a></li>
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
			<div class="breadcrumb-content ">
				
			<p><?php echo $page_contentsql[$page_content]; ?></p>
			</div>
		</div>

	</div>

</section>
<?php require APPROOT . '/views/_inc/logo_slide.php';
?>
<?php require APPROOT . '/views/_inc/footer.php'; ?>