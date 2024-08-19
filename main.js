const { createApp } = Vue;

createApp({
    data() {
        return {
            apiUrl: "server.php",
            list: [],
            newTask: ""
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
            const data = { newTask: this.newTask };

            axios.post(this.apiUrl, data, {
                headers: { 'Content-Type': 'multipart/form-data' }
            })
                .then(response => {
                    console.log(response.data);
                    this.list = response.data;
                    this.newTask = "";
                })
        }
    },
    mounted() {
        this.getApi();
    }
}).mount("#container");
