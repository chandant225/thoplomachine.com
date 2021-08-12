<template>
    <div class="portfolio">
        <section>
            <div class="portfolio-categories col-md-6 col-sm-10">
                <ul class="pc-list row justify-content-center col-12">
                    <li @click="showCategory('all')">
                        <p id="all" class="p-active">All Works</p>
                    </li>
                    <li
                        class="pc-item"
                        v-for="cat in categoryList"
                        :key="cat.index"
                        @click="showCategory(cat.category)"
                    >
                        <p :id="setId(cat.category)">
                            {{ cat.category }}
                        </p>
                    </li>
                </ul>
            </div>
        </section>

        <div class="portfolio-list row col-12 p-0 m-0">
            <div
                class="portfolio-item col-xl-4 col-md-6 col-12"
                v-for="p in portfolioList"
                :key="p.index"
            >
                <div
                    class="play-button"
                    v-if="p.video"
                    @click="openVideo(p.video)"
                >
                    <i class="fas fa-play"></i>
                    <div class="pb-bg"></div>
                </div>

                <a href="javascript:void(0);" @click="openPortfolio(p)">
                    <div class="portfolio-image">
                        <img :src="'/storage/' + p.image" alt="" />
                    </div>
                    <div class="portfolio-title">
                        <h3>{{ p.name }}</h3>
                        <p>{{ p.category }}</p>
                    </div>

                    <div class="p-view">
                        <i class="fas fa-expand"></i>
                    </div>
                </a>
            </div>
        </div>

        <section>
            <div class="video-modal" v-if="showVideo">
                <div class="vm-wrapper p-0 m-0 col-12">
                    <i class="fa fa-close" @click="showVideo = false"></i>

                    <div
                        id="v-video"
                        class="vm-image col-lg-8 p-0"
                        v-html="form.video"
                    ></div>
                </div>
            </div>
        </section>

        <section>
            <div class="portfolio-modal" v-if="showModal">
                <div class="pm-wrapper row p-0 m-0 col-12">
                    <i class="fa fa-close" @click="showModal = false"></i>

                    <div class="pm-image col-lg-5 p-0">
                        <img id="p-image" :src="form.image" alt="" />
                    </div>

                    <div class="pm-desc col-lg-6 pr-5">
                        <div class="pm-date">
                            <i class="fas fa-circle"></i>
                            <span id="p-date">{{
                                form.date | moment("calendar")
                            }}</span>
                        </div>
                        <h3 class="pm-title" id="p-name">{{ form.name }}</h3>
                        <p class="pm-info" id="p-description">
                            {{ form.description }}
                        </p>
                        <div class="pm-list row">
                            <div class="pm-item col-md-4 col-sm-4">
                                <h4>Technology</h4>
                                <p id="p-technology">{{ form.technology }}</p>
                            </div>
                            <div class="pm-item col-sm-4">
                                <h4>Category</h4>
                                <p id="p-category">{{ form.category }}</p>
                            </div>
                            <div class="pm-item col-sm-4">
                                <h4>Client</h4>
                                <p id="p-client">{{ form.client }}</p>
                            </div>
                        </div>
                        <div class="view-project">
                            <a
                                @click.stop="loadLink(form.link)"
                                id="p-link"
                                target="_blank"
                            >
                                View Project <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
export default {
    data() {
        return {
            portfolioList: [],
            categoryList: [],
            category: "all",
            showModal: false,
            showVideo: false,
            form: {
                image: "",
                name: "",
                category: "",
                description: "",
                client: "",
                technology: "",
                date: "",
                link: "",
                video: ""
            }
        };
    },
    mounted() {
        this.getData();
        this.getCategories();
    },
    methods: {
        getData() {
            var formData = new FormData();
            formData.append("category", this.category);

            axios.post("/get-portfolio", formData).then(response => {
                // console.log(response.data.payload);
                this.portfolioList = response.data.payload;
            });
        },
        showCategory(cat) {
            // console.log(cat);
            $(".pc-list p").attr("class", "");
            $("#" + cat.split(" ").join("-")).attr("class", "p-active");
            this.category = cat;
            this.getData();
        },
        getCategories() {
            axios.get("/category/portfolio/get").then(response => {
                // console.log(response.data.payload);
                this.categoryList = response.data.payload;
            });
        },
        setId(cat) {
            return cat.split(" ").join("-");
        },
        openPortfolio(elem) {
            console.log(elem);
            this.showModal = true;
            this.form.image = "/storage/" + elem.image;
            this.form.name = elem.name;
            this.form.category = elem.category;
            this.form.description = elem.description;
            this.form.client = elem.client;
            this.form.technology = elem.technology;
            this.form.date = elem.created_at;
            this.form.link = elem.link;
        },
        openVideo(video) {
            console.log(video);
            this.showVideo = true;
            this.form.video = video;
        },
        loadLink(link) {
            window.location = link;
        }
    }
};
</script>

<style></style>
