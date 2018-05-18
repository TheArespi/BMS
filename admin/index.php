
<?php
	session_start();

	include_once '../includes/announcement.php';

	if (!isset($_SESSION['id']) && empty($_SESSION['id'])){
		header("Location: ../index.php");
	}

	$announcements = AnnouncementDao::getAllAnnouncement();
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

  		<?php include_once 'navigation.php';?>

  		<div class="container">
  			<div class="row">
  				<div class="col-md-2"></div>
  				<div class="col-md-8">
  					<?php 
  						if (sizeof($announcements) > 0) { 
  							foreach ($announcements as $announcement) {
  					?>
  						<div class="well" style="margin-top: 20px;">
  							<h1 style="align: center; font-family: 'ubuntu', sans-serif; font-weight: bold">
  								<?php echo $announcement->getTitle() ?> 
  								<div class="pull-right">
  									<a href="editAnnouncement.php?id=<?php echo $announcement->getId() ?>" style="text-decoration: none">
	  									<span class="glyphicon glyphicon-cog"></span>
	  								</a>
	  								<a href="deleteAnnouncement.php?id=<?php echo $announcement->getId() ?>">
	  									<span class="glyphicon glyphicon-trash"></span>
	  								</a>
	  							</div>
  							</h1>
  							<hr style="width: 100%; color: black; height: 1px; background-color:black;"/>
  							<p><?php echo $announcement->getContent() ?></p>
  						</div>
  					<?php }} else { ?>
  						<div class="no-announcement">
	  						<div class="well" style="margin-top: 20px;">
	  							<div class="container-fluid">
	  								<div class="row">
	  									<div class="col-md-4">

	  									</div>
	  									<div class="col-md-8">
	  										<h2>Sorry, there are currently no announcement!</h2>
	  									</div>
	  								</div>
	  							</div>
	  						</div>
  						</div>	
  					<?php } ?>
  				</div>
  				<div class="col-md-2">
  					<a href="addAnnouncement.php" class="btn btn-link" style="margin-top: 22px;">Add Announcement <span class="glyphicon glyphicon-plus"></span></a>
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