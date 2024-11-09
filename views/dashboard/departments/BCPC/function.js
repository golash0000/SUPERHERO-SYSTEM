const sidebar = document.querySelector('.sidebar-content');
const ps = new PerfectScrollbar(sidebar);

function toggleSubmenu(element) {
    const submenu = element.nextElementSibling;
    const allSubmenus = document.querySelectorAll('.sidebar-submenu');
    const allHeaders = document.querySelectorAll('.sidebar-category-header');

    allSubmenus.forEach(menu => {
        if (menu !== submenu) {
            menu.classList.remove('show');
        }
    });

    allHeaders.forEach(header => {
        if (header !== element) {
            header.classList.remove('active');
        }
    });

    submenu.classList.toggle('show');
    element.classList.toggle('active');
    ps.update();
}

function createRipple(event) {
    const button = event.currentTarget;
    const ripple = document.createElement('span');
    const rect = button.getBoundingClientRect();
    const size = Math.max(rect.width, rect.height);
    const x = event.clientX - rect.left - size / 2;
    const y = event.clientY - rect.top - size / 2;

    ripple.style.width = ripple.style.height = `${size}px`;
    ripple.style.left = `${x}px`;
    ripple.style.top = `${y}px`;
    ripple.classList.add('ripple');

    button.appendChild(ripple);

    ripple.addEventListener('animationend', () => {
        ripple.remove();
    });
}

// Sub-menu active function design
document.querySelectorAll('.sidebar-submenu-item').forEach(item => {
    item.addEventListener('mouseenter', createRipple);
});

document.getElementById('confirmSignOutBtn').addEventListener('click', function () {
    // Redirect to signout.php to handle session destruction and redirection
    window.location.href = '../../../../../signout.php';
});

// Sub-menu active function design
document.querySelectorAll('.sidebar-submenu-item').forEach(item => {
    item.addEventListener('mouseenter', createRipple);
});
// Sign-out
document.getElementById('confirmSignOutBtn').addEventListener('click', function () {
    // Redirect to signout.php to handle session destruction and redirection
    window.location.href = '../../../../../signout.php';
});

// function setActive(selectedItem) {
//     // Get all submenu items
//     const submenuItems = document.querySelectorAll('.sidebar-submenu-item');
    
//     // Remove 'active' class from all submenu items
//     submenuItems.forEach(item => {
//         item.classList.remove('active');
//     });

//     // Add 'active' class to the clicked submenu item
//     selectedItem.classList.add('active');
// }
// // Link opener with div
// const linkContainer = document.querySelector('.sidebar-submenu-item');

// // Add a click event listener to the div
// linkContainer.addEventListener('click', function(event) {
//     event.stopPropagation();
//     // Find the anchor tag inside the div
//     const link = this.querySelector('.link2');
    
//     // Check if the link exists and navigate to its href
//     if (link) {
//         window.location.href = link.href;
//     }
// });
