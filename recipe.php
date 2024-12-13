<?php
error_reporting(E_ALL);
ini_set('display_error', 1);
ini_set('display_startup_errors', 1);

require_once 'includes/database.php';

// Check if an ID is provided in the URL
if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo "No recipe ID provided.";
    exit;
}

$recipe_id = intval($_GET['id']); // Ensure the ID is an integer

// Prepare and execute a SQL query to fetch recipe details
$statement = $connection->prepare('SELECT * FROM recipes WHERE id = ?');
$statement->bind_param('i', $recipe_id);
$statement->execute();

$recipe = $statement->get_result()->fetch_assoc();

// Check if the recipe exists
if (!$recipe) {
    echo "Recipe not found.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title><?php echo $recipe['title']; ?> - Recipe Details</title>
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


<section class="recipe-info">
            <div class="hero-and-info">
                <div class="side-info">
                    <div>
                        <h3 class="cuisine"><?php echo $recipe['cuisine']; ?></h3>
                        <h3 class="protein"><?php echo $recipe['protein']; ?></h3>
                    </div>
                    <div>
                        <h1 class="title"><?php echo $recipe['title']; ?></h1>
                        <h2 class="subtitle"><?php echo $recipe['subtitle']; ?></h2>
                    </div>
                    
                    <p class="description"><?php echo $recipe['description']; ?></p>
                    <!-- <hr> -->
                    <div class="extra-info">
                        <div class="cook-time">
                            <div class="icon">
                                <img src="/assets/cook-time.png" alt="cook-time">
                            </div>
                            <h4><?php echo $recipe['cook_time']; ?></h4>
                        </div>
                        <div class="serving-size">
                            <div class="icon">
                                <img src="/assets/serving-size.png" alt="serving-size">
                            </div>
                            <h4><?php echo $recipe['serving_size']; ?></h4>
                        </div>
                        <div class="calories">
                            <div class="icon">
                                <img src="/assets/calories.png" alt="calories">
                            </div>
                            <h4><?php echo $recipe['calories']; ?></h4>
                        </div>
                    </div>
                    <!-- <hr> -->
                </div>
                <!-- Recipe Image -->
                <div class="main-image">
                <img src="pics/<?php echo $recipe['main_image']; ?>" alt="Recipe Image" class="recipe-image">
                </div>
            </div>

                <!-- Ingredients -->
                <div class="ingredient-separation">
                    <img src="pics/<?php echo $recipe['ingredients_image']; ?>" alt="Ingredients Laid Out" class="ingredients">
                    <div class="ingredient-list">
                        <h2>Ingredients</h2>
                        <ul>
                            <?php
                            $ingredients = explode('*', $recipe['ingredients']);
                            foreach ($ingredients as $ingredient) {
                                echo '<li>' . $ingredient . '</li>';
                            }
                            ?>
                        </ul>
                    </div>
                </div>
                
</section>


        <!-- Steps List -->
        <section class="recipe-instructions">
            <h2>Steps</h2>
            <div class="steps">
                <?php
                $steps = explode('*', $recipe['steps']);
                $images = explode('*', $recipe['steps_image']);

                foreach ($steps as $index => $step) {
                    $stepParts = explode('^^', $step);

                    // Display the step image if available
                    if (isset($images[$index])) {
                    // Ensure that the image URL is valid
                    echo '<img src="pics/' . $images[$index] . '" alt="Step ' . ($index + 1) . ' Image" class="step-image">';
                    }

                    if (count($stepParts) == 2) {
                        echo '<div class="step">';
                        // Show the number and then the step
                        echo '<strong>' . ($index + 1) . '. ' . trim($stepParts[0]) . ':</strong> ';
                        echo '<p>' . trim($stepParts[1]) . '</p>';
                        echo '</div>';
                    }
                }
                ?>
            </div>
        </section>
</div>
</body>
</html>