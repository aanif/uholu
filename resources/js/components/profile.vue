<template>
<div class="container profDiv" style="width:100%">
<div style="padding-left:20px;padding-top:10px">

<!--///////////////////////This is the top profile Nav Bar//////////////////////-->
<h3><b>Edit Profile</b></h3><br>
<div style="width:55%">
<b-progress :value="perc" :max="max" variant="success" show-progress :animated="true"></b-progress>
</div>
<table  style="background-color:#F7F7F8;">
<tr><td>
<div class="topNav" style="">
    <table style="width:100%;height:100%;background-color:#D8D8D8;text-align:center">
        <tr>
            <td v-bind:class="{topNavActive:dispOne}" v-on:click="funcOne"><a class="head1" href="#" style="color:black"><p>01<br>Personal Information</p></a></td>
            <td v-bind:class="{topNavActive:dispTwo}" v-on:click="funcTwo"><a class="head2" href="#" style="color:black"><p>02<br>Addresses</p></a></td>
            <td v-bind:class="{topNavActive:dispThree}" v-on:click="funcThree"><a class="head3" href="#" style="color:black"><p>03<br>100 Point ID</p></a></td>
            <td v-bind:class="{topNavActive:dispFour}" v-on:click="funcFour"><a class="head4" href="#" style="color:green"><p>04<br>Change Payment Method</p></a></td>


        </tr>
    </table>

</div>
</td></tr>
<!--///////////////////////This is the end of top profile Nav Bar//////////////////////-->

<!--
<div style="border:1px solid black; width:55%;" v-if="false">
<form class="form-style-7">
<ul>
<li>
    <label for="name">Name</label>
    <input type="text" name="name" maxlength="100">
    <span>Enter your full name here</span>
</li>
<li>
    <label for="email">Email</label>
    <input type="email" name="email" maxlength="100">
    <span>Enter a valid email address</span>
