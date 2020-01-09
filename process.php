<?php
declare(strict_types=1);

namespace Antiockus;

use Antiockus\todo;
use Antiockus\db;

$db = new db();
$todo = new todo(htmlspecialchars($_POST['todo']));

$db->save(Todo $todo);
