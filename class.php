<?
class Page
{
function header()
{

	?>
	<html>
	<head>
		<title>���</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<META name="Aurhor" content="http://ailus.ru"><meta name="Copyright" content="http://ailus.ru">
		</head>

		<body leftmargin="0" topmargin="0" matginheight="0" rightmargin="0" bottommargin="0" bgcolor="#ffffff">
		<link href="images/index.css" type="text/css" rel="STYLESHEET">


		<table border=1 width=100% height=20% >

		<td width=100% height=20% align=center> ������������ ������ <br> ��������� ������ ��-153 ��������� �.�., ������� �.�.  <br> ��������: ������� �.�.
		</td>
		</table>

		<table border=1 width=100% height=70%>
		<td width=30% height=70% aling=left>

		<a href="orderform.php"> ������ ��� </a>
		<br><br>
		<a href="orderform_2.php"> ������ ��� </a>
		<br><br>
		<a href="orderform_3.php"> ������ ��� </a>
<br><br>
                <a href="orderform_3.1.php"> 3.1 </a>
		
		<br><br>
		<a href="orderform_4.php"> �������� ��� </a>
		<br><br>
		<a href="index_5.php"> ����� ��� </a>
		
		

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
		<td width=100% height=100% align=center> ��� </td>

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
        <title align=center>������������</title>

           
    </head>
    <body>
        <h1>��� 3.1</h1>
        <h2>������������</h2>
        <h3>����� ������</h3>
         
        <form action="processorder_3.php" method="post">
            <table border="0">
                <tr bgcolor=#FFC1C1>
                    <td width=150>�����</td>
                    <td width=15>����������</td>
                </tr>
                <tr>
                    <td>�</td>
                    <td align="left"><input type="text" name="tireqty" size="3" maxlength="3"></td>
                </tr>
                <tr>  
                    <td>�</td>
                    <td align="left"><input type="text" name="oilqty" size="3" maxlength="3"></td>
                </tr>
                <tr>
                    <td>�</td>
                    <td align="left"><input type="text" name="sparkqty" size="3" maxlength="3"></td>
                </tr>
                <tr>
                    <td>��� �������</td>
                    <td align="left"><input type="text" name="fio" size="40" maxlength="40"></td>
                </tr>
                <tr>
                    <td>����� ��������</td>
                    <td align="left"><input type="text" name="adress" size="40" maxlength="40"></td>
                </tr>
                <tr>
                    <td colspan="2" align="center"><input type="submit" value="��������� �����"></td>
                </tr>
            </table>
        </form>
    </body>    
</html>

<?
}

function connect ()

//������������ � ���� ������
{
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
}

function processorder($tireqty,$oilqty,$sparkqty,$fio,$adress)
{
?>
	<html>
	<head>
		<title>������������ - ���������� ������</title>
	</head>
	<body>

	<h1>��� 3.1</h1>
	<h2>������������</h2>
	<h3>���������� ������</h3>
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
    
    echo '<p>����� ��������� � ';
    echo $date;
    echo '<br />';
    echo '<p>������ ������ ������:';
    echo '<br />';
    
    if ($totalqty == 0)
    {
        echo '�� ������ �� �������� �� ���������� ��������!<br />';
    }
    else
    {
        if ($tireqty>0)
            echo $tireqty. '��. � <br />';
        if ($oilqty>0)
            echo $oilqty. '��. � <br />';
        if ($sparkqty>0)
            echo $sparkqty. '��. � <br />';
    }
	
	$total = $tireqty * TIREPRICE + $oilqty * OILPRICE + $sparkqty * SPARKPRICE;
    $total = number_format($total, 2, '.',' ');
    
    echo '<P>����� �� ������: '.$total.'</p>';
    echo '<P>��� �������: '.$fio.'</p>';
    echo '<P>����� ��������: '.$adress.'</p>';
	
	$outputstring = $products[0]. "\t".$products[1]."��. � \t".$products[2]." ��. �\t".$products[3]." ��. �\t\$".$products[4]."\t ����� �������� ������\t".$products[5]."\t ��� �������:\t".$products[6]." \n";
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

	
echo '<p>����� ��������.<p/>';
	
	
?>

<a href = "vieworders_3.php"> ��������� ��������� ��� ���������	����� ������� </a>

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
	<title>������������ - ������ ��������</title>
</head>
<body>
<h1>���</h1>
<h2>������������</h2>
<h3>3����� ��������</h3>
<?
$query_1="select zakaz.id, zakaz.fio, zakaz.adress, zakaz.data, tovar.id, tovar.tireqty, tovar.oilqty, tovar.sparkqty FROM zakaz, tovar WHERE zakaz.id= tovar.id ORDER BY zakaz.data";
$result_1=mysql_query ($query_1);
?>

<table border=1 color=black width=100% height=25%>
<tr>
<td><b>�</b></td><td><b>���</b></td><td><b>A�pec</b></td><td><b>���� ������</b></td><td><b>�</b></td><td><b>�</b></td><td><b>�</b></td>
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
