<template>

<div class="container" style="width:100%;padding-left:50px;padding-top:0px">


<!--
<div class="tog">

<p style="display:inline">Personal Packages</p>
<label class="switch">
  <input type="checkbox">
  <span class="slider round" v-on:click="toggletype"></span>
</label>
<p style="display:inline">Business Packages</p>
</div>
-->
<!--//////////////////////////////////////////////////////////////////////////////////////////////////////-->







<div v-if="errorLayoverKey">
            <div class="overlayDash" style="" v-on:click="errorLayoverKey=false"></div>

                    <div class="popupDash" style="">



                                <i class="fa fa-window-close"  aria-hidden="true" style="font-size:20px;float:right;margin-right:0px;margin-top:-10px" v-on:click="errorLayoverKey=false"></i>

                                <table style="width:100%">
                                        <tr>
                                                <td style="width:100%" align="center">
                                                    <i class="fa fa-file" style="font-size:30px;"></i>
                                                    <h4><b> Error Downgrading </b></h4>
                                                    <p style="font-size:13px;color:grey" >You have added more items then you are allow in the new package. </p><p style="font-size:13px;color:grey" >Kindly Contact Administrator. </p>
                                                    <br><button  v-on:click="errorLayoverKey=false" class="btn btn-primary"  style="border-color:#FCD206;background-color:#FCD206"><span style="color:black"><b>OK</b></span></button>
                                                </td>
                                        </tr>
                                </table>



                    </div>



</div>













<!--//////////////////////////////////////////////////////////////////////////////////////////////////////-->

 <b-alert v-model="showDismissibleAlert" variant="success" dismissible>
                        Packages Upgraded
                        </b-alert>
<div><h4 style="color:#565657"><b>Selected Packages</b></h4></div>





<div><h5 style="color:#565657"><b>Document</b></h5></div>
<div class="packdiv" style="width:66%;margin-left:-20px;border:2px solid green;box-shadow: 1px 2px 6px 1px green;">
<div class="efec">
            <table class="" style="width:100%">
                <tr align="center">
                    <td style="padding-top:20px" ><span><a href="#!" style="color:#C2C2C2"  ><b>{{doc_class}}</b></a></span></td>
                    <td style="padding-top:20px" ><span><a href="#!" style="color:#C2C2C2" ><b>{{doc_quantity}} KG</b></a></span></td>
                    <td style="padding-top:20px" ><span><a href="#!" style="color:#C2C2C2"  ><b>${{doc_cost/100}}</b></a></span></td>
                </tr>
            </table>
</div>
</div>
<div ><h5 style="color:#565657"><b>Key</b></h5></div>
<div  class="packdiv" style="width:66%;margin-left:-20px;border:2px solid green;box-shadow: 1px 2px 6px 1px green;">
<div class="efec">
            <table class="" style="width:100%">
                <tr align="center">
                    <td style="padding-top:20px" ><span><a href="#!" style="color:#C2C2C2" ><b>{{key_class}}</b></a></span></td>
                    <td style="padding-top:20px" ><span><a href="#!" style="color:#C2C2C2" ><b>{{key_quantity}} Keys</b></a></span></td>
                    <td style="padding-top:20px" ><span><a href="#!" style="color:#C2C2C2" ><b>${{key_cost/100}}</b></a></span></td>
                </tr>
            </table>
</div>
</div>








<!--<div class="packdiv" style="width:66%;margin-left:-20px">

            <table class="" style="width:100%">
                <tr align="center">
                    <td style="padding-top:20px" v-on:click="toggletypeper"><span><a href="#!" style="color:#C2C2C2"  v-on:click="toggletypeper"><b>Personal Packages</b></a></span></td>
                    <td style="padding-top:20px" v-on:click="toggletypebus"><span><a href="#!" style="color:#C2C2C2"  v-on:click="toggletypebus"><b>Business Packages</b></a></span></td>
                </tr>
            </table>

</div>-->

<div class="row">
        <div class="col-lg-8 col-md-8">
        <div><h3 style="color:#565657"><b>Upgradeable Packages</b></h3></div>


<!--
<div class="row">
    <div class="col-4">
    </div>
    <div class="col" style="float:right">
        <div class="tog" >
        <p style="display:inline">Monthly Packages</p>
        <label class="switch" style="margin-bottom:-5px">
        <input type="checkbox">
        <span class="slider round" v-on:click="togButton"></span>
        </label>
        <p style="display:inline">Yearly Packages</p>
        </div>
    </div>
</div>

-->

        <div><h4 style="color:#565657"><b>Documents</b></h4></div>



