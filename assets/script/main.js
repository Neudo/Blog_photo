const allPostsButton = document.querySelector(".all-posts-button");
const iconAccount = document.querySelector(".icon-account");
const menuOptions = document.querySelector(".menu-options");

allPostsButton.addEventListener("mouseover", function (e) {
  const x = e.clientX - e.target.offsetLeft;
  const y = e.clientY - e.target.offsetTop;
  console.log("boutton survolé !!");

  const ripples = document.createElement("aside");
  ripples.style.left = x + "px";
  ripples.style.top = y + "px";
  this.appendChild(ripples);

  // setTimeout(() => {
  //   ripples.remove();
  // }, 1000);
});

iconAccount.addEventListener("click", (event) => {
  menuOptions.classList.toggle("is-visible");
});