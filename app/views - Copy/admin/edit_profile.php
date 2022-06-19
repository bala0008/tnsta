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
padding: 8px;
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


.add-profile.container {
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
<form method="POST" name="profile_form" id="profile_form" autocomplete="off" enctype="multipart/form-data">
<div class="row ">
<div class="col-sm-6 form-group mb-0 float-right">
<h5 class="h5 text-left">Create Profile
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
<h4>English Content</h4>
<hr>
<div class="row jumbotron">
<div class="col-sm-6 form-group">
<div id="old_img">
<?php if (isset($data['sql']->profile_id) && ($data['sql']->profile_id) != '') {
$uploadPath = 'profile' . '/' . $data['sql']->profile_photo;
$file_location = $uploadPath;
?>
<img src="<?= $file_location ?>" height="75px" width="75px" />
<?php  }
?>
</div>

<img id="previewImg" src="tnweb/images/transparent.png" class="img-fluid img-thumbnail" alt="Placeholder">


</div>
<div class="col-sm-6 form-group">
<label for="address-1">Attachment : <span style='color:red'>*</span></label>
<input type="file" name="profile_photo" onchange="previewFile(this);">
<input type="hidden" name="old_profile_photo" id="old_profile_photo" value="<?php if (isset($data['sql']->profile_id) && ($data['sql']->profile_id) != '') { echo $data['sql']->profile_photo; } ?>">
</div>
<div class="col-sm-4 form-group">
<label for="address-1">Name<span style='color:red'>*</span> </label>
<input type="text" class="form-control" name="en_profile_name" id="en_profile_name" value="<?php if (isset($data['sql']->profile_id) && ($data['sql']->profile_id) != '') {
echo $data['sql']->en_profile_name;
} ?>">
</div>

<div class="col-sm-4 form-group">
<label for="address-1">Position : <span style='color:red'>*</span></label>
<select name="en_profile_position" id="en_profile_position" class="form-control">
<?php
foreach ([1 => 'Honourable Chief Minister of Tamil Nadu', 'Honourable Minister For Transport','Honourable Home (Transport) Secretary', 'Honourable Transport Commissioner'] as $key => $value) :

//foreach ([1 => 'Page', 'Internal', 'External', 'Pdf'] as $key => $value) :
$selected = "";
if (isset($data['sql']->en_profile_position) && ($data['sql']->en_profile_position)  == $key) {
$selected = "selected=\"selected\"";
}
?>
<option <?php echo $selected; ?> value="<?php echo $key; ?>"><?php echo $value; ?></option>
<?php endforeach; ?>
</select>

</div>
<div class="col-sm-4 form-group">
<label for="address-1">Qualification<span style='color:red'>*</span> </label>
<input type="text" class="form-control" name="en_profile_qualification" id="en_profile_qualification" value="<?php if (isset($data['sql']->profile_id) && ($data['sql']->profile_id) != '') {
echo $data['sql']->en_profile_qualification;
} ?>">
</div>
<div class="col-sm-4 form-group">
<label for="address-1">Constituency Name<span style='color:red'>*</span> </label>
<input type="text" class="form-control" name="en_profile_constis_name" id="en_profile_constis_name" value="<?php if (isset($data['sql']->profile_id) && ($data['sql']->profile_id) != '') {
echo $data['sql']->en_profile_constis_name;
} ?>">
</div>
<div class="col-sm-4 form-group">
<label for="address-1">Party Name<span style='color:red'>*</span> </label>
<input type="text" class="form-control" id="en_profile_party" name="en_profile_party" value="<?php if (isset($data['sql']->profile_id) && ($data['sql']->profile_id) != '') {
echo $data['sql']->en_profile_party;
} ?>">
</div>
<div class="col-sm-4 form-group">
<label for="address-1">Contact<span style='color:red'>*</span> </label>
<input type="text" class="form-control" name="en_profile_contact" id="en_profile_contact" value="<?php if (isset($data['sql']->profile_id) && ($data['sql']->profile_id) != '') {
echo $data['sql']->en_profile_contact;
} ?>">
</div>
<div class="col-sm-4 form-group">
<label for="address-1">Fax<span style='color:red'>*</span> </label>
<input type="text" class="form-control" name="en_profile_fax" id="en_profile_fax" value="<?php if (isset($data['sql']->profile_id) && ($data['sql']->profile_id) != '') {
echo $data['sql']->en_profile_fax;
} ?>">
</div>
<div class="col-sm-4 form-group">
<label for="address-1">Email<span style='color:red'>*</span> </label>
<input type="text" class="form-control" name="en_profile_email" id="en_profile_email" value="<?php if (isset($data['sql']->profile_id) && ($data['sql']->profile_id) != '') {
echo $data['sql']->en_profile_email;
} ?>">
</div>
<div class="col-sm-4 form-group">
<label for="name-f">Address</label>
<textarea class="form-control" name="en_profile_address" id="en_profile_address" rows="4" cols="50" placeholder="Enter only 256 characters"><?php if (isset($data['sql']->profile_id) && ($data['sql']->profile_id) != '') {
    echo $data['sql']->en_profile_address;
} ?></textarea>
</div>
</div>
<h4 class="tn_profile_title">Tamil Content</h4>
<hr>
<div class="row jumbotron tn_profile_title">
<div class="col-sm-4 form-group">
<label for="address-1">Name<span style='color:red'>*</span> </label>
<input type="text" class="form-control" name="tn_profile_name" id="tn_profile_name" value="<?php if (isset($data['sql']->profile_id) && ($data['sql']->profile_id) != '') {
echo $data['sql']->tn_profile_name;
} ?>">
</div>

