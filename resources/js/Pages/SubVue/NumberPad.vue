<template>
	<div class="number-pad-wrapper">
			<table class="number-pad">
				<tr>
					<td>
						<input 
							type="button"
							v-on:click="detectInputs($event)"
							value="7"
						/>
					</td>
					<td>
						<input 
							type="button"
							v-on:click="detectInputs($event)"
							value="8"
						/>
					</td>
					<td>
						<input 
							type="button"
							v-on:click="detectInputs($event)"
							value="9"
						/>
					</td>
				</tr>
				<tr>
					<td>
						<input 
							type="button"
							v-on:click="detectInputs($event)"
							value="4"
						/>
					</td>
					<td>
						<input 
							type="button"
							v-on:click="detectInputs($event)"
							value="5"
						/>
					</td>
					<td>
						<input 
							type="button"
							v-on:click="detectInputs($event)"
							value="6"
						/>
					</td>
				</tr>
				<tr>
					<td>
						<input 
							type="button"
							v-on:click="detectInputs($event)"
							value="1"
						/>
					</td>
					<td>
						<input 
							type="button"
							v-on:click="detectInputs($event)"
							value="2"
						/>
					</td>
					<td>
						<input 
							type="button"
							v-on:click="detectInputs($event)"
							value="3"
						/>
					</td>
				</tr>
				<tr>
					<td>
						<input 
							type="button"
							v-on:click="detectInputs($event)"
							value="0"
						/>
					</td>
				</tr>
			</table>
	</div>
</template>

<script>
    import { defineComponent } from 'vue'

    export default defineComponent({
        props: {
        },

        components: {
        },

        data() {
            return {

				numbersInput: '',
				
            }
        },

        methods: {
            detectInputs(event) {
				console.log(event.target.value)

				this.numbersInput += event.target.value
				console.log(this.numbersInput)
				this.$emit('passNumbers', this.numbersInput)
			}
        }
    })
</script>