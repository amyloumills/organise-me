<script lang="ts">
	import { createEventDispatcher } from 'svelte';
	import type { NoteData } from '../../types';
	import { v4 as uuidv4 } from 'uuid';

	export let notes: NoteData[];

	const dispatch = createEventDispatcher();

	let showModal = false;

	let newNote: NoteData = {
		id: '',
		title: '',
		body: '',
		priority: '',
		status: '',
		tagIds: [],
		pinned: false,
		createdAt: 0,
		updatedAt: 0
	};

	function createNote() {
		newNote.id = uuidv4();

		notes = [...notes, newNote];

		dispatch('create');
		closeModal();
	}

	function closeModal() {
		showModal = false;
	}

	function openModal() {
		showModal = true;
	}
</script>

<button on:click={openModal} class="create-button">Create Note</button>

{#if showModal}
	<div class="modal">
		<h2>Create Note</h2>
		<!-- Add input fields -->
		<input type="text" bind:value={newNote.title} placeholder="Enter title" />
		<textarea bind:value={newNote.body} />
		<span>
			<input bind:checked={newNote.pinned} type="checkbox" id="pinned" />
			<label for="pinned">Pin to top</label>
		</span>
		<label for="priority">Set Priority:</label>
		<select bind:value={newNote.priority} name="priority" id="priority">
			<option value="high">High</option>
			<option value="normal">Normal</option>
			<option value="low">Low</option>
		</select>

		<button on:click={createNote}>Create Note</button>
		<button on:click={closeModal}>Cancel</button>
	</div>
{/if}

<style>
	.create-button {
		width: 20vw;
		height: 50px;
		margin-left: 10px;
		font-size: 1rem;
		padding: 10px;
	}

	.modal {
		position: fixed;
		top: 50%;
		left: 50%;
		transform: translate(-50%, -50%);
		background-color: white;
		padding: 20px;
		border-radius: 5px;
		box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
	}
</style>
