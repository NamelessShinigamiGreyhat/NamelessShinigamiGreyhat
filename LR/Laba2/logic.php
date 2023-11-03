<?php

$servername = "localhost";
$database = "bdmain";
$username = "root";
$password = "";

$conn = mysqli_connect($servername, $username, $password, $database);

$sql = "SELECT * FROM bd 
        inner join 	point 
        on bd.point = point.id
        where 1=1";

if (isset($_GET['costFrom']) && $_GET['costFrom'] != '') {
    $costFrom = $_GET['costFrom'];
    $sql .= ' AND bd.cost >= '.mysqli_real_escape_string($costFrom).'';
}
if (isset($_GET['costTo']) && $_GET['costTo'] != '') {
    $costTo = $_GET['costTo'];
    $sql .= ' AND bd.cost <= '.mysqli_real_escape_string($costTo).'';
}
if (isset($_GET['point']) && $_GET['point'] != ''){
    $point = $_GET['point'];
    $sql .= ' AND point.id = '.mysqli_real_escape_string($point).'';
}
if (isset($_GET['description']) && $_GET['description'] != ''){
    $description = $_GET['description'];
    $sql .= ' AND bd.feedback LIKE "%'.mysqli_real_escape_string($description).'%"';
}
if (isset($_GET['adress']) && $_GET['adress'] != ''){
    $adress = $_GET['adress'];
    $sql .= ' AND bd.adress LIKE "%'.mysqli_real_escape_string($adress).'%"';
}

$fullList = $conn->query($sql);
foreach($fullList as $row){
    echo '<tr>
                <th><img src="inc/'.mysqli_real_escape_string($row['img']).'" style="height: 200px; width: 250px;"></th>
                <td>'.mysqli_real_escape_string($row['adress']).'</td>
                <td>'.mysqli_real_escape_string($row['point']).'</td>
                <td>'.mysqli_real_escape_string($row['feedback']).'</td> 
                <td>'.mysqli_real_escape_string($row['cost']).'</td>
            </tr>';
}
?>
