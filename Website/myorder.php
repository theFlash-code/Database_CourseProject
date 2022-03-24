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
                    
                    <div class="container">
                        <label style="font-size: 25px"><b><?php echo $_SESSION['name'] ?>的訂單資料</b></label>
                    </div>
                    <div class="container" style="background-color:#f1f1f1"></div>
                    <?php
                        $id = $_SESSION['id'];
                        $ords = "SELECT OrderID, PackCount, TotalPrice, OrderDate, ShippedDate, Discount FROM [Order]
                        WHERE CustomerID = $id
                        ";
                        $query = sqlsrv_query($conn, $ords) or die("sql error".sqlsrv_errors());
                        while($ids=sqlsrv_fetch_array($query)):
                            $curoid = $ids['OrderID'];
                            $sql = "SELECT * FROM [Order] 
                            JOIN Order_Product ON Order_Product.OrderID = [Order].OrderID
                            JOIN Product ON Product.ProductID = Order_Product.ProductID
                            WHERE [Order].OrderID = '$curoid'";
                            $query2 = sqlsrv_query($conn, $sql) or die("sql error".sqlsrv_errors());

                            $count = 0;
                            ?>
                            <div class="container" style="background-color:#FFFFFF; padding-top: 10px;"></div>
                            <label style="font-size: 20px; padding-left: 15px;"><b>Order ID: 
                                    <?php echo $ids['OrderID']; ?><br></b></label>
                              <?php      
                            while($row = sqlsrv_fetch_array($query2)):
                                $count+=1; 
                                ?>
                                
                                    <div class="row">
                                        <p class="data" style="font-size:18px">
                                            <strong><?php echo $row['ProductName']; ?>:</strong>  
                                            <?php echo $row['Quantity']; ?> 個
                                            <strong>價格: </strong>  <?php echo $row['ProductPrice']*$row['Quantity']; ?>
                                            <br>
                                        </p>
                                    </div>
                                    
                            <?php
                                endwhile; 
                            ?>
                                <p style="font-size:20px">
                                    <strong> 原價: </strong> <?php echo $ids['TotalPrice']?> <br> 
                                    <strong> 折扣: -</strong> <?php echo $ids['Discount']?> <br> 
                                    <strong>折扣後金額: </strong> <?php  echo $ids['TotalPrice']-$ids['Discount'] ?>
                                </p>
                            <div class="container" style="background-color:#FFFFFF; padding-top: 10px;"></div>
                    <div class="container" style="background-color:#f1f1f1"></div>
                            
                    <?php endwhile; ?>
                    
                        
                </form>
            </div>
        </main>
        <?php include 'footer/footer.html'; ?> 

    </body>
