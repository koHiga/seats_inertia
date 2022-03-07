<template>
  <app-layout>
    <Head title="Booking Seats -Welcome" />

    <section class="input-form">
      <h1>Welcome To Our Shop</h1>
      <p id="openingMessage">We wan to to know how many people coming together,<br />and our staff will take you to your seat.</p>

      <div class="functions-wrapper">

        <form @submit.prevent="confirm" id="seatForm">
					<div class="row">
						<div class="gcInput-wrapper">
        			<input type="number"
								v-model="form.guestsCountInput" 
								v-bind:class="{}"
								autocomplete="off"
								class="gcInput"
								required
							/>
        			<p v-if="!checkInputNum" class="gcInput-message">1から50の整数で入力してください。</p>
        			<p v-else class="gcInput-message">お客様の人数をご入力ください。</p>
						</div>

						<div class="submit-button-wrapper">
							<input type="button"
								v-for="seatType in seatTypes"
								v-bind:value="seatType.id" 
								:key="seatType.id" 
								v-on:click="sstBasket"
								id="submitButton"
							/>
						</div>
        		
					</div>
        <button :type="submit" :disabled="!checkAllSet">確認</button>
        </form>

      </div>
    </section>

  </app-layout>
</template>

<script>
    import { defineComponent } from 'vue'
    import { Head } from '@inertiajs/inertia-vue3'
    import AppLayout from '@/Layouts/AppLayout.vue'
    import Header from '../Layouts/Header.vue'
    import Footer from '../Layouts/Footer.vue'

    export default defineComponent({
        components: {
            Head,
            AppLayout,
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
                this.form.post(route('confirm'))
            }
		},
    })
</script>
