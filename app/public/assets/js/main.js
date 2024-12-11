const isMobile = window.matchMedia("(max-width: 768px)").matches;

document.addEventListener("DOMContentLoaded", function () {
    const currentPage = window.location.pathname;
    const navLinks = document.querySelectorAll(".nav-link");

    navLinks.forEach(link => {
        const href = link.getAttribute("href");

        if (href === currentPage) {
            link.classList.add("clicked");
        }
    });
});

if (isMobile) {
    document.querySelectorAll('.dropdown-toggle').forEach(item => {
        item.addEventListener('click', function (e) {
            e.preventDefault();
            const dropdownMenu = this.nextElementSibling;

            if (dropdownMenu.style.display === 'block') {
                dropdownMenu.style.display = 'none';
            } else {
                dropdownMenu.style.display = 'block';
            }
        });
    });
}

document.addEventListener('DOMContentLoaded', () => {
    fetch('api-endpoints/session-endpoint.php')
        .then((response) => response.json())
        .then((data) => {
            const loginButton = document.getElementById('loginButton');
            const logoutButton = document.getElementById('logoutButton');

            if (data.loggedIn) {
                loginButton.classList.add('d-none');
                logoutButton.classList.remove('d-none');
            } else {
                loginButton.classList.remove('d-none');
                logoutButton.classList.add('d-none');
            }
        })
        .catch((error) => console.error('Error fetching session state:', error));
});