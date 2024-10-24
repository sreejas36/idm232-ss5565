document.getElementById('hamburger').addEventListener('click', function() {
    var navMenu = document.getElementById('nav-menu');
    navMenu.classList.toggle('show'); // Show menu
    navMenu.classList.toggle('collapsed'); // Collapse menu
});
