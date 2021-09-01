<?php 

// check different type //
class typee
{
    public function type(){
      
       if(isset($_POST['size']))
        {
            return 'Size: ' . $_POST['size'] . ' MB';
        } 
        elseif (isset($_POST['weight']))
        {
            return 'Weight: ' . $_POST['weight'] . ' kg';
        }
         
        elseif (isset($_POST['height']) && isset($_POST['width']) && isset($_POST['length']))
        {
            return 'Dimension: ' . $_POST['height'] . '×' . $_POST['width'] . '×' . $_POST['length'];
        } 
        else
        {
            $_SESSION['failed'] = 'Please select the type';
             header("Location:../AddProduct.php"); 
             die();
        }  
    }
}