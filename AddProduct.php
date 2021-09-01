<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Add Product</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
</head>

<body>
 <div class="container p-3">
  	<h1 style="display:inline;">Product Add</h1>
     <form id="product_form" style="display:inline;" method="post" action="Handler/AddProduct.php">
     <span class="p-3" style="float:right;"><button id="submit" type="submit" class="btn btn-primary" name="submit">Save</button> <a href="index.php" class="btn btn-secondary">cancel</a></span>
	   <hr>
      <div class="row col-md-3">
            <div class="form-group">
                <label for="sku">SKU</label>
                <input type="text" class="form-control" id="sku" name="sku" required>
                 <!-- ------------ -->
                <?php if(isset($_SESSION['unique'])): ?>
                 <div class="alert alert-danger" role="alert">
                 <?php echo $_SESSION['unique']; 
                 session_unset();
                 session_destroy();
                 ?>
                 <!-- --------------- -->
                </div>
                <?php endif?>
            </div>
           
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="price">Price ($)</label>
                <input type="number" step="0.01" class="form-control" id="price" name="price" required>
            </div>
            <div class="form-group p-3">
                <label for="type">Type switcher</label>
                <select  class="form-control" id="productType" name="type">  
                <option selected>.........</option>
                <option value='0'>DVD</option>
                <option value='1'>Book</option>
                <option value='2'>Furniture</option>
                </select>
            </div>
            <div class="form-group p-3" id="attributes">
            </div>
        </form>
     
       <!-- Erorr message -->
       <?php if(isset($_SESSION['failed'])): ?>
         <div class="alert alert-danger" role="alert">
           <?php echo $_SESSION['failed']; 
           session_unset();
           session_destroy();
           ?>
         </div>
       <?php endif?>
      <!-- -------------- -->
    </div>	
</div>
<!-- bootstrap cdn -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
<!-- ------------- -->
<script src="js/jquery.min.js"></script>
<!--<script src="js/dynamicselect.js"></script>-->

<script>
  $(document).ready(() => {
    $('#productType').change(function() {
        switch (this.value) {
            case '0':
                $('#attributes').html(`
                    <label for="size">Size (MB)</label>
                    <input type="number" step="0.01" class="form-control" id="size" name="size" required>
                    <p>Please, provide dic space in MB</p>
                `);
                break;
            case '1':
                $('#attributes').html(`
                    <label for="weight">Weight</label>
                    <input type="number" step="0.01" class="form-control" id="weight" name="weight" required>
                    <p>Please, provide weight space in Kg</p>
                `);
                break;

            case '2':
                $('#attributes').html(`
                    <label for="height">Height</label>
                    <input type="number" step="0.01" class="form-control" id="height" name="height" required>
                    <label for="width">Width</label>
                    <input type="number" step="0.01" class="form-control" id="width" name="width" required>
                    <label for="length">Length</label>
                    <input type="number" step="0.01" class="form-control" id="length" name="length" required>
                    <p>Please, provide the the hight and width and length</p>
                `);
                break;
        }
    });
});
</script>

</body>
</html>