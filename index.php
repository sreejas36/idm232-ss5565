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
    $statement = $connection->prepare('SELECT * FROM recipes WHERE protein = ?');
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
    <title>Sizzle & Spice</title>
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

<section class="invitation">
    <h1 class="tagline">Enter a World of Flavors.</h1>
    <div class="search">
        <div class="search-bar">
            <!-- Search Form -->
            <form action="index.php" method="get" class="search-horizontal">
                <input type="text" name="search" placeholder="What flavors will you explore today?" value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
                <button type="submit">Search</button>
            </form>
        </div>
    </div>

        <!-- Filter Buttons -->
    <div class="filter">
        <div class="filter-buttons">
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
            <button type="submit" class="reset-button">Reset</button>
            </form>
        </div>
    </div>
</section>



    <div class="recipes">
    <?php foreach ($recipes as $recipe): ?>
        <a href="recipe.php?id=<?php echo $recipe['id']; ?>">
            <div class="recipe-card">

                <!-- Recipe Image -->
                <img src="pics/<?php echo ($recipe['main_image']); ?>" alt="Recipe Image" class="recipe-image">

                <div class="recipe-blurb">
                    <h2 class="recipe-title"><?php echo ($recipe['title']); ?></h2>
                    <p class="recipe-subtitle"><?php echo ($recipe['subtitle']); ?></p>
                    <div class="card-details">
                        <div class="details-horizontal">
                            <div class="icon">
                                <img src="/assets/cook-time.png" alt="cook-time">
                            </div>
                            <p><?php echo $recipe['cook_time']; ?></p>
                        </div>
                        <!-- <hr> -->
                        <div class="details-horizontal">
                            <div class="icon">
                                <img src="/assets/serving-size.png" alt="serving-size">
                            </div>
                            <p><?php echo $recipe['serving_size']; ?></p>
                        </div>
                        <div class="details-horizontal">
                            <div class="icon">
                                <img src="/assets/calories.png" alt="calories">
                            </div>
                            <p><?php echo $recipe['calories']; ?></p>
                        </div>
                    </div>
                </div>
                
                
            </div>
        </a>

    <?php endforeach; ?>
    <?php if (count($recipes) > 0): ?>

    <?php else: ?>
        <p class="error-message">Sorry, we didn't find any results for "<?php echo htmlspecialchars($search); ?>"</p>
    <?php endif; ?>
    </div>
</body>
</html>
