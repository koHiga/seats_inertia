<template>
    <Head title="Booking Seats -Welcome" />

    <section id="screenTransitions">

        <h1>Welcome To Our Shop</h1>
        <p>We wan to to know how many people coming together,<br />and our staff will take you to your seat.</p>

        <div class="userInputArea">

            <form @submit.prevent="confirm">
				<input type="number" v-model="form.guestsCountInput" />
                <p v-if="!checkInputNum">1から50の整数で入力してください。</p>
                <p v-else>お客様の人数をご入力ください。</p>

				<input type="button" v-for="seatType in seatTypes" v-bind:value="seatType.id" :key="seatType.id" v-on:click="sstBasket">

				<button :type="submit" :disabled="!checkAllSet">確認</button>
            </form>

        </div>

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
                checkInputNum: true,
                checkAllSet: false,

                form: this.$inertia.form({
                    guestsCountInput: '',
                    selectedSeatTypes: [],
                }),

                seatTypes: [
                    {id: 'counter', jp: 'カウンター'},
                    {id: 'tableSeat', jp: 'テーブル席'},
                    {id: 'tatamiRoom', jp: '座敷席'},
                ],

                
            }
        },

        created() {

            this.$watch(
                () => [this.$data.form.guestsCountInput, this.$data.form.selectedSeatTypes],
                ([val1, val2]) => {
                    if (val1 < 0) {
                        console.log(val1, val2)
                    this.checkInputNum = false
                    }
                }
            )
        },

		methods: {
            sstBasket(event) {
                if (this.form.selectedSeatTypes.includes(event.target.value)){

                    let idx = this.form.selectedSeatTypes.indexOf(event.target.value)
                    this.form.selectedSeatTypes.splice(idx, 1)

                } else {

                    this.form.selectedSeatTypes.push(event.target.value)
                }
                console.log(this.form.selectedSeatTypes)
            },

            confirm() {
                console.log("send post")
                this.form.post('/confirm')
            }
		},
    })
</script>
