<!-- Descrizione
Dobbiamo creare una web-app che permetta di leggere e scrivere una lista di Todo.
Deve essere anche gestita la persistenza dei dati leggendoli da, e scrivendoli in un file JSON.
Stack
Html, CSS, VueJS (importato tramite CDN), axios, PHP
Consigli
Nello svolgere l’esercizio seguite un approccio graduale.
Prima assicuratevi che la vostra pagina index.php (il vostro front-end) riesca a comunicare correttamente con il vostro script PHP (le vostre “API”).
Lo step successivo è quello di “testare” l’invio di un nuovo task, sapendo che manca comunque la persistenza lato server (ancora non memorizzate i dati da nessuna parte).
Solo a questo punto sarà utile passare alla lettura della lista da un file JSON.
Bonus
Mostrare lo stato del task → se completato, barrare il testo
Permettere di segnare un task come completato facendo click sul testo
Permettere il toggle del task (completato/non completato)
Abilitare l’eliminazione di un task solo se il task è stato completato
SuperBonus
Aggiungere una descrizione al task
Al click di un bottone “VEDI” atterrare in una schermata che visualizza il task con la descrizione -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
    crossorigin="anonymous" referrerpolicy="no-referrer">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.7.2/axios.min.js" integrity="sha512-JSCFHhKDilTRRXe9ak/FJ28dcpOJxzQaCd3Xg8MyF6XFjODhy/YMCM8HW0TFDckNHWUewW+kfvhin43hKtJxAw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <link rel="stylesheet" href="style.css">

    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
</head>
<body>
    
    <div id="container">
        <h1>lista delle cose da fare</h1>

        <div>
            <input type="text" placeholder="aggiungi task" v-model.trim="newTask.task">
            <input type="text" placeholder="aggiungi descrizione" v-model.trim="newTask.description">
            <br>
            <button @click="addNewTask">Aggiungi</button>
            <div style="color: red;" v-if="invalidTask">
                <span>Il nuovo task deve contenere almeno 5 caratteri</span>
            </div>         
        </div>

        <div id="list-container">
            <ul v-if="list.length > 0">
                <li v-for="(element, index) in list" :key="index">
                    <span 
                        @click="convertDone(index)" 
                        :class="element.done === true ? 'line-through' : ''">
                    {{element.task}}
                    </span>
                    <i v-show="element.done" @click="removeTask(index)" class="fa-solid fa-trash-can"></i>
                    <a :href="`task-description.php?index=${index}`">
                        <i class="fa-solid fa-eye"></i>
                    </a>
                </li>
            </ul>
            <h2 v-else style="color: #3d4679;">Non hai task!</h2>           
        </div>
    </div>

    <script type="text/javascript" src="main.js"></script>
</body>
</html>