document.addEventListener('DOMContentLoaded', function() {
    // Get the navbar element
    var navbar = document.querySelector('.navbar');
    
    // Get the search button
    var searchButton = document.getElementById('search-button');
    
    // Add click event listener to the search button
    searchButton.addEventListener('click', function() {
        // Toggle the 'active' class on the navbar
        navbar.classList.toggle('active');
    });
});
function navigateTo(section) {
    window.location.hash = section;
}
