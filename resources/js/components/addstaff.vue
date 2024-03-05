<template>
<div class="container" style="width:100%">



<div v-if="!allow" style="width:80%;margin-left:10px;margin:auto">
<br>
<b-alert show variant="danger"><center>Please Complete Your Profile In Order To Request Delivery &nbsp&nbsp&nbsp<a href="/dashboard/profile">Profile Settings</a></center></b-alert>
    </div>
<div v-if="deletedStaff" style="width:80%;margin-left:10px;margin:auto">
<br>
<b-alert show variant="success"><center>Staff Deleted Successfully </center></b-alert>
    </div>
<div v-if="updatedStaff" style="width:80%;margin-left:10px;margin:auto">
<br>
<b-alert show variant="success"><center>Staff Updated Successfully</center></b-alert>
    </div>
<div v-if="addedStaff" style="width:80%;margin-left:10px;margin:auto">
<br>
<b-alert show variant="success"><center>Staff Created Successfully</center></b-alert>
    </div>

<br><br>
<button class="btn btn-primary" v-if="viewStaffactive && allow" v-on:click="addStaffClicked" style="position:absolute;right:45px;margin-top:-20px;"> Add Staff </button>
<button class="btn btn-primary" v-if="addStaffactive" v-on:click="viewStaffClicked" style="position:absolute;right:45px;margin-top:-20px;"> View Staff </button>















<!--///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->












<div class="content" v-if="addStaffactive" >
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-8" style="margin-left:4%">
                            <div class="card" style="padding:20px;margin-top:30px">
                                <div class="card-header">
                                    <h4 class="card-title">Edit Profile</h4>
                                </div>
                                <div class="card-body">
                                    <form v-on:submit.prevent="verifyPassword">
                                        <div class="row">
                                            <div class="col-md-6 pr-1">
                                                <div class="form-group">
                                                    <label>Company</label>
                                                    <input type="text" class="form-control" disabled="" placeholder="Company" v-model="cnameauth" REQUIRED>
                                                </div>
                                            </div>

                                            <div class="col-md-6 pr-1">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Email address</label>
                                                    <input type="email" class="form-control" placeholder="Email" v-model="email" REQUIRED>
                                                </div>
                                                <p style="color:red" v-if="staffemailerr">Email already exists</p>
                                            </div>
                                        </div>
                                         <div class="row">
                                            <div class="col-md-5 pr-1">
                                                <div class="form-group">
                                                    <label>Password</label>
                                                    <input type="password" class="form-control pwd" placeholder="Password" v-model="password" REQUIRED>
                                                </div>
                                            </div>
                                            <div class="col-md-1 pr-1">
                                                <br>
                                                <button class="btn btn-default reveal" v-on:click="showPwd" type="button"><i class="pe-7s-look"></i></button>
                                            </div>
                                            <div class="col-md-6 pl-1">
                                                <div class="form-group">
                                                    <label>Re-enter Password</label>
                                                    <input type="password" class="form-control pwd" placeholder="Password" v-model="repassword" REQUIRED>
                                                </div>
                                                <p style="color:red" v-if="passErr">Password Mismatch</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 pr-1">
                                                <div class="form-group">
                                                    <label>First Name</label>
                                                    <input type="text" class="form-control" placeholder="First Name" v-model="name" REQUIRED>
                                                </div>
                                            </div>
                                            <div class="col-md-6 pl-1">
                                                <div class="form-group">
                                                    <label>Last Name</label>
                                                    <input type="text" class="form-control" placeholder="Last Name" v-model="last_name" REQUIRED>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5 pr-1">
                                                <div class="form-group">
                                                    <h6>Permissions</h6><br>

                                                    <input type="checkbox" style=" display: inline-block;" v-model="storage" value="true"> <label> Storage</label><br>

                                                    <input type="checkbox" style=" display: inline-block;" v-model="delivery" value="true"> <label> Delivery Request</label><br>

                                                    <input type="checkbox" style=" display: inline-block;" v-model="pickup" value="true"> <label> Pickup Request</label><br>

                                                    <input type="checkbox" style=" display: inline-block;" v-model="active" value="true"> <label> Active Requests</label><br>

                                                    <input type="checkbox" style=" display: inline-block;" v-model="history" value="true"> <label> Request History</label><br>

                                                    <!--<input type="checkbox" style=" display: inline-block;" v-model="staff" value="true"> <label> Add Staff</label><br>-->

                                                </div>
                                            </div>
                                        </div>
                                        <div v-if="userFull" style="width:80%;margin-left:10px;margin:auto">
                                            <b-alert show variant="danger"><center>Can't Add More than 5 Staff Members</center></b-alert>
                                        </div>
                                        <button type="submit" class="btn btn-info btn-fill pull-right">Add Staff</button>
                                        <div class="clearfix"></div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>






