<template>
<div class="container" style="width:100%">


<h4 style="margin-left:20px;color:#777777"> <b>Change Password</b> </h4>

<b-alert v-model="updatedPasswordMessage" style="width:92%;margin:auto" variant="success" dismissible>
                       Password Updated
                        </b-alert>
<br><br>
    <div class="content">
                 <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-8">
                                        <div class="card" style="padding-top: 10px;padding-left: 20px;padding-right: 20px;padding-bottom: 20px;">

                                                <div class="card-body">
                                                    <form v-on:submit.prevent="updatePassword()">



                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <input type="email" v-model="emailadd" style="display:none">
                                                                        <label>Old password</label>
                                                                        <input type="password" class="form-control" placeholder="Enter Password" v-model="oldpassword" required><p style='color:red'>{{PasswordResultsErrold}}</p>
                                                                        <br>
                                                                        <label>New Password</label>
                                                                        <input type="password" class="form-control" placeholder="Enter Password" v-model="newpassword" required>
                                                                        <br>
                                                                        <label>Re-enter New Password</label>
                                                                        <input type="password" class="form-control" placeholder="Enter Password" v-model="renewpassword" required><p style='color:red'>{{PasswordResultsErr}}</p>
                                                                                <br>

                                                                        <br>
                                                                     <button type="submit" class="btn btn-info btn-fill pull-right">Update Password</button>
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
         'email'
        ],

    data(){

            return{
                oldpassword:null,
                newpassword:null,
                renewpassword:null,
                PasswordResultsErr:null,
                PasswordResultsErrold:null,
            }
    },

    mounted() {
        emailadd=this.email;
    },

    methods:{
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
                                            this.updatedPasswordMessage=true;
                                            setTimeout(() => this.updatedPasswordMessage=false,5000);
                                            this.newpassword=null;
                                            this.renewpassword=null;
                                            this.oldpassword=null;
                                            this.PasswordResultsErrold="";
                                            this.PasswordResultsErr="";
                                        }
                                        if(response.data.message=='password_mismatch'){
                                            this.PasswordResultsErrold="Incorrect old Password";
                                            setTimeout(() => this.PasswordResultsErr="",5000);
                                        }
                                    });
                         }
            }
    }
}

</script>
