<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <header>
        <meta charset="utf-8">
        <title>黑將軍饅頭</title>
        
        <style><?php include 'footer/footer.css'; ?></style>
        <link rel="stylesheet" href="ord_sch.css">
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
                <form class="search-content animate" action="ord_search_action.php" method="post">
                    <div class="container" style="background-color:#f1f1f1"></div>
                    <div class="container">
                        <style><?php include 'font.css';?></style>
                        <div class="natali">
                            
                            <div class="container" style="background-color:#ffffff">
                                <p>
                                    <strong style="font-size: 30px">黑將軍老麵饅頭</strong>
                                </p>
                            </div>
                            
                            <p class="data">
                                <strong>營業時間: 上午 10:30 - 下午 8:00</strong>  <br>
                                <strong>Tel: 02 8789 8987</strong>   <br>
                                <strong>Address: 110台北市信義區虎林街151號1樓</strong>   <br>
                            </p>
                        </div>
                    </div>
                    <div class="container" style="background-color:#f1f1f1"></div>
                </form>
            </div>
        </main>
        <?php include 'footer/footer.html'; ?> 

    </body>
    
</html>