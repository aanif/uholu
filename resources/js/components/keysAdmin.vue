<template>
<div class="container" style="width:100%">

<div class="content" style="padding: 30px 15px;">
    <div class="container-fluid">
        <div class="card" style="width:50%;margin:auto">
            <table class="tableNav" style="">
                <tr align="center">
                    <td><span><a href="#"  v-on:click="filter=''">All Items</a></span></td>
                    <td><span><a href="#"  v-on:click="filter='key'">View Keys </a></span></td>
                    <td><span><a href="#" v-on:click="filter='doc'">View Docs </a></span></td>
                    <td><span><a href="#" v-on:click="refreshtable">Update table <span class="dot" style="background-color:red" v-if="refresh"></span></a></span></td>
                </tr>
            </table>
        </div>
    </div>
</div>



<b-alert v-model="showDismissibleAlert" style="width:92%;margin:auto" variant="success" dismissible>
                        Item Updated
                        </b-alert>
<b-alert v-model="showDismissibleAlertDan" style="width:92%;margin:auto" show variant="danger">Something went wrong, Please try again</b-alert>
<b-alert v-model="showMessageAlertdel" style="width:92%;margin:auto" variant="success" dismissible>
                        Item Deleted
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





<!--////////////////////////////////////////////////////////////////////////////////////////////////-->
                            <div class="overlayDash" style="" v-on:click="modelviewDel=false" v-if="modelviewDel" style="z-index:3;"></div>
                                <div class="modal-content" v-if="modelviewDel" style="z-index:3;position:fixed;top:150px">
                                    <div class="modal-header justify-content-center">
                                        <div class="modal-profile">
                                            <i class="nc-icon nc-bulb-63"></i>
                                        </div>
                                    </div>
                                    <div class="modal-body">

                                        <label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                        Are you sure you want to delete this Item?
                                                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-link btn-simple" v-on:click="DeleteSequence(row.item)">Delete</button>
                                        <button type="button" class="btn btn-link btn-simple" v-on:click="modelviewDel=false">Cancel</button>
                                    </div>
                                </div>
                            <!--////////////////////////////////////////////////////////////////////////////////////////////////-->








