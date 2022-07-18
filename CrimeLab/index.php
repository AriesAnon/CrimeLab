<!DOCTYPE html>
<html lang="zxx">
<!-- Head -->

<head>
	<title>CRIME LABORATORY SYSTEM</title>
	<script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@8"></script>
	<!-- Meta-Tags -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
	<meta name="keywords" content="Key Login Form a Responsive Web Template, Bootstrap Web Templates, Flat Web Templates, Android Compatible Web Template, Smartphone Compatible Web Template, Free Webdesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design">
	<script>
		addEventListener("load", function() {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!-- //Meta-Tags -->
	<!-- Index-Page-CSS -->
	<link rel="stylesheet" href="css/index_style.css" type="text/css" media="all">
	<!-- //Custom-Stylesheet-Links -->
	<!--fonts -->
	<!-- //fonts -->
	<link rel="stylesheet" href="css/font-awesome.min.css" type="text/css" media="all">
	<!-- //Font-Awesome-File-Links -->

	<!-- Google fonts -->
	<link href="//fonts.googleapis.com/css?family=Quattrocento+Sans:400,400i,700,700i" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Mukta:200,300,400,500,600,700,800" rel="stylesheet">
	<!-- Google fonts -->

</head>
<!-- //Head -->
<!-- Body -->

<body>

	<section class="main">
		<div class="layer">
			<div class="content-w3ls">
				<div class="text-center icon">
					</br>
					<div class="appLogo">
						<img src="images/logo_circle.png" alt="logo" width="100px" height="100px">
					</div>
				</div>
				<div class="content-bottom">
					<p class="error" style="color:white">
						<?php
						if (isset($_GET['error'])) {
							echo htmlspecialchars($_GET['error']);
						}
						?>
					</p>
					</br>
					<form action="login.php" method="post">
						<div class="field-group">
							<span class="fa fa-user" aria-hidden="true"></span>
							<div class="wthree-field">
								<input name="email" id="userEmail" type="email" value="" placeholder="Email" required>
							</div>
						</div>
						<div class="field-group">
							<span class="fa fa-lock" aria-hidden="true"></span>
							<div class="wthree-field">
								<input name="password" id="myInput" type="password" placeholder="Password" required>
							</div>
						</div>
						<div class="showPassword-field">
							<input type="checkbox" id="showPassCheckbox" onclick="showPasswordFunction()">
							Show Password
							<!-- JAVASCRIPT FOR SHOW PASSWORD-->
							<!-- Note: Move this later to an external Javascript-->
							<script>
								function showPasswordFunction() {
									var x = document.getElementById("myInput");
									if (x.type === "password") {
										x.type = "text";
									} else {
										x.type = "password";
									}
								}
							</script>
						</div>
						<div class="wthree-field">
							<button type="submit" class="btn" id="login">Login</button>
							<script>
                                    $('#login').on('click', function(){
                                        Swal.fire(
                                            'SUCCESSFULLY LOGGED IN!',
                                            'Welcome!',
                                            'success',
                                            '10000'
                                          )
                                        })
                                </script>
						</div>
					</form>
				</div>
			</div>

		</div>
	</section>

	<!-- showPassword JS-->
	<!-- Note: Disabled for now-->
	<!--<script src="js/main.js"></script>-->

</body>
<!-- //Body -->

</html>