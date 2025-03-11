<!-- 404 Error Page -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 Not Found</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            text-align: center;
            padding: 50px;
        }

        .error-icon {
            font-size: 100px;
            color: #dc3545;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="error-icon">&#128577;</h1>
        <h2 class="text-danger">404 - Page Not Found</h2>
        <p>Oops! The page you're looking for doesn't exist. Maybe go back home?</p>
        <a href="{{ route('home') }}" class="btn btn-primary">Return Home</a>
    </div>
</body>

</html>
