<?php
include("../Services/ResultaatService.php");

ob_start();
if (!isset($_GET["LogOut"])) {
    if (isset($_GET['logout'])) {
        $_COOKIE["loginStudent"] = setcookie("loginStudent", "", time() - 3600, '/');
        $_COOKIE["loginAdmin"] = setcookie("loginAdmin", "", time() - 3600,'/');
        header('Location: LoginForm.php');
        exit();
    }
    ob_end_flush();

    $resultaat = new ResultaatService();
    $data = $resultaat->GetHeaderandBody();
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
                    <label>Administrator</label>
                    <button type="submit" value="logout" name="logout" class="btn btn-default navbar-btn">Sign out
                    </button>
                </form>
            </li>
        </ul>
    </div>
</nav>

<div id="StudentDiv">
    <form action="NewStudentView.php">
        <button type="submit" class="btn btn-default">New Member</button>
    </form>
</div>
<div id="VakDiv">
    <form action="NewLeervakView.php">
        <button type="submit" class="btn btn-default">New Vak</button>
    </form>
</div>
<br>
<br>
<iframe name="votar" style="display: none"></iframe>
<form class="Results" method="post" id="newCreationForm" autocomplete="off" target="votar">
    <div class="form-group">
        <table id="resultaatTable" class="table table-striped">
            <thead>
            <tr>
                <th>Student</th>
                <?php
                foreach ($data[0] as $item) {
                    echo "<th>$item</th>";
                } ?>
            </tr>
            <tr>
            </thead>
            <tbody>

            <?php
            foreach ($data[1] as $item) {
                echo "<tr>";
                $firstItem = $item[0];
                echo "<th scope='row'>$firstItem[1] $firstItem[2]</th>";
                foreach ($item as $value) {
                    if ($value[7] > 0) {
                        echo "<td> <input type=\"number\" autocomplete='off' id='inputNumber' min='0' max='100' value='$value[7]' name='$value[6]'>                            
                         </td>";
                    } else {
                        echo "<td> <input type=\"number\" autocomplete='off' id='inputNumber' min='0' max='100' value='' name='$value[6]'>
                         </td>";
                    }
                }
                echo "</tr>";
            }
            ?>
            </tbody>
        </table>
    </div>
    <br>
    <input type=submit value="Save" class="btn btn-primary">
</form>









