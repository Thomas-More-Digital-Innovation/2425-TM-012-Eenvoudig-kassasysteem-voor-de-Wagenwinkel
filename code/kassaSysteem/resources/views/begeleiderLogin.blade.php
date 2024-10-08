<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #89CFF0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background-color: white;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 600px;
        }

        .container h1 {
            font-size: 24px;
            color: #FF6F00;
            margin-bottom: 20px;
        }

        .input-group {
            margin-bottom: 20px;
        }

        label {
            font-size: 18px;
            color: black;
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="password"] {
            width: 500px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        .error {
            color: red;
            margin-bottom: 20px;
        }

        .button-container {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .button {
            width: 45%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            font-size: 18px;
            cursor: pointer;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .button-red {
            background-color: #FFCCCC;
            color: #D32F2F;
        }

        .button-green {
            background-color: #CCFFCC;
            color: #388E3C;
        }

        .arrow {
            font-weight: bold;
            font-size: 175px;
            line-height: 1;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Login</h1>

    @if ($errors->any())
        <div class="error">{{ $errors->first() }}</div>
    @endif

    <form method="POST" action="{{ route('begeleiderLogin') }}">
        @csrf <!-- CSRF token for security -->
        <div class="input-group">
            <label for="name">Naam</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}">
        </div>
        <div class="input-group">
            <label for="password">Wachtwoord</label>
            <input type="password" id="password" name="password">
        </div>
        <div class="button-container">
            <button class="button button-red" type="reset">
                <span class="arrow">&#x2B05;</span>
            </button>
            <button class="button button-green" type="submit">
                <span class="arrow">&#x27A1;</span>
            </button>
        </div>
    </form>
</div>
</body>
</html>
