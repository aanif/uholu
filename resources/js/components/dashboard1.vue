<template>

<div class="container" style="width:100%">

<br>

<div v-if="reqSent" style="width:65%;margin-left:10px">
<b-alert show variant="success">Scan Request Has Been Sent</b-alert>
    </div>
    <div v-if="verificationSent" style="width:65%;margin-left:10px">
<b-alert show variant="success">Email has been sent</b-alert>
    </div>
    <div v-if="loader" style="width:65%;margin-left:10px">
<b-alert show variant="warning">Sending Email...</b-alert>
    </div>
<div v-if="paymentError" style="width:65%;margin-left:10px">
<b-alert show variant="danger">Some error occured, Please try again</b-alert>
    </div>
<div v-if="deleteErrorNoti" style="width:65%;margin-left:10px">
<b-alert show variant="danger">One of the ID pictures have been removed from your profile by Admin, Please update the picture in Edit profile</b-alert>
    </div>
<div v-if="verifyError" style="width:65%;margin-left:10px">
<b-alert show variant="danger">Please verify your Email before adding your keys and documents. After verification of your email, please refresh your page. <br><a v-on:click="resendVerificationEmail" href="#!">Resend Verification Email</a></b-alert>
    </div>
<b-alert v-model="itemSuccesskey" style="width:92%;margin:auto;background-color:#89b541" variant="success">
                    <a href="#!" v-on:click="itemSuccesskey=false" style="color:black" ><i class="fa fa-window-close" aria-hidden="true"></i></a> &nbsp&nbsp&nbsp&nbsp <span style="color:white;display:inline">Key added successfully, Please go to Request Pickup page to request pickup.</span> &nbsp&nbsp <a href='/dashboard/pickup' style="color:black">Go to Request Pickup</a>
                        </b-alert>
    <!--
<div v-if="stat" style="width:65%;;margin-left:10px">
<b-alert show variant="danger">Your Profile Is Pending Approval From Admin, Please Check Back In a Few Hours &nbsp&nbsp&nbsp</b-alert>
</div>
<div v-if="decl" style="width:65%;;margin-left:10px">
<b-alert show variant="danger">Your Profile has been declined <b>{{message}}</b> &nbsp&nbsp&nbsp</b-alert>
</div>-->

<!--//////////////////////////////////////////////////////////////////////////////////////////////////////////-->
<!--//////////////////////////////////////////////////////////////////////////////////////////////////////////-->
<!--//////////////////////////////////////////////////////////////////////////////////////////////////////////-->
<div v-if="!verifyError">



<div v-if="scanLayoverKey">
            <div class="overlayDash" style="" v-on:click="scanLayoverKey=false"></div>

                    <div class="popupDash" style="">



                                <i class="fa fa-window-close"  aria-hidden="true" style="font-size:20px;float:right;margin-right:0px;margin-top:-10px" v-on:click="scanLayoverKey=false"></i>

                                <table style="width:100%">
                                        <tr>
                                                <td style="width:100%" align="center">
                                                    <i class="fa fa-file" style="font-size:30px;"></i>
                                                    <h4><b> Request Scan </b></h4>
                                                    <p style="font-size:13px;color:grey" ><b>Are you sure you want to place a scan request of the delivered document? </b></p><p style="font-size:13px;color:grey" >You will be charged $25 right now for upto 100 pages, from the current payment method added and $0.25 per page above 100 pages. If number of pages exceed 100, remaining amount will be charged at the time of scanned document being uploaded. <br>Go to Edit Profile in order to change your Payment Method.</p>
                                                    <br><button v-if='pre' v-on:click="requestScanFunction" class="btn btn-primary"  style="border-color:#FCD206;background-color:#FCD206"><span style="color:black"><b>CONFIRM</b></span></button>
                                                        <button v-if='post' class="btn btn-primary"  style="border-color:#FCD206;background-color:#FCD206" disabled='true'><span style="color:black"><b>LOADING</b></span></button>
                                                </td>
                                        </tr>
                                </table>



                    </div>



</div>








<!--//////////////////////////////////////////////////////////////////////////////////////////////////////////-->
<!--//////////////////////////////////////////////////////////////////////////////////////////////////////////-->
<!--//////////////////////////////////////////////////////////////////////////////////////////////////////////-->

 <div v-if="actionLayoverKey">
            <div class="overlayDash" style="" v-on:click="actionLayoverKey=false"></div>

                    <div >
                    <div class="popupDash" style=""  >



                                <i class="fa fa-window-close"  aria-hidden="true" style="font-size:20px;float:right;margin-right:0px;margin-top:-10px" v-on:click="exitKeyInputUpdate"></i>

                                <table>
                                        <tr>
                                                <td style="width:50%;">
                                                    <i class="fa fa-key" style="font-size:30px;"></i>
                                                    <h4><b> + Update Key </b></h4>
                                                    <p style="font-size:13px;color:grey" align="justify">Uploading the simple information about the Key
                                                        that will be stored at uholu facility will
                                                        help you orgnanize which keys to be delivered
                                                        or pickup that information is particularly for you </p>

                                                </td>
                                                <td style="width:20%"></td>
                                                <td align="">
                                                        <div style="margin-top:10px">

                                                                <form @submit="keySubmitUpdate" >
                                                                        <div class="form-group">
                                                                                <label>Key Name</label>
                                                                                <input type="text" class="form-control" v-model="KeynameUpdate" ></input>
                                                                        </div>
                                                                        <div class="form-group">
                                                                                <label>Description</label>
                                                                                <input type="text" class="form-control" v-model="KeytypeUpdate" ></input>
                                                                        </div>
                                                                        <br><center><button type="submit" class="btn btn-primary"  style="border-color:#FCD206;background-color:#FCD206"><span style="color:black"><b>UPDATE</b></span></button></center>

                                                                </form>

                                                        </div>
                                                </td>
                                        </tr>
                                </table>



                    </div>
                    </div>




