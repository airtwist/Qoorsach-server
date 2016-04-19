<?php
include_once('../scripts/global.php');
include_once("../scripts/check.php");
include_once('../scripts/head.php');
if ($_POST) {
    $testName = 'UtilityTest';
    echo '<div class="feed">';
    if (getTestResults($databaseLink, $_COOKIE['id'], $testName)) {
        echo 'Вы уже проходили этот тест и не можете пройти его снова<br>';
    } else {
        $correctAnswers = ['Жесткий диск', 'Япония', 'Программа тестирования компонентов', 'Выявление проблем', '3d mark'];
        $maxResult = 10;
        $result = 0;
        for ($iter = 0; $iter < $maxResult; $iter++) {
            if ($_POST['q' . strval($iter + 1)] == $correctAnswers[$iter]) {
                $result++;
            }
        }
        echo 'Ваш результат:' . $result . ' из ' . $maxResult . ', что есть ' . round($result * 10 / $maxResult) . ' баллов из 10';
        if (round($result * 10 / $maxResult) > 5) {
            echo '<br>
            Вы успешно сдали тест.';
            setTestResults($databaseLink, $_COOKIE['id'], $testName, round($result * 10 / $maxResult));
        } else {
            echo '<br>
            Вы набрали слишком мало баллов и не сдали этот тест.<br>
            Рекомендуется повторно ознакомиться с материалом по этому тесту';
        }
    }
    echo '<br><a href="/main.php">На главную</a></div>';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Тест: существительные</title>
    <link rel="stylesheet" href="/css/commonStylesheet.css">
</head>
<body>
<form name="fgsfds" method="post" class="feed">
    <h1>Тест по тестирующим программам </h1>
    <div class="question">
        <p>1.Для какого компонента персонального компьютера служит диагностирующия тестирующая программа Victoria. </p>
        <div class="answer">
            <label>
                <input name="q1" type="radio" value="Видеокарты" required>
                Видеокарты
            </label>
            <label>
                <input name="q1" type="radio" value="Жесткого диска" required>
                Жесткого диска
            </label>
            <label>
                <input name="q1" type="radio" value="Оперативной памяти" required>
                Оперативной памяти
            </label>
            <label>
                <input name="q1" type="radio" value="Процессора" required>
                Процессора
            </label>
        </div>
    </div>
    <div class="question">
        <p>2. Страна разработчик Crystal disk info </p>
        <div class="answer">
            <label>
                <input name="q2" type="radio" value="Корея" required>
                Корея
            </label>
            <label>
                <input name="q2" type="radio" value="Россия" required>
                Россия
            </label>
            <label>
                <input name="q2" type="radio" value="Япония" required>
                Япония
            </label>
        </div>
    </div>
    <div class="question">
        <p>3. Что такое бенчмарк?. </p>
        <div class="answer">
            <label>
                <input name="q3" type="radio" value="Антивирус" required>
                Антивирус
            </label>
            <label>
                <input name="q3" type="radio" value="Программа восстановления файлов" required>
                Программа восстановления файлов
            </label>
            <label>
                <input name="q3" type="radio" value="Программа тестирования компонентов" required>
                Программа тестирования компонентов
            </label>
        </div>
    </div>
    <div class="question">
        <p>4. Для чего нужны тестирующие программы? </p>
        <div class="answer">
            <label>
                <input name="q4" type="radio" value="Выявление проблем" required>
                Выявление проблем
            </label>
            <label>
                <input name="q4" type="radio" value="Для безопасности" required>
                Для безопасности
            </label>
            <label>
                <input name="q4" type="radio" value="Красоты рабочего стола" required>
                Красоты рабочего стола
            </label>
        </div>
    </div>
    <div class="question">
        <p>5. Выберите тестирующию программу для видеокарты. </p>
        <div class="answer">
            <label>
                <input name="q5" type="radio" value="Kaspersky" required>
                Kaspersky
            </label>
            <label>
                <input name="q5" type="radio" value="3d mark" required>
                3d mark
            </label>
            <label>
                <input name="q5" type="radio" value="Soaplord" required>
                soaplord
            </label>

        </div>
    </div>
    <p style="clear: both; text-align: center"><input type="submit" class="btn" value="Отправить">
</form>
</body>
</html>