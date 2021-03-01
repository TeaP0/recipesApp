// Creates Responsive Navigation menu
function menuActive() {
    const menu = document.querySelector('.menu');
    const navbar = document.querySelector('.menuLinks');
    menu.addEventListener('click', () => {
      navbar.classList.toggle('activeMenu');
    });
  }
  
export {menuActive};

menuActive();

