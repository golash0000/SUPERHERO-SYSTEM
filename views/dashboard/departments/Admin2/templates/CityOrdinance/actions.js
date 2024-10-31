const row = document.querySelector('.row');

document.addEventListener('DOMContentLoaded', () => {
    for(let i = 0; i < 15; i++){
        row.innerHTML += `
            <div class="col">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Anti-Smoking Ordinance</h5>
                  <p class="card-text">ORDINANCE CONTENT</p>
                  <img
                    src="../../assets/images/nosmoke.png"
                    class="card-img-overlay"
                    alt=""
                  />
                </div>
              </div>
            </div>
            `;
    }
});