<template>
    <div class="blog col-12 p2">
        <loading v-if="isLoading"></loading>

        <FlashMessage></FlashMessage>

        <div class="blog-title col-12 mb-5 ">
            <div class="row">
                <h4 class="pr-3">Service Pricing</h4>
                <button class="btn btn-sm btn-primary" @click="toggleForm">
                    <i class="fa fa-plus"></i>
                </button>
            </div>
        </div>

        <!--add form -->
        <div class="add-blog mb-5 shadow p-3 " v-if="showAddForm">
            <div class="row">
                <div class="form-group col-4">
                    <label>
                        Service Name
                        <!-- <small>(Press CTRL for multiple Selection)</small> -->
                    </label>
                    <select
                        class="form-control"
                        v-model="form.name"
                        v-if="formState === 'save'"
                    >
                        <option
                            :value="c.id"
                            v-for="c in servicelist"
                            :key="c.index"
                        >
                            {{ c.name }}
                        </option>
                    </select>
                    <select class="form-control" v-else>
                        <option :value="form.name">
                            {{ updateServiceName }}
                        </option>
                    </select>
                </div>
                <div class="form-group col-4">
                    <label>Package Type</label>
                    <input
                        class="form-control"
                        type="text"
                        v-model="form.package_type"
                        placeholder="Normal"
                    />
                </div>
                <div class="form-group col-4">
                    <label>Price</label>
                    <input
                        class="form-control"
                        type="number"
                        v-model="form.price"
                        placeholder="1200"
                    />
                </div>
            </div>
            <div class="row">
                <div class="form-group col-8">
                    <label>
                        Offer Message
                        <small class="text-success">(optional)</small>
                    </label>
                    <input
                        class="form-control"
                        type="text"
                        v-model="form.offer"
                        placeholder="20% OFF"
                    />
                </div>
                <div class="form-group row mt-4 pl-4 col-4">
                    <label class="mr-3 mt-4">
                        Recommend
                        <small class="text-success">(optional)</small>
                    </label>
                    <input
                        class="mt-4"
                        style="transform:scale(2)"
                        type="checkbox"
                        v-model="form.recommend"
                    />
                </div>
            </div>
            <div class="form-group">
                <label>Package Includes</label>
                <small class="text-primary font-weight-bold"
                    >(Seperated with +)</small
                >
                <input
                    class="form-control"
                    type="text"
                    v-model="form.includes"
                    placeholder="10 Pages Responsive Website + 5 PPC Campagaigns"
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
        <div class="listing-table p-3 shadow">
            <section>
                <div class="search-bar">
                    <div class="row justify-content-between">
                        <div class="form-group col-4">
                            <div class="row">
                                <label class="col-5">Sort By Service:</label>
                                <select
                                    class="form-control form-control-sm col-7"
                                    v-model="sortBy"
                                    @change="getData"
                                >
                                    <option value="all">All</option>
                                    <option
                                        :value="si.id"
                                        v-for="si in sortItems"
                                        :key="si.index"
                                        >{{ si.name }}</option
                                    >
                                </select>
                            </div>
                        </div>
                        <div class="row col-8 mr-2 justify-content-end">
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

                    <template #cell(service_id)="data">
                        <p v-for="sl in servicelist" :key="sl.index">
                            <label v-if="sl.id == data.item.service_id">
                                {{ sl.name }}
                            </label>
                        </p>
                    </template>

                    <template #cell(package_type)="data">
                        <p>{{ data.item.package_type }}</p>
                        <p v-if="data.item.offer !== null">
                            {{ data.item.offer }}
                        </p>
                        <p v-if="data.item.recommend" class="text-success">
                            Recommended <i class="fa fa-check"></i>
                        </p>
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
            servicelist: [],
            //form
            sortItems: [],
            searchItems: ["package_type", "price"],
            formState: "save",
            form: {
                name: "",
                name: "",
                package_type: "",
                price: "",
                includes: "",
                offer: "",
                recommend: false,

                editId: ""
            },
            // only used to display service name while editing
            updateServiceName: "",
            items: [],
            fields: [
                "SN",
                {
                    key: "service_id",
                    label: "Service Name"
                },
                {
                    key: "package_type",
                    label: "Package Type"
                },
                {
                    key: "price",
                    label: "Price ($USD)"
                },
                {
                    key: "includes",
                    label: "Package Includes"
                },

                "Action"
            ],

            //search
            Keywords: "",
            searchBy: "package_type",
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
                .post("/admin/pricing/service/get-all?page=" + page, data)
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
            axios.get("/admin/get-all-service-name").then(response => {
                this.servicelist = response.data.payload;
                this.sortItems = response.data.payload;
            });
        },

        submitForm() {
            console.log(this.form.description);
            const formData = new FormData();

            formData.append("id", this.form.editId);
            formData.append("service_id", this.form.name);
            formData.append("includes", this.form.includes);
            formData.append("price", this.form.price);

            formData.append("offer", this.form.offer);
            formData.append("recommend", this.form.recommend);

            formData.append("package_type", this.form.package_type);

            const config = {
                "content-type": "multipart/form-data"
            };

            if (this.formState == "save") {
                axios
                    .post("/admin/pricing/service/store", formData, config)
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
                    });
            } else {
                axios
                    .post("/admin/pricing/service/update", formData, config)
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
            this.getCategoryData();

            window.scrollTo(0, 0);
            this.formState = "update";
            this.demoImage = [];
            //filling form
            this.form.editId = data.id;
            this.form.name = data.service_id;
            this.form.offer = data.offer;
            this.form.recommend = data.recommend;
            this.updateServiceName = data.name;
            this.form.price = data.price;
            this.form.includes = data.includes;
            this.form.package_type = data.package_type;

            this.showAddForm = true;
        },
        deleteItem(id) {
            var confirm = window.confirm("Are your Sure want to delete ?");
            if (confirm) {
                axios
                    .delete("/admin/pricing/service/delete/" + id)
                    .then(response => {
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

            this.form.name = "";
            this.form.price = "";

            this.form.package_type = "";
            this.form.includes = "";
            this.form.offer = "";
            this.form.recommend = false;

            this.form.editId = "";
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
