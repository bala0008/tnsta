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


.add-mst_contactus.container {
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
<form method="POST" name="mst_contactus_form" id="mst_contactus_form" autocomplete="off" enctype="multipart/form-data">
<div class="row ">
<div class="col-sm-6 form-group mb-0 float-right">
<h5 class="text-left">Create What's New
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
<div class="col-sm-8 form-group">
<label for="address-1">ContactUs Type : <span style='color:red'>*</span></label>
<select name='mst_con_dropdown' id="mst_con_dropdown">
<option value="" class="form-control">----Select ContactUs Type----</option>
<?php
foreach (['htd' => 'Home(Transport) Department','sta'=> 'STA / Transport Commissioner Office','zo'=> 'Zonal Office','ro'=> 'RTO Office','mvio'=>  'MVI Office','cp' =>'Checkpost', 'stc' =>'State Transport Corporation','ltc ' =>'List of Transport Commissioner'] as $key => $value) :

//foreach ([1 => 'Page', 'Internal', 'External', 'Pdf'] as $key => $value) :
$selected = "";
if ($data['sql']->mst_con_dropdown  == $key) {
    $selected = "selected=\"selected\"";
  }
?>
<option <?php echo $selected; ?> value="<?php echo $key; ?>"><?php echo $value; ?></option>
<?php endforeach; ?>
</select>
</div>
<div class="col-sm-6 form-group">
<label for="name-f"><span style="background:#18accd ;padding:5px;border-radius:4px;color:#fff">English</span> Title</label>
<textarea onkeypress="return /[0-9a-zA-Z+$&*.,/-@]/i.test(event.key)" maxlength="150" class="form-control" name="en_title" id="en_title" rows="4" cols="50" placeholder="Enter only 256 characters"><?php if (isset($data['sql']->mst_contactus_id) && ($data['sql']->mst_contactus_id) != '') {
                                                                            echo $data['sql']->en_title;
                                                                        } ?></textarea>
</div>
<div class="col-sm-6 form-group tn_title">
<label for="name-f"><span style="background:#18accd ;padding:5px;border-radius:4px;color:#fff">Tamil</span> Title</label>
<textarea class="form-control" name="tn_title" id="tn_title" rows="4" cols="50" placeholder="Enter only 256 characters"><?php if (isset($data['sql']->mst_contactus_id) && ($data['sql']->mst_contactus_id) != '') {
echo $data['sql']->tn_title;
} ?></textarea>
</div>
<div class="col-sm-6 form-group">
<label for="address-1"><span style="background:#18accd ;padding:5px;border-radius:4px;color:#fff">English</span> Attachment : <span style='color:red'>*</span></label>
<input type="hidden" name="en_old_pdf" id="en_old_pdf" value="<?php if (isset($data['sql']->mst_contactus_id) && ($data['sql']->mst_contactus_id) != '') {
echo $data['sql']->en_pdf;
} ?>">
<input type="file" class="form-control" name="en_pdf" id="pdf_only">

<br>
<p><?php if (isset($data['sql']->mst_contactus_id) && ($data['sql']->mst_contactus_id) != '') {

$uploadPath = 'mst_contactus' . '/' . $data['sql']->en_pdf;
$file_location = $uploadPath;
?>
<div class="row">
<div class="col-10 text-right">
<a class="pdf_href" href="<?= $uploadPath ?>" target="_blank"><?= $data['sql']->en_pdf ?></a>
</div>
<div class="col-2 text-left">
<div style="color:red"><i class="fa fa-hand-o-left text-danger Blink"></i>&nbsp; View </div>
</div>
</div>


<?php    } ?>
</p>

</div>
<div class="col-sm-6 form-group tn_title">
<label for="address-1"><span style="background:#18accd ;padding:5px;border-radius:4px;color:#fff">Tamil</span>Attachment : <span style='color:red'>*</span></label>
<input type="hidden" name="tn_old_pdf" id="tn_old_pdf" value="<?php if (isset($data['sql']->mst_contactus_id) && ($data['sql']->mst_contactus_id) != '') {
echo $data['sql']->tn_pdf;
} ?>">
<input type="file" class="form-control" name="tn_pdf" id="tn_pdf">

<br>
<p><?php if (isset($data['sql']->mst_contactus_id) && ($data['sql']->mst_contactus_id) != '') {

$uploadPath = 'contactus' . '/' . $data['sql']->tn_pdf;
$file_location = $uploadPath;
?>
<div class="row">
<div class="col-10 text-right">
<a class="pdf_href" href="<?= $uploadPath ?>" target="_blank"><?= $data['sql']->tn_pdf ?></a>
</div>
<div class="col-2 text-left">
<div style="color:red"><i class="fa fa-hand-o-left text-danger Blink"></i>&nbsp; View </div>
</div>
</div>


<?php    } ?>
</p>
</div>
<div class="col-sm-12 form-group mb-0 text-center">
<!-- <input type="submit" class="btn btn-primary btn-sm" name="save_mst_contactus" id="save_mst_contactus" value="Submit"> -->
<input type="button" value="Submit" name="save_mst_contactus" class="btn btn-primary btn-sm" onclick="save();">
<input type="button" value="Cancel" class="btn btn-success btn-sm" onclick="history.back();">
<input type="hidden" name="id" id="id" value="<?php if (isset($data['sql']->mst_contactus_id) && ($data['sql']->mst_contactus_id) != '') {
echo $data['sql']->mst_contactus_id;
} ?>">
<input type="hidden" name="action" id="action" value="<?php if (isset($data['sql']->mst_contactus_id) && ($data['sql']->mst_contactus_id) != '') {
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
$('#mst_con_dropdown').on('change', function() {
var mst_con_dropdown = (this.value);

});
$(document).ready(function() {
$(".tn_title").hide();
});
$('#tamil-switch').change(function() {
var id = $(this).val(); // this gives me null
var checked = $(this).is(':checked');
if (checked == true) {
$(".tn_title").show();
} else {
$(".tn_title").hide();
}

});

function save() {
var email = $('#email').val();
var psw = $('#pwd').val();

var id = $('#id').val();
var action = $('#action').val();
var baseurl = "<?php echo URLROOT; ?>AdminController/mst_contactus_save";
var rediecturl = "<?php echo URLROOT; ?>AdminController/list_mst_contactus";

var formData = new FormData();
var files = $('input[type=file]');

for (var i = 0; i < files.length; i++) {
if (files[i].value) {
formData.append(files[i].name, files[i].files[0]);
}
}
var formSerializeArray = $("#mst_contactus_form").serializeArray();
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
}
</script>