<div class="col-sm-4 form-group">
<label for="address-1">Position : <span style='color:red'>*</span></label>
<select name="tn_profile_position" id="tn_profile_position">
<option value="">----Select Position----</option>
<?php
foreach ([1 => 'Honourable Chief Minister of Tamil Nadu', 'Honourable Minister For Transport','Honourable Home (Transport) Secretary', 'Honourable Transport Commissioner'] as $key => $value) :

//foreach ([1 => 'Page', 'Internal', 'External', 'Pdf'] as $key => $value) :
$selected = "";
if (isset($data['sql']->en_profile_position) && ($data['sql']->en_profile_position)  == $key) {
$selected = "selected=\"selected\"";
}
?>
<option <?php echo $selected; ?> value="<?php echo $key; ?>"><?php echo $value; ?></option>
<?php endforeach; ?>
</select>
</div>
<div class="col-sm-4 form-group">
<label for="address-1">Qualification<span style='color:red'>*</span> </label>
<input type="text" class="form-control" name="tn_profile_qualification" id="tn_profile_qualification" value="<?php if (isset($data['sql']->profile_id) && ($data['sql']->profile_id) != '') {
echo $data['sql']->tn_profile_qualification;
} ?>">
</div>
<div class="col-sm-4 form-group">
<label for="address-1">Constituency Name<span style='color:red'>*</span> </label>
<input type="text" class="form-control" name="tn_profile_constis_name" id="tn_profile_constis_name" value="<?php if (isset($data['sql']->profile_id) && ($data['sql']->profile_id) != '') {
echo $data['sql']->tn_profile_constis_name;
} ?>">
</div>
<div class="col-sm-4 form-group">
<label for="address-1">Party Name<span style='color:red'>*</span> </label>
<input type="text" class="form-control" id="tn_profile_party" name="tn_profile_party" value="<?php if (isset($data['sql']->profile_id) && ($data['sql']->profile_id) != '') {
echo $data['sql']->tn_profile_party;
} ?>">
</div>
<div class="col-sm-4 form-group">
<label for="address-1">Contact<span style='color:red'>*</span> </label>
<input type="text" class="form-control" name="tn_profile_contact" id="tn_profile_contact" value="<?php if (isset($data['sql']->profile_id) && ($data['sql']->profile_id) != '') {
echo $data['sql']->tn_profile_contact;
} ?>">
</div>
<div class="col-sm-4 form-group">
<label for="address-1">Fax<span style='color:red'>*</span> </label>
<input type="text" class="form-control" name="tn_profile_fax" id="tn_profile_fax" value="<?php if (isset($data['sql']->profile_id) && ($data['sql']->profile_id) != '') {
echo $data['sql']->tn_profile_fax;
} ?>">
</div>
<div class="col-sm-4 form-group">
<label for="address-1">Email<span style='color:red'>*</span> </label>
<input type="text" class="form-control" name="tn_profile_email" id="tn_profile_email" value="<?php if (isset($data['sql']->profile_id) && ($data['sql']->profile_id) != '') {
echo $data['sql']->tn_profile_email;
} ?>">
</div>
<div class="col-sm-4 form-group">
<label for="name-f">Address</label>
<textarea class="form-control" name="tn_profile_address" id="tn_profile_address" rows="4" cols="50" placeholder="Enter only 256 characters"><?php if (isset($data['sql']->profile_id) && ($data['sql']->profile_id) != '') {
    echo $data['sql']->tn_profile_address;
} ?></textarea>
</div>
<hr>

</div>
<div class="row jumbotron">
<div class="col-sm-12 form-group mb-0 text-center">
<!-- <input type="submit" class="btn btn-primary btn-sm" name="save_tender" id="save_tender" value="Submit"> -->
<input type="button" value="Submit" name="save_tender" class="btn btn-primary btn-sm" onclick="save();">
<input type="button" value="Cancel" class="btn btn-success btn-sm" onclick="history.back();">
<input type="hidden" name="id" id="id" value="<?php if (isset($data['sql']->profile_id) && ($data['sql']->profile_id) != '') {
echo $data['sql']->profile_id;
} ?>">
<input type="hidden" name="action" id="action" value="<?php if (isset($data['sql']->profile_id) && ($data['sql']->profile_id) != '') {
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
function previewFile(input) {
$("#old_img").hide();
var file = $("input[type=file]").get(0).files[0];

if (file) {

var reader = new FileReader();

reader.onload = function() {
$("#previewImg").attr("src", reader.result);
}
reader.readAsDataURL(file);
}
}

$(document).ready(function() {
$(".tn_profile_title").hide();
});
$('#tamil-switch').change(function() {
var id = $(this).val(); // this gives me null
var checked = $(this).is(':checked');
if (checked == true) {
$(".tn_profile_title").show();
} else {
$(".tn_profile_title").hide();
}
});

function save() {
var email = $('#email').val();
var psw = $('#pwd').val();

var id = $('#id').val();
var action = $('#action').val();
var baseurl = "<?php echo URLROOT; ?>AdminController/profile_save";
var rediecturl = "<?php echo URLROOT; ?>AdminController/list_profile";

var formData = new FormData();
var files = $('input[type=file]');

for (var i = 0; i < files.length; i++) {
if (files[i].value) {
formData.append(files[i].name, files[i].files[0]);
}
}
var formSerializeArray = $("#profile_form").serializeArray();
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
</script>