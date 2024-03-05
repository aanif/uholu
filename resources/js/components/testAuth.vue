<template>

<div class="container">



<div class="row">
        <div class="col-lg-8 col-md-8">
        <div><h3 style="color:white"><b>Documents logged in</b></h3></div>

                <div class="row" v-on:click="makeactive(result.id,index)" v-for="(result,index) in results" :key="result.id"  v-bind:class="{active: result.isActive,packdiv: !result.isActive}"   v-if="result.catagory=='docs'" >

                        <!--<div class="col-1 radiodiv">
                            <label class="containeri" >
                                <input type="radio"  name="docs"  >
                                    <span class="checkmarki"></span>
                            </label>
                        </div>-->
                        <div class="col-1 radiodiv">
                            <div style="margin-top:23px;margin-left:2px;">
                                <div class="radioOutter">
                                        <div class="innerBefore" v-bind:class="{innerBefore: !result.isActive,innerAfter: result.isActive}"></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-4 lefty" >
                                <div class="upy"><p>Type</p></div>
                                <div class="downy"> <p> <b>{{result.plan_class}}</b></p></div>
                        </div>

                        <div class="col-4 righty">
                                <div class="upy"><p>Weight</p></div>
                                <div class="downy"> <p><b><!-- {{result.isActive}}-->{{result.quantity}} KG</b></p></div>
                        </div>

                        <div class="col-2 righty" >
                                <div class="upy"><p>Cost</p></div>
                                <div class="downy"> <p> <b>${{result.cost/100}}</b> </p></div>
                        </div>
                </div>