<div v-if="monthly">
<!--
    <div class="efec">
        <div v-if="personal">
                    <div class="row" v-on:click="makeactive(result.id,index)" v-for="(result,index) in results" :key="result.id"  v-bind:class="{active1: result.isActive,packdiv: !result.isActive}"   v-if="result.catagory=='docs' " >
                            <div class="col-1 radiodiv">
                                <div style="margin-top:23px;margin-left:2px;">
                                    <div class="radioOutter">
                                            <div class="innerBefore" v-bind:class="{innerBefore: !result.isActive,innerAfter: result.isActive}"></div>
                                    </div>
                                </div>
                            </div>
                            <table class="" style="width:100%;margin-top:-20px;">
                                <tr align="center">
                                    <td style="padding-top:0px" ><span><a href="#!" style="color:#C2C2C2" ><b>{{result.plan_class}}</b></a></span></td>
                                    <td style="padding-top:0px" ><span><a href="#!" style="color:#C2C2C2" ><b>{{result.quantity}} KG</b></a></span></td>
                                    <td style="padding-top:0px" ><span><a href="#!" style="color:#C2C2C2" ><b>${{result.cost/100}}</b></a></span></td>
                                </tr>
                            </table>
                    </div>

        </div>
    </div>-->

    <div class="efec">
        <div v-if="business">

                    <div class="row" v-on:click="makeactive1(result.id,index)" v-for="(result,index) in results" :key="result.id"  v-bind:class="{active1: result.isActive,packdiv: !result.isActive}"   v-if="(result.catagory=='docs business' && result.quantity!=doc_quantity) || (result.catagory=='docs business' && result.quantity=='100')" >
                            <div class="col-1 radiodiv">
                                <div style="margin-top:23px;margin-left:2px;">
                                    <div class="radioOutter">
                                            <div class="innerBefore" v-bind:class="{innerBefore: !result.isActive,innerAfter: result.isActive}"></div>
                                    </div>
                                </div>
                            </div>
                            <table class="" style="width:100%;margin-top:-20px;">
                                <tr align="center">
                                    <td style="padding-top:0px" ><span><a href="#!" style="color:#C2C2C2" ><b>{{result.plan_class}}</b></a></span></td>


                                    <td v-if="result.quantity<100" style="padding-top:0px" ><span><a href="#!" style="color:#C2C2C2" ><b>{{result.quantity}} KG</b></a></span></td>


                                    <td v-if="result.quantity>=100" style="padding-top:0px" ><span><a href="#!" style="color:#C2C2C2" ><select v-model="result.quantity" class="form-control" style="width:150px;height:40px;margin-top:-10px">
                                                                                <option v-if="doc_quantity!=100" value="100">100 KG</option>
                                                                                <option v-if="doc_quantity!=200" value="200">200 KG</option>
                                                                                <option v-if="doc_quantity!=400" value="400">400 KG</option>
                                                                                <option v-if="doc_quantity!=600" value="600">600 KG</option>
                                                                                <option v-if="doc_quantity!=800" value="800">800 KG</option>
                                                                                <option v-if="doc_quantity!=1000" value="1000">1000 KG</option>

                                                                            </select></a></span>
                                    </td>

                                    <!--<td v-if="result.quantity==100" style="padding-top:0px" ><span><a href="#!" style="color:#C2C2C2" ><select v-model="result.quantity" class="form-control" style="width:150px;height:40px;margin-top:-10px">
                                                                                <option v-if="doc_quantity!=100" value="100">100 KG</option>
                                                                                <option v-if="doc_quantity!=200" value="200">200 KG</option>
                                                                                <option v-if="doc_quantity!=400" value="400">400 KG</option>
                                                                                <option v-if="doc_quantity!=600" value="600">600 KG</option>
                                                                                <option v-if="doc_quantity!=800" value="800">800 KG</option>
                                                                                <option v-if="doc_quantity!=1000" value="1000">1000 KG</option>
                                                                            </select></a></span>
                                    </td>-->

                                    <td v-if="result.quantity<100" style="padding-top:0px" ><span><a href="#!" style="color:#C2C2C2" ><b>${{result.cost/100}}</b></a></span></td>
                                    <td v-if="result.quantity>=100" style="padding-top:0px" ><span><a href="#!" style="color:#C2C2C2" ><b>${{(result.cost/100)*(result.quantity/100)}}</b></a></span></td>
                                </tr>
                            </table>
                    </div>
        </div>
    </div>


</div>








<div v-if="yearly">


    <div class="efec">
        <div v-if="personal">
                    <div class="row" v-on:click="makeactive4(result.id,index)" v-for="(result,index) in results" :key="result.id"  v-bind:class="{active1: result.isActive,packdiv: !result.isActive}"   v-if="result.catagory=='docs yearly' && result.quantity!=doc_quantity" >
                            <div class="col-1 radiodiv">
                                <div style="margin-top:23px;margin-left:2px;">
                                    <div class="radioOutter">
                                            <div class="innerBefore" v-bind:class="{innerBefore: !result.isActive,innerAfter: result.isActive}"></div>
                                    </div>
                                </div>
                            </div>
                            <table class="" style="width:100%;margin-top:-20px;">
                                <tr align="center">
                                    <td style="padding-top:0px" ><span><a href="#!" style="color:#C2C2C2" ><b>{{result.plan_class}}</b></a></span></td>
                                    <td style="padding-top:0px" ><span><a href="#!" style="color:#C2C2C2" ><b>{{result.quantity}} KG</b></a></span></td>
                                    <td style="padding-top:0px" ><span><a href="#!" style="color:#C2C2C2" ><b>${{result.cost/100}}</b></a></span></td>
                                </tr>
                            </table>
                    </div>

        </div>
    </div>
