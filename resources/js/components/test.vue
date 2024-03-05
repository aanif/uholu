<template>

<div class="container">





<div class="packdiv" v-if="notificationBar" style="width:66%;margin-left:-20px;background-color:#FCD206;border:1px solid #FCD206;padding-top=10px;height:40px"> <h6 style="color:white;margin:auto"><center><b>Please choose a package before signing up</b></center></h6> </div>
<div class="packdiv" style="width:66%;margin-left:-20px;padding-top:0px">

            <table class="" style="width:100%">
                <tr align="center">
                    <td style="padding-top: 22px;padding-bottom:23px" v-bind:class="{activeNav: clicked}" v-on:click="toggletypeper"><span><a href="#!" style="color:#C2C2C2" v-bind:class="{onButton: clicked}" v-on:click="toggletypeper"><span v-bind:class="{blacken: !clicked}"><b>Personal Packages</b></span></a></span></td>
                    <td style="padding-top: 22px;padding-bottom:23px" v-bind:class="{activeNav: !clicked}" v-on:click="toggletypebus"><span><a href="#!" style="color:#C2C2C2" v-bind:class="{onButton: !clicked}" v-on:click="toggletypebus"><span v-bind:class="{blacken: clicked}"><b>Business Packages</b></span></a></span></td>
                </tr>
            </table>

</div>

<!--
<div class="row">
    <div class="col-4">
    </div>
    <div class="col">
        <div class="tog" >
        <p style="display:inline">Monthly Packages</p>
        <label class="switch">
        <input type="checkbox">
        <span class="slider round" v-on:click="togButton"></span>
        </label>
        <p style="display:inline">Yearly Packages</p>
        </div>
    </div>
</div>
-->
<div class="row">
        <div class="col-lg-8 col-md-8">
        <div><h3 style="color:white"><b>Documents Storage</b></h3></div>




<div v-if="yearly">
<div v-if="personal">
                <div class="row" v-on:click="makeactive4(result.id,index)" v-for="(result,index) in results" :key="result.id"  v-bind:class="{activedivi: result.isActive,packdiv: !result.isActive}"   v-if="result.catagory=='docs yearly'" >

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
                                <div class="upy"><p>QTY</p></div>
                                <div class="downy"> <p><b><!-- {{result.isActive}}-->{{result.quantity}} KG</b></p></div>
                        </div>

                        <div class="col-2 righty" >
                                <div class="upy"><p>Cost</p></div>
                                <div class="downy"> <p> <b>${{result.cost/100}}/year</b> </p></div>
                        </div>
                </div>

</div>





<div v-if="business">

                <div class="row" v-on:click="makeactive5(result.id,index)" v-for="(result,index) in results" :key="result.id"  v-bind:class="{activedivi: result.isActive,packdiv: !result.isActive}"   v-if="result.catagory=='docs business yearly'" >

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
                                <div class="upy"><p>QTY</p></div>
                                <div class="downy"> <p><b><!-- {{result.isActive}}-->{{result.quantity}} KG</b></p></div>
                        </div>

                        <div class="col-2 righty" >
                                <div class="upy"><p>Cost</p></div>
                                <div class="downy"> <p> <b>${{result.cost/100}}/year</b> </p></div>
                        </div>
                </div>
</div>

</div>





<div v-if="monthly">
<div v-if="personal">
                <div class="row" v-on:click="makeactive(result.id,index)" v-for="(result,index) in results" :key="result.id"  v-bind:class="{activedivi: result.isActive,packdiv: !result.isActive}"   v-if="result.catagory=='docs'" >

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
                                <div class="upy"><p>QTY</p></div>
                                <div class="downy"> <p><b><!-- {{result.isActive}}-->{{result.quantity}} KG</b></p></div>
                        </div>

                        <div class="col-2 righty" >
                                <div class="upy"><p>Cost</p></div>
                                <div class="downy"> <p> <b>${{result.cost/100}}/month</b> </p></div>
                        </div>
                </div>

</div>





