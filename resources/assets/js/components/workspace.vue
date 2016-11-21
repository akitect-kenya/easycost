<script>
    var moment = require('moment');

    export default{
        mounted() {
            this.departments();
        },

        props: ['admin'],

        data() {
            return {
                moment: moment(),
                productPackage: 20,
                directLabourCost: 40,
                purchaseOrders: 9400,
                machineSetups: 16485,
                machineTesting: 50000,
                directMaterialCost: 40,
                maintenanceCleansing: 23000,
                currentSheet: {},
                hasPreviousSheet: false,
                hasNextSheet: false,
                departments: [],
                sheets: [],
                skus: [],
                selectedGood: "",
                currentGood: {
                    "id": "",
                    "name" : ""
                },
                newSheet: {
                    "name": "",
                    "products": []
                },
                newProduct: {
                    "date": moment().format('YYYY-MM-DD'),
                    "sku": "",
                    "number_produced": 1,
                    "batch_no": "",
                    "cost": 0,
                    "product_name": ""
                }
            }
        },

        watch: {
            selectedGood(val) {
                if(val != "") {
                    this.fetchGood(val);
                    this.selectedGood = "";
                }
            }
        },

        computed: {
          prevClass() {
            return {
              'disabled': !this.hasPreviousSheet,
            }
          },

          nextClass() {
            return {
              'disabled': !this.hasNextSheet,
            }
          },

          costingSaveClass() {
            return {
                'disabled': ((this.newSheet.products.length <= 0) || (this.newSheet.name == ""))
            }
          },

          costingActionClass() {
            return {
                'disabled': ((this.newProduct.date == "") || (this.newProduct.sku == "") || (this.newProduct.number_produced == 0) || (this.newProduct.batch_no == ""))
            }
          }
        },

        methods: {
            departments() {
                this.$http.get('/api/departments').then((response) => {
                    this.departments = response.body;
                });
            },

            fetchGood(goodId) {
                this.$http.get('/api/goods/' + goodId).then((response) => {
                    this.currentGood = response.body;
                    this.fetchSKUs(this.currentGood.id);
                    this.fetchSheets();
                });
            },

            fetchSKUs(goodId) {
                this.$http.get('/api/goods/' + goodId + '/skus').then((response) => {
                    this.skus = response.body;
                });
            },

            addProduct(product) {
                if(this.costingActionClass.disabled == false) {
                    this.$http.get('/api/goods/' + this.currentGood.id + '/skus/' + product.sku).then((response) => {
                        var sku = response.body;
                        product.sku = sku.size
                        product.product_name = this.currentGood.name
                        product.cost = this.cost(product.number_produced, sku.prize);
                        this.newSheet.products.push(product);
                        this.newProduct = {
                            "date": moment().format('YYYY-MM-DD'),
                            "sku": "",
                            "number_produced": 1,
                            "batch_no": "",
                            "cost": 0,
                            "product_name": ""
                        }
                    });
                }
            },

            removeProduct(product) {
                let index = this.newSheet.products.indexOf(product);

                if (index > -1) {
                    this.newSheet.products.splice(index, 1);
                }
            },

            saveSheet() {
                // Save the sheet
                if(this.newSheet.id) {
                    this.$http.put('/api/goods/' + this.currentGood.id + '/sheets/' + this.newSheet.id, {name: this.newSheet.name}).then((response) => {
                        var sheet = response.body;

                        // Save each of the products
                        this.newSheet.products.forEach((product) => {
                            if(product.id) {
                                this.$http.put('/api/sheets/' + sheet.id + '/products/' + product.id, product).then((response) => {
                                    product = response.body;
                                });
                            } else {
                                this.$http.post('/api/sheets/' + sheet.id + '/products', product).then((response) => {
                                    product = response.body;
                                });
                            }
                        });

                        // Reset the sheet
                        this.resetSheet();
                    });
                } else {
                    this.$http.post('/api/goods/' + this.currentGood.id + '/sheets', {name: this.newSheet.name}).then((response) => {
                        var sheet = response.body;

                        console.log(this.newSheet);

                        // Save each of the products
                        this.newSheet.products.forEach((product) => {
                            this.$http.post('/api/sheets/' + sheet.id + '/products', product).then((response) => {
                                // Persist new product
                            })
                        });

                        // Reset the sheet
                        this.resetSheet();

                        // Go back to the overview page
                        $('#overview-tab').click();
                    });
                }

            },

            resetSheet() {
                this.newSheet = {
                    "name": "",
                    "products": []
                };
            },

            fetchSheets() {
                this.$http.get('/api/goods/' + this.currentGood.id + '/sheets').then((response) => {
                    this.sheets = response.body;

                    if(this.sheets.length > 0) {
                        this.currentSheet = this.sheets[0];
                    } else {
                        this.currentSheet = {};
                        this.hasNextSheet = false;
                        this.hasPreviousSheet = false;
                    }

                    if (this.sheets.length > 1) {
                        this.hasNextSheet = true;
                        this.hasPreviousSheet = false;
                    }
                });
            },

            nextSheet() {
                let index = this.sheets.indexOf(this.currentSheet);

                this.currentSheet = this.sheets[index + 1];

                if((this.sheets.length - 1) == (index + 1)) {
                    this.hasNextSheet = false;
                }

                this.hasPreviousSheet = true;
            },

            prevSheet() {
                let index = this.sheets.indexOf(this.currentSheet);

                this.currentSheet = this.sheets[index - 1];

                if((index - 1) == 0) {
                    this.hasPreviousSheet = false;
                }

                this.hasNextSheet = true;
            },

            editSheet() {
                this.newSheet = this.currentSheet;
                $('#myTabs a[href="#costing"]').tab('show')
            },

            deleteSheet() {
                this.$http.delete('/api/goods/' + this.currentGood.id + '/sheets/' + this.currentSheet.id).then((response) => {
                    // Do something after the sheet has been deleted
                });
            },

            cost(units, prize) {
                // Sales revenues
                var salesRevenue = units * prize;
                // Direct labour cost
                var directLabourCosts = units * this.directLabourCost;
                // Direct material costs
                var directMaterialCosts = units * this.directMaterialCost;
                // Total direct costs
                var totalDirectCosts = directLabourCosts + directMaterialCosts;
                // Prime Costs
                var primeCosts = salesRevenue + totalDirectCosts;
                // Overhead Costs
                var overheadCosts = this.purchaseOrders + this.machineSetups + (units * this.productPackage) + this.machineTesting + this.maintenanceCleansing;

                // Total Costs
                return primeCosts + overheadCosts;
            }
        }
    }

