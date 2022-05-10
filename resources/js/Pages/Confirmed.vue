<template>
<app-layout>
    <Head title="Booking Seats -Confirm" />

<section class="confirmed">
	<div class="container">
		<div class="column">
        	<div class="messages-wrapper column">
				<h1>確認画面</h1>
				<p>クルーがご希望の座席へご案内いたしますので、<br />しばらくお待ちください。</p>
			</div>

			<div class="confirmed-wrapper column">
			
				<div class="submit-button-wrapper t-center">
					<div
						v-on:click="backToIndex"
						class="back-button all-set"
					>
						戻 る
					</div>
				</div>
        	</div>
		</div>
    </div>
</section>
        <!-- DEV ONLY: show data passed by SeatController -->
            
        <!-- DEV ONLY: end -->
</app-layout>
</template>

<script>
import { defineComponent } from 'vue'

export default defineComponent({
	props: [
		'request'
	],

	data() {
		return {

		}
	}
})
</script>
