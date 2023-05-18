<script>
	import Textbox from '../lib/Textbox.svelte';

	let textboxValue = '';

	function handleInput(event) {
		textboxValue = event.detail;
	}
</script>

<Textbox bind:value={textboxValue} on:input={handleInput} />

<p>Textbox value: {textboxValue}</p>
