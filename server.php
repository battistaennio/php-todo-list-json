<?php
//recupero il file .json e lo salvo come stringa
$string = file_get_contents('todo.json');

//trasformo la stringa in un elemento php
$list = json_decode($string);


if(isset($_POST['newTask'])){
    $newTask = $_POST['newTask'];
    $list[] = $newTask;
    file_put_contents('todo.json', json_encode($list));
}

if(isset($_POST['indexToDelete'])){
    $index = $_POST['indexToDelete'];
    array_splice($list, $index, 1);
    file_put_contents('todo.json', json_encode($list));
}

//modifico il file in modo tale che venga interpretato come JSON
header('Content-Type: application/json');

//stampo l'elemento php sottoforma di stringa
echo json_encode($list);