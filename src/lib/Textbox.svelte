<script>
	import { createEventDispatcher } from 'svelte';

	export let value = '';

	const dispatch = createEventDispatcher();

	function handleChange(event) {
		const newValue = event.target.value;
		value = newValue;
		dispatch('input', newValue);
	}
</script>

<input type="text" bind:value on:input={handleChange} />
