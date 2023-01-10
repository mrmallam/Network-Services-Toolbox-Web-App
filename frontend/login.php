<!DOCTYPE html>
<html>    

<head>
    <title>Login Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>
<body>
    <h2>Admin Login</h2>
    <form action="./Admin/loginServer.php" method="post">
        Username: <input type="text" name="Username"><br>
        Password: <input type="text" name="Password"><br>
        <input type="submit">
    </form>
    <h2>Client Login</h2>
    <form action="./Client/loginServer.php" method="post">
        Username: <input type="text" name="Username"><br>
        Password: <input type="text" name="Password"><br>
        <input type="submit">
    </form>

</body>

</html>