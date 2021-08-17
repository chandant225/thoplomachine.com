<template>
    <div class="blog col-12 p2">
        <loading v-if="isLoading"></loading>

        <!--   lisiting table     -->
        <div class="listing-table p-3 shadow">

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
                <template #cell(name)="data">
                    <p>{{ data.item.name }}</p>
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
                        <i class="fa fa-eye"></i>
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
                    >Total Contacts : {{ total }}</label
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
            searchItems: ["name", "phone", "email"],
            fields: [
                "SN",
                {
                    key: "name",
                    label: "Name"
                },
                "phone",
                "email",
                "message",
                "Action"
            ],

            //search
            Keywords: "",
            searchBy: "name",
            sortBy: "is_not_seen",
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
                .post("/admin/get-all-contacts?page=" + page, data)
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

        updateContact(id) {
            axios.get("/admin/set-seen/contact/" + id).then(response => {
                if (response.data.status == true) {
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
        },

        deleteItem(id) {
            var confirm = window.confirm("Are your Sure want to delete ?");
            if (confirm) {
                axios.delete("/admin/contact/" + id).then(response => {
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