</div>







<div v-if="actionLayoverDoc">
            <div class="overlayDash" style="" v-on:click="actionLayoverDoc=false"></div>


                    <div class="popupDash" style="" >



                                <i class="fa fa-window-close"  aria-hidden="true" style="font-size:20px;float:right;margin-right:0px;margin-top:-10px" v-on:click="exitDocInputUpdate"></i>

                                <table>
                                        <tr>
                                                <td style="width:50%;">
                                                    <i class="fa fa-file" style="font-size:30px;"></i>
                                                    <h4><b> + Update Document </b></h4>
                                                    <p style="font-size:13px;color:grey" align="justify">Uploading the simple information about the Key
                                                        that will be stored at uholu facility will
                                                        help you orgnanize which keys to be delivered
                                                        or pickup that information is particularly for you </p>

                                                </td>
                                                <td style="width:20%"></td>
                                                <td align="">
                                                        <div style="margin-top:10px">

                                                                <form @submit="docSubmitUpdate" >
                                                                        <div class="form-group">
                                                                                <label>File Name</label>
                                                                                <input type="text" class="form-control" v-model="DocnameUpdate" ></input>
                                                                        </div>
                                                                        <div class="form-group">
                                                                                <label>Description</label>
                                                                                <input type="text" class="form-control" v-model="DoctypeUpdate" ></input>
                                                                        </div>
                                                                        <div class="form-group">
                                                                                        <label>Update Scanned Copy or Picture</label>
                                                                                        <input type="file" id="files" ref="files" multiple v-on:change="handleFiles()"/>
                                                                        </div>
                                                                        <br><center><button type="submit" class="btn btn-primary"  style="border-color:#FCD206;background-color:#FCD206"><span style="color:black"><b>UPDATE</b></span></button></center>

                                                                </form>

                                                        </div>
                                                </td>
                                        </tr>
                                </table>







                    </div>



</div>




<div v-if="deleteLayoverKey">
            <div class="overlayDash" style="" v-on:click="deleteLayoverKey=false"></div>

                    <div class="popupDash" style="">



                                <i class="fa fa-window-close"  aria-hidden="true" style="font-size:20px;float:right;margin-right:0px;margin-top:-10px" v-on:click="deleteLayoverKey=false"></i>

                                <table style="width:100%">
                                        <tr>
                                                <td style="width:100%" align="center">
                                                    <i class="fa fa-key" style="font-size:30px;"></i>
                                                    <h4><b> Delete Key </b></h4>
                                                    <p style="font-size:13px;color:grey" >Are you sure you want to delete this key? </p>
                                                    <br><button v-on:click="DeleteKeySequence" class="btn btn-primary"  style="border-color:#FCD206;background-color:#FCD206"><span style="color:black"><b>DELETE</b></span></button>
                                                </td>
                                        </tr>
                                </table>



                    </div>



</div>


<div v-if="deleteLayoverDoc">
            <div class="overlayDash" style="" v-on:click="deleteLayoverDoc=false"></div>

                    <div class="popupDash" style=";">



                                <i class="fa fa-window-close"  aria-hidden="true" style="font-size:20px;float:right;margin-right:0px;margin-top:-10px" v-on:click="deleteLayoverDoc=false"></i>

                                <table style="width:100%">
                                        <tr>
                                                <td style="width:100%" align="center">
                                                    <i class="fa fa-file" style="font-size:30px;"></i>
                                                    <h4><b> Delete Document </b></h4>
                                                    <p style="font-size:13px;color:grey" >Are you sure you want to delete this Document? </p>
                                                    <br><button v-on:click="DeleteDocSequence" class="btn btn-primary"  style="border-color:#FCD206;background-color:#FCD206"><span style="color:black"><b>DELETE</b></span></button>
                                                </td>
                                        </tr>
                                </table>


                    </div>



</div>

<!--//////////////////////////////////////////////////////////////////////////////////////////////////////////-->

