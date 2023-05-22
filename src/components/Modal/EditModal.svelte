<script lang="ts">
	import { createEventDispatcher } from 'svelte';
	import type { NoteData } from '../../model';
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
	<button type="button" on:click={saveData}>Save</button>
	<button type="button" on:click={closeModal}>Close</button>
</Modal>
