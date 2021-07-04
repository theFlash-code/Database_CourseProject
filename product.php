<?php
    session_start();
    include 'db_connect.php';
?>
<!DOCTYPE html>
<html>
    <header>
        <meta charset="utf-8">
        <title>黑將軍饅頭</title>
        <link rel="stylesheet" href="product.css">
        <link rel="stylesheet" href="reset.css">
        <link href="https://fonts.googleapis.com/css2?family=Patrick+Hand&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Catamaran:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400;500;600;700&family=Kanit:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">
        
    </header>
    <?php 
        $sql = "SELECT * FROM Product";
        $query = sqlsrv_query($conn, $sql) or die("sql error".sqlsrv_errors());
        $i = 0;
    ?>
    <body>
        <?php include 'header/header.php'; ?>
        <style><?php include 'header/solid_header.css'; ?></style>
        <main>
            <style><?php include 'product.css';?></style>
            
                <div  class="banner">
                    <h3 class="banner-bottom">選擇品項</h3>
                    <form method="post" action="order_product_action.php">
                        <div class="card-container">
                            <?php
                                while($row=sqlsrv_fetch_array($query)):
                                    $i+=1;
                            ?>
                            <div class="card-div">
                                <?php echo '<div class="card-product'.$i.'">'?>
                                
                                    <span class="span-title"><?php echo $row['ProductName'] ?></span>
                                </div>
                                <div class="card-text">
                                    <h4>
                                        產品名稱: <?php echo $row['ProductName'] ?><br>
                                        產品價格: <?php echo $row['ProductPrice'] ?>元<br>
                                        訂購數量 <?php echo '<input type="number" name="product[]" placeholder="0" min="0" size="1" style="padding:0; width: 40px;" ><br>';?>
                                        產品規格: 3個/包<br> 
                                    </h4>
                                </div>
                            </div>
                            <?php endwhile; ?>
                        </div>
                        <button type="submit" class="order_btn" > 送出 </button>
                    
                    </form>
                </div>
            
        </main>
        
        
        <?php include 'footer/footer.html';?>
        <script><?php include 'footer/footer.css';?></script>
    </body>
</html>