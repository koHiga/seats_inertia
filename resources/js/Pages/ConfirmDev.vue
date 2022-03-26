<template>
<app-layout>
    <Head title="Booking Seats -Confirm" />

<section class="confirm">
	<div class="container">
		<div class="column">
          <div class="messages-wrapper column">
			<h1>Confirm</h1>
			<p>よろしければ、&#123;&#123; prioritizedSeatType &#125;&#125;にご案内いたします。</p>
		  </div>
		</div>

	<div>
		<p>{{ guestsCountInput }}</p>
		<div v-for="selectedSeatType in selectedSeatTypes">
			{{ selectedSeatType.id }}
		</div>
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
  //props: ["request", "seat"],

  components: {
    Head,
    AppLayout,
    Header,
    Footer,
  },

  data() {
    return {

		// values below are only for developement
		guestsCountInput: 5,
        selectedSeatTypes: [
        	{ id: "counter", inJP: "カウンター" },
        	{ id: "tableSeat", inJP: "テーブル席" },
        	{ id: "tatamiRoom", inJP: "座敷席" },
		],

    };
  },

  methods: {},
});
</script>