<div v-if="business">

                <div class="row" v-on:click="makeactive1(result.id,index)" v-for="(result,index) in results" :key="result.id"  v-bind:class="{activedivi: result.isActive,packdiv: !result.isActive}"   v-if="result.catagory=='docs business'" >

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

                        <div v-if="result.quantity<100" class="col-4 righty">
                                <div class="upy"><p>QTY</p></div>
                                <div class="downy"> <p><b><!-- {{result.isActive}}-->{{result.quantity}} KG</b></p></div>
                        </div>

                        <div v-if="result.quantity>=100" class="col-4 righty">
                                <div class="upy"><p>QTY</p></div>






                                <div class="downy"> <select v-model="result.quantity" class="form-control" style="width:150px;height:40px;margin-top:-10px">
                                                                                <option  value="100">100</option>
                                                                                <option  value="200">200</option>
                                                                                <option  value="400">400</option>
                                                                                <option  value="600">600</option>
                                                                                <option  value="800">800</option>
                                                                                <option  value="1000">1000</option>
                                                                            </select>
                                                                            </div>
                        </div>

                        <div v-if="result.quantity<100" class="col-2 righty" >
                                <div class="upy"><p>Cost</p></div>
                                <div class="downy"> <p> <b>${{result.cost/100}}/month</b> </p></div>
                        </div>
                        <div v-if="result.quantity==100" class="col-2 righty" >
                                <div class="upy"><p>Cost</p></div>
                                <div class="downy"> <p> <b>${{(result.cost/100)*(result.quantity/100)}}/month</b> </p></div>
                        </div>
                        <div v-if="result.quantity==200" class="col-2 righty" >
                                <div class="upy"><p>Cost</p></div>
                                <div class="downy"> <p> <b>$999/month</b> </p></div>
                        </div>
                        <div v-if="result.quantity==400" class="col-2 righty" >
                                <div class="upy"><p>Cost</p></div>
                                <div class="downy"> <p> <b>$1999/month</b> </p></div>
                        </div>
                        <div v-if="result.quantity==600" class="col-2 righty" >
                                <div class="upy"><p>Cost</p></div>
                                <div class="downy"> <p> <b>$2999/month</b> </p></div>
                        </div>
                        <div v-if="result.quantity==800" class="col-2 righty" >
                                <div class="upy"><p>Cost</p></div>
                                <div class="downy"> <p> <b>$3999/month</b> </p></div>
                        </div>
                        <div v-if="result.quantity==1000" class="col-2 righty" >
                                <div class="upy"><p>Cost</p></div>
                                <div class="downy"> <p> <b>$4999/month</b> </p></div>
                        </div>
                </div>
</div>
</div>
<!--////////////////////////////////////////////////////////////////////////////////////////////////////////////-->


                        <br>
                        <div><h3 style="color:white"><b>Keys Storage</b></h3></div>



<div v-if="yearly">
<div v-if="personal">
                        <div class="row" v-on:click="makeactive6(result.id,index)" v-for="(result,index) in results" :key="result.id"  v-bind:class="{activedivi: result.isActive,packdiv: !result.isActive}" v-if="result.catagory=='keys yearly'" >
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
                                <div class="downy"> <p> <b>${{result.cost/100}}/year</b></p></div>
                        </div>
                    </div>
</div>


<div v-if="business">
                    <div class="row" v-on:click="makeactive7(result.id,index)" v-for="(result,index) in results" :key="result.id"  v-bind:class="{activedivi: result.isActive,packdiv: !result.isActive}" v-if="result.catagory=='keys business yearly'" >
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
                                <div class="downy"> <p> <b>${{result.cost/100}}/year</b></p></div>
                        </div>
                    </div>
</div>
</div>






<div v-if="monthly">
<div v-if="personal">
                        <div class="row" v-on:click="makeactive2(result.id,index)" v-for="(result,index) in results" :key="result.id"  v-bind:class="{activedivi: result.isActive,packdiv: !result.isActive}" v-if="result.catagory=='keys'" >
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
                                <div class="downy"> <p> <b>${{result.cost/100}}/month</b></p></div>
                        </div>
                    </div>
</div>


