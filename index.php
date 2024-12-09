<?php
error_reporting(E_ALL);
ini_set('display_error', 1);
ini_set('display_startup_errors', 1);

require_once 'includes/database.php';

$statement = $connection->prepare('SELECT * FROM recipes');
$statement->execute();
$recipes = $statement->get_result()->fetch_all(MYSQLI_ASSOC);

// Get the search input (if any)
$search = $_GET['search'] ?? ''; // Default to empty string if not set
$filter = $_GET['filter'] ?? ''; // Default to empty string if not set

// Prepare a SQL query with a WHERE clause for filtering
if (!empty($search) && !empty($filter)) {
    // Filter by both search term and category
    $statement = $connection->prepare('SELECT * FROM recipes WHERE (title LIKE ? OR ingredients LIKE ? OR protein LIKE ?) AND protein = ?');
    $searchParam = '%' . $search . '%'; // Add wildcards for partial matching
    $statement->bind_param('ssss', $searchParam, $searchParam, $searchParam, $filter);
} elseif (!empty($search)) {
    // Filter by search term only
    $statement = $connection->prepare('SELECT * FROM recipes WHERE title LIKE ? OR ingredients LIKE ? OR protein LIKE ?');
    $searchParam = '%' . $search . '%';
    $statement->bind_param('sss', $searchParam, $searchParam, $searchParam);
} elseif (!empty($filter)) {
    // Filter by protein category only
    $statement = $connection->prepare('SELECT * FROM st_rurecipes_ten WHERE protein = ?');
    $statement->bind_param('s', $filter);
} else {
    // If no search term or filter, fetch all recipes
    $statement = $connection->prepare('SELECT * FROM recipes');
}

// Execute the statement
$statement->execute();

// Fetch the result
$recipes = $statement->get_result()->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pocket Recipes</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>

<header>
        <a href="index.php">
            <img src="assets/frying-pan-logo.png" alt="Website Logo" style="width:100px; height:auto;" class="logo">
        </a>          
        <h1>Sizzle & Spice</h1>
        <nav>
            <a href="about.php">About</a>
            <a href="recipe.php">Recipes</a>
        </nav id="nav-menu">
        <button id="hamburger">
            <img src="assets/hamburger-menu.png" alt="Menu" style="width: 30px; height: 30px;">
        </button>
    </header>
    <h1 class="tagline">Enter a World of Flavors.</h1>
    <div class="search">
        <div class="search-bar">
            <!-- Search Form -->
            <form action="index.php" method="get" class="search-form">
                <input type="text" name="search" placeholder="What flavors will you explore today?" value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
                <button type="submit">Search</button>
            </form>
        </div>
    </div>

        <!-- Filter Buttons -->
    <div class="filter-button">
        <form action="index.php" method="get">
            <input type="hidden" name="filter" value="Chicken">
            <button type="submit">Chicken</button>
        </form>
        <form action="index.php" method="get">
            <input type="hidden" name="filter" value="Fish">
            <button type="submit">Fish</button>
        </form>
        <form action="index.php" method="get">
            <input type="hidden" name="filter" value="Beef">
            <button type="submit">Beef</button>
        </form>
        <form action="index.php" method="get">
            <input type="hidden" name="filter" value="Turkey">
            <button type="submit">Turkey</button>
        </form>
        <form action="index.php" method="get">
            <input type="hidden" name="filter" value="Pork">
            <button type="submit">Pork</button>
        </form>
        <form action="index.php" method="get">
            <input type="hidden" name="filter" value="Vegetarian">
            <button type="submit">Vegetarian</button>
        </form>

            <!-- Reset Button -->
        <form action="index.php" method="get">
        <button type="submit" class="reset-button">Reset Filters</button>
        </form>
    </div>
            <!-- <p id="error-message" style="display: none;">Sorry, we didn't find any results for your search.</p> -->








<div class="hero">
    <div class="hero-text">
        <a href="index.php">
            <h1>Sizzle & Spice</h1>
        </a>
    </div>
    <div class="help">
        <button onclick="window.location.href='help.php';">Help</button>    
    </div>
