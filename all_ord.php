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
                        <label style="font-size: 25px"><b>訂單資料</b></label>
                    </div>
                    <div class="container" style="background-color:#f1f1f1"></div>
                    <?php
                        $sql = "SELECT OrderID, PackCount, CONVERT(varchar(10), OrderDate, 120) as OrderDate, CONVERT(varchar(10), ShippedDate, 120) as ShippedDate, FirstName, LastName, Phone, Email, Address, Postcode FROM [Order]
                        JOIN Customer ON Customer.CustomerID = [Order].CustomerID
                        ";
                        $query = sqlsrv_query($conn, $sql) or die("sql error".sqlsrv_errors());
                        while($row=sqlsrv_fetch_array($query)):
                    ?>
                    <div class="container">
                        <div class="row">
                            <label for="orderID"><b>Order ID: <?php echo $row['OrderID']; ?></b></label>
                            <p class="data">
                                <strong><?php echo $row['PackCount']; ?> Packs in total</strong></br> 
                                <strong>OrderDate:</strong> <?php echo $row['OrderDate']; ?> <strong>Ship Date:</strong>  <?php echo $row['ShippedDate']; ?> <br>
                                <strong>Name:</strong>  <?php echo $row['FirstName']." ".$row['LastName']; ?>      <strong>Phone:</strong>  <?php echo $row['Phone']; ?> <br>
                                <strong>Address:</strong>  <?php echo $row['Address']; ?>    <strong>Postcode:</strong>  <?php echo $row['Postcode']; ?> <br>
                                <strong>E-mail:</strong>  <?php echo $row['Email']; ?> <br>

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
