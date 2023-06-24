<script lang="ts">
	import { createEventDispatcher } from 'svelte';
	import Modal from './Modal.svelte';
	import type { NoteData } from '../../types';

	const dispatch = createEventDispatcher();
	export let data: NoteData;

	export let showModal = true;

	function closeModal() {
		showModal = false;
	}

	function onDelete() {
		dispatch('delete');
		closeModal();
	}
</script>

<Modal bind:showModal>
	<p>Are you sure you want to delete "{data.title}"?</p>
	<span class="button-span">
		<button class="cancel-button" on:click={closeModal}>Cancel</button>
		<button class="delete-button" on:click|once={onDelete}>Yes</button>
	</span>
</Modal>

<style lang="scss">
	.button-span {
		display: flex;
		flex-direction: row nowrap;
		justify-content: space-between;
	}
	.cancel-button {
		padding: 10px;
		background-color: $red;
		color: #ffffff;
		&:hover {
			background-color: #e77f67;
		}
	}

	.delete-button {
		background-color: #546de5;
		color: #ffffff;
		padding: 10px;
		&:hover {
			background-color: #778beb;
		}
	}
</style>
