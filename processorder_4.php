<?php
    require('header.inc');
?>

<?php
 //������� �������� ����� ����������
  $tireqty = $_POST['tireqty'];
  $oilqty = $_POST['oilqty'];
  $sparkqty = $_POST['sparkqty'];
  $adress = $_POST['adress'];
  $document_root = $_POST['document_root'];
  $fio = $_POST['fio'];
  ?>
<html>
<head>
<title>������������ - ���������� ������ </title>
</head>
<body>
<h1><center>��� 4</h1>
<h2><center>������������</h2>
<h3><center>���������� ������</h3>

<?php
$totalqty = 0;
 $totalqty += $tireqty;
 $totalqty += $oilqty;
 $totalqty += $sparkqty;

 $totalamount = 0.00;

 define('tireprice',100);
 define('oilprice',10);
 define('sparkprice',4);

 $date = date('H:i, js F');

 echo '<p>����� ��������� � ';
 echo $date;
 echo '<br/>';
 echo '<p>������ ������ ������:';
 echo '<br/>';

 if($totalqty == 0)
 {
     echo '�� ������ �� �������� �� ���������� ��������! <br/>';
 }
 else
 {
     if ($tireqty>0)
     echo $tireqty.' � <br/>';
     if ($oilqty>0)
     echo $oilqty.' � <br/>';
     if ($sparkqty>0)
     echo $sparkqty.' � <br/>';
 }
 $total = $tireqty * tireprice + $oilqty * oilprice + $sparkqty * sparkprice;
 $total=number_format($total, 2, '.', ' ');

 echo '<P>����� �� ������: '.$total. '</p>';

 echo '<P>��� �������: '.$fio. '</p>';

 echo '<P>����� ��������: '.$adress. '<br/>';
 $products=array("$date", "$tireqty", "$oilqty",  "$sparkqty", "$total", "$adress", "$fio");

 $outputstring = $products[0]. "\t".$products[1]." ��. � \t".$products[2]." ��. � \t".$products[3]." ��. � \t\$".$products[4]." \t".$products[5]." \t" .$products[6]." \n" ;

 //������� ���� ��� ����������
 $fp = fopen("orders_4.txt", 'a');
 flock($fp, LOCK_EX);
 if (!$fp)
 {
     echo'<p><strong>� ��������� ������ ��� ������ �� ����� ���� ���������.' 
     .'����������, ����������� �����.</strong></p>';
     exit;
 }
 fwrite($fp, $outputstring);
 flock($fp, LOCK_UN);
 fclose($fp);

 echo '<p>����� ��������. </p>';
 ?>
<a href="vieworders_4.php"> ��������� ��������� ��� ��������� ����� ������� </a>
    
</body>
</html>

<?php
    require('footer.inc');
?>
