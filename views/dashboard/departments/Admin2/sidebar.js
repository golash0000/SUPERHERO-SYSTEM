const header = document.querySelector(".header");

if (header) {
  header.innerHTML = `
    <nav class="sidebar">
            <div class="sidebar-content">
                <div class="sidebar-header">Brgy. Sta. Lucia</div>

                <div class="sidebar-category">
                    <div class="sidebar-category-header">
                        <span><i class="fas fa-money-bill-wave category-icon"></i>Administrator 2</span>
                        <i class="fas fa-chevron-down toggle-icon"></i>
                    </div>
                    <div class="sidebar-submenu-show">
                        <div class="sidebar-submenu-item dashboard">DASHBOARD</div>
                        <div class="sidebar-submenu-item CityOrdinance">CITY ORDINANCE</div>
                        <div class="sidebar-submenu-item request">REQUEST</div>
                        <div class="sidebar-submenu-item template">TEMPLATES</div>
                    </div>
                </div>
                <div class="sidebar-category">
                    <div class="sidebar-category-header">
                        <span><i class="fa-solid fa-id-card category-icon"></i>User Profile</span>
                    </div>
                </div>

                <div class="sidebar-category">
                    <div class="sidebar-category-header" data-bs-toggle="modal" data-bs-target="#signOutModal">
                        <span><i class="fa-solid fa-door-open category-icon"></i>Sign Out</span>
                    </div>
                </div>

        </nav>
    `;
}
//custom navigation hehe d kasi naka A tag
document.addEventListener("click", (e) => {
  if (e.target.classList.contains("dashboard")) {
    window.location.href =
      "/SUPERHERO-SYSTEM/SUPERHERO-SYSTEM/views/dashboard/departments/Admin2/templates/dashboard/dashboard.twig";
  } else if (e.target.classList.contains("CityOrdinance")) {
    window.location.pathname =
      "/SUPERHERO-SYSTEM/SUPERHERO-SYSTEM/views/dashboard/departments/Admin2/templates/CityOrdinance/CityOrdinance.twig";
  } else if (e.target.classList.contains("request")) {
    window.location.pathname =
      "/SUPERHERO-SYSTEM/SUPERHERO-SYSTEM/views/dashboard/departments/Admin2/templates/Request/Request.twig";
  } else if (e.target.classList.contains("template")) {
    window.location.pathname =
      "/SUPERHERO-SYSTEM/SUPERHERO-SYSTEM/views/dashboard/departments/Admin2/templates/DocumentTemplate/Template.twig";
  }
});
