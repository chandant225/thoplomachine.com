<template>
    <div class="blog col-12 p2">
        <loading v-if="isLoading"></loading>

        <div class="flash">
            <FlashMessage></FlashMessage>
        </div>

        <div class="blog-title col-12 mb-5 ">
            <div class="row">
                <h4 class="pr-2">Api Management</h4>
                <button class="btn btn-sm btn-primary" @click="toggleForm">
                    <i class="fa fa-plus"></i>
                </button>
            </div>
        </div>

        <!--add form -->
        <div class="add-blog mb-5 shadow p-3 " v-if="showAddForm">
            <div class="row">
                <div class="form-group col-6">
                    <label class="font-weight-bold">Api Name</label>
                    <input
                        class="form-control"
                        v-model="form.name"
                        type="text"
                        placeholder="stripe"
                    />
                </div>
                <div class="form-group col-6">
                    <label class="font-weight-bold">Token Type</label>
                    <select class="form-control" v-model="form.type">
                        <option value="public">PUBLIC</option>
                        <option value="private">PRIVATE</option>
                    </select>
                </div>
                <div class="form-group col-12">
                    <label class="font-weight-bold">Token</label>
                    <input
                        class="form-control"
                        v-model="form.token"
                        type="text"
                    />
                </div>
            </div>

            <div class="modal-footer">
                <button
                    type="button"
                    class="btn btn-sm btn-secondary"
                    @click="toggleForm"
                >
                    Close
                </button>
                <button
                    type="button"
                    class="btn btn-sm btn-success"
                    @click="submitForm"
                >
                    <label v-if="formState == 'save'">Upload</label>
                    <label v-else>Update</label>
                    <i class="fas fa-paper-plane"></i>
                </button>
            </div>
        </div>

        <div class="shadow p-3">
            <p class="font-weight-bold">Total : {{ total }}</p>

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

                <template #cell(token)="data">
                    <p style="max-width:300px;overflow-x:auto">
                        {{ data.item.token }}
                    </p>
                </template>

                <template #cell(action)="data">
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

            <pagination
                :data="pagination"
                @pagination-change-page="getData"
            ></pagination>

            <hr />
            <div class="row justify-content-between col-12">
                <label class="font-weight-bold"
                    >{{ currentPage }} / {{ lastPage }}
                </label>
                <label class="font-weight-bold">Total : {{ total }}</label>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "list",
    data() {
        return {
            isLoading: false,
            //form
            formState: "save",
            form: {
                name: "",
                type: "",
                token: ""
            },
            //listing
            items: [],
            fields: ["SN", "name", "type", "token", "Action"],
            //show empty message
            showEmptyMessage: false,
            //show and hide form
            showAddForm: false,
            showMonth: false,
            mCheckbox: false,
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
            axios
                .get("/admin/api-management/get-all?page=" + page)
                .then(response => {
                    var response = response.data.payload;
                    console.log(response.data);
                    this.items = response.data;
                    response.data.length == 0
                        ? (this.showEmptyMessage = true)
                        : (this.showEmptyMessage = false);
                    // //pagination
                    this.pagination = response;
                    this.rows = response.total;
                    this.currentPage = response.current_page;
                    this.lastPage = response.last_page;
                    this.total = response.total;
                });
        },

        submitForm() {
            const formData = new FormData();

            formData.append("name", this.form.name);
            formData.append("type", this.form.type);
            formData.append("token", this.form.token);

            const config = {
                "content-type": "multipart/form-data"
            };

            if (this.formState == "save") {
                axios
                    .post("/admin/api-management", formData, config)
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

        deleteItem(id) {
            var confirm = window.confirm("Are your Sure want to delete ?");
            if (confirm) {
                axios.delete("/admin/api-management/" + id).then(response => {
                    if (response.data.status == true) {
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
            this.form.name = "";
            this.form.type = "";
            this.form.token = "";
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

.preview-image {
    height: 100px;
    width: 100px;
    padding: 10px;
}
#img-container {
    width: 100%;
    display: flex;
    flex-wrap: wrap;
    flex-direction: row;
    margin-bottom: 20px;
}
.preview-image img {
    height: 100%;
    width: 100%;
    object-fit: cover;
    object-position: center center;
}
</style>
