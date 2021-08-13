<template>
    <div class="blog col-12 p2">
        <loading v-if="isLoading"></loading>

        <FlashMessage></FlashMessage>

        <div class="row mb-4">
                <div class="col-md-12">
                    <div class="float-left">
                            <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" @click="toggleForm">
                                <i class="fas fa-plus fa-sm text-white"></i> Add New Portfolio
                            </button>
                    </div>

                    <!-- <div class="float-right">
                        <input class="form-control mr-sm-2" v-model="search" type="search" placeholder="Search Blog..." aria-label="Search" v-if="!showAddForm">
                    </div> -->
                </div>
            </div>


        <!--add form -->
        <div class="add-blog mb-5 shadow p-3 " v-if="showAddForm">
            <div class="form-group">
                <label>Project Name</label>
                <input class="form-control" type="text" v-model="form.name" />
            </div>
            <div class="form-group">
                <label class="font-weight-bold ">Image</label>
                <input
                    class="form-control"
                    @change="previewImage"
                    id="image-file"
                    ref="files"
                    type="file"
                    accept="image/jpeg, image/jpg, image/JPG, image/JPEG"
                    multiple
                />
            </div>
            <div id="img-container">
                <div
                    class="preview-image"
                    v-for="image in demoImage"
                    :key="image.index"
                >
                    <img class="col-md-2 col-sm-4" :src="image" alt="" />
                </div>
            </div>
            <!-- <div class="form-group">
                <label>
                    Video Link
                    <small>(Embedded Link)</small>
                </label>
                <textarea
                    class="form-control"
                    v-model="form.video"
                    rows="3"
                ></textarea>
            </div> -->
            <div class="row">
                <!-- <div class="form-group col-6">
                    <label>
                        Category
                    </label>
                    <multiselect
                        v-model="form.category"
                        :options="categortylist"
                        :multiple="true"
                        :close-on-select="false"
                    ></multiselect>
                </div> -->
                <!-- <div class="form-group col-6">
                    <label>
                        Category
                    </label>
                    <select class="form-control" v-model="form.category">
                        <option
                            :value="c.category"
                            v-for="c in categortylist"
                            :key="c.index"
                        >
                            {{ c.category }}
                        </option>
                    </select>
                </div> -->
                <!-- <div class="form-group col-6">
                    <label>
                        Technology
                        <small>(Add with comma(,) seperated)</small>
                    </label>
                    <input
                        class="form-control"
                        type="text"
                        v-model="form.technology"
                        placeholder="Php,Laravel,Photoshop,Seo"
                    />
                </div> -->
            </div>
            <!-- <div class="row">
                <div class="form-group col-md-6">
                    <label>Client Name</label>
                    <input
                        class="form-control"
                        type="text"
                        v-model="form.client"
                    />
                </div>
                <div class="form-group col-md-6">
                    <label>Client Link</label>
                    <input
                        class="form-control"
                        type="url"
                        v-model="form.link"
                    />
                </div>
            </div> -->
            <!-- <div class="form-group">
                <label>Description</label>
                <textarea
                    class="form-control"
                    v-model="form.description"
                    rows="6"
                >
                </textarea>
            </div> -->
            <div class="errors col-12  bg-danger pl-4">
                <span v-for="e in Errors" :key="e.index">
                    <small style="color:white"> {{ e[0] }} </small><br />
                </span>
            </div>
            <div class="modal-footer">
                <button
                    type="button"
                    class="btn btn-sm btn-secondary"
                    @click="hideForm"
                >
                    Close
                </button>
                <button
                    type="submit"
                    class="btn btn-sm btn-primary"
                    @click="submitForm"
                >
                    Submit
                </button>
            </div>
        </div>

        <!--   lisiting table     -->
        <div class="listing-table p-3 shadow" v-if="!showAddForm">
            <section>
                <div class="search-bar">
                    <div class="row justify-content-between">
                        <!-- <div class="form-group col-3">
                            <div class="row">
                                <label class="col-4">Sort By :</label>
                                <select
                                    class="form-control form-control-sm col-8"
                                    v-model="sortBy"
                                    @change="getData"
                                >
                                    <option
                                        :value="si"
                                        v-for="si in sortItems"
                                        :key="si.index"
                                        >{{ si }}</option
                                    >
                                </select>
                            </div>
                        </div>
                        <div class="row col-9 mr-2 justify-content-end">
                            <div class="form-group">
                                <label>Search By :</label>
                            </div>
                            <div class="form-group col-2">
                                <select
                                    class="form-control form-control-sm"
                                    v-model="searchBy"
                                >
                                    <option
                                        :value="si"
                                        v-for="si in searchItems"
                                        :key="si.index"
                                        >{{ si }}</option
                                    >
                                </select>
                            </div>
                            <div class="form-group col-3">
                                <input
                                    class="form-control form-control-sm"
                                    type="text"
                                    v-model="Keywords"
                                    placeholder="Search Keywords"
                                />
                            </div>
                            <div class="form-group">
                                <button
                                    class="btn btn-sm  btn-secondary"
                                    @click="getData"
                                >
                                    Search
                                </button>
                            </div>
                        </div> -->
                    </div>
                </div>
            </section>

            <section>
                <b-table
                    id="my-table"
                    :items="items"
                    :fields="fields"
                    responsive="sm"
                    thead-class="text-dark"
                    striped
                >
                    <template #cell(SN)="items">
                        {{ items.index + 1 }}
                    </template>
                    <template #cell(image)="data">
                        <div class="images">
                            <img :src="'/storage/' + data.item.image" alt="" />
                        </div>
                    </template>

                    <template #cell(action)="data">
                        <button
                            class="btn btn-primary btn-sm"
                            @click.stop="previewEditItem(data.item)"
                        >
                            <i class="fa fa-edit"></i>
                        </button>
                        <button
                            class="btn btn-danger btn-sm"
                            @click.stop="deleteItem(data.item.id)"
                        >
                            <i class="fa fa-trash"></i>
                        </button>
                    </template>
                </b-table>
                <h4 class="text-center p-2" v-if="showEmptyMessage">
                    Sorry, No Data found,
                </h4>
            </section>

            <pagination
                :data="pagination"
                @pagination-change-page="getData"
            ></pagination>
            <hr />

            <section>
                <div class="row justify-content-between col-12">
                    <label class="font-weight-bold"
                        >{{ currentPage }} / {{ lastPage }}
                    </label>
                    <label class="font-weight-bold"
                        >Total Items : {{ total }}</label
                    >
                </div>
            </section>
        </div>
    </div>
