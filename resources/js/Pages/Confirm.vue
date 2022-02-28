<template>
	<h1>Confirm</h1>
	<div>
		<p>{{ guestsCountInput }}</p>
	</div>
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