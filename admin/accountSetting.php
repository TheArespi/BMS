
<?php
	session_start();

	include_once '../includes/personalinfo.php';
	include_once '../includes/loginDAO.php';

	if (!isset($_SESSION['id']) && empty($_SESSION['id'])){
		header("Location: ../index.php");
	}

	$havePersonalInfo = PersonalInfoDao::havePersonalInfo($_SESSION['id']);

	if ($havePersonalInfo)
		$personalInfo = PersonalInfoDao::getPersonalInfo($_SESSION['id']);

	$login = LoginDao::getLoginInfoById($_SESSION['id']);
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

		<link rel="stylesheet" type="text/css" href="../css/main.css">
		<title>Welcome to our Barangay</title>
	</head>
  	<body>

  		<?php include 'navigation.php';?>

  		<div class="container">
  			<div class="row">
  				<div class="col-md-2"></div>
  				<div class="col-md-8">
  					<div class="pageTitle"><h2>Account Setting</h2></div>
  					<br>
  					<fieldset>
  						<legend>Personal Info</legend>
  						<form action="editingPersonalInfo.php" method="POST">
  							<div class="input-group">
		  						<span class="input-group-addon">First Name</span>
		  						<input type="text" name="firstname" class="form-control" value="<?php if ($havePersonalInfo) echo $personalInfo->getFirstname(); ?>" required>
		  					</div>
		  					<br>
		  					<div class="input-group">
		  						<span class="input-group-addon">Middle Name</span>
		  						<input type="text" name="middlename" class="form-control" value="<?php if ($havePersonalInfo) echo $personalInfo->getMiddlename(); ?>" required>
		  					</div>
		  					<br>
		  					<div class="input-group">
		  						<span class="input-group-addon">Last Name</span>
		  						<input type="text" name="lastname" class="form-control" value="<?php if ($havePersonalInfo) echo $personalInfo->getLastname(); ?>" required>
		  					</div>
		  					<br>
		  					<div class="input-group">
		  						<span class="input-group-addon">Birthday</span>
		  						<input type="date" name="birthday" class="form-control" value="<?php if ($havePersonalInfo) echo $personalInfo->getBirthday(); ?>" required>
		  					</div>
		  					<br>
		  					<div class="row">
		  						<div class="col-md-6">
		  							<div class="input-group">
				  						<span class="input-group-addon">Gender</span>
				  						<select name="gender" class="form-control">
				  							<option>Male</option>
				  							<option <?php if ($havePersonalInfo){if ($personalInfo->getGender() == "Female") echo 'selected';}?>>Female</option>
				  						</select>
				  					</div>
		  						</div>
		  						<div class="col-md-6">
		  							<div class="input-group">
				  						<span class="input-group-addon">Civil Status</span>
				  						<select name="civilstatus" class="form-control">
				  							<option>Single</option>
				  							<option <?php if ($havePersonalInfo){if ($personalInfo->getCivilStatus() == "Married") echo 'selected';}?>>Married</option>
				  							<option <?php if ($havePersonalInfo){if ($personalInfo->getCivilStatus() == "Widowed") echo 'selected';}?>>Widowed</option>
				  							<option <?php if ($havePersonalInfo){if ($personalInfo->getCivilStatus() == "Divorced") echo 'selected';}?>>Divorced</option>
				  						</select>
				  					</div>
		  						</div>
		  					</div>
		  					<br>
		  					<button class="btn pull-right"><?php if ($havePersonalInfo) echo 'Edit'; else echo 'Add';?> Personal Info </button>
  						</form>
  					</fieldset>
  					<br>
  					<fieldset>
  						<legend>Login Setting</legend>
  						<form action="updateUsername.php" method="GET">
  							<div class="row">
  								<div class="col-md-11">
  									<div class="input-group">
		  								<span class="input-group-addon">Username</span>
		  								<input type="text" name="username" class="form-control" value="<?php echo $login->getUsername() ?>">
		  							</div>
  								</div>
  								<div class="col-md-1">
  									<button class="btn pull-right"><span class="glyphicon glyphicon-floppy-disk"></span></button>
  								</div>
  							</div>
  						</form>
  					</fieldset>
  				</div>
  			</div>
  		</div>

  		<footer>
  			<?php include_once '../footer.html'; ?>
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