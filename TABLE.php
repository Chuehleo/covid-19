<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>資料表</title>
<link rel="stylesheet" href="css/bulma.min.css">
<link rel="stylesheet" href="css/dataTables.bulma.min.css">
<script src="script/jquery-3.5.1.js"></script>
<script src="script/jquery.dataTables.min.js"></script>
<script src="script/dataTables.bulma.min.js"></script>


<script>
    
    $(document).ready(function() {
    $('#example').DataTable({
      "order": [[ 1, 'desc' ]]
    }

    );
    
} );

</script>
 
<style>
   html{
      scroll-behavior: smooth;
   }

   ::-webkit-scrollbar {
    width: 5px;
   }

   ::-webkit-scrollbar-track {
    background: #f1f1f1;
   }

   ::-webkit-scrollbar-thumb {
    background: #888;
   }

   ::-webkit-scrollbar-thumb:hover {
    background: #555;
   }

</style>

</head>
<body>
<?php
// 建立MySQL的資料庫連接 
$link = mysqli_connect("localhost","root","","covid-19")
        or die("無法開啟MySQL資料庫連接!<br/>");

 // 指定SQL查詢字串
$sql = "SELECT * FROM table1 order by ID desc ";
$records_per_page = 10000;  // 每一頁顯示的記錄筆數
// 取得URL參數的頁數


if (isset($_GET["Pages"])) $pages = $_GET["Pages"];
else                       $pages = 1;

$result = mysqli_query($link, $sql);
$total_fields=mysqli_num_fields($result); // 取得欄位數
$total_records=mysqli_num_rows($result);  // 取得記錄數
// 計算總頁數
$total_pages = ceil($total_records/$records_per_page);
// 計算這一頁第1筆記錄的位置
$offset = ($pages - 1)*$records_per_page;
$page = ceil($total_records/$records_per_page);


mysqli_data_seek($result, $offset); // 移到此記錄
/*echo "記錄總數: $total_records 筆<br/>";
echo "共: $page 頁<br/>";
echo "現在在: $pages 頁<br/>";
echo "<b >確診人數:</b><br/>";*/
while ( $meta=mysqli_fetch_field($result) )
    // 顯示查詢結果
?>    
<?php   
   echo "<table id=example class=table is-striped style=width:100%>";
   echo "<thead>";
   echo "<tr><th>ID</th><th>日期</th>";
   echo "<th>縣市</th><th>鄉鎮</th>";
   echo "<th>性別</th><th>境外</th><th>年齡</th></tr>";
echo "</tr>";
echo "</thead>";

echo "<tbody>";

$j = 1;
while ($rows = mysqli_fetch_array($result, MYSQLI_NUM)
       and $j <= $records_per_page) {
   echo "<tr>";
   for ( $i = 0; $i<= $total_fields-1; $i++ )
      echo "<td>".$rows[$i]."</td>";
   echo "</tr>";
   $j++;
}

echo "</tbody>";

echo "</table><br>";

/*if ( $pages > 1 )  // 顯示上一頁
   echo "<a href='TABLE.php?Pages=1".
        "'>首頁</a>| ";


if ( $pages > 1 )  // 顯示上一頁
   echo "<a href='TABLE.php?Pages=".($pages-1).
        "'>上一頁</a>| ";




/*for ( $i = 1; $i <= $total_pages; $i++ )
   if ($i != $pages)
     echo "<a href=\"TABLE.php?Pages=".$i."\">".$i."</a> ";
   else
     echo $i." ";


if ($pages<20){
   for ($i=1;$i<=20;$i++){
      echo "<a href=\"TABLE.php?Pages=".$i."\">".$i."</a> ";
   }
   echo  "..."."<a href=\"TABLE.php?Pages=".$total_pages."\">".$total_pages."</a> ";
}
else{
   if($pages<=$total_pages){
      if($pages+10>=$total_pages){
         for ($i=$pages-20;$i<=$total_pages;$i++){
            if ($i != $pages)
            echo "<a href=\"TABLE.php?Pages=".$i."\">".$i."</a> ";
            else
            echo $i." ";
         }
      }
      else{
         for ($i=$pages-10;$i<=$pages+10;$i++){
            if ($i != $pages)
            echo "<a href=\"TABLE.php?Pages=".$i."\">".$i."</a> ";
            else
            echo $i." ";
         }
      echo  "..."."<a href=\"TABLE.php?Pages=".$total_pages."\">".$total_pages."</a> ";
      }
   }
}

     
if ( $pages < $total_pages )  // 顯示下一頁
   echo "|<a href='TABLE.php?Pages=".($pages+1).
        "'>下一頁</a> ";

if ( $pages < $total_pages )
   echo "|<a href='TABLE.php?Pages=".$total_pages.
        "'>最終頁</a> ";
*/

mysqli_free_result($result);  // 釋放佔用的記憶體
mysqli_close($link);  // 關閉資料庫連接
?>


</body>
</html>