<div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card" style="padding-top: 10px;padding-left: 20px;padding-right: 20px;padding-bottom: 20px;">
                                <div class="card-header">
                                    <h4 class="card-title">Edit Profile</h4>
                                </div>
                                <div class="card-body">
                                    <form v-on:submit.prevent="updateItem(row.item)">
                                        <div class="row">
                                            <div class="col-md-5 pr-1">
                                                <div class="form-group">
                                                    <label>Unique ID </label>
                                                    <input type="text" class="form-control" disabled="" placeholder="Company" v-model="row.item.id">
                                                </div>
                                            </div>
                                            <div class="col-md-3 px-1">
                                                <div class="form-group">
                                                    <label>Name</label>
                                                    <input type="text" class="form-control" placeholder="Username" v-model="row.item.name">
                                                </div>
                                            </div>
                                            <div class="col-md-4 pl-1">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Type</label>
                                                    <input type="text" class="form-control" placeholder="Email" v-model="row.item.type">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 pr-1">
                                                <div class="form-group">
                                                    <label>Customer Name</label>
                                                    <input type="text" class="form-control" name="name" disabled="" placeholder="Company" v-model="row.item.custname">
                                                </div>
                                            </div>
                                            <div class="col-md-6 pl-1">
                                                <div class="form-group">
                                                    <label>Customer ID</label>
                                                    <input type="text" class="form-control" name="last_name" disabled="" placeholder="Last Name" v-model="row.item.custid">
                                                </div>
                                            </div>
                                        </div>
                                        <!--<div class="row">
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
                                                    <textarea rows="4" cols="80" class="form-control" name="delivery_info" placeholder="Here can be your description"  v-model="row.item.delivery_info"></textarea>
                                                </div>
                                            </div>
                                        </div>-->
                                        <div class="row">
                                        <div class="col-md-6 pr-1" v-if="row.item.itemType=='doc'">
                                                <div class="form-group">
                                                    <label>Upload File</label>
                                                    <input type="file" id="files" ref="files" multiple v-on:change="handleFiles()"/>
                                                </div>
                                            </div>
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
                                        <button type="submit" class="btn btn-info btn-fill pull-right">Update Item</button>
                                        <br><br><br>
                                        <button type="button" class="btn btn-info btn-fill pull-right" v-on:click="modelviewDel=true">Delete Item</button>
                                        <div class="clearfix"></div>
                                    </form>
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
                     initk:0,
                     postk:0,
                     initp:0,
                     postp:0,
                     refresh:false,
                     showDismissibleAlert:false,
                     showDismissibleAlertDan:false,
                     itemkeys: [],
                     itemdocs: [],
                     items:[],
                     modelviewDel:false,
                     showMessageAlertdel:false,
                     files: [],
                     fields: [
                            { key: 'assigned_id', label: 'ID', sortable: true, sortDirection: 'desc' },
                            { key: 'id', label: 'Unique ID', sortable: true, sortDirection: 'desc' },
                            { key: 'name', label: 'Description', sortable: true, sortDirection: 'desc' },
                            { key: 'type', label: 'Type', sortable: true, sortDirection: 'desc' },
                            { key: 'status', label: 'Status', sortable: true, sortDirection: 'desc' },
                            { key: 'actions', label: 'Actions' }
                            //   { key: 'email', label: 'is Active', formatter: (value, key, item) => { return value ? 'Yes' : 'No' }, sortable: true, sortByFormatted: true, filterByFormatted: true },
                            ],

                            totalRows: 1,
                            currentPage: 1,
                            perPage: 10,
                            pageOptions: [5, 10, 15],
                            sortBy: 'created_at',
                            sortDesc: true,
                            sortDirection: 'desc',
                            filter: null,
                            filterOn: [],
                            infoModal: { id: 'info-modal', title: '', content: '' }
            }


            },

             mounted() {
                 const urlParams = new URLSearchParams(window.location.search);
                 const myParam = urlParams.get('type');
                 this.filter=myParam;
                 axios.get('/api/getCountKeys').then(response=>{
                     this.initk=response.data;
                      axios.get('/api/getCountDocs').then(response=>{
                        this.initp=response.data;
                    });
                 });


      // Set the initial number of items
                this.mountedFunction();

                     window.setInterval(() => {

                axios.get('/api/getCountKeys').then(response=>{
                     this.postk=response.data;
                      axios.get('/api/getCountDocs').then(response=>{
                        this.postp=response.data;
                        var init=this.initp+this.initk;
                        //console.log(init);
                        var post=this.postp+this.postk;
                        //console.log(post);
                        if(post==init)
                        {


                        }
                        else{
                           // console.log('no new user');
                            //this.refresh=false;
                            //console.log('new user');
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

             methods: {
                 mountedFunction(){
                     axios.get('/api/getAllKeys').then(response=>{
                //console.log(response.data);
                            this.itemkeys=response.data;
                            $.each(this.itemkeys, function(key,value){
                                // console.log(key+' ');
                                // console.log(value.id)
                                this.itemkeys[key].itemType='key';
                                this.itemkeys[key].id='key'+value.id;
                                this.itemkeys[key].assigned_id='key'+value.assigned_id;
                                if(this.itemkeys[key].user.role=='customer'){
                                this.itemkeys[key].custid='1003'+value.custid;
                                }
                                if(this.itemkeys[key].user.role=='business'){
                                this.itemkeys[key].custid='2003'+value.custid;}

                            }.bind(this));
                            axios.get('/api/getAllDocs').then(response=>{
                                this.itemdocs=response.data;
                                $.each(this.itemdocs, function(key,value){
                                // console.log(key+' ');
                                // console.log(value.id)
                                this.itemdocs[key].itemType='doc';
                                this.itemdocs[key].id='doc'+value.id;
                                this.itemdocs[key].assigned_id='doc'+value.assigned_id;
                                if(this.itemdocs[key].user.role=='customer'){
                                    this.itemdocs[key].custid='1003'+value.custid;
                                }
                                if(this.itemdocs[key].user.role=='business'){
                                this.itemdocs[key].custid='2003'+value.custid;}

                            }.bind(this));
                                this.items=this.itemkeys.concat(this.itemdocs);
                                  this.totalRows = this.items.length
                                    //console.log(this.items);
                                });


                    });
                 },
                 refreshtable(){
                     this.mountedFunction();
                     this.initp=this.postp;
                     this.initk=this.postk;
                        this.refresh=false;

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
                updateItem(data){
                    var ids=data.id;
                    var name=data.name;
                    var type=data.type;
                    var status=data.status;
                    //console.log(id.length)
                    var id=ids.substring(3);
                    //console.log(id);
                    var test=ids.substring(0,3);
                    //console.log(test);
                    if(test=="key"){
                       // console.log('its a key')
                            axios.post('/api/updateKeyadmin/'+id,{
                                name,
                                type,
                                status,
                            }).then(response=>{
                                    this.mountedFunction();
                                    console.log('done')
                                     this.showDismissibleAlert=true;
                                    setTimeout(() => this.showDismissibleAlert=false, 5000);
                            });
                    }
                    else if(test=="doc"){
                        //console.log('its a doc')
                            axios.post('/api/updateDocadmin/'+id,{
                                name,
                                type,
                                status,
                            }).then(response=>{
                                    this.submitFiles(id);
                                    this.mountedFunction();


                            }).catch(error => {

                                    this.showDismissibleAlertDan=true;
                                    setTimeout(() => this.showDismissibleAlertDan=false, 5000);

                            });
                    }
                },



                 handleFiles() {
                let uploadedFiles = this.$refs.files.files;

                for(var i = 0; i < uploadedFiles.length; i++) {
                    this.files.push(uploadedFiles[i]);
                }
                this.getImagePreviews();
            },


            getImagePreviews(){
                for( let i = 0; i < this.files.length; i++ ){
                    if ( /\.(jpe?g|png|gif)$/i.test( this.files[i].name ) ) {
                        let reader = new FileReader();
                        reader.addEventListener("load", function(){
                            //this.$refs['preview'+parseInt(i)][0].src = reader.result;
                        }.bind(this), false);
                        reader.readAsDataURL( this.files[i] );
                    }else{
                        this.$nextTick(function(){
                            this.$refs['preview'+parseInt(i)][0].src = '/img/generic.png';
                        });
                    }
                }
            },

            DeleteSequence(data){
                    var ids=data.id;
                    var id=ids.substring(3);
                    //console.log(id);
                    var test=ids.substring(0,3);
                    if(test=='key'){
                        axios.delete('/api/deleteItemk/'+id).then(response=>{
                            this.showMessageAlertdel=true;
                            this.modelviewDel=false;
                            setTimeout(() => this.showMessageAlertdel=false, 3000);
                            this.mountedFunction();

                            });
                    }
                    else if(test=='doc'){
                        axios.delete('/api/deleteItemd/'+id).then(response=>{
                            this.showMessageAlertdel=true;
                            this.modelviewDel=false;
                            setTimeout(() => this.showMessageAlertdel=false, 3000);
                            this.mountedFunction();
                            });
                    }
            },

            removeFile( key ){
                this.files.splice( key, 1 );
                this.getImagePreviews();
            },

            submitFiles(id) {

                console.log(id);
                if(this.files.length){
                        console.log('pic func');

                    for( let i = 0; i < this.files.length; i++ ){
                        if(this.files[i].id) {
                            continue;
                        }
                        let formData = new FormData();
                        formData.append('file', this.files[i]);

                        axios.post('/api/upload-file/'+id,
                            formData,
                            //id,
                            {
                                headers: {
                                    'Content-Type': 'multipart/form-data'
                                }
                            }
                        ).then(function(data) {
                            this.files[i].id = data['data']['id'];
                            this.files.splice(i, 1, this.files[i]);
                            //console.log('success');
                            //formData.delete('file');
                            //formData=null;
                            this.files.pop();
                            //this.mountMethod();
                            this.mountedFunction();
                                    this.showDismissibleAlert=true;
                                    setTimeout(() => this.showDismissibleAlert=false, 5000);
                        }.bind(this)).catch(function(data) {
                            //console.log('error');
                        });
                    }
                }
                else{
                    console.log('else func');
                    this.showDismissibleAlert=true;
                                    setTimeout(() => this.showDismissibleAlert=false, 5000);
                }
            },


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
