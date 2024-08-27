<?php

$json_string = file_get_contents('todo.json');
$list = json_decode($json_string, true);
$task = $list[$_GET['index']];

if(!$task){
  header("Location: index.html");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Descrizione Task</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
    crossorigin="anonymous" referrerpolicy="no-referrer">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.7.2/axios.min.js" integrity="sha512-JSCFHhKDilTRRXe9ak/FJ28dcpOJxzQaCd3Xg8MyF6XFjODhy/YMCM8HW0TFDckNHWUewW+kfvhin43hKtJxAw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <link rel="stylesheet" href="style.css">

    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
</head>
<body>

    <div id="container">
        <h1><?php echo $task['task'] ?></h1>

        <div id="list-container">
            <ul>
                <li>
                    <span>
                        <?php echo $task['description'] ?>
                    </span>
                </li>
            </ul>
        </div>
    </div>

    
</body>
</html>