<!--This is the code for key adding with overlay-->
<div v-if="keyinput">
            <div class="overlayDash" style="" v-on:click="exitKeyInput"></div>
    <div class="popupDash" style="">



                          <i class="fa fa-window-close"  aria-hidden="true" style="font-size:20px;float:right;margin-right:0px;margin-top:-10px" v-on:click="exitKeyInput"></i>

                         <table>
                                <tr>
                                        <td style="width:50%;">
                                            <i class="fa fa-key" style="font-size:30px;"></i>
                                            <h4><b> + Add Keys </b></h4>
                                            <p style="font-size:13px;color:grey" align="justify">Uploading the simple information about the Key
                                                that will be stored at uholu facility will
                                                help you orgnanize which keys to be delivered
                                                 or pickup that information is particularly for you </p>

                                        </td>
                                        <td style="width:20%"></td>
                                        <td align="">
                                                <div style="margin-top:10px">

                                                        <form @submit="keySubmit" >
                                                                <div class="form-group">
                                                                        <label>Key Name</label>
                                                                        <input type="text" class="form-control" v-model="Keyname" ></input>
                                                                </div>
                                                                <div class="form-group">
                                                                        <label>Description</label>
                                                                        <input type="text" class="form-control" v-model="Keytype" ></input>
                                                                </div>
                                                                <br><center><button type="submit" class="btn btn-primary"  style="border-color:#FCD206;background-color:#FCD206"><span style="color:black"><b>ADD</b></span></button></center>

                                                        </form>

                                                </div>
                                        </td>
                                </tr>
                         </table>





                         <br>

            </div>

</div>
<!--This is the code for Doc adding with overlay-->
<div v-if="docinput">
            <div class="overlayDash" style="" v-on:click="exitDocInput"></div>
<center>
            <div class="popupDash" style="">
                                        <i class="fa fa-window-close" aria-hidden="true" style="font-size:20px;float:right;margin-right:0px;margin-top:-10px" v-on:click="exitDocInput"></i>



                                         <table>
                                                <tr>
                                                        <td style="width:50%;">
                                                           <i class="fa fa-file" style="font-size:30px;"></i>
                                                            <h4><b> + Add Docs </b></h4>
                                                            <p style="font-size:13px;color:grey" align="justify">Uploading the simple information about the Document
                                                                that will be stored at uholu facility will
                                                                help you orgnanize which keys to be delivered
                                                                or pickup that information is particularly for you </p>

                                                        </td>
                                                        <td style="width:20%"></td>
                                                        <td align="">
                                                                <div style="margin-top:10px">

                                                                        <form @submit="docSubmit" >
                                                                                <div class="form-group">
                                                                                        <label>File Name</label>
                                                                                        <input type="text" class="form-control" v-model="Docname" ></input>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                        <label>Description</label>
                                                                                        <input type="text" class="form-control" v-model="Doctype" ></input>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                        <label>Upload Scanned Copy or Picture</label><p style="font-size:12px;margin-bottom:5px"> (optional) only jpeg,png,docx,pdf</p>
                                                                                        <input type="file" id="files" ref="files" multiple v-on:change="handleFiles()"/>
                                                                                </div>

                                                                                <br><center><button type="submit" class="btn btn-primary"  style="border-color:#FCD206;background-color:#FCD206"><span style="color:black"><b>ADD</b></span></button></center>

                                                                        </form>

                                                                </div>
                                                        </td>
                                                </tr>
                                        </table>




            </div>
</center>
</div>
<!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->

<div v-show="key_id1">
                <div  v-if="initKeyDisplay">
                    <div style="diplay:flex">
                                <h4 style="margin-left:10px;"><b>My Keys {{UsedKey}}/{{RemKey}}</b></h4>

                                <!--<button type="button" class="btn btn-primary" style="position:absolute;right:20px;;margin-top:-30px">Add New</button>-->
                    </div>

                    <div class="dashDiv" >
                <center>
                            <i class="fa fa-key" style="font-size:30px;"></i><br><p><b>Add New Key</b></p><p style="color:#0A0C12;opacity:0.5;font-size:13px" align="">
                                    Uploading the simple information about the key
                                    that will be stored at uholu facility will
                                    help you orgnanize which keys to be delivered
                                    or pickup that information is particularly for you </p>
                                <button id="buttonKey" type="button" class="btn btn-primary" style="margin-top:-30px;z-index:0;border-color:black;background-color:black;margin-top:30px" v-on:click="changeKeyInput" v-if="limitKey"> <span style="color:white"><b>+ Add Key</b></span></button>

                </center>

                    </div>

                </div>
                <div v-if="postKeyDisplay" style="margin-top:60px;margin-bottom:20px">

                    <div style="diplay:flex">
                                <!--<h4 style="margin-left:10px;"><b>My Keys</b></h4>-->

                                <button id="buttonKey" type="button" class="btn btn-primary" style="position:absolute;right:20px;;margin-top:-30px;z-index:0;margin-right:15px;border-color:#FCD206;background-color:#FCD206" v-on:click="changeKeyInput" v-if="limitKey"> <span style="color:black"><b>Add New</b></span></button>
                    </div>







<br>
<!--
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card strpied-tabled-with-hover" style="padding:15px">
                    <div class="card-header ">
                        <h5 class="card-title" style="margin-top:0px"><b>Keys</b> ({{UsedKey}}<b>/{{RemKey}}</b>)</h5>
                    </div>
                    <div class="card-body table-full-width table-responsive">
                                <table class="table table-hover table-striped">
                                <col width="10%">

                                        <thead>
                                            <th>ID</th>
                                            <th>Key Name</th>
                                            <th>Description</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </thead>
                                        <tbody>
                                            <tr v-for="(result,index) in keyData">
                                                    <td >Key{{result.assigned_id}}</td>
                                                    <td >{{result.name}}</td>
                                                    <td >{{result.type}}</td>
                                                    <td >{{result.status}}</td>
                                                    <td ><a v-if="result.status=='Pending'||result.status=='Delivered'" v-on:click="editKey(index)">Edit</a>&nbsp&nbsp <a v-if="result.status=='Pending'||result.status=='Delivered'" v-on:click="deleteKey(index)">Delete</a></td>

                                                </tr>

                                        </tbody>
                                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
