const row = document.querySelector(".row");
const saveOrdinance = document.querySelector("#confirmAddOrdinanceBtn");
const ordinanceArr = [];

const getOrdinance = () => {
  for (let i = 1; i < localStorage.length; i++) {
    const ordinance = JSON.parse(localStorage.getItem(`ordinance${i}`));
    if (ordinance) {
      ordinanceArr.push(ordinance);
    }
  }
};
getOrdinance();

let idCount = ordinanceArr.length + 1;

saveOrdinance.addEventListener("click", () => {
  const ordinanceTitle = document.querySelector("#ordinanceTitle").value;
  const ordinanceDescription = document.querySelector(
    "#ordinanceDescription"
  ).value;
  const ordinanceDate = document.querySelector("#ordinanceDate").value;
  const ordinanceImage = document.querySelector("#ordinanceImage");
  if (ordinanceImage && ordinanceImage.files && ordinanceImage.files[0]) {
    const reader = new FileReader();
    reader.onload = function (e) {
      const img = new Image();
      img.onload = function () {
        const imageData = getBase64Image(img);
        const ordinance = {
          id: idCount,
          title: ordinanceTitle,
          description: ordinanceDescription,
          date: ordinanceDate,
          image: imageData,
        };
        localStorage.setItem(`ordinance${idCount}`, JSON.stringify(ordinance));
        window.location.reload();
      };
      img.src = e.target.result;
    };
    reader.readAsDataURL(ordinanceImage.files[0]);
  } else {
    console.error("Invalid image file.");
  }
});

const renderOrdinance = () => {
  row.innerHTML = ""; // Clear existing content
  if (ordinanceArr.length === 0) {
    row.innerHTML = "<h1>No Ordinance</h1>";
  }
  ordinanceArr.forEach((ordinance) => {
    row.innerHTML += `
       <div class="col">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">${ordinance.title}</h5>
                  <p class="card-text">${ordinance.date}</p>
                  <img class="card-img-overlay" src="data:image/png;base64,${ordinance.image}" alt="Card image cap">
                </div>
              </div>
            </div>
    `;
  });
};
function getBase64Image(img) {
  const canvas = document.createElement("canvas");
  canvas.width = img.width;
  canvas.height = img.height;

  const ctx = canvas.getContext("2d");
  ctx.drawImage(img, 0, 0);

  const dataURL = canvas.toDataURL("image/png");
  return dataURL.replace(/^data:image\/(png|jpg);base64,/, "");
}
renderOrdinance();
