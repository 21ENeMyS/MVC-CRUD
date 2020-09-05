<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Halaman <?= $data['judul']; ?></title>
	<link rel="stylesheet" href="<?= URL; ?>/css/bootstrap.css">
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light">
		<div class="container">
      <img src="" alt="">
			<a class="navbar-brand" href="<?= URL; ?>">PHPMVC</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
				<div class="navbar-nav ml-auto">
          <a href="<?= URL; ?>" class="nav-item nav-link active">Home</a>
					<a href="<?= URL; ?>/about" class="nav-item nav-link ">About</a>
					<a href="<?= URL; ?>/mahasiswa" class="nav-item nav-link ">Mahasiswa</a>
					<?php if (isset($_SESSION['id'])) : ?>
					<a href="<?= URL; ?>/logout" class="nav-item nav-link btn btn-outline-primary">Log Out</a>
					<?php else : ?>
						<a href="<?= URL; ?>/login" class="nav-item nav-link btn btn-outline-primary">Login</a>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</nav>


