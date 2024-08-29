// Wait for the DOM to be fully loaded before executing the code
document.addEventListener('DOMContentLoaded', function(){
    // Add an event listener to detect window scrolling
    window.addEventListener("scroll", function(){
        // Select the header element
        var header = document.querySelector("header");
        // Toggle (add or remove) the 'down' class to the header based on whether the vertical offset is greater than 0
        header.classList.toggle('down', window.scrollY > 0);
    });

    // Select menu items and buttons
    var menu = document.querySelector('.menu');
    var menuBtn = document.querySelector('.menu-btn');
    var closeBtn = document.querySelector('.close-btn');
    
    // Add an event listener to open the menu when the menu button is clicked
    menuBtn.addEventListener("click", () => {
        menu.classList.add('active');
    });
    
    // Add an event listener to close the menu when the close button is clicked
    closeBtn.addEventListener("click", () => {
        menu.classList.remove('active');
    });
});
