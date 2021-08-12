<template>
    <div class="blog col-12 p2">
        <loading v-if="isLoading"></loading>

        <FlashMessage></FlashMessage>

        <div class="blog-title col-12 mb-5 ">
            <div class="row">
                <h4 class="pr-3">Faq</h4>
                <button class="btn btn-sm btn-primary" @click="toggleForm">
                    <i class="fa fa-plus"></i>
                </button>
            </div>
        </div>

        <!--add form -->
        <div class="add-blog row mb-5 shadow p-3 " v-if="showAddForm">
            <div class="form-group col-md-6">
                <label>Title</label>
                <input
                    class="form-control"
                    type="text"
                    v-model="form.title"
                    placeholder="<h1> Title </h1>"
                />
            </div>

            <div class="form-group col-md-6">
                <label>
                    Category
                </label>
                <select class="form-control" v-model="form.category">
                    <option
                        :value="c.id"
                        v-for="c in categorylist"
                        :key="c.index"
                    >
                        {{ c.category }}
                    </option>
                </select>
            </div>

            <div class="form-group col-12">
                <label>Description</label>
                <textarea
                    class="form-control"
                    v-model="form.description"
                    rows="6"
                >
                </textarea>
            </div>
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
                                    <option value="all">All</option>
                                    <option
                                        :value="si.id"
                                        v-for="si in categorylist"
                                        :key="si.index"
                                        >{{ si.category }}</option
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

            <p class="font-weight-bold">Total : {{ total }}</p>

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
            categorylist: [],
            Errors: "",
            //form
            sortItems: [],
            searchItems: ["title", "category"],
            demoImage: [],
            formState: "save",
            form: {
                title: "",
                description: "lklkl",
                category: [],
                editId: ""
            },
            items: [],
            fields: [
                "SN",
                {
                    key: "title",
                    label: "title"
                },

                {
                    key: "category",
                    label: "Category"
                },

                "Action"
            ],

            //search
            Keywords: "",
            searchBy: "title",
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
                .post("/admin/get-all-faq?page=" + page, data)
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
            axios.get("/admin/category/faq/get").then(response => {
                var res = response.data.payload;
                var array = [];
                for (let i = 0; i < res.length; i++) {
                    array.push(res[i]);
                }
                this.categorylist = array;
            });
        },

        submitForm() {
            console.log(this.form.description);
            const formData = new FormData();

            formData.append("id", this.form.editId);
            formData.append("title", this.form.title);
            formData.append("description", this.form.description);
            formData.append("category", this.form.category);
            const config = {
                "content-type": "multipart/form-data"
            };

            if (this.formState == "save") {
                axios
                    .post("/admin/faq", formData, config)
                    .then(response => {
                        var response = response.data;
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
                    .post("/admin/faq/update", formData, config)
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
            console.log(data);
            console.log(data);
            this.getCategoryData();

            window.scrollTo(0, 0);
            this.formState = "update";
            //filling form
            this.form.editId = data.id;
            this.form.title = data.title;
            this.form.description = data.description;
            this.form.category = "";

            this.showAddForm = true;
        },
        deleteItem(id) {
            var confirm = window.confirm("Are your Sure want to delete ?");
            if (confirm) {
                axios.delete("/admin/faq/" + id).then(response => {
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

            this.form.title = "";
            this.form.description = "";
            this.form.category = [];
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
