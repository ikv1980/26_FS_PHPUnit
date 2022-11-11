Устанавливаем composer (https://getcomposer.org/)
Команды:
    php -r "copy('http://getcomposer.org/installer', 'composer-setup.php');"
    php -r "if (hash_file('sha384', 'composer-setup.php') === '55ce33d7678c5a611085589f1f3ddf8b3c52d662cd01d4ba75c0ee0459970c2200a51f492d557530c71c15d8dba01eae') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
    php composer-setup.php
    php -r "unlink('composer-setup.php');"

***
Если есть сообщение:
    Some settings on your machine make Composer unable to work properly.
    Make sure that you fix the issues listed below and run this script again:

    The openssl extension is missing, which means that secure HTTPS transfers are impossible.
    If possible you should enable it or recompile php with --with-openssl

    То необходимо посмотреть переменные среды (PATH)
    Там должен быть прописан путь до php.
    В папку с php.exe так же нужно положить php.ini

Если какая библиотека не устанавливается, то можно поиграться командой
    php composer.phar config -g -- disable-tls true
    php composer.phar config -g -- disable-tls false

Установка phpunit
    php composer.phar require phpunit/phpunit

После установки переенных сред
    "autoload": {
        "psr-4": {
            "App\\": "app/models"
        }
    }
    запускаем команду:
        php composer.phar dumpautoload

Настройка тестирования находится в файле phpunit.xml

***
Команды
php composer.phar init | инициализация проекта
php ./vendor/bin/phpunit | запуск phpunit (запуск тестов)