<!--///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->










<div class="content" style="" v-if="viewStaffactive">
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
        <b-button size="sm" @click="deleteStaff(row.item)">
          Delete Staff
        </b-button>
      </template>

      <template v-slot:row-details="row">
        <b-card>
















<div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card" style="padding:20px;margin-top:30px">
                                <div class="card-header">
                                    <h4 class="card-title">Edit Profile</h4>
                                </div>
                                <div class="card-body">
                                    <form v-on:submit.prevent="updateStaff(row.item)">
                                        <div class="row">
                                            <div class="col-md-6 pr-1">
                                                <div class="form-group">
                                                    <label>Company</label>
                                                    <input type="text" class="form-control" disabled="" placeholder="Company" v-model="row.item.cname">
                                                </div>
                                            </div>

                                            <div class="col-md-6 pr-1">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Email address</label>
                                                    <input type="email" class="form-control" placeholder="Email" v-model="row.item.email" REQUIRED>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6 pr-1">
                                                <div class="form-group">
                                                    <label>First Name</label>
                                                    <input type="text" class="form-control" placeholder="First Name" v-model="row.item.name" REQUIRED>
                                                </div>
                                            </div>
                                            <div class="col-md-6 pl-1">
                                                <div class="form-group">
                                                    <label>Last Name</label>
                                                    <input type="text" class="form-control" placeholder="Last Name" v-model="row.item.last_name" REQUIRED>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5 pr-1">
                                                <div class="form-group">
                                                    <h6>Permissions</h6><br>

                                                    <input type="checkbox" style=" display: inline-block;" v-model="row.item.storage" value="true"> <label> Storage</label><br>

                                                    <input type="checkbox" style=" display: inline-block;" v-model="row.item.delivery" value="true"> <label> Delivery Request</label><br>

                                                    <input type="checkbox" style=" display: inline-block;" v-model="row.item.pickup" value="true"> <label> Pickup Request</label><br>

                                                    <input type="checkbox" style=" display: inline-block;" v-model="row.item.active" value="true"> <label> Active Requests</label><br>

                                                    <input type="checkbox" style=" display: inline-block;" v-model="row.item.history" value="true"> <label> Request History</label><br>

                                                    <input type="checkbox" style=" display: inline-block;" v-model="row.item.staff" value="true"> <label> Add Staff</label><br>

                                                </div>
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-info btn-fill pull-right">Update Staff</button>
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

    props:[
        'user_id',
        'cnameauth',
        'authvarprofile1',
         'authvarprofile2',
         'authvarprofile3',
    ],

    data(){

            return{
                allow:true,
                name:null,
                last_name:null,
                password:null,
                repassword:null,
                email:null,
                storage:null,
                delivery:null,
                pickup:null,
                active:null,
                history:null,
                staff:null,
                staffemailerr:false,
                passErr:false,
                viewStaffactive:true,
                addStaffactive:false,
                messageText:null,
                veriMessage:null,
                modelview:false,
                veriMessageErr:null,
                codever:null,
                verButton:true,
                genButton:false,
                showMessageAlert:false,
                init:0,
                initp:0,
                post:0,
                postp:0,
                refresh:false,
                refreshp:false,
                showDismissibleAlert:false,
                showDismissibleAlertDan:false,
                addedStaff:false,
                deletedStaff:false,
                updatedStaff:false,
                userFull:false,
                items: [
        //   { isActive: true, age: 40, name: { first: 'Dickerson', last: 'Macdonald' } },
        //   { isActive: false, age: 21, name: { first: 'Larsen', last: 'Shaw' } },
        //   { isActive: false, age: 9, name: { first: 'Mini', last: 'Navarro' },  _rowVariant: 'success' },
        //   { isActive: false, age: 89, name: { first: 'Geneva', last: 'Wilson' } },
        //   { isActive: true, age: 38, name: { first: 'Jami', last: 'Carney' } },
        //   { isActive: false, age: 27, name: { first: 'Essie', last: 'Dunlap' } },
        //   { isActive: true, age: 40, name: { first: 'Thor', last: 'Macdonald' } },
        //   { isActive: true, age: 87, name: { first: 'Larsen', last: 'Shaw' }, _cellVariants: { age: 'danger', isActive: 'warning' } },
        //   { isActive: false, age: 26, name: { first: 'Mitzi', last: 'Navarro' } },
        //   { isActive: false, age: 22, name: { first: 'Genevieve', last: 'Wilson' } },
        //   { isActive: true, age: 38, name: { first: 'John', last: 'Carney' } },
        //   { isActive: false, age: 29, name: { first: 'Dick', last: 'Dunlap' } }
        ],
        fields: [
          { key: 'id', label: 'ID', sortable: true, sortDirection: 'desc' },
          { key: 'name', label: 'First name', sortable: true, sortDirection: 'desc' },
          { key: 'last_name', label: 'last name', sortable: true, sortDirection: 'desc' },
          { key: 'email', label: 'Email', sortable: true, sortDirection: 'desc' },
          //{ key: 'status', label: 'Status', sortable: true, sortDirection: 'desc' },

        //   { key: 'email', label: 'is Active', formatter: (value, key, item) => { return value ? 'Yes' : 'No' }, sortable: true, sortByFormatted: true, filterByFormatted: true },
          //{ key: 'phone', label: 'Phone', sortable: true, class: 'text-center' },
          { key: 'actions', label: 'Actions' }
        ],
        totalRows: 1,
        currentPage: 1,
        perPage: 10,
        pageOptions: [5, 10, 15],
        sortBy: '',
        sortDesc: false,
        sortDirection: 'asc',
        filter: null,
        filterOn: [],
        infoModal: { id: 'info-modal', title: '', content: '' }
            }

    },
    created(){


    },
    mounted() {
        this.mountFunction();
        if(this.authvarprofile1=='1' && this.authvarprofile2=='1' && this.authvarprofile3=='1'){
            this.allow=true;
        }else{
            this.allow=false;
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

    methods:{
        mountFunction(){
            var parent_id=this.user_id;
            axios.post('/api/getStaff',{
                parent_id,
            }).then(response=>{
                this.items=response.data;
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
      addStaffClicked(){
          this.addStaffactive=true;
          this.viewStaffactive=false;
      },
      viewStaffClicked(){
          this.addStaffactive=false;
          this.viewStaffactive=true;
      },
      showPwd(){
        console.log('RUN PWD');
        var $pwd = jQuery(".pwd");
        if ($pwd.attr('type') === 'password') {
            $pwd.attr('type', 'text');
        } else {
            $pwd.attr('type', 'password');
        }
      },
      verifyPassword(){
          var pass=this.password;
          var repass=this.repassword;
          if(pass==repass){
              this.verifyEmailNotExist();
          }
          else{
              //console.log('password mismatch')
              this.passErr=true;
              setTimeout(() => this.passErr=false, 5000);
          }
      },
      verifyEmailNotExist(){
          var cemail=this.email;
          axios.post('/api/emailCheck',{
                cemail,
            }).then(response=>{
                if(response.data=='New')
                {
                    this.addStaffFunction();
                }
                else if(response.data=='Exists'){

                    this.staffemailerr=true;
                    setTimeout(() => this.staffemailerr=false, 5000);
                }
            }).catch(error => {

            });

      },

      deleteStaff(data){
          var id=data.id;
          axios.delete('/api/deleteStaff/'+id).then(response=>{
               this.mountFunction();
              this.deletedStaff=true;
                setTimeout(() => this.deletedStaff=false, 5000);
            }).catch(error => {

            });
      },

      updateStaff(data){
                var id=data.id;
                var namec=data.name;
                var last_namec=data.last_name;
                var passwordc=data.password;
                var emailc=data.email;
                var storagec=data.storage;
                var deliveryc=data.delivery;
                var pickupc=data.pickup;
                var activec=data.active;
                var historyc=data.history;
                var staffc=data.staff;
           axios.post('/api/updateStaff/'+id,{
                namec,
                last_namec,
                passwordc,
                emailc,
                storagec,
                deliveryc,
                pickupc,
                activec,
                historyc,
                staffc,
           }).then(response=>{
                this.mountFunction();
               this.updatedStaff=true;
                setTimeout(() => this.updatedStaff=false, 5000);
            }).catch(error => {

            });
      },

      addStaffFunction(){
          var id=this.user_id;
          var namec=this.name;
          var last_namec=this.last_name;
          var passwordc=this.password;
          var emailc=this.email;
          var storagec=this.storage;
          var deliveryc=this.delivery;
          var pickupc=this.pickup;
          var activec=this.active;
          var historyc=this.history;
          var staffc=this.staff;
            axios.post('/api/addStaff/'+id,{
                namec,
                last_namec,
                passwordc,
                emailc,
                storagec,
                deliveryc,
                pickupc,
                activec,
                historyc,
                staffc,
            }).then(response=>{
                //this.items=response.data;
                if(response.data=='Full'){
                    this.userFull=true;
                    setTimeout(() => this.userFull=false, 5000);
                }
                else{
                this.mountFunction();
                this.addedStaff=true;
                setTimeout(() => this.addedStaff=false, 5000);
                this.viewStaffactive=true;
                this.addStaffactive=false;
                this.name=null;
                this.last_name=null;
                this.password=null;
                this.repassword=null;
                this.email=null;
                this.storage=null;
                this.delivery=null;
                this.pickup=null;
                this.active=null;
                this.history=null;
                this.staff=null;}
            }).catch(error => {

            });

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
