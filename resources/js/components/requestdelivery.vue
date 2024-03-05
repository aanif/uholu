<template>
<div class="container" style="width:100%">




<!--//////////////////////////////////////////////////////////////////////////////////////////////-->
 <div v-if="actionLayover">
    <div class="overlayDash" style="" v-on:click="actionLayover=false">
    </div>
                    <div class="popupDash" style="margin-top:-30px;position:absolute;width:80%" >



                                <i class="fa fa-window-close"  aria-hidden="true" style="font-size:20px;float:right;margin-right:7px;margin-top:4px" v-on:click="actionLayover=false"></i>
                                <br>
                                <div>



                                <center><h4 style="margin-top:-20px"><b>Request Delivery</b></h4></center>
                                <center><p>Pickup charges will be deducted from your default payment method</p></center>
                                        <center><p>Please go to edit profile to change you payment method.</p></center>
                                        <form  v-on:submit.prevent="deliveryCommence" >
                                        <table style="background-color:#F7F7F8;width:100%">
                                            <tr>
                                                <!--<td rowspan="2" style="vertical-align:top;border-right: 1px solid #B0B0B0;">
                                                        <h6 style="margin-bottom:10px">Selected Keys</h6>
                                                        <div v-for="(result,index) in pushedKey" style="width:90%;background-color:#909090;border:1px solid ##909090;padding-top:5px;padding-bottom:5px;margin-top:10px;">
                                                                <table style="width:100%;background-color:#909090">
                                                                        <tr>
                                                                            <td align="center" style="width:33%;"><span class="dot"></span></td>
                                                                            <td align="" style="width:33%;"><span style="color:white">Key{{result.assigned_id}}</span></td>
                                                                            <td align="" style="width:33%;"><span style="color:white">{{result.name}}</span></td>
                                                                        </tr>
                                                                </table>
                                                        </div>

                                                        <h6 style="margin-bottom:10px;margin-top:20px">Selected Documents</h6>
                                                        <div v-for="(result,index) in pushedDoc" style="width:90%;background-color:#909090;border:1px solid #909090;padding-top:5px;padding-bottom:5px;margin-top:10px;">
                                                                <table style="width:100%;background-color:#909090">
                                                                        <tr>
                                                                            <td align="center" style="width:33%;"><span class="dot"></span></td>
                                                                            <td align="" style="width:33%;"><span style="color:white">Doc{{result.assigned_id}}</span></td>
                                                                            <td align="" style="width:33%;"><span style="color:white">{{result.name}}</span></td>
                                                                        </tr>
                                                                </table>
                                                        </div>












                                                </td>-->
                                                <td style="width:60%">
                                                <div style="background-color:#F7F7F8;border:1px solid black;width:80%;height:100px;margin-left:10px;margin-right:10px;margin-top:10px" v-if="addedAdd">
                                                                <input type="radio" name="select_address" value="" v-on:click="selectPrimary" style="margin-top:30px;margin-left:10px" checked>
                                                                <table style="margin-left:40px;margin-top:-30px">
                                                                            <tr>
                                                                                <td style="padding-left:10px">House/Apt# {{unit}}</td>
                                                                                <td style="padding-left:10px">Street# {{street}}</td>
                                                                            </tr>

                                                                            <tr>
                                                                                <td style="padding-left:10px">City {{city}}</td>
                                                                                <td style="padding-left:10px">zip {{zip}}</td>
                                                                            </tr>

                                                                            <tr>
                                                                                <td style="padding-left:10px">{{info}}</td>
                                                                            </tr>
                                                                        </table>
                                                </div>
                                                <div style="background-color:#F7F7F8;border:1px solid black;width:80%;height:100px;margin-left:10px;margin-right:10px;margin-top:10px" v-if="addedAdd && add_check">
                                                                <input type="radio" name="select_address" value="" v-on:click="selectSecondary" style="margin-top:30px;margin-left:10px">
                                                                <table style="margin-left:40px;margin-top:-30px">
                                                                            <tr>
                                                                                <td style="padding-left:10px">House/Apt# {{unit_sec}}</td>
                                                                                <td style="padding-left:10px">Street# {{street_sec}}</td>
                                                                            </tr>

                                                                            <tr>
                                                                                <td style="padding-left:10px">City {{city_sec}}</td>
                                                                                <td style="padding-left:10px">zip {{zip_sec}}</td>
                                                                            </tr>

                                                                            <tr>
                                                                                <td style="padding-left:10px">{{info_sec}}</td>
                                                                            </tr>
                                                                        </table>
                                                </div>

                                                <!--Address form items-->
                                                <a href="#!" v-on:click="customAddress" v-if="addedAdd" style="margin-left:10px;margin-top:10px">+ Add Custom Address</a>
                                                <div class="form-group" style="margin-left:10px">
                                                                            <label>Delivery Type</label>
                                                                            <select class="form-control" v-model="cost" REQUIRED>
                                                                                <option  value="2500">Normal Delivery -- $25</option>
                                                                                <option  value="3500">Urgent Delivery -- $35</option>
                                                                            </select>
                                                                            <!--<select v-if="kemail==1" class="form-control" v-model="cost" REQUIRED>
                                                                                <option  value="0">Free Pickup</option>

                                                                            </select>-->
                                                                        </div>
                                                            <div v-if="customtable" class="form-group" style="margin-left:10px">
                                                            <label>Enter You Address Here</label>
                                                            <vue-google-autocomplete

                                                                ref="address"
                                                                id="map"
                                                                classname="form-control"
                                                                placeholder="Please type your address"
                                                                v-on:placechanged="getAddressData"
                                                                country="au"
                                                                REQUIRED
                                                            >
                                                            </vue-google-autocomplete></div>
                                                            <table style="background-color:#F7F7F8;margin-top:10px" v-if="customtable">
                                                            <tr><td>
                                                            </td></tr>
                                                                <tr>
                                                                    <td >
                                                                        <div class="form-group" style="margin-left:10px">
                                                                                <label>Unit/Apt #</label><input type="text" class="form-control" v-model="cus_unit" style="background-color: #E7E7E7" disabled  REQUIRED></input>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-group" style="margin-left:10px">
                                                                                <label>Street</label><input type="text" class="form-control" v-model="cus_street" style="background-color: #E7E7E7" disabled  REQUIRED></input>
                                                                        </div>
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>
                                                                        <div class="form-group" style="margin-left:10px">
                                                                                <label>City</label><input type="text" class="form-control" v-model="cus_city"  style="background-color: #E7E7E7" disabled  REQUIRED></input>
                                                                        </div>
                                                                    </td>
                                                                    <td style="margin-left:10px">
                                                                        <div class="form-group" style="margin-left:10px">
                                                                                <label>ZipCode</label><input type="text" class="form-control" v-model="cus_zip" style="background-color: #E7E7E7" disabled  REQUIRED></input>
                                                                        </div>
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>
                                                                        <div class="form-group" style="margin-left:10px">
                                                                            <label>Additional Instructions</label><input type="text" class="form-control" v-model="cus_info"></input>
                                                                        </div>
                                                                    </td>
                                                                    <td>

                                                                    </td>
                                                                </tr>



                                                            </table>
                                                            <a href="#!" v-on:click="AddedAddress" v-if="customtable" style="margin-left:10px;margin-top:10px">Select Existing Address</a>






                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding-top:20px">
                                                <!--payment and confirmation items-->






                                                        <button class="btn btn-primary" style="border-color:#FCD206;background-color:#FCD206;margin-left:10px" type="submit" v-if="!loader"><span style="color:black"><b>CONFIRM</b></span></button>
                                                        <button class="btn btn-primary" style="border-color:#FCD206;background-color:#FCD206;margin-left:10px" type="submit" v-if="loader" disabled>
                                                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                                        Loading...
                                                        </button>
                                                </td>
                                            </tr>













                                        </table>
                                        </form>









                                        <!--<form v-on:submit.prevent="deliveryCommence" >
                                        <table style="background-color:#F7F7F8">
                                            <tr>
                                                <td rowspan="2">
                                                <!View Selected items-
                                                        <table style="background-color:#F7F7F8">
                                                                <tr v-for="(result,index) in pushedKey">
                                                                            <td class="column2">{{result.name}}</td>
                                                                            <td class="column3">{{result.type}}</td>
                                                                </tr>
                                                                <tr v-for="(result,index) in pushedDoc">
                                                                            <td class="column2">{{result.name}}</td>
                                                                            <td class="column3">{{result.type}}</td>
                                                                </tr>

                                                        </table>





                                                </td>
                                                <td style="width:50%">
                                                <!Address form items
                                                            <table style="background-color:#F7F7F8">
                                                                <tr>
                                                                    <td><p>City</p><input type="text" v-model="city" REQUIRED></input></td>
                                                                    <td><p>Street</p><input type="text"v-model="street" REQUIRED></input></td>
                                                                </tr>

                                                                <tr>
                                                                    <td><p>Unit/Apt #</p><input type="text" v-model="unit" REQUIRED></input></td>
                                                                    <td><p>ZipCode</p><input type="text" v-model="zip" REQUIRED></input></td>
                                                                </tr>

                                                                <tr>
                                                                    <td><p>Additional Information</p><input type="text" v-model="info"></input></td>
                                                                    <td></td>
                                                                </tr>



                                                            </table>






                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding-top:20px">
                                                payment and confirmation items-




                                                        <select v-model="cost">
                                                            <option  value="2500">Normal Pickup</option>
                                                            <option  value="3500">Urgent Pickup</option>
                                                         </select>
                                                        <button class="btn btn-secondary" type="submit">Confirm Delivery</button>
                                                </td>
                                            </tr>













                                        </table>
                                        </form>-->

                                </div>
                    </div>

 </div>



 <!--///////////////////////////////////////////////////////////////////////////////////////////////-->




        <div style="padding-left:20px;padding-top:10px">
