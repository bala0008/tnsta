<footer class="footer">
                <div class="container-fluid">
				  <div class="row">
				  <div class="col-md-6">
                  <p class="copyright d-flex justify-content-center">
                    State Transport Authority, Chennai.
                  </p>
                </div>
				<div class="col-md-6">
				 <p class="copyright d-flex justify-content-center"> &copy 2021 Design by
                        <a href="#">National Informatics Centre</a> , Chennai.
                    </p>
				</div>
				  </div>
				    </div>
            </footer>
</div>
</div>
</div>
<script src="assets/js/jquery-3.3.1.slim.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="common_file/lib/jquery-1.11.1.js"></script>
<script type="text/javascript" src="common_file/dist/jquery.validate.js"></script>
<script type="text/javascript" src="common_file/js/datatables.min.js"></script>


<script type="text/javascript">
    $('.pdf_only').on('change', function() {
        myfile = $(this).val();
        var ext = myfile.split('.').pop();
        if (ext == "pdf") {
            return true;
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Accept Only PDF Files',
            })
            $('.pdf_only').val('');
            return;
        }
    });
    $(document).ready(function() {
        $('#sidebarCollapse').on('click', function() {
            $('#sidebar').toggleClass('active');
            $('#content').toggleClass('active');
        });

        $('.more-button,.body-overlay').on('click', function() {
            $('#sidebar,.body-overlay').toggleClass('show-nav');
        });

    });
</script>
</body>

</html>