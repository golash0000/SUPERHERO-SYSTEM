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
            <div class="dropdown">
              <div class="sidebar-submenu-item dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Committees</div>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item sidebar-submenu-item" style = "width: 280px !important" href="#">Committee Of Health</a></li>
                <li><a class="dropdown-item sidebar-submenu-item" href="#">Committee Of Love</a></li>
                <li><a class="dropdown-item sidebar-submenu-item" href="#">Committee Of Round Table</a></li>
              </ul>
            </div>
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
      </div>
    </nav>
  `;
}

// Custom navigation
document.addEventListener("click", (e) => {
  if (e.target.classList.contains("dashboard")) {
    window.location.href =
      "/views/dashboard/departments/Admin2/templates/dashboard/dashboard.twig";
  } else if (e.target.classList.contains("CityOrdinance")) {
    window.location.pathname =
      "/views/dashboard/departments/Admin2/templates/CityOrdinance/CityOrdinance.twig";
  } else if (e.target.classList.contains("request")) {
    window.location.pathname =
      "/SUPERHERO-SYSTEM/views/dashboard/departments/Admin2/templates/Request/Request.twig";
  } else if (e.target.classList.contains("template")) {
    window.location.pathname =
      "/views/dashboard/departments/Admin2/templates/DocumentTemplate/Template.twig";
  }
});

document.addEventListener("DOMContentLoaded", () => {
  const currentPath = window.location.pathname;
  if (currentPath.includes("/dashboard.twig")) {
    document.querySelector(".dashboard").style.color = "#d40303";
    document.querySelector(".dashboard").style.backgroundColor = "#e7f1ff";
  } else if (currentPath.includes("/CityOrdinance.twig")) {
    document.querySelector(".CityOrdinance").style.color = "#d40303";
    document.querySelector(".CityOrdinance").style.backgroundColor = "#e7f1ff";
  } else if (currentPath.includes("/Request.twig")) {
    document.querySelector(".request").style.backgroundColor = "#e7f1ff";
    document.querySelector(".request").style.color = "#d40303";
  } else if (currentPath.includes("/Template.twig")) {
    document.querySelector(".template").style.backgroundColor = "#e7f1ff";
    document.querySelector(".template").style.color = "#d40303";
  }
});
