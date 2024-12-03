document.addEventListener('DOMContentLoaded', () => {
    const loginForm = document.getElementById('loginForm');
    const signUpForm = document.getElementById('signUpForm');
    const signUpButton = document.getElementById('signUpButton');
    const loginButton = document.getElementById('loginButton');

    signUpButton.addEventListener('click', () => {
        loginForm.classList.add('d-none');
        signUpForm.classList.remove('d-none');
    });

    loginButton.addEventListener('click', () => {
        signUpForm.classList.add('d-none');
        loginForm.classList.remove('d-none');
    });
});