<template>
    <div class="blog col-12 p2">
        <loading v-if="isLoading"></loading>

        <div class="row mb-4">
                <div class="col-md-12">
                    <div class="float-left">
                            <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" @click="toggleForm">
                                <i class="fas fa-plus fa-sm text-white"></i> Add New FAQ
                            </button>
                    </div>

                    <!-- <div class="float-right">
                        <input class="form-control mr-sm-2" v-model="search" type="search" placeholder="Search Blog..." aria-label="Search" v-if="!showAddForm">
                    </div> -->
                </div>
            </div>

        <!--add form -->
        <div class="add-blog row mb-5 shadow p-3 " v-if="showAddForm">
            <div class="form-group col-md-12">
                <label>Title</label>
                <input
                    class="form-control"
                    type="text"
                    v-model="form.title"
                    placeholder="Question"
                />
            </div>

            <div class="form-group col-12">
                <label>Answer</label>
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
                    type="submit"
                    class="btn btn-sm btn-primary"
                    @click="submitForm"
                >
                    Submit
                </button>
                <button
                    type="button"
                    class="btn btn-sm btn-secondary"
                    @click="hideForm"
                >
                    Close
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
            categorylist: [],
            Errors: "",
            //form
            sortItems: [],
            searchItems: ["title", "category"],
            demoImage: [],
            formState: "save",
            form: {
                title: "",
                description: "",
                editId: ""
            },
            items: [],
            fields: [
                "SN",
                {
                    key: "title",
                    label: "title"
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
            const config = {
                "content-type": "multipart/form-data"
            };

            if (this.formState == "save") {
                axios
                    .post("/admin/faq", formData, config)
                    .then(response => {
                        var response = response.data;
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
                    .post("/admin/faq/update", formData, config)
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
            console.log(data);
            console.log(data);
            this.getCategoryData();

            window.scrollTo(0, 0);
            this.formState = "update";
            //filling form
            this.form.editId = data.id;
            this.form.title = data.title;
            this.form.description = data.description;

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
