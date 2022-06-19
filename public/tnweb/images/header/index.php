<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href='https://fonts.googleapis.com/css?family=Noto Serif Tamil' rel='stylesheet'>
	<link href='https://fonts.googleapis.com/css?family=Noto Sans Adlam' rel='stylesheet'>
	<link href="themes/1/js-image-slider.css" rel="stylesheet" type="text/css" />
    <script src="themes/1/js-image-slider.js" type="text/javascript"></script>
    <title>Tamil Nadu State Election Commission</title>
  </head>
  <style>
  .top_head{
	  background-color: #ffffff;
background-image: url("https://www.transparenttextures.com/patterns/white-diamond.png");
/* This is mostly intended for prototyping; please download the pattern and re-host for production environments. Thank you! */
  }
  .menu_bar{
	background-color: #056074eb;
background-image: url("https://www.transparenttextures.com/patterns/white-diamond-dark.png");
/* This is mostly intended for prototyping; please download the pattern and re-host for production environments. Thank you! */
  }
  body{
	      font-family: arial !important;
		  font-size:14px !important;
		overflow-x:hidden !important;
  }
  .header_text{
	  font-family: 'Noto Sans Adlam';
	  font-weight:500;
	  color:#056074 !important;
	  margin-top:-10px;
  }
   .tamil_header_text{
	   color:#056074ed !important;
	  font-family: 'Poppins', sans-serif;
	  white-space:nowrap;
   }
   .top_header{
	   background-color: #056074;
background-image: url("https://www.transparenttextures.com/patterns/dark-circles.png");
/* This is mostly intended for prototyping; please download the pattern and re-host for production environments. Thank you! */
   }
   .text_color{
	   color:#056074 !important;
   }
   nav.circle ul li a {
  position: relative;
  overflow: hidden;
  z-index: 1;
}
nav.circle ul li a:after {
  display: block;
  position: absolute;
  margin: 0;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  content: '.';
  color: transparent;
  width: 1px;
  height: 1px;
  border-radius: 50%;
  background: transparent;
}
nav.circle ul li a:hover:after {
  -webkit-animation: circle 0.8s ease-in forwards;
} 

 
/* Keyframes */
@-webkit-keyframes circle {
  0% {
    width: 1px;
    top: 0;
    left: 0;
    bottom: 0;
    right: 0;
    margin: auto;
    height: 1px;
    z-index: -1;
    background: #eee;
    border-radius: 100%;
  }
  100% {
    background: #aaa;
    height: 5000%;
    width: 5000%;
    z-index: -1;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    margin: auto;
    border-radius: 0;
  }
}
.nav-item,.prof_name{
	white-space:nowrap;
}
  </style>
  <body>
    <nav class="top_header border-bottom">
		<div class="container">
			
		
		<div class="row pt-1">
				<div class="col-lg-4 col-md-4">