<!--
    <div class="efec">
        <div v-if="business">

                    <div class="row" v-on:click="makeactive5(result.id,index)" v-for="(result,index) in results" :key="result.id"  v-bind:class="{active1: result.isActive,packdiv: !result.isActive}"   v-if="result.catagory=='docs business yearly' " >
                            <div class="col-1 radiodiv">
                                <div style="margin-top:23px;margin-left:2px;">
                                    <div class="radioOutter">
                                            <div class="innerBefore" v-bind:class="{innerBefore: !result.isActive,innerAfter: result.isActive}"></div>
                                    </div>
                                </div>
                            </div>
                            <table class="" style="width:100%;margin-top:-20px;">
                                <tr align="center">
                                    <td style="padding-top:0px" ><span><a href="#!" style="color:#C2C2C2" ><b>{{result.plan_class}}{{result.stripe_plan}}</b></a></span></td>
                                    <td style="padding-top:0px" ><span><a href="#!" style="color:#C2C2C2" ><b>{{result.quantity}} KG</b></a></span></td>
                                    <td style="padding-top:0px" ><span><a href="#!" style="color:#C2C2C2" ><b>${{result.cost/100}}</b></a></span></td>
                                </tr>
                            </table>
                    </div>
        </div>
    </div>
-->


</div>




<!--////////////////////////////////////////////////////////////////////////////////////////////////////////////-->


                        <br>
                        <div><h4 style="color:#565657"><b>Keys</b></h4></div>




<div v-if="monthly">
<!--
    <div class="efec">
        <div v-if="personal">
                        <div class="row" v-on:click="makeactive2(result.id,index)" v-for="(result,index) in results" :key="result.id"  v-bind:class="{active1: result.isActive,packdiv: !result.isActive}" v-if="result.catagory=='keys'" >


                            <div class="col-1 radiodiv">
                                <div style="margin-top:23px;margin-left:2px;">
                                    <div class="radioOutter">
                                            <div class="innerBefore" v-bind:class="{innerBefore: !result.isActive,innerAfter: result.isActive}"></div>
                                    </div>
                                </div>
                            </div>
                            <table class="" style="width:100%;margin-top:-20px;">
                                <tr align="center">
                                    <td style="padding-top:0px" ><span><a href="#!" style="color:#C2C2C2" ><b>{{result.plan_class}}</b></a></span></td>
                                    <td style="padding-top:0px" ><span><a href="#!" style="color:#C2C2C2" ><b>{{result.quantity}} Keys</b></a></span></td>
                                    <td style="padding-top:0px" ><span><a href="#!" style="color:#C2C2C2" ><b>${{result.cost/100}}</b></a></span></td>
                                </tr>
                            </table>
                        </div>
        </div>
    </div>
    -->
    <div class="efec">
        <div v-if="business">
                        <div class="row" v-on:click="makeactive3(result.id,index)" v-for="(result,index) in results" :key="result.id"  v-bind:class="{active1: result.isActive,packdiv: !result.isActive}" v-if="(result.catagory=='keys business' && result.quantity!=key_quantity) || (result.quantity=='100' && result.catagory=='keys business')" >


                            <div class="col-1 radiodiv">
                                <div style="margin-top:23px;margin-left:2px;">
                                    <div class="radioOutter">
                                            <div class="innerBefore" v-bind:class="{innerBefore: !result.isActive,innerAfter: result.isActive}"></div>
                                    </div>
                                </div>
                            </div>
                            <table class="" style="width:100%;margin-top:-20px;">
                                <tr align="center">
                                    <td style="padding-top:0px" ><span><a href="#!" style="color:#C2C2C2" ><b>{{result.plan_class}}</b></a></span></td>
                                    <td v-if="result.quantity<100" style="padding-top:0px" ><span><a href="#!" style="color:#C2C2C2" ><b>{{result.quantity}} Keys</b></a></span></td>
                                    <td v-if="result.quantity>=100" style="padding-top:0px" ><span><a href="#!" style="color:#C2C2C2" ><select v-model="result.quantity" class="form-control" style="width:150px;height:40px;margin-top:-10px">
                                                                                <option v-if="key_quantity!=100"  value="100">100 keys</option>
                                                                                <option v-if="key_quantity!=200"  value="200">200 keys</option>
                                                                                <option v-if="key_quantity!=400"  value="400">400 keys</option>
                                                                                <option v-if="key_quantity!=600"  value="600">600 keys</option>
                                                                                <option v-if="key_quantity!=800"  value="800">800 keys</option>
                                                                                <option v-if="key_quantity!=1000"  value="1000">1000 keys</option>
                                                                            </select></a></span></td>
                                    <td v-if="result.quantity<100" style="padding-top:0px" ><span><a href="#!" style="color:#C2C2C2" ><b>${{result.cost/100}}</b></a></span></td>
                                    <td v-if="result.quantity>=100" style="padding-top:0px" ><span><a href="#!" style="color:#C2C2C2" ><b>${{(result.cost/100)*(result.quantity/100)}}</b></a></span></td>
                                </tr>
                            </table>

                            <!--<div class="col-4 righty">
                                    <div class="upy"><p>keys</p></div>
                                    <div class="downy"> <p><b> {{result.quantity}}</b></p></div>
                            </div>

                            <div class="col-2 righty">
                                    <div class="upy"><p>Cost</p></div>
                                    <div class="downy"> <p> <b>${{result.cost/100}}</b></p></div>
                            </div>-->
                        </div>
        </div>
    </div>


