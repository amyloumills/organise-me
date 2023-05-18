<script lang="ts">
	import { writable } from 'svelte/store';

	import Textbox from '../lib/Textbox.svelte';

	let textboxes = writable<{}[]>([]);

	function addTextbox() {
		textboxes.update((arr) => [...arr, {}]);
	}
</script>

<button on:click={addTextbox}>Add a new note</button>

{#each $textboxes as textbox, i}
	<Textbox key={i} />
{/each}
