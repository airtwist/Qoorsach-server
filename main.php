<?php
include_once('scripts/global.php');
include_once('scripts/check.php');
include_once('scripts/head.php');

$currentStudentData = getCurrentStudentData($databaseLink, $_COOKIE['id'], $_COOKIE['hash']);
print "<div class='feed' > <p style='text-align: center'>Привет, " . $currentStudentData['Student_Login'] . "<br>
 <a href='scripts/logoff.php'>Разлогин</a></p></div>"
/**
 * Created by PhpStorm.
 * User: SOAPLORD
 * Date: 21.12.15
 * Time: 23:54
 */ ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Система обучения</title>
    <link rel="stylesheet" href="css/commonStylesheet.css">
</head>
<body>
<div class="feed">
    <h1>Курс обучения утилитам</h1>
    <h2>Часть 1. Тестирование жесткого диска.</h2>
    <ul>
        <li>
            <a href="pages/HDD.php">
                Общие понятие.
            </a>
        </li>
        <li>
            <a href="pages/Victoria.php">
                Описание Victoria
            </a>
        </li>
        <li>
            <a href="pages/crystal.php">
                Описание CrystalDiskInfo
            </a>
        </li>
    </ul>
    <h2>Часть 2.Тестирование видеокарты.</h2>
    <ul>
        <li>
            <a href="pages/video.php">
                Общие понятие.
            </a>
        </li>
        <li>
            <a href="pages/hearthstoneText.php">
                Описание 3d mark.
            </a>
        </li>
    </ul>
    <h2>Часть 3. Тестирование опперативной памяти</h2>
    <ul>
        <li> <a href="pages/operative.php">
                Общие понятие
            </a>
        </li>
        <li>
            <a href="pages/furmark">
                Описание Furmark
            </a>
        </li>
    </ul>
</div>
<?php
$testsAndResults = getCurrentStudentTestResults($databaseLink, $_COOKIE['id']);
if ($testsAndResults){
    echo '<div style="text-align:center;" class="feed">
    <h1>Сданные тесты</h1>';
    echo "<table> <tr>
    <th>Название теста</th><th>Результат</th>
    </tr> ";
    foreach ($testsAndResults as $testResult){
        echo "<tr>"."<td>".$testResult[0]."</td>".
            "<td>".$testResult[1]."</td>".
            "</tr>";
    }
    echo '</div>';
}
?>

</body>
</html>