<button type="button" class="btn btn-sm fw-bold me-3"><i class="bi bi-telephone-fill text-white"></i></button> 
			<button type="button" class="btn btn-sm fw-bold me-3"><i class="bi bi-envelope-fill text-white"></i></button>
			<button type="button" class="btn btn-sm fw-bold me-3"><i class="bi bi-facebook text-white"></i></button>
			<button type="button" class="btn btn-sm fw-bold me-3"><i class="bi bi-twitter text-white"></i></button>
				</div>
				<div class="offset-lg-2 col-lg-2 col-md-3 text-end">
					<label class="visually-hidden" for="autoSizingInputGroup">Search</label>
    <div class="input-group input-group-sm mb-1">
     
      <input type="text" class="form-control form-control-sm" id="autoSizingInputGroup" placeholder="Search"> <div class="input-group-text"><i class="bi bi-search"></i></div>
    </div>
				  
					
				</div>
				<div class="col-lg-4 col-md-5 text-end text-md-start">
				<button type="button" class="btn btn-sm fw-bold text-white me-3 me-md-1"><i class="bi bi-diagram-3-fill"></i></button> 
				<button type="button" class="btn btn-sm fw-bold text-white me-3 me-md-1">-A</button>
				<button type="button" class="btn btn-sm fw-bold text-white me-3 me-md-1">A</button>
				<button type="button" class="btn btn-sm fw-bold text-white me-3 me-md-1">+A</button>
				<button type="button" class="btn btn-sm fw-bold text-white me-3 me-md-1">English</button>
				</div>
			</div></div>
	</nav>
	<nav class="navbar navbar-light bg-white pt-1 border-bottom top_head">
		<div class="container d-inline">
			<div class="row my-1 d-flex">
				<div class="col-md-2 col-lg-1 text-center">
					<a class="navbar-brand" href="#">
				<img src="Images/logo_1.png" alt="" width="90" height="90" class="d-inline-block rounded">
			</a>
				</div>
				<div class="col-md-8 col-lg-8 justify-content-center align-self-center">
					<p class="tamil_header_text fs-4 mb-1 fw-bolder">தமிழ்நாடு மாநில தேர்தல் ஆணையம்</p>
					 <p class="header_text fs-2 mb-0">Tamil Nadu State Election Commission</p>
					 
				</div>
				<div class="col-lg-1 col-sm-4">
					<a class="navbar-brand" href="#">
				<img src="Images/vote_logo.png" alt="" width="100" height="90" class="d-inline-block rounded">
			</a>
				</div>   
				<div class="col-lg-2 col-sm-6">
					<a class="navbar-brand" href="#">
				<img src="Images/one_hand.jpg" alt="" width="" height="90" class="w-100 d-inline-block rounded">
			</a>
				</div> 
			</div>
			
			
		</div>
	</nav>
		<nav class="navbar navbar-expand-lg navbar-light menu_bar circle py-0">
		<div class="container"> 
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse " id="navbarSupportedContent">
				<ul class="navbar-nav me-auto mb-2 mb-lg-0 fw-bold">
					<li class="nav-item pe-4">
						<a class="nav-link active text-white" aria-current="page" href="#"><i class="bi bi-house-door me-1"></i>HOME</a>
					</li> 
					
					 
						<li class="nav-item px-lg-4">
							<a class="nav-link text-white" href="#"><i class="bi bi-info-circle me-1"></i>ABOUT US</a>
						</li>
						 <li class="nav-item dropdown px-lg-4">
						<a class="nav-link  text-white dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							<i class="bi bi-card-checklist me-1"></i>SERVICES
						</a>
						<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
							<li class="dropdown-item" href="#"> ECONOMIC DEVELOPMENT</li>
									<li class="dropdown-item" href="#"> SKILL DEVELOPMENT</li>
									<li class="dropdown-item" href="#"> OTHER SCHEMES</li>
									<li class="dropdown-item" href="#">CONSTRUCTION ACTIVITIES</li>
						</ul>
					</li>
						<li class="nav-item px-lg-4">
							<a class="nav-link text-white" href="#"><i class="bi bi-image me-1"></i>GALLERY</a>
						</li>
						<li class="nav-item px-lg-4">
							<a class="nav-link text-white" href="#"><i class="bi bi-download me-1"></i>DOWNLOAD</a>
						</li>
						<li class="nav-item px-lg-4">
							<a class="nav-link text-white" href="#"><i class="bi bi-envelope me-1"></i>CONTACT US</a>
						</li>
						 
						<li class="nav-item px-lg-4">
							<a class="nav-link text-white" href="#"><i class="bi bi-link-45deg me-1"></i>LINKS</a>
						</li> 
						<li class="nav-item px-lg-4">
							<a class="nav-link text-white" href="#"><i class="bi bi-arrow-right-circle me-1"></i>LOGIN</a>
						</li>
				</ul> 
    </div>
  </div>
</nav>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="js/bootstrap.bundle.min.js"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>

