<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }} | Log in</title>
    <link rel="icon" href="{{ asset('images/favicon.ico') }}">
    <link href="{{ asset('css/yeti-bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            background: url('{{ asset('images/photo1.JPG') }}') no-repeat center center fixed;
            background-size: cover;
            font-family: 'Roboto', sans-serif;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
        }

        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(10px);
            z-index: 1;
        }

        .card {
            background: rgba(255, 255, 255, 0.3);
            border: none;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
            z-index: 2; /* Ensure it is above the overlay */
        }

        .card-header {
            color: rgba(255, 255, 255, 0.85);
            text-align: center;
            padding: 20px;
        }

        .form-control {
            border-radius: 30px;
            padding: 10px 20px;
            background-color: rgba(255, 255, 255, 0.5);
            border: none;
        }

        .form-control::placeholder {
            color: rgba(0, 0, 0, 0.5);
        }

        .btn-primary {
            border-radius: 30px;
            padding: 10px 20px;
            background: #007bff;
            border: none;
        }

        .btn-primary:hover {
            background: #0056b3;
        }
    </style>
</head>

<body>
    <div class="overlay"></div> <!-- Overlay element -->
    <div class="card">
        <div class="card-header">
            <strong>Sign In</strong>
        </div>
        <div class="card-body">
            {{ show_error($errors) }}
            <form action="{{ route('login.action') }}" method="post">
                {{ csrf_field() }}
                <div class="input-group mb-3">
                    <input type="text" class="form-control form-control-lg" placeholder="Username" name="username">
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control form-control-lg" placeholder="Password" name="password">
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-lg btn-primary">Login</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
