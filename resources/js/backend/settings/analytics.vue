<template>
    <div>
        <!-- websites visitor section -->
        <section class="col-md-12" style="margin-bottom:20px; margin-top:20px">
            <a
                href="https://analytics.google.com/analytics/web/"
                target="__blank"
                class="btn btn-success btn-sm"
                >Google Analytics <i class="fa fa-link"></i
            ></a>
            <div class="box-body mt-3">
                <h4 class="bg-secondary text-light p">
                    Website Visitors - {{ VisitorCount }}
                </h4>
                <select @change="setDate($event)">
                    <option value="7days">7 Days</option>
                    <option value="1month">1 Month</option>
                    <option value="6month">6 Month</option>
                    <option value="1year">1 Year</option>
                </select>
                <div class="Linechart">
                    <GChart
                        type="LineChart"
                        :data="VisitorsChartData"
                        :options="VisitorsChartOptions"
                    />
                </div>
            </div>
        </section>

        <div class="row p-2" style="padding-right:40px">
            <!-- top browsers section -->
            <section class="col-md-6">
                <!-- top browser section -->
                <!-- /.box-header -->
                <div
                    class="box-body"
                    style="background-color:white; margin-bottom:20px; margin-top:20px;"
                >
                    <h4 class="bg-secondary text-light p">Top Browsers</h4>

                    <b-table
                        hover
                        :items="topBrowsersSettings"
                        :fields="topBrowsersfields"
                        :current-page="currentPage"
                        :per-page="perPage"
                        thClass="primary-color"
                    >
                    </b-table>
                    <b-row>
                        <b-col md="6" class="my-1">
                            <b-pagination
                                :total-rows="totalRows"
                                :per-page="perPage"
                                v-model="currentPage"
                                class="my-0"
                            />
                        </b-col>
                    </b-row>
                </div>
                <!-- /.box-body -->
            </section>

            <!-- user types section pie chart section -->
            <section
                class="col-md-6"
                style="background-color:white; margin-bottom:20px; margin-top:20px;"
            >
                <div class="box-body">
                    <h4 class="bg-secondary text-light p">User Types</h4>
                    <div class="chart">
                        <GChart
                            type="PieChart"
                            :data="chartData"
                            :options="chartOptions"
                        />
                    </div>
                </div>
            </section>
        </div>

        <div class="row p-2">
            <!-- Most visited pages section -->
            <section class="col-md-6">
                <!-- top browser section -->
                <!-- /.box-header -->
                <div
                    class="box-body"
                    style="background-color:white; margin-bottom:20px; margin-top:20px"
                >
                    <h4 class="bg-secondary text-light p">
                        Most Visited Pages
                    </h4>

                    <b-table
                        hover
                        :items="MostVisitedPagesSettings"
                        :fields="MostVisitedPagesfields"
                        :current-page="MVcurrentPage"
                        :per-page="perPage"
                        thClass="primary-color"
                    >
                    </b-table>
                    <b-row>
                        <b-col md="6" class="my-1">
                            <b-pagination
                                :total-rows="totalRows"
                                :per-page="perPage"
                                v-model="MVcurrentPage"
                                class="my-0"
                            />
                        </b-col>
                    </b-row>
                </div>
                <!-- /.box-body -->
            </section>

            <!-- Top reffers section -->
            <section class="col-md-6">
                <!-- top browser section -->
                <!-- /.box-header -->
                <div
                    class="box-body"
                    style="background-color:white; margin-bottom:20px; margin-top:20px"
                >
                    <h4 class="bg-secondary text-light p">Top Reffers</h4>

                    <b-table
                        hover
                        :items="TopReffersSettings"
                        :fields="TopReffersfields"
                        :current-page="TRcurrentPage"
                        :per-page="perPage"
                        thClass="primary-color"
                    >
                    </b-table>
                    <b-row>
                        <b-col md="6" class="my-1">
                            <b-pagination
                                :total-rows="totalRows"
                                :per-page="perPage"
                                v-model="TRcurrentPage"
                                class="my-0"
                            />
                        </b-col>
                    </b-row>
                </div>
                <!-- /.box-body -->
            </section>
        </div>
    </div>