<br><br>
<div style="width:65%">
<div v-if="!allow" style="width:100%;margin-left:10px">
<b-alert show variant="danger">Please Complete Your Profile In Order To Request Delivery &nbsp&nbsp&nbsp<a href="/dashboard/profile">Profile Settings</a></b-alert>
    </div>
<b-alert v-model="showDismissibleAlert" variant="success" dismissible>
                        Delivery Request Sent
                        </b-alert>
<b-alert v-model="showDismissibleAlertDan" show variant="danger">Something went wrong, Please try again</b-alert>
</div>
<button id="buttonKey" type="button" class="btn btn-primary" style="position:absolute;right:30px;margin-top:-30px;border-color:#FCD206;background-color:#FCD206" v-on:click="openpop" v-show="actionButton && allow">
    <span style="color:black"><b>REQUEST DELIVERY</b></span>
  </button><br>



<div  v-if="key_id1">
                    <!--<div style="diplay:flex">
                                <h4 style="margin-left:10px;"><b>My Keys</b></h4>

                    </div>-->

                    <div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card strpied-tabled-with-hover" style="padding:15px">
                    <div class="card-header ">
                        <h4 class="card-title" style="margin-top:0px">Keys</h4>
                                    <!--<p class="card-category">Here is a subtitle for this table</p>-->
                    </div>
                    <div class="card-body table-full-width table-responsive">