</template>

<script>
import Editor from "@tinymce/tinymce-vue";
export default {
    components: {
        editor: Editor
    },
    data() {
        return {
            isLoading: false,
            categortylist: [],
            //form
            sortItems: [],
            searchItems: ["name", "category", "technology", "client"],
            demoImage: [],
            formState: "save",
            form: {
                name: "",
                image: [],
                description: "lklkl",

                technology: "",
                category: [],
                client: "",
                link: "",
                video: "",

                editId: "",
                prevImages: ""
            },
            items: [],
            fields: [
                "SN",
                {
                    key: "name",
                    label: "name"
                },
                "image",
                {
                    key: "image",
                    label: "Image"
                },

                "Action"
            ],

            //search
            Keywords: "",
            searchBy: "name",
            sortBy: "",
            //show empty message
            showEmptyMessage: false,
            //show and hide form
            showAddForm: false,
            //paginatoin
            pagination: {},
            currentPage: 1,
            rows: 0,
            perPage: 10,
            lastPage: 0,
            total: 0
        };
    },
    mounted() {},
    created() {
        this.getData();
        this.getCategoryData();
    },
    methods: {
        getData(page = 1) {
            var data = {
                search_by: this.searchBy,
                keywords: this.Keywords,
                sort_by: this.sortBy
            };
            axios
                .post("/admin/get-all-portfolio?page=" + page, data)
                .then(response => {
                    var response = response.data.payload;
                    // console.log(response);
                    this.items = response.data;
                    response.data.length == 0
                        ? (this.showEmptyMessage = true)
                        : (this.showEmptyMessage = false);
                    //pagination
                    this.pagination = response;
                    this.rows = response.total;
                    this.currentPage = response.current_page;
                    this.lastPage = response.last_page;
                    this.total = response.total;
                });
        },
        getCategoryData() {
            axios.get("/admin/category/portfolio/get").then(response => {
                var res = response.data.payload;
                var array = [];
                for (let i = 0; i < res.length; i++) {
                    array.push(res[i].category);
                }
                this.categortylist = array;
            });
        },

        submitForm() {
            console.log(this.form.description);
            const formData = new FormData();
            var self = this;

            for (let i = 0; i < this.form.image.length; i++) {
                let file = self.form.image[i];
                formData.append("image[" + i + "]", file);
            }

            formData.append("id", this.form.editId);
            formData.append("name", this.form.name);
            formData.append("description", this.form.description);
            formData.append("category", this.form.category);
            formData.append("link", this.form.link);
            formData.append("video", this.form.video);
            formData.append("client", this.form.client);
            formData.append("technology", this.form.technology);
            formData.append("prev_image", this.form.prevImages);
            const config = {
                "content-type": "multipart/form-data"
            };

            if (this.formState == "save") {
                axios
                    .post("/admin/portfolio", formData, config)
                    .then(response => {
                        var response = response.data;
                        console.log(response);
                        if (response.status === true) {

                             Vue.$toast.open({
                                message: response.message,
                                type: 'success',
                                position: 'top-right'
                                // all of other options may go here
                        });
                            //hide form
                            this.getData();
                            this.showAddForm = false;
                            this.resetForm();
                        } else {
                             Vue.$toast.open({
                                message: response.message,
                                type: 'error',
                                position: 'top-right'
                                // all of other options may go here
                        });
                        }
                    })
                    .catch(error => {
                        this.Errors = error.response.data.errors;

                        setTimeout(() => {
                            this.Errors = {};
                        }, 4000);
                    });
            } else {
                axios
                    .post("/admin/portfolio/update", formData, config)
                    .then(response => {
                        var response = response.data;
                        if (response.status == true) {
                             Vue.$toast.open({
                                message: response.message,
                                type: 'success',
                                position: 'top-right'
                                // all of other options may go here
                        });
                            //hide form
                            this.getData();
                            this.showAddForm = false;
                            this.resetForm();
                        } else {
                             Vue.$toast.open({
                                message: response.message,
                                type: 'error',
                                position: 'top-right'
                                // all of other options may go here
                        });
                        }
                    })
                    .catch(error => {
                        this.Errors = error.response.data.errors;

                        setTimeout(() => {
                            this.Errors = {};
                        }, 4000);
                    });
            }
        },
        previewImage(e) {
            this.demoImage = [];
            this.form.image = [];
            var images = this.$refs.files.files;
            for (let i = 0; i < images.length; i++) {
                console.log(images[i]);
                this.form.image.push(images[i]);
                //image preview
                var reader = new FileReader();
                reader.onload = e => {
                    this.demoImage.push(e.target.result);
                };
                reader.readAsDataURL(e.target.files[i]);
            }
        },

        toggleForm() {
            if (this.showAddForm === true) {
                this.showAddForm = false;
            } else {
                this.showAddForm = true;
                this.getCategoryData();
                this.resetForm();
                this.formState = "save";
            }
        },

        previewEditItem(data) {
            // console.log(data);
            // this.getCategoryData();

            window.scrollTo(0, 0);
            this.formState = "update";
            this.demoImage = [];
            //filling form
            this.form.editId = data.id;

            this.form.name = data.name;
            // this.form.description = data.description;
            // this.form.video = data.video;
            // this.form.category = [];
            // var c_split = data.category.split(",");
            // for (let i = 0; i < c_split.length; i++) {
            //     this.form.category.push(c_split[i]);
            // }
            // this.form.link = data.link;
            // this.form.client = data.client;
            // this.form.technology = data.technology;

            //previous image show
            const prev_image = data.image;
            this.demoImage.push("/storage/" + prev_image);

            this.form.prevImages = data.image;
            this.showAddForm = true;
        },
        deleteItem(id) {
            var confirm = window.confirm("Are your Sure want to delete ?");
            if (confirm) {
                axios.delete("/admin/portfolio/" + id).then(response => {
                    if (response.data.status === true) {
                         Vue.$toast.open({
                                message: response.data.message,
                                type: 'success',
                                position: 'top-right'
                                // all of other options may go here
                        });
                        this.getData();
                    } else {
                         Vue.$toast.open({
                                message: response.data.message,
                                type: 'error',
                                position: 'top-right'
                                // all of other options may go here
                        });
                    }
                });
            }
        },
        hideForm() {
            this.showAddForm = false;
            this.getData();
        },
        resetForm() {
            //resetting form
            this.demoImage = [];
            this.form.image = [];

            this.form.name = "";
            this.form.description = "";

            this.form.category = [];
            this.form.link = "";
            this.form.video = "";
            this.form.client = "";
            this.form.technology = "";

            this.form.editId = "";
            this.form.prevImages = "";
        }
    }
};
</script>

<style scoped>
.images {
    width: 80px;
    height: 50px;
    overflow: hidden;
}
.images img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center center;
}

a {
    padding: 5px;
    font-size: 20px;
}
</style>

<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
