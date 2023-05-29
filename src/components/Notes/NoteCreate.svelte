<script lang="ts">
	import { createEventDispatcher } from 'svelte';
	import type { NoteData } from '../../types';
	import { v4 as uuidv4 } from 'uuid';
	import CreateModal from '../Modal/CreateModal.svelte';
	import Add from '../../lib/Icons/Add.svelte';

	export let notes: NoteData[];

	const dispatch = createEventDispatcher();

	let showModal = false;

	let newNote: NoteData = {
		id: uuidv4(),
		title: '',
		body: '',
		priority: '',
		status: '',
		tagIds: [''],
		pinned: false,
		createdAt: 0,
		updatedAt: 0
	};

	let inProgress = false;

	async function createNote() {
		if (inProgress) return;
		inProgress = true;
		notes = [...notes, newNote];
		console.log(notes);
		dispatch('create');
		inProgress = false;
		newNote = {
			id: uuidv4(),
			title: '',
			body: '',
			priority: '',
			status: '',
			tagIds: [''],
			pinned: false,
			createdAt: 0,
			updatedAt: 0
		};
		closeModal();
	}

	function closeModal() {
		showModal = false;
	}

	function openModal() {
		showModal = true;
	}
</script>

<button on:click={openModal} class="create-button">Create Note<Add /></button>

{#if showModal}
	<CreateModal {newNote} on:create={createNote} on:close={closeModal} />
{/if}

<style lang="scss">
	.create-button {
		display: flex;
		align-items: center;
		justify-content: space-evenly;
		width: 10vw;
		height: 50px;
		margin-left: 10px;
		font-size: 1rem;
		padding: 10px;
		background-color: #546de5;
		color: #ffffff;
		&:hover {
			background-color: #778beb;
		}
	}
</style>
