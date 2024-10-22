<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Portal Registration - Brgy Sta. Lucia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="../../custom/css/index.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&display=swap" rel="stylesheet">
    <link rel="icon" href="../../dist/images/favicon.ico" type="image/x-icon">
    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="Portal Registration - Brgy Sta. Lucia">
    <meta property="og:description" content="Still in development phase.">
    <meta property="og:image" content="URL_to_your_image.jpg">
    <meta property="og:url" content="https://yourwebsite.com">
    <meta property="og:type" content="website">

    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Portal Registration - Brgy Sta. Lucia">
    <meta name="twitter:description" content="Still in development phase.">
    <meta name="twitter:image" content="URL_to_your_image.jpg">
    <meta name="twitter:url" content="https://yourwebsite.com">
</head>

<body>
    <div id="app">
    <section id="login-container" class="d-flex align-items-center justify-content-center vh-100">
        <div class="login-wrapper">
            <div class="login-header">
                <h1 class="text-dark">Sign Up</h1>
                <p class="text-muted">New User? Provide all input fields we need.</p>
            </div>
            <form id="signup-form" method="POST" action="process.php" onsubmit="return validateForm()">
                <div class="mb-2">
                    <label for="first_name" class="form-label">First name</label>
                    <input type="text" class="form-control" id="first_name" name="first_name" value="<?php echo isset($_SESSION['first_name']) ? $_SESSION['first_name'] : ''; ?>" required>
                </div>
                <div class="mb-2">
                    <label for="last_name" class="form-label">Last name</label>
                    <input type="text" class="form-control" id="last_name" name="last_name" value="<?php echo isset($_SESSION['last_name']) ? $_SESSION['last_name'] : ''; ?>" required>
                </div>
                <div class="mb-4">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : ''; ?>" required>
                </div>
                <button type="submit" class="btn btn-danger w-100 mb-3" id="register-button">Proceed</button>
                <button type="button" class="btn btn-light w-100" id="signInButton" data-bs-toggle="modal" data-bs-target="#confirmModal">Sign In</button>
            </form>

            <!-- Confirmation Modal -->
            <div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="confirmModalLabel">Confirmation</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Are you sure you want to go back to the Sign In page? Any unsaved data will be lost.
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <form method="POST" action="clear_session.php">
                                <button type="submit" class="btn btn-danger">Confirm</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- Button to Trigger Modal -->
    <!-- <div class="principal-author">
        <button type="button" class="btn btn-link" data-bs-toggle="modal" data-bs-target="#loadingModal">
            Try this out.
        </button>
    </div>

    <div class="modal fade" id="loadingModal" tabindex="-1" aria-labelledby="loadingModalLabel" aria-hidden="true" data-bs-backdrop="static">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body d-flex justify-content-center align-items-center" style="height: 200px;">
                    <div class="spinner-border text-danger" style="width: 3rem; height: 3rem;" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>
            </div>
        </div>
    </div> -->


    <!-- This website is not mobile friendly ^^ -->
    <!-- <div class="d-md-none d-none vh-100 d-flex align-items-center justify-content-center" id="desktop-message">
            <span>This website is not yet mobile-friendly.</span>
        </div> -->

        <!-- The elligible rights to authorize software usage is limited -->
        <!-- <div class="principal-author">
            <span>This property are part of belongings to Brgy. Sta Lucia</span>
        </div>
    </div>-->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

    <script>
        // Attach event listener to restrict input to letters for the first and last name fields
        document.getElementById('first_name').addEventListener('input', filterInput);
        document.getElementById('last_name').addEventListener('input', filterInput);

        // Validation function that runs on form submission
        function validateForm() {
            const firstName = document.getElementById('first_name').value.trim();
            const lastName = document.getElementById('last_name').value.trim();
            const email = document.getElementById('email').value.trim();

            // Simple regex for email validation
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

            // Check for empty fields
            if (firstName === '' || lastName === '' || email === '') {
                alert('Please fill out all input fields before proceeding.');
                return false;  // Prevent form submission
            }

            // Validate first name (minimum 2 characters)
            if (firstName.length < 2) {
                alert('First name must contain at least 2 letters.');
                return false;  // Prevent form submission
            }

            // Validate last name (minimum 2 characters)
            if (lastName.length < 2) {
                alert('Last name must contain at least 2 letters.');
                return false;  // Prevent form submission
            }

            // Validate email format
            if (!emailRegex.test(email)) {
                alert('Please enter a valid email address.');
                return false;  // Prevent form submission
            }

            return true;  // Proceed with form submission
        }

        // Function to filter input to letters only
        function filterInput(event) {
            const regex = /[^A-Za-z]/g;
            if (regex.test(event.target.value)) {
                event.target.value = event.target.value.replace(regex, '');
            }
        }

        // Add event listener to Sign In button
        document.getElementById('signInButton').addEventListener('click', function() {
            var firstName = document.getElementById('first_name').value;
            var lastName = document.getElementById('last_name').value;
            var email = document.getElementById('email').value;

            // Check if all fields are empty
            if (firstName === '' && lastName === '' && email === '') {
                window.location.href = '../../';
            } else {
                // If at least one field is filled, show the modal
                var modal = new bootstrap.Modal(document.getElementById('confirmModal'), {
                    backdrop: false // Disable the background overlay
                });
                modal.show();
            }
        });
    </script>

</body>

</html>
