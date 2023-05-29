<script lang="ts">
	import { createEventDispatcher } from 'svelte';
	import Bin from '../../lib/Icons/Bin.svelte';
	import Edit from '../../lib/Icons/Edit.svelte';

	const dispatch = createEventDispatcher(); // creates a custom event that can be used in the parent.
	function onDelete() {
		dispatch('delete'); // custom name here can be used like props - on:delete. Could be on:hello if I wanted
	}

	function onEdit() {
		dispatch('edit');
	}
</script>

<span>
	<button class="edit-button" type="button" on:click={onEdit}><Edit /></button>
	<button class="delete-button" type="button" on:click={() => onDelete()}><Bin /></button>
</span>

<style>
	span {
		display: flex;
		gap: 10px;
		justify-content: flex-end;
	}
	button {
		color: #ffffff;
		padding: 5px 3px 2px 3px;
		width: 40px;
	}
	.edit-button {
		background-color: #f19066;
		&:hover {
			background-color: #f3a683;
		}
	}
	.delete-button {
		background-color: #e15f41;
		&:hover {
			background-color: #e77f67;
		}
	}
</style>