-->


<div class="content" style="">
    <div class="container-fluid">
        <div class="card" style="padding-top: 20px;">


<div class="card-header " style="margin-left:10px">
                        <h5 class="card-title" style="margin-top:0px"><b>Keys</b> ({{UsedKey}}<b>/{{RemKey}}</b>)</h5>
                    </div>


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
          <b-input-group size="sm"  style="margin-left:20px">
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
            v-model="perPage1"
            class="form-control"
            style="width:50%"
            id="perPageSelect"
            size="sm"
            :options="pageOptions1"
          ></b-form-select>
        </b-form-group>

      </b-col>

      <b-col sm="5" md="6" class="my-1">

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
    >
      <!--<template v-slot:cell(message)="row" >
        <div style="white-space: nowrap; width: 350px; overflow: hidden;text-overflow: ellipsis"><b v-if="row.item.flag==0">{{row.item.message}}</b></div>
        <div style="white-space: nowrap; width: 350px; overflow: hidden;text-overflow: ellipsis"><span v-if="row.item.flag==1">{{ row.item.message }}</span></div>
      </template>-->
      <!--<template v-slot:cell(amount)="row" >
       ${{ row.item.amount }}


      </template>-->
    <!--<template v-slot:cell(assigned_id)="row">
        key{{ row.value }}
      </template>-->
      <template v-slot:cell(actions)="row">
        <!--<b-button size="sm" @click="info(row.item, row.index, $event.target)" class="mr-1">
          Info modal
        </b-button>-->
        <!--<b-button size="sm" @click="row.toggleDetails">
          {{ row.detailsShowing ? 'Hide' : 'Show' }} Details
        </b-button>-->
        <b-button size="sm" v-if="row.item.status=='Pending'||row.item.status=='Delivered'||row.item.status=='Pick Up Requested'" @click="editKey(row.item.index)" class="mr-1">
          Edit
        </b-button>
        <b-button size="sm" v-if="row.item.status=='Pending'||row.item.status=='Delivered'" @click="deleteKey(row.item.index)" class="mr-1">
          Delete
        </b-button>

      </template>

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
    <b-modal :id="infoModal1.id" :title="infoModal1.title" ok-only @hide="resetInfoModal1">
      <pre>{{ infoModal1.content }}</pre>
    </b-modal>
  </b-container>






        </div>
    </div>
</div>














             <!--   <table style="width:70%;margin-top:20px;margin-bottom:20px;z-index:0">
                                        <thead>
                                            <tr class="table100-head">
                                                <th class="column1">Key ID</th>
                                                <th class="column2">Key Name</th>
                                                <th class="column3">Key Type</th>
                                                <th class="column4">Status</th>
                                                <th class="column4">Actions</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                                <tr v-for="(result,index) in keyData">
                                                    <td class="column1">Key{{result.id}}</td>
                                                    <td class="column2">{{result.name}}</td>
                                                    <td class="column3">{{result.type}}</td>
                                                    <td class="column4">{{result.status}}</td>
                                                    <td class="column4" ><a v-on:click="editKey(index)">Edit</a>&nbsp&nbsp <a v-if="result.status=='Pending'||result.status=='Delivered'" v-on:click="deleteKey(index)">Delete</a></td>

                                                </tr>

                                        </tbody>
                                    </table>-->

                </div>
</div>

<!--//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->

<b-alert v-model="itemSuccessdoc" style="width:92%;margin:auto;background-color:#89b541" variant="success">
                      <a href="#!" v-on:click="itemSuccessdoc=false" style="color:black" ><i class="fa fa-window-close" aria-hidden="true"></i></a> &nbsp&nbsp&nbsp&nbsp  Document added successfully, Please go to Request Pickup page to request pickup. &nbsp&nbsp <a href='/dashboard/pickup' style="color:black">Go to Request Pickup</a>
                        </b-alert><br><br>

<div v-show="doc_id1">
                    <div  v-if="initDocDisplay">
                        <div style="diplay:flex">
                        <h4 style="margin-left:10px;"><b>My Documents {{UsedDoc}}/{{RemDoc}}</b></h4>
                        <!--<button type="button" class="btn btn-primary" style="position:absolute;right:20px;margin-top:-30px">Add New</button>-->
                        </div>

                        <div class="dashDiv" >
                    <center>
                            <i class="fa fa-file" style="font-size:30px;"></i><br><p><b>Add New Document</b></p><p style="color:#0A0C12;opacity:0.5;font-size:13px" align="">
                                Uploading the simple information about the document
                                that will be stored at uholu facility will help you
                                orgnanize which keys to be delivered or pickup that
                                information is particularly for you </p>
                                    <button id="buttonDoc" type="button" class="btn btn-primary" style="margin-top:-30px;z-index:0;margin-right:15px;border-color:black;background-color:black;margin-top:30px" v-on:click="changeDocInput" v-if="limitDoc"> <span style="color:white"><b>+ Add Doc</b></span></button>

                    </center>

                        </div>

                    </div>

                    <div style="margin-top:20px;margin-bottom:20px" v-if="postDocDisplay">
                            <div style="diplay:flex">
                                    <!--<h4 style="margin-left:10px;"><b>My Documents</b></h4>-->
                                    <button id="buttonDoc" type="button" class="btn btn-primary" style="position:absolute;right:20px;margin-top:-30px;z-index:0;margin-right:15px;border-color:#FCD206;background-color:#FCD206" v-on:click="changeDocInput" v-if="limitDoc"> <span style="color:black"><b>Add New</b></span></button>
                            </div>




