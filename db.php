<?php

try {

$db = new PDO ("mysql:host=localhost;dbname=upand", "igor", "bigor");

    
//User Input
$page= isset($_GET['page']) ? (int) $_GET['page'] : 1;

$perPage = isset($_GET['per-page']) && $_GET['per-page'] < 10 ? (int) $_GET['per-page'] : 5;    

//Postioning
$start = ($page>1) ? ($page * $perPage) - $perPage : 0;    
  
//Query
$sql = "SELECT SQL_CALC_FOUND_ROWS name, email 
        FROM upand.users 
        LIMIT $start, $perPage";

$stmt= $db->prepare($sql);
    
$stmt->execute();
    
$rows= $stmt->fetchAll(PDO::FETCH_ASSOC);
    
//Pages
$total= $db->query("SELECT FOUND_ROWS() as total")->fetch()['total'];
    
$pages = ceil($total/$perPage);

} catch (PDOException $e) {
    
    echo $e;
}


function h ($data) 
    
    {
        return htmlspecialchars($data);
    }


include "index.php";


