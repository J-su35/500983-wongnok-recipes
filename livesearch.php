<?php

include('connection/connect.php');

if (isset($_POST['input'])) {
    $input = $_POST['input'];
    $query = "SELECT * FROM recipes WHERE resname LIKE '{$input}%'";
    $result = mysqli_query($db, $query);

    if ($result) {
        foreach ($result as $row) {
            echo '<a href=fullrecipy.php?DISC=' . $row['rid'] . '>' . $row['resname'] . '</a>';
        }
    } else {
        echo '<h3>Recipes not found</h3>';
    }
}
