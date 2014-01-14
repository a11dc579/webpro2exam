<?php
$id = $_GET['id']+1;
echo $id;

try {
    $pdo = new PDO('mysql:host=localhost;dbname=webpro2exam;charset=utf8;', 'root', '');

   }    
   catch (PDOException $e) {
    var_dump($e->getMessage());
}

$sth = $pdo->prepare("select * from products where id=$id");
$sth->execute();
$result = $sth->fetchAll();

foreach($result as $key=>$array){
	$proID=$array["ID"];
	$proName=$array["name"];
	$proPrice=$array["price"];

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

<h1>商品詳細</h1>
<p>購入数を入力して、購入ボタンを押してください。</p>

<p>商品名</p>
<?php echo $proName;?>

<p>価格</p>
<?php echo $proPrice;?>

<p>購入数</p>
 <form name="form2" method="post" action="products_controller.php<?php echo "?id=$id ";?>">
	<input type="text" name="each">
	<input type="submit" name="buy" value="購入する" onDblClick="">
</form>

<form name="form2" method="post" action="index.php">
	<input type="submit" name="return" id="return"value="戻る">
</form>
</body>
</html>