<!--////////////////////////////////////////////////////////////////////////////////////////////////////////////-->


                        <br>
                        <div><h3 style="color:white"><b>Keys</b></h3></div>
                        <div class="row" v-on:click="makeactive2(result.id,index)" v-for="(result,index) in results" :key="result.id"  v-bind:class="{active: result.isActive,packdiv: !result.isActive}" v-if="result.catagory=='keys'" >
                        <!--<div class="col-1 radiodiv">
                            <label class="containeri" >
                                <input type="radio"  name="keys" >
                                    <span class="checkmarki" ></span>
                            </label>
                        </div>-->

                        <div class="col-1 radiodiv">
                            <div style="margin-top:23px;margin-left:2px;">
                                <div class="radioOutter">
                                        <div class="innerBefore" v-bind:class="{innerBefore: !result.isActive,innerAfter: result.isActive}"></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-4 lefty" >
                            <div class="upy"><p>Type</p></div>
                            <div class="downy"> <p> <b>{{result.plan_class}}</b></p></div>
                        </div>

                        <div class="col-4 righty">
                                <div class="upy"><p>keys</p></div>
                                <div class="downy"> <p><b> {{result.quantity}}</b></p></div>
                        </div>

                        <div class="col-2 righty">
                                <div class="upy"><p>Cost</p></div>
                                <div class="downy"> <p> <b>${{result.cost/100}}</b></p></div>
                        </div>
                    </div>
                            </div>


        <div class="col-lg-4 col-md-4">
            <div class="packdiv2" v-if="docs_display==true||keys_display==true">
                <center><div><p style="color:#000000;font-size:15px;opacity:0.3;">You Selected</p></div></center>
                <div style="height:190px;">
                <div class="checkoutInner" v-if="docs_display">

                        <i class="fa fa-window-close" style="size:12px;float:right"  v-on:click="handleCloseDocs"></i>
                        <div style="width:0100%">
                        <table style=" border: 0px solid black;width:100%;height:80%">
                                <tr>
                                    <td valign="bottom"><p style="font-size:12px;color:0A0C12"> Documents</p></td>
                                    <td align="right" valign="bottom"><p style="font-size:12px;color:0A0C12;font-weight:600"><b> {{this.docs_class.quantity}} Kg</b></p></td>
                                </tr>

                                <tr>
                                    <td><p style="font-size:12px;color:0A0C12;font-weight:600"><b> {{this.docs_class.plan_class}}</b></p></td>
                                    <td align="right"><p style="font-size:12px;color:0A0C12"> {{this.docs_class.cost/100}} $/month</p></td>
                                </tr>
                        </table>
                        </div>








                        <!--<div class="row" style="height:50%">
                            <div class="col"> <p style="font-size:12px;color:0A0C12"> Documents</p></div>
                            <div class="col"> <p style="font-size:12px;color:0A0C12"><b> {{this.docs_class.quantity}} Kg</b></p></div>
                            <div class="col"><i class="fa fa-window-close" style="size:12px"  v-on:click="handleCloseDocs"></i></div>

                       </div>

                       <div class="row" style="height:50%">
                            <div class="col"> <p style="font-size:12px;color:0A0C12"><b> {{this.docs_class.plan_class}}</b></p></div>
                            <div class="col"> <p style="font-size:12px;color:0A0C12"> {{this.docs_class.cost/100}} $/month</p></div>
                       </div>-->

                </div>

                <div class="checkoutInner" v-if="keys_display">


                        <div style="width:0100%">
                        <i  class="fa fa-window-close" style="size:12px;float:right" v-on:click="handleCloseKeys"></i>

                        <table style=" border: 0px solid black;width:100%;height:80%">
                                <tr>
                                    <td valign="bottom"><p style="font-size:12px;color:0A0C12"> Keys</p></td>
                                    <td align="right" valign="bottom"><p style="font-size:12px;color:0A0C12;font-weight:600"><b> {{this.keys_class.quantity}} Kg</b></p></td>
                                </tr>

                                <tr>
                                    <td><p style="font-size:12px;color:0A0C12;font-weight:600"><b> {{this.keys_class.plan_class}}</b></p></td>
                                    <td align="right"><p style="font-size:12px;color:0A0C12"> {{this.keys_class.cost/100}} $/month</p></td>
                                </tr>
                        </table>
                        </div>




                       <!--<div class="row" style="height:50%">
                            <div class="col"> <p style="font-size:12px;color:0A0C12"> Keys</p></div>
                            <div class="col"> <p style="font-size:12px;color:0A0C12"><b> {{this.keys_class.quantity}} </b></p></div>
                           <div class="col"><i  class="fa fa-window-close" style="size:12px" v-on:click="handleCloseKeys"></i></div>
                       </div>

                       <div class="row" style="height:50%">
                            <div class="col"> <p style="font-size:12px;color:0A0C12"><b> {{this.keys_class.plan_class}}</b></p></div>
                            <div class="col"> <p style="font-size:12px;color:0A0C12"> {{this.keys_class.cost/100}} $/month</p></div>
                       </div>-->


                </div>

                </div>

                <div class="checkoutsum" style="margin-bottom:0px;">
                        <center><p style="margin-bottom:0px;">Total Investment</p></center>
                </div>
                <div class="checkoutsum" style="margin-top:0px;">

                        <center>
                        <span style="margin-top:-20px"><h4 style="display:inline;"><b>${{(this.keySum+this.docSum)/100}}</b></h4><h6 style="display:inline;">/month</h6></span>
                        </center>


                        </div>
                <br>
                <center>

                <button v-on:click="storeSession" class="btn btn-primary" type="button">
                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true" style="display:none"></span>
                Confirm
                </button>



                <!--<button v-on:click="storeSession" class="btn btn-primary" width="20px" height="10px" ><span style="color:white">Confirm</span></button>-->
                </center>

            </div>
        </div>
</div>
</div>


</template>

<script>
var flag;
var mk;
var docs_display;
var keys_display;
var displayy;
var docs_class;
var keys_class;
var active_docs;
var active_keys;
var check_counter;

