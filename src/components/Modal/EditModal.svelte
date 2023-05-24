<script lang="ts">
	import { createEventDispatcher } from 'svelte';
	import type { NoteData } from '../../types';
	import Modal from './Modal.svelte';

	export let showModal = false;
	export let data: NoteData | null;

	const dispatch = createEventDispatcher();

	function closeModal() {
		showModal = false;
	}

	function saveData() {
		dispatch('save', data);
		closeModal();
	}
</script>

<Modal bind:showModal>
	<h2>Edit Note</h2>
	<input type="text" bind:value={data.title} />
	<textarea bind:value={data.body} />
	<span class="button-span">
		<button type="button" on:click={saveData}>Save</button>
		<button type="button" on:click={closeModal}>Close</button>
	</span>
</Modal>

<style>
	button {
		width: 100px;
		background-color: #f19066;
		border-style: none;
		border-radius: 8px;
		color: #ffffff;
		font-weight: 500;
		line-height: 20px;
		height: 40px;
		margin: 0;
		outline: none;
		padding: 10px 16px;
		transition: background-color 200ms;
	}
	button:hover {
		background-color: #f3a683;
	}

	.button-span {
		display: flex;
		flex-direction: row nowrap;
		justify-content: space-between;
	}
	textarea {
		overflow: auto;
	}
</style>
