<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Product Details</title>
    <link rel="stylesheet" href="../css/updateProducts.css">
    <link rel="icon" type="image/x-icon" href="../images/icon_logo.png" />
    <script src="https://kit.fontawesome.com/06f7708eb9.js" crossorigin="anonymous"></script>

</head>

<body>

    <main>
        <div class="box">
            <div class="container">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" autocomplete="off">
                    <h1>UPDATE A PRODUCT</h1>
                    <div class="pid">
                        <input type="text" name="pid" id="productId" required>
                        <label for="productId">Product ID</label>
                        <span class="line"></span>
                    </div>
                    <div class="lname">
                        <input type="text" name="lname" id="lastname">
                        <label for="lastname">Product Name</label>
                        <span class="line"></span>
                    </div>
                    <div class="lname">
                        <input type="text" name="shopadd" id="shop-address">
                        <label for="shop_address">Product Category</label>
                        <span class="line"></span>
                    </div>
                    <div class="phno">
                        <input type="text" name="phno" id="phone_number">
                        <label for="phone_number">Price</label>
                        <span class="line"></span>
                    </div>
                    <div class="phno">
                        <input type="text" name="tax">
                        <label for="phone_number">Tax</label>
                        <span class="line"></span>
                    </div>
                    <div class="shopname">
                        <input type="text" name="shopname" id="shopname">
                        <label for="shopname">Quantity</label>
                        <span class="line"></span>
                    </div>
                    <div class="name">
                        <input type="text" name="uname" id="username">
                        <label for="username">Supplier ID</label>
                        <span class="line"></span>
                    </div>
                    <div class="submit">
                        <button type="submit" name="submit">Update</button>
                    </div>

                </form>
                <div class="submit">
                    <form action="../php/list.php">
                        <button type="submit">Product list</button>
                    </form>
                </div>
                <div class="submit">
                    <form action="../html/products.html">
                        <button type="submit">Back</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <?php
   if (isset($_POST['submit'])) { 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "shop management system";
    
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $pid = intval($_POST['pid']);
        $pname = $_POST['lname'];
        $price = floatval($_POST['phno']);
        $tax=floatval($_POST['tax']);
        $pdesc = $_POST['shopadd'];
        $quantity=intval($_POST['shopname']);
        $sup_id=intval($_POST['uname']);
        $sql="UPDATE product SET";
        $updates=array();
    
        if(!empty($pname)){
            $updates[] = " product_name='$pname'";
           
        }
        if(!empty($price)){
            $updates[] = " price='$price'";
           
        }
        if(!empty($tax)){
            $updates[] = " tax='$tax'";
           
        }
        if(!empty($pdesc)){
            $updates[] = " category='$pdesc'";
           
        }
        if(!empty($quantity)){
            $updates[] = " quantity_available='$quantity'";
           
        }
        if(!empty($sup_id)){
            $updates[] = " supplier_id='$sup_id'";
           
        }
        if(!empty($updates)){
        $sql .=implode(", ",$updates) . " WHERE product_id=$pid";
        $result=mysqli_query($conn,$sql);
        if(mysqli_affected_rows($conn)>0){
            echo "<script> alert('Updated product details successfully!');</script>";}
        else{
            echo "<script> alert('Product not found!');</script>";
        }
        }
   
    
    }

    mysqli_close($conn);}
?>

    <script src="../script/signup.js"></script>
</body>

</html>