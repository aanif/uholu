<template>
<div class="container" style="width:100%">











<div class="content" style="padding: 30px 15px;">
    <div class="container-fluid">
        <div class="card" style="width:70%;margin:auto">
            <table class="tableNav" style="">
                <tr align="center">
                    <td><span><a href="#" v-on:click="filter=''">All Requests</a></span></td>
                    <td><span><a href="#" v-on:click="filter='pick'">Pickup Requests </a></span></td>
                    <td><span><a href="#" v-on:click="filter='deliver'">Delivery Requests </a></span></td>
                    <td><span><a href="#" v-on:click="mountedFunction">Update table <span class="dot" style="background-color:red" v-if="false"></span></a></span></td>
                </tr>
            </table>
        </div>
    </div>
</div>



<b-alert v-model="showDismissibleAlert" style="width:92%;margin:auto" variant="success" dismissible>
                        Request Updated
                        </b-alert>



















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
      </b-col>-->

      <b-col lg="6" class="my-1">
        <b-form-group
          label="Filter"
          label-cols-sm="3"
          label-align-sm="right"
          label-size="sm"
          label-for="filterInput"
          class="mb-0"
        >
          <b-input-group size="md" style="width:50%">
            <b-form-input
              v-model="filter"
              style="border:2px solid #E3E3E3 !important;;margin-bottom:10px"
              type="search"
              id="filterInput"
              placeholder="Type to Search"
            ></b-form-input>
            <b-input-group-append>
              <b-button :disabled="!filter" @click="filter = ''">Clear</b-button>
            </b-input-group-append>
          </b-input-group>
        </b-form-group>
      </b-col>

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
                                    <form v-on:submit.prevent="statusChange(row.item)">
                                        <div class="row">
                                            <div class="col-md-5 pr-1">
                                                <div class="form-group">
                                                    <label>ID </label>
                                                    <input type="text" class="form-control" disabled="" placeholder="Company" v-model="row.item.id">
                                                </div>
                                            </div>
                                            <div class="col-md-3 px-1">
                                                <div class="form-group">
                                                    <label>Type</label>
                                                    <input type="text" class="form-control" disabled="" placeholder="Username" v-model="row.item.type">
                                                </div>
                                            </div>
                                            <div class="col-md-4 pl-1">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Customer ID</label>
                                                    <input type="text" class="form-control" disabled="" placeholder="id" v-model="row.item.customer_id">
                                                </div>
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
                                                    <input type="text" class="form-control"  disabled="" placeholder="Country" value="Australia">
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
                                                    <label>Status</label>
                                                <select class="form-control" name="status" v-model="row.item.status" REQUIRED>
                                                                                <option  value="Pending">Pending</option>
                                                                                <option  value="Processing">Processing</option>
                                                                                <option  value="In Transit">In Transit</option>
                                                                                <option  value="Secured">Secured</option>
                                                                                <option  value="Delivered">Delivered</option>
                                                                                <option  value="Cancelled  ">Cancelled</option>
                                                                                <option  value="Failed">Failed</option>
                                                                                <option  value="Pick Up Requested">Pick Up Requested</option>
                                                                                <option  value="Delivery Requested">Delivery Requested</option>
                                                                            </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 pr-1">
                                                <div class="form-group">
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-info btn-fill pull-right">Update Request</button>
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


    data(){

            return{

                data:null,
                items:[],
                showDismissibleAlert:false,
                itemsa:[],
                itemsb:[],
                fields: [
                { key: 'id', label: 'ID', sortable: true, sortDirection: 'desc' },
                { key: 'name', label: 'Person name', sortable: true, sortDirection: 'desc' },
                //{ key: 'email', label: 'Email', sortable: true, sortDirection: 'desc' },
                { key: 'type', label: 'Type', sortable: true, sortDirection: 'desc' },

                //   { key: 'email', label: 'is Active', formatter: (value, key, item) => { return value ? 'Yes' : 'No' }, sortable: true, sortByFormatted: true, filterByFormatted: true },
                { key: 'status', label: 'Status', sortable: true, class: 'text-center' },
                { key: 'updated_at', label: 'Last Change', sortable: true, class: 'text-center' },
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
                infoModal: { id: 'info-modal', title: '', content: '' },
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
            const urlParams = new URLSearchParams(window.location.search);
            const myParam = urlParams.get('reqid');
            this.filter=myParam;
            this.mountedFunction();
    },

    methods:{
            mountedFunction(){
              axios.get('/api/viewRequestsHistory').then(response=>{
                this.itemsa=response.data;
                //this.totalRows = this.items.length
                //console.log(this.data);
                //console.log(JSON.parse(this.data[0].keys));
                $.each(this.itemsa, function(key,value){
                        // console.log(key+' ');
                        // console.log(value.id)
                        this.itemsa[key].id='deli'+value.id;
                        if(this.itemsa[key].role=='customer'){
                        this.itemsa[key].customer_id='1003'+value.customer_id;}
                        else if(this.itemsa[key].role=='business'){
                        this.itemsa[key].customer_id='2003'+value.customer_id;}

                        this.itemsa[key].keys=JSON.parse(value.keys);
                        this.itemsa[key].docs=JSON.parse(value.docs);

                    }.bind(this));

                    axios.get('/api/viewRequestsPickHistory').then(response=>{
                        this.itemsb=response.data;
                        $.each(this.itemsb, function(key,value){
                        // console.log(key+' ');
                        // console.log(value.id)
                        this.itemsb[key].id='pick'+value.id;
                        if(this.itemsb[key].role=='customer'){
                        this.itemsb[key].customer_id='1003'+value.customer_id;}
                        else if(this.itemsb[key].role=='business'){
                        this.itemsb[key].customer_id='2003'+value.customer_id;}
                        this.itemsb[key].keys=JSON.parse(value.keys);
                        this.itemsb[key].docs=JSON.parse(value.docs);

                    }.bind(this));

                    this.items=this.itemsa.concat(this.itemsb);
                    this.totalRows = this.items.length;
                    });

                //console.log(x)
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

            statusChange(data){
                var status_u=data.status;
                var key=data.keys;
                var doc=data.docs;
                var ids=data.id;
                var id=ids.substring(4);
                var test=ids.substring(0,4);
                if(test=="deli"){
                    axios.post('/api/updateHistoryRequestdel/'+id,{
                    status_u,
                    key,
                    doc,
                    }).then(response=>{
                        this.mountedFunction();
                        this.showDismissibleAlert=true;
                        setTimeout(() => this.showDismissibleAlert=false, 5000);
                    });
                }
                else if(test=="pick"){
                    axios.post('/api/updateHistoryRequestpick/'+id,{
                    status_u,
                    key,
                    doc,
                    }).then(response=>{
                        this.mountedFunction();
                        this.showDismissibleAlert=true;
                        setTimeout(() => this.showDismissibleAlert=false, 5000);
                    });
                }
            }
    }
}

</script>
<style>
  #filterInput {
    /* border-bottom: 2px solid red; */
    /* background-color:#DDDDDD; */
    border: 3px solid #DDDDDD !important;
  }


</style>
