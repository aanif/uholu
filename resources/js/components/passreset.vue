<template>
<div class="container" style="width:100%">
<div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="margin-top:200px;margin-bottom:100px">
                

                <div class="card-body" >
                    

                       <center><p v-if="terminateMsg"> The password has been reset </p></center>

                        <form v-on:submit.prevent="checkpassword" v-if="passet">

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                            <div class="col-md-6">
                                <input id="password" v-model="password" type="password" class="form-control" name="password" autocomplete="false" required>

                                
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm"  v-model="repassword" type="password" class="form-control" name="password_confirmation" autocomplete="false" required>
                            </div>
                        </div>
                        <center><p v-if="mismatch" style="color:red">Password Mismatch</p></center>
                        <center><p v-if="lengthError" style="color:red">Password should be more than 8 charecters</p></center>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button v-if="pre" type="submit" class="btn btn-primary">
                                  Submit
                                </button>
                                <button v-if="post" type="submit" class="btn btn-primary" disabled>
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
                email:null,
                password:null,
                repassword:null,
                passet:false,
                mismatch:false,
                lengthError:false,
                pre:true,
                post:false,
                terminateMsg:false,
            }
    },

    mounted() {
         const urlParams = new URLSearchParams(window.location.search);
         const myParam = urlParams.get('key');
         var code=myParam;
         axios.post('/api/getemail',{

                     code,

                    }).then(response => {
                           this.email=response.data;
                           if(this.email){
                               this.passet=true;
                           }
                           else{
                               this.passet=false;
                                window.location.href = '/';
                           }
                    });

    },

    methods:{
        checkpassword(){
            this.pre=false;
            this.post=true;
            this.lengthError=false;
            this.mismatch=false;
            if(this.password.length<8){
                this.lengthError=true;
                this.pre=true;
                 this.post=false;
            }
            else{
                
                this.lengthError=false;
                if(this.password==this.repassword){
                var emailc=this.email;
                var passwordc=this.password
                this.mismatch=false;
                 axios.post('/api/passwordUpdate',{

                     emailc,
                     passwordc,

                    }).then(response => {
                           this.passet=false;
                           this.post=false;
                           this.terminateMsg=true;
                    });
            }
            else{
                this.mismatch=true;
                this.pre=true;
                 this.post=false;
            }
            }
            //console.log(s.length);
            
        }
    }
}

</script>
