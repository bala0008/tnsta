<?php require APPROOT . '/views/admin/header.php'; ?>
<?php require APPROOT . '/views/admin/admin-nav.php'; ?>
<base href="<?php echo URLROOT; ?>" />
<link rel="stylesheet" href="datatable/css/custom.css">
<link rel="stylesheet" href="datatable/css/jquery.dataTables.min.css">
<script src="datatable/js/jquery.dataTables.min.js"></script>

<div class="main-content">
<div class="row">
<div class="col-lg-12 col-md-12">
<div class="card" style="min-height:calc(100% - 550px);">
<div class="card-content">
<div class="container">
<form>
<div class="row">
<div class="col-md-6">
<h5 class="h5 text-left">Contact Us - Office </h5>
</div>
<?php
if (($_SESSION['roleid'] == 1) || ($_SESSION['roleid'] == 2) || ($_SESSION['roleid'] == 3)) {
?>
<div class="col-md-6 text-right">
<a href="AdminController/mst_contactus"> <button type="button" class="btn btn-info text-white">Add New</button></a>
</div>
<?php } ?>
</div>

<hr>
<div class="col-md-12 ">
<div class="card-content table-responsive table-bordered">
<table id="mst_contactus-table" class="display" style="width:100%;padding: 15px 0px;">
<thead>
<tr>
<th>Action</th>
<th>Tamil Title </th>
<th>English Title </th>
<th>Tamil Pdf File</th>
<th>English Pdf File</th>
<th>Status</th>
</tr>
</thead>
<tbody>
<?php
foreach ($data['current_mst_contactus'] as $sn => $whatlist) {
$mst_contactusid = $whatlist['mst_contactus_id'];
?>
<tr>
<td>
<div class="btn-group" role="group" aria-label="Basic example">
<?php
if (($_SESSION['roleid'] == 1) || ($_SESSION['roleid'] == 2)) {

?>
<input type="hidden" id="mst_con_dropdown" value="<?php echo $whatlist['mst_con_dropdown'] ?>" data-id="<?php echo $whatlist['mst_con_dropdown'] ?>">
<a href="<?php echo URLROOT; ?>AdminController/mst_contactus_edit_id?id=<?php echo $whatlist['mst_contactus_id']; ?>"> <button type="button" class="btn btn-success"><i class="fa fa-edit"></i></button></a>&nbsp;
<button type="button" class="btn btn-danger mst_contactus-delete" data-id="<?php echo $whatlist['mst_contactus_id'] ?>"><i class="fa fa-trash"></i></button> &nbsp;
<?php if ($whatlist['status'] != 1) {
?>
<button type="button" class="btn btn-primary mst_contactus-publish" data-id="<?php echo $whatlist['mst_contactus_id'] ?>"><i class="fa fa-bullhorn"></i></button> &nbsp;
<?php
} ?>
<?php } else if ($_SESSION['roleid'] == 3) {
?>
<a href="<?php echo URLROOT; ?>AdminController/mst_contactus_edit_id?id=<?php echo $whatlist['mst_contactus_id']; ?>"> <button type="button" class="btn btn-success"><i class="fa fa-edit"></i></button></a>&nbsp;
<?php
} else {    
?>
<?php if ($whatlist['status'] != 1) {
?>
<button type="button" class="btn btn-primary mst_contactus-publish" data-id="<?php echo $whatlist['mst_contactus_id'] ?>"><i class="fa fa-bullhorn"></i></button> &nbsp;
<?php
}
}
?>
</div>
</td>
<td class="pdf_tamil"><?php echo $whatlist['tn_title'] ?></td>
<td class="pdf_href"><?php echo $whatlist['en_title'] ?></td>
<td>
<?php
$uploadPath = 'contactus' . '/' . $whatlist['tn_pdf'];
$file_location = $uploadPath;
?>
<a class="pdf_href" href="<?= $uploadPath ?>" target="_blank"><?= $whatlist['tn_pdf'] ?></a><br>
</td>
<td>
<?php
$uploadPath = 'contactus' . '/' . $whatlist['en_pdf'];
$file_location = $uploadPath;
?>
<a class="pdf_href" href="<?= $uploadPath ?>" target="_blank"><?= $whatlist['en_pdf'] ?></a><br>
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
$('#mst_contactus-table').DataTable({
"pageLength": 5,
"lengthMenu": [5, 10, 50, 100],
autoFill: true
});
});
$('.mst_contactus-delete').click(function() {
var mst_contactus_id = $(this).attr('data-id');
var mst_con_dropdown = $('#mst_con_dropdown').attr('data-id');
var baseurl = "<?php echo URLROOT; ?>AdminController/mst_contactus_delete";
var rediecturl = "<?php echo URLROOT; ?>AdminController/list_mst_contactus";
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
mst_contactus_id: mst_contactus_id,
mst_con_dropdown: mst_con_dropdown

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

$('.mst_contactus-publish').click(function() {
var mst_contactus_id = $(this).attr('data-id');
var baseurl = "<?php echo URLROOT; ?>AdminController/mst_contactus_publish";
var rediecturl = "<?php echo URLROOT; ?>AdminController/list_mst_contactus";
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
mst_contactus_id: mst_contactus_id
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