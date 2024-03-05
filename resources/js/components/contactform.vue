<template>
<div class="container" style="width:100%">




<div class="container pt-lg-md">
        <div class="row justify-content-center">
          <div class="col-lg-5">
            <div class="card bg-secondary shadow border-0" style="margin-top:100px;margin-bottom:50px">
              <!--{{-- <div class="card-header bg-white pb-5">
                <div class="text-muted text-center mb-3"><small>Sign in with</small></div>
                <div class="btn-wrapper text-center">
                  <a href="#" class="btn btn-neutral btn-icon">
                    <span class="btn-inner--icon">
                      <img alt="image" src="{{ asset('assets-m/img/icons/common/github.svg')}}">
                    </span>
                    <span class="btn-inner--text">Github</span>
                  </a>
                  <a href="#" class="btn btn-neutral btn-icon">
                    <span class="btn-inner--icon">
                      <img alt="image" src="{{ asset('assets-m/img/icons/common/google.svg')}}">
                    </span>
                    <span class="btn-inner--text">Google</span>
                  </a>
                </div>
              </div> --}}-->
              <br><br>

              <div class="card-body px-lg-5 py-lg-5" >
                <div class="text-center text-muted mb-4">
                  <small>Fill in the contact form</small>
                </div>
                <form v-on:submit.prevent="submitForm">

                  <div class="form-group mb-3">
                    <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                      </div>
                      <input class="form-control" placeholder="Email" type="email" name="email" id="email" v-model="email" REQUIRED>
                    </div>
                  </div>
                  <div class="form-group mb-3">
                    <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-user"></i></span>
                      </div>
                      <input class="form-control" placeholder="Name" type="text" name="name" id="name" v-model="name" REQUIRED>
                    </div>
                  </div>
                  <div class="form-group mb-3">
                    <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-phone"></i></span>
                      </div>
                      <input class="form-control" placeholder="Phone" type="text" name="phone" id="phone" v-model="phone" REQUIRED>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">
                        <span class="input-group-text"></span>
                      </div>
                      <textarea rows="4" cols="80" class="form-control" placeholder="Message" type="text" name="message" id="message" v-model="message" REQUIRED></textarea>
                    </div>
                  </div>

                  <div class="text-center">
                    <button type="submit" id="signin" class="btn btn-primary my-4" style="color:black;border-color:#FCD206;background-color:#FCD206;display:;margin:auto">Submit</button>
                  </div>
                </form>
              </div>
            </div>
            <div class="row mt-3">


            </div>
          </div>
        </div>
      </div>

<b-alert v-model="showDismissibleAlert" style="width:92%;margin:auto;margin-top:50px;margin-bottom:50px" variant="success" dismissible>
                        Form Submitted
                        </b-alert>





</div>
</template>
<script>

export default {


    data(){

            return{
                name:null,
                email:null,
                phone:null,
                message:null,
                showDismissibleAlert:false,
            }
    },

    mounted() {

    },

    methods:{
        submitForm(){
            var name=this.name;
            var email=this.email;
            var phone=this.phone;
            var message=this.message;
            axios.post('/api/contact-form-message-create',{
                name,
                email,
                phone,
                message,
            }).then(response => {
                this.showDismissibleAlert=true;
                     setTimeout(() => this.showDismissibleAlert=false, 5000);
                     this.name=null;
                     this.email=null;
                     this.phone=null;
                     this.message=null;
            });
        }
    }
}

</script>
