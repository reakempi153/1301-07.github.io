<?php
require('header.inc');
?>

<?php
	$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
?>
<html>
<head>
	<title>������������ - ������ ��������</title>
</head>
<body>
<h1>��� 2 </h1>
<h2>������������</h2>
<h3>������ ��������</h3>
<?php
	$fp = fopen("orders.txt", 'r');
	
	if (!$fp)
	{
		echo '<p><strong>��� ��������� �������.'
		     .'����������, ����������� �����.</strong></p>';
		exit;
	}
	
	while (!feof($fp))
	{
		$order= fgets($fp, 999);
		echo $order. '<br />';
	}

	fclose($fp);
?>
</body>
</html>

<?php
require('footer.inc');
?>