<!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->



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
        >-->

          <b-input-group size="md" style="margin-left:20px" >
            <b-form-input
              v-model="filter"
              type="search"
              id="filterInput"
              placeholder="Type to Search"
            ></b-form-input>
            <br>
            <b-input-group-append>
              <b-button :disabled="!filter" @click="filter = ''">Clear</b-button>
            </b-input-group-append>
          </b-input-group>
        </b-form-group>
      </b-col>
<br>
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
<p>
      <b-button size="sm" @click="selectAllRows">Select all</b-button>
      <b-button size="sm" @click="clearSelected">Clear selected</b-button>

    </p>
    <br>
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
    ref="selectableTable"
      selectable
      :select-mode="selectMode"
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
      @row-selected="pushkey"

    >
      <!--<template v-slot:cell(message)="row" >
        <div style="white-space: nowrap; width: 350px; overflow: hidden;text-overflow: ellipsis"><b v-if="row.item.flag==0">{{row.item.message}}</b></div>
        <div style="white-space: nowrap; width: 350px; overflow: hidden;text-overflow: ellipsis"><span v-if="row.item.flag==1">{{ row.item.message }}</span></div>
      </template>-->
      <!--<template v-slot:cell(amount)="row" >
       ${{ row.item.amount }}


      </template>-->


      <!-- <template v-slot:cell(name)="row">
          <template v-if="!row.item.isActive" bgcolor="#909090">
            <span style="color:white">{{row.item.name}}</span>
          </template>
      </template> -->
      <!-- <template v-slot:cell(status)="row">

      </template> -->
      <!-- <template v-slot:cell(actions)="row"> -->
        <!--<b-button size="sm" @click="info(row.item, row.index, $event.target)" class="mr-1">
          Info modal
        </b-button>-->
        <!--<b-button size="sm" @click="row.toggleDetails">
          {{ row.detailsShowing ? 'Hide' : 'Show' }} Details
        </b-button>-->
        <!-- <b-button size="sm" v-if="row.item.status=='Pending'||row.item.status=='Delivered'||row.item.status=='Pick Up Requested'" @click="editDoc(row.item.index)" class="mr-1">
          Edit
        </b-button>
        <b-button size="sm" v-if="row.item.status=='Pending'||row.item.status=='Delivered'" @click="deleteDoc(row.item.index)" class="mr-1">
          Delete
        </b-button>
        <b-button size="sm" v-if="row.item.filename" :href="row.item.filename" target="_blank"  class="mr-1">
          View File
        </b-button>
        <b-button size="sm" v-if="!row.item.filename && row.item.status=='Secured' && !row.item.request && roleofactive=='business'" @click="activeScan(row.item.id)" class="mr-1">
          Request Scan
        </b-button>
        <span v-if="row.item.request"  class="mr-1">
          Scan Requested
        </span>
      </template> -->

      <template v-slot:row-details="row">
        <b-card>






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






























<!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->


                               <!-- <table class="table table-hover table-striped">
                                <col width="10%">
                                        <thead>
                                            <th v-on:click="selectAllKeys" v-if="preCheck"><input type="checkbox" style="margin-bottom:10px"></input></th><th v-on:click="deSelectAllKeys"  v-if="!preCheck"><a style="color:#FCD206" >Remove</a></th>
                                            <th>ID</th>
                                            <th>Description</th>
                                            <th>Type</th>
                                            <th>Status</th>

                                        </thead>
                                        <tbody>
                                            <tr v-for="(result,index) in keyData"  >
                                                    <td v-on:click="pushkey(index)" v-if="result.isActive"><input type="checkbox"></input></td>   <td bgcolor="#909090" v-if="!result.isActive"><a style="color:#FCD206" v-on:click="removeKey(index)" >Remove</a></td>
                                                    <td v-on:click="pushkey(index)" v-if="result.isActive">Key{{result.assigned}}</td>                  <td bgcolor="#909090" v-if="!result.isActive"><span style="color:white">Key{{result.assigned_id}}</span></td>
                                                    <td v-on:click="pushkey(index)" v-if="result.isActive">{{result.name}}</td>                   <td bgcolor="#909090" v-if="!result.isActive"><span style="color:white">{{result.name}}</span></td>
                                                    <td v-on:click="pushkey(index)" v-if="result.isActive">{{result.type}}</td>                   <td bgcolor="#909090" v-if="!result.isActive"><span style="color:white">{{result.type}}</span></td>
                                                    <td v-on:click="pushkey(index)" v-if="result.isActive">{{result.status}}</td>                 <td bgcolor="#909090" v-if="!result.isActive"><span style="color:white">{{result.status}}</span></td>

                                                </tr>


                                        </tbody>
                                    </table>-->



                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>


