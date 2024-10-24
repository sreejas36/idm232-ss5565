document.getElementById('hamburger').addEventListener('click', function() {
    var navMenu = document.getElementById('nav-menu');
    navMenu.classList.toggle('show'); // Show menu
    navMenu.classList.toggle('collapsed'); // Collapse menu
});


function performSearch() {
    const searchInput = document.getElementById("searchInput").value;

    // Show an error message regardless of the input
    const errorMessage = document.getElementById("error-message");
    errorMessage.style.display = "block";
    errorMessage.textContent = `No results found for "${searchInput}". Please try again.`;
}
