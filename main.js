const { createApp } = Vue;

createApp({
    data() {
        return {
            apiUrl: "server.php",
            newTask: "",
            list: [],
        }
    },
    methods: {
        getApi() {
            axios.get(this.apiUrl)
                .then(response => {
                    this.list = response.data;
                    console.log(this.list);
                })
        }
    },
    mounted() {
        this.getApi()
    }
}).mount("#container")