</div>



<div v-if="yearly">

    <div class="efec">
        <div v-if="personal">
                        <div class="row" v-on:click="makeactive6(result.id,index)" v-for="(result,index) in results" :key="result.id"  v-bind:class="{active1: result.isActive,packdiv: !result.isActive}" v-if="result.catagory=='keys yearly' && result.quantity!=key_quantity" >


                            <div class="col-1 radiodiv">
                                <div style="margin-top:23px;margin-left:2px;">
                                    <div class="radioOutter">
                                            <div class="innerBefore" v-bind:class="{innerBefore: !result.isActive,innerAfter: result.isActive}"></div>
                                    </div>
                                </div>
                            </div>
                            <table class="" style="width:100%;margin-top:-20px;">
                                <tr align="center">
                                    <td style="padding-top:0px" ><span><a href="#!" style="color:#C2C2C2" ><b>{{result.plan_class}}</b></a></span></td>
                                    <td style="padding-top:0px" ><span><a href="#!" style="color:#C2C2C2" ><b>{{result.quantity}} Keys</b></a></span></td>
                                    <td style="padding-top:0px" ><span><a href="#!" style="color:#C2C2C2" ><b>${{result.cost/100}}</b></a></span></td>
                                </tr>
                            </table>
                        </div>
        </div>
    </div>
    <!--
    <div class="efec">
        <div v-if="business">
                        <div class="row" v-on:click="makeactive7(result.id,index)" v-for="(result,index) in results" :key="result.id"  v-bind:class="{active1: result.isActive,packdiv: !result.isActive}" v-if="result.catagory=='keys business yearly'" >


                            <div class="col-1 radiodiv">
                                <div style="margin-top:23px;margin-left:2px;">
                                    <div class="radioOutter">
                                            <div class="innerBefore" v-bind:class="{innerBefore: !result.isActive,innerAfter: result.isActive}"></div>
                                    </div>
                                </div>
                            </div>
                            <table class="" style="width:100%;margin-top:-20px;">
                                <tr align="center">
                                    <td style="padding-top:0px" ><span><a href="#!" style="color:#C2C2C2" ><b>{{result.plan_class}}{{result.stripe_plan}}</b></a></span></td>
                                    <td style="padding-top:0px" ><span><a href="#!" style="color:#C2C2C2" ><b>{{result.quantity}} Keys</b></a></span></td>
                                    <td style="padding-top:0px" ><span><a href="#!" style="color:#C2C2C2" ><b>${{result.cost/100}}</b></a></span></td>
                                </tr>
                            </table>

                            <!--<div class="col-4 righty">
                                    <div class="upy"><p>keys</p></div>
                                    <div class="downy"> <p><b> {{result.quantity}}</b></p></div>
                            </div>

                            <div class="col-2 righty">
                                    <div class="upy"><p>Cost</p></div>
                                    <div class="downy"> <p> <b>${{result.cost/100}}</b></p></div>
                            </div>--><!--
                        </div>
        </div>
    </div>-->


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
                                    <td v-if="this.docs_class.quantity<100" align="right"><p style="font-size:12px;color:0A0C12"> {{this.docs_class.cost/100}} $/month</p></td>
                                    <td v-if="this.docs_class.quantity>=100" align="right"><p style="font-size:12px;color:0A0C12"> {{(this.docs_class.cost/100)*(this.docs_class.quantity/100)}} $/month</p></td>
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


                        <div style="width:100%">
                        <i  class="fa fa-window-close" style="size:12px;float:right" v-on:click="handleCloseKeys"></i>

                        <table style=" border: 0px solid black;width:100%;height:80%">
                                <tr>
                                    <td valign="bottom"><p style="font-size:12px;color:0A0C12"> Keys</p></td>
                                    <td align="right" valign="bottom"><p style="font-size:12px;color:0A0C12;font-weight:600"><b> {{this.keys_class.quantity}} Keys</b></p></td>
                                </tr>

                                <tr>
                                    <td><p style="font-size:12px;color:0A0C12;font-weight:600"><b> {{this.keys_class.plan_class}}</b></p></td>
                                    <td v-if="this.keys_class.quantity<100" align="right"><p style="font-size:12px;color:0A0C12"> {{this.keys_class.cost/100}} $/month</p></td>
                                    <td v-if="this.keys_class.quantity>=100" align="right"><p style="font-size:12px;color:0A0C12"> {{(this.keys_class.cost/100)*(this.keys_class.quantity/100)}} $/month</p></td>
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
                        <center><p style="margin-bottom:0px;">Total Investment </p></center>
                </div>
                <div class="checkoutsum" style="margin-top:0px;">

                        <center>
                        <span style="margin-top:-20px"><h4 style="display:inline;"><b>${{(this.keySum*(this.keyQuan/100)+this.docSum*(this.docQuan/100))/100}}</b></h4><h6 style="display:inline;"><span v-if="monthly">/month</span><span  v-if="yearly">/year</span></h6></span>
                        </center>


                        </div>
