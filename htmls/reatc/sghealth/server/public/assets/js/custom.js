window.addEventListener("scroll", function () {
  var a = document.getElementById("header-block");
  var headerHeight = a.clientHeight;
  if (scrollY > headerHeight) {
    a.classList.add("headerBlock");
  } else {
    a.classList.remove("headerBlock");
  }
});