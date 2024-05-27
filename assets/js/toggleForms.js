const authButton = document.getElementById("authButton");
const registerButton = document.getElementById("registerButton");

const authForm = document.querySelector(".auth");
const registerForm = document.querySelector(".register");

authButton.addEventListener("click", (e) => {
    e.preventDefault();
    authForm.classList.remove('d-none');
    registerForm.classList.add('d-none');
});

registerButton.addEventListener("click", (e) => {
    e.preventDefault();
    registerForm.classList.remove('d-none');
    authForm.classList.add('d-none');
});