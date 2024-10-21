<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Brgy. Sta Lucia's Portal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="./dist/css/index.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&display=swap" rel="stylesheet">
    <link rel="icon" href="./dist/images/favicon.ico" type="image/x-icon">
    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="Brgy. Sta Lucia's Portal">
    <meta property="og:description" content="Your description here for the portal.">
    <meta property="og:image" content="URL_to_your_image.jpg">
    <meta property="og:url" content="https://yourwebsite.com">
    <meta property="og:type" content="website">

    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Brgy. Sta Lucia's Portal">
    <meta name="twitter:description" content="Your description here for the portal.">
    <meta name="twitter:image" content="URL_to_your_image.jpg">
    <meta name="twitter:url" content="https://yourwebsite.com">
</head>

<body>
    <div id="app">
        <section id="login-container" class="d-none d-md-flex align-items-center justify-content-center vh-100">
            <div class="login-wrapper">
                <div class="login-header">
                    <h1 class="text-dark">Sign In</h1>
                    <p class="text-muted">Enter your credentials.</p>
                </div>
                <form method="get">
                    <div class="mb-2">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" required>
                    </div>
                    <button type="submit" class="btn btn-danger w-100 mb-3">Login</button>
                    <a href="./views/registration/signup.php" class="btn btn-light w-100">Sign Up</a>
                </form>
            </div>
        </section>

        <!-- Button to trigger the modal -->
        <div class="principal-author">
            <button type="button" class="btn btn-link" data-bs-toggle="modal" data-bs-target="#infoModal">
                Try this out.
            </button>
        </div>
        
        <!-- Modal Structure -->
        <div class="modal fade" id="infoModal" tabindex="-1" aria-labelledby="infoModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="infoModalLabel">Test Credentials</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" style="list-style-type: none;">
                        <li>Email address: test@testuser.com</li>
                        <li>Password: iamadmin</li>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>
        <script>
            // This website is not yet mobile-friendly :)
            // function toggleDisplay() {
            //     const loginContainer = document.getElementById('login-container');
            //     const desktopMessage = document.getElementById('desktop-message');

            //     if (window.innerWidth < 920) {
            //         loginContainer.classList.add('d-none');
            //         desktopMessage.classList.remove('d-none');
            //     } else {
            //         loginContainer.classList.remove('d-none');
            //         desktopMessage.classList.add('d-none');
            //     }
            // }


            // toggleDisplay();
            // window.addEventListener('resize', toggleDisplay);
        </script>
</body>

</html>