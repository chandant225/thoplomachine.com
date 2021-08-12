<template>
    <div class="newsletter fi-item">
        <h4>Sign up for the newsletter</h4>
        <div class="s-form">
            <input
                type="email"
                placeholder="Email address"
                v-model="email"
                class="col-8"
            />
            <button class="button col-md-4 col-sm-12" @click="submit()">
                Sign Up
            </button>
        </div>
        <p class="text-light primary-bg">
            {{ res }}
        </p>
    </div>
</template>

<script>
export default {
    data() {
        return {
            isLoading: false,
            //form
            email: "",
            res: ""
        };
    },
    mounted() {},
    methods: {
        submit() {
            if (this.email) {
                axios.get("/save-newsletter/" + this.email).then(response => {
                    if (response.data.status == true) {
                        this.res = response.data.message;
                        setTimeout(() => {
                            this.res = "";
                            this.email = "";
                        }, 3000);
                    } else {
                    }
                });
            }
        }
    }
};
</script>

<style scoped></style>
