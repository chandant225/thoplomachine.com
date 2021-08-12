<template>
    <div class="nav-search">
        <div class="search-wrapper col-md-6 col-sm-11 m-auto">
            <div class="search-form">
                <form action="">
                    <div class="form-group">
                        <input
                            type="text"
                            placeholder="Search.."
                            v-model="keyword"
                            @keyup="submitForm()"
                        />
                        <i class="fa fa-search"></i>
                    </div>
                    <div class="search-list">
                        <p v-if="searchList.length == 0" class="no-item">
                            {{ empty }}
                        </p>
                        <div class="list-item" v-else>
                            <div
                                class="search-item text-light"
                                v-for="s in searchList"
                                :key="s.index"
                            >
                                <a href="" class="s-content row col-12">
                                    <div class="image col-4 p-0">
                                        <img
                                            :src="'/storage/' + s.image"
                                            alt=""
                                        />
                                    </div>
                                    <div class="title col-8">
                                        <h4>{{ s.title }}</h4>
                                        <div class="read-more">
                                            Read more
                                            <i class="fa fa-arrow-right"></i>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <i class="fa fa-times" onclick="toggleSearch()"></i>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            isLoading: false,
            //form
            empty: "",
            keyword: "",
            searchList: []
        };
    },
    mounted() {},

    methods: {
        submitForm() {
            if (!this.keyword) {
                this.searchList = [];
                this.empty = "";
            }
            axios.get("/search/" + this.keyword).then(response => {
                this.searchList = response.data.payload;
                this.empty = "No Items Found";
            });
        }
    }
};
</script>

<style scoped></style>
