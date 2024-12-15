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
            <img src="assets/frying-pan-logo.webp" alt="Website Logo" style="width:100px; height:auto;" class="logo">
            <h1>Sizzle & Spice</h1>
        </a>    
        <nav>
            <div class="about">
                <a href="about.php">About</a>
            </div>
</header>


<section class="case-study-container">
    <h1>Sizzle & Spice</h1>
    <h2>A Responsive Recipe Website Made Using HTML, CSS, PHP, and MYSQL</h2>

    <!-- Hero Image -->
    <img src="assets/hero-image.png" alt="Hero Image" class="hero-image">

    <div class="case-study-sections">
        <section class="case-study-section">
            <h2>Overview</h2>
            <p>
                Sizzle & Spice is a responsive recipe website made to provide users with a seamless way to explore and filter curated recipes. 
                The website was a testament to UX Design and Development, combining both spheres into a cohesive site. 
            </p>
        </section>

        <section class="case-study-section">
            <h2>Context & Challenge</h2>
            <h3>Background</h3>
                <p>
                    This individual project involved the opportunity to create a culinary website that enables users to quickly find recipes based on dietary needs, cuisine type, or specific ingredients. 
                </p>
            <h3>Timeline</h3>
                <p>
                    This was completed over a timeline of 3 months, with the help of premade assets and software like MAMP, phpMyAdmin, and Cyberduck.
                </p>
                <p>
                    Throughout 10 weeks, we were tasked to create an:
                    <ul>
                        <li>Alpha: Setting a framework with HTML, CSS, and JavaScript</li>
                        <li>Beta: Incorporating PHP with the help of MySQL</li>
                        <li>Case-Study: Detailing the journey it took to get here</li>
                        <li>Final: A finished product, integrating everything we learned into a polished website.</li>
                    </ul>
                </p>
            <h3>Goals and Objectives</h3>
            <ul>
                <li>Create a responsive design for desktop, tablet, and mobile devices.</li>
                <li>Implement a dynamic filtering system using PHP and MySQL.</li>
                <li>Ensure accessibility through semantic HTML and WCAG-compliant color contrast.</li>
            </ul>
        </section>

        <!-- Process and Insight Section -->
        <section class="case-study-section">
            <h2>Process & Insight</h2>
            <h3>Research & Learning</h3>
            <p>
                Often in the real world, we are tasked to start from the ground up in order to find a solution to our problem. This project was exactly that, involving learning new programming entities like PHP and MySQL and then applying that knowledge to create a cohesive site. 
            </p>
            <p>
                Throughout our 10 week course, we learned about PHP and SQL as well as how to use them. We learned about functions that we could use in our project, and it helped make the process smoother.
            </p>
            <h3>Design</h3>
                <p>
                    I wireframed and mapped out my brainstorming process through creating wireframes and a style tile. It helped me draw a string towards a cohesive project. 
                </p>
                <p>
                    I chose to name my site Sizzle & Spice to bring in bits of my culture, which apply vibrant colors and flavors to creative dishes. When creating my color themes, I drew on traditional Indian spices and flavors. 
                </p>
                <ul>
                    <li>Wireframes and prototypes were created using Figma to plan layout and user flow.</li>
                    <li>Style guide included typography, color schemes, and UI components.</li>
                    <li>Icons were used to represent information to break up the flow of text and bring it all together.</li>
                </ul>
                <img src="assets/style-tile.png" alt="Style Tile" class="hero-image">
                <img src="assets/card-hover.png" alt="Card Hover" class="hero-image">

            <h3>Development</h3>
                <h5>Alpha</h5>
                    <p>
                        In order to take the website from a 2d design into a 3d prototype, I coded the website in HTML and CSS. By translating my ideas into a physical website, I was able to close in on certain design choices.
                    </p>
                <h5>Beta</h5>
                    <p>
                        After getting a general website framework, it was time to undertake PHP and MySQL. This would allow the website to be fully functional, and pull recipe information from a database.
                    </p>
                    <p>
                        First, I created a MySQL database by taking the 40 recipes in a provided file and separating the information into an Excel sheet. This allowed us to customize the functions and informations that we could include in our design. Some factors included:
                            <ul>
                                <li>Cuisine</li>
                                <li>Protein</li>
                                <li>Cook Time</li>
                                <li>Serving size</li>
                                <li>Calories</li>
                            </ul>
                    </p>
                    <p>
                        I incorporated this into my search and filter tools, which allow the user to search for whatever they want on the site. If their search query is not found, an error message will pop up.</p>
                    <p>
                        I utilized MAMP to create a local server and database to work on. Through continuous editing and pushing, I was able to come to a proper dynamic website.
                    </p>
        </section>

        <!-- Solution Section -->
        <section class="case-study-section">
            <h2>The Solution</h2>
            <p>
                The final website features a sleek, responsive layout with a dynamic search and filter system. Users can explore up to 40 recipes categorized by cuisine and dietary preferences.
            </p>
            <img src="assets/final-solution.png" alt="Final Solution">
        </section>

        <!-- Results Section -->
        <section class="case-study-section">
            <h2>The Results</h2>
            <p>
                This project was a very intriguing journey, giving me valuable experience in utilizing PHP and database integration to create a functional website. Though I faced some challenges with PHP and working through file transfer, I was able to learn from each step and get more comfortable with my mistakes. As a result, I am more comfortable working with this and can take this wherever I go!
            </p>
            <p>
                I appreciate my progress and how far I've come, and I think I would take this project a step further by integrating a dynamic selection of recipes or a testimonial page, where people's reviews of a dish will cycle through below the main information of the dish. 
            </p>
            <p>
                I'm looking forward to potentially utilizing PHP to make workflows more efficient in other fields.
            </p>
        </section>
    </div>
</section>

<footer class="footer">© 2024 Sizzle & Spice</footer>

</body>
</html>