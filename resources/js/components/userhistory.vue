<template>
<div class="container" style="width:100%">











<b-alert v-model="showDismissibleAlert" style="width:92%;margin:auto" variant="success" dismissible>
                        Request Updated
                        </b-alert>
<b-alert v-model="showDismissibleAlertDan" style="width:92%;margin:auto" show variant="danger">Something went wrong, Please try again</b-alert>


<div class="content" style="">
    <div class="container-fluid">
        <div class="card" style="padding-top: 20px;">





<b-container fluid>
    <!-- User Interface controls -->
    <b-row>
      <!--<b-col lg="6" class="my-1">
        <b-form-group
          label="Sort"
          label-cols-sm="3"
          label-align-sm="right"
          label-size="sm"
          label-for="sortBySelect"
          class="mb-0"
        >
          <b-input-group size="sm">
            <b-form-select v-model="sortBy" id="sortBySelect" :options="sortOptions" class="w-75">
              <template v-slot:first>
                <option >-- none --</option>
              </template>
            </b-form-select>
            <b-form-select v-model="sortDesc" size="sm" :disabled="!sortBy" class="w-25">
              <option :value="false">Asc</option>
              <option :value="true">Desc</option>
            </b-form-select>
          </b-input-group>
        </b-form-group>
      </b-col>

      <b-col lg="6" class="my-1">
        <b-form-group
          label="Initial sort"
          label-cols-sm="3"
          label-align-sm="right"
          label-size="sm"
          label-for="initialSortSelect"
          class="mb-0"
        >
          <b-form-select
            v-model="sortDirection"
            id="initialSortSelect"
            size="sm"
            :options="['asc', 'desc', 'last']"
          ></b-form-select>
        </b-form-group>
      </b-col>

      <b-col lg="6" class="my-1">
        <b-form-group
          label="Filter"
          label-cols-sm="3"
          label-align-sm="right"
          label-size="sm"
          label-for="filterInput"
          class="mb-0"
        >
          <b-input-group size="sm">
            <b-form-input
              v-model="filter"
              type="search"
              id="filterInput"
              placeholder="Type to Search"
            ></b-form-input>
            <b-input-group-append>
              <b-button :disabled="!filter" @click="filter = ''">Clear</b-button>
            </b-input-group-append>
          </b-input-group>
        </b-form-group>
      </b-col>-->

      <b-col lg="6" class="my-1">
        <!--<b-form-group
          label="Filter"
          label-cols-sm="3"
          label-align-sm="right"
          label-size="sm"
          description="Leave all unchecked to filter on all data"
          class="mb-0">
          <b-form-checkbox-group v-model="filterOn" class="mt-1" style="display:inline">
            <b-form-checkbox value="name">Name</b-form-checkbox>
            <b-form-checkbox value="age">Age</b-form-checkbox>
            <b-form-checkbox value="isActive">Active</b-form-checkbox>
          </b-form-checkbox-group>
        </b-form-group>-->

        <b-form-group
          label="Per page"
          label-cols-sm="6"
          label-cols-md="4"
          label-cols-lg="3"
          label-align-sm="right"
          label-size="sm"
          label-for="perPageSelect"
          class="mb-0"
        >
          <b-form-select
            v-model="perPage"
            class="form-control"
            style="width:50%"
            id="perPageSelect"
            size="sm"
            :options="pageOptions"
          ></b-form-select>
        </b-form-group>

      </b-col>

      <b-col sm="5" md="6" class="my-1">

      </b-col>

      <b-col sm="7" md="6" class="my-1">
        <b-pagination
          v-model="currentPage"
          :total-rows="totalRows"
          :per-page="perPage"
          align="fill"
          size="sm"
          class="my-0"
        ></b-pagination>
      </b-col>
    </b-row>

    <!-- Main table element -->
    <b-table
      show-empty
      small
      stacked="md"
      :items="items"
      :fields="fields"
      :current-page="currentPage"
      :per-page="perPage"
      :filter="filter"
      :filterIncludedFields="filterOn"
      :sort-by.sync="sortBy"
      :sort-desc.sync="sortDesc"
      :sort-direction="sortDirection"
      @filtered="onFiltered"
    >
      <!--<template v-slot:cell(name)="row">
        {{ row.value.first }} {{ row.value.last }}
      </template>-->
    <!--<template v-slot:cell(id)="row">
        cust{{ row.value }}
      </template>-->
      <template v-slot:cell(actions)="row">
        <!--<b-button size="sm" @click="info(row.item, row.index, $event.target)" class="mr-1">
          Info modal
        </b-button>-->
        <b-button size="sm" @click="row.toggleDetails">
          {{ row.detailsShowing ? 'Hide' : 'Show' }} Details
        </b-button>
        <b-button size="sm" v-if="row.item.status=='In Transit'" @click="userUpdateItems(row.item)" class="mr-1">
          Recieved Confirmation
        </b-button>
      </template>

      <template v-slot:row-details="row">
        <b-card>












        <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card" style="padding-top: 10px;padding-left: 20px;padding-right: 20px;padding-bottom: 20px;">
                                <div class="card-header">
                                    <h4 class="card-title">Details</h4>
                                </div>
                                <div class="card-body">
                                    <form v-on:submit.prevent="updateRequest(row.item)">
                                        <div class="row">
                                            <div class="col-md-5 pr-1">
                                                <div class="form-group">
                                                    <label>ID </label>
                                                    <input type="text" class="form-control" disabled="" placeholder="Company" v-model="row.item.id">
                                                </div>
                                            </div>
                                            <div class="col-md-6 pl-1">
                                                <div class="form-group">
                                                    <label>Type</label>
                                                    <input type="text" class="form-control" disabled="" placeholder="Username" v-model="row.item.type">
                                                </div>
                                            </div>
                                            <div class="col-md-4 pl-1">
                                                <!--<div class="form-group">
                                                    <label for="exampleInputEmail1">Customer ID</label>
                                                    <input type="text" class="form-control" disabled="" placeholder="id" v-model="row.item.customer_id">
                                                </div>-->
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 pr-1">
                                                <div class="form-group">
                                                    <label>First Name</label>
                                                    <input type="text" class="form-control" disabled="" name="name" placeholder="Company" v-model="row.item.name">
                                                </div>
                                            </div>
                                            <div class="col-md-6 pl-1">
                                                <div class="form-group">
                                                    <label>Cost</label>
                                                    <input type="text" class="form-control" disabled="" name="last_name" placeholder="Last Name" v-model="row.item.cost">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 pr-1">
                                                <div class="form-group">
                                                    <label>Unit</label>
                                                    <input type="text" class="form-control" disabled="" name="unit" placeholder="Home Address" v-model="row.item.unit">
                                                </div>
                                            </div>
                                            <div class="col-md-6 pr-1">
                                                <div class="form-group">
                                                    <label>Street</label>
                                                    <input type="text" class="form-control" disabled="" name="street" placeholder="Home Address" v-model="row.item.street">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 pr-1">
                                                <div class="form-group">
                                                    <label>City</label>
                                                    <input type="text" class="form-control" disabled="" name="city" placeholder="City"  v-model="row.item.city">
                                                </div>
                                            </div>
                                            <div class="col-md-4 px-1">
                                                <div class="form-group">
                                                    <label>Country</label>
                                                    <input type="text" class="form-control" disabled="" disabled="" placeholder="Country" value="Australia">
                                                </div>
                                            </div>
                                            <div class="col-md-4 pl-1">
                                                <div class="form-group">
                                                    <label>Postal Code</label>
                                                    <input type="number" class="form-control" disabled="" name="zip" placeholder="ZIP Code" v-model="row.item.zip">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Delivery Information</label>
                                                    <textarea rows="4" cols="80" class="form-control" disabled="" name="delivery_info" placeholder="Here can be your description"  v-model="row.item.info"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 pr-1">
                                                <div class="form-group">
                                                    <label>Tracking Number</label>
                                                    <input type="text" class="form-control" disabled="" name="name" placeholder="Tracking#" v-model="row.item.tracking">
                                                </div>
                                            </div>
                                            <div class="col-md-6 pl-1">
                                                <div class="form-group">
                                                    <label>Comments</label>
                                                    <input type="text" class="form-control" disabled="" name="last_name" placeholder="Comments" v-model="row.item.comment">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 pr-1">
                                                <div class="form-group">
                                                    <!--<label>Status</label>
                                                <select class="form-control" name="status" v-model="row.item.status" REQUIRED>
                                                                                <option  value="Pending">Pending</option>
                                                                                <option  value="In Transit">In Transit</option>
                                                                                <option  value="Secured">Secured</option>
                                                                                <option  value="Delivered">Delivered</option>
                                                                                <option  value="Cancelled  ">Cancelled</option>
                                                                                <option  value="Failed">Failed</option>
                                                                                <option  value="Pick Up Requested">Pick Up Requested</option>
                                                                                <option  value="Delivery Requested">Delivery Requested</option>
                                                                            </select>-->
                                                </div>
                                            </div>
                                            <div class="col-md-6 pr-1">
                                                <div class="form-group">
                                                </div>
                                            </div>
                                        </div>
                                        <!--<button type="submit" class="btn btn-info btn-fill pull-right">Update Profile</button>-->
                                        <div class="clearfix"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                                <div class="card card-user" style="padding-top: 50px;padding-left:10px;padding-bottom:20px">
                                        <div v-for="key in row.item.keys" style="width:50%;height:20px;background-color:#656565;margin:auto;margin-bottom:20px">
                                        <center><span style="color:white">key{{key}}</span></center>
                                        </div>
                                        <div v-for="doc in row.item.docs" style="width:50%;height:20px;background-color:#656590;margin:auto;margin-bottom:20px">
                                        <center><span style="color:white">doc{{doc}}</span></center>
                                        </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>














        </b-card>
      </template>


    <!--<template v-slot:row-details="row">
        <b-card>












        <div class="content">
                <div class="container-fluid">
                </div>
        </div>


        </b-card>
    </template>-->





    </b-table>

    <!-- Info modal -->
    <b-modal :id="infoModal.id" :title="infoModal.title" ok-only @hide="resetInfoModal">
      <pre>{{ infoModal.content }}</pre>
    </b-modal>
  </b-container>






        </div>
    </div>
