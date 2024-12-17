document.addEventListener('DOMContentLoaded', () => {
    const loginForm = document.getElementById('loginForm');
    const signUpForm = document.getElementById('signUpForm');
    const showSignUpButton = document.getElementById('showSignUpButton');
    const showLoginButton = document.getElementById('showLoginButton');

    showSignUpButton.addEventListener('click', () => {
        loginForm.classList.add('d-none');
        signUpForm.classList.remove('d-none');
    });

    showLoginButton.addEventListener('click', () => {
        signUpForm.classList.add('d-none');
        loginForm.classList.remove('d-none');
    });
});

async function getApiKey() {
    return await fetch('includes/config.php')
        .then((response) => {
            if (!response.ok) {
                throw new Error('Failed to load configuration');
            }
            return response.json();
        })
        .then((data) => {
            if (data.googleApiKey) {
                return data.googleApiKey;
            } else {
                throw new Error('API key not found in response');
            }
        })
        .catch((error) => {
            console.error('Error fetching API key:', error);
            throw error;
        });
}

document.addEventListener('DOMContentLoaded', () => {
    getApiKey()
        .then((apiKey) => {
            google.accounts.id.initialize({
                client_id: apiKey,
                callback: handleCredentialResponse,
            });

            google.accounts.id.renderButton(
                document.getElementById('gSignIn'),
                {
                    theme: 'outline',
                    size: 'large',
                }
            );
        });
});

async function handleCredentialResponse(response) {
    await fetch('includes/google-login.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ credential: response.credential }),
    })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                if (data.requires2FA) {
                    window.location.href = data.redirectUrl;
                } else {
                    window.location.href = '/';
                }
            } else {
                console.error('Authentication failed:', data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
}