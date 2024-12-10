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

function getApiKey() {
    return fetch('includes/config.php') // Adjust the path to your backend endpoint
        .then((response) => {
            if (!response.ok) {
                throw new Error('Failed to load configuration');
            }
            return response.json();
        })
        .then((data) => {
            if (data.googleApiKey) {
                return data.googleApiKey; // Return the API key
            } else {
                throw new Error('API key not found in response');
            }
        })
        .catch((error) => {
            console.error('Error fetching API key:', error);
            throw error; // Re-throw the error for handling by the caller
        });
}

document.addEventListener('DOMContentLoaded', () => {
    getApiKey()
        .then((apiKey) => {
            google.accounts.id.initialize({
                client_id: apiKey, // Replace with your actual Client ID
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

function handleCredentialResponse(response) {
    // Send the credential to the server
    fetch('includes/google-login.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ credential: response.credential }),
    })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                // Redirect to the homepage after successful login
                window.location.href = '/';
            } else {
                console.error('Authentication failed:', data.message);
                // Optionally display an error message to the user
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
}