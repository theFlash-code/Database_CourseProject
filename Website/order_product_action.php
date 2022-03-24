<?php
    session_start();
    include 'db_connect.php'
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
                <form class="search-content animate" action="submit_order.php" method="post">
                    
                    <div class="container">
                        <label style="font-size: 25px"><b>確認訂單</b></label>
                        
                    </div>
                    
                    <div class="container" style="background-color:#f1f1f1"></div>
                    <div class="container">
                    
                    <label style="font-size: 25px"><b>Customer ID: 
                        <?php echo $_SESSION['id']; ?><br></b></label>
                        <p><label style="font-size: 20px; line-height: 50px"><strong>訂購人: <?php echo $_SESSION['name']; ?>   </strong>  
                        </label></p>
                        <?php
                            $quans = $_POST['product'];
                            $_SESSION['orders'] = $quans; 
                            $sql = "SELECT * FROM Product";
                            $query = sqlsrv_query($conn, $sql) or die("sql error".sqlsrv_errors());
                            $i = 0;
                            $packcount = 0;
                            $dpackcount = 0;
                            $cost = 0;
                            while($row = sqlsrv_fetch_array($query)):
                                $i+=1;
                                $quantity = $quans[$i-1];
                                
                                if($quantity>0):
                            
                        ?>
                        <div class="row">
                            <p class="data" style="font-size:18px">
                                <strong><?php echo $row['ProductName']; ?>:</strong>  
                                <?php echo $quantity; ?> 個
                                <strong>價格: </strong>  <?php echo $row['ProductPrice']*$quantity; ?>
                                <br>
                            </p>
                        </div>
                        
                        <?php
                                $packcount += $quantity;
                                $cost += $row['ProductPrice']*$quantity;
                                if($i < 16){
                                    $dpackcount += $quantity;
                                }
                                
                                endif;
                            endwhile; 
                            
                        ?>
                            <p style="font-size:20px">
                                <?php 
                                    $discount = (int)($dpackcount/3)*10 ;
                                    $_SESSION['orderinfo'] = array("packCount"=>$packcount, "cost"=>$cost, "discount"=>$discount);
                                ?> <br> 
                                <strong> 原價: </strong> <?php echo $cost?> <br> 
                                <strong> 折扣: -</strong> <?php echo $discount?> <br> 
                                <strong>折扣後金額: </strong> <?php echo $cost-$discount;?>
                            </p>
                            <button type="submit" href="submit_order.php" ><b style="font-size: 16px">確定送出</b>  </button>
                    </div>
                    <div class="container" style="background-color:#f1f1f1"></div>
                    
                        
                </form>
            </div>
        </main>
        <?php include 'footer/footer.html'; ?> 

    </body>
