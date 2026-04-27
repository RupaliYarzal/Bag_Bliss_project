<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .register-wrapper {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: url('/images/login.jpg') no-repeat center center fixed;
            background-size: cover;
            padding: 40px 15px;
        }

        .register-container {
            background: rgba(255, 255, 255, 0.95);
            padding: 30px;
            border-radius: 10px;
            max-width: 400px;
            width: 100%;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        label {
            display: block;
            font-weight: 600;
            margin-bottom: 5px;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 6px;
            border: 1px solid #ccc;
        }

        .btn {
            width: 100%;
            padding: 10px;
            background-color: #4f46e5;
            color: white;
            font-size: 16px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #4338ca;
        }

        .alert {
            margin-bottom: 16px;
            padding: 10px;
            background: #fee2e2;
            color: #b91c1c;
            border-radius: 6px;
            text-align: center;
        }

        .text-center {
            text-align: center;
        }

        a {
            color: #4f46e5;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .mt-3 {
            margin-top: 1rem;
        }
    </style>
</head>

<body>
    <div class="register-wrapper">
        <div class="register-container">
            <h2>Register</h2>

            @if (session('error'))
                <div class="alert">{{ session('error') }}</div>
            @endif

            @if (session('info'))
                <div class="alert">{{ session('info') }}</div>
            @endif

            <form method="POST" action="{{ url('/register') }}">
                @csrf

                <label>Name</label>
                <input type="text" name="name" class="form-control" required>

                <label>Email</label>
                <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>

                <label>Password</label>
                <input type="password" name="password" class="form-control" required>

                <button type="submit" class="btn">Register</button>

                <p class="text-center mt-3">
                    Already have an account?
                    <a href="{{ url('/login') }}">Login</a>
                </p>
            </form>
        </div>
    </div>
</body>

</html>
