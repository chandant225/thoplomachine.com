<template>
    <div class="blog col-12 p2">
        <loading v-if="isLoading"></loading>

        <FlashMessage></FlashMessage>

        <div class="blog-title col-12 mb-5 ">
            <div class="row">
                <h4 class="pr-3">Service Orders</h4>
            </div>
        </div>

        <!--add form -->
        <div class="add-blog mb-5 shadow p-3 " v-if="showAddForm">
            <div class="details">
                <h5 class="font-weight-bold">User info</h5>
                <hr />
                <div class="row bg-light">
                    <div class="col-md-4">
                        <label class="font-weight-bold">Name : </label>
                        <label class="form-control">
                            {{ form.first_name + " " + form.last_name }}
                        </label>
                    </div>
                    <div class="col-md-4">
                        <label class="font-weight-bold">Email : </label>
                        <label class="form-control">
                            {{ form.email }}
                        </label>
                    </div>
                    <div class="col-md-4">
                        <label class="font-weight-bold">Phone : </label>
                        <label class="form-control">
                            {{ form.phone_number }}
                        </label>
                    </div>
                </div>

                <h5 class="font-weight-bold mt-4">User Address</h5>
                <hr />
                <div class="row bg-light">
                    <div class="col-md-3">
                        <label class="font-weight-bold">Country : </label>
                        <label class="form-control">
                            {{ form.country }}
                        </label>
                    </div>
                    <div class="col-md-3">
                        <label class="font-weight-bold">State : </label>
                        <label class="form-control">
                            {{ form.state }}
                        </label>
                    </div>
                    <div class="col-md-3">
                        <label class="font-weight-bold">City : </label>
                        <label class="form-control">
                            {{ form.city }}
                        </label>
                    </div>
                    <div class="col-md-3">
                        <label class="font-weight-bold">Zip Code : </label>
                        <label class="form-control">
                            {{ form.zipcode }}
                        </label>
                    </div>
                    <div class="col-md-12">
                        <label class="font-weight-bold">Address : </label>
                        <label class="form-control">
                            {{ form.address }}
                        </label>
                    </div>
                </div>

                <h5 class="font-weight-bold mt-4">Service Info</h5>
                <hr />
                <div class="row bg-light">
                    <div class="col-md-4">
                        <label class="font-weight-bold">Service Name : </label>
                        <p v-for="sl in servicelist" :key="sl.index">
                            <label
                                class="form-control"
                                v-if="sl.id == form.service_id"
                            >
                                {{ sl.name }}
                            </label>
                        </p>
                    </div>
                    <div class="col-md-4">
                        <label class="font-weight-bold">Package Type : </label>
                        <label class="form-control">
                            {{ form.package_type }}
                        </label>
                    </div>
                    <div class="col-md-4">
                        <label class="font-weight-bold">Price : </label>
                        <label class="form-control">
                            USD ${{ form.price }}
                        </label>
                    </div>
                    <div class="col-md-12">
                        <label class="font-weight-bold"
                            >Package Includes :
                        </label>
                        <label class="form-control">
                            {{ form.includes }}
                        </label>
                    </div>
                    <div class="col-md-12">
                        <label class="font-weight-bold">Status : </label>
                        <label
                            class="text-success form-control"
                            v-if="form.status == 1"
                        >
                            Paid
                        </label>
                        <label class="text-danger form-control" v-else
                            >Not Paid</label
                        >
                    </div>
                    <div class="row col-12 justify-content-end">
                        <button
                            type="button"
                            class="btn btn-sm btn-danger"
                            @click="toggleForm"
                        >
                            Close
                        </button>
                    </div>
                </div>
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

                    <template #cell(name)="data">
                        <p>
                            {{
                                data.item.first_name + " " + data.item.last_name
                            }}
                        </p>
                    </template>

                    <template #cell(service)="data">
                        <p v-for="sl in servicelist" :key="sl.index">
                            <label v-if="sl.id == data.item.service_id">
                                {{ sl.name }}
                                <label>({{ data.item.package_type }})</label>
                            </label>
                        </p>
                    </template>

                    <template #cell(status)="data">
                        <p v-if="data.item.status == 1">
                            <span class="text-success">Paid</span>
                        </p>
                        <p v-else>
                            <span class="text-danger">Not Paid</span>
                        </p>
                    </template>

                    <template #cell(action)="data">
                        <button
                            class="btn btn-primary btn-sm"
                            @click.stop="previewEditItem(data.item)"
                        >
                            <i class="fa fa-eye"></i>
                        </button>
                        <!-- <button
                            class="btn btn-danger btn-sm"
                            @click.stop="deleteItem(data.item.id)"
                        >
                            <i class="fa fa-trash"></i>
                        </button> -->
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
            sortItems: ["all"],
            searchItems: [
                "order_id",
                "first_name",
                "last_name",
                "email",
                "country",
                "state",
                "city",
                "zipcode"
            ],
            formState: "save",
            form: {
                first_name: "",
                last_name: "",
                email: "",
                phone_number: "",

                address: "",
                country: "",
                city: "",
                state: "",
                zipcode: "",

                created_at: "",

                package_type: "",
                includes: "",
                service_id: 0,
                price: "",
                status: ""
            },
            // only used to display service name while editing
            updateServiceName: "",
            items: [],
            fields: [
                "SN",
                {
                    key: "name",
                    label: "Name"
                },
                {
                    key: "order_id",
                    label: "Order Id"
                },
                {
                    key: "price",
                    label: "Price (USD)"
                },
                {
                    key: "status",
                    label: "Status"
                },
                {
                    key: "service",
                    label: "Service"
                },

                "Action"
            ],

            //search
            Keywords: "",
            searchBy: "order_id",
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
                .post("/admin/orders/service/get-all?page=" + page, data)
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

            //filling
            this.form.first_name = data.first_name;
            this.form.last_name = data.last_name;
            this.form.email = data.email;
            this.form.phone_number = data.phone_number;

            this.form.address = data.address;
            this.form.country = data.country;
            this.form.state = data.state;
            this.form.city = data.city;
            this.form.zipcode = data.zipcode;

            this.form.created_at = data.created_at;

            this.form.package_type = data.package_type;
            this.form.includes = data.includes;
            this.form.service_id = data.service_id;
            this.form.price = data.price;
            this.form.status = data.status;

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
            //filling
            this.form.first_name = "";
            this.form.last_name = "";
            this.form.email = "";
            this.phone_number = "";

            this.form.address = "";
            this.form.country = "";
            this.form.state = "";
            this.form.city = "";
            this.form.zipcode = "";

            this.form.created_at = "";

            this.form.package_type = "";
            this.form.includes = "";
            this.form.service = "";
            this.form.price = "";
            this.form.status = "";
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