</script>

<template>
    <div class="workspace">
        <!-- Workspace selector -->
        <div class="row col-md-12 header">
            <select v-model="selectedGood" v-for="department in departments" :name="department.slug" :id="department.slug" class="selector">
                <option value="">{{ department.name }}</option>
                <option v-for="good in department.goods" :value="good.id">{{ good.name }}</option>
            </select>
        </div>

        <!-- Single workspace -->
        <div class="single-workspace">

            <!-- Workspace heading -->
            <div class="heading">
                <h3>{{ currentGood.name ? currentGood.name : "No good is selected"  }}</h3>
            </div>

            <!-- Nav tabs -->
            <ul id="myTabs" class="nav nav-tabs" role="tablist">
                <li id="overview-tab" role="presentation" class="active" @click="fetchSheets()">
                    <a href="#overview" aria-controls="overview" role="tab" data-toggle="tab">Overview</a>
                </li>
                <li id="costing-tab" role="presentation" v-if="!admin && currentGood.name">
                    <a href="#costing" aria-controls="profile" role="tab" data-toggle="tab">Costing</a>
                </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="overview">
                    <div class="sheet">
                        <nav>
                            <ul class="pager">
                                <li class="previous" :class="prevClass" @click="prevSheet()">
                                    <a href="#"><span aria-hidden="true">&larr;</span> Older</a>
                                </li>
                                <li class="next" :class="nextClass" @click="nextSheet()">
                                    <a href="#">Newer <span aria-hidden="true">&rarr;</span></a>
                                </li>
                            </ul>
                        </nav>
                        <h4>
                            {{ currentSheet.name ? currentSheet.name : "No costings are available" }}
                        </h4>
                        <table class="table" v-if="currentSheet.name">
                            <caption>
                                Created: {{ currentSheet.created_on }}
                                <a :href="'goods/' + currentGood.id + '/sheets/' + currentSheet.id + '/export'" class="btn btn-primary pull-right">Export</a>
                            </caption>
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Date</th>
                                <th>SKU</th>
                                <th>Number Produced</th>
                                <th>Batch No.</th>
                                <th>Cost</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="(product, index) in currentSheet.products">
                                <th scope="row">{{ index + 1 }}</th>
                                <td>{{ product.date }}</td>
                                <td>{{ product.sku }}</td>
                                <td>{{ product.number_produced }}</td>
                                <td>{{ product.batch_no }}</td>
                                <td>{{ product.cost }}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="row col-md-12" style="float: right;" v-if="!admin && currentSheet.name">
                        <span class="pull-right">
                            <button @click="editSheet()" class="btn btn-default">Edit</button>
                            <button @click="deleteSheet()" class="btn btn-danger">Delete</button>
                        </span>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="costing" v-if="!admin && currentGood.name">
                    <div class="sheet">
                        <div class="form-group">
                            <label for="name">Name: </label>
                            <input v-model="newSheet.name" type="text" class="form-control" name="name" id="name">
                        </div>

                        <table class="table">
                            <caption>
                                New costing table
                            </caption>
                            <thead>
                            <tr>
                                <th>Date</th>
                                <th>SKU</th>
                                <th>Number Produced</th>
                                <th>Batch No.</th>
                                <th>Cost</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="product in newSheet.products">
                                <td>{{ product.date }}</td>
                                <td>{{ product.sku }}</td>
                                <td>{{ product.number_produced }}</td>
                                <td>{{ product.batch_no }}</td>
                                <td>{{ product.cost }}</td>
                                <td>
                                    <button @click="removeProduct(product)" class="btn btn-danger">
                                        <i class="glyphicon glyphicon-trash" aria-hidden="true"></i>
                                    </button>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <input v-model="newProduct.date" name="date" :max="moment.format('YYYY-MM-DD')" id="costingDate" type="date" class="form-control field">
                                </td>
                                <td>
                                    <select v-model="newProduct.sku" name="sku" id="sku" class="form-control field">
                                        <option value="">SKU</option>
                                        <option :value="sku.id" v-for="sku in skus"> {{ sku.size }} </option>
                                    </select>
                                </td>
                                <td>
                                    <input v-model="newProduct.number_produced" min="1" name="number" id="number" type="number" class="form-control field">
                                </td>
                                <td>
                                    <input v-model="newProduct.batch_no" name="batchNo" id="batchNo" type="text" class="form-control field">
                                </td>
                                <td>
                                    <input v-model="newProduct.cost" disabled name="cost" id="cost" type="text" class="form-control field">
                                </td>
                                <td>
                                    <button :class="costingActionClass" @click="addProduct(newProduct)" class="btn btn-primary">
                                        <i class="glyphicon glyphicon-ok" aria-hidden="true"></i>
                                    </button>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="row col-md-12" style="float: right;">
                        <span class="pull-right">
                            <a :class="costingSaveClass"
                               autocomplete="off"
                               @click="saveSheet()"
                               class="btn btn-primary"
                               data-loading-text="Saving..."
                               id="costingSaveBtn">Save</a>
                            <button @click="resetSheet()" class="btn btn-default">Cancel</button>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>