<div v-if="invoicedoc">
                <div class="checkoutsum" style="margin-bottom:0px;">
                        <center><p style="margin-bottom:0px;">{{datedoc}}</p></center>
                </div>
                <div class="checkoutsum" style="margin-top:0px;">

                        <center>
                        <span style="margin-top:-20px"><h4 style="display:inline;"><b>${{amountdoc/100}}</b></h4><h6 style="display:inline;"></h6></span>
                        </center>


                        </div>
</div>
<div v-if="invoicekey">
                <div class="checkoutsum" style="margin-bottom:0px;">
                        <center><p style="margin-bottom:0px;">{{datekey}}</p></center>
                </div>
                <div class="checkoutsum" style="margin-top:0px;">

                        <center>
                        <span style="margin-top:-20px"><h4 style="display:inline;"><b>${{amountkey/100}}</b></h4><h6 style="display:inline;"></h6></span>
                        </center>


                        </div>
</div>
                <br>
                <center>

                <button v-on:click="viewInvoice" class="btn btn-primary" type="button">
                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true" style="display:none"></span>
                View Invoice
                </button>
                <button v-on:click="confirmation" v-if="inv_cnf" class="btn btn-primary" type="button" >
                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true" style="display:none"></span>
                Confirm
                </button>
                <button v-on:click="confirmation" v-if="inv_cnfdis" class="btn btn-primary" type="button" disabled="">
                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true" style="display:none"></span>
                Loading
                </button>
                <button v-on:click="newSubscription" v-if="newsub" class="btn btn-primary" type="button" >
                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true" style="display:none"></span>
                Subscribe
                </button>
                <button  v-if="newsubloader" class="btn btn-primary" type="button" disabled="true">
                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true" style="display:none"></span>
                Subscribe
                </button>
<b-alert v-model="showDismissibleAlert" variant="success" dismissible>
                        Packages Upgraded
                        </b-alert>
