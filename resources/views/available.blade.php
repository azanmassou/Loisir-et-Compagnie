<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <div class="container">
        <h2>Inscription</h2>
        <form id="registerForm">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
                <div class="invalid-feedback" id="nameFeedback"></div>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
                <div class="invalid-feedback" id="emailFeedback"></div>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
                <div class="invalid-feedback" id="passwordFeedback"></div>
            </div>
            <button type="submit" class="btn btn-primary">Register</button>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const form = document.getElementById('registerForm');
            const nameInput = document.getElementById('name');
            const emailInput = document.getElementById('email');
            const passwordInput = document.getElementById('password');

            nameInput.addEventListener('input', validateInput);
            emailInput.addEventListener('input', validateInput);
            passwordInput.addEventListener('input', validateInput);

            form.addEventListener('submit', async function (event) {
                event.preventDefault();

                const formData = new FormData(form);
                const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                try {
                    const response = await fetch('{{ route('register') }}', {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': csrfToken,
                            'Accept': 'application/json',
                        },
                        body: formData
                    });

                    const result = await response.json();

                    if (response.ok) {
                        alert('Registration successful!');
                    } else {
                        handleValidationErrors(result.errors);
                    }
                } catch (error) {
                    console.error('Error:', error);
                }
            });

            async function validateInput(event) {
                const inputName = event.target.name;
                const inputValue = event.target.value;

                const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                try {
                    const response = await fetch(`/validate-${inputName}`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': csrfToken
                        },
                        body: JSON.stringify({ [inputName]: inputValue })
                    });

                    const result = await response.json();

                    if (response.ok) {
                        event.target.classList.remove('is-invalid');
                        event.target.classList.add('is-valid');
                        document.getElementById(`${inputName}Feedback`).textContent = '';
                    } else {
                        event.target.classList.remove('is-valid');
                        event.target.classList.add('is-invalid');
                        document.getElementById(`${inputName}Feedback`).textContent = result.errors[inputName][0];
                    }
                } catch (error) {
                    console.error('Error:', error);
                }
            }

            function handleValidationErrors(errors) {
                Object.keys(errors).forEach(function (key) {
                    const input = document.getElementById(key);
                    input.classList.add('is-invalid');
                    document.getElementById(`${key}Feedback`).textContent = errors[key][0];
                });
            }
        });
    </script>
</body>
</html>
