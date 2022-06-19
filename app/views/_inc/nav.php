<?php
include_once("config.php");
?>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!--For Plugins css-->

<link rel="stylesheet" href="menu/assets/css/bootstrap.min.css">
<link rel="stylesheet" href="menu/assets/css/font-awesome.min.css">
<link rel="stylesheet" href="menu/assets/css/animate.css">
<link rel="stylesheet" href="menu/assets/css/sina-nav.css">


<nav class="sina-nav mobile-sidebar navbar-fixed" data-top="0">
    <div class="container">

        <div class="sina-nav-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                <i class="fa fa-bars"></i>
            </button>
           
        </div><!-- .sina-nav-header -->



        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navbar-menu">
            <ul class="sina-menu sina-menu-left" data-in="fadeInLeft" data-out="fadeInOut">
                <?php echo createMenu(0, $menus); ?>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- .container -->
</nav>
<!-- JS files -->
<script src="menu/assets/js/jquery.min.js"></script>
<script src="menu/assets/js/bootstrap.min.js"></script>
<script src="menu/assets/js/wow.min.js"></script>
<script src="menu/assets/js/sina-nav.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        // WOW animation initialize
        new WOW().init();
    });
</script>
</body>

</html>