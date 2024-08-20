const { createApp } = Vue;

createApp({
    data() {
        return {
            apiUrl: "server.php",
            list: [],
            newTask: "",
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
            if (this.newTask !== "" && this.newTask.length >= 5) {
                const data = { newTask: this.newTask };

                axios.post(this.apiUrl, data, {
                    headers: { 'Content-Type': 'multipart/form-data' }
                })
                    .then(response => {
                        console.log(response.data);
                        this.list = response.data;
                    });
                this.invalidTask = false;
            } else {
                this.invalidTask = true;
            }

            this.newTask = "";
        },
        removeTask(index) {
            const data = { indexToDelete: index };
            axios.post(this.apiUrl, data, {
                headers: { 'Content-Type': 'multipart/form-data' }
            })
                .then(response => {
                    console.log(response.data);
                    this.list = response.data;
                })
        },
        convertDone(index) {
            const data = { indexToConvert: index };
            axios.post(this.apiUrl, data, {
                headers: { 'Content-Type': 'multipart/form-data' }
            })
                .then(response => {
                    console.log(response.data);
                    this.list = response.data;
                })
        }
    },
    mounted() {
        this.getApi();
    }
}).mount("#container");
