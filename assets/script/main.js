const allPostsButton = document.querySelector(".all-posts-button");

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
