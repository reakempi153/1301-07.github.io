<?php
require('header.inc');
?>
<html>
<head>
 <title>������������</title>

</head>
<body>
<h1>��� 3 </h1>
<h2>������������</h2>
<h3>����� ������</h3>

<form action="processorder_3.php"  method=post>
<table border=0>
<tr bgcolor=#6A5ACD>
  <td width=150>To�ap</td>
<td width=15>K���������</td>
</tr>
<tr>
<td>�</td>
<td align=" left"><input type="text" name="tireqty" size= "�" maxlength="3"></td>
</tr>
<tr>
<td>�</td>
<td align= "left"><input type="text" name="oilqty" 512�="3" maxlength="3"></td>
</tr>
<tr>
<td>�</td>
<td align="left"><input type="text" name="sparkqty" size= "�" maxlength="3"></td>
</tr>
<tr>
<td>��� �������</td>
<td align="left"><input type="text" name="fio" size= "40" maxlength="40"></td>
</tr>
<tr>
<td>����� ��������</td>
<td align="left"><input type="text" name="adress" size= "40" maxlength="40"></td>
</tr>
<tr>
<td colspan="2" align="center"><input type="submit" value= "��������� �����"></td>
</tr>
</table>
</form>
</body>
</html>
<?php
require('footer.inc');
?>
