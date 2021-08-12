<template>
    <div class="blog col-12 p2">
        <div class="flash">
            <FlashMessage></FlashMessage>
        </div>

        <loading v-if="isLoading"></loading>

        <!--   lisiting table     -->
        <div class="listing-table p-3 shadow">
            <div class="row justify-content-end p-3">
                <small v-if="sortBy != 'all'" class="text-info">
                    set [ Sort by -> All ] to search
                </small>
            </div>
            <div class="search-bar">
                <div class="row justify-content-between">
                    <div class="form-group col-3">
                        <div class="row">
                            <label class="col-4">Sort By :</label>
                            <select class="form-control form-control-sm col-8">
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

            <p class="font-weight-bold">Total Newsletters : {{ total }}</p>

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
                        class="btn btn-danger btn-sm"
                        @click.stop="deleteItem(data.item.id)"
                    >
                        <i class="fa fa-trash"></i>
                    </button>

                    <button
                        v-if="data.item.is_seen == 0"
                        class="btn btn-primary btn-sm"
                        @click.stop="updateContact(data.item.id)"
                    >
                        <i class="fa fa-check"></i>
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
                <label class="font-weight-bold"
                    >Total Newsletters : {{ total }}</label
                >
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            isLoading: false,
            //form
            demoImage: [],
            formState: "save",
            //listing
            items: [],
            searchItems: [],
            fields: ["SN", "email", "Action"],

            //search
            Keywords: "",
            searchBy: "",
            sortBy: "",
            //show empty message
            showEmptyMessage: false,
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
                .post("/admin/get-all-newsletter?page=" + page, data)
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

        deleteItem(id) {
            var confirm = window.confirm("Are your Sure want to delete ?");
            if (confirm) {
                axios.delete("/admin/newsletter/" + id).then(response => {
                    if (response.data.status == true) {
                        this.flashMessage.success({
                            title: "Success",
                            message: response.data.message
                        });
                        this.getData();
                    } else {
                        this.flashMessage.success({
                            title: "Error",
                            message: response.data.message
                        });
                    }
                });
            }
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
