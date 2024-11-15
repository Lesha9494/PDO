<?php

require '../vendor/autoload.php';

require 'Database.php';
require 'User.php';

$user = new User(1, 'John Doe');

if ($user->update(1, 'Иванов Иван')) {
    echo "Имя пользователя обновлено" . PHP_EOL;
} else {
    echo "Ошибка обновления пользователя" . PHP_EOL;
}

$database = new Database();
$database->getUsers();
