<?php
include("../Services/ResultaatService.php");

ob_start();
if (!isset($_GET["LogOut"])) {
    if (isset($_GET['logout'])) {
        $_COOKIE["loginStudent"] = setcookie("loginStudent", "", time() - 3600, '/');
        $_COOKIE["loginAdmin"] = setcookie("loginAdmin", "", time() - 3600, '/');
        header('Location: LoginForm.php');
        exit();
    }
    ob_end_flush();

    $resultaat = new ResultaatService();
    $data = $resultaat->GetHeaderAndBodyForAStudent($_COOKIE["loginStudent"]);
    if (!isset($_POST["Results"])) {
        $post = $_POST;
        if (empty($post)) {
        } else {
            $resultaat->UpdateResult($_POST);
        }
    }
}
?>
<head>
    <link rel="stylesheet" type="text/css" media="all" href="../Styles/css/bootstrap.css"/>
</head>
<nav class="navbar navbar-default">
    <div class="container">
        <ul class="nav navbar-nav navbar-right">
            <li>
                <form class="LogOut" method="get">
                    <button type="submit" value="logout" name="logout" class="btn btn-default navbar-btn">Sign out
                    </button>
                </form>
            </li>
        </ul>
    </div>
</nav>
<br>
<br>
<iframe name="votar" style="display: none"></iframe>
<form class="Results" method="post" id="newCreationForm" autocomplete="off" target="votar">
    <div class="form-group">
        <table id="resultaatTable" class="table table-striped">
            <thead>
            <tr>
                <th>Student</th>
                <?php foreach ($data[0] as $item) {
                    echo "<th>$item</th>";
                } ?>
            </tr>
            <tr>
            </thead>
            <tbody>
            <tr>

                <?php
                $item = $data[1];
                echo "<th scope='row'>$item[1] $item[2]</th>";
                $loops = count($data);
                for ($x = 1; $x < $loops; $x++) {
                    echo "<td>";
                    $item = $data[$x];
                    if ($item[7] > 0) {
                        echo " <input readonly type=\"number\" autocomplete='off' id='inputNumber' min='0' max='100' value='$item[7]' name='$item[6]'>                            
                         ";
                    } else {
                        echo " <input readonly type=\"number\" autocomplete='off' id='inputNumber' min='0' max='100' value='' name='$item[6]'>
                         ";
                    }
                    echo "</td>";
                }
                ?>
            </tr>
            </tbody>
        </table>
    </div>
    <br>
</form>