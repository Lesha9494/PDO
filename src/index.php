<?php

require '../vendor/autoload.php';

require 'Database.php';
require 'User.php';

$user = new User(1, 'Глушков Алексей');

echo $user->update(1, 'Иванов Иван') . PHP_EOL;

$database = new Database();
$database->getUsers();
