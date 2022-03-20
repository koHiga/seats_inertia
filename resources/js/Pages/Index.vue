<template>
  <app-layout>
    <Head title="Booking Seats -Welcome" />

    <section class="home">
      <div class="container">
        <div class="column">
          <div class="messages-wrapper column">
            <h1>当店へようこそ</h1>
            <p id="openingMessage">
              空席を確認いたしますので、お客さまの人数と<br />
			  ご希望の席の種類をご選択ください。
            </p>
          </div>

          <form @submit.prevent="confirm" class="input-form">
			  <div class="column">
            <div class="num-and-select-buttons row">
              <div class="number-input-wrapper">
                <div class="column">
                  <input
                    type="number"
                    v-model="form.guestsCountInput"
                    v-bind:class="[
						'number-input',
						't-center', 
						!checkInputNum ? 'invalidNum' : 'validNum'
					]"
                    autocomplete="off"
                    required
                  />
                  <p v-if="!checkInputNum" class="input-part-message">
                    1から50の整数で入力してください。
                  </p>
                  <p v-else class="input-part-message">
                    お客様の人数をご入力ください。
                  </p>
                </div>
              </div>

              <span class="number-input-suffix">名様</span>

              <div class="seat-select-buttons-wrapper">
				<div class="column">
					<div class="seat-select-buttons column">
						<input 
							type="button"
							v-for="seatType in seatTypes"
							:key="seatType.id"
							v-bind:value="seatType.inJP"
							v-on:click="sstBasket"
							class="seat-select-button neumorphism"
						/>
					</div>
                  <p v-if="!checkInputNum" class="input-part-message">
                    1から50の整数で入力してください。
                  </p>
                  <p v-else class="input-part-message">
                    ご希望の席種をご選択ください。
                  </p>
                </div>
              </div>
            </div>

            <div class="submit-button-wrapper t-center">
              <button
                :type="submit"
                :class="[ 'submit-button',
				{'all-set': checkAllSet} ]"
                id="submitButton"
                :disabled="!checkAllSet"
              >
                確 認
              </button>
            </div>

			</div>
          </form>
        </div>
      </div>
    </section>
  </app-layout>
</template>

<script>
import { defineComponent } from "vue";
import { Head } from "@inertiajs/inertia-vue3";
import AppLayout from "@/Layouts/AppLayout.vue";
import Header from "../Layouts/Header.vue";
import Footer from "../Layouts/Footer.vue";

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
        guestsCountInput: "",
        selectedSeatTypes: [],
      }),

      seatTypes: [
        { id: "counter", inJP: "カウンター" },
        { id: "tableSeat", inJP: "テーブル席" },
        { id: "tatamiRoom", inJP: "座敷席" },
      ],
    };
  },

  created() {
    this.$watch(
      () => [
        this.$data.form.guestsCountInput,
        this.$data.form.selectedSeatTypes,
      ],
      ([val1, val2]) => {
        // val1: InputNum's validation
        if (val1 > 0 && val1 <= 50 || val1 == '') {
          console.log(val1, val2);
          this.checkInputNum = true;

		  // val2: selectedSetTypes' validattion
          if (val2.length >= 1 && val2.length <= 3) {

			  if (val1 != '') {
				this.checkAllSet = true;
			  } else {
				this.checkAllSet = false;
			  }
          } else {
            this.checkAllSet = false;
          }
        } else {
          // When input number is valid and any of seatType is selected,
          // make confirm button active.

          console.log(val1, val2);
          this.checkInputNum = false;
          this.checkAllSet = false;

          
        }
      },
      {
        deep: true,
      }
    );
  },

  methods: {
    sstBasket(event) {
      if (this.form.selectedSeatTypes.includes(event.target.value)) {
        let idx = this.form.selectedSeatTypes.indexOf(event.target.value);
        this.form.selectedSeatTypes.splice(idx, 1);
        event.target.classList.remove("selected");
      } else {
        this.form.selectedSeatTypes.push(event.target.value);
        event.target.classList.add("selected");
      }
      console.log(this.form.selectedSeatTypes);
    },

    confirm() {
      console.log("send post");
      this.form.post(route("confirm"));
    },
  },
});
</script>
