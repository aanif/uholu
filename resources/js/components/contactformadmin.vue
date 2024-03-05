<template>
<div class="container" style="width:100%">













<br>
<b-alert v-model="showMessageAlert" style="width:92%;margin:auto" variant="success" dismissible>
                                    Message Deleted!
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
      <template v-slot:cell(message)="row" >
        <div style="white-space: nowrap; width: 350px; overflow: hidden;text-overflow: ellipsis"><b v-if="row.item.flag==0">{{row.item.message}}</b></div>
        <div style="white-space: nowrap; width: 350px; overflow: hidden;text-overflow: ellipsis"><span v-if="row.item.flag==1">{{ row.item.message }}</span></div>
      </template>
      <template v-slot:cell(created_at)="row" >
        <b v-if="row.item.flag==0">{{ row.item.created_at }}</b>
        <span v-if="row.item.flag==1">{{ row.item.created_at }}</span>
      </template>
      <template v-slot:cell(email)="row" >
        <b v-if="row.item.flag==0">{{ row.item.email }}</b>
        <span v-if="row.item.flag==1">{{ row.item.email }}</span>
      </template>
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
        <b-button size="sm" v-if="row.item.flag==0" @click="markAsReadFunction(row.item)" class="mr-1">
          Mark as Read
        </b-button>
        <b-button size="sm"  @click="deleteMessage(row.item)" class="mr-1">
          Delete
        </b-button>
      </template>

      <template v-slot:row-details="row">
        <b-card>












        <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card" style="padding-top: 10px;padding-left: 20px;padding-right: 20px;padding-bottom: 20px;">

                                <div class="card-body">
                                    <form v-on:submit.prevent="updateRequest(row.item)">


                                        <div class="row">
                                            <div class="col-md-6 pr-1">
                                                <div class="form-group">
                                                    <label>Name</label>
                                                    <input type="text" class="form-control" disabled="" name="name" placeholder="Company" v-model="row.item.name">
                                                </div>
                                            </div>
                                            <div class="col-md-6 pl-1">
                                                <div class="form-group">
                                                    <label>Phone</label>
                                                    <input type="text" class="form-control" disabled="" name="last_name" placeholder="Last Name" v-model="row.item.phone">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Message</label>
                                                    <textarea rows="4" cols="80" class="form-control" disabled="" name="Message" placeholder="Here can be your description"  v-model="row.item.message"></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <!--<button type="submit" class="btn btn-info btn-fill pull-right">Update Profile</button>-->
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


    data(){

            return{
                items:[],
                notRead:true,
                itemsa:[],
                itemsb:[],
                showMessageAlert:false,
                showDismissibleAlert:false,
                showDismissibleAlertDan:false,
                fields: [
                //{ key: 'id', label: 'ID', sortable: true, sortDirection: 'desc' },
                //{ key: 'name', label: 'Person name', sortable: true, sortDirection: 'desc' },
                { key: 'created_at', label: 'Time', sortable: true, class: 'text-center' },

                { key: 'email', label: 'Email', sortable: true, sortDirection: 'desc' },
                //{ key: 'phone', label: 'Phone', sortable: true, sortDirection: 'desc' },

                //   { key: 'email', label: 'is Active', formatter: (value, key, item) => { return value ? 'Yes' : 'No' }, sortable: true, sortByFormatted: true, filterByFormatted: true },
                //{ key: 'tracking', label: 'Tracking Number', sortable: true, sortDirection: 'desc' },
                { key: 'message', label: 'Message', sortable: true, sortDirection: 'desc' },
                //{ key: 'status', label: 'Status', sortable: true, class: 'text-center' },
                { key: 'actions', label: 'Actions' }
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
            mountedFunction()
            {
                axios.get('/api/contactformget').then(response=>{
                    this.items=response.data;
                    this.totalRows = this.items.length;
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
            deleteMessage(data){
                var id=data.id;
                axios.delete('/api/contactformdelete/'+id).then(response=>{
                    this.showMessageAlert=true;
                    this.mountedFunction();
                     setTimeout(() => this.showMessageAlert=false, 4000);

                });
            },

            markAsReadFunction(data){
                     var id=data.id;
                axios.post('/api/contactformread/'+id,{


                    }).then(response => {
                            this.mountedFunction();
                    });
            },
    }
}

</script>
