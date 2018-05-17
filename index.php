<?php
  session_start();
  session_destroy();

  include_once 'includes/barangayInfoDAO.php';
  include_once 'includes/barangayOfficial.php';
  include_once 'includes/barangayPosition.php';

  $mission = BarangayInfoDao::getInfo("Mission");
  $vision = BarangayInfoDao::getInfo("Vision");

  $telephone = BarangayInfoDao::getInfo("telephone");
  $mobile = BarangayInfoDao::getInfo("mobile");
  $email = BarangayInfoDao::getInfo("email");

  $officials = BarangayOfficialDao::getAllOfficials();
?>

<!doctype html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Bootstrap CSS -->
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

		<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">

		<link rel="stylesheet" type="text/css" href="css/main.css">
		<title>Welcome to our Barangay</title>
	</head>
  	<body>

  		<div class="container-fluid header">
  			<div class="row">
  				<div class="col-md-6">
  					<div class="welcometag">
  						<span class="welcome">Welcome</span><br> 
  						<div class="welcomesub">to our <span class="barangay">Barangay</span></div>
  					</div>
	  			</div>
	  			<div class="col-md-6 navigationSide">
	  				<div class="navigationButton" onClick="document.getElementById('loginform').scrollIntoView();">Login</div><br>
	  				<div class="navigationButton" onClick="document.getElementById('mis-vis').scrollIntoView();"> Mission and Vission</div><br>
	  				<div class="navigationButton" onClick="document.getElementById('b-o').scrollIntoView();">Barangay Officials</div><br>
	  				<div class="navigationButton" onClick="document.getElementById('contact-info').scrollIntoView();">Contact Info</div><br>
	  				<div class="navigationButton">about the Devs</div><br>
	  			</div>
  			</div>
  		</div>

  		<div class="container" id="loginform"> 
  			<div class="row">
  				<div class="col-md-2"></div>
  				<div class="col-md-8 login-form">
  					<form action="validation.php" method="POST">
  						<img src="images/login.png" width="100" height="100" class="loginlogo"><br>
	  					<div class="input-group">
	  						<span class="input-group-addon">Username</span>
	  						<input type="text" name="username" class="form-control" required>
	  					</div><br>
	  					<div class="input-group">
	  						<span class="input-group-addon">Password</span>
	  						<input type="password" name="password" class="form-control" required>
	  					</div><br>
	  					<button class="btn btn-outline-primary">Login</button>
  					</form>
  				</div>
  			</div>
  		</div>

  		<div class="container-fluid" id="mis-vis">
  			<div class="row mis-vis">
  				<div class="col-md-6 mission">
  					<h3>Mission</h3>
  					<p><?php echo $mission->getValue() ?></p>
  				</div>
  				<div class="col-md-6 vision">
  					<h3>Vission</h3>
  					<p><?php echo $vision->getValue() ?></p>
  				</div>
  			</div>
  		</div>

  		<div class="container" id="b-o">
  			<div class="row">
  				<div class="col-md-2"></div>
  				<div class="col-md-8 barangay-officials">
  					<fieldset>
  						<legend>Barangay Officials</legend>
              <?php foreach ($officials as $official) { 
                  $position = BarangayPositionDao::getPosition($official->getPosition());
                ?>
                <div class="official">
                  <?php echo $position->getPosition(); ?> - <?php echo $official->getName(); ?>
                </div>
              <?php } ?>
  					</fieldset>
  				</div>
  			</div>
  		</div>

  		<div class="container-fluid contact-info" id="contact-info">
  			<div class="row">
  				<div class="col-md-4 thelogo">
  					<img src="images/contact.png" width="200" height="200" class="contact-logo">
  				</div>
  				<div class="col-md-8 contacts">
  					<div class="input-group">
  						<span class="input-group-addon">Telephone Number</span>
  						<input type="text" class="form-control" value="<?php echo $telephone->getValue(); ?>" disabled>
  					</div>
  					<div class="input-group">
  						<span class="input-group-addon">Cellphone Number</span>
  						<input type="text" class="form-control" value="<?php echo $mobile->getValue(); ?>" disabled>
  					</div>
  					<div class="input-group">
  						<span class="input-group-addon">Email Address</span>
  						<input type="text" class="form-control" value="<?php echo $email->getValue(); ?>" disabled>
  					</div>
  				</div>
  			</div>
  		</div>

      <footer>
        <?php include_once 'footer.html'; ?>
      </footer>

	    <!-- Optional JavaScript -->
	    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
	    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	    <!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	</body>
</html>