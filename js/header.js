document.addEventListener('DOMContentLoaded', function () {
    const menuIcon = document.querySelector('.mobile_menu_icon');
    const mobileMenuWrapper = document.querySelector('.mobile-menu-wrapper');

    menuIcon.addEventListener('click', function () {
        mobileMenuWrapper.style.display = 'block';
        setTimeout(() => {
            mobileMenuWrapper.querySelector('.mobile-menu').style.left = '0';
        }, 50);
    });

    document.querySelector('.mobile-menu-close').addEventListener('click', function () {
        mobileMenuWrapper.querySelector('.mobile-menu').style.left = '-80%';
        setTimeout(() => {
            mobileMenuWrapper.style.display = 'none';
        }, 300);
    });
});


document.addEventListener('DOMContentLoaded', function () {
    const angleDownIcons = document.querySelectorAll('.has-submenu > a > .ti-angle-down');

    angleDownIcons.forEach(icon => {
        icon.addEventListener('click', function (event) {
            event.preventDefault(); // Prevent default link behavior

            const submenu = this.parentElement.nextElementSibling; // Get the submenu

            // Toggle visibility of the submenu
            if (submenu.style.display === 'block') {
                submenu.style.display = 'none';
            } else {
                submenu.style.display = 'block';
            }
        });
    });
});
