<?php
     header("Content-Type:text/html; charset=utf-8");
     $serverName="DESKTOP-AQMRNL0\SQLEXPRESS";
     $connectionInfo=array("Database"=>"SELL_408530008","UID"=>"CCU02","PWD"=>"1234","CharacterSet" => "UTF-8");
     $conn=sqlsrv_connect($serverName,$connectionInfo);
         if($conn){
            //echo "Success!!!<br /><br />";
         }else{
            //echo "Error!!!<br />";
            die(print_r(sqlsrv_errors(),true));
         }            
?>