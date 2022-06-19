<style>
    .footer-bg {
        background: #07414f;
        margin-top: calc(19% - 255px);
    }
    @media (max-width: 767px) {
        .footer-bg {
            background: #07414f;
            margin-top: calc(19% - 135px);
        }
    }
    @media (max-width: 600px) {
        .footer-bg {
            background: #07414f;
            margin-top: calc(19% - 130px);
        }
    }

    @media (max-width: 500px) {
        .footer-bg {
            background: #07414f;
            margin-top: calc(19% - 60px);
        }
    }

    @media (max-width: 1199px) {
        .footer-bg {
            background: #07414f;
            margin-top: calc(19% - 220px);
        }
    }
</style>

<!-- Remove the container if you want to extend the Footer to full width. -->
<div class="container-fluid p-0 m-0">

    <footer class="text-center text-lg-start text-white" style="background:#07414f; ">
        <!-- Grid container -->
        <div class="container">
            <!--Grid row-->
            <div class="row my-1">
                <!--Grid column-->
                <div class="col-lg-4 col-md-6 mb-md-0">

                    <div class=" d-flex align-items-center justify-content-center mb-auto mx-auto" style="width: 150px; height: 70px;">
                        <img src="https://presentations.gov.in/wp-content/uploads/2020/06/NIC-LOGO-IDENTITY-VARIANTS_sans-01.png?x74705" height="100%" alt="" loading="lazy" />
                    </div>
                </div>
                <!--Grid column-->



                <!--Grid column-->
                <div class="col-lg-8 col-md-6  mt-3 mb-md-0 content">
                    <h5 class="  text-white" style="font-size: 16px;
line-height: 22px;
position: absolute;">© Content owned by Commissonerate of TRANSPORT AND ROAD SAFETY, Tamil Nadu
                        This portal is designed, developed, hosted and maintained by National Informatics Centre (NIC), Ministry of Electronics & Information Technology , Government of India, Tamil Nadu State Center, Chennai - 600 090</h5>
                </div>
                <!--Grid column-->

            </div>
            <!--Grid row-->
        </div>
        <!-- Grid container -->

        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
            ©Last Updated:
            <a class="text-white" href="">Jan 27, 2022</a>
        </div>
        <!-- Copyright -->
    </footer>

</div>

<script src="assets/js/jquery-3.3.1.slim.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="common_file/js/datatables.min.js"></script>
<script src="tnweb/lib/ajax-handler.js"></script>
<script>
    function preventProp(e) {
        if (confirm("Are you sure you want to open this link ?")) {
            return true;
        } else {
            e.preventDefault();
        }
    }
</script>
<script type="text/javascript">
    $('#translate').hide();
    fetch('tnweb/json/nav_about.json') // File Path
        .then(response => response.json())
        .then(data => {
            arrLang = data;
            $('#translate').show();
            translate();
        });

    function translate() {
        lang = localStorage.getItem('lang');
        $('.lang').each(function(index, item) {
            $(this).text(arrLang[lang][$(this).attr('key')]);
            document.getElementById('translate').value = lang;

        });
    };

    // Process translation
    $(function() {
        $('#translate').change(function() {
            localStorage.setItem('lang', ($(this).val()));
            translate();
            var lang = $(this).val();
            var baseurl = "<?php echo URLROOT; ?>Indexes/lang";
            jQuery.ajax({
                url: baseurl,
                data: {
                    lang: lang
                },
                type: 'post',
                success: function(response) {
                    window.location.reload();
                    $("#translate option:selected");
                }
            });

        });
    });
    $(document).ready(function() {
        var lang = $("#translate").val();
        var baseurl = "<?php echo URLROOT; ?>Indexes/lang";
        jQuery.ajax({
            url: baseurl,
            data: {
                lang: lang
            },
            type: 'post',
            success: function(data) {}
        });
    });
    // $(document).on('change', '#translate', function() {
    //     var lang = $(this).val();
    //     var baseurl = "<?php echo URLROOT; ?>Indexes/lang";
    //     jQuery.ajax({
    //         url: baseurl,
    //         data: {
    //             lang: lang
    //         },
    //         type: 'post',
    //         success: function(response) {
    //             window.location.reload();
    //             $("#translate option:selected");
    //         }
    //     });
    // });
</script>

<script type="text/javascript">
    // $('#pdf_only').on('change', function() {
    //     myfile = $(this).val();
    //     var ext = myfile.split('.').pop();
    //     if (ext == "pdf") {
    //         return true;
    //     } else {
    //         Swal.fire({
    //             icon: 'error',
    //             title: 'Accept Only PDF Files',
    //         });
    //         $('#pdf_only').val(' ');
    //         return;
    //     }
    // });

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
<script src="logoslide/js/slide.js"></script>
<script src="logoslide/js/slick.js"></script>
<script src="slide/js/responsive-carousel.js"></script>
<script src="tab/js/tabs.js"></script>


<script>
    // Custom options for the carousel
    var args = {
        arrowRight: '.arrow-right',
        arrowLeft: '.arrow-left',
        speed: 700,
        slideDuration: 4000
    };
    // start BannerSlide
    $('.carousel').BannerSlide(args);
</script>

</body>

</html>