<b-alert v-model="showDismissibleAlert2" variant="success" dismissible>
                        Packages subscribed
                        </b-alert>


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
            'docid',
            'docquantity',
            'keyid',
            'keyquantity',
            'subidkey',
            'subiddoc',
            'roleuser',
            'cust',
            'userid',
            'useremail',
            'user_name',

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
            personal:false,
            business:true,
            type:null,
            key_class:null,
            key_quantity:null,
            key_cost:null,
            doc_class:null,
            doc_quantity:null,
            doc_cost:null,
            docid1:null,
            keyid1:null,
            invoicedoc:false,
            invoicekey:false,
            datedoc:null,
            amountdoc:null,
            datekey:null,
            amountkey:null,
            inv_cnf:false,
            showDismissibleAlert:false,
            showDismissibleAlert2:false,
            inv_cnfdis:false,
            monthly:false,
            yearly:true,
            selectedkeypackage:null,
            selecteddocpackage:null,
            errorLayoverKey:false,
            newsub:false,
            newsubloader:false,
            invoice_recieved_key:null,
            invoice_recieved_doc:null,
            }
        },
        mounted() {

            this.mountedFunction();
            this.docid1=this.docid;
            //this.doc_quantity=this.docquantity;
            //this.key_quantity=this.keyquantity;
            this.keyid1=this.keyid;
            console.log(this.roleuser);
            if(this.roleuser=='business'){
                this.monthly=true;
                this.yearly=false;
            }



            },
            //

            methods: {

                mountedFunction(){
                    if(this.roleuser=='business'){
                        this.personal=false;
                        this.business=true;
                        //this.handleCloseDocs();
                        //this.handleCloseKeys();
                        this.docs_class=null;
                        this.keys_class=null;
            }
            else if(this.roleuser=='customer'){
                        this.personal=true;
                        this.business=false;
                        //this.handleCloseDocs();
                        //this.handleCloseKeys();
                        this.docs_class=null;
                        this.keys_class=null;
            }

            //console.log(this.roleuser);

            axios.get('/api/planView').then(response => {
                            this.results = response.data
                            //console.log(this.results)
                            this.results.forEach(function(value, key) {
                                    //console.log(value);
                                    this.results[key]['isActive']=false
                             }.bind(this));
                // console.log(this.results);



                })

            var docid=this.docid;
            var docquantity=this.docquantity;
            var keyid=this.keyid;
            var keyquantity=this.keyquantity;
            axios.post('/api/currPackage',{
                    docid,
                    docquantity,
                    keyid,
                    keyquantity,
            }).then(response =>{
                //console.log(response.data);
                this.doc_class=response.data[0];
                this.doc_quantity=this.docquantity;
                this.doc_cost=response.data[1];
                this.key_class=response.data[2];
                this.key_quantity=this.keyquantity;
                this.key_cost=response.data[3];
                console.log(response.data);

            })
                },

                makeactive(resulti,index){
                    this.inv_cnf=false;
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
                                    this.selecteddocpackage=this.results[key].stripe_plan;
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
                        this.inv_cnf=false;
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
                                    this.selecteddocpackage=this.results[key].stripe_plan;
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
                     this.inv_cnf=false;
                    this.results.forEach(function(value, key){
                        if(this.results[key].catagory=='keys'){
                                if(resulti==this.results[key].id){
                                        this.results[key]['isActive']=true
                                        this.active_keys=key
                                        this.selectedkeypackage=this.results[key].stripe_plan;
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

                   makeactive3(resulti,index){
                        this.inv_cnf=false;
                    this.results.forEach(function(value, key){
                        if(this.results[key].catagory=='keys business'){
                                if(resulti==this.results[key].id){
                                        this.results[key]['isActive']=true
                                        this.active_keys=key
                                        this.selectedkeypackage=this.results[key].stripe_plan;
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


                   makeactive4(resulti,index){
                        this.inv_cnf=false;
                    //console.log(index)
                    this.results.forEach(function(value, key){
                         if(this.results[key].catagory=='docs yearly'){
                             //console.log(this.results[key].catagory)
                                if(resulti==this.results[key].id){
                                //console.log(this.results[key].id)
                                    this.results[key]['isActive']=true
                                    this.active_docs=key
                                    //console.log('active doc'+this.active_docs);
                                    //console.log('if')
                                    this.selecteddocpackage=this.results[key].stripe_plan;
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
                        this.inv_cnf=false;
                    //console.log(index)
                    this.results.forEach(function(value, key){
                         if(this.results[key].catagory=='docs business yearly'){
                             //console.log(this.results[key].catagory)
                                if(resulti==this.results[key].id){
                                //console.log(this.results[key].id)
                                    this.results[key]['isActive']=true
                                    this.active_docs=key
                                    //console.log('active doc'+this.active_docs);
                                    //console.log('if')
                                    this.selecteddocpackage=this.results[key].stripe_plan;
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
                        this.inv_cnf=false;
                    this.results.forEach(function(value, key){
                        if(this.results[key].catagory=='keys yearly'){
                                if(resulti==this.results[key].id){
                                        this.results[key]['isActive']=true
                                        this.active_keys=key
                                        this.selectedkeypackage=this.results[key].stripe_plan;
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
                        this.inv_cnf=false;
                    this.results.forEach(function(value, key){
                        if(this.results[key].catagory=='keys business yearly'){
                                if(resulti==this.results[key].id){
                                        this.results[key]['isActive']=true
                                        this.active_keys=key
                                        this.selectedkeypackage=this.results[key].stripe_plan;
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

                   toggletypeper(){

                        this.personal=true;
                        this.business=false;
                        this.handleCloseDocs();
                        this.handleCloseKeys();
                        this.docs_class=null;
                        this.keys_class=null;

                   },

                   toggletypebus(){

                        this.personal=false;
                        this.business=true;
                        this.handleCloseDocs();
                        this.handleCloseKeys();
                        this.docs_class=null;
                        this.keys_class=null;

                   },


                handleCloseDocs(){

                        this.docs_display=false;
                        //console.log(this.active_docs)
                        this.results[this.active_docs]['isActive']=false
                        this.active_docs=null;
                        this.docSum=0;
                        this.docQuan=0;
                        this.selecteddocpackage=null;
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
                        this.selectedkeypackage=null;
                        //console.log('active key'+this.active_keys);
                        //console.log(this.results[this.active_keys]['isActive'])


                },
                viewInvoice(){

                    //console.log('Viewing Invoice');
                    if(this.results[this.active_docs]){
                        var subs=this.subiddoc;
                        var quantity=this.results[this.active_docs].quantity;
                        this.invoice_recieved_doc=quantity;
                        if(subs){
                         axios.post('/api/retrieveInvoice/'+this.cust,{
                            subs,
                            quantity,
                         }).then(response =>{
                             if(response.data!='same'){
                                this.datedoc=response.data[0].description.substring(45);
                                this.amountdoc=response.data[0].amount+response.data[1].amount;
                                 this.inv_cnf=true;
                                }
                                else if(response.data=='same'){
                                this.datedoc='You are already subscribed to this Documents package'
                                this.amountkey='0';
                                 this.inv_cnf=false;

                            }
                                // console.log(this.date);
                                //  console.log(this.amount);
                                 this.invoicedoc=true;

                         })

                    }
                    else{
                            this.newsub=true;
                    }
                    }

                    if(this.results[this.active_keys]){
                        var subs=this.subidkey;
                        var quantity=this.results[this.active_keys].quantity;
                        this.invoice_recieved_key=quantity;
                         if(subs){
                        axios.post('/api/retrieveInvoice/'+this.cust,{
                            subs,
                            quantity,
                         }).then(response =>{
                            if(response.data!='same'){
                                this.datekey=response.data[0].description.substring(40);
                                this.amountkey=response.data[0].amount+response.data[1].amount;
                                 this.inv_cnf=true;
                                }
                            else if(response.data=='same'){
                                this.datekey='You are already subscribed to this Keys package';
                                this.amountkey='0';
                                 this.inv_cnf=false;

                            }
                                // console.log(this.date);
                                // console.log(this.amount);
                                 this.invoicekey=true;


                         })
                         }
                         else{
                             this.newsub=true;
                         }
                    }

                },
                newSubscription(){
                    var id=this.cust;
                    var data_return=new Object();
                    this.newsub=false;
                    this.newsubloader=true;
                    if(!this.keyid){
                        var quantity=this.results[this.active_keys].quantity;
                        var plan=this.selectedkeypackage;
                        var item='key';
                        }
                    else if(!this.docid){
                        var quantity=this.results[this.active_docs].quantity;
                        var plan=this.selecteddocpackage;
                        var item='doc';
                    }
                    axios.post('/api/subscription',{
                                id,
                                quantity,
                                plan,
                               // type,
                                }).then(response =>{
                                    var sub=response.data.id;
                                    var ids=plan;
                                    data_return=response.data;
                                    axios.post('/api/resubpackage/'+id,{
                                        item,
                                        quantity,
                                        ids,
                                        sub,
                                        }).then(response =>{


/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


                                                //var role=this.roleuser;
                                                var id=this.userid;
                                                var name=this.user_name;
                                                var email=this.useremail;
                                                var stripe_id=this.cust;
                                                var cost=data_return.plan.amount/100;
                                                if(item=='doc'){
                                                    var doc_cost=data_return.plan.amount/100;
                                                    var invoice_doc=data_return.latest_invoice;
                                                    var doc_qty=quantity;
                                                    var key_cost=0;
                                                    var invoice_key=null;
                                                    var key_qty=0;
                                                }

                                                if(item=='key'){
                                                    var key_cost=data_return.plan.amount/100;
                                                    var invoice_key=data_return.latest_invoice;
                                                    var key_qty=quantity;
                                                    var doc_cost=0;
                                                    var invoice_doc=null;
                                                    var doc_qty=0;
                                                }

                                                axios.post('/api/send/mailInvoice',{
                                                                                id,
                                                                                name,
                                                                                stripe_id,
                                                                                email,
                                                                                cost,
                                                                                doc_cost,
                                                                                doc_qty,
                                                                                key_cost,
                                                                                key_qty,
                                                                                invoice_doc,
                                                                                invoice_key,

                                                                            // type,
                                                                                }).then(response =>{

                                                                                    var user_id=id;
                                                                                    var description="Subscription Payment";
                                                                                    var amount=cost;
                                                                                            axios.post('/api/createpayment',{
                                                                                                    user_id,
                                                                                                    description,
                                                                                                    amount,
                                                                                            }).then(response =>{
                                                                                              this.showDismissibleAlert2=true;
                                                                                        setTimeout(() => this.showDismissibleAlert=false, 5000);
                                                                                        //this.mountedFunction();
                                                                                        setTimeout(() => window.location.href = '/dashboard/upgradePackage', 3000);
                                                                                            }).catch(function (error) {


                                                                                                console.log(error)

                                                                                            });



                                                                                }).catch(function (error) {


                                                                                        console.log(error)

                                                                                });






///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////





                                        });

                                }).catch(function (error) {


                                        console.log(error)

                                });
                },

                confirmation(){
                        this.inv_cnfdis=true;
                        this.inv_cnf=false;

                        var invoice_key=null;
                        var invoice_doc=null;
                        var key_cost=null;
                        var doc_cost=null;
                        var key_qty=null;
                        var doc_qty=null;


                        var counter=0;
                        var tester=0;
                        if(this.results[this.active_docs]){
                            counter=counter+1;
                        }
                        if(this.results[this.active_keys]){
                            counter=counter+1;
                        }


                        if(this.results[this.active_docs]){
                        var subs=this.subiddoc;
                        var quantity1=this.invoice_recieved_doc;
                        var plan1=this.selecteddocpackage;
                        var id=this.userid;
                        var existing_docs=null;
                        axios.get('/api/userDocCounter/'+id).then(response =>{
                            existing_docs=response.data;
                            if(quantity1 < existing_docs){
                                 console.log('not allowed');
                                 this.errorLayoverKey=true;
                                 this.inv_cnfdis=false;
                                 this.inv_cnf=true;
                            }
                            else if(quantity1 >= existing_docs){

                                 console.log("docs");
                        console.log(quantity1);
                        var stripe_id=this.cust;
                        axios.post('/api/subscription1/'+subs,{
                                quantity1,
                                plan1,
                               // type,
                                }).then(response =>{
                                    console.log('doc sub')
                                    var type='doc';
                                    console.log(response.data);
                                    invoice_doc=response.data.latest_invoice;
                                    doc_qty=this.invoice_recieved_doc;
                                    doc_cost=this.amountdoc/100;

                                    var quantity=this.results[this.active_docs].quantity;
                                     axios.post('/api/quantityUpdate',{
                                            type,
                                            quantity,
                                            stripe_id,
                                     }).then(response =>{
                                                tester=tester+1;
                                                console.log('doc updated')
                                                if(tester==counter){
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

                                                var id=this.userid;
                                                var name=this.user_name;
                                                var email=this.useremail;
                                                var stripe_id=this.cust;
                                                var cost=doc_cost+key_cost;
                                                console.log('key'+key_qty);
                                                console.log('doc'+doc_qty);
                                                    axios.post('/api/send/mailInvoice',{
                                                                                id,
                                                                                name,
                                                                                stripe_id,
                                                                                email,
                                                                                cost,
                                                                                doc_cost,
                                                                                doc_qty,
                                                                                key_cost,
                                                                                key_qty,
                                                                                invoice_doc,
                                                                                invoice_key,
                                                                            // type,
                                                                                }).then(response =>{

                                                                                    var user_id=id;
                                                                                    var description="Subscription Change Payment";
                                                                                    var amount=cost;
                                                                                            axios.post('/api/createpayment',{
                                                                                                    user_id,
                                                                                                    description,
                                                                                                    amount,
                                                                                            }).then(response =>{
                                                                                                this.showDismissibleAlert=true;
                                                                                                setTimeout(() => this.showDismissibleAlert=false, 5000);
                                                                                                //this.mountedFunction();
                                                                                                setTimeout(() => window.location.href = '/dashboard/upgradePackage', 3000);
                                                                                                this.inv_cnfdis=false;
                                                                                                this.inv_cnf=true;
                                                                                            }).catch(function (error) {


                                                                                                console.log(error)

                                                                                            });







                                                                                }).catch(function (error) {


                                                                                        console.log(error)

                                                                                });










//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

                                                }
                                     });
                                    });

                            }
                        });

                        }

                        if(this.results[this.active_keys]){
                        var subs=this.subidkey;
                        var quantity=this.invoice_recieved_key;
                        var plan=this.selectedkeypackage;
                        var id=this.userid;
                        var existing_keys=null;
                        axios.get('/api/userKeyCounter/'+id).then(response =>{
                            existing_keys=response.data;
                            console.log('requesting'+quantity);
                            console.log('existing'+existing_keys);
                            console.log(quantity+'<'+existing_keys);
                            if(quantity < existing_keys){
                                console.log('not allowed');
                                 this.errorLayoverKey=true;
                                 this.inv_cnfdis=false;
                                 this.inv_cnf=true;
                            }
                            else if(quantity>=existing_keys){

                                 console.log("keys");
                        console.log(quantity);
                        var stripe_id=this.cust;
                        axios.post('/api/subscription/'+subs,{
                                quantity,
                                plan,
                                //type,
                                }).then(response =>{
                                    console.log(response.data);
                                    console.log('key sub')
                                    var type='key';
                                    invoice_key=response.data.latest_invoice;
                                    key_qty=this.invoice_recieved_key;
                                    key_cost=this.amountkey/100;
                                    axios.post('/api/quantityUpdate',{
                                            type,
                                            quantity,
                                            stripe_id,

                                     }).then(response =>{
                                                tester=tester+1;
                                                console.log('key updated')
                                                if(tester==counter){
 //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



                                                var id=this.userid;
                                                var name=this.user_name;
                                                var email=this.useremail;
                                                var stripe_id=this.cust;
                                                var cost=doc_cost+key_cost;

                                                console.log('key'+key_qty);
                                                console.log('doc'+doc_qty);

                                                    axios.post('/api/send/mailInvoice',{
                                                                                id,
                                                                                name,
                                                                                stripe_id,
                                                                                email,
                                                                                cost,
                                                                                doc_cost,
                                                                                doc_qty,
                                                                                key_cost,
                                                                                key_qty,
                                                                                invoice_doc,
                                                                                invoice_key,

                                                                            // type,
                                                                                }).then(response =>{


                                                                                    var user_id=id;
                                                                                    var description="Subscription Change Payment";
                                                                                    var amount=cost;
                                                                                            axios.post('/api/createpayment',{
                                                                                                    user_id,
                                                                                                    description,
                                                                                                    amount,
                                                                                            }).then(response =>{
                                                                                               this.showDismissibleAlert=true;
                                                                                                setTimeout(() => this.showDismissibleAlert=false, 5000);
                                                                                                setTimeout(() => window.location.href = '/dashboard/upgradePackage', 3000);
                                                                                                //this.mountedFunction();
                                                                                                this.inv_cnfdis=false;
                                                                                                this.inv_cnf=true;
                                                                                            }).catch(function (error) {


                                                                                                console.log(error)

                                                                                            });










                                                                                }).catch(function (error) {


                                                                                        console.log(error)

                                                                                });









//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

                                                }

                                     });
                                    });

                            }
                        });

                        }

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
