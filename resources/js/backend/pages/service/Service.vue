<template>
    <div class="blog col-12 p2">
        <loading v-if="isLoading"></loading>

        <FlashMessage></FlashMessage>

        <div class="row mb-4">
                <div class="col-md-12">
                    <div class="float-left">
                            <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" @click="toggleForm">
                                <i class="fas fa-plus fa-sm text-white"></i> Add New Service
                            </button>
                    </div>

                    <!-- <div class="float-right">
                        <input class="form-control mr-sm-2" v-model="search" type="search" placeholder="Search Blog..." aria-label="Search" v-if="!showAddForm">
                    </div> -->
                </div>
            </div>


        <!--add form -->
        <div class="add-blog mb-5 shadow p-3 " v-if="showAddForm">
            <div class="row">
                <div class="form-group col-12">
                    <label>Service Name</label>
                    <input
                        class="form-control"
                        type="text"
                        v-model="form.name"
                    />
                </div>
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
            <div class="form-contorl">
                <label for="service_info">
                    Service Info
                </label>
                <textarea
                    v-model="form.serviceInfo"
                    class="form-control"
                    rows="5"
                ></textarea>
            </div>
            <div class="form-group">
                <label>Description</label>
                <editor
                    v-model="form.description"
                    api-key="2f0oulwav9ww4mq4vxazctyv3tercajuxkhjk7imgc8opznh"
                    :init="{
                        height: 400,
                        plugins: [
                            'advlist autolink lists link image charmap print preview anchor',
                            'searchreplace visualblocks code fullscreen',
                            'insertdatetime media table paste code help wordcount'
                        ],
                        toolbar:
                            'undo redo | formatselect | bold italic backcolor forecolor  | \ alignleft aligncenter alignright alignjustify | \ bullist numlist outdent indent | removeformat | link image | table | fullscreen preview | help'
                    }"
                />

                <!-- <editor
                    api-key="2f0oulwav9ww4mq4vxazctyv3tercajuxkhjk7imgc8opznh"
                    v-model="form.description"
                    :init="{
                        height: 300,
                        plugins: [
                            'advlist autolink lists link image charmap print preview anchor',
                            'searchreplace visualblocks code fullscreen',
                            'insertdatetime media table paste code help wordcount'
                        ],
                        toolbar:
                            'undo redo | formatselect | bold italic backcolor forecolor  | \ alignleft aligncenter alignright alignjustify | \ bullist numlist outdent indent | removeformat | link image | table | fullscreen preview | help'
                    }"
                /> -->
            </div>
             <div class="form-group col-4">
                    <label>Status</label>
                    <select class="form-control" v-model="form.status">
                        <option value="1">Active</option>
                        <option value="0">In Active</option>
                    </select>
                </div>

            <div class="form-group col-12">
                    <label>SEO Title</label>
                    <input
                        class="form-control"
                        type="text"
                        v-model="form.seoTitle"
                    />
                </div>
            <div class="form-group col-12">
                    <label>Meta Description</label>
                    <textarea
                        class="form-control"
                        type="text"
                        v-model="form.metaDescription"
                    ></textarea>
                </div>

            <div class="form-group col-12">
                    <label>Meta Keywords</label>
                    <input
                        class="form-control"
                        type="text"
                        v-model="form.metaKeywords"
                    />
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

                    <template #cell(status)="data">
                        <i
                            class="fa fa-circle text-success"
                            v-if="data.item.status == 1"
                        ></i>
                        <i
                            class="fa fa-circle text-danger"
                            v-if="data.item.status == 0"
                        ></i>
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
                    <label class="font-weight-bold">Total Items: {{ total }}</label>
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
            sortItems: ["active", "inactive", "all"],
            searchItems: ["name", "category"],
            demoImage: [],
            formState: "save",
            form: {
                name: "",
                image: [],
                description: "",
                category: "",

                status: 1,

                includes: "",
                package_type: [],
                price: [],

                editId: "",
                prevImages: "",
                serviceInfo: '',
                metaDescription: '',
                metaKeywords: '',
                seoTitle: ''
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
                {
                    key: "status",
                    label: "Status"
                },

                "Action"
            ],

            //search
            Keywords: "",
            searchBy: "name",
            sortBy: "all",
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
        // this.getCategoryData();
    },
    methods: {
        getData(page = 1) {
            var data = {
                search_by: this.searchBy,
                keywords: this.Keywords,
                sort_by: this.sortBy
            };
            axios
                .post("/admin/get-all-service?page=" + page, data)
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
        getServices() {
            axios.get("/admin/category/service/get").then(response => {
                this.categortylist = response.data.payload;
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
            formData.append("status", this.form.status);
            formData.append("description", this.form.description);
            // formData.append("category", this.form.category);

            formData.append("seo_title", this.form.seoTitle);
            formData.append("meta_description", this.form.metaDescription);
            formData.append("meta_keywords", this.form.metaKeywords);

            formData.append("prev_image", this.form.prevImages);
            formData.append("prev_image", this.form.prevImages);
            formData.append("service_info", this.form.serviceInfo);

            const config = {
                "content-type": "multipart/form-data"
            };

            if (this.formState == "save") {
                axios
                    .post("/admin/service", formData, config)
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
                                type: 'success',
                                position: 'top-right'
                                // all of other options may go here
                        });
                        }
                    });
            } else {
                axios
                    .post("/admin/service/update", formData, config)
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
                                message: response.data.message,
                                type: 'error',
                                position: 'top-right'
                                // all of other options may go here
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
                // this.getCategoryData();
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
            this.form.serviceInfo = data.service_info;
            this.form.status = data.status;

            this.form.name = data.name;
            this.form.description = data.description;

            this.form.metaDescription = data.meta_description;
            this.form.metaKeywords = data.meta_keywords;
            this.form.seoTitle = data.seo_title;
            // this.form.category = data.cat_id;

            //previous image show
            const prev_image = data.image;
            this.demoImage.push("/storage/" + prev_image);

            this.form.prevImages = data.image;
            this.showAddForm = true;
        },
        deleteItem(id) {
            var confirm = window.confirm("Are your Sure want to delete ?");
            if (confirm) {
                axios.delete("/admin/service/" + id).then(response => {
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

            this.form.status = 1;

            this.form.name = "";
            this.form.description = "";

            this.form.category = [];

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
