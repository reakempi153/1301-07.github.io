<?php
require('header.inc');
?>

<?php
//Создать короткие имена переменных
$tireqty = $_POST['tireqty'];
$oilqty = $_POST['oilqty'];
$sparkqty = $_POST['sparkqty'];
$fio = $_POST['fio'];
$adress = $_POST['adress'];
$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];

//подключаемся к базе данных
$hostname="localhost";
$user="root";
$password="";
$db="lablab3";

if(!$link = mysql_connect($hostname, $user, $password))
{
//echo "<br> не могу соединиться с сервером базы данных <br>";
exit();
}
echo "<br> Соединение с сервером базы данных прошло успешно <br>";

if (!mysql_select_db($db, $link))
{
//echo "<br> не могу выбрать базу данных <br>";
exit();
}
else
{
//echo "<br> выбор базы данных прошел успешно <br>";
}

?>
<html>
<head>
<title>Автозапчасти - результаты заказа</title>
</head>
<body>
<h1>Лаб 3</h1>
<h2>Автозапчасти</h2>
<h3>Результаты заказа</h3>

<?php
$totalqty = 0;
$totalqty += $tireqty;
$totalqty += $oilqty;
$totalqty += $sparkqty;

$totalamount = 0.00;

define('TIREPRICE', 100);
define('OILPRICE', 10);
define('SPARKPRICE', 4);

$date = date('H:i, js F');
echo '<p>Заказ обработн в';
echo $date;
echo '<br/>';
echo '<p>Список вашего заказа: ';
echo '<br />';

if ($totalqty == 0)
	{ 
	echo 'Вы ничего не заказывали на предудщей странице! <br/>';
	}

	else 
	
{
if ($tireqty>0)
	echo $tireqty. 'шт. товара А<br/>';
if ($oilqty>0)
	echo $oilqty. 'шт. товара Б<br/>';
if ($sparkqty>0)
	echo $sparkqty. 'шт. товара В<br/>';
}

	
$total = $tireqty * TIREPRICE + $oilqty * OILPRICE + $sparkqty * SPARKPRICE;
$total = number_format ($total,2,'.',' ');


echo '<p> Итого по заказу: $'.$total.'<p/>';
echo '<p> ФИО клиента:'.$fio.'<p/>';
echo '<p> Адрес доставки:'.$adress.'<br/>';

$outputstring =$date."\t".$tireqty." шт. товара А \t". $oilqty." шт. товара Б\t".$sparkqty." шт. товара С\t\$".$total."\t Адрес доставки товара\t".$adress."\t ФИО клиента:".$fio."\n";



$date_1=date ("y-m-d H:i:s", mktime());


$query="insert into zakaz (fio,adress,data) values ('$fio', '$adress', '$date_1')";
$result=mysql_query ($query);

$query_1="select zakaz.id from zakaz where zakaz.fio ='$fio' ";
$result_1= mysql_query ($query_1);

while ($row=mysql_fetch_array ($result_1)) 
{
$id=$row["id"];
}

$query ="insert into tovar (id,tireqty,oilqty,sparkqty) values ('$id','$tireqty','$oilqty','$sparkqty')";
$result=mysql_query ($query);

echo '<p>Заказ сохранен.<p/>';

?>

<a href = "vieworders_3.php"> Интерфейс персонала для просмотра	файла заказов </a>

</body>
</html>
<?php
require('footer.inc');
?>

