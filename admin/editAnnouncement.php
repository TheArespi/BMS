
<?php
	session_start();

	include_once '../includes/announcement.php';

	if (!isset($_SESSION['id']) && empty($_SESSION['id'])){
		header("Location: ../index.php");
	}



	$announcement = AnnouncementDao::getAnnouncement($_GET['id']);
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
  					<div class="pageTitle"><h2>Edit Announcement</h2></div>
  					<br>
  					<form action="editingAnnouncement.php?id=<?php echo $_GET['id'] ?>" method="POST">
  						<div class="input-group">
	  						<span class="input-group-addon">Title</span>
	  						<input type="text" name="title" class="form-control" value="<?php echo $announcement->getTitle() ?>" required>
	  					</div>
	  					<br>
	  					<textarea class="form-control" name="content" style="height: 250px" placeholder="Description" required><?php echo $announcement->getContent() ?></textarea>
	  					<br>
	  					<div class="pull-right">
		  					<button class="btn">Edit Announcement</button>
		  					<a href="index.php" class="btn">Cancel</a>
	  					</div>
  					</form>
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