<div v-if="business">
                    <div class="row" v-on:click="makeactive3(result.id,index)" v-for="(result,index) in results" :key="result.id"  v-bind:class="{activedivi: result.isActive,packdiv: !result.isActive}" v-if="result.catagory=='keys business'" >
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

                        <div v-if="result.quantity<100" class="col-4 righty">
                                <div class="upy"><p>keys</p></div>
                                <div class="downy"> <p><b> {{result.quantity}}</b></p></div>
                        </div>
                        <div v-if="result.quantity>=100" class="col-4 righty">
                                <div class="upy"><p>keys</p></div>
                                <div class="downy"> <select v-model="result.quantity" class="form-control" style="width:150px;height:40px;margin-top:-10px">
                                                                                <option  value="100">100</option>
                                                                                <option  value="200">200</option>
                                                                                <option  value="400">400</option>
                                                                                <option  value="600">600</option>
                                                                                <option  value="800">800</option>
                                                                                <option  value="1000">1000</option>
                                                                            </select></div>
                        </div>

                        <div v-if="result.quantity<100" class="col-2 righty">
                                <div class="upy"><p>Cost</p></div>
                                <div class="downy"> <p> <b>${{result.cost/100}}/month</b></p></div>
                        </div>
                        <div v-if="result.quantity==100" class="col-2 righty">
                                <div class="upy"><p>Cost</p></div>
                                <div class="downy"> <p> <b>${{((result.cost/100)*(result.quantity/100))}}/month</b></p></div>
                        </div>
                        <div v-if="result.quantity==200" class="col-2 righty">
                                <div class="upy"><p>Cost</p></div>
                                <div class="downy"> <p> <b>$699/month</b></p></div>
                        </div>
                        <div v-if="result.quantity==400" class="col-2 righty">
                                <div class="upy"><p>Cost</p></div>
                                <div class="downy"> <p> <b>$1399/month</b></p></div>
                        </div>
                        <div v-if="result.quantity==600" class="col-2 righty">
                                <div class="upy"><p>Cost</p></div>
                                <div class="downy"> <p> <b>$2099/month</b></p></div>
                        </div>
                        <div v-if="result.quantity==800" class="col-2 righty">
                                <div class="upy"><p>Cost</p></div>
                                <div class="downy"> <p> <b>$2799/month</b></p></div>
                        </div>
                        <div v-if="result.quantity==1000" class="col-2 righty">
                                <div class="upy"><p>Cost</p></div>
                                <div class="downy"> <p> <b>$3499/month</b></p></div>
                        </div>
                    </div>
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
                                    <td align="right" valign="bottom"><p style="font-size:12px;color:0A0C12;font-weight:600"><b> {{this.docs_class.quantity}} KG</b></p></td>
                                </tr>

                                <tr>
                                    <td><p style="font-size:12px;color:0A0C12;font-weight:600"><b> {{this.docs_class.plan_class}}</b></p></td>
                                    <td align="right" v-if="this.docs_class.quantity<100"><p style="font-size:12px;color:0A0C12"> {{this.docs_class.cost/100}} $/month</p></td>
                                    <td align="right" v-if="this.docs_class.quantity==100"><p style="font-size:12px;color:0A0C12"> {{(this.docs_class.cost/100)*(this.docs_class.quantity/100)}} $/month</p></td>
                                    <td align="right" v-if="this.docs_class.quantity==200"><p style="font-size:12px;color:0A0C12"> 999 $/month</p></td>
                                    <td align="right" v-if="this.docs_class.quantity==400"><p style="font-size:12px;color:0A0C12"> 1999 $/month</p></td>
                                    <td align="right" v-if="this.docs_class.quantity==600"><p style="font-size:12px;color:0A0C12"> 2999 $/month</p></td>
                                    <td align="right" v-if="this.docs_class.quantity==800"><p style="font-size:12px;color:0A0C12"> 3999 $/month</p></td>
                                    <td align="right" v-if="this.docs_class.quantity==1000"><p style="font-size:12px;color:0A0C12"> 4999 $/month</p></td>
                                </tr>
                        </table>
                        </div>








                        <!--<div class="row" style="height:50%">
                            <div class="col"> <p style="font-size:12px;color:0A0C12"> Documents</p></div>
                            <div class="col"> <p style="font-size:12px;color:0A0C12"><b> {{this.docs_class.quantity}} Documents</b></p></div>
                            <div class="col"><i class="fa fa-window-close" style="size:12px"  v-on:click="handleCloseDocs"></i></div>

                       </div>

                       <div class="row" style="height:50%">
                            <div class="col"> <p style="font-size:12px;color:0A0C12"><b> {{this.docs_class.plan_class}}</b></p></div>
                            <div class="col"> <p style="font-size:12px;color:0A0C12"> {{this.docs_class.cost/100}} $/month</p></div>
                       </div>-->

                </div>

                <div class="checkoutInner" v-if="keys_display">


                        <div style="width:100%">
                        <i  class="fa fa-window-close" style="size:12px;float:right" v-on:click="handleCloseKeys"></i>

                        <table style=" border: 0px solid black;width:100%;height:80%">
                                <tr>
                                    <td valign="bottom"><p style="font-size:12px;color:0A0C12"> Keys</p></td>
                                    <td align="right" valign="bottom"><p style="font-size:12px;color:0A0C12;font-weight:600"><b> {{this.keys_class.quantity}} Key/s</b></p></td>
                                </tr>

                                <tr>
                                    <td><p style="font-size:12px;color:0A0C12;font-weight:600"><b> {{this.keys_class.plan_class}}</b></p></td>
                                    <td align="right" v-if="this.keys_class.quantity<100"><p style="font-size:12px;color:0A0C12"> {{this.keys_class.cost/100}} $/month</p></td>
                                    <td align="right" v-if="this.keys_class.quantity==100"><p style="font-size:12px;color:0A0C12"> {{(this.keys_class.cost/100)*(this.keys_class.quantity/100)}} $/month</p></td>
                                    <td align="right" v-if="this.keys_class.quantity==200"><p style="font-size:12px;color:0A0C12"> 699 $/month</p></td>
                                    <td align="right" v-if="this.keys_class.quantity==400"><p style="font-size:12px;color:0A0C12"> 1399 $/month</p></td>
                                    <td align="right" v-if="this.keys_class.quantity==600"><p style="font-size:12px;color:0A0C12"> 2099 $/month</p></td>
                                    <td align="right" v-if="this.keys_class.quantity==800"><p style="font-size:12px;color:0A0C12"> 2799 $/month</p></td>
                                    <td align="right" v-if="this.keys_class.quantity==1000"><p style="font-size:12px;color:0A0C12"> 3499 $/month</p></td>
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

                <!--<div class="checkoutsum" style="margin-bottom:0px;">
                        <center><p style="margin-bottom:0px;">Total Investment</p></center>
                </div>
                <div class="checkoutsum" style="margin-top:0px;">

                        <center>
                        <span style="margin-top:-20px" v-if="this.keyQuan<100 && this.docQuan<100"><h4 style="display:inline;"><b>${{(this.keySum+this.docSum)/100}}</b></h4><h6 style="display:inline;"><span v-if="monthly">/month</span><span  v-if="yearly">/year</span></h6></span>
                        <span style="margin-top:-20px" v-if="this.keyQuan>=100 && this.docQuan<100"><h4 style="display:inline;"><b>${{(this.keySum*(this.keyQuan/100)+this.docSum)/100}}</b></h4><h6 style="display:inline;"><span v-if="monthly">/month</span><span  v-if="yearly">/year</span></h6></span>
                        <span style="margin-top:-20px" v-if="this.keyQuan<100 && this.docQuan>=100"><h4 style="display:inline;"><b>${{(this.keySum+this.docSum*(this.docQuan/100))/100}}</b></h4><h6 style="display:inline;"><span v-if="monthly">/month</span><span  v-if="yearly">/year</span></h6></span>
                        <span style="margin-top:-20px"  v-if="this.keyQuan==100 && this.docQuan==100"><h4 style="display:inline;"><b>${{(this.keySum*(this.keyQuan/100)+this.docSum*(this.docQuan/100))/100}}</b></h4><h6 style="display:inline;"><span v-if="monthly">/month</span><span  v-if="yearly">/year</span></h6></span>



                        <span style="margin-top:-20px"  v-if="this.keyQuan==100 && this.docQuan==200"><h4 style="display:inline;"> 1458 </h4><h6 style="display:inline;"><span v-if="monthly">/month</span><span  v-if="yearly">/year</span></h6></span>
                        <span style="margin-top:-20px"  v-if="this.keyQuan==100 && this.docQuan==400"><h4 style="display:inline;"> 2458 </h4><h6 style="display:inline;"><span v-if="monthly">/month</span><span  v-if="yearly">/year</span></h6></span>
                        <span style="margin-top:-20px"  v-if="this.keyQuan==100 && this.docQuan==600"><h4 style="display:inline;"> 3458 </h4><h6 style="display:inline;"><span v-if="monthly">/month</span><span  v-if="yearly">/year</span></h6></span>
                        <span style="margin-top:-20px"  v-if="this.keyQuan==100 && this.docQuan==800"><h4 style="display:inline;"> 4458 </h4><h6 style="display:inline;"><span v-if="monthly">/month</span><span  v-if="yearly">/year</span></h6></span>
                        <span style="margin-top:-20px"  v-if="this.keyQuan==100 && this.docQuan==1000"><h4 style="display:inline;"> 5458 </h4><h6 style="display:inline;"><span v-if="monthly">/month</span><span  v-if="yearly">/year</span></h6></span>
                        <span style="margin-top:-20px"  v-if="this.keyQuan==200 && this.docQuan==100"><h4 style="display:inline;"> 1198 </h4><h6 style="display:inline;"><span v-if="monthly">/month</span><span  v-if="yearly">/year</span></h6></span>
                        <span style="margin-top:-20px"  v-if="this.keyQuan==200 && this.docQuan==200"><h4 style="display:inline;"> 1698 </h4><h6 style="display:inline;"><span v-if="monthly">/month</span><span  v-if="yearly">/year</span></h6></span>
                        <span style="margin-top:-20px"  v-if="this.keyQuan==200 && this.docQuan==400"><h4 style="display:inline;"> 2698 </h4><h6 style="display:inline;"><span v-if="monthly">/month</span><span  v-if="yearly">/year</span></h6></span>
                        <span style="margin-top:-20px"  v-if="this.keyQuan==200 && this.docQuan==600"><h4 style="display:inline;"> 3698 </h4><h6 style="display:inline;"><span v-if="monthly">/month</span><span  v-if="yearly">/year</span></h6></span>
                        <span style="margin-top:-20px"  v-if="this.keyQuan==200 && this.docQuan==800"><h4 style="display:inline;"> 4598 </h4><h6 style="display:inline;"><span v-if="monthly">/month</span><span  v-if="yearly">/year</span></h6></span>
                        <span style="margin-top:-20px"  v-if="this.keyQuan==200 && this.docQuan==1000"><h4 style="display:inline;"> 5698 </h4><h6 style="display:inline;"><span v-if="monthly">/month</span><span  v-if="yearly">/year</span></h6></span>
                        <span style="margin-top:-20px"  v-if="this.keyQuan==400 && this.docQuan==100"><h4 style="display:inline;"> 1898 </h4><h6 style="display:inline;"><span v-if="monthly">/month</span><span  v-if="yearly">/year</span></h6></span>
                        <span style="margin-top:-20px"  v-if="this.keyQuan==400 && this.docQuan==200"><h4 style="display:inline;"> 2398 </h4><h6 style="display:inline;"><span v-if="monthly">/month</span><span  v-if="yearly">/year</span></h6></span>
                        <span style="margin-top:-20px"  v-if="this.keyQuan==400 && this.docQuan==400"><h4 style="display:inline;"> 3398 </h4><h6 style="display:inline;"><span v-if="monthly">/month</span><span  v-if="yearly">/year</span></h6></span>
                        <span style="margin-top:-20px"  v-if="this.keyQuan==400 && this.docQuan==600"><h4 style="display:inline;"> 4398 </h4><h6 style="display:inline;"><span v-if="monthly">/month</span><span  v-if="yearly">/year</span></h6></span>
                        <span style="margin-top:-20px"  v-if="this.keyQuan==400 && this.docQuan==800"><h4 style="display:inline;"> 5398 </h4><h6 style="display:inline;"><span v-if="monthly">/month</span><span  v-if="yearly">/year</span></h6></span>
                        <span style="margin-top:-20px"  v-if="this.keyQuan==400 && this.docQuan==1000"><h4 style="display:inline;"> 6398 </h4><h6 style="display:inline;"><span v-if="monthly">/month</span><span  v-if="yearly">/year</span></h6></span>
                        <span style="margin-top:-20px"  v-if="this.keyQuan==600 && this.docQuan==100"><h4 style="display:inline;"> 2598 </h4><h6 style="display:inline;"><span v-if="monthly">/month</span><span  v-if="yearly">/year</span></h6></span>
                        <span style="margin-top:-20px"  v-if="this.keyQuan==600 && this.docQuan==200"><h4 style="display:inline;"> 3098 </h4><h6 style="display:inline;"><span v-if="monthly">/month</span><span  v-if="yearly">/year</span></h6></span>
                        <span style="margin-top:-20px"  v-if="this.keyQuan==600 && this.docQuan==400"><h4 style="display:inline;"> 4098 </h4><h6 style="display:inline;"><span v-if="monthly">/month</span><span  v-if="yearly">/year</span></h6></span>
                        <span style="margin-top:-20px"  v-if="this.keyQuan==600 && this.docQuan==600"><h4 style="display:inline;"> 5098 </h4><h6 style="display:inline;"><span v-if="monthly">/month</span><span  v-if="yearly">/year</span></h6></span>
                        <span style="margin-top:-20px"  v-if="this.keyQuan==600 && this.docQuan==800"><h4 style="display:inline;"> 6098 </h4><h6 style="display:inline;"><span v-if="monthly">/month</span><span  v-if="yearly">/year</span></h6></span>
                        <span style="margin-top:-20px"  v-if="this.keyQuan==600 && this.docQuan==1000"><h4 style="display:inline;"> 7098 </h4><h6 style="display:inline;"><span v-if="monthly">/month</span><span  v-if="yearly">/year</span></h6></span>
                        <span style="margin-top:-20px"  v-if="this.keyQuan==800 && this.docQuan==100"><h4 style="display:inline;"> 3298 </h4><h6 style="display:inline;"><span v-if="monthly">/month</span><span  v-if="yearly">/year</span></h6></span>
                        <span style="margin-top:-20px"  v-if="this.keyQuan==800 && this.docQuan==200"><h4 style="display:inline;"> 3798 </h4><h6 style="display:inline;"><span v-if="monthly">/month</span><span  v-if="yearly">/year</span></h6></span>
                        <span style="margin-top:-20px"  v-if="this.keyQuan==800 && this.docQuan==400"><h4 style="display:inline;"> 4798 </h4><h6 style="display:inline;"><span v-if="monthly">/month</span><span  v-if="yearly">/year</span></h6></span>
                        <span style="margin-top:-20px"  v-if="this.keyQuan==800 && this.docQuan==600"><h4 style="display:inline;"> 5798 </h4><h6 style="display:inline;"><span v-if="monthly">/month</span><span  v-if="yearly">/year</span></h6></span>
                        <span style="margin-top:-20px"  v-if="this.keyQuan==800 && this.docQuan==800"><h4 style="display:inline;"> 6798 </h4><h6 style="display:inline;"><span v-if="monthly">/month</span><span  v-if="yearly">/year</span></h6></span>
                        <span style="margin-top:-20px"  v-if="this.keyQuan==800 && this.docQuan==1000"><h4 style="display:inline;"> 7798 </h4><h6 style="display:inline;"><span v-if="monthly">/month</span><span  v-if="yearly">/year</span></h6></span>
                        <span style="margin-top:-20px"  v-if="this.keyQuan==1000 && this.docQuan==100"><h4 style="display:inline;"> 3998 </h4><h6 style="display:inline;"><span v-if="monthly">/month</span><span  v-if="yearly">/year</span></h6></span>
                        <span style="margin-top:-20px"  v-if="this.keyQuan==1000 && this.docQuan==200"><h4 style="display:inline;"> 4498 </h4><h6 style="display:inline;"><span v-if="monthly">/month</span><span  v-if="yearly">/year</span></h6></span>
                        <span style="margin-top:-20px"  v-if="this.keyQuan==1000 && this.docQuan==400"><h4 style="display:inline;"> 5498 </h4><h6 style="display:inline;"><span v-if="monthly">/month</span><span  v-if="yearly">/year</span></h6></span>
                        <span style="margin-top:-20px"  v-if="this.keyQuan==1000 && this.docQuan==600"><h4 style="display:inline;"> 6498 </h4><h6 style="display:inline;"><span v-if="monthly">/month</span><span  v-if="yearly">/year</span></h6></span>
                        <span style="margin-top:-20px"  v-if="this.keyQuan==1000 && this.docQuan==800"><h4 style="display:inline;"> 7498 </h4><h6 style="display:inline;"><span v-if="monthly">/month</span><span  v-if="yearly">/year</span></h6></span>
                        <span style="margin-top:-20px"  v-if="this.keyQuan==1000 && this.docQuan==1000"><h4 style="display:inline;"> 8498 </h4><h6 style="display:inline;"><span v-if="monthly">/month</span><span  v-if="yearly">/year</span></h6></span>





                        </center>


                        </div>-->
                <br>
                <center>

                <button v-on:click="storeSession" class="btn btn-primary" type="button" style="color:black;border-color:#FCD206;background-color:#FCD206;display:;margin:auto">
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


        props: [
            'logged',
        ],

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
            docQuan:0,
            keySum:0,
            keyQuan:0,
            personal:true,
            business:false,
            type:null,
            clicked:true,
            monthly:false,
            yearly:true,
            notificationBar:false,

            }
        },
        mounted() {

            const urlParams = new URLSearchParams(window.location.search);
            const myParam = urlParams.get('type');
            const myParam1 = urlParams.get('noti');
            //console.log(myParam1)
            //console.log(myParam);
            if(myParam1=='package'){
                this.notificationBar=true;
                setTimeout(() => this.notificationBar=false, 4000);


            }
            if(myParam=='personal'){
                this.toggletypeper();
            }
            else if(myParam=='business'){
                this.toggletypebus();
            }
            //this.mountedFunction();

            //console.log(this.logged);

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


                mountedFunction(){
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

                togButton(){
                    this.monthly=!this.monthly;
                    this.yearly=!this.yearly;



                    //this.clicked=true;
                       //this.personal=true;
                        //this.business=false;
                           // console.log('true');
                       axios.get('/api/planView').then(response => {
                            this.results = response.data
                            //console.log(this.results)
                            this.results.forEach(function(value, key) {
                                    //console.log(value);
                                    this.results[key]['isActive']=false
                             }.bind(this));
                // console.log(this.results);


                            this.docs_class=null;
                            this.keys_class=null;
                            this.handleCloseDocs();
                            this.handleCloseKeys();



                })

                },

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
                                    this.docQuan=this.results[key].quantity
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

                   makeactive1(resulti,index){
                    //console.log(index)
                    this.results.forEach(function(value, key){
                         if(this.results[key].catagory=='docs business'){
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
                                    this.docQuan=this.results[key].quantity
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
                                        this.keyQuan=this.results[key].quantity;
                                        this.$set(this.results, key, this.results[key])
                                         }
                                else
                                        {this.results[key]['isActive']=false
                                        }}
                    }.bind(this));
                // Vue.set(this.results, null, this.results)

                   //console.log(this.results);
                   },

                   makeactive3(resulti,index){
                    this.results.forEach(function(value, key){
                        if(this.results[key].catagory=='keys business'){
                                if(resulti==this.results[key].id){
                                        this.results[key]['isActive']=true
                                        this.active_keys=key
                                        this.keys_display=true
                                        this.keys_class=this.results[key]
                                        this.keySum=this.results[key].cost
                                        this.keyQuan=this.results[key].quantity
                                        this.$set(this.results, key, this.results[key])
                                         }
                                else
                                        {this.results[key]['isActive']=false
                                        }}
                    }.bind(this));
                // Vue.set(this.results, null, this.results)

                   //console.log(this.results);
                   },


//----------------------------------------------------------------------------------------------
                    makeactive4(resulti,index){
                     this.results.forEach(function(value, key){
                        if(this.results[key].catagory=='docs yearly'){
                                if(resulti==this.results[key].id){
                                //console.log(this.results[key].id)
                                    this.results[key]['isActive']=true
                                    this.active_docs=key
                                    //console.log('active doc'+this.active_docs);
                                    //console.log('if')
                                    this.docs_display=true
                                    this.docs_class=this.results[key]
                                    this.docSum=this.results[key].cost
                                    this.docQuan=this.results[key].quantity
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


                   makeactive5(resulti,index){
                    this.results.forEach(function(value, key){
                        if(this.results[key].catagory=='docs business yearly'){
                                if(resulti==this.results[key].id){
                                //console.log(this.results[key].id)
                                    this.results[key]['isActive']=true
                                    this.active_docs=key
                                    //console.log('active doc'+this.active_docs);
                                    //console.log('if')
                                    this.docs_display=true
                                    this.docs_class=this.results[key]
                                    this.docSum=this.results[key].cost
                                    this.docQuan=this.results[key].quantity
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


                   makeactive6(resulti,index){
                    this.results.forEach(function(value, key){
                        if(this.results[key].catagory=='keys yearly'){
                                if(resulti==this.results[key].id){
                                        this.results[key]['isActive']=true
                                        this.active_keys=key
                                        this.keys_display=true
                                        this.keys_class=this.results[key]
                                        this.keySum=this.results[key].cost
                                        this.keyQuan=this.results[key].quantity
                                        this.$set(this.results, key, this.results[key])
                                         }
                                else
                                        {this.results[key]['isActive']=false
                                        }}
                    }.bind(this));
                // Vue.set(this.results, null, this.results)

                   //console.log(this.results);
                   },


                   makeactive7(resulti,index){
                    this.results.forEach(function(value, key){
                        if(this.results[key].catagory=='keys business yearly'){
                                if(resulti==this.results[key].id){
                                        this.results[key]['isActive']=true
                                        this.active_keys=key
                                        this.keys_display=true
                                        this.keys_class=this.results[key]
                                        this.keySum=this.results[key].cost
                                        this.keyQuan=this.results[key].quantity
                                        this.$set(this.results, key, this.results[key])
                                         }
                                else
                                        {this.results[key]['isActive']=false
                                        }}
                    }.bind(this));
                // Vue.set(this.results, null, this.results)

                   //console.log(this.results);
                   },



                   toggletypeper(){
                       this.clicked=true;
                       this.personal=true;
                       this.yearly=true;
                       this.monthly=false;
                        this.business=false;
                           // console.log('true');
                       axios.get('/api/planView').then(response => {
                            this.results = response.data
                            //console.log(this.results)
                            this.results.forEach(function(value, key) {
                                    //console.log(value);
                                    this.results[key]['isActive']=false
                             }.bind(this));
                // console.log(this.results);


                            this.docs_class=null;
                            this.keys_class=null;
                            this.handleCloseDocs();
                            this.handleCloseKeys();



                })




                   },

                   toggletypebus(){
                        this.clicked=false;
                        //console.log('false');
                        this.yearly=false;
                       this.monthly=true;
                        this.personal=false;
                        this.business=true;
                    axios.get('/api/planView').then(response => {
                            this.results = response.data
                            //console.log(this.results)
                            this.results.forEach(function(value, key) {
                                    //console.log(value);
                                    this.results[key]['isActive']=false
                             }.bind(this));
                // console.log(this.results);



                        this.docs_class=null;
                        this.keys_class=null;
                        this.handleCloseDocs();
                        this.handleCloseKeys();



                })


                   },


                handleCloseDocs(){

                        this.docs_display=false;
                        //console.log(this.active_docs)
                        this.results[this.active_docs]['isActive']=false
                        this.active_docs=null;
                        this.docSum=0;
                        this.docQuan=0;
                        //console.log('active doc'+this.active_docs);
                        //console.log(this.results[this.active_docs]['isActive'])

                },



                 handleCloseKeys(){

                        this.keys_display=false;
                        //console.log(this.active_keys)
                        this.results[this.active_keys]['isActive']=false
                        this.active_keys=null;
                        this.keySum=0;
                        this.keyQuan=0;
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
                        var type=null;
                        if(this.personal==true){
                                type='customer';
                            }
                        if(this.business==true){
                                type='business';
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
                        type,

                })

                .then(function (response) {

                        //currentObj.output = response.data;
                        //console.log('Success')
                        console.log(this.logged);
                    if(this.logged=="true"){
                        // console.log('payment activated');
                        window.location.href = '/payment';
                        }
                    else{
                        // console.log('register activated');
                        window.location.href = '/register';
                    }
                        // axios.get('/api/getsession').then(response => {
                        //     console.log(response.data[0]);

                        // });

                }.bind(this))

                .catch(function (error) {

                        //currentObj.output = error;
                        console.log(error)

                });

                }





        },








    }

</script>
