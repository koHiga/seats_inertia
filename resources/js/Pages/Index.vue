<template>
    <Head title="Booking Seats -Welcome" />

    <section id="screenTransitions">

        <h1>Welcome To Our Shop</h1>
        <p>We wan to to know how many people coming together,<br />and our staff will take you to your seat.</p>

        <input type="number" v-model="guestsCountInput" />

        <button type="button" v-for="seatType in seatTypes" v-bind:value="seatType.id" :key="seatType.id">
            {{ seatType.jp }}
        </button>

        <inertia-link :href="route('confirm')">
            <button type="button" value="confirm">確認</button>
        </inertia-link>
        
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
    import { Head, InertiaLink } from '@inertiajs/inertia-vue3';

    export default defineComponent({
        props: ['seats'],

        components: {
            Head,
            InertiaLink,
        },

        data() {
            return {
                guestsCountInput: Number,
                seatTypes: [
                    {id: 'counter', jp: 'カウンター'},
                    {id: 'tableSeat', jp: 'テーブル席'},
                    {id: 'tatamiRoom', jp: '座敷席'},
                ]
            }
        },
    })
</script>
