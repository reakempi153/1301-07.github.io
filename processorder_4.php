<?php
    require('header.inc');
?>

<?php
 //создать короткие имена переменных
  $tireqty = $_POST['tireqty'];
  $oilqty = $_POST['oilqty'];
  $sparkqty = $_POST['sparkqty'];
  $adress = $_POST['adress'];
  $document_root = $_POST['document_root'];
  $fio = $_POST['fio'];
  ?>
<html>
<head>
<title>Автозапчасти - результаты заказа </title>
</head>
<body>
<h1><center>Лаб 4</h1>
<h2><center>Автозапчасти</h2>
<h3><center>Результаты заказа</h3>

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

 echo '<p>Закак обработан в ';
 echo $date;
 echo '<br/>';
 echo '<p>Список вашего закака:';
 echo '<br/>';

 if($totalqty == 0)
 {
     echo 'Вы ничего не закакали на предыдущей странице! <br/>';
 }
 else
 {
     if ($tireqty>0)
     echo $tireqty.' А <br/>';
     if ($oilqty>0)
     echo $oilqty.' Б <br/>';
     if ($sparkqty>0)
     echo $sparkqty.' В <br/>';
 }
 $total = $tireqty * tireprice + $oilqty * oilprice + $sparkqty * sparkprice;
 $total=number_format($total, 2, '.', ' ');

 echo '<P>Итого по закаку: '.$total. '</p>';

 echo '<P>ФИО клиента: '.$fio. '</p>';

 echo '<P>Адрес доставки: '.$adress. '<br/>';
 $products=array("$date", "$tireqty", "$oilqty",  "$sparkqty", "$total", "$adress", "$fio");

 $outputstring = $products[0]. "\t".$products[1]." шт. А \t".$products[2]." шт. Б \t".$products[3]." шт. В \t\$".$products[4]." \t".$products[5]." \t" .$products[6]." \n" ;

 //Открыть файл для добавления
 $fp = fopen("orders_4.txt", 'a');
 flock($fp, LOCK_EX);
 if (!$fp)
 {
     echo'<p><strong>В настоящий момент ваш запрос не может быть обработан.' 
     .'Пожалуйста, попытайтесь позже.</strong></p>';
     exit;
 }
 fwrite($fp, $outputstring);
 flock($fp, LOCK_UN);
 fclose($fp);

 echo '<p>Заказ сохранен. </p>';
 ?>
<a href="vieworders_4.php"> Интерфейс персонала для просмотра файла заказов </a>
    
</body>
</html>

<?php
    require('footer.inc');
?>
