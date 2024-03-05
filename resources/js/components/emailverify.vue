<template>
<div class="container" style="width:100%">


<div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="margin-top:200px;margin-bottom:100px">
               <center> <p v-if="confirmationMsg">The Email has been Verified</p>
                <p v-if="confirmationErr">Something Went Wrong</p>
                <p v-if="alreadyExists">Email already exists</p></center>



                <div class="card-body" >
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
                emaili:null,
                confirmationMsg:false,
                confirmationErr:false,
                alreadyExists:false,
            }
    },

    mounted() {
        const urlParams = new URLSearchParams(window.location.search);
         const myParam = urlParams.get('code');
        var code=myParam;
         axios.post('/api/getemailVerify',{

                     code,

                    }).then(response => {
                           this.emaili=response.data;
                           var email=this.emaili;
                           if(this.emaili){
                               //this.passet=true;


                                        var emailc=email;
                                            axios.post('/api/verifyEmail',{
                                                emailc,
                                            }).then(response => {
                                                this.confirmationMsg=true;
                                                setTimeout(() =>  window.location.href = '/dashboard', 3000);

                                                });



                           }
                           else{
                              // this.passet=false;
                                window.location.href = '/';
                           }
                    });

    },

    methods:{

    }
}

</script>
