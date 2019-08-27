<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>chuc nang danh nhap</title>
    <style type="text/css">
        .login {
            height:280px; width:330px;
            margin:0;
            padding:10px;
            border:1px #CCC solid;
        }
        .login input {
            padding:5px; margin:5px
        }
    </style>
</head>
<body>
<form method="get">
    <div class="login" >
        <h2>Login</h2>
        <input type="text" name="username" size="30"  placeholder="username" />
        <input type="password" name="password" size="30" placeholder="password" />
        <input type="submit" value="Sign in"/>
    </div>
</form>
<?php
        if ($_SERVER["REQUEST_METHOD"] == "GET") {

        if(empty( $_GET["username"])&& empty($_GET["password"])){
       echo "ban can phai nhap vao";
        }else{
            $username = $_GET["username"];
            $password = $_GET["password"];

        if ($username === "admin" && $password === "admin") {
        echo "<h2>Welcome <span style='color:red'>" .$username. "</span> to website</h2>";
        } else{
        echo "<h2><span style='color:red'>Login Error</span></h2>";
        }
        }}
?>

</body>
</html>
