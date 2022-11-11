<?php
    use App\Models\Form;

    class FormTest extends PHPUnit\Framework\TestCase {
        private $form = null; // класс для последующего тестирования

        // функция, которая вызывается перед каждым тестом.
        // в переменную $form внесеим объект на основе класса Form
        protected function setUp() : void {
            $this->form = new Form('login', 'pass');
        }

// 1    //Создайте функцию, что протестирует, можем ли мы создать объект на основе
        //класса Form, при этом передав в него 2 параметра;
        public function test_is_we_can_set_object_with_two_parameters()
        {
            $this->assertEquals('login', $this->form->getLogin());
            $this->assertEquals('pass', $this->form->getPass());
        }

// 2    // Создайте функцию, что протестирует, можем ли мы создать объект на основе
        // класса Form, при этом передав в него 4 параметра;
        public function test_is_we_can_set_object_with_four_parameters()
        {
            $this->form = new Form('login', 'pass', 'admin@itproger.com', 'https://itproger.com');
            $this->assertEquals('login', $this->form->getLogin());
            $this->assertEquals('pass', $this->form->getPass());
            $this->assertEquals('admin@itproger.com', $this->form->getEmail());
            $this->assertEquals('https://itproger.com', $this->form->getWebURL());
        }

// 3    // Создайте функции, которые протестируют можем ли мы по отдельности установить
        // такие параметры, как: $login, $pass, $email и $webURL;
        public function test_is_we_can_set_login()
        {
            $this->form->setLogin('newLogin');
            $this->assertEquals('newLogin', $this->form->getLogin());
        }
// 4
        public function test_is_we_can_set_pass()
        {
            $this->form->setPass('newPass');
            $this->assertEquals('newPass', $this->form->getPass());
        }
// 5
        public function test_is_we_can_set_email()
        {
            $this->form->setEmail('ikv1980@gmail.com');
            $this->assertEquals('ikv1980@gmail.com', $this->form->getEmail());
        }
// 6
        public function test_is_we_can_set_WebURL()
        {
            $this->form->setWebURL('https://ikv1980.ru');
            $this->assertEquals('https://ikv1980.ru', $this->form->getWebURL());
        }

// 7    // Создайте функцию, что протестирует можно ли установить некорректный
        // Email в переменную $email в классе Form;
        public function test_can_we_set_not_email()
        {
            $this->assertTrue(!$this->form->setEmail('ikv1980gmail.com'));  // !некорректный email
            $this->assertTrue(!$this->form->setEmail('ikv1980@gmailcom'));  // !некорректный email
            $this->assertTrue(!$this->form->setEmail('@gmail.com'));        // !некорректный email
            $this->assertTrue($this->form->setEmail('ikv1980@gmail.com'));  // корректный email
        }

// 8    // Создайте функцию, что протестирует можно ли установить некорректный
        // URL адрес веб сайта в переменную $webURL в классе Form.
        // адреса вида http://localhost (без домена первого уровня не проверяет)
        public function test_is_correct_url()
        {
            $this->assertTrue(!$this->form->setWebURL('ikv1980ru'));                // !некорректный URL (слово)
            $this->assertTrue(!$this->form->setWebURL('ikv1980.ru'));               // !некорректный URL (нет http:// или https://)
            $this->assertTrue(!$this->form->setWebURL('www.ikv1980.ru'));           // !некорректный URL (нет http:// или https://)
            $this->assertTrue(!$this->form->setWebURL('https://ikv1980.ru/error')); // !некорректный URL (404)
            $this->assertTrue($this->form->setWebURL('https://ikv1980.ru'));        // корректный URL
            $this->assertTrue($this->form->setWebURL('http://ikv1980.ru/'));        // корректный URL (203)
        }

        // Создайте функцию tearDown, в которой устанавливайте значение null
        // в объект на основе класса Form;
        public function tearDown() : void {
            $this->form = null;
        }
    }