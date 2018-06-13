<?php
/**
 * Created by PhpStorm.
 * User: vanda
 * Date: 08/06/2018
 * Time: 14:57
 */
include ("../Services/LeervakService.php");
$leervakService = new LeervakService();
if (empty($_POST["submit"])) {
    $post = $_POST;
    if (empty($post)) {
    } else {
        $leervakService->CreateLeervak($_POST);
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

<form name="newLeervak" id="newCreationForm" method="post">
    <div class="form-group">
        <label for="vakInput">vak</label>
        <input type="text" class="form-control" name="vakInput" id="vakInput"  placeholder="Enter vak">
    </div>
    <button type="submit" class="btn btn-primary">Save</button>
    <button type="reset" id="resetButton" class="btn btn-primary">Cancel</button>
</form>

<script type="text/javascript">
    document.getElementById("resetButton").onclick = function () {
        window.location = '/Examen/View/Index.php'
    };
</script>
