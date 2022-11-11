<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHPUnit</title>
</head>
<body style="padding-left: 20px">
    <?php
    use App\Models\Form;

    echo '<h1>#10 – Тестирование PHPUnit</h1>';
    require_once ('app/Models/Form.php');

    echo '<br><b>ДАННЫЕ ПРИ СОЗДАНИИ ОБЪЕКТА</b><hr>';
    $form = new Form('login', 'pass', 'admin@itproger.com', 'https://itproger.com');
    foreach ($form->getALL() as $el)
        echo $el.'<br>';

    // Вносим новые данные, проверяем и если все ОК - сохраняем в переменные
    echo '<br><b>НОВЫЕ ДАННЫЕ</b><hr>';
    $form->setLogin('Konstantin');
    echo ($form->getLogin().'<br>');
    $form->setPass('qwerty');
    echo ($form->getPass().'<br>');
    $form->setEmail('ikv1980@gmail.com');
    echo ($form->getEmail().'<br>');
    $form->setWebURL('https://ikv1980.ru/');
    echo ($form->getWebURL().'<br>');


    echo '<br><b>ПРОВЕРКИ ВАЛИДНОСТИ URL</b><hr>';
    echo '<br>';
    $webURL = 'http://ikv1980.ru/87';
    echo $webURL;
    echo '<br>';
    echo 'Проверка валидности фильтром: '.((filter_var($webURL, FILTER_VALIDATE_URL) == false) ? '<span style="color: red"><b>FALSE</b></span>': '<span style="color: green"><b>TRUE</b></span>');
    echo '<br>';
    echo 'Проверка возможности чтения заголовков: '.(!(get_headers($webURL, 1)) ? '<span style="color: red"><b>FALSE</b></span>': '<span style="color: green"><b>TRUE</b></span>');
    echo '<br>';
    echo 'Проверка наличия ошибки 404: '.(!strstr(get_headers($webURL)[0],'404') ? '<span style="color: red"><b>FALSE</b></span>': '<span style="color: green"><b>TRUE</b></span>');

    ?>

</body>
</html>