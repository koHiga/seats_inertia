<template>
    <Head title="Booking Seats -Welcome" />

    <section id="screenTransitions">

        <h1>Welcome To Our Shop</h1>
        <p>We wan to to know how many people coming together,<br />and our staff will take you to your seat.</p>

        <input type="number" v-model="guestsCountInput" />

        <button type="button" v-for="seatType in seatTypes" v-bind:value="seatType.id">
            {{ seatType.jp }}
        </button>

        <button type="button" value="confirm">確認</button>
        

    </section>
</template>

<script>
    import { defineComponent } from 'vue'
    import { Head } from '@inertiajs/inertia-vue3';

    export default defineComponent({
        components: {
            Head,
        },

        props: {

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
