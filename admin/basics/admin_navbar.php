<!-- CSS Scripts -->
<link href="./css/admin_navbar.css" rel="stylesheet">

<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow navbarStyle">
	<a class="navbar-brand col-sm-3 col-md-2 mr-0 logoBox" href="#">
		<img src="../images/logoW.png" class="logoStyle">
	</a>

	<ul class="navbar-nav px-3">
		<li class="nav-item text-nowrap">

			<?php
			if (isset($_SESSION['admin_id'])) {
			?>
				<div class="navbarLinksBox">
					<a class="nav-link navbarLink" href="../admin/admin-logout.php">Logout</a>
				</div>
				<?php
			} else {
				$uriAr = explode("/", $_SERVER['REQUEST_URI']);
				$page = end($uriAr);
				if ($page === "login.php") {
				?>
					<div class="navbarLinksBox">
						<a class="nav-link navbarLink" href="../admin/register.php">Register</a>
					</div>
				<?php
				} else {
				?>
					<div class="navbarLinksBox">
						<a class="nav-link navbarLink" href="../admin/login.php">Sign In</a>
					</div>
			<?php
				}
			}
			?>

		</li>
	</ul>
</nav>