<!--////////////////////////////////////////////////////////////////////////////////////////////-->


<div class="tab"  v-if="doc_id1">
                    <!--<div style="diplay:flex">
                                <h4 style="margin-left:10px;"><b>My Documents</b></h4>
                    </div>-->




                                                <div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card strpied-tabled-with-hover" style="padding:15px">
                    <div class="card-header ">
                                    <h4 class="card-title" style="margin-top:0px">Documents</h4>
                                    <!--<p class="card-category">Here is a subtitle for this table</p>-->
                    </div>
                    <div class="card-body table-full-width table-responsive">


<!--////////////////////////////////////////////////////////////////////////////////////////////////////////-->

















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
        >-->
          <b-input-group size="md" style="margin-left:20px">
            <b-form-input
              v-model="filter1"
              type="search"
              id="filterInput"
              placeholder="Type to Search"
            ></b-form-input>
            <br>
            <b-input-group-append>
              <b-button :disabled="!filter1" @click="filter1 = ''">Clear</b-button>
            </b-input-group-append>
          </b-input-group>
        </b-form-group>
      </b-col>
<br>
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
            :options="pageOptions1"
          ></b-form-select>
        </b-form-group>

      </b-col>

      <b-col sm="5" md="6" class="my-1">
<p>
      <b-button size="sm" @click="selectAllRows1">Select all</b-button>
      <b-button size="sm" @click="clearSelected1">Clear selected</b-button>

    </p>
    <br>
      </b-col>

      <b-col sm="7" md="6" class="my-1">
        <b-pagination
          v-model="currentPage1"
          :total-rows="totalRows1"
          :per-page="perPage1"
          align="fill"
          size="sm"
          class="my-0"
        ></b-pagination>
      </b-col>
    </b-row>

    <!-- Main table element -->
    <b-table
    ref="selectableTable1"
      selectable
      :select-mode="selectMode"
      show-empty
      small
      stacked="md"
      :items="items1"
      :fields="fields1"
      :current-page="currentPage1"
      :per-page="perPage1"
      :filter="filter1"
      :filterIncludedFields="filterOn1"
      :sort-by.sync="sortBy1"
      :sort-desc.sync="sortDesc1"
      :sort-direction="sortDirection1"
      @filtered="onFiltered1"
      @row-selected="pushdoc"

    >
      <!--<template v-slot:cell(message)="row" >
        <div style="white-space: nowrap; width: 350px; overflow: hidden;text-overflow: ellipsis"><b v-if="row.item.flag==0">{{row.item.message}}</b></div>
        <div style="white-space: nowrap; width: 350px; overflow: hidden;text-overflow: ellipsis"><span v-if="row.item.flag==1">{{ row.item.message }}</span></div>
      </template>-->
      <!--<template v-slot:cell(amount)="row" >
       ${{ row.item.amount }}


      </template>-->


      <!-- <template v-slot:cell(name)="row">
          <template v-if="!row.item.isActive" bgcolor="#909090">
            <span style="color:white">{{row.item.name}}</span>
          </template>
      </template> -->
      <!-- <template v-slot:cell(status)="row">

      </template> -->
      <!-- <template v-slot:cell(actions)="row"> -->
        <!--<b-button size="sm" @click="info(row.item, row.index, $event.target)" class="mr-1">
          Info modal
        </b-button>-->
        <!--<b-button size="sm" @click="row.toggleDetails">
          {{ row.detailsShowing ? 'Hide' : 'Show' }} Details
        </b-button>-->
        <!-- <b-button size="sm" v-if="row.item.status=='Pending'||row.item.status=='Delivered'||row.item.status=='Pick Up Requested'" @click="editDoc(row.item.index)" class="mr-1">
          Edit
        </b-button>
        <b-button size="sm" v-if="row.item.status=='Pending'||row.item.status=='Delivered'" @click="deleteDoc(row.item.index)" class="mr-1">
          Delete
        </b-button>
        <b-button size="sm" v-if="row.item.filename" :href="row.item.filename" target="_blank"  class="mr-1">
          View File
        </b-button>
        <b-button size="sm" v-if="!row.item.filename && row.item.status=='Secured' && !row.item.request && roleofactive=='business'" @click="activeScan(row.item.id)" class="mr-1">
          Request Scan
        </b-button>
        <span v-if="row.item.request"  class="mr-1">
          Scan Requested
        </span>
      </template> -->

      <template v-slot:row-details="row">
        <b-card>






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




















