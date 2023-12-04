<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Insurancy | Be secure for future!</title>
	<meta name="description" content="Insurancy is sharp Insurance agency website template based on HTML CSS and JavaScript specially designed for insurance company, insurance agency and startup agency.">
    <meta name="keywords" content="insurance broker website template, website template for insurance company, insurance website templates free download, insurance company website template, life insurance website template, insurance agency website template, auto insurance website template, insurance agency, html5 website template, insurance website examples, car insurance website template, insurance responsive website template free download">
    <meta name="author" content="atulcodex - Atul Prajapati | Web Developer">

	<!-- Favicon -->
	<link rel="icon" type="image/png" href="img/shield.png">

	<!-- External CSS link -->
	<link rel="stylesheet" href="good6.css">

	<!-- Ionic icons CDN -->
	<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
	<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>


	<!-- Jquery CDN link -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body class="">
	<!-- Scroll to top starts -->
	<button id="topBtn">
	  	<ion-icon name="arrow-up-outline"></ion-icon>
	</button>
	<!-- Scroll to top ends -->

	<!-- Navigation starts -->
	<nav>
		<div class="menu-container nav-wrapper">
			<div class="brand">
				<a href="index.html">
					<img src="img/insurancy logo.png" alt="Be-Healthy" border="0">
				</a>
			</div>

			<div class="hamberger">
				<span></span>
				<span></span>
				<span></span>
			</div>

			<ul class="nav-list">
				<li class="active"><a href="app2.html">Home</a></li>
				<li><a href="app2.html">About</a></li>
				<li>
					<a href="1nsurance.html">Insurance</a>
					<ul class="dropdown-list">
						<li><a href="look.html">Health Policy</a></li>
						<li><a href="look.html">Auto Policy</a></li>
						<li><a href="look.html">Home Policy</a></li>
						<li><a href="look.html">Life Policy</a></li>
						<li><a href="look.html">Travel Policy</a></li>
					</ul>
				</li>
				<li><a href="app2.html">News</a></li>
				<li><a href="call.html">Contact</a></li>
			</ul>
		</div>
	</nav>
	<!-- Navigation ends -->


	<!-- Hero section starts -->
	<section class="hero">
		<div class="hero-container">
			<div class="row">
				<div class="col hero-content">
					<h2 class="hero-heading white">
						Insurance for your Secure Family
					</h2>
					<p class="para-line white">
						Health insurance is not mandatory in Kenya but is highly encouraged so Kenyans can confront all health issues or concerns without the fear of associated costs. Most employers offer their employees benefits and perks that include health insurance and add-ons, which are affordable
					</p>
					<div class="inner-row">
						<div class="inner-col">
							<button class="btn btn-full-w btn-blue">
								<a href="#">Healthy Life</a>
							</button>
						</div>
						<div class="inner-col">
							<button class="btn btn-full-w btn-yellow">
								<a href="#">Happy life</a>
							</button>
						</div>
					</div>
				</div>
				<div class="col hero-blank-col"></div>
			</div>
		</div>
	</section>
	<!-- Hero section ends -->


	<!-- Why us section starts -->

	<!-- Why us section ends -->


	<!-- Services section starts -->
	<section class="our-services">
		<div class="container">
			

			<h4 class="sub-heading">Services We Provide</h4>
			<h2 class="heading">
				How Insurance works in Kenya.
			</h2>
			<p class="para-line head-desc">
				The National Hospital Insurance Fund is a government-run medical insurance service, developed to offer universal healthcare for all Kenyans. All employed persons in Kenya are required to be members of the fund. Lifestyle - to decide on the amount of sum assured you need to have in your policy.
			</p>
<!-- Insurance section starts -->
<section class="insurance-section">
    <div class="container">
        <h2 class="heading">Our Insurances</h2>

        <?php
        $servername = "localhost";
        $db_username = "root";
        $db_password = "";
        $database = "be-healthy";
        
        $conn = new mysqli($servername, $db_username, $db_password, $database);
        // Fetch insurances from the database
        $sql = "SELECT InsuranceName, InsuranceType, Amount FROM 1nsurance";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="insurance-item">';
                echo '<h3>' . $row['InsuranceName'] . '</h3>';
                echo '<p>Type: ' . $row['InsuranceType'] . '</p>';
                echo '<p>Amount: ' . $row['Amount'] . '</p>';
                echo '</div>';
            }
        } else {
            echo '<p>No insurances available.</p>';
        }
        ?>
    </div>
