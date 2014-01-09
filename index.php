<?php
function getdata(){
try {
    $pdo = new PDO('mysql:host=localhost;dbname=webpro2exam;charset=utf8;', 'root', '');

   }    
   catch (PDOException $e) {
    var_dump($e->getMessage());
}




$sth = $pdo->prepare('select name from products');
$sth->execute();
$result = $sth->fetchAll();

/*print_r($result);*/

foreach($result as $key1=>$value1){
	$key=$key1+1;
/*	echo $key;*/
	foreach($value1 as $key2=>$value2){
	/*		echo '$key2:';
			echo $key2;
			echo "<br />";
			echo '$value2:';
			echo $value2;*/
			
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
<p>商品一覧</p><p>売上一覧</p>
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
<!--<form action="Products.php" method="post">

        <ul class="products">
          <li><a href="products.php" name="1">ふとんクリーナー</a></li>
          <li><a href="products.php" name="2">ダイソンコードレスクリーナー</a></li>
          <li><a href="products.php" name="3" >ロボット掃除機</a></li>
          <li><a href="products.php" name="4">ブラザーコンピュータミシン</a></li>
          <li><a href="products.php" name="5">毛玉取り器</a></li>
          <li><a href="products.php" name="6">ふとん専用ダニクリーナー</a></li>
          <li><a href="products.php" name="7">全自動洗濯機</a></li>
          <li><a href="products.php" name="8">コードレスアイロン</a></li>
        </ul>

</form>-->

</body>
</html>