<!--///////////////////////////////////////////////////////////////////////////////////////////////////////-->

                                    <!--<table class="table table-hover table-striped">
                                    <col width="10%">

                                        <thead>
                                            <th v-on:click="selectAllDocs" v-if="preCheckD"><input type="checkbox" style="margin-bottom:10px"></input></th><th v-on:click="deSelectAllDocs" v-if="!preCheckD"><a style="color:#FCD206" >Remove</a></th>
                                            <th>ID</th>
                                            <th>Descriptionv</th>
                                            <th>Type</th>
                                            <th>Status</th>

                                        </thead>
                                        <tbody>
                                            <tr v-for="(result,index) in docData" >
                                                        <td v-on:click="pushdoc(index)" v-if="result.isActive"><input type="checkbox"></input></td>     <td bgcolor="#909090" v-if="!result.isActive"><a style="color:#FCD206" v-on:click="removeDoc(index)" >Remove</a></td>
                                                        <td v-on:click="pushdoc(index)" v-if="result.isActive">Doc{{result.assigned_id}}</td>                    <td bgcolor="#909090" v-if="!result.isActive"><span style="color:white">Doc{{result.assigned_id}}</span></td>
                                                        <td v-on:click="pushdoc(index)" v-if="result.isActive">{{result.name}}</td>                     <td bgcolor="#909090" v-if="!result.isActive"><span style="color:white">{{result.name}}</span></td>
                                                        <td v-on:click="pushdoc(index)" v-if="result.isActive">{{result.type}}</td>                     <td bgcolor="#909090" v-if="!result.isActive"><span style="color:white">{{result.type}}</span></td>
                                                        <td v-on:click="pushdoc(index)" v-if="result.isActive">{{result.status}}</td>                   <td bgcolor="#909090" v-if="!result.isActive"><span style="color:white">{{result.status}}</span></td>

                                                    </tr>

                                        </tbody>
                                    </table>-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



</div>

<!--////////////////////////////////////////////////////////////////////////////////////////////-->









        </div>
</div>
</template>
<script>
var docData=[];
var keyData=[];
var pushedKey=[];
var pushedDoc=[];
var actionButton;
var keyFlag;
var docFlag;