<br>
<!--
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card strpied-tabled-with-hover" style="padding:15px">
                    <div class="card-header ">
                                    <h5 class="card-title" style="margin-top:0px"><b>Documents</b> ({{UsedDoc}}<b>/{{RemDoc}}</b>)</h5>
                    </div>
                    <div class="card-body table-full-width table-responsive">
                                    <table class="table table-hover table-striped">
                                    <col width="10%">

                                        <thead>
                                            <th>ID</th>
                                            <th>File Name</th>
                                            <th>Description</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </thead>
                                        <tbody>
                                            <tr v-for="(result,index) in docData">
                                                        <td>Doc{{result.assigned_id}}</td>
                                                        <td>{{result.name}}</td>
                                                        <td>{{result.type}}</td>
                                                        <td>{{result.status}}</td>
                                                        <td><a v-if="result.status=='Pending'||result.status=='Delivered'||result.status=='Pick Up Requested'" v-on:click="editDoc(index)">Edit</a>&nbsp&nbsp <a v-if="result.status=='Pending'||result.status=='Delivered'" v-on:click="deleteDoc(index)">Delete</a> &nbsp&nbsp&nbsp<a :href="result.filename" target="_blank" v-if="result.filename">View File</a><a href="#!" v-on:click="activeScan(result.id)" v-if="!result.filename && result.status=='Secured' && !result.request && roleofactive=='business'">Request Scan</a><span v-if="result.request">Scan Requested</span></td>

                                                    </tr>

                                        </tbody>
                                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
-->







<div class="content" style="">
    <div class="container-fluid">
        <div class="card" style="padding-top: 20px;">

<div class="card-header " style="margin-left:10px">
                                    <h5 class="card-title" style="margin-top:0px"><b>Documents</b> ({{UsedDoc}}<b>/{{RemDoc}}</b>)</h5>
                    </div>



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
      <!--<template v-slot:cell(message)="row" >
        <div style="white-space: nowrap; width: 350px; overflow: hidden;text-overflow: ellipsis"><b v-if="row.item.flag==0">{{row.item.message}}</b></div>
        <div style="white-space: nowrap; width: 350px; overflow: hidden;text-overflow: ellipsis"><span v-if="row.item.flag==1">{{ row.item.message }}</span></div>
      </template>-->
      <!--<template v-slot:cell(amount)="row" >
       ${{ row.item.amount }}


      </template>-->
<!--    <template v-slot:cell(assigned_id)="row">
        Doc{{ row.value }}
      </template>-->
      <template v-slot:cell(actions)="row">
        <!--<b-button size="sm" @click="info(row.item, row.index, $event.target)" class="mr-1">
          Info modal
        </b-button>-->
        <!--<b-button size="sm" @click="row.toggleDetails">
          {{ row.detailsShowing ? 'Hide' : 'Show' }} Details
        </b-button>-->
        <b-button size="sm" v-if="row.item.status=='Pending'||row.item.status=='Delivered'||row.item.status=='Pick Up Requested'" @click="editDoc(row.item.index)" class="mr-1">
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
      </template>

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










                                        <!--<table style="width:70%;margin-top:20px;margin-bottom:20px;z-index:0">
                                            <thead>
                                                <tr class="table100-head">
                                                    <th class="column1">Document ID</th>
                                                    <th class="column2">Document Name</th>
                                                    <th class="column3">Document Type</th>
                                                    <th class="column4">Status</th>
                                                    <th class="column4">Actions</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                    <tr v-for="(result,index) in docData">
                                                        <td class="column1">Doc{{result.id}}</td>
                                                        <td class="column2">{{result.name}}</td>
                                                        <td class="column3">{{result.type}}</td>
                                                        <td class="column4">{{result.status}}</td>
                                                        <td class="column4"><a v-on:click="editDoc(index)">Edit</a>&nbsp&nbsp <a v-if="result.status=='Pending'||result.status=='Delivered'" v-on:click="deleteDoc(index)">Delete</a></td>

                                                    </tr>

                                            </tbody>
                                        </table>-->




                    </div>

</div>



</div>























</div>


</template>

<script>


// cus_GKP3aGHDHtEfH1
var DocNull;
var KeyNull;
var docData=[];
var keyData=[];
var initDocDisplay;
var postDocDisplay;
var initKeyDisplay;
var postKeyDisplay;
var Keyname;
var Keytype;
var KeynameUpdate;
var KeytypeUpdate;
var KeyindexUpdate;
var KeyindexDelete;
var Docname;
var Doctype;
var DocnameUpdate;
var DoctypeUpdate;
var DocindexUpdate;
var DocindexDelete;

var keyinput;
var docinput;
//var stripe;


var doc_id1;
var doc_quantity1;
var key_id1;
var key_quantity1;

var limitKey;
var limitDoc;

var actionLayoverKey;
var actionLayoverDoc;
var deleteLayoverKey;
var deleteLayoverDoc;
var allow;


