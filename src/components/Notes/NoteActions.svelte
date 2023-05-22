<script lang="ts">
	import { createEventDispatcher } from 'svelte';

	const dispatch = createEventDispatcher(); // creates a custom event that can be used in the parent.
	function onDelete() {
		dispatch('delete'); // custom name here can be used like props - on:delete. Could be on:hello if I wanted
	}
</script>

<div>
	<button>Edit</button>
	<button type="button" on:click={() => onDelete()}>Delete</button>
</div>

<style>
	div {
		display: flex;
		gap: 10px;
	}
</style>
