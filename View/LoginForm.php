<?php
include ("../Services/LoginService.php");

$login = new LoginService();
if (!isset($_POST["Login"])){
    $post = $_POST;
    if (empty($post)){
    }else{
        $login->CheckIfLoginCorrect($_POST);

    }
}
?>

<!DOCTYPE html>
<html>
<head>
<!--    <link rel="stylesheet" type="text/css" media="all" href="../Styles/css/Login.css" />-->
    <link rel="stylesheet" type="text/css" media="all" href="../Styles/css/bootstrap.css" />
</head>
<!--<body>

<h2>Login Form</h2>

<form class="Login" method="post">

    <div class="container">
        <label for="uname"><b>Email</b></label>
        <input type="text" placeholder="Enter Email" name="uname" required>

        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="psw" required>

        <button type="submit">Login</button>

    </div>

    <div class="container" style="background-color:#f1f1f1">
        <button type="reset" class="cancelbtn">Cancel</button>
    </div>
</form>
</body>-->

<body>

<button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Login</button>

<div id="id01" class="modal">

    <form class="Login" method="post">
        <div class="imgcontainer">
            <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
        </div>

        <div class="container">
            <label for="uname"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="uname" required>

            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="psw" required>

            <button type="submit">Login</button>
            <label>
                <input type="checkbox" checked="checked" name="remember"> Remember me
            </label>
        </div>

        <div class="container" style="background-color:#f1f1f1">
            <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
            <span class="psw">Forgot <a href="#">password?</a></span>
        </div>
    </form>
</div>

<script>
    // Get the modal
    var modal = document.getElementById('id01');

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>

</body>
</html>