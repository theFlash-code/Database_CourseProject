<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <header>
        <meta charset="utf-8">
        <title>黑將軍饅頭</title>
        
        <style><?php include 'footer/footer.css'; ?></style>
        <link rel="stylesheet" href="ord_del.css">
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
                <form class="search-content animate" action="search_cust_action.php" method="post">
                    
                    <div class="container">
                        <label style="font-size: 25px"><b>查詢客戶資料</b></label>
                    </div>
                    <div class="container">
                        <label for="CustomerID"><b>客戶ID</b></label>
                        <input type="text" placeholder="Enter Customer ID" name="custID" required>
                
                        
                        <button type="submit">Submit</button>
                    </div>
                
                    <div class="container" style="background-color:#f1f1f1">
                        
                    </div>
                </form>
            </div>
        </main>
        <?php include 'footer/footer.html'; ?> 

    </body>


