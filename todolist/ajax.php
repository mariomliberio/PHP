<?php
$file = 'todo.json';
$complete = 0;
$current = file_get_contents($file);
$json_data = json_decode($current, true);



?>