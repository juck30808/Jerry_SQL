<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
</head>
<body>
<?php
if ( isset($_POST["Query"]) ) {
	$bid = $_POST["bid"];
	$bna = $_POST["bna"];
	$pid = $_POST["pid"];
	$bpr = $_POST["bpr"];
	$bISBN = $_POST["bISBN"];
	$bar = $_POST["bar"];
   // 取得SQL指令
   $sql = "UPDATE book SET B_name='".$bna."', P_ID='".$pid."', Price='".$bpr.
   "', ISBN='".$bISBN."', Author='".$bar.
   "' WHERE B_ID='".$bid."'";
   
   // 開啟MySQL的資料庫連接
   $link = @mysqli_connect("localhost", "root", "") 
         or die("無法開啟MySQL資料庫連接!<br/>");
   mysqli_select_db($link, "teamwork3");  // 選擇myschool資料庫
   //送出UTF8編碼的MySQL指令
   mysqli_query($link, 'SET NAMES utf8'); 
   // 執行SQL查詢
   if (mysqli_query($link, $sql)) {
    echo "Update成功!!"."</br>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($link);
}
   
mysqli_close($link);
}


?>

<hr><form action="index2.php">
<input type="submit" value="返回">
</form>

</body>
</html>