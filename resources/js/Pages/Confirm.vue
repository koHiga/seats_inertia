<template>
	<h1>Confirm</h1>
	<div>
		<p>{{ guestsCountInput }}</p>
        <p>{{ selectedSeatTypes }}</p>
	</div>


        <!-- DEV ONLY: show data passed by SeatController -->
        <span class="dbShow">
            <tbody>
                <tr v-for="seat in seats" :key="seat.id">
                    <td>{{ seat.seatType }}</td>
                    <td>{{ seat.remainingSeats }}</td>
                </tr>
            </tbody>
        </span>
        <!-- DEV ONLY: end -->
</template>

<script>
    import { defineComponent } from 'vue'
    import { Head, Link } from '@inertiajs/inertia-vue3';

    export default defineComponent({
        props: [
			'seats',
			'request'
			],

        components: {
            Head,
            Link,
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