<template>
<div class="container" style="width:100%">
<div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="margin-top:200px;margin-bottom:100px">
                

                <div class="card-body" >
                    

                       


                        <div class="form-group row">
                            <label v-if="total" for="password" class="col-md-4 col-form-label text-md-right">Enter Email</label>
                            
                            <div class="col-md-6">
                                <input  v-if="total" id="email" v-model="emailinput" type="email" class="form-control" name="email" required>
                               <p v-if="error" style="color:red">This email does not exist</p>
                                
                            </div>
                        </div>
                        <center><p v-if="!total">Email has been sent to the this email ID</p></center>
                        

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button v-if="pre" type="button" v-on:click="checkemail" class="btn btn-primary">
                                  Submit
                                </button>
                                <button v-if="post" type="button" v-on:click="checkemail" class="btn btn-primary" disabled>
                                  Loading
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</template>
<script>

export default {


    data(){

            return{
                emailinput:null,
                pre:true,
                post:false,
                error:false,
                total:true,
            }
    },

    mounted() {

    },

    methods:{
            checkemail(){
                this.pre=false;
                this.post=true;
                this.error=false;
                var email=this.emailinput;
                 axios.post('/api/checkEmail',{

                     email,

                    }).then(response => {
                        console.log(response.data);
                           if(response.data=='new'){
                               this.pre=true;
                               this.post=false;
                               this.error=true;
                           }
                           else if(response.data=='exists'){
                                this.sendEmailCode();
                           }
                    });
            },

            sendEmailCode(){
                var email=this.emailinput;
                 axios.post('/api/createReset',{

                     email,

                    }).then(response => {
                           this.total=false;
                           this.post=false;
                    });
            }
    }
}

</script>
