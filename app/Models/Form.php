<?php

    namespace App\Models;

    // Основной класс
    class Form {
        // Объявление переменных класса
        private $login;
        private $pass;
        private $email;
        private $webURL;

        // Создание конструктора c возможностью внесения неполных данных
        public function __construct($login, $pass, $email = null, $webURL = null)
        {
           $this->login = $login;
           $this->pass = $pass;
           $this->email = $email;
           $this->webURL = $webURL;
        }
        // функция для получения всех данных объекта
        public function getALL(): array
        {
           return array(
               $this->login, $this->pass, $this->email, $this->webURL
           );
        }

        // функции для ПОЛУЧЕНИЯ отдельных значений переменных объекта
        public function getLogin() { return $this->login; }
        public function getPass() { return $this->pass; }
        public function getEmail() { return $this->email; }
        public function getWebURL() { return $this->webURL; }

        // функции для УСТАНОВЛЕНИЯ новых значений в переменные объекта
        public function setLogin($login) // нового значения в login
        {
            $this->login =$login;
        }
        public function setPass($pass) // нового значения в pass
        {
            $this->pass =$pass;
        }
        public function setEmail($email): bool // нового значения в email (проверка на валидность)
        {
            return ((filter_var($email, FILTER_VALIDATE_EMAIL)) ? $this->email = $email : false);
        }
        public function setWebURL($webURL): bool // нового значения в webURL (проверка на валидность)
        {
            try {
                if ((filter_var($webURL, FILTER_VALIDATE_URL) === false) or strstr(get_headers($webURL)[0], '404')) return false;
                {
                    $this->webURL = $webURL;
                    return true;
                }
            } catch (Exception $e) {
                return false;
            }
        }
    }