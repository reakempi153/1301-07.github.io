<?
class Page
{
function header()
{

	?>
	<html>
	<head>
		<title>РЭУ</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<META name="Aurhor" content="http://ailus.ru"><meta name="Copyright" content="http://ailus.ru">
		</head>

		<body leftmargin="0" topmargin="0" matginheight="0" rightmargin="0" bottommargin="0" bgcolor="#ffffff">
		<link href="images/index.css" type="text/css" rel="STYLESHEET">


		<table border=1 width=100% height=20% >

		<td width=100% height=20% align=center> Лабороторные работы <br> студентов группы ПИ-153 Кириллова Н.О., Циркель Т.А.  <br> Проверил: Назимов А.С.
		</td>
		</table>

		<table border=1 width=100% height=70%>
		<td width=30% height=70% aling=left>

		<a href="orderform.php"> Первая лаб </a>
		<br><br>
		<a href="orderform_2.php"> Вторая лаб </a>
		<br><br>
		<a href="orderform_3.php"> Третья лаб </a>
<br><br>
                <a href="orderform_3.1.php"> 3.1 </a>
		
		<br><br>
		<a href="orderform_4.php"> Четвёртая лаб </a>
		<br><br>
		<a href="index_5.php"> Пятая лаб </a>
		
		

		</td>
		<td width=70% height=70% aling=center>

		
 <?
 }
	function footer()
	{
		
		?>
		</td>
		</table>

		<table border=1 width=100% height=10% >
		<td width=100% height=100% align=center> РЭУ </td>

		</table>


		</body>
		</html>
		<?
}
		
		
	function orderform()
	{
	?>
		<html>
                    
    <head>
        <title align=center>Автозапчасти</title>

           
    </head>
    <body>
        <h1>Лаб 3.1</h1>
        <h2>Автозапчасти</h2>
        <h3>Форма заказа</h3>
         
        <form action="processorder_3.php" method="post">
            <table border="0">
                <tr bgcolor=#FFC1C1>
                    <td width=150>Товар</td>
                    <td width=15>Количество</td>
                </tr>
                <tr>
                    <td>А</td>
                    <td align="left"><input type="text" name="tireqty" size="3" maxlength="3"></td>
                </tr>
                <tr>  
                    <td>Б</td>
                    <td align="left"><input type="text" name="oilqty" size="3" maxlength="3"></td>
                </tr>
                <tr>
                    <td>В</td>
                    <td align="left"><input type="text" name="sparkqty" size="3" maxlength="3"></td>
                </tr>
                <tr>
                    <td>ФИО клиента</td>
                    <td align="left"><input type="text" name="fio" size="40" maxlength="40"></td>
                </tr>
                <tr>
                    <td>Адрес доставки</td>
                    <td align="left"><input type="text" name="adress" size="40" maxlength="40"></td>
                </tr>
                <tr>
                    <td colspan="2" align="center"><input type="submit" value="Отправить заказ"></td>
                </tr>
            </table>
        </form>
    </body>    
</html>

<?
}

function connect ()

//подключаемся к базе данных
{
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
}

function processorder($tireqty,$oilqty,$sparkqty,$fio,$adress)
{
?>
	<html>
	<head>
		<title>Автозапчасти - Результаты заказа</title>
	</head>
	<body>

	<h1>Лаб 3.1</h1>
	<h2>Автозапчасти</h2>
	<h3>Результаты заказа</h3>
<?

$totalqty = 0;
    $totalqty += $tireqty;
    $totalqty += $oilqty;
    $totalqty += $sparkqty;
    
    $totalamount = 0.00;
    
    define('TIREPRICE', 100);
    define('OILPRICE', 10);
    define('SPARKPRICE', 4);
    
    $date = date('H:i, js F');
    
    echo '<p>Заказ обработан в ';
    echo $date;
    echo '<br />';
    echo '<p>Список вашего заказа:';
    echo '<br />';
    
    if ($totalqty == 0)
    {
        echo 'Вы ничего не заказали на предыдущей странице!<br />';
    }
    else
    {
        if ($tireqty>0)
            echo $tireqty. 'шт. А <br />';
        if ($oilqty>0)
            echo $oilqty. 'шт. Б <br />';
        if ($sparkqty>0)
            echo $sparkqty. 'шт. В <br />';
    }
	
	$total = $tireqty * TIREPRICE + $oilqty * OILPRICE + $sparkqty * SPARKPRICE;
    $total = number_format($total, 2, '.',' ');
    
    echo '<P>Итого по заказу: '.$total.'</p>';
    echo '<P>ФИО клиента: '.$fio.'</p>';
    echo '<P>Адрес доставки: '.$adress.'</p>';
	
	$outputstring = $products[0]. "\t".$products[1]."шт. А \t".$products[2]." шт. Б\t".$products[3]." шт. В\t\$".$products[4]."\t Адрес доставки товара\t".$products[5]."\t ФИО клиента:\t".$products[6]." \n";
	$date_1=date ("y-m-d H:i:s", mktime());


	$query="insert into zakaz (fio,adress,data) values ('$fio', '$adress', '$date_1')";
	$result=mysql_query ($query);

	$query_1="select zakaz.id from zakaz where zakaz.fio ='$fio' ";
	$result_1= mysql_query ($query_1);

	while ($row=mysql_fetch_array ($result_1)) {
	$id=$row["id"];
	}

$query ="insert into tovar (id,tireqty,oilqty,sparkqty) values ('$id','$tireqty','$oilqty','$sparkqty')";
$result=mysql_query ($query);

	
echo '<p>Заказ сохранен.<p/>';
	
	
?>

<a href = "vieworders_3.php"> интерфейс персонала для просмотра	файла заказов </a>

</body>
</html>

<?
}

	function vieworders()
	{
	$DOCUMENT_ROOT = $HTTP_SERVER_VARS [' DOCUMENT_ROOT'];
?>
<html>
<head>
	<title>Автозапчасти - Заказы клиентов</title>
</head>
<body>
<h1>лаб</h1>
<h2>Автозапчасти</h2>
<h3>3аказы клиентов</h3>
<?
$query_1="select zakaz.id, zakaz.fio, zakaz.adress, zakaz.data, tovar.id, tovar.tireqty, tovar.oilqty, tovar.sparkqty FROM zakaz, tovar WHERE zakaz.id= tovar.id ORDER BY zakaz.data";
$result_1=mysql_query ($query_1);
?>

<table border=1 color=black width=100% height=25%>
<tr>
<td><b>№</b></td><td><b>ФИО</b></td><td><b>Aдpec</b></td><td><b>Дата заказа</b></td><td><b>А</b></td><td><b>Б</b></td><td><b>В</b></td>
<?

while ($row_1=mysql_fetch_array ($result_1)) 
{

$id=$row_1["id"];
$fio=$row_1["fio"];
$adress=$row_1["adress"];
$data=$row_1["data"];
$tireqty=$row_1["tireqty"];
$oilqty=$row_1 ["oilqty"];
$sparkqty=$row_1["sparkqty"];

?><tr>

<td> <? echo $id ?> </td><td> <? echo $fio ?> </td><td> <? echo $adress ?> </td><td> <? echo $data ?> </td><td> <? echo $tireqty ?> </td> <td> <? echo $oilqty ?> </td><td> <? echo $sparkqty ?> </td>

</tr>

<?

}

?></table> 
  </body>
  </html>
<?
	}

}	
	?>
