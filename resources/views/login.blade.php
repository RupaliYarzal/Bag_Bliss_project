<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body {
            background: url('/images/login1.jpg') no-repeat center center fixed;
            background-size: cover;

            color: #333;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .login-container {
            max-width: 400px;
            margin: 80px auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            margin-top: 200px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 6px;
            font-weight: bold;
            color: #444;
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 16px;
            border-radius: 6px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #4f46e5;
            border: none;
            color: white;
            font-size: 16px;
            border-radius: 6px;
            cursor: pointer;
        }

        button:hover {
            background-color: #4338ca;
        }

        .alert {
            margin-bottom: 16px;
            padding: 10px;
            background: #fee2e2;
            color: #b91c1c;
            border-radius: 6px;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <h2>Login</h2>

        <div class="container mt-4">
            @if (session('success') || session('error'))
                <script>
                    @if (session('success'))
                        alert("{{ session('success') }}");
                    @endif

                    @if (session('error'))
                        alert("{{ session('error') }}");
                    @endif
                </script>
            @endif
        </div>


        <form method="POST" action="{{ url('/login') }}">
            @csrf
            <div>
                <label>Email:</label>
                <input type="email" name="email" required />
            </div>

            <div>
                <label>Password:</label>
                <input type="password" name="password" required />
            </div>

            <button type="submit">Login</button>
        </form>
    </div>

</body>

</html>