</template>

<script>
import { GChart } from "vue-google-charts";

export default {
    components: {
        GChart
    },
    data() {
        return {
            VisitorCount: 0,
            Date: "7days",
            SN: 0,
            settings: [],
            selected: false,
            // Array will be automatically processed with visualization.arrayToDataTable function
            chartData: [["Name", "sessions"]],
            chartOptions: {
                chart: {
                    title: "User Types",
                    subtitle: "Users types may be regular user or new users."
                }
            },
            VisitorsChartData: [],
            VisitorsChartOptions: {
                chart: {
                    title: "Website Visitors",
                    subtitle: "Total website visitors"
                }
            },
            // top browesers
            topBrowsersSettings: [],
            topBrowsersfields: [],
            // most visited
            MostVisitedPagesSettings: [],
            MostVisitedPagesfields: [],
            // top reffets
            TopReffersSettings: [],
            TopReffersfields: [],
            currentPage: 1,
            TRcurrentPage: 1,
            MVcurrentPage: 1,
            perPage: 5,
            totalRows: 0,
            // most visited rows
            MVtotalRows: 0,
            // top referres rows
            TRtotalRows: 0
        };
    },
    created() {
        this.getTopBrowsers();
        this.getUserTypes();
        this.getTopReffers();
        this.getMostVisitedPages();
        this.getPageViewsByDate();
    },

    methods: {
        setDate(e) {
            var id = e.target.value;
            var name = e.target.options[e.target.options.selectedIndex].value;
            this.Date = name;
            this.getPageViewsByDate();
        },
        getTopBrowsers() {
            axios
                .get("/admin/analytics/top-browsers/")
                .then(response => {
                    // console.log(response);
                    this.topBrowsersSettings = response.data;
                    this.totalRows = this.topBrowsersSettings.length;
                    if (this.topBrowsersSettings.length > 0) this.empty = false;
                    else this.empty = true;
                    this.loaded = true;
                })
                .catch(error => {});
        },
        getUserTypes() {
            axios.get("/admin/analytics/user-types/").then(response => {
                this.NewVisitors = response.data[0].sessions;
                this.ReturningVisitors = response.data[1].sessions;
                this.chartData.push(["New Visitor", response.data[0].sessions]);
                this.chartData.push([
                    "Returning Visitor",
                    response.data[1].sessions
                ]);
            });
        },
        getPageViewsByDate() {
            axios
                .get("/admin/analytics/page-views/" + this.Date)
                .then(response => {
                    this.VisitorsChartData = [];
                    this.VisitorsChartData.push(["Date", "Visitors"]);
                    var response = response.data;
                    var visitor_count = 0;
                    response.forEach(element => {
                        // console.log(element);
                        this.VisitorsChartData.push([
                            element.date,
                            element.visitors
                        ]);
                        visitor_count = visitor_count + element.visitors;
                    });
                    this.VisitorCount = visitor_count;
                });
        },
        getMostVisitedPages() {
            axios.get("/admin/analytics/most-visited-pages/").then(response => {
                // console.log(response);
                this.MostVisitedPagesSettings = response.data;
                this.MVtotalRows = this.MostVisitedPagesSettings.length;
                if (this.MostVisitedPagesSettings.length > 0)
                    this.empty = false;
                else this.empty = true;
                this.loaded = true;
            });
        },
        getTopReffers() {
            axios.get("/admin/analytics/top-reffers/").then(response => {
                // console.log(response);
                this.TopReffersSettings = response.data;
                this.TRtotalRows = this.TopReffersSettings.length;
                if (this.TopReffersSettings.length > 0) this.empty = false;
                else this.empty = true;
                this.loaded = true;
            });
        }
        // charts
    }
};
</script>

<style scoped>
.text-light {
    color: white;
}
.p {
    padding: 5px;
    font-size: 20px;
}
.p-2 {
    padding: 20px;
}
</style>
