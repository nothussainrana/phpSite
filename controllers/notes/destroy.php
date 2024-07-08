<?php

use Core\Database;
echo "Hello";
$config = require base_path('config.php');
$db = new Database($config['database']);

$currentUserId = 1;

$note = $db->query("SELECT * FROM notes WHERE id = :id" , [
    'id' => $_POST['id']
])->findOrFail();

authorize($note['user_id'] === $currentUserId);

$db->query('DELETE FROM NOTES WHERE id = :id', [
    'id' => $_POST['id']
]);

header('location: /notes');
exit();