// var result;


    export default {




        data(){

            return{
            results: [],
            docs_display:false,
            keys_display:false,
            flag:false,
            displayy:true,
            docs_class:"",
            radioFlag:true,
            docSum:0,
            keySum:0,

            }
        },
        mounted() {




            //console.log('Component mounted.')

            axios.get('/api/planView').then(response => {
                            this.results = response.data
                            //console.log(this.results)
                            this.results.forEach(function(value, key) {
                                    //console.log(value);
                                    this.results[key]['isActive']=false
                             }.bind(this));
                // console.log(this.results);



                })


            },
            //

            methods: {
                makeactive(resulti,index){
                    //console.log(index)
                    this.results.forEach(function(value, key){
                         if(this.results[key].catagory=='docs'){
                             //console.log(this.results[key].catagory)
                                if(resulti==this.results[key].id){
                                //console.log(this.results[key].id)
                                    this.results[key]['isActive']=true
                                    this.active_docs=key
                                    //console.log('active doc'+this.active_docs);
                                    //console.log('if')
                                    this.docs_display=true
                                    this.docs_class=this.results[key]
                                    this.docSum=this.results[key].cost
                                    //console.log(docs_class)
                                    this.$set(this.results, key, this.results[key])
                                                        }
                                else
                                    {this.results[key]['isActive']=false
                                    //console.log('else')
                                    }}
                    }.bind(this));
                   //console.log(this.results);
                   },






                makeactive2(resulti,index){
                    this.results.forEach(function(value, key){
                        if(this.results[key].catagory=='keys'){
                                if(resulti==this.results[key].id){
                                        this.results[key]['isActive']=true
                                        this.active_keys=key
                                        this.keys_display=true
                                        this.keys_class=this.results[key]
                                        this.keySum=this.results[key].cost
                                        this.$set(this.results, key, this.results[key])
                                         }
                                else
                                        {this.results[key]['isActive']=false
                                        }}
                    }.bind(this));
                // Vue.set(this.results, null, this.results)

                   //console.log(this.results);
                   },


                handleCloseDocs(){

                        this.docs_display=false;
                        //console.log(this.active_docs)
                        this.results[this.active_docs]['isActive']=false
                        this.active_docs=null;
                        this.docSum=0;
                        //console.log('active doc'+this.active_docs);
                        //console.log(this.results[this.active_docs]['isActive'])

                },



                 handleCloseKeys(){

                        this.keys_display=false;
                        //console.log(this.active_keys)
                        this.results[this.active_keys]['isActive']=false
                        this.active_keys=null;
                        this.keySum=0;
                        //console.log('active key'+this.active_keys);
                        //console.log(this.results[this.active_keys]['isActive'])


                },


                storeSession(){

                        //console.log(this.results[this.active_keys].quantity)
                        //console.log(this.results[this.active_docs].quantity)
                       // console.log(this.results[this.active_keys].stripe_plan)
                       // console.log(this.results[this.active_docs].stripe_plan)
                        $(".spinner-border").css("display", "inline-block");
                            $("#card-button").attr("disabled", true);

                        if(!this.results[this.active_docs]){
                            var docs_id= null
                            var docs_quantity= null
                            var keys_id= this.results[this.active_keys].stripe_plan
                            var keys_quantity= this.results[this.active_keys].quantity
                            //this.docSum=0;
                            //this.keySum

                        }

                        else if(!this.results[this.active_keys]){
                            var docs_id= this.results[this.active_docs].stripe_plan
                            var docs_quantity= this.results[this.active_docs].quantity
                            var keys_id= null
                            var keys_quantity= null

                        }

                        else{
                            var docs_id= this.results[this.active_docs].stripe_plan
                            var docs_quantity= this.results[this.active_docs].quantity
                            var keys_id= this.results[this.active_keys].stripe_plan
                            var keys_quantity= this.results[this.active_keys].quantity

                        }

                        // console.log(docs_id)
                        // console.log(docs_quantity)
                        // console.log(keys_id)
                        // console.log(keys_quantity)




                        axios.post('/api/storesession', {

                        docs_id,
                        docs_quantity,
                        keys_id,
                        keys_quantity,

                })

                .then(function (response) {

                        //currentObj.output = response.data;
                        //console.log('Success')
                        window.location.href = '/payment';
                        // axios.get('/api/getsession').then(response => {
                        //     console.log(response.data[0]);

                        // });

                })

                .catch(function (error) {

                        //currentObj.output = error;
                        console.log(error)

                });

                }





        },








    }

</script>
