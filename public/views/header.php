<?php require_once 'app/Libs/Session.php'; ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Quantox</title>

  <link rel="stylesheet" href="<?php echo URL; ?>/public/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo URL; ?>/public/css/style.css">

  </head>
<body>

<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">

<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="/">Quantox</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="<?php echo URL; ?>">Home <span class="sr-only">(current)</span></a>
            </li>
            <?php if (Session::get(['user', 'login_status'])) { ?>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo URL; ?>/logout">Logout</a>
            </li>
            <?php } else { ?>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo URL; ?>/login">Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo URL; ?>/register">Register</a>
            </li>
            <?php } ?>
          </ul>
            <form class="form-inline mt-2 mt-md-0" action="/search" method="post">
                <input class="form-control mr-sm-2" placeholder="Search" aria-label="Search" type="text" name="search" required>
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
      </nav>
</div>

<div class="main">

<div class="container">
  <div class="row">