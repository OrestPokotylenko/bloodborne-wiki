document.addEventListener('DOMContentLoaded', () => {
    const userTimezone = Intl.DateTimeFormat().resolvedOptions().timeZone;

    fetch('/includes/session/session-timezone.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ timezone: userTimezone }),
    })
    .then((response) => {
        if (!response.ok) {
            throw new Error('Failed to send timezone');
        }
        return response.json();
    })
    .catch((error) => {
        console.error('Error:', error);
    });
});

const isMobile = window.matchMedia("(max-width: 768px)").matches;

document.addEventListener("DOMContentLoaded", function () {
    const currentPage = window.location.pathname;
    const navLinks = document.querySelectorAll(".nav-link");

    navLinks.forEach(link => {
        const href = link.getAttribute("href");

        if (href === currentPage) {
            link.classList.add("clicked");
        }
        else if (currentPage === "/two-factor-login" && href === "/login") {
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
    fetch('/includes/session/session-loggedin.php')
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

document.addEventListener('DOMContentLoaded', () => {
    const emailSubscriptionInput = document.getElementById('emailSubscriptionInput');
    const emailSubscriptionButton = document.getElementById('emailSubscriptionButton');

    emailSubscriptionButton.addEventListener('click', async () => {
        let email = emailSubscriptionInput.value;
        emailSubscriptionInput.value = '';

        try {
            if (email) {
                const response = await fetch('/api/post-subscription', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({ email })
                });

                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }
            } else {
                alert('Please enter an email address to subscribe.');
            }
        } catch (error) {
            console.error('Error creating subscription:', error);
            alert('Something went wrong. Please try again.');
        }
    });
});