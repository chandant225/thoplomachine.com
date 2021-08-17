<template>
    <div class="blog col-12 p2">
        <loading v-if="isLoading"></loading>

       <div class="row mb-4">
                <div class="col-md-12">
                    <div class="float-left">
                            <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" @click="toggleForm">
                                <i class="fas fa-plus fa-sm text-white"></i> Add New Page
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
                <div class="form-group col-md-6">
                    <label>Page Type</label>
                    <input class="form-control" type="text" v-model="form.type" placeholder="about_page"/>
                </div>
                <div class="form-group col-md-6">
                    <label>Page title</label>
                    <input class="form-control" type="text" v-model="form.title" placeholder="About us"/>
                </div>
            </div>

            <div class="form-group">
                <label>Content</label>
                <editor
                    api-key="2f0oulwav9ww4mq4vxazctyv3tercajuxkhjk7imgc8opznh"
                    v-model="form.content"
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
             <div class="form-group">
                    <label>Meta title</label>
                    <input class="form-control" type="text" v-model="form.metaTitle" placeholder="meta title"/>
                </div>
            <div class="form-group">
                    <label>Meta Description</label>
                    <textarea v-model="form.metaDescription" id="metadesc" class="form-control" placeholder="Meta Description"></textarea>
                </div>
                 <div class="form-group">
                    <label>Meta Keywords</label>
                    <input class="form-control" type="text" v-model="form.metaKeywords" placeholder="keywords"/>
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
            //form
            sortItems: [],
            searchItems: ["page_name"],
            formState: "save",
            form: {
                editId: "",

                title: '',
                content: '',
                metaTitle: '',
                metaDescription: '',
                metaKeywords: ''
            },
            items: [],
            fields: [
                "SN",
                {
                    key: "type",
                    label: "Type"
                },
                {
                    key: "title",
                    label: "Title"
                },

                "Action"
            ],

            //search
            Keywords: "",
            searchBy: "page_name",
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
                .post("/admin/get-all-pages?page=" + page, data)
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
            // console.log(this.form.description);
            const formData = new FormData();

            formData.append("id", this.form.editId);
            formData.append("type", this.form.type);
            formData.append("title", this.form.title);
            formData.append("content", this.form.content);
            formData.append("meta_title", this.form.metaTitle);
            formData.append("meta_description", this.form.metaDescription);
            formData.append("meta_keywords", this.form.metaKeywords);
            const config = {
                "content-type": "multipart/form-data"
            };

            if (this.formState == "save") {
                axios.post("/admin/pages", formData, config).then(response => {
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
                });
            } else {
                axios
                    .post("/admin/pages/update", formData, config)
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
            // console.log(data);

            window.scrollTo(0, 0);
            this.formState = "update";
            //filling form
            this.form.editId = data.id;

            this.form.type = data.type;
            this.form.title = data.title;
            this.form.content = data.content;
            this.form.metaTitle = data.meta_title;
            this.form.metaDescription = data.meta_description;
            this.form.metaKeywords = data.meta_keywords;

            this.showAddForm = true;
        },
        deleteItem(id) {
            var confirm = window.confirm("Are your Sure want to delete ?");
            if (confirm) {
                axios.delete("/admin/pages/" + id).then(response => {
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

            this.form.type = "";
            this.form.content = "";
            this.form.title = "";
            this.form.metaTitle = "";
            this.form.metaDescription = "";
            this.form.metaKeywords = "";

            this.form.editId = "";
        }
    }
};
</script>

