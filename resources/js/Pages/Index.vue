<template>
  <app-layout>
    <Head title="Booking Seats -Welcome" />

    <section class="home">
      <div class="container">
        <div class="column">
          <div class="messages-wrapper">
            <h1>Welcome To Our Shop</h1>
            <p id="openingMessage">
              We wan to to know how many people coming together,<br />and our
              staff will take you to your seat.
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
                    v-bind:class="{}"
                    autocomplete="off"
                    class="number-input"
                    required
                  />
                  <p v-if="!checkInputNum" class="gcInput-message">
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
						v-bind:value="seatType.id"
						:key="seatType.id"
						v-on:click="sstBasket"
						class="seat-select-button"
					/>
					</div>
                  <p v-if="!checkInputNum" class="gcInput-message">
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
                :class="{ 'all-set': checkAllSet }"
                id="submitButton"
                :disabled="!checkAllSet"
              >
                確認
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
        { id: "counter", jp: "カウンター" },
        { id: "tableSeat", jp: "テーブル席" },
        { id: "tatamiRoom", jp: "座敷席" },
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
        // val1: InputNum validated
        if (val1 > 0 && val1 <= 50) {
          console.log(val1, val2);
          this.checkInputNum = true;

          if (val2.length >= 1 && val2.length <= 3) {
            this.checkAllSet = true;
          } else {
            this.checkAllSet = false;
          }
        } else {
          // When input number is valid and any of seatType is selected,
          // make confirm button active.

          console.log(val1, val2);
          this.checkInputNum = false;
          this.checkAllSet = false;

          // val2: selectedSetTypes is validattion
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