</li>
<li>
    <label for="url">Website</label>
    <input type="url" name="url" maxlength="100">
    <span>Your website address (eg: http://www.google.com)</span>
</li>

<li>
    <input type="submit" value="" >
</li>
</ul>
</form>

</div>
-->

<!--/////////////////////////////////////////01///////////////////////////////////////////-->

<tr><td>
<div class="proDiv" style="" v-if="dispOne">
<br>


<h4><b>Personal Information</b></h4>


<form v-on:submit.prevent="updateProfile('1')">
            <div style="width:100%;position:relative">
                    <div style="width:80%;height:;">
                    <!--Profile picture goes here-->
                    <h6 v-if="firstupload" style="margin-left:10px">Add Your Profile Picture</h6>
                    <table style="background-color:#F7F7F8;height:100%">
                            <tr style="">
                                <td style="max-width:30%"><img :src="image" style="width: 100%;max-height:;margin: auto;display: block;margin-bottom: 10px;"/></td>
                                <td v-if="firstupload" style="width:70%"><input type="file" id="file" ref="filepro" @change="getImage(1, $event)" style="background-color:#F7F7F8;border:1px solid #F7F7F8!important" REQUIRED> </td>
                                <td v-if="!firstupload" style="width:70%"><input type="file" id="file" ref="filepro" @change="getImage(1, $event)" style="background-color:#F7F7F8;border:1px solid #F7F7F8!important"> </td>

                            </tr>

                    </table>


                    </div>
            </div>

            <table style="background-color:#F7F7F8;padding-bottom:20px">
                <tr v-if="role=='business'">
                    <td><p>Company Name</p><input type="text" class="form-control" v-model="cname" :disabled="authvarprofile1==1" REQUIRED></input></td>
                    <td><p>ABN/ACN</p><input type="text" class="form-control" v-model="abn" :disabled="authvarprofile1==1" REQUIRED></input></td>
                </tr>
                <tr>
                    <td><p>First Name</p><input type="text" class="form-control" v-model="fname" :disabled="authvarprofile1==1" REQUIRED></input></td>
                    <td><p>Last Name</p><input type="text" class="form-control" v-model="lname" :disabled="authvarprofile1==1" REQUIRED></input></td>
                </tr>

                <tr>
                    <td><p>Email</p><input type="email" class="form-control" v-model="email" REQUIRED></input></td>
                    <td><p>Date Of Birth</p><input type="date" class="form-control" v-model="dob" :disabled="authvarprofile1==1" REQUIRED></input></td>
                </tr>

                <tr>
                    <td><p>Phone # &nbsp<span style="color:green"> {{saveMsg}}</span><span style="color:red"> {{saveMsgErr}}</span></p><input type="text" class="form-control" v-model="phone" disabled></input></td>
                    <td><span v-if="role=='business'"><p>Title/Position</p><input type="text" class="form-control" v-model="title" :disabled="authvarprofile1==1" REQUIRED></input></span></td>

                </tr>
                <tr>
                    <td><a href="#!" v-if="viewVerPtag" v-on:click="viewVerificationPhone">Change Phone Number</a><p  v-if="viewVerP">New Phone #</p><input type="text" class="form-control" v-if="viewVerP" v-model="phoneUpd" :disabled="sendinput"></input></td>
                    <td><button type="button" v-on:click="sendVerCode" v-if="viewVerPB && active" style="width:50%;height:40px;background-color:black;border:1px solid black;color:white">Send Code</button></td>
                </tr>
                <tr v-if="enterCode">
                    <td><p>Verification Code</p><input type="text" class="form-control" v-model="codeVer"></input><p style='color:green'>{{verificationResults}}</p><p style='color:red'>{{verificationResultsErr}}</p></td>
                    <td><button type="button" v-on:click="verifyCode" style="width:50%;height:40px;background-color:black;border:1px solid black;color:white">Verify</button></td>
                </tr>
                <tr>
                    <td><a href="#!" v-if="viewpasswodtext" v-on:click="viewPasswordField">Change Password</a><p  v-if="viewpasswodfield">New Password</p><input type="password" class="form-control" v-if="viewpasswodfield" v-model="newpassword"></input></td>
                    <td><p  v-if="viewpasswodfield">Re-enter New Password</p><input type="password" class="form-control" v-if="viewpasswodfield" v-model="renewpassword"></input></td>
                </tr>
                <tr>
                    <td><p  v-if="viewpasswodfield">Old Password</p><input type="password" class="form-control" v-if="viewpasswodfield" v-model="oldpassword"></input><p style='color:green'>{{PasswordResults}}</p><p style='color:red'>{{PasswordResultsErr}}</p></td>
                    <td><button v-if="viewpasswodfield" type="button" v-on:click="updatePassword" style="width:50%;height:40px;background-color:black;border:1px solid black;color:white">Update Password</button></td>
                </tr>


            </table>
            <br>


            <h4 style="margin-left:7px" v-if="role!='business'"><b>Next of Kin</b></h4>

            <table style="background-color:#F7F7F8;padding-bottom:20px" >
                <tr v-if="role!='business'">
                    <td><p>First Name</p><input type="text" class="form-control" v-model="kfname" :disabled="authvarprofile1==1" REQUIRED></input></td>
                    <td><p>Last Name</p><input type="text" class="form-control" v-model="klname" :disabled="authvarprofile1==1" REQUIRED></input></td>
                </tr>

                <tr v-if="role!='business'">
                    <td><p>Email</p><input type="email" class="form-control" v-model="kemail" :disabled="authvarprofile1==1" REQUIRED></input></td>
                    <td><p>Phone #</p><input type="text" class="form-control" v-model="kphone" :disabled="authvarprofile1==1" REQUIRED></input></td>
                </tr>

                <tr v-if="role!='business'">
                    <td><p>Relation</p><input type="text" class="form-control" v-model="krelation" :disabled="authvarprofile1==1" REQUIRED></input></td>
                    <td></td>
                </tr>
                <tr>
                    <td><div style="width:100%">
                        <b-alert v-model="showDismissibleAlert" variant="success" dismissible>
                        Profile updated
                        </b-alert>
                        <b-alert v-model="existErr" variant="danger" dismissible>
                        Email Already Exists
                        </b-alert>
                        </div>
                    </td>
                    <td style="width:50%"><button v-if="pre_pro" type="submit" style="width:100%;height:40px;background-color:black;border:1px solid black;color:white" >Save</button><button  v-if="!pre_pro" type="submit" style="width:100%;height:40px;background-color:black;border:1px solid black;color:white" :disabled="true">Loading</button></td>
                </tr>


            </table>







            </form>
            <br><br>

</div>
</td></tr>
<!--///////////////////////////////////////////02/////////////////////////////////////////-->
<tr><td>
<div class="proDiv" style="" v-if="dispTwo">
<br>

<b-alert v-model="showDismissibleAlert1" variant="success" dismissible>
      Address updated
    </b-alert>
<h4><b>Delivery Information</b></h4><br><br>
<h5 style="margin-left:10px"><b>Primary Address</b></h5>

 <form v-on:submit.prevent="updateAddress">
        <table style="background-color:#F7F7F8;padding-bottom:20px">
        <tr><td><vue-google-autocomplete

            ref="address"
            id="map"
            classname="form-control"
            placeholder="Please type your address"
            v-on:placechanged="getAddressData"
            country="au"
            REQUIRED
        >
        </vue-google-autocomplete></td></tr>
                <tr>
                    <td><p>Unit/Apt #</p><input type="text" style="background-color: #E7E7E7" disabled v-model="unit" REQUIRED></input></td>
                    <td><p>Street</p><input type="text" style="background-color: #E7E7E7" v-model="street" disabled  REQUIRED></input></td>
                </tr>

                <tr>
                    <td><p>City</p><input type="text" style="background-color: #E7E7E7" v-model="city"  disabled REQUIRED></input></td>
                    <td><p>Postal Code</p><input type="text" style="background-color: #E7E7E7" v-model="zip"  disabled REQUIRED></input></td>
                </tr>

                <tr>
                    <td><p>Instructions</p><input type="text" v-model="info"></input></td>
                    <td></td>
                </tr>
                <tr>

                    <td><div style="width:100%"><input type="checkbox" name="vehicle1" v-model="sec_address_check" value="Bike" style="width:20px;height:20px"><span style="display: inline-block;font-size: 13px;float:left;margin-top:-17px;margin-left:25px"> Add Secondary Address</span><br></div></td>
                    <td><button type="submit" v-if="!sec_address_check" style="width:100%;height:40px;background-color:black;border:1px solid black;color:white">Save</button></td>
                </tr>


            </table>


<div v-if="sec_address_check">
<h5 style="margin-left:10px"><b>Secondary Address</b></h5>

            <table style="background-color:#F7F7F8;padding-bottom:20px">
            <tr><td><vue-google-autocomplete
            ref="address2"
            id="map2"
            classname="form-control"
            placeholder="Please type your address"
            v-on:placechanged="getAddressData2"
            country="au"
        >
        </vue-google-autocomplete></td></tr>
                <tr>
                    <td><p>Unit/Apt #</p><input type="text" v-model="sec_unit"  style="background-color: #E7E7E7" disabled ></input></td>
                    <td><p>Street</p><input type="text"v-model="sec_street"  style="background-color: #E7E7E7" disabled ></input></td>
                </tr>

                <tr>
                    <td><p>City</p><input type="text" v-model="sec_city"  style="background-color: #E7E7E7" disabled ></input></td>
                    <td><p>ZipCode</p><input type="text" v-model="sec_zip"  style="background-color: #E7E7E7" disabled ></input></td>
                </tr>

                <tr>
                    <td><p>Instructions</p><input type="text" v-model="sec_info"></input></td>
                    <td></td>
                </tr>
                <tr>
                    <td><div style="width:50%"></div></td>
                    <td><button type="submit" style="width:100%;height:40px;background-color:black;border:1px solid black;color:white">Save</button></td>
                </tr>


            </table>
</div>

    </form>









            <br><br>

</div>
</td></tr>
<!--////////////////////////////////////////////03////////////////////////////////////////-->
<tr><td>
<div class="proDiv" style="width:60%" v-if="dispThree">
<br>
<b-alert v-model="showDismissibleAlert3" variant="success" dismissible>
      Pictures updated
    </b-alert>
<form v-on:submit.prevent="uploadID">
<table style="background-color:#F7F7F8;">
        <tr>
                <td style="width:40%;vertical-align:top;">

                            <div >
                                <br>
                                <h4 style="font-size:18px"><b>Primary ID</b></h4>
                                <p align="justify" style="font-weight:500">Uholu will need your license pictures
                                    to have a proof of id and to protect your
                                    valuables from getting stealed</p>
                            </div>
                </td>

                 <td style="width:60%;vertical-align:top;">

                            <table style="background-color:#F7F7F8;">
                                    <tr>
                                            <td v-if="firstfront"><div style="width:150px;height:100px;background-color:#D8D8D8;border:1px solid #979797!important;"><img :src="image1" style="width: 100%;max-height:100%;margin: auto;display: contain;margin-bottom: 10px;"/> </div><center>Front</center><input type="file" v-if="!image1" ref="filelf"  @change="getImage(2,$event)" style="background-color:#F7F7F8;border:1px solid #F7F7F8!important" REQUIRED> </td>
                                            <td v-if="!firstfront"><div style="width:150px;height:100px;background-color:#D8D8D8;border:1px solid #979797!important;"><img :src="image1" style="width: 100%;max-height:100%;margin: auto;display: contain;margin-bottom: 10px;"/> </div><center>Front</center><input type="file" v-if="!image1" ref="filelf"  @change="getImage(2,$event)" style="background-color:#F7F7F8;border:1px solid #F7F7F8!important"> </td>
                                            <td v-if="firstback"><div style="width:150px;height:100px;background-color:#D8D8D8;border:1px solid #979797!important;"><img :src="image2" style="width: 100%;max-height:100%;margin: auto;display: contain;margin-bottom: 10px;"/> </div><center>Back</center><input type="file" v-if="!image2" ref="filelb" @change="getImage(3,$event)" style="background-color:#F7F7F8;border:1px solid #F7F7F8!important" REQUIRED> </td>
                                            <td v-if="!firstback"><div style="width:150px;height:100px;background-color:#D8D8D8;border:1px solid #979797!important;"><img :src="image2" style="width: 100%;max-height:100%;margin: auto;display: contain;margin-bottom: 10px;"/> </div><center>Back</center><input type="file" v-if="!image2" ref="filelb" @change="getImage(3,$event)" style="background-color:#F7F7F8;border:1px solid #F7F7F8!important"> </td>
                                    </tr>
                            </table>
                </td>
        </tr>

        <tr>
                <td style="width:40%;vertical-align:top;">
                            <div><br>
                            <h4 style="font-size:18px"><b>Secondary ID</b></h4>
                            <p align="justify" style="font-weight:500">Uholu will need a picture of your passport, bank card, medicare card or a immicard
                                 just to have a proof of id and to protect your
                                valuables from getting stealed</p>
                            </div>

                </td>


                <td style="width:60%;vertical-align:top;">


                            <table style="background-color:#F7F7F8;">
                                    <tr>
                                            <td v-if="firstsec"><div style="width:330px;height:150px;background-color:#D8D8D8;border:1px solid #979797!important;margin:auto"><img :src="image3" style="width: 100%;max-height:100%;margin: auto;display: cover;margin-bottom: 10px;"/> </div><center><input type="file" v-if="!image3" ref="fileid" @change="getImage(4,$event)" style="background-color:#F7F7F8;border:1px solid #F7F7F8!important" REQUIRED></center></td>
                                            <td v-if="!firstsec"><div style="width:330px;height:150px;background-color:#D8D8D8;border:1px solid #979797!important;margin:auto"><img :src="image3" style="width: 100%;max-height:100%;margin: auto;display: cover;margin-bottom: 10px;"/> </div><center><input type="file" v-if="!image3" ref="fileid" @change="getImage(4,$event)" style="background-color:#F7F7F8;border:1px solid #F7F7F8!important" ></center></td>
                                    </tr>
                            </table>

                </td>
        </tr>

        <tr>
        <td colspan="2"><center><button type="submit" class="btn btn-primary" style="width:40%;height:40px;background-color:black;border:1px solid black;color:white">Upload</button></center></td>
        </tr>
</table>
</form>
<br><br>

</div>
</td></tr>
<!--//////////////////////////////////////////////04//////////////////////////////////////-->
<tr><td>
<div class="proDiv" style="" v-show="dispFour">
<br>

<b-alert v-model="showDismissibleAlert2" variant="success" dismissible>
      Card updated
    </b-alert>
<center>
<h4><b>Change Payment Method</b></h4>
</center>

<div style="border:1px solid grey;width:50%;margin:auto;padding:10px">

        <p>Card #: <b> **** **** **** {{lastfour}} </b> <img src='/assets/visa.jpg' v-if="brand=='Visa'" style="width:40px"></img><img src='/assets/mastercard.jpg' v-if="brand=='MasterCard'" style="width:40px"></img><img src='/assets/amex.jpg' v-if="brand=='Amex'" style="width:40px"></img></p>
        <p>Exp Date: <b>{{expdate}}</b></p>

</div>


<center><div id="card-element" style="width:70%;height:60px;margin-top:40px;margin-bottom:20px;"></div></center>
  <center><button style="width:30%;height:40px;background-color:black;border:1px solid black;color:white;margin-top:0px" v-on:click="purchase">Add Card</button></center>


</div>
</td></tr>
</table>
<!--///////////////////////////////////////////////05/////////////////////////////////////-->

</div>




</div>
</template>
<script>

var dispOne;
var dispTwo;
var dispThree;
var dispFour;
var fname;
var lnmae;
var email;
var phone;
var dob;
var imagesave;

var kfname;
var klname;
var kemail;
var kphone;
var krelation;

var city;
var street;
var unit;
var zip;
var info;

var user_id;
var customerStripe1;
var  showDismissibleAlert;
var  showDismissibleAlert1;
var dismissSecs;
var dismissCountDown;
var showDismissibleAlert2;

                var card=undefined;
                var stripe=undefined;

import VueGoogleAutocomplete from 'vue-google-autocomplete'

 export default {
     components: { VueGoogleAutocomplete },
     props: [
         'cnameauth',
         'abnauth',
         'titleauth',
        'authvarid',
        'authvarname',
        'authvaremail',
        'authvarphone',
        'authvarlname',
        'authvardob',
        'authvarkname',
        'authvarklname',
        'authvarkemail',
        'authvarkphone',
        'authvarkrelation',
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
        'authvarcustomerstripe',

        'authvarpic1',
        'authvarpic2',
        'authvarpic3',
        'authvarpic4',
        'checkinrole',

        'lastfour',
        'brand',
        'expdate',
        'procheck1',
        'procheck2',
        'procheck3',

    ],

        data(){

            return{
                    address: '',
                    dispOne:true,
                    dispTwo:false,
                    dispThree:false,
                    dispFour:false,
                    image: '',
                    imagesave,
                    image1: '',
                    image2: '',
                    image3: '',
                    items: [1, 2, 3, 4, 5],
                    fname:'',
                    lname:'',
                    email:'',
                    phone:'',
                    dob:'',
                    file:'',
                    firstupload:true,
                    firstfront:true,
                    firstback:true,
                    firstsec:true,
                    perc: 0,
                    max: 100,
                    true:true,

                    kfname:'',
                    klname:'',
                    kemail:'',
                    kphone:'',
                    krelation:'',
                    city:'',
                    street:'',
                    unit:'',
                    zip:'',
                    info:'',
                    user_id:'',
                    kfname:'',
                    klname:'',
                    kemail:'',
                    kphone:'',
                    krelation:'',
                    city:'',
                    street:'',
                    unit:'',
                    zip:'',
                    info:'',
                    customerStripe1:'',
                    dismissSecs: 10,
                    dismissCountDown: 0,
                    showDismissibleAlert: false,
                    showDismissibleAlert1: false,
                    showDismissibleAlert2: false,
                    showDismissibleAlert3: false,
                    //variants: ['primary', 'secondary', 'danger', 'warning', 'success', 'info', 'light', 'dark'],
                    profile_image:null,
                    file_pro:null,
                    file_l_f:null,
                    change_l_f:false,
                    file_l_b:null,
                    change_l_b:false,
                    file_id:null,
                    change_id:false,
                    pic1:null,
                    pic2:null,
                    pic3:null,
                    pic4:null,
                    progress:[],
                    authvarprofile1:null,
                    authvarprofile2:null,
                    authvarprofile3:null,
                    situation:'info',
                    keyToSet:null,
                    role:null,
                    cname:null,
                    abn:null,
                    title:null,
                    sec_city:null,
                    sec_street:null,
                    sec_unit:null,
                    sec_zip:null,
                    sec_inf:null,
                    sec_address_check:null,
                    viewVerP:false,
                    viewVerPtag:true,
                    phoneUpd:null,
                    codeVer:null,
                    enterCode:false,
                    sendbutton:false,
                    sendinput:false,
                    viewVerPB:false,
                    verificationResults:null,
                    verificationResultsErr:null,
                    saveMsg:null,
                    saveMsgErr:null,
                    active:true,
                    existErr:false,
                    pre_pro:true,
                    sec_address_adding:true,
                    viewpasswodfield:false,
                    viewpasswodtext:true,
                    newpassword:null,
                    renewpassword:null,
                    oldpassword:null,
                    PasswordResultsErr:null,
                    PasswordResults:null,
            }
        },

         mounted() {
             //setTimeout(() => {this.$refs.address.focus();}, 3000);
             //var keyToSet;

             if(this.authvarpic1){
                 this.firstupload=false;
             }
             else{
                 this.firstupload=true;
             }

             if(this.authvarpic2){
                 this.firstfront=false;
             }
             else{
                 this.firstfront=true;
             }

             if(this.authvarpic3){
                 this.firstback=false;
             }
             else{
                 this.firstback=true;
             }
             if(this.authvarpic4){
                 this.firstsec=false;
             }
             else{
                 this.firstsec=true;
             }
             //console.log("firstupload"+this.firstupload);
             this.role=this.checkinrole;
             axios.get('/api/getkey').then(response => {
                    this.keyToSet=response.data;
                     stripe = Stripe(this.keyToSet);
                    var elements = stripe.elements();
                     var style = {
                base: {
                        // border: '1px solid #black',
                        // borderRadius: '4px',
                        color: "#000",
                        backgroundColor: 'white',
                        height: '2.2em',
                        //width:'50%',
                        //margin-bottom:'20px',
                        //margin-bottom:'20px',
                    },

                invalid: {
                        // All of the error styles go inside of here.
                    }

                    };

                card = elements.create('card',{hidePostalCode: true, style: style});
                card.mount('#card-element');
                    //console.log("key "+keyToSet)
             }).catch(error => {
                                        console.log(error)
                                    });
                this.authvarprofile1=this.procheck1;

                this.authvarprofile2=this.procheck2;
                this.authvarprofile3=this.procheck3;

                this.progressUp();
                //console.log(this.authvar->name);
                this.image=this.authvarpic1;
                this.image1=this.authvarpic2;
                this.image2=this.authvarpic3;
                this.image3=this.authvarpic4;
                this.fname=this.authvarname;
                this.lname=this.authvarlname;
                this.email=this.authvaremail;
                this.phone=this.authvarphone;
                this.user_id=this.authvarid;
                this.dob=this.authvardob;
                this.kfname=this.authvarkname;
                this.klname=this.authvarklname;
                this.kemail=this.authvarkemail;
                this.kphone=this.authvarkphone;
                this.krelation=this.authvarkrelation;
                this.city=this.authvarcity;
                this.street=this.authvarstreet;
                this.unit=this.authvarunit;
                this.zip=this.authvarzip;
                this.info=this.authvarinfo;
                customerStripe1=this.authvarcustomerstripe;
                this.cname=this.cnameauth;
                this.abn=this.abnauth;
                this.title=this.titleauth;
                //console.log(customerStripe1);
                this.sec_city=this.authvarseccity;
                this.sec_street=this.authvarsecstreet;
                this.sec_unit=this.authvarsecunit;
                this.sec_zip=this.authvarseczip;
                this.sec_info=this.authvarsecinfo;
                this.sec_address_check=this.authvarseccheck;



            console.log(this.authvarprofile1)




         },

          methods: {

                    progressUp(){
                         var id=this.authvarid;

                        axios.post('/api/progress', {

                                id,


                                    }).then(response => {
                                                //console.log('worked');

                                            this.progress=response.data
                                                this.authvarprofile1=this.progress[0];
                                                this.authvarprofile2=this.progress[1];
                                                this.authvarprofile3=this.progress[2];
                                                console.log(this.authvarprofile1);
                                                console.log(this.authvarprofile2);
                                                console.log(this.authvarprofile3);
                                                if(this.authvarprofile1){
                                                    $(".head1").css("color","green");
                                                }
                                                else{
                                                    $(".head1").css("color","red");
                                                }
                                                if(this.authvarprofile2){
                                                    $(".head2").css("color","green");
                                                }
                                                else{
                                                    $(".head2").css("color","red");
                                                }
                                                if(this.authvarprofile3){
                                                    $(".head3").css("color","green");
                                                }
                                                else{
                                                    $(".head3").css("color","red");
                                                }
                                                    this.updateProgressBar();
                                    }).catch(error => {
                                        console.log(error)
                                    });


                    },

                    getAddressData(addressData, placeResultData, id) {
                        this.address = addressData;
                        //console.log(this.address.route)
                        //console.log(this.address.street_number)
                        //locality is city
                        //administrative_area_level_1 is state
                        //route is street
                        //street_number is unit
                        this.unit=this.address.street_number;
                        this.street=this.address.route;
                        this.zip=this.address.postal_code;
                        this.city=this.address.locality;
                    },
                    getAddressData2(addressData, placeResultData, id) {
                        this.address = addressData;
                        //console.log(this.address.route)
                        //console.log(this.address.street_number)
                        //locality is city
                        //administrative_area_level_1 is state
                        //route is street
                        //street_number is unit
                        this.sec_unit=this.address.street_number;
                        this.sec_street=this.address.route;
                        this.sec_zip=this.address.postal_code;
                        this.sec_city=this.address.locality;
                    },

                    funcOne(){
                        this.dispOne=true;
                        this.dispTwo=false;
                        this.dispThree=false;
                        this.dispFour=false;
                    },
                    funcTwo(){

                        this.dispOne=false;
                        this.dispTwo=true;
                        this.dispThree=false;
                        this.dispFour=false;
                    },
                    funcThree(){
                        this.dispOne=false;
                        this.dispTwo=false;
                        this.dispThree=true;
                        this.dispFour=false;
                    },
                    funcFour(){
                        this.dispOne=false;
                        this.dispTwo=false;
                        this.dispThree=false;
                        this.dispFour=true;
                    },


////////////////////////////////////////////////////////////////////

                    getBase64(status) {


                        //var status=1;
                        if(status==1)
                        {   var reader = new FileReader();
                            reader.readAsDataURL(this.file_pro);
                             reader.onload = function () {
                            this.profile_image= reader.result;
                                axios.post('/api/customer-profile-picture',{image: profile_image}).then(response => {
                                    //console.log(response);
                                    this.showDismissibleAlert=true;
                                    setTimeout(() => this.showDismissibleAlert=false, 5000);
                                    if(response.data.message=='profile_completed'){
                                        setTimeout(() => window.location.href = '/dashboard',3000);
                                    }
                                    else if(response.data.message=='next_tab'){
                                            //First here
                                            this.funcTwo();
                                    }
                                    });
                                                        }.bind(this);
                        }
                        else if(status==2)
                        {   var check=0;
                            var count=0;
                            var val1='';
                            var val2='';
                            var val3='';
                            if(this.change_l_f)
                            {count++;}
                            if(this.change_l_b)
                            {count++;}
                            if(this.change_id)
                            {count++;}
                            var tuff=0;
                            // console.log(this.change_l_f)
                            // console.log(this.change_l_b)
                            // console.log(this.change_id)
                            // console.log(count);
                            // console.log(this.change_l_f);
                            // console.log(this.change_l_b);
                            // console.log(this.change_id);

                            if(this.change_l_f)
                            {var reader1 = new FileReader();
                                reader1.readAsDataURL(this.file_l_f);
                                reader1.onload = function () {
                                    //arr['license_front']=reader1.result;
                                        //arr=['license_front'=> reader1.result];
                                        val1=reader1.result;
                                        console.log(val1)
                                        console.log((reader1.result))
                                        tuff++;
                                        if(tuff==count){
                                                this.change_l_f=false;
                                               this.change_l_b=false;
                                                this.change_id=false;
                                                //add here new code
                                                var upload_images={'license_front':val1,'license_back':this.val2,'photo_id':this.val3};
                                                axios.post('/api/customer-image-upload',{upload_images}).then(response => {
                                                    this.showDismissibleAlert3=true;
                                                     setTimeout(() => this.showDismissibleAlert3=false, 5000);
                                                      this.progressUp();
                                                      if(response.data.message=='profile_completed'){
                                                        setTimeout(() => window.location.href = '/dashboard',3000);
                                                    }
                                                     else if(response.data.message=='next_tab'){

                                                     }

                                                    });
                            }
                                        }.bind(this);}
                            if(this.change_l_b)
                            {var reader2 = new FileReader();
                                reader2.readAsDataURL(this.file_l_b);
                                reader2.onload = function () {
                                    //arr=['license_back'=> reader2.result];
                                        // arr['license_back']=reader2.result;
                                        this.val2=reader2.result;
                                        tuff++;
                                        if(tuff==count){
                                                this.change_l_f=false;
                                                 this.change_l_b=false;
                                                this.change_id=false;
                                                //add here new code
                                                var arr={'license_front':val1,'license_back':this.val2,'photo_id':this.val3};
                                                console.log(arr);
                                                axios.post('/api/customerimg/'+this.user_id,{arr,addid}).then(response => {
                                                    console.log(response);
                                                    this.showDismissibleAlert3=true;
                                                     setTimeout(() => this.showDismissibleAlert3=false, 5000);
                                                      this.progressUp();
                                                      if(response.data=='completed'){
                                                            setTimeout(() => window.location.href = '/dashboard',3000);
                                                        }
                                                         else if(response.data=='next'){

                                                         }

                                                    });
                            }
                                        }.bind(this);}

                            if(this.change_id)
                            {var reader3 = new FileReader();
                                reader3.readAsDataURL(this.file_id);
                                reader3.onload = function () {
                                    //arr=['photo_id'=> reader3.result];
                                         //arr['photo_id']=reader3.result;
                                         this.val3=reader3.result;
                                         tuff++;
                                         if(tuff==count){
                                                 this.change_l_f=false;
                                                 this.change_l_b=false;
                                                this.change_id=false;
                                                //add here new code
                                                        var arr={'license_front':val1,'license_back':this.val2,'photo_id':this.val3};
                                                        console.log(arr);
                                                        axios.post('/api/customerimg/'+this.user_id,{arr,addid}).then(response => {
                                                                            console.log(response);
                                                                            this.showDismissibleAlert3=true;
                                                                     setTimeout(() => this.showDismissibleAlert3=false, 5000);
                                                                      this.progressUp();
                                                                      if(response.data=='completed'){
                                                                            setTimeout(() => window.location.href = '/dashboard',3000);
                                                                        }
                                                                         else if(response.data=='next'){

                                                                        }

                                                            });
                            }
                                        }.bind(this);}
                                //arr.length=3;
                        // if(tuff==3){
                        //     var arr={'license_front':val1,'license_back':val2,'photo_id':val3};
                        //     console.log(arr);}



                        //    if(this.change_l_f)
                        //         { var reader1 = new FileReader();
                        //         reader1.readAsDataURL(this.file_l_f);
                        //         reader1.onload = function () {
                        //         axios.post('/api/customerimg/'+this.user_id,{image: reader1.result,addid,status}).then(response => {
                        //         console.log(response);
                        //         check++;

                        //         if(check==count)
                        //         {
                        //                     this.showDismissibleAlert3=true;
                        //                     setTimeout(() => this.showDismissibleAlert3=false, 5000);
                        //                     this.change_l_f=false;
                        //                     this.change_l_b=false;
                        //                     this.change_id=false;
                        //                     this.progressUp();

                        //         }
                        //         });}.bind(this);}


                        //     if(this.change_l_b)
                        //         {var status=3;
                        //          var reader2 = new FileReader();
                        //          console.log(this.file_l_b)
                        //         reader2.readAsDataURL(this.file_l_b);
                        //         reader2.onload = function () {
                        //             // console.log(reader2.result);
                        //         axios.post('/api/customerimg/'+this.user_id,{image: reader2.result,addid,status}).then(response => {
                        //         console.log(response);
                        //         check++;

                        //         if(check==count)
                        //         {
                        //                     this.showDismissibleAlert3=true;
                        //                     setTimeout(() => this.showDismissibleAlert3=false, 5000);
                        //                     this.change_l_f=false;
                        //                     this.change_l_b=false;
                        //                     this.change_id=false;
                        //                     this.progressUp();

                        //         }
                        //         });}.bind(this);
                        //         }

                        //     if(this.change_id)
                        //         {var status=4;
                        //          var reader3 = new FileReader();
                        //         reader3.readAsDataURL(this.file_id);
                        //         reader3.onload = function () {
                        //         axios.post('/api/customerimg/'+this.user_id,{image: reader3.result,addid,status}).then(response => {
                        //         console.log(response);
                        //         check++;

                        //         if(check==count)
                        //         {
                        //                     this.showDismissibleAlert3=true;
                        //                     setTimeout(() => this.showDismissibleAlert3=false, 5000);
                        //                     this.change_l_f=false;
                        //                     this.change_l_b=false;
                        //                     this.change_id=false;
                        //                     this.progressUp();

                        //         }
                        //         });}.bind(this);}

                        }
                        // console.log(reader.result)

                    // reader.onerror = function (error) {
                    //     console.log('Error: ', error);
                    // };
                    },



                    getImage(x,e){
                        //this.file=this.$refs.file.files[0];
                        // console.log(e);
                        // console.log(x);


                        if(x==1)
                        {var images=e.target.files[0];
                            var reader=new FileReader();
                            reader.readAsDataURL(images);
                            reader.onload=e=>{
                                this.image=e.target.result;
                            }
                            this.file_pro = this.$refs.filepro.files[0];
                            console.log(this.file_pro)
                        }

                        else if(x==2)
                        {var images=e.target.files[0];
                            var reader=new FileReader();
                            reader.readAsDataURL(images);
                            reader.onload=e=>{
                                this.image1=e.target.result;
                            }
                            this.file_l_f=this.$refs.filelf.files[0];
                            this.change_l_f=true;
                            console.log(this.file_l_f)
                        }

                        else if(x==3)
                        {var images=e.target.files[0];
                            var reader=new FileReader();
                            reader.readAsDataURL(images);
                            reader.onload=e=>{
                                this.image2=e.target.result;
                            }
                            this.file_l_b=this.$refs.filelb.files[0];
                            this.change_l_b=true;
                            console.log(this.file_l_b)
                        }

                        else if(x==4)
                        {var images=e.target.files[0];
                            var reader=new FileReader();
                            reader.readAsDataURL(images);
                            reader.onload=e=>{
                                this.image3=e.target.result;
                            }
                             this.file_id=this.$refs.fileid.files[0];
                             this.change_id=true;
                             console.log(this.file_id)
                        }

                    },






///////////////////////////////////////////////////////////////////

                    updateProfile(e){
                        this.pre_pro=false;
                        //console.log(e);
                        //e.preventDefault();
                        var status=1;
                        var id=this.user_id
                        var first_name=this.fname
                        var last_name=this.lname
                        var email=this.email
                        var phone=this.phone
                        var date_of_birth=this.dob
                        var kin_fname=this.kfname
                        var kin_lname=this.klname
                        var kin_email=this.kemail
                        var kin_phone=this.kphone
                        var kin_relation=this.krelation
                        var company_name=this.cname
                        var abn=this.abn
                        var title=this.title



                        if(this.role=='customer'){

                        axios.post('/api/customer-profile', {


                        first_name,
                        last_name,
                        email,
                        phone,
                        date_of_birth,

                        kin_fname,
                        kin_lname,
                        kin_email,
                        kin_phone,
                        kin_relation,

                }).then(response => {
                    if(response.data.message=='email_exists'){
                        this.existErr=true;
                        setTimeout(() => this.existErr=false, 5000);
                        this.pre_pro=true;
                    }
                    else if(response.data.message=='next_tab'){
                            this.funcTwo();
                                    }
                    else{
                        this.pre_pro=true;
                    //    $(".confirmation").fadeIn(300);
                    //    $(".confirmation").delay(3200).fadeOut(400);
                     if(this.file_pro)
                     {var base64 = this.getBase64(status);}
                     else{
                    this.progressUp();
                    this.showDismissibleAlert=true;
                     setTimeout(() => this.showDismissibleAlert=false, 5000);
                     this.pre_pro=true;
                     if(response.data.message=='profile_completed'){
                                        setTimeout(() => window.location.href = '/dashboard',3000);
                                    }

                                    }
                    //console.log('alert');
                    }
                }).catch(error => {
                            console.log(error);
                        });
                     }

                     else if(this.role=='business'){


                            axios.post('/api/business-profile', {


                        first_name,
                        last_name,
                        email,
                        phone,
                        date_of_birth,
                        title,
                        company_name,
                        abn,

                        //kfname,
                        //klname,
                       // kemail,
                       // kphone,
                        //krelation,

                }).then(response => {
                    if(response.data.message=='email_exists'){
                        this.existErr=true;
                        setTimeout(() => this.existErr=false, 5000);
                        this.pre_pro=true;
                    }
                    else if(response.data.message=='next_tab'){
                            this.funcTwo();
                                    }
                    else{
                        this.pre_pro=true;
                    this.saveMsg=null;
                    //    $(".confirmation").fadeIn(300);
                    //    $(".confirmation").delay(3200).fadeOut(400);
                     if(this.file_pro)
                     {var base64 = this.getBase64(status);}
                     else{
                    this.progressUp();
                    this.showDismissibleAlert=true;
                     setTimeout(() => this.showDismissibleAlert=false, 5000);
                     if(response.data.message=='profile_completed'){
                                        setTimeout(() => window.location.href = '/dashboard',3000);
                                    }

                     }
                    //console.log('alert');
                    }
                }).catch(error => {
                            console.log(error);
                        });


                     }
                      },

                      viewPasswordField(){
                          this.viewpasswodfield=true;
                          this.viewpasswodtext=false;
                      },

                      viewVerificationPhone(){
                          this.viewVerP=true;
                          this.viewVerPB=true;
                          this.viewVerPtag=false;
                      },

                      updatePassword()
                      {
                         var new_password = this.newpassword;
                         var check_renew = this.renewpassword;
                         var old_password = this.oldpassword;
                         var id=this.user_id
                         if(new_password != check_renew)
                         {
                             this.PasswordResultsErr="Password mismatch";
                             setTimeout(() => this.PasswordResultsErr="",5000);
                         }
                         else{
                                axios.post('/api/update-newpassword',{
                                        old_password,
                                        new_password,
                                    }).then(response => {
                                        if(response.data.message=='password_updated'){
                                            this.PasswordResults="Password updated";
                                            this.newpassword=null;
                                            this.renewpassword=null;
                                            this.oldpassword=null;
                                            setTimeout(() => this.viewpasswodfield=false,5000);
                                            setTimeout(() => this.viewpasswodtext=true,5000);
                                            setTimeout(() => this.PasswordResults="",5000);
                                        }
                                        if(response.data.message=='password_mismatch'){
                                            this.PasswordResultsErr="Incorrect old Password";
                                            setTimeout(() => this.PasswordResultsErr="",5000);
                                        }
                                    });
                         }
                      },


                      sendVerCode(){

                          var phone=this.phoneUpd;
                          this.enterCode=true;
                          this.sendbutton=true;
                          this.sendinput=true;
                          this.viewVerPB=false;
                          setTimeout(() => this.viewVerPB=true, 10000);
                          axios.post('/api/send-code',{
                                phone,
                            });
                      },

                      verifyCode(){
                          var verification_code=this.codeVer;
                          var phone=this.phoneUpd;
                          axios.post('/api/verify-code',{
                                phone,
                                verification_code,
                            }).then(response => {
                                    if(response.data.message=='Verified'){
                                        this.verificationResults='Verification Successful'
                                        setTimeout(() => this.verificationResults=null, 10000);
                                        this.phoneUpdate();
                                        setTimeout(() => this.revertBack(), 3000);
                                        this.saveMsg="Click Save To Update the Number";


                                    }
                                    else{
                                        this.verificationResultsErr='Verification Failed'
                                        setTimeout(() => this.verificationResults=null, 10000);
                                        setTimeout(() => this.revertBack(), 3000);
                                        this.saveMsgErr="Please refresh page and try again ";
                                    }
                            });
                      },

                      phoneUpdate(){
                          this.phone=this.phoneUpd;
                      },

                      revertBack(){
                        this.viewVerP=false;
                        this.viewVerPB=false;
                        //this.viewVerPtag=true;
                        this.enterCode=false;
                        this.active=false;
                      },




                    updateAddress(e){
                        e.preventDefault();
                        var id=this.user_id
                        var city=this.city;
                        var street=this.street;
                        var unit=this.unit;
                        var zip=this.zip;
                        var info=this.info;
                        var secondary_city=this.sec_city;
                        var secondary_street=this.sec_street;
                        var secondary_unit=this.sec_unit;
                        var secondary_zip=this.sec_zip;
                        var secondary_info=this.sec_info;
                        var secondary_check=this.sec_address_check
                            axios.post('/api/update-customer-address', {

                                city,
                                street,
                                unit,
                                zip,
                                info,
                                secondary_city,
                                secondary_street,
                                secondary_unit,
                                secondary_zip,
                                secondary_info,
                                secondary_check,


                            }).then(response => {
                    //    $(".confirmation").fadeIn(300);
                    //    $(".confirmation").delay(3200).fadeOut(400);
                    this.progressUp();
                    this.showDismissibleAlert1=true;
                    setTimeout(() => this.showDismissibleAlert1=false, 5000);
                    if(response.data.message=='profile_completed'){
                                        setTimeout(() => window.location.href = '/dashboard',3000);
                                    }
                         else if(response.data.message=='next_tab'){
                                this.funcThree();
                                    }

                    //showAlert();
                   // console.log('alert');

                });;

                    },


                    uploadID(){

                        // this.change_l_b=false;
                        // this.change_id=false;
                        this.getBase64(2);

                    },


                    purchase(){
                            //console.log(customerStripe1);
                            //var stripe = Stripe(this.keyToSet);
                            var ids=customerStripe1;
                        stripe.createToken(card).then(function(result) {
                        // Access the token with result.token
                        if (result.error) {
                                self.hasCardErrors = true;
                                self.$forceUpdate(); // Forcing the DOM to update so the Stripe Element can update.
                                return;
                                        }
                            else{


                                //console.log(this.authvarcustomerstripe);

                                //console.log(ids);
                                var token=result.token.id;
                                //console.log(id);
                                axios.post('/api/add-payment-method', {

                                token,


                                    }).then(response => {
                                                console.log(response.data);

                                                this.showDismissibleAlert2=true;
                                                setTimeout(() => this.showDismissibleAlert2=false, 5000);

                                                        });





                                                                }
                        }.bind(this))
                    },

                    countDownChanged(dismissCountDown) {
                                this.dismissCountDown = dismissCountDown
                            },
                    showAlert() {
                                this.dismissCountDown = this.dismissSecs
                            },

                    updateProgressBar(){
                        // console.log('ProgressBar function activated')
                        //this.progressUp();
                                if(this.authvarprofile1){

                                            if(this.authvarprofile2){

                                                        if(this.authvarprofile3){

                                                                    this.perc=100;
                                                                    //this.situation='success'
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






          },













 }

</script>


