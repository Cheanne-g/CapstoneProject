
<!DOCTYPE html>

<html lang="en">
  <head>
  	<title>Admin Login </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="css/style.css">

	</head>
	<style>
	body {
				  background-image: url('images/Nasugbu-facade-scaled (2).jpg');
				  background-repeat: no-repeat;
				  background-attachment: fixed;
				  background-size: 100% 100%;
				}
	</style>

	<body>
		<img src="">
			<section class="ftco-section">
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-md-12 col-lg-10">
							<div class="wrap d-md-flex">
								<div class="img" style="background-image: url('images/bsu maroon.png'); margin-top: 20px; margin-bottom: 20px;">
					      </div>
								<div class="login-wrap p-4 p-md-5">
					      	<div class="d-flex">
					      		<div class="w-100">
					      			<h3 class="mb-4">Login Form</h3>
					      		</div>
					      	</div>
									<form action="login.php" class="form" method="POST">
					      		<div class="form-group mb-3">
					      			<label class="label" for="name">Email</label>
					      			<input type="text" class="form-control" placeholder="Email" name="email" required>
					      		</div>
				            <div class="form-group mb-3">
				            	<label class="label" for="password">Password</label>
				              <input type="password" class="form-control" placeholder="Password"  name="password" required>
				            </div>
				            <div class="form-group">
				            	<button type="submit" name="submit" class="form-control btn btn-primary rounded submit px-3">Sign In</button>
				            </div>
				            <div class="form-group d-md-flex">
											<div class="w-50" style="align-content: center;">
												<a href="#">Forgot Password</a>
											</div>
				            </div>
				          </form>			
				        </div>
				      </div>
						</div>
					</div>
				</div>
			</section>

	<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

	</body>
</html>

