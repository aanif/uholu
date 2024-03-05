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
                    <td><span><a href="#" v-on:click="tableRefresh">Update table <span class="dot" style="background-color:red" v-if="refresh"></span></a></span></td>
                </tr>
            </table>
        </div>
    </div>
</div>


<b-alert v-model="showDismissibleAlert" style="width:92%;margin:auto" variant="success" dismissible>
                        Request Updated
                        </b-alert>
<b-alert v-model="showDismissibleAlertDan" style="width:92%;margin:auto" show variant="danger">Something went wrong, Please try again</b-alert>


<!--/////////////////This is the end of Nav bar /////////////////-->

<!--/////////////////This is the first tab View/////////////////-->




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
                                    <div class="row">
                                        <div class="col-md-5 pr-1 text-center">

                                            </div>
                                            <div class="col-md-5 pr-1 text-center">

                                                <button type="button" v-if="row.item.typeOfReq=='pickup'" v-on:click="getLabel(row.item)"  class="btn btn-info btn-fill pull-right">Get Label</button>
                                            </div>
                                        </div>
                                    <form v-on:submit.prevent="updateRequest(row.item)">
                                    <div class="row">
                            <div class="col-md-5 pr-1 text-center">
                                    <button type="button" v-if="row.item.status=='Processing' && row.item.typeOfReq=='delivery'" v-on:click="getLabel(row.item)"  class="btn btn-info btn-fill pull-right">Get Label</button>
                                </div>
                                </div>
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
                                                    <input type="text" class="form-control" placeholder="Username" v-model="row.item.type">
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
                                                    <input type="text" class="form-control" name="name" placeholder="Company" v-model="row.item.name">
                                                </div>
                                            </div>
                                            <div class="col-md-6 pl-1">
                                                <div class="form-group">
                                                    <label>Cost</label>
                                                    <input type="text" class="form-control" name="last_name" placeholder="Last Name" v-model="row.item.cost">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 pr-1">
                                                <div class="form-group">
                                                    <label>Unit</label>
                                                    <input type="text" class="form-control" name="unit" placeholder="Home Address" v-model="row.item.unit">
                                                </div>
                                            </div>
                                            <div class="col-md-6 pr-1">
                                                <div class="form-group">
                                                    <label>Street</label>
                                                    <input type="text" class="form-control" name="street" placeholder="Home Address" v-model="row.item.street">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 pr-1">
                                                <div class="form-group">
                                                    <label>City</label>
                                                    <input type="text" class="form-control" name="city" placeholder="City"  v-model="row.item.city">
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
                                                    <input type="number" class="form-control" name="zip" placeholder="ZIP Code" v-model="row.item.zip">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Delivery Information</label>
                                                    <textarea rows="4" cols="80" class="form-control" name="delivery_info" placeholder="Here can be your description"  v-model="row.item.info"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 pr-1">
                                                    <div class="form-group">
                                                    <label>Tracking Number</label>
                                                    <input type="text" class="form-control" name="tracking" placeholder="Tracking#" v-model="row.item.tracking">
                                                </div>
                                            </div>
                                            <div class="col-md-6 pr-1">
                                                <div class="form-group">
                                                    <label>Comment</label>
                                                    <input type="text" class="form-control" name="comment" placeholder="Comment" v-model="row.item.comment">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 pr-1">
                                                <div class="form-group">
                                                    <label>Status</label>
                                                <select class="form-control" name="status" v-model="row.item.status" REQUIRED>
                                                                                <option  value="Pending">Pending</option>
                                                                                <option v-if="row.item.typeOfReq=='delivery'" value="Processing">Processing</option>
                                                                                <option v-if="row.item.typeOfReq=='delivery'" value="In Transit">In Transit</option>
                                                                                <option v-if="row.item.typeOfReq=='pickup'" value="Secured">Secured</option>
                                                                                <option v-if="row.item.typeOfReq=='delivery'" value="Delivered">Delivered</option>
                                                                                <option  value="Cancelled  ">Cancelled</option>
                                                                                <option  value="Failed">Failed</option>
                                                                                <option v-if="row.item.typeOfReq=='pickup'" value="Pick Up Requested">Pick Up Requested</option>
                                                                                <option v-if="row.item.typeOfReq=='delivery'" value="Delivery Requested">Delivery Requested</option>
                                                                            </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 pr-1">
                                                <div class="form-group">
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-info btn-fill pull-right">Update Profile</button>
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
                initd:0,
                postd:0,
                initp:0,
                postp:0,
                init:0,
                post:0,
                refresh:false,
                data:null,
                showDismissibleAlert:false,
                showDismissibleAlertDan:false,
                items:[],
                itemsa:[],
                itemsb:[],
                fields: [
                { key: 'id', label: 'ID', sortable: true, sortDirection: 'desc' },
                { key: 'name', label: 'Person name', sortable: true, sortDirection: 'desc' },
                //{ key: 'email', label: 'Email', sortable: true, sortDirection: 'desc' },
                { key: 'type', label: 'Type', sortable: true, sortDirection: 'desc' },

                //   { key: 'email', label: 'is Active', formatter: (value, key, item) => { return value ? 'Yes' : 'No' }, sortable: true, sortByFormatted: true, filterByFormatted: true },
                { key: 'updated_at', label: 'Last Change', sortable: true, class: 'text-center' },
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

    mounted() {






        this.mountedFunction();
        axios.get('/api/pickupCounter').then(response=>{
                this.initp=response.data;
                axios.get('').then(response=>{
                    this.initd=response.data;
                });
        });




         window.setInterval(() => {
                //console.log('active');
                axios.get('/api/pickupCounter').then(response=>{
                        this.postp=response.data;
                        axios.get('').then(response=>{
                                this.postd=response.data;

                                this.init=this.initp+this.initd;
                                this.post=this.postp+this.postd;

                                if(this.init==this.post){
                                    //console.log('all caught up')
                                }

                                else{
                                   //console.log('new stuff')
                                    this.refresh=true;
                                }

                        });
                });

              }, 5000)


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

    methods:{
            mountedFunction(){
                axios.get('/api/viewRequests').then(response=>{
            this.itemsa=response.data;
            //this.totalRows = this.items.length
            //console.log(this.data);
            //console.log(JSON.parse(this.data[0].keys));
            $.each(this.itemsa, function(key,value){
                    // console.log(key+' ');
                    // console.log(value.id)
                    this.itemsa[key].id='deli'+value.id;
                    this.itemsa[key].typeOfReq='delivery';
                    if(this.itemsa[key].user.role=='customer'){
                    this.itemsa[key].customer_id='1003'+value.customer_id;}
                    else if(this.itemsa[key].user.role=='business'){
                    this.itemsa[key].customer_id='2003'+value.customer_id;}
                    this.itemsa[key].keys=JSON.parse(value.keys);
                    this.itemsa[key].docs=JSON.parse(value.docs);

                }.bind(this));

                axios.get('/api/viewRequestsPick').then(response=>{
                    this.itemsb=response.data;
                     $.each(this.itemsb, function(key,value){
                    // console.log(key+' ');
                    // console.log(value.id)
                    this.itemsb[key].id='pick'+value.id;
                    this.itemsb[key].typeOfReq='pickup';
                    if(this.itemsb[key].user.role=='customer'){
                    this.itemsb[key].customer_id='1003'+value.customer_id;}
                    else if(this.itemsb[key].user.role=='business'){
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
            updateRequest(data){
                var ids=data.id;
                var id=ids.substring(4);
                var test=ids.substring(0,4);
                var name=data.name;//
                var cost=data.cost;
                var unit=data.unit;
                var street=data.street;
                var city=data.city;
                var zip=data.zip;
                var info=data.info;
                var type=data.type;//
                var status=data.status;//
                var key=data.keys;
                var doc=data.docs;
                var comment=data.comment;
                var tracking=data.tracking;
                if(test=="deli"){
                        //console.log('its a key')
                            axios.post('/api/updateKrequest/'+id,{
                                name,
                                type,
                                status,
                                cost,
                                unit,
                                street,
                                city,
                                zip,
                                info,
                                key,
                                doc,
                                comment,
                                tracking,
                            }).then(response=>{

                                    this.mountedFunction();
                                    this.showDismissibleAlert=true;
                                    setTimeout(() => this.showDismissibleAlert=false, 5000);
                                    if(status=='Delivered'){
                                    axios.post('/api/send/delivered',{
                                        id,
                                    });
                                }
                            }).catch(error => {
                                    this.showDismissibleAlertDan=true;
                                    setTimeout(() => this.showDismissibleAlertDan=false, 5000);

                            });
                    }
                else if(test=="pick"){
                       // console.log('its a doc')
                            axios.post('/api/updatePrequest/'+id,{
                               name,
                                type,
                                status,
                                cost,
                                unit,
                                street,
                                city,
                                zip,
                                info,
                                key,
                                doc,
                                comment,
                                tracking,
                            }).then(response=>{

                                    this.mountedFunction();
                                    this.showDismissibleAlert=true;
                                    setTimeout(() => this.showDismissibleAlert=false, 5000);
                                    if(status=='Secured'){
                                    axios.post('/api/send/secured',{
                                        id,
                                    });
                                }
                            }).catch(error => {
                                    this.showDismissibleAlertDan=true;
                                    setTimeout(() => this.showDismissibleAlertDan=false, 5000);

                            });
                    }
            },

          tableRefresh(){
              this.initp=this.postp;
              this.initd=this.postd;
              this.refresh=false;
              this.mountedFunction();
          },

          getLabel(data){
              var ids=data.id;
              var id=ids.substring(4);
              window.open("/api/getShippingLabel/"+id, "_blank");
//window.open("https://www.google.com", "_blank");
             },


          getLabel(item){
            var ids=item.customer_id;
            var id=ids.substring(4);
            var mid=item.id;
            var item_id=mid.substring(4)
              var label={};
                        label['id']=item_id;
                        label['keys1']=item.keys;
                        label['docs1']=item.docs;
                        axios({
                                url: '/api/pickLabel/'+id,
                                method: 'POST',
                                responseType: 'blob',
                                data:label,
                                }).then((response) => {
                                const url = window.URL.createObjectURL(new Blob([response.data]));
                                const link = document.createElement('a');
                                link.href = url;
                                link.setAttribute('download', 'pick'+id+'.pdf');
                                document.body.appendChild(link);
                                link.click();
                                });
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
