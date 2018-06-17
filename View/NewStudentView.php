<?php
include ("../Services/StudentService.php");
$StudentService = new StudentService();
if (empty($_POST["submit"])) {
    $post = $_POST;
    if (empty($post)) {
    } else {
        $StudentService->CreateStudent($_POST);
    }
}
?>
<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../Styles/css/Home.css">
    <link href="../Styles/css/bootstrap.min.css" rel="stylesheet">
</head>


    <form name="newStudent" method="post" id="newCreationForm">
        <div class="form-group">
            <label for="voornaamInput">voornaam</label>
            <input type="text" class="form-control" name="voornaam" required placeholder="Enter FirstName">
            <label for="naamInput">voornaam</label>
            <input type="text" class="form-control" name="naam" required placeholder="Enter LastName">
            <label for="emailInput">email</label>
            <input type="text" class="form-control" name="email" required placeholder="Enter Email">
            <label for="paswordInput">paswoord</label>
            <input type="password" class="form-control" name="paswoord" required placeholder="Enter Password">
            <label  for="adminInput">Admin</label>
            <input type="checkbox" class="left" name="admin"  placeholder="Is Admin?" >
        </div>
        <button type="submit" class="btn btn-primary" name="submit" >Save</button>
        <button id="resetButton" class="btn btn-primary" type="reset" name="reset" >Cancel</button>
    </form>


<script type="text/javascript">
    document.getElementById("resetButton").onclick = function () {
        window.location = '/Examen/View/Index.php'
    };
</script>
