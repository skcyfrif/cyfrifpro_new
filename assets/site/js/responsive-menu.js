$(document).ready(function() {
    var hamburgerMenu = $('#hamburger');
    var mainMenu = $('.main-menu');
    var mainMenuItems = $('.main-menu-items');
    var mainMenuItem = $('.main-menu-item a');
    var subMenu = $('.sub-menu');
    var subMenuItem = $('.sub-menu-item a');
    var subMenuCloseIcon = $('.sub-menu-close-icon');

    // Open and close main navigation menu
    hamburgerMenu.click(function() {
        $(this).toggleClass('open');
        mainMenu.toggleClass('main-menu-open');
        mainMenuItems.toggleClass('hidden');
    });


    // Add an "arrow" to main menu items that have a sub menu.
    (function addMenuArrow() {
        mainMenuItem.each(function() {
            if ($(this).parent('li').children('ul').length > 0) {
                $(this).append('<span class="main-menu-item-arrow right"> > </span>');
            }
        });
    })();


    // Open sub menu
    mainMenuItem.click(function() {
        if ($(this).parent('li').children('ul').length > 0) {
            $(this).parent('li').children('ul').addClass('sub-menu-open');
        }
    });

    // Close sub menu by clicking on "X"
    subMenuCloseIcon.click(function() {
        subMenu.each(function() {
            $(this).removeClass('sub-menu-open');
        })
    });

    // Open/Close sub menu dropdown
    subMenuItem.click(function() {
        if ($(this).parent('li').children('ul').length > 0) {
            $(this).parent('li').children('ul').toggleClass('sub-menu-dropdown-open');

        }
    })

});