<h1>Task 1</h1>
<form action="<?=$_SERVER["PHP_SELF"] ?>" method="post">
<input type="text" name="RedVariable" value="0" min="0" max="255">
<input type="text" name="GreenVariable" value="0"  min="0" max="255">
<input type="text" name="BlueVariable" value="0"  min="0" max="255">
<input type="submit">
</form>



<?php




echo "<h1> <span style='background: rgb($_POST[RedVariable],$_POST[GreenVariable],$_POST[BlueVariable])'>RES </span></h1>";
?>
<h1>Task 2</h1>
<form action="<?=$_SERVER["PHP_SELF"] ?>" method="post">
    <input type="number" id="Month" name="MonthToCallendar" value="0" min="0" max="12">
    <input type="submit">



<?php

$Month= $_POST['MonthToCallendar'];
GetCallendar($Month);





function GetCallendar ($month)
{
// нашли количество дней в интересующем нас месяце
$daysInMonth =date('t',mktime(0, 0, 0, $month));
// счетчик дней недели
$dayCount=1;
$weekCount=0;

    //первая неделя
    for($i = 0; $i < 7; $i++)
    {
        $dayOfWeek = date('w', mktime(0, 0, 0, $month, $dayCount, date('Y')));

        if ($dayOfWeek==0)
            $dayOfWeek=7;
        $dayOfWeek-=1;
        if ($dayOfWeek==$i)
        {
            $RESmonth[$weekCount][$i]=$dayCount;
            $dayCount++;
        }
        else
        {
            $RESmonth[$weekCount][$i]="";

        }


    }
    //все последующие
   while($dayCount<=$daysInMonth)
   {
       $weekCount++;
       for($i = 0; $i < 7; $i++)
       {
           $RESmonth[$weekCount][$i]=$dayCount;
           $dayCount++;
           if ($dayCount>$daysInMonth) break;
       }

   }

    //вывод нашел в интернете, мне было лень)
    echo "<table border=1>";

    for($i = 0; $i < count($RESmonth); $i++)
    {

        echo "<tr>";

        for($j = 0; $j < 7; $j++)

        {

            if(!empty($RESmonth[$i][$j]))

            {

                // Если имеем дело с субботой и воскресенья

                // подсвечиваем их

                if($j == 5 || $j == 6)

                    echo "<td><font color=red>".$RESmonth[$i][$j]."</font></td>";

                else echo "<td>".$RESmonth[$i][$j]."</td>";

            }

            else echo "<td>&nbsp;</td>";

        }

        echo "</tr>";

    }

    echo "</table>";


}
