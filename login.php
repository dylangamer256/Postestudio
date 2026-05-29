<!DOCTYPE html>
<html lang="es">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Login - PostEstudio</title>

<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
    background:#172238;
    height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
}

.login-box{
    background:white;
    padding:40px;
    border-radius:15px;
    width:400px;
}

.btn-custom{
    background:#00b4d8;
    color:white;
    width:100%;
}

</style>

</head>

<body>

<div class="login-box">

<h2 class="text-center mb-4">PostEstudio</h2>

<form action="auth/validar_login.php" method="POST">

<input type="email"
name="correo"
class="form-control mb-3"
placeholder="Correo"
required>

<input type="password"
name="password"
class="form-control mb-3"
placeholder="Contraseña"
required>

<button class="btn btn-custom">
Iniciar Sesión
</button>

</form>

</div>

</body>

</html>