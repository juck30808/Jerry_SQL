<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
</head>
<body>
<?php
if ( isset($_POST["Query"]) ) {
   // 取得SQL指令
   $sql1 = "SELECT * FROM member;
   
   // 開啟MySQL的資料庫連接
   $link = @mysqli_connect("localhost", "root", "") 
         or die("無法開啟MySQL資料庫連接!<br/>");
   mysqli_select_db($link, "onlinebookstore");  // 選擇myschool資料庫
   //送出UTF8編碼的MySQL指令
   mysqli_query($link, 'SET NAMES utf8'); 
   // 執行SQL查詢
   $result = @mysqli_query($link, $sql1); 
   echo "<table border='1'>
<tr>
<th>M_ID</th>
<th>Account</th>
<th>Password</th>
<th>M_Name</th>
<th>M_Address</th>
<th>Birthday</th>
<th>Tel</th>
</tr>";
echo "</tr>"; 
$total_fields = mysqli_num_fields($result);
// 顯示每一筆記錄
while ($row = mysqli_fetch_row($result)) {
   echo "<tr>"; // 顯示每一筆記錄的欄位值
   for ( $i = 0; $i <= $total_fields-1; $i++ )
     echo "<td>" . $row[$i] . "</td>";
   echo "</tr>";
}
echo "</table>";
mysqli_free_result($result); // 釋放佔用記憶體  
}
?>
</br>
<form action="index.html#intro.html">

<input type="submit" value="回查詢畫面">

</form>
<hr>
</body>
</html>