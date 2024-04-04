


document.addEventListener("DOMContentLoaded", function () {
  var header = document.querySelector("header");
  var menuItems = document.getElementsByClassName("menuItem");
  var menu = document.getElementById("menu");
  var button = document.getElementById("burger");

  button.addEventListener("click", function () {
    header.classList.toggle("open");
  });

  for (var i = 0; i < menuItems.length; i++) {
    menuItems[i].addEventListener("click", function () {
      console.log("sss");
      header.classList.remove("open");
    });
  }

  document.addEventListener("click", function (event) {
    var isClickInsideMenu = menu.contains(event.target);
    var isClickedButton = button.contains(event.target);

    if (!isClickInsideMenu && !isClickedButton) {
      header.classList.remove("open");
    }
  });
});
