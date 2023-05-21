$(document).ready(function ($) {
    function mediaSize() {
        if (window.matchMedia('(max-width: 991px)').matches) {
            $('.hamburger').click(function () {
                $('.ul-sidebar').slideToggle('slow');
            });
            $('.close-it').click(function () {
                $('.ul-sidebar').slideUp("slow");
            });
        }
    };
    /* Call the function */
    mediaSize();
    /* Attach the function to the resize event listener */
    window.addEventListener('resize', mediaSize, false);

})

$(".hamburger").click(function (e) {
    e.preventDefault();
    $(".sidebar").toggleClass("expanded");
    $(".main-content").toggleClass("sidebar-expanded");
});

(() => {
    'use strict'
    const tooltipTriggerList = Array.from(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    tooltipTriggerList.forEach(tooltipTriggerEl => {
        new bootstrap.Tooltip(tooltipTriggerEl)
    })
})()

var tableRow = document.getElementById('clickable-row');

// Add a click event listener to the table row
tableRow.addEventListener('click', function () {
    window.location.href = '#';
});

