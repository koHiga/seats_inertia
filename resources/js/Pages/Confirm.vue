<template>
<app-layout>
    <Head title="Booking Seats -Confirm" />

<section class="confirm">
	<div class="container">
		<div class="column">
          <div class="messages-wrapper column">
			<h1>Confirm</h1>
			<p>{{ form.prioritizedOrderForGuidance[0]['inJP'] }}に空席がございますので、<br />
			よろしければ確定をタップしてください。</p>
		  </div>

		  <form @submit.prevent="backToIndex" class="confirm-form column">
			<div class="show-input-number">
					<p>
						{{ form.guestsCountInput }}名様
					</p>
					<p>
						{{ form.prioritizedOrderForGuidance[0]['inJP'] }}
					</p>
            </div>

			<div class="submit-button-wrapper t-center">

				<button
					:type="submit"
					class="back-button all-set"
				>
					修 正
				</button>
				<!--
				<button
					:type="submit"
					class="submit-button all-set"
					id="submitButton"
				>
					確 定
				</button>
				-->

			<!-- Debug 
				<button type="button" v-on:click="showValue">showValue</button>
			-->
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
import { Inertia } from "@inertiajs/inertia"
import { Head } from "@inertiajs/inertia-vue3";
import AppLayout from "@/Layouts/AppLayout.vue";
import Header from "../Layouts/Header.vue";
import Footer from "../Layouts/Footer.vue";

export default defineComponent({
  props: [
	  "request",
	  "prioritizedOrderForGuidance"
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
			selectedSeatTypes: this.request.selectedSeatTypes, // it is not rendered but pass data through
        	prioritizedOrderForGuidance: this.prioritizedOrderForGuidance,
        }),
    };
  },

  methods: {

	showValue() {
		console.log(this.form.prioritizedOrderForGuidance)
	},
	  
	confirmed() {
		console.log("confirmed")
		this.form.post(route("confirmed"))
	},

	backToIndex() {
		console.log("send post");
		this.form.post(route("edit"));
  	},
  }
})
</script>