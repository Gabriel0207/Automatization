<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Roboto', sans-serif;
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-container {
            background-color: #ffffff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .login-logo {
            width: 100px;
            margin-bottom: 20px;
        }

        .login-heading {
            margin-bottom: 20px;
            color: #343a40;
        }

        .login-form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .form-group {
            margin-bottom: 20px;
            width: 100%;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #6c757d;
        }

        input[type="email"],
        input[type="password"] {
            width: calc(100% - 40px);
            padding: 10px;
            border: 1px solid #ced4da;
            border-radius: 5px;
        }

        .login-btn {
            width: calc(100% - 40px);
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: #ffffff;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .login-btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <img class="login-logo" src="images/LOGO LIBRERIA.png" alt="Logo">
        <h2 class="login-heading">Iniciar Sesión</h2>
        <form action="login.php" method="post">
    <label for="username">Nombre de usuario:</label>
    <input type="text" name="username" required><br>
    <label for="password">Contraseña:</label>
    <input type="password" name="password" required><br>
    <input type="submit" value="Iniciar sesión">
</form>
    </div>
</body>
</html>
