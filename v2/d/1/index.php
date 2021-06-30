<?php
list($iNowYear, $iNowMonth, $iNowDay) = explode('-', date('Y-m-d'));

if(isset($_GET['month'])) {
    list($iMonth, $iYear) = explode('-', $_GET['month']);;
    $iMonth = (int)$iMonth;
    $iYear = (int)$iYear;
}
else {
    list($iMonth, $iYear) = explode('-', date('n-Y'));
}

$iTimestamp = mktime(0, 0, 0, $iMonth, $iNowDay, $iYear);
list($sMonthName, $iDaysInMonth) = explode('-', date('F-t', $iTimestamp));

$iPrevYear = $iYear;
$iPrevMonth = $iMonth - 1;
if($iPrevMonth <= 0) {
    $iPrevYear--;
    $iPrevMonth = 12;
}

$iNextYear = $iYear;
$iNextMonth = $iMonth + 1;
if($iNextMonth > 12) {
    $iNextYear++;
    $iNextMonth = 1;
}
// Получаем количество дней в предыдущем месяце
$iPrevDaysInMonth = (int)date('t', mktime(0, 0, 0, $iPrevMonth, $iNowDay, $iPrevYear));

// Получаем числовое представление дней недели от первого дня конкретного (текущего) месяца.
$iFirstDayDow = (int)date('w', mktime(0, 0, 0, $iMonth, 1, $iYear));

// С этого дня начинается предыдущий месяц
$iPrevShowFrom = $iPrevDaysInMonth - $iFirstDayDow + 1;

// Если предыдущий месяц
$bPreviousMonth = ($iFirstDayDow > 0);

// Тогда первый день
$iCurrentDay = ($bPreviousMonth) ? $iPrevShowFrom : 1;

$bNextMonth = false;
$sCalTblRows = '';

for ($i = 0; $i < 6; $i++) { // 6-weeks range
    $sCalTblRows .= '<div class="fc-row">';
    for ($j = 0; $j < 7; $j++) { // 7 days a week

        $sClass = '';
        if ($iNowYear == $iYear && $iNowMonth == $iMonth && $iNowDay == $iCurrentDay && !$bPreviousMonth && !$bNextMonth) {
            $sClass = 'fc-today';
        } elseif (!$bPreviousMonth && !$bNextMonth) {
            $sClass = 'current';
        }
        $sCalTblRows .= '<div  class="'.$sClass.'"><span class="fc-date '.$sClass.'">'.$iCurrentDay.'</span></div>';

        // Следующий день
        $iCurrentDay++;
        if ($bPreviousMonth && $iCurrentDay > $iPrevDaysInMonth) {
            $bPreviousMonth = false;
            $iCurrentDay = 1;
        }
        if (!$bPreviousMonth && !$bNextMonth && $iCurrentDay > $iDaysInMonth) {
            $bNextMonth = true;
            $iCurrentDay = 1;
        }
    }
    $sCalTblRows .= '</div>';
}





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
                    <a href="index.php?month=<?php echo "{$iPrevMonth}-{$iPrevYear}"?>" class="custom-btn custom-prev"></a>
                    <a href="index.php?month=<?php echo "{$iNextMonth}-{$iNextYear}"?>" class="custom-btn custom-next"></a>
                </nav>
                <h2 id="custom-month" class="custom-month"><?php echo $sMonthName?></h2>
                <h3 id="custom-year" class="custom-year"><?php echo $iYear?></h3>
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
                        <?php echo $sCalTblRows;?>
                    </div>
                </div>
            </div>
        </div>


</body>

</html>