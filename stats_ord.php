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
                        <p>
                            <label style="font-size: 25px"><b>訂單統計銷售排行</b></label>
                        </p>
                        
                    </div>
                    <div class="container" style="background-color:#f1f1f1"></div>
                    <?php
                        $sql = "SELECT * , Quantity_sum*ProductPrice as Income
                        FROM (SELECT Product.ProductID as ID, SUM(Quantity) as Quantity_sum
                        FROM Order_Product
                        JOIN Product ON Product.ProductID = Order_Product.ProductID
                        GROUP BY  Product.ProductID) AS ps
                        JOIN Product ON ID = Product.ProductID
                        ORDER BY Income DESC;
                        ";
                        $query = sqlsrv_query($conn, $sql) or die("sql error".sqlsrv_errors());
                        $rank = 0;
                        while($row=sqlsrv_fetch_array($query)):
                            $rank+=1;
                    ?>
                    <div class="container">
                        <div class="row">
                            
                            <div class="container" style="background-color:#ffffff">
                                <p>
                                    <strong style="font-size: 30px">第<?php echo $rank?>名 : <?php echo $row['ProductName']?></strong>
                                    
                                </p>
                            </div>
                            
                            <p class="data">
                                <label for="orderID">Product ID: <?php echo $row['ProductID']; ?></label><br>
                                <strong>產品名稱:</strong> <?php echo $row['ProductName']; ?> <br>
                                <strong>總銷售金額:</strong>  <?php echo $row['Income']; ?> <br>
                                <strong>總銷售量:</strong>  <?php echo $row['Quantity_sum']; ?> <br>
                                <strong>產品單價:</strong>  <?php echo $row['ProductPrice']; ?> /包<br>

                            </p>
                        </div>
                    </div>
                    <div class="container" style="background-color:#f1f1f1"></div>
                    <?php endwhile; ?>
                    
                        
                </form>
            </div>
        </main>
        <?php include 'footer/footer.html'; ?> 

    </body>
