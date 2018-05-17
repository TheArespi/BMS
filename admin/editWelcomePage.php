
<?php
	session_start();

	include_once '../includes/barangayInfoDAO.php';
	include_once '../includes/barangayPosition.php';
	include_once '../includes/barangayOfficial.php';

	if (!isset($_SESSION['id']) && empty($_SESSION['id'])){
		header("Location: ../index.php");
	}

	$mission = BarangayInfoDao::getInfo("Mission");
	$vision = BarangayInfoDao::getInfo("Vision");

	$mobile = BarangayInfoDao::getInfo("mobile");
	$telephone = BarangayInfoDao::getInfo("telephone");
	$email = BarangayInfoDao::getInfo("email");

	$positions = BarangayPositionDao::getPositions();

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

		<link rel="stylesheet" type="text/css" href="../css/main.css">
		<title>Welcome to our Barangay</title>
	</head>
  	<body>

  		<?php include 'navigation.php';?>

  		<div class="container">
  			<div class="row">
  				<div class="col-md-2"></div>
  				<div class="col-md-8">
  					<div class="pageTitle"><h2>Welcome Page Setting</h2></div>
  					<br>
  					<fieldset width="100%">
  						<legend>Mission and Vission</legend>
  						<form action="editingWelcomePage.php" method="POST">
  							<div class="m-v form-group">
  								<span class="name">Mission</span>
  								<textarea name="mission" class="form-control"><?php echo $mission->getValue() ?></textarea>
  							</div>
  							<br>
  							<div class="m-v form-group">
  								<span class="name">Vision</span>
  								<textarea name="vision" class="form-control"><?php echo $vision->getValue() ?></textarea>
  							</div>
  							<br>
  							<button class="btn pull-right">Edit Mission and Vission</button>
  						</form>
  					</fieldset>
  					<br>
  					<fieldset>
  						<legend>Barangay Officials</legend>
  							<?php foreach ($officials as $official) { ?>
	  							<div class="row" style="margin-top: 10px">
	  								<form action="barangayPositionUpdate.php?id=<?php echo $official->getId() ?>" method="POST">
		  								<div class="col-md-4">
		  									<select class="form-control" name="position">
				  								<?php foreach ($positions as $position) { 
				  										$members = BarangayOfficialDao::countMemberOf($position->getPositionCode());
				  									?>
				  									<option value="<?php echo $position->getPositionCode()?>" <?php if ($position->getPositionCode() == $official->getPosition()) echo 'selected'; ?> <?php if ($members >= $position->getNumOfMembers()) echo "disabled";?>><?php echo $position->getPosition()?></option>	
				  								<?php } ?>
				  							</select>
		  								</div>
		  								<div class="col-md-6">
		  									<input type="text" name="name" class="form-control" value="<?php echo $official->getName()?>">
		  								</div>
		  								<div class="col-md-2 pull-right">
		  									<button class="btn"><span class="glyphicon glyphicon-floppy-disk"></span></button>
		  									<a href="barangayPositionDelete.php?id=<?php echo $official->getId(); ?>" class="btn"><span class="glyphicon glyphicon-trash"></span></a>
		  								</div>
		  							</form>
	  							</div>
  							<?php } ?>
  							<br>
  							<br>
  							<form action="barangayPositionAdd.php" method="POST">
	  							<div class="row">
	  								<div class="col-md-4">
	  									<select class="form-control" name="position">
				  							<?php foreach ($positions as $position) { 
				  								$members = BarangayOfficialDao::countMemberOf($position->getPositionCode());
				  								?>
				  								<option value="<?php echo $position->getPositionCode()?>" <?php if ($members >= $position->getNumOfMembers()) echo "disabled";?>><?php echo $position->getPosition()?></option>	
				  							<?php } ?>
				  						</select>
	  								</div>
	  								<div class="col-md-8">
	  									<input type="text" name="name" class="form-control" required>
	  								</div>
	  							</div>
	  							<br>
	  							<button class="btn pull-right">Add Official</button>
  							</form>
  					</fieldset>
  					<br>
  					<fieldset>
  						<legend>Contact Info</legend>
  						<form action="editingContactInfo.php" method="POST">
  							<div class="input-group">
	  							<span class="input-group-addon">Telephone Number</span>
	  							<input type="text" name="telephone" class="form-control" value="<?php echo $telephone->getValue();?>">
	  						</div>
	  						<br>
	  						<div class="input-group">
	  							<span class="input-group-addon">Mobile Number</span>
	  							<input type="text" name="mobile" class="form-control" value="<?php echo $mobile->getValue();?>">
	  						</div>
	  						<br>
	  						<div class="input-group">
	  							<span class="input-group-addon">Email Address</span>
	  							<input type="email" name="email" class="form-control" value="<?php echo $email->getValue();?>">
	  						</div>
	  						<br>
	  						<button class="btn pull-right">Edit Contact Info</button>
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