</div>

    <div class="statement">
        <h3>The cook book that fits right in your pocket</h3>
    </div>

<!-- Search Form -->
<form action="index.php" method="get" class="search-form">
    <input type="text" name="search" placeholder="Search for recipes..." value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
    <button type="submit">Search</button>
</form>

<!-- Filter Buttons -->
<div class="filter-button">
    <form action="index.php" method="get">
        <input type="hidden" name="filter" value="Fish">
        <button type="submit">Fish</button>
    </form>
    <form action="index.php" method="get">
        <input type="hidden" name="filter" value="Beef">
        <button type="submit">Beef</button>
    </form>
    <form action="index.php" method="get">
        <input type="hidden" name="filter" value="Vegetarian">
        <button type="submit">Vegetarian</button>
    </form>
    <form action="index.php" method="get">
        <input type="hidden" name="filter" value="Chicken">
        <button type="submit">Chicken</button>
    </form>
    <form action="index.php" method="get">
        <input type="hidden" name="filter" value="Turkey">
        <button type="submit">Turkey</button>
    </form>
    <form action="index.php" method="get">
        <input type="hidden" name="filter" value="Pork">
        <button type="submit">Pork</button>
    </form>

    <!-- Reset Button -->
    <form action="index.php" method="get">
        <button type="submit" class="reset-button">Reset Filters</button>
    </form>
</div>

<!-- Recipe Cards Display -->
<div class="recipe-cards">
    <?php foreach ($recipes as $recipe): ?>
        <div class="recipe-card">
            <!-- Recipe Image -->
            <a href="recipe.php?id=<?php echo $recipe['id']; ?>" class="recipe-link">
                <img src="pics/pics/<?php echo ($recipe['main_image']); ?>" alt="Recipe Image" class="recipe-image">
                <h2 class="recipe-title"><?php echo ($recipe['title']); ?></h2>
                <h3 class="recipe-subtitle"><?php echo ($recipe['subtitle']); ?></h3>
            </a>

            <!-- Recipe Information -->
            <!-- <p><strong>Cooking Time:</strong> <?php echo ($recipe['cook_time']); ?></p>
            <p><strong>Serving Size:</strong> <?php echo ($recipe['serving_size']); ?></p>
            <p><strong>Protein: </strong> <?php echo ($recipe['protein']); ?> </p>
            <p><strong>Calories:</strong> <?php echo htmlspecialchars($recipe['calories']); ?> </p> -->

            <!-- Recipe Description -->
            <!-- <p class="recipe-description"><?php echo ($recipe['description']); ?></p> -->

            <!-- Ingredients List -->
            <!-- <h4>Ingredients:</h4>
            <ul class="ingredients-list">
                <?php
                $ingredients = explode('*', $recipe['ingredients']); // Assuming ingredients are stored as a comma-separated list
                foreach ($ingredients as $ingredient):
                ?>
                    <li><?php echo ($ingredient); ?></li>
                <?php endforeach; ?>
            </ul> -->

            <!-- Steps List -->
            <!-- <h4>Steps:</h4>
            <div class="steps-container">
                <?php
                $steps = explode('*', $recipe['steps']);
                foreach ($steps as $step):
                    if (trim($step)):
                        $stepParts = explode('^^', $step);
                        if (count($stepParts) == 2):
                            $stepTitle = trim($stepParts[0]);
                            $stepDescription = trim($stepParts[1]);
                            ?>
                            <div class="step">
                                <strong><?php echo ($stepTitle); ?>:</strong>
                                <p><?php echo ($stepDescription); ?></p>
                            </div>
                            <?php
                        endif;
                    endif;
                endforeach;
                ?>
            </div> -->
        </div>
    <?php endforeach; ?>
    <?php if (count($recipes) > 0): ?>
        <!-- Display recipes as before -->
    <?php else: ?>
        <p>No recipes found matching your search criteria.</p>
    <?php endif; ?>
</div>

</body>
</html>
