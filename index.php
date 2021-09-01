<?php session_start(); ?>
<?php include "Database/Database.php"; $db = new Database;?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <style>
        li {list-style-type: none;}
    </style>
</head>
<body>

<div class="container">
    <h1 style="display:inline;">Products</h1>
    <form style="display:inline;" method="POST" action="Handler/DeleteProduct.php"> 
    <span class="p-3" style="float:right;">
    <a href="AddProduct.php" class="btn btn-primary">ADD</a> 
    <button type="submit" name="delete_products" class="btn btn-danger">MASS DELETE</button>
    </span>
    <hr>
    <!-- check id delete -->
    <?php if(isset($_SESSION['failed'])): ?>
         <div class="alert alert-danger" role="alert">
           <?php echo $_SESSION['failed'];
           session_unset();
           session_destroy();
           ?>
         </div>
    <?php endif?>
    <!-- ----------  -->
   
    <?php $db = new Database; ?>
    <div class="row">
    
    <?php if(count($db->read('products'))): ?>
    
      <?php foreach($db->read('products') as $row): ?>
    <div class="card " style="width: 18rem;margin-right: 45px; margin-top: 25px;">
      <div style="font-weight: bold;" class="card-body">
          <input class="delete-checkbox" type="checkbox" name="product_id[]" value="<?php echo $row['id']; ?>">
          <ul>
          <li class=""><?php echo $row['sku']; ?></li>
          <li class=""><?php echo $row['name']; ?></li>
          <li class=""><?php echo $row['price']; ?></li>
          <li class=""><?php echo $row['specific_attributes']; ?></li>
          </ul>    
       </div>
  </div>
  <?php endforeach; ?>
  <?php else: ?>
    <div class="col-sm-12">
      <h3 class="alert alert-danger">no data found</h3>
    </div>
  <?php endif; ?>
  
  </form>
  </div>
  </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</body>
</html>
`