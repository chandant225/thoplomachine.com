<template>
    <a href="/" class="d-block">
        <img
            style="width:100%"
            id="nav-logo"
            :src="image"
            alt="OutofBox Design"
        />
    </a>
</template>

<script>
export default {
    data() {
        return {
            image: "/assets/images/mb-logo.png"
        };
    },
    created() {
        this.getLogo();
    },
    methods: {
        getLogo() {
            axios.get("/get-logo").then(response => {
                // console.log(response.data[0]);
                this.image = "/storage/" + response.data[0].name;
            });
        }
    }
};
</script>
