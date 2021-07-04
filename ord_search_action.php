
<?php
    session_start();
    include 'db_connect.php';
?>
<!DOCTYPE html>
<html>
    <header>
        <meta charset="utf-8">
        <title>黑將軍饅頭</title>
        
        <style><?php include 'footer/footer.css'; ?></style>
        <link rel="stylesheet" href="data_table.css">
        <style><?php include 'header/solid_header.css'; ?></style>
        <link rel="stylesheet" href="reset.css">
        <link href="https://fonts.googleapis.com/css2?family=Patrick+Hand&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Catamaran:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400;500;600;700&family=Kanit:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">
        
    </header>
    
    <body>
        <?php include 'header/header.php'; ?>
        <main>
            <div class="search">
                <form class="search-content animate" action="ord_del_search.php" method="post">
                    
                    
                    <?php
                        $orderID = $_POST['orderID'];
                        $sql = "SELECT FirstName, LastName, [Order].OrderID, Quantity, ProductPrice, ProductName, Discount, TotalPrice FROM Customer
                        JOIN [Order] on Customer.CustomerID = [Order].CustomerID
                        JOIN Order_Product on Order_Product.OrderID = [Order].OrderID
                        JOIN Product on Product.ProductID = Order_Product.ProductID
                        WHERE [Order].OrderID = '".$orderID."'";
                        $query = sqlsrv_query($conn, $sql) or die("sql error".sqlsrv_errors());
                        $discount = 0;
                        $totalPrice = 0;
                        $count = 0;
                    ?>
                    <div class="container">
                        <label style="font-size: 25px"><b>訂單資料</b></label>
                        
                    </div>
                    
                    <div class="container" style="background-color:#f1f1f1"></div>
                    <div class="container">
                    <?php  
                        while($row=sqlsrv_fetch_array($query)):
                            $count+=1; 
                    ?>
                    <?php
                        if($count === 1):
                    ?>
                    <label style="font-size: 25px"><b>Order ID: 
                        <?php echo $row['OrderID']; ?><br></b></label>
                        <p><label style="font-size: 20px; line-height: 50px"><strong>訂購人: <?php echo $row['FirstName']." ".$row['LastName']; ?>   </strong>  
                        </label></p>
                    <?php endif; ?>
                    
                        <div class="row">
                            <p class="data" style="font-size:18px">
                                <strong><?php echo $row['ProductName']; ?>:</strong>  
                                <?php echo $row['Quantity']; ?> 個
                                <strong>價格: </strong>  <?php echo $row['ProductPrice']*$row['Quantity']; ?>
                                <br>
                            </p>
                        </div>
                        
                        <?php
                            $discount = $row['Discount'];
                            $totalPrice = $row['TotalPrice'];
                            endwhile; 
                        ?>
                            <p style="font-size:20px">
                                <strong> 原價: </strong> <?php echo $totalPrice?> <br> 
                                <strong> 折扣: -</strong> <?php echo $discount?> <br> 
                                <strong>折扣後金額: </strong> <?php  echo $totalPrice-$discount ?>
                            </p>
                    
                    </div>
                    <div class="container" style="background-color:#f1f1f1"></div>
                    
                        
                </form>
            </div>
        </main>
        <?php include 'footer/footer.html'; ?> 

    </body>
