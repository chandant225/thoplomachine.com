<template>
    <div class="blog col-12 p2">
        <loading v-if="isLoading"></loading>

        <FlashMessage></FlashMessage>

        <div class="blog-title col-12 mb-5 ">
            <div class="row">
                <h4 class="pr-3">Our Teams</h4>
                <button class="btn btn-sm btn-primary" @click="toggleForm">
                    <i class="fa fa-plus"></i>
                </button>
            </div>
        </div>

        <!--add form -->
        <div class="add-blog mb-5 shadow p-3 " v-if="showAddForm">
            <div class="row">
                <div class="form-group col-md-6">
                    <label>Name</label>
                    <input
                        class="form-control"
                        type="text"
                        v-model="form.name"
                        placeholder="John Lenon"
                    />
                </div>
                <div class="form-group col-md-6">
                    <label>Role</label>
                    <input
                        class="form-control"
                        type="text"
                        v-model="form.role"
                        placeholder="Full Stack Developer"
                    />
                </div>
            </div>
            <div class="form-group">
                <label class="font-weight-bold ">Image</label>
                <label class="text-danger font-italic"> * limit 1 Image</label
                ><br />
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

            <div class="form-group">
                <label>Description</label>
                <textarea
                    class="form-control"
                    v-model="form.description"
                    rows="5"
                ></textarea>
            </div>

            <hr />
            <!-- social  -->
            <h5>Social</h5>
            <div class="row">
                <div class="form-group col-md-4">
                    <label>Facebook Link</label>
                    <small class="text-primary">(optional)</small>
                    <input
                        class="form-control"
                        type="url"
                        v-model="form.facebook"
                    />
                </div>
                <div class="form-group col-md-4">
                    <label>Linkedin Link</label>
                    <small class="text-primary">(optional)</small>
                    <input
                        class="form-control"
                        type="url"
                        v-model="form.linkedin"
                    />
                </div>

                <div class="form-group col-md-4">
                    <label>Twitter Link</label>
                    <small class="text-primary">(optional)</small>
                    <input
                        class="form-control"
                        type="url"
                        v-model="form.twitter"
                    />
                </div>
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
        <div class="listing-table p-3 shadow">
            <section>
                <div class="search-bar">
                    <div class="row justify-content-between">
                        <div class="form-group col-3">
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
                        </div>
                    </div>
                </div>
            </section>

            <p class="font-weight-bold">Total Agent : {{ total }}</p>

            <section>
                <b-table
                    id="my-table"
                    :items="items"
                    :fields="fields"
                    responsive="sm"
                    thead-class="bg-secondary text-light"
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
                        >Total Agent : {{ total }}</label
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
            //form
            sortItems: [],
            searchItems: ["name", "role"],
            demoImage: [],
            formState: "save",
            form: {
                name: "",
                image: [],
                description: "",

                role: "",

                facebook: "",
                linkedin: "",
                twitter: "",

                editId: "",
                prevImages: ""
            },
            items: [],
            fields: [
                "SN",
                {
                    key: "name",
                    label: "Name"
                },
                {
                    key: "role",
                    label: "Role"
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
    },
    methods: {
        getData(page = 1) {
            var data = {
                search_by: this.searchBy,
                keywords: this.Keywords,
                sort_by: this.sortBy
            };
            axios
                .post("/admin/get-all-teams?page=" + page, data)
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

            formData.append("role", this.form.role);

            formData.append("facebook", this.form.facebook);
            formData.append("linkedin", this.form.linkedin);
            formData.append("twitter", this.form.twitter);
            formData.append("prev_image", this.form.prevImages);
            const config = {
                "content-type": "multipart/form-data"
            };

            if (this.formState == "save") {
                axios.post("/admin/teams", formData, config).then(response => {
                    var response = response.data;
                    console.log(response);
                    if (response.status === true) {
                        this.flashMessage.success({
                            title: "Success",
                            message: response.message
                        });
                        //hide form
                        this.getData();
                        this.showAddForm = false;
                        this.resetForm();
                    } else {
                        this.flashMessage.warning({
                            title: "Failed",
                            message: response.message
                        });
                    }
                });
            } else {
                axios
                    .post("/admin/teams/update", formData, config)
                    .then(response => {
                        var response = response.data;
                        if (response.status == true) {
                            this.flashMessage.success({
                                title: "Success",
                                message: response.message
                            });
                            //hide form
                            this.getData();
                            this.showAddForm = false;
                            this.resetForm();
                        } else {
                            this.flashMessage.warning({
                                title: "Failed",
                                message: response.message
                            });
                        }
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
                this.resetForm();
                this.formState = "save";
            }
        },

        previewEditItem(data) {
            // console.log(data);

            window.scrollTo(0, 0);
            this.formState = "update";
            this.demoImage = [];
            //filling form
            this.form.editId = data.id;

            this.form.name = data.name;
            this.form.description = data.description;

            this.form.role = data.role;

            this.form.facebook = data.facebook;
            this.form.linkedin = data.linkedin;
            this.form.twitter = data.twitter;

            //previous image show
            const prev_image = data.image;
            this.demoImage.push("/storage/" + prev_image);

            this.form.prevImages = data.image;
            this.showAddForm = true;
        },
        deleteItem(id) {
            var confirm = window.confirm("Are your Sure want to delete ?");
            if (confirm) {
                axios.delete("/admin/teams/" + id).then(response => {
                    if (response.data.status === true) {
                        this.flashMessage.success({
                            title: "Success",
                            message: response.data.message
                        });
                        this.getData();
                    } else {
                        this.flashMessage.warning({
                            title: "Error",
                            message: response.data.message
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

            this.form.role = "";
            this.form.facebook = "";
            this.form.linkedin = "";
            this.form.twitter = "";

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
