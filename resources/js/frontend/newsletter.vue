<template>

 <div class="footer-newsletter">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-6">
            <h4>Join Our Newsletter</h4>
            <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
            <form>
              <input type="email" name="email" v-model="email" placeholder="Enter your email here..">
              <input type="submit" value="Subscribe" @click.prevent="subscribe">
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- <div class="newsletter fi-item">
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
    </div> -->
</template>

<script>
export default {
    data() {
        return {
            isLoading: false,
            email: "",
            res: ""
        };
    },
    mounted() {},
    methods: {
        subscribe() {
            if (this.email) {
                axios.get("/save-newsletter/" + this.email).then(response => {
                    if (response.data.status == true) {
                        Vue.$toast.open({
                                message: response.data.message,
                                type: 'success',
                                position: 'top-right'
                                // all of other options may go here
                        });

                        setTimeout(() => {
                            this.res = "";
                            this.email = "";
                        }, 1000);
                    } else {
                        Vue.$toast.open({
                                message: "Sorry! something went wrong.",
                                type: 'error',
                                position: 'top-right'
                                // all of other options may go here
                        });
                    }
                });
            }
        }
    }
};
</script>

<style scoped></style>
