<?php
/*if (isset($_REQUEST['date']))
{
    //Проверяем, не пришло ли чего лишнего...
    $pattern = "/^([0-9]{4})-([0-9]{2})-([0-9]{2})$/";
    if (preg_match($pattern, $_REQUEST['date'])) {
        $date = $_REQUEST['date'];
    } else {
        die('Неправильный параметр');
    }
}
else
{
    $date=date("Y-m-d");
}
$sd = explode("-", $date);
$year 	= $sd[0];
$month = $sd[1];
$day 	= $sd[2];

// Вычисляем число дней в текущем месяце
$dayofmonth = date('t',
    mktime(0, 0, 0, $month, 1, $year));
  $day_count = 1;

  // 1. Первая неделя
  $num = 0;
  for($i = 0; $i < 7; $i++)
  {
    // Вычисляем номер дня недели для числа
    $dayofweek = date('w',
                      mktime(0, 0, 0, $month, $day_count, $year));
    // Приводим к числа к формату 1 - понедельник, ..., 6 - суббота
    $dayofweek = $dayofweek - 1;
    if($dayofweek == -1) $dayofweek = 6;

    if($dayofweek == $i)
    {
      // Если дни недели совпадают,
      // заполняем массив $week
      // числами месяца
      $week[$num][$i] = $day_count;
      $day_count++;
    }
    else
    {
      $week[$num][$i] = "";
    }
  }

  // 2. Последующие недели месяца
  while(true)
  {
    $num++;
    for($i = 0; $i < 7; $i++)
    {
      $week[$num][$i] = $day_count;
      $day_count++;
      // Если достигли конца месяца - выходим
      // из цикла
      if($day_count > $dayofmonth) break;
    }
    // Если достигли конца месяца - выходим
    // из цикла
    if($day_count > $dayofmonth) break;
  }

  // 3. Выводим содержимое массива $week
  // в виде календаря
  // Выводим таблицу
  echo '<table id="calendar">';
  //заголовок
  $rusdays = array('ПН','ВТ','СР','ЧТ','ПТ','СБ','ВС');
  $rusmonth = array('Январь','Февраль','Март','Апрель','Май','Июнь','Июль','Август','Сентябрь','Октябрь','Ноябрь','Декабрь');
  echo '<thead>
			<tr>
				<td onclick="monthf(\'prev\');"><</td>
				<td colspan="5">'.$rusmonth[$month-1].', '.$year.'</td>
				<td onclick="monthf(\'next\');">></td>
			</tr>';
  echo '<tr>';
  foreach ($rusdays as $rusday){
	echo '<td>'.$rusday.'</td>';
  }
  echo '</tr>';
  echo '</thead>';
  //тело календаря
  for($i = 0; $i < count($week); $i++)
  {
    echo "<tr>";
    for($j = 0; $j < 7; $j++)
    {
      if(!empty($week[$i][$j]))
      {

		// Если имеем дело с выбраной датой подсвечиваем ee
		if($week[$i][$j]==$day)
		{
			echo '<td class="today">';
		}
		else
		{
			echo '<td>';
		}

			echo $week[$i][$j];

        echo '</td>';
      }
      else echo "<td> </td>";
    }
    echo "</tr>";
  }*/

    $debug = false;
    if(isset($_REQUEST['month'])) {
        $date = date('Y-m-d', mktime(0, 0, 0, $_REQUEST['month'], date('d'), date('Y')));
    }
    else
    $date = date('Y-m-d');

    $split = explode('-', $date);
    if($debug) echo print_r($split);
    $year =  $split[0];
    $month = $split[1];
    $day = $split[2];

    print_r($month);

    //Дней в месяце
    $dayofmonth = date('t', mktime(0, 0, 0, $month, 1, $year));
    if($debug) echo 'Дней в месяце' . $dayofmonth;

    $day_count = 1;
    $num = 0; //Количество недель

    for ($i = 0; $i < 7; $i++ )
    {
        $dayOfWeek = date('w',
        mktime(0, 0, 0, $month, $day_count, $year));

        $dayOfWeek -= 1;
        if($dayOfWeek == -1) $dayOfWeek = 6;

        if($dayOfWeek == $i) {
            $week[$num][$i] = $day_count;
            $day_count++;
        }
        else {
            $week[$num][$i] = "";
        }
    }

    while (true)
    {
        $num++;

        for ($i = 0; $i < 7; $i++)
        {
            $week[$num][$i] = $day_count;
            $day_count++;
            // Если достигли конца месяца - выходим
            // из цикла
            if($day_count > $dayofmonth) break;
        }

        if($day_count > $dayofmonth) break;
    }

    if ($debug) echo print_r($week);
?>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="calendar.css">
</head>

<body>


    <div class="custom-calendar-wrap">
        <div class="custom-inner">
            <div class="custom-header clearfix">
                <nav>
                    <?php
                    $prev = $month - 1;
                    if($prev < 0) $month = 12;
                    $next = $month + 1;
                    if($next > 12) $next = 1;
                    ?>
                    <a href="?month=<?= $prev?>" class="custom-btn custom-prev"></a>
                    <a href="?month=<?= $next?>" class="custom-btn custom-next"></a>
                </nav>
                <h2 id="custom-month" class="custom-month"><?= date("F", mktime(0, 0, 0, $month, 1, $year))?></h2>
                <h3 id="custom-year" class="custom-year"><?= $year?></h3>
            </div>
            <div id="calendar" class="fc-calendar-container">
                <div class="fc-calendar fc-five-rows">
                    <div class="fc-head">
                        <div>Sun</div>
                        <div>Mon</div>
                        <div>Tue</div>
                        <div>Wed</div>
                        <div>Thu</div>
                        <div>Fri</div>
                        <div>Sat</div>
                    </div>
                    <div class="fc-body">
                        <?php
                        for ($i = 0; $i < count($week); $i++)
                        {
                            echo "<div class=\"fc-row\">";
                            for ($j = 0; $j < 7; $j++)
                            {
                                if(!empty($week[$i][$j]))
                                {
                                    if($week[$i][$j] == $day)
                                    {
                                        echo "<div class=\"fc-today\"><span class=\"fc-date\">";
                                    }
                                    else echo "<div><span class=\"fc-date\">";

                                    echo $week[$i][$j];
                                    echo "</span></div>";
                                }
                                else {
                                    echo "<div><span class=\"fc-date\"></span></div>";
                                }
                            }
                            echo "</div>";
                        }

                        ?>
                    </div>
                </div>
            </div>
        </div>


</body>

</html>
