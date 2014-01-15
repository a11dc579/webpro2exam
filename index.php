<?php

function getdata(){
require_once('other/pdo.php');
$sth = $pdo->prepare('select name from products');
$sth->execute();
$result = $sth->fetchAll();

foreach($result as $key1=>$value1){
	$key=$key1;

	foreach($value1 as $key2=>$value2){

			
			if($key2==="name"){
			echo "<li><a href="."products.php?id=$key".">";

			echo $value2;
			echo "</a></li>";
			}
		
	}

	}
	$pdo = null;
}

?>

<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>無題ドキュメント</title>
</head>

<body>
<p><a href="index.php">商品一覧</a></p><p><a href="sales.php">売上一覧</a></p>
<p>&nbsp;</p>
<h1>商品一覧</h1>
<p>購入したい商品を選択してください</p>
<form action="Products.php" method="post">
<ul class="products">
<?php

getdata();

?>
 </ul>
</form>

</body>
</html>