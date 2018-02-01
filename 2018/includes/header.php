<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>
    <?php
    if (isset($page_title)) {
            echo $page_title;
        }
    ?>
    Secure User Login/SignUp
    </title>
   <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="/css/usermaterialize.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/css/jquery.dataTables.css">
  <link rel="stylesheet" href="/css/userstyle.css" />
    <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>

<nav class="cyan" role="navigation">
      <div class="nav-wrapper container">
      <a id="logo-container" href="#" class="brand-logo right" href="/">Secure User Login/SignUp</a>

      <ul class="left hide-on-med-and-down">
        <li><a href="/">Home</a></li>
        <?php if (Auth::getInstance()->isLoggedIn()): ?>
            
            <?php if (Auth::getInstance()->isAdmin()): ?>
            <li><a href="/admin/users">Admin Dashboard</a></li>
            <?php endif; ?>
            
            <li>
                <a class="dropdown-button" href="#!" data-activates="dropdown1">Sections<i class="material-icons right">arrow_drop_down</i></a>
                <ul id="dropdown1" class="dropdown-content">
                  <?php if (Auth::getInstance()->isManager()): ?>
                  <li><a href="/managers_section.php">Managers Section</a></li>
                  <?php endif; ?>

                  <?php if (Auth::getInstance()->isSubscriber()): ?>
                  <li><a href="/subscribers_section.php">Subscribers Section</a></li>
                  <?php endif; ?>

                  <li><a href="/users_section.php">Users Area</a></li>
                </ul>
            </li>
            
            <li><a href="/profile.php">Profile</a></li>
            <li><a href="/logout.php">Logout</a></li>

        <?php else: ?>
            <li><a href="/login.php">Login</a></li>
        <?php endif; ?>

        <li><a href="/contact.php">Contact</a></li>
      </ul>

      <ul id="nav-mobile" class="side-nav">
        <li><a href="/">Home</a></li>
        <?php if (Auth::getInstance()->isLoggedIn()): ?>

        <?php if (Auth::getInstance()->isAdmin()): ?>
        <li><a href="/admin/users">Admin Dashboard</a></li>
        <?php endif; ?>

        <?php if (Auth::getInstance()->isManager()): ?>
        <li><a href="/managers_section.php">Managers Section</a></li>
        <?php endif; ?>

        <?php if (Auth::getInstance()->isSubscriber()): ?>
        <li><a href="/subscribers_section.php">Subscribers Section</a></li>
        <?php endif; ?>

        <li><a href="/users_area.php">Users Section</a></li>

        <li><a href="/profile.php">Profile</a></li>
        <li><a href="/logout.php">Logout</a></li>

        <?php else: ?>
        <li><a href="login.php">Login</a></li>
        <?php endif; ?>

        <li><a href="/contact.php">Contact</a></li>
      </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
  </nav>
<main>
<div class="container">
