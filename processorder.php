<?php
require('header.inc');
?>
<html>
<head>
 <title>Автозапчасти - Результаты заказа</title>
</head>
<body>
<h1>Лаб 1 </h1>
<h2>Автозапчасти</h2>
<h3>Результаты заказа</h3>
<?php
  echo '<p>Заказ обработан в ';
  echo date('H:i, jS F');
  echo '</p>';

$tireqty = $_POST['tireqty'];
$oilqty = $_POST['oilqty'];
$sparkqty = $_POST['sparkqty'];
$find = $_POST['find'];

echo '<p>Список вашего заказа: </p>';
echo $tireqty . ' шт. товара А  </br>';
echo $oilqty . ' шт. товара Б </br>';
echo $sparkqty . ' шт. товара В </br>';


$totalqty = 0;
$totalqty = $tireqty + $oilqty + $sparkqty + $filqty;
echo 'Заказано товаров: ' .$totalqty.'</br>';

$totalamount = 0.00;

define('TIREPRICE', 100);
define('OILPRICE', 10);
define('SPARKPRICE', 4);

$totalamount = $tireqty * TIREPRICE
+ $oilqty * OILPRICE
+ $sparkqty * SPARKPRICE;
echo 'Итого: $' .number_format($totalamount,3). '</br>';

$taxrate = 0.10; 
$totalamount = $totalamount * (1 + $taxrate);
echo 'Всего, включая налог с продаж: $' . number_format 
($totalamount,2). '<br>';

?>
На вопрос как нашли компанию был получен ответ: <? echo $find; ?>
</body>
</html>
<?php
require('footer.inc');
?>
