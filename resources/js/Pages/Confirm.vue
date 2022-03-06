<template>
    <Head title="Booking Seats -Confirm" />

    <Header></Header>

<div class="container">
	<h1>Confirm</h1>
	<div>
		<p>{{ guestsCountInput }}</p>
        <p>{{ selectedSeatTypes }}</p>
	</div>
    </div>

    <Footer></Footer>
        <!-- DEV ONLY: show data passed by SeatController -->
            
        <!-- DEV ONLY: end -->
</template>

<script>
    import { defineComponent } from 'vue'
    import { Head, Link } from '@inertiajs/inertia-vue3';
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
            Header,
            Footer,
        },

        data() {
            return {
                guestsCountInput: this.request.guestsCountInput,
                selectedSeatTypes: this.request.selectedSeatTypes,
                seatTypes: [
                    {id: 'counter', jp: 'カウンター'},
                    {id: 'tableSeat', jp: 'テーブル席'},
                    {id: 'tatamiRoom', jp: '座敷席'},
                ],
            }
        },

		methods: {
		},
    })
</script>