export default {
    props: [
        'email_verify',
        'stripe',
        'doc_id',
        'doc_quantity',
        'key_id',
        'key_quantity',
        'authvarprofile1',
        'authvarprofile2',
        'authvarprofile3',
        'statfor',
        'message',
        'user_id',
        'address',
        'roleofactive',
        'deleteerror',
    ],



    data(){
        return{
            UsedKey:null,
            RemKey:null,
            UsedDoc:null,
            RemDoc:null,
            DocNull:true,
            KeyNull:true,
            initDocDisplay:false,
            postDocDisplay:false,
            initKeyDisplay:false,
            postKeyDisplay:false,
            keyData:[],
            docData:[],
            keyinput:false,
            docinput:false,
            Keyname,
            Keytype,
            KeynameUpdate,
            KeytypeUpdate,
            KeyindexUpdate,
            KeyindexDelete,
            Docname,
            Doctype,
            DocnameUpdate,
            DoctypeUpdate,
            DocindexUpdate,
            DocindexDelete,
            doc_id1,
            doc_quantity1,
            key_id1,
            key_quantity1,
            limitKey:true,
            limitDoc:true,
            actionLayoverKey:false,
            actionLayoverDoc:false,
            deleteLayoverKey:false,
            deleteLayoverDoc:false,
            perc:25,
            allow:false,
            stat:false,
            decl:false,
            files: [],
            scanLayoverKey:false,
            scan_id:null,
            // scan_cost:2500,
            paymentError:false,
            reqSent:false,
            pre:true,
            post:false,
            verifyError:false,
            verificationSent:false,
            loader:false,
            itemSuccesskey:false,
            itemSuccessdoc:false,
            deleteErrorNoti:false,
            //stripe,
            //stripe:'cus_GKP3aGHDHtEfH1'
            //'<?php echo auth()->user()->name}} ?>',
            items:[],
            fields: [
                // { key: 'index', label: 'index', sortable: true, sortDirection: 'desc' },
                { key: 'assigned_id', label: 'ID', sortable: true, sortDirection: 'desc' },
                { key: 'name', label: 'File Name', sortable: true, sortDirection: 'desc' },
                //{ key: 'email', label: 'Email', sortable: true, sortDirection: 'desc' },
                { key: 'type', label: 'Description', sortable: true, sortDirection: 'desc' },
                { key: 'status', label: 'Status', sortable: true, class: 'text-center' },

                //   { key: 'email', label: 'is Active', formatter: (value, key, item) => { return value ? 'Yes' : 'No' }, sortable: true, sortByFormatted: true, filterByFormatted: true },
                //{ key: 'created_at', label: 'Time', sortable: true },
                //{ key: 'tracking', label: 'Tracking Number', sortable: true, sortDirection: 'desc' },
                //{ key: 'description', label: 'Payment Description', sortable: true, sortDirection: 'desc' },
                //{ key: 'amount', label: 'Payment', sortable: true, sortDirection: 'desc' },
                //{ key: 'status', label: 'Status', sortable: true, class: 'text-center' },
                 { key: 'actions', label: 'Actions' }
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
                infoModal: { id: 'info-modal', title: '', content: '' },



            items1:[],
            fields1: [
                // { key: 'index', label: 'index', sortable: true, sortDirection: 'desc' },
                { key: 'assigned_id', label: 'ID', sortable: true, sortDirection: 'desc' },
                { key: 'name', label: 'File Name', sortable: true, sortDirection: 'desc' },
                //{ key: 'email', label: 'Email', sortable: true, sortDirection: 'desc' },
                { key: 'type', label: 'Description', sortable: true, sortDirection: 'desc' },
                { key: 'status', label: 'Status', sortable: true, class: 'text-center' },

                //   { key: 'email', label: 'is Active', formatter: (value, key, item) => { return value ? 'Yes' : 'No' }, sortable: true, sortByFormatted: true, filterByFormatted: true },
                //{ key: 'created_at', label: 'Time', sortable: true },
                //{ key: 'tracking', label: 'Tracking Number', sortable: true, sortDirection: 'desc' },
                //{ key: 'description', label: 'Payment Description', sortable: true, sortDirection: 'desc' },
                //{ key: 'amount', label: 'Payment', sortable: true, sortDirection: 'desc' },
                //{ key: 'status', label: 'Status', sortable: true, class: 'text-center' },
                 { key: 'actions', label: 'Actions' }
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
                infoModal1: { id: 'info-modal', title: '', content: '' }
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

    mounted(){
        if(this.deleteerror){
            this.deleteErrorNoti=true;
        }
        //console.log("Hello how are you");
        if(!this.email_verify){
            this.verifyError=true;
        }
        console.log(this.user_id);
        $(".btn-success").click(function(){
              var html = $(".clone").html();
              $(".increment").after(html);
          });

          $("body").on("click",".btn-danger",function(){
              $(this).parents(".control-group").remove();
          });

        // this.updateProgressBar();
       if(this.authvarprofile1=='1' && this.authvarprofile2=='1' && this.authvarprofile3=='1')
                {
                        this.allow=true;
                        // console.log('allowed')
                }
        else{
            this.allow=false;
                        // console.log('allowed')
        }
                //console.log(this.key_quantity)
        // console.log(sum);

            this.mountMethod();
            this.doc_id1=this.doc_id;
            this.doc_quantity1=this.doc_quantity;

            this.key_id1=this.key_id;
            this.key_quantity1=this.key_quantity;
            //console.log(this.statfor)
            if(this.statfor=="Pending"){
                this.stat=true;
            }
            else if(this.statfor=="Declined"){
                this.decl=true;
            }
            else{
                this.stat=false;
            }


    },

    methods: {
            mountMethod(){
                var stripe_id=this.stripe;
                var user_id = this.user_id;
                axios.get('/api/get-user-docs').then(response => {
                    this.docData=response.data;
                    $.each(response.data, function(key, value) {
                        response.data[key]['index']=key;
                        response.data[key].assigned_id='doc'+response.data[key].assigned_id;
                    });

                    this.items=response.data;
                    this.totalRows = this.items.length;
                    console.log(response.data);
                    // console.log(this.doc_quantity1);
                    this.UsedDoc=response.data.length;
                    this.RemDoc=this.doc_quantity1;
                            if(response.data.length==this.doc_quantity1){
                                        this.limitDoc=false;
                                        //console.log('key limit reached')
                                    }
                            else{
                                this.limitDoc=true;
                            }

                    if(response.data.length){
                        this.initDocDisplay=false;
                        this.postDocDisplay=true;
                    // console.log('init removed doc')
                    }
                    else{
                        this.initDocDisplay=true;
                        this.postDocDisplay=false;
                        //console.log('init added doc')
                    }

                });

                axios.get('/api/get-user-keys').then(response => {
                    // console.log(response.data)
                    // $.each(response.data, function(key, value) {
                    //     console.log(value.assigned_id)
                    // });
                    this.keyData=response.data;
                    $.each(response.data, function(key, value) {
                        response.data[key]['index']=key;
                        response.data[key].assigned_id='key'+response.data[key].assigned_id;
                    });
                    this.items1=response.data;
                    this.totalRows1 = this.items1.length;
                    // console.log(response.data.length);
                    // console.log(this.key_quantity1);
                    this.UsedKey=response.data.length;
                    this.RemKey=this.key_quantity1;
                            if(response.data.length==this.key_quantity1){
                                    this.limitKey=false;
                                    //console.log('key limit reached')
                                    }
                            else{
                                this.limitKey=true;
                            }
                    if(response.data.length){
                        this.initKeyDisplay=false;
                        this.postKeyDisplay=true;
                        //console.log('init removed key')
                    }
                    else{
                        this.initKeyDisplay=true;
                        this.postKeyDisplay=false;
                    // console.log('init added key')
                    }

                });
            },
            // sortArrays(arrays) {
            //     return _.orderBy(arrays, 'assigned_id', 'asc');
            // },


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

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


/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

            info1(item, index, button) {
                this.infoModal1.title = `Row index: ${index}`
                this.infoModal1.content = JSON.stringify(item, null, 2)
                this.$root.$emit('bv::show::modal', this.infoModal1.id, button)
            },
            resetInfoModal1() {
                this.infoModal1.title = ''
                this.infoModal1.content = ''
            },
            onFiltered1(filteredItems) {
                // Trigger pagination to update the number of buttons/pages due to filtering
                this.totalRows1 = filteredItems.length
                this.currentPage1 = 1
            },



/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


            resendVerificationEmail(){
                this.loader=true;
                var email=this.address;
                    axios.post('/api/email-verification',{
                        email,
                    }).then(response=>{
                        this.loader=false;
                        this.verificationSent=true;
                        setTimeout(() => this.verificationSent=false, 3000);
                    });
            },


            editKey(index){
                this.KeynameUpdate=this.keyData[index].name;
                this.KeytypeUpdate=this.keyData[index].type;
                this.KeyindexUpdate=this.keyData[index].id;
                this.actionLayoverKey=true;
                this.mountMethod();
                //console.log(this.keyData[index].name);
            },
            editDoc(index){
                this.DocnameUpdate=this.docData[index].name;
                this.DoctypeUpdate=this.docData[index].type;
                this.DocindexUpdate=this.docData[index].id;
                this.actionLayoverDoc=true;
                this.mountMethod();
                //console.log(this.keyData[index].name);
            },
            deleteKey(index){
                this.KeyindexDelete=this.keyData[index].id;
                this.deleteLayoverKey=true;

            },

            deleteDoc(index){
                this.DocindexDelete=this.docData[index].id;
                this.deleteLayoverDoc=true;

            },

            changeDocInput(){
                this.docinput=true;

            },

            changeKeyInput(){
                this.keyinput=true;


            },
            exitDocInput(){
                this.docinput=false;
               // console.log(this.docinput)

            },
            exitKeyInput(){
                this.keyinput=false;
                //console.log(this.keyinput)


            },
            exitDocInputUpdate(){
                this.actionLayoverDoc=false;
               // console.log(this.docinput)

            },
            exitKeyInputUpdate(){
                this.actionLayoverKey=false;
                //console.log(this.keyinput)


            },
            keySubmit(e){
                e.preventDefault();
                var stripe_id1=this.stripe;
                var key_name=this.Keyname;
                var key_description=this.Keytype;
                var user_id = this.user_id;
                axios.post('/api/add-key', {
                        key_name,
                        key_description,
                        user_id,

                        }).then(response => {
                            //console.log(response.data)
                            this.mountMethod();
                            this.Keyname="";
                            this.Keytype="";
                                //window.location.href = '/dashboard';
                                this.exitKeyInput();
                                this.itemSuccesskey=true;
                                // setTimeout(() => this.itemSuccesskey=false, 10000);
                        })
            },

            docSubmit(e){
                e.preventDefault();
                var stripe_id1=this.stripe;
                var doc_name=this.Docname;
                var doc_description=this.Doctype;
                var user_id = this.user_id;
                axios.post('/api/add-document', {
                        doc_name,
                        doc_description,
                        user_id,

                        }).then(response => {
                            this.submitFiles(id);
                            this.mountMethod();
                            this.Docname="";
                            this.Doctype="";
                                //window.location.href = '/dashboard';
                                this.exitDocInput();
                                this.itemSuccessdoc=true;
                                // setTimeout(() => this.itemSuccessdoc=false, 10000);
                        })
            },


            keySubmitUpdate(e){
                e.preventDefault();

                var key_name=this.KeynameUpdate;
                var key_description=this.KeytypeUpdate;
                var key_id=this.KeyindexUpdate;
                axios.post('/api/update-key/'+key_id, {
                        key_name,
                        key_description,


                        }).then(response => {
                            //console.log(response.data)
                                //window.location.href = '/dashboard';
                                this.mountMethod();
                                this.actionLayoverKey=false;
                        })
            },

            docSubmitUpdate(e){
                e.preventDefault();

                var doc_name=this.DocnameUpdate;
                var doc_description=this.DoctypeUpdate;
                var doc_id = this.DocindexUpdate;
                axios.post('/api/update-doc/'+doc_id, {
                        doc_name,
                        doc_description,


                        }).then(response => {
                            this.submitFiles(id_attacheeD);
                            //console.log(response.data)
                                //window.location.href = '/dashboard';
                                this.mountMethod();
                                this.actionLayoverDoc=false;
                        })
            },

            DeleteKeySequence(){
                var key_id = this.KeyindexDelete;
                axios.post('/api/delete-key/'+key_id, {



                        }).then(response => {
                            //console.log(response.data)
                                //window.location.href = '/dashboard';
                                this.mountMethod();
                                this.deleteLayoverKey=false;
                        })

            },

            DeleteDocSequence(){

                    var doc_id=this.DocindexDelete;
                axios.post('/api/delete-doc/'+doc_id, {



                        }).then(response => {
                            //console.log(response.data)
                                //window.location.href = '/dashboard';
                                this.mountMethod();
                                this.deleteLayoverDoc=false;
                        })

            },

             updateProgressBar(){
                        // console.log('ProgressBar function activated')
                                if(this.authvarprofile1){

                                            if(this.authvarprofile2){

                                                        if(this.authvarprofile3){

                                                                    this.perc=100;
                                                        }

                                                        else{

                                                                    this.perc=75;
                                                        }

                                            }

                                            else{

                                                        if(this.authvarprofile3){

                                                                    this.perc=75;
                                                        }

                                                        else{
                                                                    this.perc=50;

                                                        }


                                            }
                                }

                                else{

                                            if(this.authvarprofile2){

                                                        if(this.authvarprofile3){

                                                                    this.perc=75;
                                                        }

                                                        else{

                                                                    this.perc=50;
                                                        }

                                            }

                                            else{

                                                        if(this.authvarprofile3){

                                                                this.perc=50;

                                                        }

                                                        else{

                                                                this.perc=25;

                                                        }

                                            }

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
                    if ( /\.(jpe?g|png|gif|pdf|docx)$/i.test( this.files[i].name ) ) {
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

            removeFile( key ){
                this.files.splice( key, 1 );
                this.getImagePreviews();
            },

            submitFiles(id) {
                console.log(id);
                if(this.files){
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
                            console.log('success');
                            //formData.delete('file');
                            //formData=null;
                            this.files.pop();
                            this.mountMethod();
                        }.bind(this)).catch(function(data) {
                            console.log('error');
                        });
                    }
                }
            },
            activeScan(id){
                this.scan_id=id;
                //console.log("hello");
                this.scanLayoverKey=true;
            },
            requestScanFunction(){
                this.pre=false;
                this.post=true;
                //console.log(this.scan_id);
                var customer_id2=this.stripe;
                // var scan_cost=this.scan_cost;
                var userid=this.user_id;
                var details='Scan payment';
                var amount=cost2/100;
                var user_id=userid;
                var description=details;

                var doc_id=this.scan_id;
                var user_id=this.user_id;

                axios.post('/api/scan', {// create scan request
                    doc_id,
                    user_id,
                    // scan_cost,
                }).then(response => {
                        this.reqSent=true;
                        setTimeout(() => this.reqSent=false, 5000);
                        this.scanLayoverKey=false;
                        this.scan_id=null;
                        this.mountMethod();
                        this.pre=true;
                        this.post=false;
                        //scanRequest

                }).catch(error => {
                    this.paymentError=true;
                                setTimeout(() => this.paymentError=false, 5000);
                                this.pre=true;
                                this.post=false;
                });


            },

    },






}
</script>
<style>
  #filterInput {
    /* border-bottom: 2px solid red; */
    /* background-color:#DDDDDD; */
    border: 3px solid #DDDDDD !important;
  }


</style>
