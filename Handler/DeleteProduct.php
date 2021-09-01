<?php
session_start();
include "../Database/Database.php";
$db = new Database();

if(isset($_POST['delete_products']))
{
    if(!isset($_POST['product_id'])){
       $_SESSION['failed'] = 'please select product to delete';
        header("Location:../index.php");
        die();
    }
    $all_id = $_POST['product_id'];
    
    $extract_id = implode(',', $all_id);
    
    $db->massDelete('products', $extract_id);
    header("Location:../index.php");
}