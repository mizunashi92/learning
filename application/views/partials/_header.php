<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Learning | Univision</title>
    <?php require_once('_css.php'); ?>

</head>

<body>
<?php require_once('_navbar.php'); ?>

<?php if ($this->uri->segment(1) === null) require_once('_carousel.php'); ?>