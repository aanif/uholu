<template>
<div class="container" style="width:100%">

<!--<div class="overlay"></div>
<div style="margin:auto;width:80%;"><img :src-->
<!--/////////////////This is the Nav bar /////////////////-->
<div class="content" style="padding: 30px 15px;">
    <div class="container-fluid">
        <div class="card" style="width:50%;margin:auto">
            <table class="tableNav" style="">
                <tr align="center">
                    <td><span><a href="#" v-on:click="filter=''">All Users</a></span></td>
                    <!--<td><span><a href="#" v-on:click="refreshPendingPage">Pending Users <span class="dot" style="background-color:red" v-if="refreshp"></span></a></span></td>-->
                    <td><span><a href="#" v-on:click="refreshPage">Update table <span class="dot" style="background-color:red" v-if="refresh"></span></a></span></td>
                </tr>
            </table>
        </div>
    </div>
</div>


<b-alert v-model="showDismissibleAlert" style="width:92%;margin:auto" variant="success" dismissible>
                        User Updated
                        </b-alert>
<b-alert v-model="showMessageAlertdel" style="width:92%;margin:auto" variant="success" dismissible>
                        User Deleted
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
       <template v-slot:cell(role)="row">


            <span v-if="row.item.role=='customer'" style="  margin:auto; display: inline-block;padding-left:2px; border: 1px solid gray; vertical-align: middle; border-radius: 2px; background: #FF0000;padding-right: 2px; "><p style="font-size: 12px;line-height: 24px;font-weight: normal;color: white;padding: 0;margin: 0;"><b>{{row.item.role}}</b></p></span>
            <span v-if="row.item.role=='staff'" style="  margin:auto; display: inline-block;padding-left:2px; border: 1px solid gray; vertical-align: middle; border-radius: 2px; background: yellow;padding-right: 3px; "><p style="font-size: 12px;line-height: 24px;font-weight: normal;color: black;padding: 0;margin: 0;"><b>{{row.item.role}}</b></p></span>
            <span v-if="row.item.role=='business'" style="  margin:auto; display: inline-block;padding-left:2px; border: 1px solid gray; vertical-align: middle; border-radius: 2px; background: green;padding-right: 2px; "><p style="font-size: 12px;line-height: 24px;font-weight: normal;color: white;padding: 0;margin: 0;"><b>{{row.item.role}}</b></p></span>


      </template>

      <template v-slot:row-details="row">
        <b-card>




 <!--////////////////////////////////////////////////////////////////////////////////////////////////-->
                            <div class="overlayDash" v-on:click="modelview=false" v-if="modelview" style="z-index:3"></div>
                                <div class="modal-content" v-if="modelview" style="z-index:3;position:fixed;top:150px">
                                    <div class="modal-header justify-content-center">
                                        <div class="modal-profile">
                                            <i class="nc-icon nc-bulb-63"></i>
                                        </div>
                                    </div>
                                    <div class="modal-body">
                                        <b-alert v-model="showMessageAlert" style="width:92%;margin:auto" variant="success" dismissible>
                                            Message Sent!
                                        </b-alert>
                                        <label>Message</label>
                                        <textarea rows="4" cols="80" class="form-control" name="delivery_info" placeholder="Here can be your description"  v-model="messageText"></textarea>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-link btn-simple" v-on:click="messageSequence(row.item)">Send</button>
                                        <button type="button" class="btn btn-link btn-simple" v-on:click="closeMessage">Close</button>
                                    </div>
                                </div>
                            <!--////////////////////////////////////////////////////////////////////////////////////////////////-->
                            <div class="overlayDash" style="" v-on:click="modelviewDel=false" v-if="modelviewDel" style="z-index:3;"></div>
                                <div class="modal-content" v-if="modelviewDel" style="z-index:3;position:fixed;top:150px">
                                    <div class="modal-header justify-content-center">
                                        <div class="modal-profile">
                                            <i class="nc-icon nc-bulb-63"></i>
                                        </div>
                                    </div>
                                    <div class="modal-body">

                                        <label>Are you sure you want to delete this user? All the items added by this user will also be deleted.</label>
                                    </div>
                                    <div class="modal-body">
                                        <!-- dummy input bars to throw off chrome browser -->
                                    <input style="display:none" type="email" name="fakeusernameremembered"/>
                                    <input style="display:none" type="password" name="fakepasswordremembered"/>
                                        <!-- end -->
                                        <label v-if="preverified">Enter admin password</label><input type="password" class="form-control" autocomplete="new-password" style="border:0.5px solid #E7E7E8 !important; width:50%" placeholder="Password" v-if="preverified" v-model="approval_password"><button type="button" class="btn btn-link btn-simple" style="border:0.5px solid #E7E7E8 !important;" v-if="preverified" v-on:click="verificationFunction">verify</button>
                                    </div>
                                    <span style="color:red" v-if="incorrect_admin">Incorrect Password</span>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-link btn-simple" v-if="passwordverified" v-on:click="DeleteSequence(row.item)">Delete</button>
                                        <button type="button" class="btn btn-link btn-simple" v-on:click="closeDeleteFunction">Cancel</button>
                                    </div>
                                </div>
                            <!--////////////////////////////////////////////////////////////////////////////////////////////////-->






        <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card" style="padding-top: 10px;padding-left: 20px;padding-right: 20px;padding-bottom: 20px;">
                                <div class="card-header">
                                    <h4 class="card-title">Edit Profile</h4>
                                </div>
                                <div class="card-body">
                                    <form v-on:submit.prevent="updateProfile(row.item)">





                            <div class="row">
                            <div class="col-md-5 pr-1 text-center">

                                    <button type="button" v-if="row.item.role!='staff'" v-on:click="viewItems(row.item)"  class="btn btn-info btn-fill pull-right">View Items</button>
                                    <button type="button" v-if="row.item.role=='staff'" v-on:click="viewParent(row.item)"  class="btn btn-info btn-fill pull-right">View Parent's Items</button>
                                </div>
                                <div class="col-md-5 pr-1 text-center">

                                    <button type="button" v-on:click="modelview=true"  class="btn btn-info btn-fill pull-right">Send Message</button>
                                </div>
                            </div>
                            <br>



                                        <div class="row">
                                            <div class="col-md-5 pr-1">
                                                <div class="form-group">
                                                    <label>ID </label>
                                                    <input type="text" class="form-control" disabled="" placeholder="Company" v-model="row.item.id" REQUIRED>
                                                </div>
                                            </div>
                                            <div class="col-md-3 px-1">
                                                <div class="form-group">
                                                    <label>Email address</label>
                                                    <input type="email" class="form-control" disabled="" placeholder="Username" v-model="row.item.email" REQUIRED>
                                                </div>
                                            </div>
                                            <div class="col-md-4 pl-1" v-if="row.item.role!='staff'">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Date of birth</label>
                                                    <input type="date" class="form-control" placeholder="Email" v-model="row.item.dob" REQUIRED>
                                                </div>
                                            </div>
                                            <div class="col-md-4 pl-1" v-if="row.item.role=='staff'">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Parent ID</label>
                                                    <input type="text" class="form-control" disabled="" placeholder="ID" v-model="row.item.parent_id" REQUIRED>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row" v-if="row.item.role=='business'">
                                            <div class="col-md-5 pr-1">
                                                <div class="form-group">
                                                    <label>Company Name </label>
                                                    <input type="text" class="form-control"  placeholder="Company" v-model="row.item.cname" REQUIRED>
                                                </div>
                                            </div>
                                            <div class="col-md-3 px-1">
                                                <div class="form-group">
                                                    <label>ABN/ACN </label>
                                                    <input type="text" class="form-control" placeholder="Username" v-model="row.item.abn" REQUIRED>
                                                </div>
                                            </div>
                                            <div class="col-md-4 pl-1">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Title/Position </label>
                                                    <input type="text" class="form-control" placeholder="Email" v-model="row.item.title" REQUIRED>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-md-6 pr-1">
                                                <div class="form-group">
                                                    <label>First Name</label>
                                                    <input type="text" class="form-control" name="name" placeholder="Company" v-model="row.item.name" REQUIRED>
                                                </div>
                                            </div>
                                            <div class="col-md-6 pl-1">
                                                <div class="form-group">
                                                    <label>Last Name</label>
                                                    <input type="text" class="form-control" name="last_name" placeholder="Last Name" v-model="row.item.last_name" REQUIRED>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 pr-1">
                                                <div class="form-group">
                                                    <label>Phone</label>
                                                    <input type="text" class="form-control" name="phone" placeholder="Home Address" v-model="row.item.phone" disabled="" REQUIRED>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 pr-1">
                                                <div class="form-group">
                                                    <label>Unit</label>
                                                    <input type="text" class="form-control" name="unit" placeholder="Home Address" v-model="row.item.unit" REQUIRED>
                                                </div>
                                            </div>
                                            <div class="col-md-6 pr-1">
                                                <div class="form-group">
                                                    <label>Street</label>
                                                    <input type="text" class="form-control" name="street" placeholder="Home Address" v-model="row.item.street" REQUIRED>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 pr-1">
                                                <div class="form-group">
                                                    <label>City</label>
                                                    <input type="text" class="form-control" name="city" placeholder="City"  v-model="row.item.city" REQUIRED>
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
                                                    <input type="number" class="form-control" name="zip" placeholder="ZIP Code" v-model="row.item.zip" REQUIRED>
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
                                        </div>
                                        <div class="row" v-if="row.item.role=='customer'">
                                            <div class="col-md-5 pr-1">
                                                <div class="form-group">
                                                    <label>Kin's First Name </label>
                                                    <input type="text" class="form-control" placeholder="first name" v-model="row.item.kname" REQUIRED>
                                                </div>
                                            </div>
                                            <div class="col-md-3 px-1">
                                                <div class="form-group">
                                                    <label>Kin's Last Name</label>
                                                    <input type="text" class="form-control" placeholder="last name" v-model="row.item.klast_name" REQUIRED>
                                                </div>
                                            </div>
                                            <div class="col-md-4 pl-1">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Kin's Email</label>
                                                    <input type="email" class="form-control" placeholder="Email" v-model="row.item.kemail" REQUIRED>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" v-if="row.item.role=='customer'">
                                            <div class="col-md-5 pr-1">
                                                <div class="form-group">
                                                    <label>Kin's Phone# </label>
                                                    <input type="text" class="form-control" placeholder="phone" v-model="row.item.kphone" REQUIRED>
                                                </div>
                                            </div>
                                            <div class="col-md-3 px-1">
                                                <div class="form-group">
                                                    <label>Kin Relation</label>
                                                    <input type="text" class="form-control" placeholder="relation" v-model="row.item.krelation" REQUIRED>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Administrator's comments for the user</label>
                                                    <textarea rows="2" cols="80" class="form-control" name="admin_comments" placeholder="Enter Comments"  v-model="row.item.Admin_comments" REQUIRED></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 pr-1">
                                                <div class="form-group">
                                                    <label>Status</label>
                                                <select class="form-control" name="status" v-model="row.item.status" REQUIRED>
                                                                                <option  value="Pending">Pending</option>
                                                                                <option  value="Approved">Approved</option>
                                                                                <option  value="Declined">Declined</option>
                                                                            </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 pr-1">
                                                <div class="form-group">
                                                    <label v-if="row.item.status=='Declined'">Send Message</label>
                                                    <input type="text" class="form-control" placeholder="Write a message..." v-model="row.item.message" v-if="row.item.status=='Declined'" >
                                                </div>
                                            </div>

                                        </div>
                                        <button type="submit" class="btn btn-info btn-fill pull-right">Update Profile</button>
                                        <div class="clearfix"></div>
                                    </form>
                                <br>
                                    <div style="widht:100%;border:1px solid #E7E7E8"></div>
                                <br>
                                    <div class="row">
                                            <div class="col-md-4 pr-1">
                                                <div class="form-group">
                                                    <label>Verification Code</label>
                                                    <input type="text" class="form-control" name="verify" v-model="codever" placeholder="Enter Verification Code" >
                                                    <label><span style="color:green">{{veriMessage}}</span><span style="color:red">{{veriMessageErr}}</span></label>
                                                </div>
                                            </div>
                                            <div class="col-md-4 px-1">
                                                <div class="form-group">

                                                    <button type="button" v-on:click="verifyCode(row.item.phone)" class="btn btn-info btn-fill pull-right" style="margin-top:10px" :disabled="verButton">Verify</button>
                                                </div>
                                            </div>
                                            <div class="col-md-4 pl-1">
                                                <div class="form-group">

                                                    <button type="button" v-on:click="generateCode(row.item.phone)" class="btn btn-info btn-fill pull-right" style="margin-top:10px" :disabled="genButton">Generate Code</button>
                                                </div>
                                            </div>
                                            <button type="button" style="margin-right:20px;margin-top:20px" class="btn btn-info btn-fill pull-right" v-on:click="modelviewDel=true" v-if="parent_id=='head'">Delete User</button>
                                        </div>







                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card card-user" style="padding-top: 90px;">
                                    <div class="card-image">
                                        <img src="" >
                                    </div>
                                            <div class="card-body">
                                                            <div class="author" style='margin-bottom:80px'>
                                                                <a :href="row.item.profile_pic" target="_blank">
                                                                    <img class="avatar border-gray" :src="row.item.profile_pic" alt="...">
                                                                    <h5 class="title"></h5>
                                                                </a>
                                                                <p class="description" style="font-size:14px;font-weight: 600;">
                                                                                    {{row.item.name}} {{row.item.last_name}}
                                                                </p>
                                                            </div>

                                                            <div class="author" style='margin-bottom:60px'>
                                                                <a :href="row.item.license_front" target="_blank">
                                                                    <img class="avatar border-gray" :src="row.item.license_front" v-if="row.item.license_front" style="border-radius: 0%;" alt="...">
                                                                </a>
                                                                    <h5 class="title"></h5><button type="button" class="btn btn-info btn-fill " v-if="row.item.license_front" v-on:click="deleteFront(row.item)">Delete</button><br><br>

                                                                <p class="description" style="font-size:14px;font-weight: 600;">

                                                                </p>
                                                            </div>

                                                            <div class="author" style='margin-bottom:60px'>
                                                                <a :href="row.item.license_back" target="_blank">
                                                                    <img class="avatar border-gray" :src="row.item.license_back" v-if="row.item.license_back" style="border-radius: 0%;" alt="...">
                                                                </a>
                                                                    <h5 class="title"></h5><button type="button" class="btn btn-info btn-fill " v-if="row.item.license_back" v-on:click="deleteBack(row.item)">Delete</button><br><br>

                                                                <p class="description" style="font-size:14px;font-weight: 600;">

                                                                </p>
                                                            </div>

                                                            <div class="author" >
                                                                <a :href="row.item.photo_id" target="_blank">
                                                                    <img class="avatar border-gray" :src="row.item.photo_id" v-if="row.item.photo_id" style="border-radius: 0%;" alt="...">
                                                                </a>
                                                                    <h5 class="title"></h5><button type="button" class="btn btn-info btn-fill " v-if="row.item.photo_id" v-on:click="DeleteLicense(row.item)">Delete</button><br><br>

                                                                <p class="description" style="font-size:14px;font-weight: 600;">

                                                                </p>
                                                            </div>


                                                <!--<p class="description text-center">
                                                    "Lamborghini Mercy
                                                    <br> Your chick she so thirsty
                                                    <br> I'm in that two seat Lambo"
                                                </p>-->
                                            </div>
                                <hr>
                                            <div class="button-container mr-auto ml-auto">
                                                <button href="#" class="btn btn-simple btn-link btn-icon">
                                                    <i class="fa fa-facebook-square"></i>
                                                </button>
                                                <button href="#" class="btn btn-simple btn-link btn-icon">
                                                    <i class="fa fa-twitter"></i>
                                                </button>
                                                <button href="#" class="btn btn-simple btn-link btn-icon">
                                                    <i class="fa fa-google-plus-square"></i>
                                                </button>
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











