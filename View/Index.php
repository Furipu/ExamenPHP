<?php
//include ("../Helpers/ClassLoader.php");
include ("../Services/LoginService.php");
$login = LoginService::GetInstance();
if ($_COOKIE["loginAdmin"] && $_COOKIE["loginAdmin"] != "1"){
    header('Location: TabelView.php'); exit();
}
else{header('Location: LoginForm.php'); exit();}

?>
<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title></title>

    <link rel="stylesheet" type="text/css" media="all" href="../Styles/css/bootstrap.css" />

</head>

<body>
<!-- Add your site or application content here -->
<header>

<nav>

</nav>
</header>

<main>

    <br>
</main>

<aside>
</aside>
<footer>
</footer>
</body>
</html>


