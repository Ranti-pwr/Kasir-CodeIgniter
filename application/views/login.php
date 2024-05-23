<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" href="<?= base_url('sp/dark/')?>/favicon.ico">
	<title></title>
	<!-- Simple bar CSS -->
	<link rel="stylesheet" href="css/simplebar.css">
	<!-- Fonts CSS -->
	<link
		href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap"
		rel="stylesheet">
	<!-- Icons CSS -->
	<link rel="stylesheet" href="<?= base_url('sp/dark/')?>css/feather.css">
	<!-- Date Range Picker CSS -->
	<link rel="stylesheet" href="<?= base_url('sp/dark/')?>css/daterangepicker.css">
	<!-- App CSS -->
	<link rel="stylesheet" href="<?= base_url('sp/dark/')?>css/app-light.css" id="lightTheme" disabled>
	<link rel="stylesheet" href="<?= base_url('sp/dark/')?>css/app-dark.css" id="darkTheme">
</head>

<body class="dark ">
	<div class="wrapper vh-100">
		<div class="row align-items-center h-100">
			<form class="col-lg-3 col-md-4 col-10 mx-auto text-center" method="post" action="<?= base_url('auth')?>">
				<a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="<?= base_url('auth')?>">
					<svg version="1.1" id="logo" class="navbar-brand-img brand-md" xmlns="http://www.w3.org/2000/svg"
						xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 120 120"
						xml:space="preserve">
						<g>
							<polygon class="st0" points="78,105 15,105 24,87 87,87 	" />
							<polygon class="st0" points="96,69 33,69 42,51 105,51 	" />
							<polygon class="st0" points="78,33 15,33 24,15 87,15 	" />
						</g>
					</svg>
				</a>
				<h1 class="h6 mb-3">Sign in</h1>
				<div class="form-group">
					<label for="inputEmail" class="sr-only">Username</label>
					<input type="text" id="inputEmail" class="form-control form-control-lg" placeholder="Username"
						name="username" required="" autofocus="">
						<?= form_error('username', '<small class="text-danger">', '</small>')?>
				</div>
				<div class="form-group">
					<label for="inputPassword" class="sr-only">Password</label>
					<input type="password" id="inputPassword" class="form-control form-control-lg"
						placeholder="Password" name="password" required="">
						<?= form_error('password', '<small class="text-danger">', '</small>')?>
				</div>
				<button class="btn btn-lg btn-primary btn-block" type="submit">Let me in</button>
				<p class="mt-5 mb-3 text-muted">© <script>
						document.write(new Date().getFullYear());
					</script>
				</p>
			</form>
		</div>
	</div>
	<script src="<?= base_url('sp/dark/')?>/js/jquery.min.js"></script>
	<script src="<?= base_url('sp/dark/')?>/js/popper.min.js"></script>
	<script src="<?= base_url('sp/dark/')?>/js/moment.min.js"></script>
	<script src="<?= base_url('sp/dark/')?>/js/bootstrap.min.js"></script>
	<script src="<?= base_url('sp/dark/')?>/js/simplebar.min.js"></script>
	<script src='<?= base_url('sp/dark/')?>/js/daterangepicker.js'></script>
	<script src='<?= base_url('sp/dark/')?>/js/jquery.stickOnScroll.js'></script>
	<script src="<?= base_url('sp/dark/')?>/js/tinycolor-min.js"></script>
	<script src="<?= base_url('sp/dark/')?>/js/config.js"></script>
	<script src="<?= base_url('sp/dark/')?>/js/apps.js"></script>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-56159088-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];

		function gtag() {
			dataLayer.push(arguments);
		}
		gtag('js', new Date());
		gtag('config', 'UA-56159088-1');
	</script>
</body>

</html>
</body>

</html>
