<script>
	import Textbox from '../lib/Textbox.svelte';

	let showTextbox = false;

	function handleClick() {
		showTextbox = true;
	}
</script>

<button on:click={handleClick}>Add a new note</button>

{#if showTextbox}
	<Textbox />
{/if}
