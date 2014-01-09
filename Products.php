<?php


try {
    $pdo = new PDO('mysql:host=localhost;dbname=webpro2exam;charset=utf8;', 'root', '');
   	echo "接続成功<br />";
   }    
   catch (PDOException $e) {
    var_dump($e->getMessage());
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
<h1>商品詳細</h1>
<p>購入数を入力して、購入ボタンを押してください。</p>
<p>商品名</p>
<p>価格</p>
<p>購入数</p>
<form name="form2" method="post" action="">
  <label for="textfield"></label>
  <input type="text" name="textfield" id="textfield">
</form>

<form name="form1" method="post" action="">

  <input type="submit" name="return" id="return" value="戻る">
  <input type="submit" name="buy" id="return" value="購入する">
</form>
<p>&nbsp;</p>


<p>&nbsp;</p>
</body>
</html>