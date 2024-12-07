let hide = document.getElementById("hide");
let password = document.getElementById("password");
hide.onclick = function () {
  if (password.type == "password") {
    password.type = "text";
    hide.src = "assets/show.png";
  } else {
    password.type = "password";
    hide.src = "assets/hide.png";
  }
};

let hidesignup = document.getElementById("hidesignup");
let passwordsignup = document.getElementById("passwordsignup");
hidesignup.onclick = function () {
  if (passwordsignup.type == "password") {
    passwordsignup.type = "text";
    hidesignup.src = "assets/show.png";
  } else {
    passwordsignup.type = "password";
    hidesignup.src = "assets/hide.png";
  }
};

const sign_in_btn = document.querySelector("#sign-in-btn");
const sign_up_btn = document.querySelector("#sign-up-btn");
const container = document.querySelector(".container");

sign_up_btn.addEventListener("click", () => {
  container.classList.add("sign-up-mode");
});

sign_in_btn.addEventListener("click", () => {
  container.classList.remove("sign-up-mode");
});

$("#search-icon").click(function () {
  $(".nav").toggleClass("search");
  $(".nav").toggleClass("no-search");
  $(".search-input").toggleClass("search-active");
});

$(".menu-toggle").click(function () {
  $(".nav").toggleClass("mobile-nav");
  $(this).toggleClass("is-active");
});