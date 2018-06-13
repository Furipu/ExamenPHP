<?php
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");


$resultaat = new ResultaatService();
$data = $resultaat->GetHeaderandBody();
if (!isset($_POST["Results"])){
    $post = $_POST;
    if (empty($post)){
    }else{
        $resultaat->UpdateResult($_POST);
    }
}
?>
<head>
    <link rel="stylesheet" type="text/css" media="all" href="../Styles/css/bootstrap.css" />
</head>
<div id="StudentDiv">
<form action="NewStudentView.php" >
    <button type="submit" class="btn btn-default">New Student</button>
</form>
</div>
<div id="VakDiv">
<form action="NewLeervakView.php" >
    <button type="submit" class="btn btn-default">New Vak</button>
</form>
</div>
<br>
<br>
<form class="Results" method="post" id="newCreationForm" autocomplete="off">
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
        <?php
            foreach ($data[1] as $item){
                echo "<tr>";
                $firstItem = $item[0];
                echo "<th scope='row'>$firstItem[1] $firstItem[2]</th>";
                foreach ($item as $value){
                    if ($value[6]>0){
                        echo "<td> <input type=\"number\" autocomplete='off' id='inputNumber' min='0' max='100' value='$value[6]' name='$value[5]'>                            
                         </td>";
                    }else{
                        echo "<td> <input type=\"number\" autocomplete='off' id='inputNumber' min='0' max='100' value='' name='$value[5]'>
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

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Modal Header</h4>
            </div>
            <div class="modal-body">
                <p>Some text in the modal.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>






