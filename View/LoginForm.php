<?php

include ("../Services/LoginService.php");

$login = LoginService::GetInstance();

if (!isset($_POST["Login"])){
    $post = $_POST;
    if (empty($post)){
    }else{
        $login->CheckIfLoginCorrect($_POST);

    }
}
if (isset($_COOKIE["loginAdmin"])) {
    if ($_COOKIE["loginAdmin"]) {
        header('Location: TabelView.php');
        exit();
    }
}
if (isset($_COOKIE["loginStudent"])){
    if ($_COOKIE["loginStudent"]){
        header('Location: StudentView.php'); exit();
    }
}



?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" media="all" href="../Styles/css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="../Styles/css/Login.css">
</head>

<body>

<!--<button type="button" class="btn btn-primary">Login</button>-->

    <form class="Login" method="post" >
        <div class="form-group">
            <label for="uname"><b>Username</b></label><br>
            <input type="text" placeholder="Enter Username" name="uname" required><br>
            <label for="psw"><b>Password</b></label><br>
            <input type="password" placeholder="Enter Password" name="psw" required>
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
        <button type="reset"  class="btn btn-primary">Cancel</button>
    </form>



</body>
</html>