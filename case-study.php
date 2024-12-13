<?php
error_reporting(E_ALL);
ini_set('display_error', 1);
ini_set('display_startup_errors', 1);

require_once 'includes/database.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sizzle & Spice Case Study</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inria+Serif:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Raleway:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
</head>

<body>

<header>
        <a href="index.php" class="home">
            <img src="assets/frying-pan-logo.png" alt="Website Logo" style="width:100px; height:auto;" class="logo">
            <h1>Sizzle & Spice</h1>
        </a>  
        <nav>
            <a href="about.php">About</a>
            <!-- <a href="recipe.php">Recipes</a> -->
        </nav id="nav-menu">
        <button id="hamburger">
            <img src="assets/hamburger-menu.png" alt="Menu" style="width: 30px; height: 30px;">
        </button>
</header>
