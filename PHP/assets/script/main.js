const allPostsButton = document.querySelector(".all-posts-button");
const iconAccount = document.querySelector(".icon-account");
const menuOptions = document.querySelector(".menu-options");
const burger = document.querySelector(".burger");
const navbar = document.querySelector('nav');
const hook = document.querySelector('.hook');
const main = document.querySelector('main');
const footer = document.querySelector('footer');
const deskTopBar = document.querySelector('.desktop-bar');
const logoMobile = document.querySelector('.logo-mobile');
const linksNav = document.querySelectorAll('a');




function toggleMenu () {  
  burger.addEventListener('click', (e) => {
    burger.classList.toggle("cross");
    navbar.classList.toggle('show-nav');
    linksNav.forEach(link => link.classList.remove('slide-line') );
    logoMobile.classList.toggle('none');
    main.classList.toggle('none');
    footer.classList.toggle('none');
    deskTopBar.classList.toggle('container-nav-mobile');
  });
}
toggleMenu();


iconAccount.addEventListener("click", (event) => {
  menuOptions.classList.toggle("is-visible");
});