</div>

















</div>
</template>
<script>

export default {

    props: [

         'user_id',
         'userrole',
         'parent_id',
     ],
    data(){

            return{

                items:[],
                itemsa:[],
                itemsb:[],
                showDismissibleAlert:false,
                showDismissibleAlertDan:false,
                fields: [
                { key: 'id', label: 'ID', sortable: true, sortDirection: 'desc' },
                //{ key: 'name', label: 'Person name', sortable: true, sortDirection: 'desc' },
                //{ key: 'email', label: 'Email', sortable: true, sortDirection: 'desc' },
                //{ key: 'type', label: 'Delivery Type', sortable: true, sortDirection: 'desc' },

                //   { key: 'email', label: 'is Active', formatter: (value, key, item) => { return value ? 'Yes' : 'No' }, sortable: true, sortByFormatted: true, filterByFormatted: true },
                { key: 'updated_at', label: 'Last Change', sortable: true, class: 'text-center' },
                { key: 'tracking', label: 'Tracking Number', sortable: true, sortDirection: 'desc' },
                { key: 'comment', label: 'Comments', sortable: true, sortDirection: 'desc' },
                { key: 'status', label: 'Status', sortable: true, class: 'text-center' },
                { key: 'actions', label: 'Actions' }
                ],
                totalRows: 1,
                currentPage: 1,
                perPage: 10,
                pageOptions: [5, 10, 15],
                sortBy: 'updated_at',
                sortDesc: true,
                sortDirection: 'desc',
                filter: null,
                filterOn: [],
                infoModal: { id: 'info-modal', title: '', content: '' }

            }
    },

    computed: {
                sortOptions() {
                                // Create an options list from our fields
                                return this.fields
                                .filter(f => f.sortable)
                                .map(f => {
                                    return { text: f.label, value: f.key }
                                })
                            }
                        },

    mounted() {
                this.mountedFunction();
    },

    methods:{

                mountedFunction(){
                    var id;
                    console.log(this.userrole);
                if(this.userrole=='staff'){
                    //console.log(this.userrole);
                    id=this.parent_id;
                }
                else{
                    id=this.user_id;
                }
                axios.get('/api/view-user-Pickup-history').then(response=>{
                    this.itemsa=response.data;
                    $.each(this.itemsa, function(key,value){
                        // console.log(key+' ');
                        // console.log(value.id)
                        this.itemsa[key].id='pick'+value.id;
                        this.itemsa[key].customer_id='1101'+value.customer_id;
                        this.itemsa[key].keys=JSON.parse(value.keys);
                        this.itemsa[key].docs=JSON.parse(value.docs);

                    }.bind(this));


                            axios.get('/api/view-user-delivery-history').then(response=>{
                                this.itemsb=response.data;
                                this.items=this.itemsa.concat(this.itemsb);
                                $.each(this.itemsb, function(key,value){
                                    // console.log(key+' ');
                                    // console.log(value.id)
                                    this.itemsb[key].id='deli'+value.id;
                                    this.itemsb[key].customer_id='1101'+value.customer_id;
                                    this.itemsb[key].keys=JSON.parse(value.keys);
                                    this.itemsb[key].docs=JSON.parse(value.docs);

                                }.bind(this));

                            }).catch(error => {

                            });

                }).catch(error => {

                });
            },

            info(item, index, button) {
                this.infoModal.title = `Row index: ${index}`
                this.infoModal.content = JSON.stringify(item, null, 2)
                this.$root.$emit('bv::show::modal', this.infoModal.id, button)
            },
            resetInfoModal() {
                this.infoModal.title = ''
                this.infoModal.content = ''
            },
            onFiltered(filteredItems) {
                // Trigger pagination to update the number of buttons/pages due to filtering
                this.totalRows = filteredItems.length
                this.currentPage = 1
            },
            userUpdateItems(data){
                var ids=data.id;
                var id=ids.substring(4);
                var keys=data.keys;
                var docs=data.docs;
                console.log(keys);
                console.log(docs);
                axios.post('/api/userUpdateItems',{
                    id,
                    keys,
                    docs,
                }).then(response=>{
                    var id=response.data;


                            this.mountedFunction();
                            this.showDismissibleAlert=true;
                            setTimeout(() => this.showDismissibleAlert=false, 5000);
                            axios.post('/api/send/delivered',{
                            id,
                        });
                }).catch(error=>{
                            this.showDismissibleAlertDan=true;
                            setTimeout(() => this.showDismissibleAlertDan=false, 5000);
                });

            },

    }
}

</script>
