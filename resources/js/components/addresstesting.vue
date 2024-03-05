<template>
<div class="container" style="width:100%">



<!--<div id="locationField">
    <input id="autocomplete"
           placeholder="Enter your address"
           onFocus="geolocate()"
           type="text"/>
  </div>-->

  <!-- Note: The address components in this sample are typical. You might need to adjust them for
             the locations relevant to your app. For more information, see
       https://developers.google.com/maps/documentation/javascript/examples/places-autocomplete-addressform
  -->

<!--
  <table id="address">
    <tr>
      <td class="label">Street address</td>
      <td class="slimField"><input class="field" id="street_number" disabled="true"/></td>
      <td class="wideField" colspan="2"><input class="field" id="route" disabled="true"/></td>
    </tr>
    <tr>
      <td class="label">City</td>
      <td class="wideField" colspan="3"><input class="field" id="locality" disabled="true"/></td>
    </tr>
    <tr>
      <td class="label">State</td>
      <td class="slimField"><input class="field" id="administrative_area_level_1" disabled="true"/></td>
      <td class="label">Zip code</td>
      <td class="wideField"><input class="field" id="postal_code" disabled="true"/></td>
    </tr>
    <tr>
      <td class="label">Country</td>
      <td class="wideField" colspan="3"><input class="field" id="country" disabled="true"/></td>
    </tr>
  </table>-->


<!-- Replace the value of the key parameter with your own API key. -->



<vue-google-autocomplete
            ref="address"
            id="map"
            classname="form-control"
            placeholder="Please type your address"
            v-on:placechanged="getAddressData"
            country="au"
        >
        </vue-google-autocomplete>







</div>
</template>
<script>
import VueGoogleAutocomplete from 'vue-google-autocomplete'
export default {
    components: { VueGoogleAutocomplete },

    data(){

            return{
                 address: ''
            }
    },

    mounted() {
        // VueGoogleAutocomplete.loaded.then(() => {
        // console.log('map loaded')});

        //setTimeout(() => {console.log(this.address.locality);}, 15000);
this.$refs.address.focus();
    },

    methods:{
getAddressData(addressData, placeResultData, id) {
                this.address = addressData;
                console.log(this.address.postal_code)
            }
    }
}

</script>
