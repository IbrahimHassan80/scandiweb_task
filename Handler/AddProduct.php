<?php 
session_start();
include '../Database/Database.php';
include 'SwitchType.php';
$types = new typee(); 
$db = new Database();

if(isset($_POST['submit'])){
    $sku = filter_var($_POST['sku'], FILTER_SANITIZE_STRING);
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $price = filter_var($_POST['price'], FILTER_SANITIZE_NUMBER_INT);

    if(empty($sku) or empty($name) or empty($price))
    {
        $_SESSION['failed'] = 'please fill all fields from data of indicated type';
        header("Location:../AddProduct.php");
    } 
    else 
    {
        if(!is_numeric($price))
        {
            $_SESSION['failed'] = 'please fill all fields from data of indicated type';
            header("Location:../AddProduct.php");
        } 
        else
        {
             if($db->findsku('products', $sku)){
             $_SESSION['unique'] = 'this sku alraedy exists in database';
             header("Location:../AddProduct.php");
             }
             else{
                $type = $types->type();
                $sql = "INSERT INTO products (sku, name, price, specific_attributes) VALUES ('$sku', '$name', '$price $', '$type')";
                $db->insert($sql);
                header("Location:../index.php");
             }
        }
    }
}