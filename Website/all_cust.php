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
                        <label style="font-size: 25px"><b>客戶資料</b></label>
                    </div>
                    <div class="container" style="background-color:#f1f1f1"></div>
                    <?php
                        $sql = "SELECT * FROM Customer";
                        $query = sqlsrv_query($conn, $sql) or die("sql error".sqlsrv_errors());
                        while($row=sqlsrv_fetch_array($query)):
                    ?>
                    <div class="container">
                        <div class="row">
                            <label for="custID"><b>Customer ID: <?php echo $row['CustomerID']; ?></b></label>
                            <p class="data">
                                <strong>名字: <?php echo $row['FirstName'].' '.$row['LastName']; ?> </strong></br> 
                                <strong>手機號碼: <?php echo $row['Phone']; ?> </strong></br> 
                                <strong>E-mail: <?php echo $row['Email']; ?> </strong></br> 
                                <strong>地址: <?php echo $row['Address']; ?> </strong></br> 
                                <strong>區號: <?php echo $row['Postcode']; ?> </strong></br> 
                                <strong>密碼: <?php echo $row['Password']; ?> </strong></br> 
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
