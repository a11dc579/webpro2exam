  <?php
require_once('other/utils.php');
require_once('other/pdo.php');
require_once('other/even.php');

  /*商品を売った時間*/
$res = $pdo->prepare('select sales_at from sales ');
$res->execute();
$saleTime = $res->fetchAll();
foreach ($saleTime as $key=>$value){
	$i=0;
	foreach($value as $key=>$value){
		$i++;
		if(is_even($i)){$sales_at[]=$value;}
		}
	}

/*商品を売った数*/
$res = $pdo->prepare('select quantity from sales ');
$res->execute();
$each = $res->fetchAll();
foreach ($each as $key=>$value){
	$i=0;
	foreach($value as  $key=>$value){
		$i++;
		if(is_even($i)){$quantity[]=$value;}
		}
	}

/*商品のID*/
$res = $pdo->prepare('select product_id from sales ');
$res->execute();
$proId = $res->fetchAll();
foreach ($proId as $key=>$value){
	$i=0;
	foreach($value as  $key=>$value){
		$i++;
		if(is_even($i)){
			$product_id[]=$value;
		}
		}
	}

foreach($product_id as $key=>$value){
$res = $pdo->prepare("select * from products where ID=$value");
$res->execute();
$proData= $res->fetchAll();

foreach($proData as $key=>$value){
	foreach($value as $key=>$value){
		 if($key=="name"){$Name[]=$value;}
 	 	 if($key=="price"){$Price[]=$value;}
			}
	 }
}
/*商品の価額*/
$i=0;
foreach ($Price as $key=>$value){
		$i++;
	if(is_even($i)){
			$proPrice[]=$value;
		}

	}
/*商品名*/
$i=0;
foreach ($Name as $key=>$value){
		$i++;
	if(is_even($i)){
			$proName[]=$value;
		}

	}
/*売った商品の合計価額*/
$len=count($proPrice);
for ($i=0;$i<$len;$i++){		$AllPrice[]=$proPrice[$i]*$product_id[$i]; 	}


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
<h1>売上一覧</h1>
これまでに購入された商品の一覧です。
<table width="791" border="1">
  <tr>
    <th width="61" scope="col">日時</th>
    <th width="241" scope="col">商品名</th>
    <th width="193" scope="col">個数</th>
    <th width="268" scope="col">合計（個数＊単価）</th>
  </tr>
 
  <?php
  /*$sales_at    $proName   $product_id    $AllPrice*/
  for ($i=0;$i<$len;$i++){	
 	  echo "<tr>";	
 	  echo"<th>". $sales_at[$i]."</th>";
	  echo"<th>". $proName[$i]."</th>";
	  echo"<th>". $product_id[$i]."</th>";
	  echo"<th>". $AllPrice[$i]."</th>";
	  echo "</tr>";	
  }
  ?>


</table>

</body>
</html>