function toggleSubMenu() {
    const submenu = document.querySelector(".sidebar-submenu-show");
    submenu.style.display = submenu.style.display === "none" || submenu.style.display === "" ? "block" : "none";
}
// ito naman para ipakita ang specific section
function showSection(sectionId) { document.querySelectorAll("section").forEach(section => { section.style.display = "none";  });
const sectionToShow = document.getElementById(sectionId);
    if (sectionToShow) {
        sectionToShow.style.display = "block";}}
window.onload = function() {
    showSection('dasboardsection');};
window.onload = function() {
    if (window.location.hash === '#complaintsection') {
        document.getElementById('complaintsection').style.display = 'block';
    }
};
// Complaint pag filter ng table 

let selectedCategory = 'All'; 
 function selectCategory(category) {  selectedCategory = category; document.getElementById("dropdownButton").textContent = category;
        filterTable(); 
    } function filterTable() { const searchInput = document.getElementById("search-input") ? document.getElementById("search-input").value.toLowerCase() : "";
    const table = document.getElementById("tablecase");
    const rows = table.getElementsByTagName("tr");
        for (let i = 1; i < rows.length; i++) {
        const cells = rows[i].getElementsByTagName("td");
        const caseCategory = cells[2] ? cells[2].textContent : ""; 
        const matchesCategory = (caseCategory === selectedCategory || selectedCategory === 'All');
         const matchesSearch = searchInput === "" || rows[i].textContent.toLowerCase().includes(searchInput);
        rows[i].style.display = matchesCategory && matchesSearch ? "" : "none";}}

 // Pag gawa ng bagong textbox para sa complainant 
function addComplainant() {
    const container = document.getElementById('complainant-container');
    
    const nameInput = document.createElement('input');
    nameInput.type = 'text';
    nameInput.placeholder = 'Name';
    nameInput.style.cssText = 'padding: 15px; font-size: 20px; height: 50px; width: 400px; border-radius: 3px; border: 1px solid #d4d4d4; background-color: #ffffff; display: block; margin-bottom: 10px;';

   
    const addressInput = document.createElement('input');
    addressInput.type = 'text';
    addressInput.placeholder = 'Address';
    addressInput.style.cssText = 'padding: 13px; font-size: 20px; height: 50px; width: 400px; border-radius: 3px; border: 1px solid #d4d4d4; background-color: #ffffff; display: block; margin-bottom: 10px;';

   
    container.appendChild(nameInput);
    container.appendChild(addressInput);

   
    const button = document.getElementById('add-button');
    const totalInputs = container.children.length;
    button.style.top = (100 + totalInputs * 60) + 'px'; 
}

//  add button para sa Respondent
function addComplainant() {
    const container = document.getElementById('complainant-container');
    const newComplainant = `
        <input type="text" name="complainant_name[]" placeholder="Name" style="padding: 15px; font-size: 1rem; height: 50px; width: 100%; max-width: 400px; border-radius: 3px; border: 1px solid #d4d4d4; background-color: #ffffff;">
        <input type="text" name="complainant_address[]" placeholder="Address" style="padding: 15px; font-size: 1rem; height: 50px; width: 100%; max-width: 400px; border-radius: 3px; border: 1px solid #d4d4d4; background-color: #ffffff;">
    `;
    container.insertAdjacentHTML('beforeend', newComplainant);
}

function addRespondent() {
    const container = document.getElementById('respondent-container');
    const newRespondent = `
        <input type="text" name="respondent_name[]" placeholder="Name" style="padding: 15px; font-size: 1rem; height: 50px; width: 100%; max-width: 400px; border-radius: 3px; border: 1px solid #d4d4d4; background-color: #ffffff;">
        <input type="text" name="respondent_address[]" placeholder="Address" style="padding: 15px; font-size: 1rem; height: 50px; width: 100%; max-width: 400px; border-radius: 3px; border: 1px solid #d4d4d4; background-color: #ffffff;">
    `;
    container.insertAdjacentHTML('beforeend', newRespondent);
}
// dropdown ng button
function updateButtonText(text, buttonId, event) {
    const button = document.getElementById(buttonId);
    button.textContent = text; 
    if (buttonId === 'specialcasedrop') {
        document.getElementById('hiddenSpecialCase').value = text; 
    } else if (buttonId === 'dropdowncategory') {
        document.getElementById('hiddenCategory').value = text;
    }
}
// pag generate ng case number
document.getElementById("openModalButton").onclick = function() {
    document.getElementById("report-create").style.display = "block";
};
document.querySelector(".close-btn").onclick = function() {
    document.getElementById("report-create").style.display = "none";
};
window.onclick = function(event) {
    const modal = document.getElementById("report-create");
    if (event.target == modal) {
        modal.style.display = "none";
    }
};




