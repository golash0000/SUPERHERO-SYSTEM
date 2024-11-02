
// ito naman yung sa rendering ng side bar  
// Function para i-toggle ang display ng submenu
function toggleSubMenu() {
    const submenu = document.querySelector(".sidebar-submenu-show");
    submenu.style.display = submenu.style.display === "none" || submenu.style.display === "" ? "block" : "none";
}

// ito naman para ipakita ang specific section
function showSection(sectionId) {
   
    document.querySelectorAll("section").forEach(section => {
        section.style.display = "none"; 
    });
    
    
    const sectionToShow = document.getElementById(sectionId);
    if (sectionToShow) {
        sectionToShow.style.display = "block";
    }
}

window.onload = function() {
    showSection('dasboardsection');
};





// Complaint pag filter ng table 
let selectedCategory = "";

function selectCategory(category) {
    selectedCategory = category;
    filterTable();
   
document.getElementById("dropdownButton").innerText = selectedCategory || "Category";
}

function filterTable() {
const searchInput = document.getElementById("search-input").value.toLowerCase();
const table = document.getElementById("tablecase");
const rows = table.getElementsByTagName("tr");

console.log('Search Input:', searchInput);
console.log('Selected Category:', selectedCategory);

for (let i = 1; i < rows.length; i++) {
 const cells = rows[i].getElementsByTagName("td");
 const caseNumber = rows[i].getElementsByTagName("th")[0].textContent || "";
 const complaint = cells[0].textContent || "";
 const respondent = cells[1].textContent || "";
 const status = cells[3].textContent || "";
 const natureOfCase = cells[4].textContent || "";

    const matchesSearch = caseNumber.toLowerCase().includes(searchInput) ||
    complaint.toLowerCase().includes(searchInput) ||
    respondent.toLowerCase().includes(searchInput) ||
        status.toLowerCase().includes(searchInput);
        const matchesCategory = !selectedCategory || natureOfCase === selectedCategory;
        if (matchesSearch && matchesCategory) {
            rows[i].style.display = "";
        } else {
            rows[i].style.display = "none";
        }
    }
}
