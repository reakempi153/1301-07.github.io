<?php
require('header.inc');
?>

<?php
//������� �������� ����� ����������
$tireqty = $_POST['tireqty'];
$oilqty = $_POST['oilqty'];
$sparkqty = $_POST['sparkqty'];
$fio = $_POST['fio'];
$adress = $_POST['adress'];
$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];

//������������ � ���� ������
$hostname="localhost";
$user="root";
$password="";
$db="lablab3";

if(!$link = mysql_connect($hostname, $user, $password))
{
//echo "<br> �� ���� ����������� � �������� ���� ������ <br>";
exit();
}
echo "<br> ���������� � �������� ���� ������ ������ ������� <br>";

if (!mysql_select_db($db, $link))
{
//echo "<br> �� ���� ������� ���� ������ <br>";
exit();
}
else
{
//echo "<br> ����� ���� ������ ������ ������� <br>";
}

?>
<html>
<head>
<title>������������ - ���������� ������</title>
</head>
<body>
<h1>��� 3</h1>
<h2>������������</h2>
<h3>���������� ������</h3>

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
echo '<p>����� �������� �';
echo $date;
echo '<br/>';
echo '<p>������ ������ ������: ';
echo '<br />';

if ($totalqty == 0)
	{ 
	echo '�� ������ �� ���������� �� ��������� ��������! <br/>';
	}

	else 
	
{
if ($tireqty>0)
	echo $tireqty. '��. ������ �<br/>';
if ($oilqty>0)
	echo $oilqty. '��. ������ �<br/>';
if ($sparkqty>0)
	echo $sparkqty. '��. ������ �<br/>';
}

	
$total = $tireqty * TIREPRICE + $oilqty * OILPRICE + $sparkqty * SPARKPRICE;
$total = number_format ($total,2,'.',' ');


echo '<p> ����� �� ������: $'.$total.'<p/>';
echo '<p> ��� �������:'.$fio.'<p/>';
echo '<p> ����� ��������:'.$adress.'<br/>';

$outputstring =$date."\t".$tireqty." ��. ������ � \t". $oilqty." ��. ������ �\t".$sparkqty." ��. ������ �\t\$".$total."\t ����� �������� ������\t".$adress."\t ��� �������:".$fio."\n";



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

echo '<p>����� ��������.<p/>';

?>

<a href = "vieworders_3.php"> ��������� ��������� ��� ���������	����� ������� </a>

</body>
</html>
<?php
require('footer.inc');
?>

