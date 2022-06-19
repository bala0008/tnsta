<?php require APPROOT . '/views/admin/header.php'; ?>
<?php require APPROOT . '/views/admin/admin-nav.php'; ?>
<base href="<?php echo URLROOT; ?>" />
<link rel="stylesheet" href="datatable/css/custom.css">
<link rel="stylesheet" href="datatable/css/jquery.dataTables.min.css">
<script src="datatable/js/jquery.dataTables.min.js"></script>

<div class="main-content">
<div class="row">
<div class="col-lg-12 col-md-12">
<div class="card" style="min-height: 550px">
<div class="card-content">
<div class="container">
<form>
<h5 class="text-left">Dashboard</h5>
<hr>
<div class="col-md-12 ">
<div class="card-content table-responsive table-bordered">
<table id="whatsnew-table" class="display" style="width:100%;padding: 15px 0px;">
<thead>
<tr>
<th>Action</th>
<th>Tamil Title </th>
<th>English Title </th>
<th>Pdf File</th>
<th>Status</th>
</tr>
</thead>
<tbody>
<?php
foreach ($data['current_whatsnew'] as $sn => $whatlist) {
$whatsnewid = $whatlist['whatsnew_id'];
?>
<tr>
<td>
<div class="btn-group" role="group" aria-label="Basic example">
<?php
if (($_SESSION['roleid'] == 1) || ($_SESSION['roleid'] == 2)) {

?>
<a href="<?php echo URLROOT; ?>AdminController/whatsnew_edit_id?id=<?php echo $whatlist['whatsnew_id']; ?>"> <button type="button" class="btn btn-success"><i class="fa fa-edit"></i></button></a>&nbsp;
<button type="button" class="btn btn-danger whatsnew-delete" data-id="<?php echo $whatlist['whatsnew_id'] ?>"><i class="fa fa-trash"></i></button> &nbsp;
<!-- <button type="button" class="btn btn-primary whatsnew-publish" data-id="<?php echo $whatlist['whatsnew_id'] ?>"><i class="fa fa-bullhorn"></i></button> &nbsp; -->
<?php if ($whatlist['status'] != 1) {
?>
<button type="button" class="btn btn-primary whatsnew-publish" data-id="<?php echo $whatlist['whatsnew_id'] ?>"><i class="fa fa-bullhorn"></i></button> &nbsp;
<?php
} ?>
<?php } else if ($_SESSION['roleid'] == 3) {
?>
<a href="<?php echo URLROOT; ?>AdminController/whatsnew_edit_id?id=<?php echo $whatlist['whatsnew_id']; ?>"> <button type="button" class="btn btn-success"><i class="fa fa-edit"></i></button></a>&nbsp;
<?php
} else {
?>
<?php if ($whatlist['status'] != 1) {
?>
<button type="button" class="btn btn-primary whatsnew-publish" data-id="<?php echo $whatlist['whatsnew_id'] ?>"><i class="fa fa-bullhorn"></i></button> &nbsp;
<?php
}
}
?>
</div>
</td>
<td class="pdf_href"><?php echo $whatlist['tn_whatsnew_title'] ?></td>
<td class="pdf_href"><?php echo $whatlist['en_whatsnew_title'] ?></td>
<td>
<?php
$uploadPath = 'whatsnew' . '/' . $whatlist['wh_new_pdf'];
$file_location = $uploadPath;
?>
<a class="pdf_href" href="<?= $uploadPath ?>" target="_blank"><?= $whatlist['wh_new_pdf'] ?></a><br>
</td>
<td>
<?php if ($whatlist['status'] == 1) {
echo '<button type="button" class="btn btn-success btn-sm" title = "Status Active">Active</button>';
} else {
echo '<button type="button" class="btn btn-danger btn-sm" title = "Status InActive">InActive</button>';
}   ?>
</td>
</tr>
<?php } ?>
</tbody>

</table>
</div>
</form>
</div>

</div>
</div>
</div>
</div>



<?php require APPROOT . '/views/admin/footer.php'; ?>


<script type="text/javascript">
$(document).ready(function() {
$('#whatsnew-table').DataTable({
"pageLength": 5,
"lengthMenu": [5, 10, 50, 100],
autoFill: true
});
});
$('.whatsnew-delete').click(function() {
var whatsnew_id = $(this).attr('data-id');
var baseurl = "<?php echo URLROOT; ?>AdminController/whatsnew_delete";
var rediecturl = "<?php echo URLROOT; ?>AdminController/list_whatsnew";
Swal.fire({
title: 'Do you want to Delete The Data?',
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
data: {
whatsnew_id: whatsnew_id
},
type: 'post',
dataType: 'json',
success: function(response) {
if (response.message == 1) {
Swal.fire('Deleted successfully!', '', 'success')
setTimeout(function() { // wait for 5 secs(2)
location.reload(); // then reload the page.(3)
}, 1500);
}
}
});
} else if (result.isDenied) {
Swal.fire('Changes are not Delete', '', 'info')
}
})

});

$('.whatsnew-publish').click(function() {
var whatsnew_id = $(this).attr('data-id');
var baseurl = "<?php echo URLROOT; ?>AdminController/whatsnew_publish";
var rediecturl = "<?php echo URLROOT; ?>AdminController/list_whatsnew";
Swal.fire({
title: 'Want To Publish?',
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
data: {
whatsnew_id: whatsnew_id
},
type: 'post',
dataType: 'json',
success: function(response) {
if (response.message == 1) {
Swal.fire('Published succesfully!', '', 'success')
setTimeout(function() { // wait for 5 secs(2)
location.reload(); // then reload the page.(3)
}, 1500);
}
}
});
} else if (result.isDenied) {
Swal.fire('Changes are not Publish', '', 'info')
}
})

});
</script>