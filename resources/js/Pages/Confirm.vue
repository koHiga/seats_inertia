<template>
<app-layout>
    <Head title="Booking Seats -Confirm" />

<section class="main-section">
<div class="container">
	<h1>Confirm</h1>
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
    import { defineComponent } from 'vue'
    import { Head, Link } from '@inertiajs/inertia-vue3';
    import AppLayout from '@/Layouts/AppLayout.vue'
    import Header from '../Layouts/Header.vue'
    import Footer from '../Layouts/Footer.vue'

    export default defineComponent({
        props: [
			'request',
            'seat'
			],

        components: {
            Head,
            Link,
            AppLayout,
            Header,
            Footer,
        },

        data() {
            return {
                guestsCountInput: this.request.guestsCountInput,
                selectedSeatTypes: this.request.selectedSeatTypes,
            }
        },

		methods: {
		},
    })
</script>