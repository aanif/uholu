<template>
<div class="container" style="width:100%">
<br><br>
<b-alert v-model="supportmessagesent" style="width:92%;margin:auto" variant="success" dismissible>
                       Message Sent
                        </b-alert>
<br><br>
    <div class="content">
                 <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-8">
                                        <div class="card" style="padding-top: 10px;padding-left: 20px;padding-right: 20px;padding-bottom: 20px;">

                                                <div class="card-body">
                                                    <form v-on:submit.prevent="sendSupportMessage()">



                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label>Subject</label>
                                                                            <select class="form-control" name="status" v-model="subject_input" REQUIRED>
                                                                                                    <option  value="Help Center">Help Center</option>
                                                                                                    <option  value="Profile Issues">Profile Issues</option>
                                                                                                    <option  value="Shred Documents">Shred Documents</option>
                                                                                                    <option  value="Delivery Issues">Delivery Issues</option>
                                                                                                    <option  value="Scanning Issues">Scanning Issues</option>
                                                                                                    <option  value="Close Account">Close Account</option>
                                                                                </select>
                                                                                <br>
                                                                        <textarea rows="4" cols="80" class="form-control" name="Message" placeholder="Enter your message here..."  v-model="message_input" REQUIRED></textarea>
                                                                        <br>
                                                                     <button type="submit" class="btn btn-info btn-fill pull-right">Send</button>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        <!--<button type="submit" class="btn btn-info btn-fill pull-right">Update Profile</button>-->
                                                        <div class="clearfix"></div>
                                                    </form>
                                                </div>
                                        </div>
                            </div>

                            </div>
                        </div>
                    </div>

    </div>
</template>
<script>

export default {
props: [

         'user_id',
         'user_name',
         'user_role',
         'user_email',

     ],

    data(){

            return{
                subject_input:null,
                message_input:null,
                supportmessagesent:false,
            }
    },

    mounted() {

    },

    methods:{
    sendSupportMessage(){
        var subject=this.subject_input;
        var message=this.message_input;
        var user_id=this.user_id;
        // var name=this.user_name;
        // var role=this.user_role;
        // var email=this.user_email;
        axios.post('/api/customer-support-create',{
                   subject,
                   message,
                   user_id,
                }).then(response=>{
                    this.subject_input=null;
                    this.message_input=null;
                    this.supportmessagesent=true;
                    setTimeout(() => this.supportmessagesent=false, 5000);
                }).catch(error=>{

                });
    },
    }
}

</script>
