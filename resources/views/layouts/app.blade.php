<!DOCTYPE html>
<html>
<head>
    <!-- Include your CSS and other head elements here -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="">Home</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">Login</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

@yield('content')

<!-- Include your JavaScript and other scripts here -->
</body>
</html>
