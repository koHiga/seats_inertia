<template>
<app-layout>
    <Head title="Booking Seats -Confirm" />

<section class="confirm">
	<div class="container">
		<div class="column">
          <div class="messages-wrapper column">
			<h1>Confirm</h1>
			<p>{{ form.selectedSeatTypes[0]['inJP'] }}に空席がございますので、<br />
			よろしければ確定をタップしてください。</p>
		  </div>

		  <form @submit.prevent="confirmed" class="input-form">
			  <div class="column">
            <div class="num-and-select-buttons row">
              <div class="number-input-wrapper">
                <div class="column">
                  <div class="number-input show-input-number t-center">
					<p class="column">
						{{ form.guestsCountInput }}名様
					</p>
					</div>
                </div>
              </div>

              <div class="seat-select-buttons-wrapper">
				<div class="column">
					<div class="seat-select-buttons show-priority-seat-type">
						<p class="column">{{ theValue }}</p>
					</div>
                </div>
              </div>
            </div>

            <div class="submit-button-wrapper t-center">
              <button
                :type="submit"
                :class="[ 'submit-button',
					{'all-set': checkAllSet} 
				]"
                id="submitButton"
              >
                確 定
              </button>

			  <!-- Debug -->
<button type="button" v-on:click="showValue">showValue</button>
            </div>


			</div>
          </form>
		</div>
    </div>
</section>
        <!-- DEV ONLY: show data passed by SeatController -->
            
        <!-- DEV ONLY: end -->
</app-layout>
</template>

<script>
import { defineComponent } from "vue";
import { Head } from "@inertiajs/inertia-vue3";
import AppLayout from "@/Layouts/AppLayout.vue";
import Header from "../Layouts/Header.vue";
import Footer from "../Layouts/Footer.vue";

export default defineComponent({
  props: [
	  "request", 
	  "seat",
	  "selectedSeatsPropsAdd"
	],

  components: {
    Head,
    AppLayout,
    Header,
    Footer,
  },

  data() {
    return {

		// values below are only for developement
		form: this.$inertia.form({
        	guestsCountInput: this.request.guestsCountInput,
        	selectedSeatTypes: this.selectedSeatsPropsAdd,
        }),
    };
  },

  methods: {

	  showValue() {
		  console.log(this.form.selectedSeatTypes)
	  },
	  
	  confirmed() {
		  console.log("confirmed")
	  },
  },
});
</script>