<!--/////////////////This is the  end of Fifth tab View/////////////////-->




</div>
</template>
<script>

export default {
 props: [
     'active_id',
     'parent_id',
 ],

    data(){

            return{
                incorrect_admin:false,
                preverified:true,
                passwordverified:false,
                approval_password:null,
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
                modelviewDel:false,
                showMessageAlertdel:false,
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
          { key: 'role', label: 'Type', sortable: true, sortDirection: 'desc' },
          { key: 'name', label: 'Person name', sortable: true, sortDirection: 'desc' },
          { key: 'email', label: 'Email', sortable: true, sortDirection: 'desc' },
          { key: 'status', label: 'Status', sortable: true, sortDirection: 'desc' },

        //   { key: 'email', label: 'is Active', formatter: (value, key, item) => { return value ? 'Yes' : 'No' }, sortable: true, sortByFormatted: true, filterByFormatted: true },
          { key: 'phone', label: 'Phone', sortable: true },
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

    mounted() {
      // Set the initial number of items
    console.log(this.parent_id);
    this.mountFunction();

    axios.get('/api/getcount').then(response=>{
        //console.log(response.data);
        this.init=response.data;
    });
    axios.get('/api/getpendingcount').then(response=>{
        //console.log(response.data);
        this.initp=response.data;
    });

    window.setInterval(() => {
    //this.getNotifications()
    axios.get('/api/getcount').then(response=>{
        //console.log(response.data);
        this.post=response.data;
        if(this.post-this.init)
        {
            //console.log('new user');
            this.refresh=true;
        }
        else{
            //console.log('no new user');
            //this.refresh=false;

        }
    });


    // axios.get('/api/getpendingcount').then(response=>{
    //     //console.log(response.data);
    //     this.postp=response.data;
    // if(this.postp-this.initp)
    //     {
    //         //console.log('new user');
    //         this.refreshp=true;
    //     }
    //     else{
    //         //console.log('no new user');
    //         //this.refresh=false;

    //     }

    // });

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

      mountFunction(){
          axios.get('/api/customergetall').then(response=>{
                //console.log(response.data);
                this.items=response.data;
                 this.totalRows = this.items.length

                $.each(this.items, function(key,value){
                    // console.log(key+' ');
                    // console.log(value.id)
                    if(this.items[key].role=='customer')
                    {this.items[key].id='1003'+value.id;
                    console.log('customers');}
                    else if(this.items[key].role=='business')
                    {this.items[key].id='2003'+value.id;
                    console.log('bussiness');}
                    else if(this.items[key].role=='staff'){
                        this.items[key].parent_id='2003'+value.parent_id;
                    }

                }.bind(this));
            //console.log(this.items);

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

      verificationFunction(){
        var ver_pass=this.approval_password;
        var admin_id=this.active_id;
        axios.post('/api/verifyadminpassword/'+admin_id,{
            ver_pass,
          }).then(response => {
              if(response.data=='verified'){
                    this.preverified=false;
                    this.passwordverified=true;
                    this.approval_password=null;
                    this.incorrect_admin=false;
              }
              else if(response.data=='failed'){
                   this.preverified=true;
                   this.passwordverified=false;
                    this.approval_password=null;
                    this.incorrect_admin=true;
                    setTimeout(() => this.incorrect_admin=false, 5000);
              }
          });
      },

      closeDeleteFunction(){
          this.preverified=true;
                   this.passwordverified=false;
                    this.approval_password=null;
                    this.modelviewDel=false;
      },

      refreshPage(){
          this.refresh=false;
          this.init=this.post;
          this.mountFunction();
      },
      refreshPendingPage(){
          this.filter='Pending';
          this.refreshp=false;
          this.initp=this.postp;
          c


      },
      viewItems(data){
          window.location.href = '/dashboard/Items?type='+data.id;
      },
      viewParent(data){
          window.location.href = '/dashboard/Items?type='+data.parent_id;
      },
      messageSequence(data){
          //console.log($data);
          var ids=data.id;
          var id;
          if(data.role=='staff')
          {id=ids;}
          else
          {id=ids.substring(4);}

          var name=data.name;
          var message=this.messageText;
          console.log(id+' '+name+' '+message);

            axios.post('/api/message',{
              id,
              name,
              message,
          }).then(response => {
            this.showMessageAlert=true;
                     setTimeout(() => this.showMessageAlert=false, 3000);
                     setTimeout(() => this.closeMessage(), 3000);
                     setTimeout(() => window.location.href = '/dashboard', 3000);

              //console.log("message added");
          });

      },
      closeMessage(){
          this.messageText=null;
          this.modelview=false
      },

        DeleteSequence(data){
            var ids=data.id;
            var id=ids.substring(4);
            axios.delete('/api/delete-user/'+id).then(response => {
                    this.showMessageAlertdel=true;
                    this.modelviewDel=false;
                     setTimeout(() => this.showMessageAlertdel=false, 3000);
                     this.preverified=true;
                    this.passwordverified=false;
                        this.approval_password=null
                     //setTimeout(() => this.closeMessage(), 3000);
                     //setTimeout(() => window.location.href = '/dashboard', 3000);
                     this.mountFunction();

              //console.log("message added");
          });
        },


      generateCode(data){
          var phone=data;
          this.genButton=true;
          this.verButton=false;
          axios.post('/api/send-code',{
              phone,
          });
          //console.log(phone);
      },

      verifyCode(data){
          var phone=data;
          var verification_code=this.codever;
          //console.log(checkcode);
          axios.post('/api/verify-code',{
              phone,
              verification_code,
          }).then(response => {
              if(response.data.message=='Verified'){
                this.veriMessage=response.data;
                this.genButton=false;
                this.verButton=true;
                this.codever=null;
                setTimeout(() => this.veriMessage=null, 5000);
              }
              else{
                  this.veriMessageErr=response.data.message;
                  this.genButton=false;
                  this.verButton=true;
                  this.codever=null;
                  setTimeout(() => this.veriMessageErr=null, 5000);

              }
          });
      },

      deleteFront(data)
      {
        var type='front';
        var ids=data.id;
        var id=ids.substring(4);
           axios.post('/api/deleteImgFile/'+id,{
              type,
          }).then(response=>{
              this.showDismissibleAlert=true;
                setTimeout(() => this.showDismissibleAlert=false, 5000);
                this.mountFunction();
          });
      },

      deleteBack(data)
      {
        var type='back';
        var ids=data.id;
        var id=ids.substring(4);
           axios.post('/api/deleteImgFile/'+id,{
              type,
          }).then(response=>{
              this.showDismissibleAlert=true;
                     setTimeout(() => this.showDismissibleAlert=false, 5000);
                this.mountFunction();
          });
      },

      DeleteLicense(data)
      {
        var type='id';
        var ids=data.id;
        var id=ids.substring(4);
           axios.post('/api/deleteImgFile/'+id,{
              type,
          }).then(response=>{
              this.showDismissibleAlert=true;
                     setTimeout(() => this.showDismissibleAlert=false, 5000);
                this.mountFunction();
          });
      },

      updateProfile(data){
             var ids=data.id;
             //console.log(id.length)
            var id=ids.substring(4);
            //console.log(id);
             var message=data.message;
             var name= data.name;
             var last_name= data.last_name;
             var unit= data.unit;
             var street= data.street;
             var city= data.city;
             var zip= data.zip;
             var delivery_info= data.delivery_info;
             var Admin_comments= data.Admin_comments;
             var status= data.status;
             var title=data.title;
             var cname=data.cname;
             var abn=data.abn;
             if(status=='Approved'||status=='Pending'){
                 message="";
             }
          //console.log(id);
          if(data.role=='customer'){
          axios.post('/api/updateAdminPro/'+id,{
              name,
              last_name,
              unit,
              street,
              city,
              zip,
              delivery_info,
              Admin_comments,
              status,
              message,
          }).then(response=>{
              this.mountFunction();
                this.showDismissibleAlert=true;
                     setTimeout(() => this.showDismissibleAlert=false, 5000);

          }).catch(error => {
                this.showDismissibleAlertDan=true;
                     setTimeout(() => this.showDismissibleAlertDan=false, 5000);

          });}

          else if(data.role=='business'){
            axios.post('/api/updateAdminBus/'+id,{
              name,
              last_name,
              unit,
              street,
              city,
              zip,
              delivery_info,
              Admin_comments,
              status,
              message,
              title,
              cname,
              abn,
          }).then(response=>{
              this.mountFunction();
                this.showDismissibleAlert=true;
                     setTimeout(() => this.showDismissibleAlert=false, 5000);

          }).catch(error => {
                this.showDismissibleAlertDan=true;
                     setTimeout(() => this.showDismissibleAlertDan=false, 5000);

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
