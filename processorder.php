<?php
require('header.inc');
?>
<html>
<head>
 <title>������������ - ���������� ������</title>
</head>
<body>
<h1>��� 1 </h1>
<h2>������������</h2>
<h3>���������� ������</h3>
<?php
  echo '<p>����� ��������� � ';
  echo date('H:i, jS F');
  echo '</p>';

$tireqty = $_POST['tireqty'];
$oilqty = $_POST['oilqty'];
$sparkqty = $_POST['sparkqty'];
$find = $_POST['find'];

echo '<p>������ ������ ������: </p>';
echo $tireqty . ' ��. ������ �  </br>';
echo $oilqty . ' ��. ������ � </br>';
echo $sparkqty . ' ��. ������ � </br>';


$totalqty = 0;
$totalqty = $tireqty + $oilqty + $sparkqty + $filqty;
echo '�������� �������: ' .$totalqty.'</br>';

$totalamount = 0.00;

define('TIREPRICE', 100);
define('OILPRICE', 10);
define('SPARKPRICE', 4);

$totalamount = $tireqty * TIREPRICE
+ $oilqty * OILPRICE
+ $sparkqty * SPARKPRICE;
echo '�����: $' .number_format($totalamount,3). '</br>';

$taxrate = 0.10; 
$totalamount = $totalamount * (1 + $taxrate);
echo '�����, ������� ����� � ������: $' . number_format 
($totalamount,2). '<br>';

?>
�� ������ ��� ����� �������� ��� ������� �����: <? echo $find; ?>
</body>
</html>
<?php
require('footer.inc');
?>