</section>
<!-- Insurance section ends -->

			<div class="services">
				<div class="service">
					<ion-icon name="medkit-outline"></ion-icon>
					<h2 class="service-heading">Old-mutual</h2>
					<p class="para-line">
						Worry less with our medical cover tailored for your child’s journey
					</p><a href="https://www.oldmutual.co.ke">
                        View
                      </a>
				</div>
				<div class="service">
					<ion-icon name="medkit-outline"></ion-icon>
					<h2 class="service-heading">CIC Kenya</h2>
					<p class="para-line">
						CIC Seniors Mediplan is a medical cover built for comfort in old age. We do health insurance differently - with more coverage & less hassle.
					</p><a href="https://cic.co.ke">
                        View
                      </a>
				</div>
				<div class="service">
					<ion-icon name="medkit-outline"></ion-icon>
					<h2 class="service-heading"> Jubilee Holdings</h2>
					<p class="para-line">
						Jubilee J Care Health Insurance offers you and your family the flexibility to choose from 6 levels of coverage, including a prestigious plan.

					</p><a href="https://jubileeinsurance.com">
                        View
                      </a>
				</div>
				<div class="service">
					<ion-icon name="fitness-outline"></ion-icon>
					<h2 class="service-heading"> Britam</h2>
					<p class="para-line">
						Our Health insurance cover provides a comprehensive and flexible cover for employees as well as their dependents.
					</p><a href="https://ke.britam.com">
                        View
                      </a>
				</div>
				<div class="service">
					<ion-icon name="happy-outline"></ion-icon>
					<h2 class="service-heading"> Shimin</h2>
					<p class="para-line">
						Invest in Your Family's Well-Being | Choose Trusted Medical Insurance with Shimin agency.
					</p><a href="https://www.shimininsurance.co.ke">
                        View
                      </a>
				</div>
				<div class="service">
					<ion-icon name="medkit-outline"></ion-icon>
					<h2 class="service-heading"> Heritage</h2>
					<p class="para-line">
						A World Wide benefit option that offers more comprehensive cover for outpatient treatment, hospitalization, chronic care and major disease benefits
					</p><a href="https://www.heritageinsurance.co.ke">
                        View
                      </a>
				</div>
			</div>
		</div>
	</section>
	<!-- Services section ends -->


	<!-- Overline section starts -->
	
	<!-- Overline section ends -->


	<!-- About section starts -->
	
	<!-- About section ends -->


	<!-- Testimonial section starts -->

	<!-- Testimonial section ends -->


	<section class="consultancy">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="lead-form">
						<h2>Need Help booking?</h2>
						<form action="1nsurance.php" method="post">
							<div class="input-field">
								<label for="name">full Name</label>
								<input type="text" id="name"name="fullname" placeholder="Your Name">
							</div>

							<div class="input-field">
								<label for="email">Email</label>
								<input type="email" id="email" name="email" placeholder="Your email address">
							</div>

							<button class="btn btn-blue">
								<button type="submit" class="btn-block btn-primary">SUBMIT</button>
							</button>
						</form>
					</div>
				</div>
				<div class="col">
					<div class="lead-form agent-card">
						<img src="img/agent.jpg" alt="Agent" title="Agent" class="agent-img">
						<h3 class="agent-name">Be-Healthy</h3>
						<p class="para-line">Wellness website</p>
						<h6 class="agent-number">
							<ion-icon name="call-outline"></ion-icon> (254) 7149-541-231
						</h6>
						<h6 class="agent-email">
							<ion-icon name="mail-unread-outline"></ion-icon> Be-Healthy@insurancy.com
						</h6>
					</div>
				</div>
			</div>
		</div>
	</section>


	<!--------------- Footer ------------------>
	<footer>
		<div class="footer-container">
			<p class="para-line white">Copyright © Be-Healthy 2022</p>
		</div>
	</footer>
	<!--------------- Footer ------------------>
	



	<!-------------- Importing JS file -------------->
	<script src="js/script.js"></script>

	
	<script>
		// ------------------------ Scroll to top button --------------------
		$(document).ready(function(){
		  $(window).scroll(function(){
		    if($(this).scrollTop() > 40)
		    {
		      $('#topBtn').fadeIn();
		    }
		    else
		    {
		      $('#topBtn').fadeOut();
		    }
		  });
		  
		   $("#topBtn").click(function(){
		      $('html, body').animate({scrollTop: 0},800);
		   });             
		});
		// ------------------------ Scroll to top button --------------------
	</script>
</body>
</html>