var doc_id1;
var doc_quantity1;
var key_id1;
var key_quantity1;
import VueGoogleAutocomplete from 'vue-google-autocomplete'
export default {
    components: { VueGoogleAutocomplete },
     props: [
         'user_id',
         'stripe',
         'doc_id',
         'doc_quantity',
         'key_id',
         'key_quantity',
         'authvarcity',
         'authvarstreet',
         'authvarunit',
         'authvarzip',
         'authvarinfo',
         'authvarseccity',
         'authvarsecstreet',
         'authvarsecunit',
         'authvarseczip',
         'authvarsecinfo',
         'authvarseccheck',
         'kemail',
         'authvarprofile1',
         'authvarprofile2',
         'authvarprofile3',
         'userrole',
         'parent_id',


    ],

        data(){

            return{
                address: '',
                preCheck:true,
                preCheckD:true,
                docData:[],
                keyData:[],
                doc_id1,
                doc_quantity1,
                key_id1,
                key_quantity1,
                pushedKey,
                pushedDoc,
                actionButton:false,
                keyFlag:false,
                docFlag:false,
                actionLayover:false,
                city:'',
                street:'',
                unit:'',
                zip:'',
                info:'',
                cost:2500,
                showDismissibleAlert:false,
                showDismissibleAlertDan:false,
                loader:false,
                city_sec:'',
                street_sec:'',
                unit_sec:'',
                zip_sec:'',
                info_sec:'',
                cus_city:'',
                cus_street:'',
                cus_unit:'',
                cus_zip:'',
                cus_info:'',
                add_check:'',
                selected_city:'',
                selected_street:'',
                selected_unit:'',
                selected_zip:'',
                selected_info:'',
                customtable:false,
                addedAdd:true,
                allow:false,
                bgcolor:'info',
                modes: ['multi', 'single', 'range'],
                selectMode: 'multi',
                selected: [],
                items:[],
                fields: [
                    // { key: 'index', label: 'index', sortable: true, sortDirection: 'desc' },
                    { key: 'assigned_id', label: 'ID', sortable: true, sortDirection: 'desc'},
                    { key: 'name', label: 'File Name', sortable: true, sortDirection: 'desc'},
                    //{ key: 'email', label: 'Email', sortable: true, sortDirection: 'desc' },
                    { key: 'type', label: 'Description', sortable: true, sortDirection: 'desc'},
                    { key: 'status', label: 'Status', sortable: true, class: 'text-center'},

                    //{ key: 'email', label: 'is Active', formatter: (value, key, item) => { return value ? 'Yes' : 'No' }, sortable: true, sortByFormatted: true, filterByFormatted: true },
                    //{ key: 'created_at', label: 'Time', sortable: true },
                    //{ key: 'tracking', label: 'Tracking Number', sortable: true, sortDirection: 'desc' },
                    //{ key: 'description', label: 'Payment Description', sortable: true, sortDirection: 'desc' },
                    //{ key: 'amount', label: 'Payment', sortable: true, sortDirection: 'desc' },
                    //{ key: 'status', label: 'Status', sortable: true, class: 'text-center' },
                    // { key: 'actions', label: 'Actions' }
                    ],
                totalRows: 1,
                currentPage: 1,
                perPage: 10,
                pageOptions: [5, 10, 15],
                sortBy: 'assigned_id',
                sortDesc: false,
                sortDirection: 'desc',
                filter: null,
                filterOn: [],


                modes1: ['multi', 'single', 'range'],
                selectMode1: 'multi',
                selected1: [],
                items1:[],
                fields1: [
                    // { key: 'index', label: 'index', sortable: true, sortDirection: 'desc' },
                    { key: 'assigned_id', label: 'ID', sortable: true, sortDirection: 'desc'},
                    { key: 'name', label: 'File Name', sortable: true, sortDirection: 'desc'},
                    //{ key: 'email', label: 'Email', sortable: true, sortDirection: 'desc' },
                    { key: 'type', label: 'Description', sortable: true, sortDirection: 'desc'},
                    { key: 'status', label: 'Status', sortable: true, class: 'text-center'},

                    //{ key: 'email', label: 'is Active', formatter: (value, key, item) => { return value ? 'Yes' : 'No' }, sortable: true, sortByFormatted: true, filterByFormatted: true },
                    //{ key: 'created_at', label: 'Time', sortable: true },
                    //{ key: 'tracking', label: 'Tracking Number', sortable: true, sortDirection: 'desc' },
                    //{ key: 'description', label: 'Payment Description', sortable: true, sortDirection: 'desc' },
                    //{ key: 'amount', label: 'Payment', sortable: true, sortDirection: 'desc' },
                    //{ key: 'status', label: 'Status', sortable: true, class: 'text-center' },
                    // { key: 'actions', label: 'Actions' }
                    ],
                totalRows1: 1,
                currentPage1: 1,
                perPage1: 10,
                pageOptions1: [5, 10, 15],
                sortBy1: 'assigned_id',
                sortDesc1: false,
                sortDirection1: 'desc',
                filter1: null,
                filterOn1: [],



                infoModal: { id: 'info-modal', title: '', content: '' },
            }
            },

             computed: {
                sortOptions() {
                                // Create an options list from our fields
                                return this.fields1
                                .filter(f => f.sortable)
                                .map(f => {
                                    return { text: f.label, value: f.key }
                                })
                            },
                sortOptions1() {
                                // Create an options list from our fields
                                return this.fields
                                .filter(f => f.sortable)
                                .map(f => {
                                    return { text: f.label, value: f.key }
                                })
                            }
                },

        mounted() {
            // var temp=this.kemail;
            //console.log(this.authvarseccity);
            this.mountMethod();
            this.doc_id1=this.doc_id;
            this.doc_quantity1=this.doc_quantity;
            this.key_id1=this.key_id;
            this.key_quantity1=this.key_quantity;

            this.city=this.authvarcity;
            this.street=this.authvarstreet;
            this.unit=this.authvarunit;
            this.zip=this.authvarzip;
            this.info=this.authvarinfo;
            this.city_sec=this.authvarseccity;
            this.street_sec=this.authvarsecstreet;
            this.unit_sec=this.authvarsecunit;
            this.zip_sec=this.authvarseczip;
            this.info_sec=this.authvarsecinfo;
            this.add_check=this.authvarseccheck;
            //console.log(this.authvarseccity);
            if(this.authvarprofile1=='1' && this.authvarprofile2=='1' && this.authvarprofile3=='1')
                {
                        this.allow=true;
                }
            else{
                this.allow=false;
            }

             },

        methods: {


            mountMethod(){
                var stripe_id=this.stripe;
                var user_id = this.user_id;
            axios.get('/api/get-docs-for-delivery').then(response => {
                    this.docData=response.data;
                    this.items1=response.data;
                    this.totalRows1 = this.items1.length
                    response.data.forEach(function(value, key) {
                                    //console.log(value);
                                    this.items1[key]['isActive']=true
                                    this.items1[key].assigned_id='Doc'+this.items1[key].assigned_id;
                             }.bind(this));

                    if(response.data.length){

                    // console.log('init removed doc')
                    }


                });

            axios.get('/api/get-keys-for-delivery').then(response => {
                    this.keyData=response.data;
                    this.items=response.data;
                    this.totalRows = this.items.length;
                    response.data.forEach(function(value, key) {
                                    //console.log(value);
                                    this.items[key]['isActive']=false
                                    this.items[key].assigned_id='Key'+this.items[key].assigned_id;
                             }.bind(this));
                    console.log(this.keyData.length);
                    if(response.data.length){

                        //console.log('init removed key')
                    }

                });

            },

            // info(item, index, button) {
            //     this.infoModal.title = `Row index: ${index}`
            //     this.infoModal.content = JSON.stringify(item, null, 2)
            //     this.$root.$emit('bv::show::modal', this.infoModal.id, button)
            // },
            resetInfoModal() {
                this.infoModal.title = ''
                this.infoModal.content = ''
            },
            onFiltered(filteredItems) {
                // Trigger pagination to update the number of buttons/pages due to filtering
                this.totalRows = filteredItems.length
                this.currentPage = 1
            },


            onFiltered1(filteredItems) {
                // Trigger pagination to update the number of buttons/pages due to filtering
                this.totalRows1 = filteredItems.length
                this.currentPage1 = 1
            },

            getAddressData(addressData, placeResultData, id) {
                this.address = addressData;
                this.cus_unit=this.address.street_number;
                this.cus_street=this.address.route;
                this.cus_zip=this.address.postal_code;
                this.cus_city=this.address.locality;

            },
            onRowSelected(items) {
                this.selected = items
            },
            selectAllRows() {
                this.$refs.selectableTable.selectAllRows()
            },
            clearSelected() {
                this.$refs.selectableTable.clearSelected()
            },


             onRowSelected(items) {
                this.selected = items
            },
            selectAllRows1() {
                this.$refs.selectableTable1.selectAllRows()
            },
            clearSelected1() {
                this.$refs.selectableTable1.clearSelected()
            },

            pushkey(items){
                this.pushedKey=items;

                if(this.pushedKey.length || this.pushedDoc.length)
                {   this.actionButton=true}
                else
                {   this.actionButton=false}

                console.log(this.pushedKey)
                if(this.pushedKey.length==this.keyData.length){
                    this.preCheck=false;
                }
            },
            pushdoc(items){
                this.pushedDoc=items

                if(this.pushedKey.length || this.pushedDoc.length)
                {   this.actionButton=true}
                else
                {   this.actionButton=false}

                if(this.pushedDoc.length==this.docData.length){
                    this.preCheckD=false;
                }
            },
            removeKey(index){
                 this.keyData[index]['isActive']=true;
                 var check=this.keyData[index].id;
                 var indexRemoveK;

                $.each(this.pushedKey,function(key,value){

                    if(value.id==check)
                    {
                        indexRemoveK=key;
                    }
                });
                                this.pushedKey.splice(indexRemoveK, 1);
                if(pushedKey.length || pushedDoc.length)
                {   this.actionButton=true}
                else
                {   this.actionButton=false}

                              //  }
                 console.log(this.pushedKey)
                 this.$set(this.keyData, index, this.keyData[index])
                 if(!this.pushedKey.length){
                     //console.log('cleared')

                     this.preCheck=true;
                 }
            },
            removeDoc(index){
                 this.docData[index]['isActive']=true;
                 var check=this.docData[index].id;
                 var indexRemoveD;

                $.each(this.pushedDoc,function(key,value){

                    if(value.id==check)
                    {
                        indexRemoveD=key;
                    }
                });
                                this.pushedDoc.splice(indexRemoveD, 1);
                if(pushedKey.length || pushedDoc.length)
                {   this.actionButton=true}
                else
                {   this.actionButton=false}

                         //       }
                 console.log(this.pushedDoc)
                 this.$set(this.docData, index, this.docData[index])
                 if(!this.pushedDoc.length){
                     //console.log('cleared')
                     this.preCheckD=true;
                 }
            },




            selectAllKeys(){
                this.pushedKey=[];
                //console.log(this.keyData);
                    this.preCheck=false;
                    $.each(this.keyData, function(key,value){
                        this.keyData[key]['isActive']=false;
                        this.pushedKey.push(this.keyData[key]);

                    }.bind(this));
                    if(this.pushedKey.length || this.pushedDoc.length)
                    {   this.actionButton=true}
                    else
                    {   this.actionButton=false}
            },

            deSelectAllKeys(){
                this.preCheck=true;
                    $.each(this.keyData, function(key,value){
                        console.log(this.keyData[key])
                        this.keyData[key]['isActive']=true;
                         this.pushedKey=[];

                        if(this.pushedKey.length || this.pushedDoc.length)
                            {   this.actionButton=true}
                            else
                            {  console.log('go away button')
                                 this.actionButton=false}
                                 this.$set(this.keyData, key, this.keyData[key])










                    }.bind(this));

                    //console.log(this.pushedKey.length);
                    //console.log(this.pushedDoc.length);
            },

            selectAllDocs(){
                this.pushedDoc=[];
                this.preCheckD=false;
                    $.each(this.docData, function(key,value){
                        this.docData[key]['isActive']=false;
                        this.pushedDoc.push(this.docData[key]);

                    }.bind(this));
                    if(this.pushedKey.length || this.pushedDoc.length)
                    {   this.actionButton=true}
                    else
                    {   this.actionButton=false}
            },

            deSelectAllDocs(){

                    this.preCheckD=true;
                    $.each(this.docData, function(key,value){
                        console.log(this.keyData[key])
                        this.docData[key]['isActive']=true;
                         this.pushedDoc=[];

                        if(this.pushedKey.length || this.pushedDoc.length)
                            {   this.actionButton=true}
                            else
                            {  console.log('go away button')
                                 this.actionButton=false}
                                 this.$set(this.docData, key, this.docData[key])










                    }.bind(this));


            },



            deliveryCommence(){
                //e.preventdefault();
                this.loader=true;
                this.createDeliveryMethod();
                //if(this.kemail==1){
                  //      console.log('no payment');
                    //    this.createDeliveryMethod();

                    //}

                //else{
                    //Stripe payment API with create pickup function
                    // var customer_id2=this.stripe;
                    // var cost2=this.cost;
                    // var userid=this.user_id;
                    // var amount=cost2/100;
                    // var details='Delivery Payment';
                    // var description=details;
                    // var user_id=userid;
                    //  axios.post('/api/paymentintent', {
                    //         userid,
                    //         customer_id2,
                    //         cost2,
                    //         details,
                    //  }).then(response => {

                    //         axios.post('/api/createpayment', {
                    //                 user_id,
                    //                 amount,
                    //                 description,

                    //         }).then(response => {
                    //            // this.scanSequenceStart();
                    //             this.createDeliveryMethod();
                    //         });



                    // // this.showDismissibleAlert=true;
                    // //  setTimeout(() => this.showDismissibleAlert=false, 5000);
                    // //Hello
                    // }).catch(error => {
                    //             console.log(error);
                    //             this.showDismissibleAlertDan=true;
                    //             setTimeout(() => this.showDismissibleAlertDan=false, 5000);
                    // });
               // }
            },


            selectPrimary(){
                        this.selected_city=this.city;
                        this.selected_unit=this.unit;
                        this.selected_street=this.street;
                        this.selected_zip=this.zip;
                        this.selected_info=this.info;
                        //console.log(this.selected_unit);
            },

            selectSecondary(){
                        this.selected_city=this.city_sec;
                        this.selected_unit=this.unit_sec;
                        this.selected_street=this.street_sec;
                        this.selected_zip=this.zip_sec;
                        this.selected_info=this.info_sec;
                        //console.log(this.selected_unit);
            },

            openpop(){
                this.actionLayover=true;
                this.selectPrimary();
            },

            customAddress(){
                this.customtable=true;
                this.addedAdd=false;
            },

            AddedAddress(){
                this.customtable=false;
                this.addedAdd=true;
            },

            createDeliveryMethod(){
                    var delivery_keys=[];
                    var delivery_docs=[];
                    $.each(this.pushedKey, function(key, value)
                    {
                        value.assigned_id=value.assigned_id.substring(3);
                        delivery_keys.push(value.assigned_id);
                        //console.log(value.id);
                    });
                    $.each(this.pushedDoc, function(key, value)
                    {
                        value.assigned_id=value.assigned_id.substring(3);
                        delivery_keys.push(value.assigned_id);
                        //console.log(value.id);
                    });
                    var user_id;
                    if(this.userrole=='staff'){
                        user_id=this.parent_id;
                    }
                    else{
                     user_id=this.user_id;
                    }
                    var stripe_id=this.stripe;
                   if(this.kemail==1)
                    {
                        var delivery_cost=0;
                    }
                    else{
                         var delivery_cost=this.cost;
                    }
                    if(this.addedAdd){
                    var address_unit=this.selected_unit;
                    var address_street=this.selected_street;
                    var address_city=this.selected_city;
                    var address_zip=this.selected_zip;
                    var delivery_info=this.selected_info;}
                    if(this.customtable){
                        var address_unit=this.cus_unit;
                    var address_street=this.cus_street;
                    var address_city=this.cus_city;
                    var address_zip=this.cus_zip;
                    var delivery_info=this.cus_info;
                    }
                    if(this.cost==2500)
                    {var delivery_type='normal';}
                    else if(this.cost==3500)
                    {var delivery_type='urgent';}
                    else if(this.cost==0)
                    {var delivery_type='free';}

                    axios.post('/api/create-delivery', {

                        user_id,
                        stripe_id,
                        delivery_keys,
                        delivery_keys,
                        delivery_cost,
                        address_unit,
                        address_street,
                        address_city,
                        address_zip,
                        delivery_info,
                        delivery_type,

                    }).then(response => {
                        var id;
                        id=response.data;


                        this.mountMethod();
                        this.actionLayover=false;
                    this.showDismissibleAlert=true;
                    this.preCheck=true;
                    this.preCheckD=true;
                     setTimeout(() => this.showDismissibleAlert=false, 5000);
                    //Hello

                                this.pushedKey=[];
                                this.pushedDoc=[];
                                delivery_keys=null;
                                delivery_keys=null;
                                this.actionButton=false;
                                this.loader=false;


                        axios.post('/api/send/emailorderdel', {
                            id,
                        });
                        axios.post('/api/send/newdel', {
                            id,
                        });

                    }).catch(error => {
                                console.log(error);
                                this.showDismissibleAlertDan=true;
                                setTimeout(() => this.showDismissibleAlertDan=false, 5000);

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
