<template>
    <Head title="Booking Seats -Welcome" />

    <Header></Header>

    <section class="main-section">

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

    <Footer></Footer>

</template>

<script>
    import { defineComponent } from 'vue'
    import { Head } from '@inertiajs/inertia-vue3'
    import Header from '../Layouts/Header.vue'
    import Footer from '../Layouts/Footer.vue'

    export default defineComponent({
        components: {
            Head,
            Header,
            Footer,
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

                    // val1: InputNum validated
                    if (val1 > 0 && val1 <= 50) {

                        console.log(val1, val2)
                        this.checkInputNum = true

                        if (val2.length >= 1 && val2.length <= 3) {
                            this.checkAllSet = true
                        } else {
                            this.checkAllSet = false
                        }

                    } else {
                        // When input number is valid and any of seatType is selected,
                        // make confirm button active.
                        
                        console.log(val1, val2)
                        this.checkInputNum = false
                        this.checkAllSet = false
                        
                        // val2: selectedSetTypes is validattion
                        
                    }
                },
                {
                    deep: true
                },
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
