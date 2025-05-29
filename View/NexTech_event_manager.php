<?php
session_start();
if (!isset($_SESSION["logged"])) {
	$_SESSION["logged"] = false;
}
if (!isset($_SESSION["admin"])) {
	$_SESSION["admin"] = false;
}
if ($_SESSION["admin"] == false) {
	header("Location: NexTech_index.php");
	exit();
}
require_once '../Controller/EventController.php';
$eventController = new EventController();
$events = $eventController->readEvents();
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>NexTech Login</title>
	<link rel="stylesheet" href="NexTech.css">
</head>

<body>
	<header>
		<div class="header">
			<div class="start">
				<div class="images">
					<div class="logo">
						<a href="NexTech_index.php"><img src="Images/NexTech logo.png" alt="Image Logo NexTech"></a>
					</div>
				</div>
				<div class="options">
					<div class="events">
						<a href="NexTech_events.php" style="color:rgb(94, 6, 130)"><b>Events</b></a>
					</div>
					<div class="info">
						<a href="Nextech_about_us.php" style="color:rgb(147, 0, 233)">About us</a>
					</div>
					<?php if ($_SESSION["admin"] == true) { ?>
						<div class="event_manager">
							<a href="NexTech_event_manager.php" style="color:rgb(147, 0, 233)">Event manager</a>
						</div>
					<?php } ?>
				</div>
			</div>
			<?php if ($_SESSION["logged"] == false) { ?>
				<div class="login_register">
					<div class="register">
						<a href="NexTech_register.php">Register</a>
					</div>
					<div class="login">
						<a href="NexTech_login.php">Login</a>
					</div>
				</div>
			<?php } else if ($_SESSION["logged"] == true) { ?>
				<div class="profile_logout">
					<div class="profile_logged">
						<a href="NexTech_profile.php" style="color:rgb(147, 0, 233)"> <?php echo '<img class="profile_image" src="data:image/jpeg;base64,' . base64_encode($_SESSION["profile_image"]) . '" alt="Profile" >' ?></a>
					</div>
					<div class="logout">
						<form action="../Controller/UserController.php" method="post">
							<input type="submit" name="logout" value="Log out">
						</form>
					</div>
				</div>
			<?php } ?>
		</div>
	</header>

	<section>
		<div class="section">
			<div class="event_manager">
				<div class="title">
					<h1>EVENT MANAGER</h1>
				</div>
				<div class="create">
					<form action="NexTech_create_event.php" method="post">
						<button class="create_button" type="submit">Create a Event</button>
					</form>
				</div>
				<div class="events">
						<div>
							<h1>EVENTS</h1>
						</div>
						<?php if (!empty($events)) { ?>
							<div class="event-table-wrapper">
								<table cellpadding="8" cellspacing="0">
									<thead>
										<tr>
											<th>Name</th>
											<th>Description</th>
											<th>Start Date</th>
											<th>End Date</th>
											<th>Location</th>
											<th>Price</th>
											<th>URL</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($events as $event) { ?>
											<tr>
												<td><?php echo htmlspecialchars($event['name']); ?></td>
												<td class="description-column"><?php echo htmlspecialchars($event['description']); ?></td>
												<td><?php echo htmlspecialchars($event['start_date']); ?></td>
												<td><?php echo htmlspecialchars($event['end_date']); ?></td>
												<td><?php echo htmlspecialchars($event['location']); ?></td>
												<td><?php echo htmlspecialchars($event['price']); ?></td>
												<td><?php echo htmlspecialchars($event['url']); ?></td>
											</tr>
										<?php } ?>
									</tbody>
								</table>
							</div>
						<?php } else { ?>
							<p>No events found.</p>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</section>

	<footer>
		<div class="container">
			<div class="wrapper">
				<div class="footer-widget">
					<a href="#">
						<img src="images/footerLogo.png" class="logo" />
					</a>
					<p class="desc">
						NexTech connects you with the latest tech events, resources, and support. Explore, learn, and grow with our community!
					</p>
				</div>
				<div class="footer-widget">
					<h6>Quick Link</h6>
					<div class="links">
						<a href="NexTech_events.php">Events</a>
						<a href="Nextech_about_us.php">About us</a>
					</div>
				</div>
				<div class="footer-widget">
					<h6>Help &amp; Support</h6>
					<div class="links">
						<p>Address: Calle Pelai 123, Barcelona, Spain</p>
						<p>Phone number: +123 456 789</p>
						<p>Email: infonextech@gmail.com</p>
					</div>
				</div>
			</div>
			<div class="copyright-wrapper">
				<p>Design and Developed by <a href="#" target="blank">NexTech</a> 2024/2025</p>
			</div>
		</div>
	</footer>
</body>

</html>