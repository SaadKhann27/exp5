<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Dashboard</title>
<style>
body {
    font-family: Arial;
    background: #f4f4f4;
    text-align: center;
    padding-top: 100px;
}

.box {
    background: white;
    padding: 30px;
    margin: auto;
    width: 300px;
    border-radius: 10px;
    box-shadow: 0px 0px 10px rgba(0,0,0,0.2);
}

a {
    display: inline-block;
    margin-top: 20px;
    text-decoration: none;
    background: #667eea;
    color: white;
    padding: 10px 20px;
    border-radius: 5px;
}

a:hover {
    background: #5a67d8;
}
</style>
</head>

<body>

<div class="box">
    <h2>Welcome</h2>
    <p><?php echo $_SESSION['user']; ?></p>
    <a href="logout.php">Logout</a>
</div>

</body>
</html>