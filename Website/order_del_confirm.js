console.log("hello");
let del = confirm('確定要刪除 $Name 的訂單$Orderid 資料嗎?');
if(del){
    alert("success");
}else{
    document.location='order_delete.php';
}