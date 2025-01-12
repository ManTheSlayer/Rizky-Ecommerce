let sidebar = document.querySelector('.sidebar');
let closeBtn = document.querySelector('#btn');
let logoName = document.querySelector('.logo_name');
let prodBtn = document.querySelector('.prod-btn');
let prodShow = document.querySelector('.prod-show');
let arrow = document.querySelector('.arrow');

closeBtn.addEventListener('click', () => {
  sidebar.classList.toggle('open');
  logoName.classList.toggle('open');
  menuBtnChange(); //calling the function(optional)
});

prodBtn.addEventListener('click', (e) => {
  e.preventDefault();
  prodShow.classList.toggle('show');
  arrow.classList.toggle('rotate');
});

// following are the code to change sidebar button(optional)
function menuBtnChange() {
  if (sidebar.classList.contains('open')) {
    closeBtn.classList.replace('bx-menu', 'bx-menu-alt-right'); //replacing the iocns class
  } else {
    closeBtn.classList.replace('bx-menu-alt-right', 'bx-menu'); //replacing the iocns class
  }
}
