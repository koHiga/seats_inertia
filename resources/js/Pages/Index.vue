<template>
    <Head title="Booking Seats -Welcome" />

    <section id="screenTransitions">

        <h1>Welcome To Our Shop</h1>
        <p>We wan to to know how many people coming together,<br />and our staff will take you to your seat.</p>

        <section class="userInputArea">

            <form @submit.prevent="confirm">
				<input type="number" v-model="form.guestsCountInput" />

				<input type="button" v-for="seatType in seatTypes" v-bind:value="seatType.id" :key="seatType.id">

				<button :type="submit">確認</button>
            </form>

        </section>
        
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

    </section>
</template>

<script>
    import { defineComponent } from 'vue'
    import { Head } from '@inertiajs/inertia-vue3'

    export default defineComponent({
        components: {
            Head
        },

        data() {
            return {
                form: this.$inertia.form({
                    guestsCountInput: '',
                }),

                seatTypes: [
                    {id: 'counter', jp: 'カウンター'},
                    {id: 'tableSeat', jp: 'テーブル席'},
                    {id: 'tatamiRoom', jp: '座敷席'},
                ],
            }
        },

		methods: {
            confirm() {
                console.log("send post")
                this.form.post('/confirm')
            }
		},
    })
</script>
