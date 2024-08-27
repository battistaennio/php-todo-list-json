const { createApp } = Vue;

createApp({
    data() {
        return {
            apiUrl: "server.php",
            list: [],
            newTask: {
                task: '',
                description: ''
            },
            invalidTask: false
        }
    },
    methods: {
        getApi() {
            axios.get(this.apiUrl)
                .then(response => {
                    this.list = response.data;
                })
        },
        addNewTask() {
            if (this.newTask.task.length < 5 || this.newTask.description.length < 5) {
                this.invalidTask = true;
            } else {
                const data = new FormData();
                data.append('task', this.newTask.task);
                data.append('description', this.newTask.description);

                axios.post(this.apiUrl, data)
                    .then(response => {
                        this.list = response.data;
                        console.log(this.list);

                    });
                this.invalidTask = false;
                this.newTask.task = "";
                this.newTask.description = "";
            }
        },
        removeTask(index) {
            const data = new FormData();
            data.append('indexToDelete', index)
            axios.post(this.apiUrl, data)
                .then(response => {
                    this.list = response.data;
                })
        },
        convertDone(index) {
            const data = new FormData();
            data.append('indexToConvert', index)
            axios.post(this.apiUrl, data)
                .then(response => {
                    this.list = response.data;
                })
        }
    },
    mounted() {
        this.getApi();
    }
}).mount("#container");
