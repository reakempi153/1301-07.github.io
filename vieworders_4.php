<?php
    require('header.inc');
?>

<h2><center>������������</center></h2>
<h3><center>������ ��������</center></h3>
<?php
//���������� ����� �����
//������ ����� ���������� ��������� �������
$orders=file("orders_4.txt");
//������� ���������� �������, ���������� � �������
$number_of_orders = count($orders);

echo "$number_of_orders";
if ($number_of_orders == 0)
{
    echo '<p><strong> ��� ��������� �������.
          ����������, ����������� �����.</p></strong>';
}
echo '<table border=1>';
echo '<tr><th bgcolor = \"#90EE90\"> ���� ������ </th>' .
          '<th bgcolor = \"#6A5ACD\"> � </th>' .
          '<th bgcolor = \"#6A5ACD\"> � </th>' .
          '<th bgcolor = \"#6A5ACD\"> � </th>' .
          '<th bgcolor = \"#CC3399\"> ����� </th>' .
          '<th bgcolor = \"#6A5ACD\"> ����� ������� </th>' .
          '<th bgcolor = \"#90EE90\"> ��� ������� </th>' .
          '<tr>';

for ($i=0; $i<$number_of_orders; $i++)
{
    //��������� �����
    $line = explode( "\t", $orders[$i] );
    //���������� ������ ���������� ���������� �������
  
    //����� �������
    echo "<tr><td>$line[0]</td>
              <td align='right'>$line[1]</td>
              <td align='right'>$line[2]</td>
              <td align='right'>$line[3]</td>
              <td align='right'>$line[4]</td>
              <td>$line[5]</td>
              <td>$line[6]</td>
              
    </tr>";
}
echo "</table>";

    require('footer.inc');
?>
