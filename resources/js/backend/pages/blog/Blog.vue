<template>
    <div class="blog col-12 p2">

        <loading v-if="isLoading"></loading>

        <FlashMessage></FlashMessage>

         <div class="row mb-4">
                <div class="col-md-12">
                    <div class="float-left">
                            <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" @click="toggleForm">
                                <i class="fas fa-plus fa-sm text-white"></i> Add New Blog
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
                <label>Blog Title</label>
                <input class="form-control" type="text" v-model="form.title" placeholder="Title" />
            </div>
            <div class="form-group">
                <label class="font-weight-bold ">Featured mage</label>
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
            <div class="row">
                <div class="form-group col-6">
                    <label>Category</label>
                    <select class="form-control" v-model="form.category">
                        <option value="">Select Category</option>
                        <option
                            :value="c.category"
                            v-for="c in categortylist"
                            :key="c.index"
                            >{{ c.category }}</option
                        >
                    </select>
                </div>
                <div class="form-group col-6">
                    <label>Written By</label>
                    <input
                        class="form-control"
                        type="text"
                        v-model="form.written_by"
                        placeholder="Written by"
                    />
                </div>
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
            </div>
            <div class="row col-12">
                <div class="form-group col-md-12">
                    <label>SEO Title</label>
                    <input
                        type="text"
                        v-model="form.metaTitle"
                        class="form-control"
                        placeholder="SEO Title"
                    />
                </div>
                <div class="form-group col-md-12">
                    <label>Meta Description</label>
                    <textarea
                        class="form-control"
                        v-model="form.metaDescription"
                        rows="4"
                        placeholder="Meta Description"
                    ></textarea>
                </div>
                <div class="form-group col-md-12">
                    <label>Meta Keywords</label>
                    <input
                        type="text"
                        v-model="form.metaTags"
                        class="form-control"
                        placeholder="Meta keywords"
                    />
                </div>
            </div>

            <div class="errors col-12  bg-danger pl-4">
                <span v-for="e in Errors" :key="e.index">
                    <small style="color:white"> {{ e[0] }} </small><br />
                </span>
            </div>

            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="customCheck1" v-model="form.isFeatured">
                <label class="custom-control-label" for="customCheck1">is featured ?</label>
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
                        <div class="form-group col-3">
                            <div class="row">
                                <label class="col-4">Sort By </label>
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
                                <label>Search By </label>
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

            <p class="font-weight-bold">Total : {{ total }}</p>

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

                    <template #cell(created_at)="data">
                        {{
                            data.item.created_at | moment("dddd, MMMM Do YYYY")
                        }}
                    </template>

                    <template #cell(updated_at)="data">
                        {{
                            data.item.updated_at | moment("dddd, MMMM Do YYYY")
                        }}
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
                    <label class="font-weight-bold">Total : {{ total }}</label>
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
            Errors: "",
            categortylist: [],
            //form
            sortItems: [],
            searchItems: ["title", "category", "written_by"],
            demoImage: [],
            formState: "save",
            form: {
                title: "",
                image: [],
                description: "",

                written_by: "",
                category: "",

                editId: "",
                prevImages: "",
                // meta
                metaTitle: "",
                metaDescription: "",
                meta_tags: "",
                isFeatured: false,
            },

            items: [],
            fields: [
                "SN",
                {
                    key: "title",
                    label: "title"
                },
                "image",
                {
                    key: "image",
                    label: "Image"
                },
                {
                    key: "category",
                    label: "Category"
                },
                {
                    key: "created_at",
                    label: "Created At"
                },
                {
                    key: "updated_at",
                    label: "Updated At"
                },

                "Action"
            ],

            //search
            Keywords: "",
            searchBy: "title",
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
        this.getCategories();
    },
    methods: {
        getData(page = 1) {
            var data = {
                search_by: this.searchBy,
                keywords: this.Keywords,
                sort_by: this.sortBy
            };
            axios
                .post("/admin/get-all-blogs?page=" + page, data)
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

        getCategories() {
            axios.get("/admin/category/blog/get").then(response => {
                var response = response.data.payload;
                console.log(response);
                this.categortylist = response;
            });
        },

        submitForm() {
            const formData = new FormData();
            var self = this;

            for (let i = 0; i < this.form.image.length; i++) {
                let file = self.form.image[i];
                formData.append("image[" + i + "]", file);
            }

            formData.append("id", this.form.editId);
            formData.append("title", this.form.title);
            formData.append("description", this.form.description);
            formData.append("category", this.form.category);
            formData.append("written_by", this.form.written_by);
            formData.append("prev_image", this.form.prevImages);
            // meta
            formData.append("meta_title", this.form.metaTitle);
            formData.append("meta_description", this.form.metaDescription);
            formData.append("meta_tags", this.form.metaTags);
            formData.append("is_featured", this.form.isFeatured);

            const config = {
                "content-type": "multipart/form-data"
            };

            if (this.formState == "save") {
                axios
                    .post("/admin/blogs", formData, config)
                    .then(response => {
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
                    })
                    .catch(error => {
                        this.Errors = error.response.data.errors;

                        setTimeout(() => {
                            this.Errors = {};
                        }, 4000);
                    });
            } else {
                axios
                    .post("/admin/blogs/update", formData, config)
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

            this.form.title = data.title;
            this.form.description = data.description;

            this.form.metaTitle = data.meta_title;
            this.form.metaTags = data.meta_tags;
            this.form.metaDescription = data.meta_description;

            this.form.category = data.category;
            this.form.written_by = data.written_by;

            //previous image show
            const prev_image = data.image;
            this.demoImage.push("/storage/" + prev_image);

            this.form.prevImages = data.image;
            this.showAddForm = true;
        },
        deleteItem(id) {
            var confirm = window.confirm("Are your Sure want to delete ?");
            if (confirm) {
                axios.delete("/admin/blogs/" + id).then(response => {
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
            this.form.title = "";
            this.demoImage = [];
            this.form.image = [];
            this.form.description = "";

            this.form.category = "";
            this.form.written_by = "";

            this.form.meta_title = "";
            this.form.meta_tags = "";
            this.form.meta_description = "";

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
