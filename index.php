<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <header>
        <meta charset="utf-8">
        <title>黑將軍饅頭</title>
        <link rel="stylesheet" href="footer/footer.css">
        <link rel="stylesheet" href="styles.css">
        <link rel="stylesheet" href="reset.css">
        <link href="https://fonts.googleapis.com/css2?family=Patrick+Hand&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Catamaran:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400;500;600;700&family=Kanit:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">
        
    </header>
    
    <body>
        <?php include 'header/header.php'; ?>
        <style><?php include 'header/header.css'; ?></style>
        <main>
            <section class="black-back">
                <div  class="banner">
                    <div class="container">
                        <h1>Welcome 
                            <?php 
                                if(isset($_SESSION['loggedin'])){
                                    echo $_SESSION['name'];
                                }
                            ?>
                        </h1>
                        <h2>黑將軍老麵饅頭</h2> 
                    </div>
                </div>
            </section>
            
            <h3 class="banner-bottom">產品資訊</h3>
            <section class="card-section">
                <div class="card-div">
                    <div class="card-img-IICC" onclick="statusCard(0)">
                        <span class="span-title">白饅頭</span>
                    </div>
                    <div class="card-text">
                        <p>
                            You've been eyeing me all day and waiting for your move like a lion stalking a gazelle in a savannah.You've been eyeing me all day and waiting for your move like a lion stalking a gazelle in a savannah.You've been eyeing me all day and waiting for your move like a lion stalking a gazelle in a savannah. 
                        </p>
                    </div>
                </div>
                <div class="card-div">
                    <div class="card-img-Programming" onclick="statusCard(1)"><span class="span-title">黑糖饅頭</span></div>
                    <div class="card-text">
                        <p>
                            You've been eyeing me all day and waiting for your move like a lion stalking a gazelle in a savannah.You've been eyeing me all day and waiting for your move like a lion stalking a gazelle in a savannah.You've been eyeing me all day and waiting for your move like a lion stalking a gazelle in a savannah. 
                        </p>
                    </div>
                </div>
                <div class="card-div">
                    <div class="card-img-Football" onclick="statusCard(2)"><span class="span-title">全麥饅頭</span></div>
                    <div class="card-text">
                        <p>
                            You've been eyeing me all day and waiting for your move like a lion stalking a gazelle in a savannah.You've been eyeing me all day and waiting for your move like a lion stalking a gazelle in a savannah.You've been eyeing me all day and waiting for your move like a lion stalking a gazelle in a savannah. 
                        </p>
                    </div>
                </div>
                <div class="card-div">
                    <div class="card-img-BoardGame" onclick="statusCard(3)"><span class="span-title">蔥花饅頭</span></div>
                    <div class="card-text">
                        <p>
                            You've been eyeing me all day and waiting for your move like a lion stalking a gazelle in a savannah.You've been eyeing me all day and waiting for your move like a lion stalking a gazelle in a savannah.You've been eyeing me all day and waiting for your move like a lion stalking a gazelle in a savannah. 
                        </p>
                    </div>
                </div>
                <div class="card-div">
                    <div class="card-img-Sport" onclick="statusCard(4)"><span class="span-title">芋頭饅頭</span></div>
                    <div class="card-text">
                        <p>
                            You've been eyeing me all day and waiting for your move like a lion stalking a gazelle in a savannah.You've been eyeing me all day and waiting for your move like a lion stalking a gazelle in a savannah.You've been eyeing me all day and waiting for your move like a lion stalking a gazelle in a savannah. 
                        </p>
                    </div>
                </div>
                
            </section>
        </main>
        <?php
            include 'footer/footer.html';
        ?> 

    </body>
    <script src="main.js"></script>
</html>