<?php

try {
    $pdo = new PDO('mysql:host=localhost;dbname=webpro2exam;charset=utf8;', 'root', '');

   }    
   catch (PDOException $e) {
    var_dump($e->getMessage());
}

$res = $pdo->prepare('select count(*) from sales');
$res->execute();
$result = $res->fetchAll();
echo "<br />";
foreach ($result as $key1=>$value1){
		foreach ($value1 as $key=>$value){
			if($key=="count(*)"){
				$id=$value;
				$id++;
				}
		}
}


echo "IDは".$id;

$product_id = $_GET['id'];

$quantity=$_POST["each"];
echo "買い上げ数は".$quantity;echo "<br />";

$sales_at=date('Y-m-d H:i:s',time());
echo "時間は".$sales_at;

echo "<br />";
echo "product_idは".$product_id;

$salesdata = $pdo -> prepare("INSERT INTO sales (ID,product_id,sales_at,quantity) VALUES (:ID,:product_id,:sales_at,:quantity)");

$salesdata->bindParam(':ID', 				$id,				PDO::PARAM_STR);
$salesdata->bindParam(':product_id',	$product_id,	PDO::PARAM_STR);
$salesdata->bindParam(':sales_at',		$sales_at, 		PDO::PARAM_STR);
$salesdata->bindParam(':quantity',		$quantity,		PDO::PARAM_STR);
$salesdata->execute();

$salesdata=null;

redirect_to('sales.php');

?>