<?php
session_start();
include "db.php";

$cookie_user = "";
if (isset($_COOKIE['user'])) {
    $cookie_user = $_COOKIE['user'];
}

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['user'] = $username;
        setcookie("user", $username, time() + 3600, "/");
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Invalid login!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Login</title>
<style>
body {
    font-family: Arial;
    background: #8787a7; /* light blue */
}

.container {
    width: 300px;
    margin: 100px auto;
    background: white;
    padding: 25px;
    border-radius: 5px;
    box-shadow: 0px 0px 5px #ccc;
}

h2 {
    text-align: center;
}

input {
    width: 100%;
    padding: 8px;
    margin: 8px 0;
    border: 1px solid #ccc;
    border-radius: 3px;
}

button {
    width: 100%;
    padding: 8px;
    background: #333;
    color: white;
    border: none;
    border-radius: 3px;
}

button:hover {
    background: #555;
}

.error {
    color: red;
    text-align: center;
}
</style>
</head>

<body>

<div class="container">
    <h2>Login</h2>

    <?php if(isset($error)) echo "<p class='error'>$error</p>"; ?>

    <form method="POST">
        <input type="text" name="username" placeholder="Username" value="<?php echo $cookie_user; ?>" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit" name="login">Login</button>
    </form>
</div>

</body>
</html>