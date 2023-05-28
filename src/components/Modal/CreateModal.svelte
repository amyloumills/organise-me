<script>
	import { createEventDispatcher } from 'svelte';
	import Modal from './Modal.svelte';
	import { v4 as uuidv4 } from 'uuid';
	export let newNote = {
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

	const dispatch = createEventDispatcher();
	export let showModal = true;
	const create = () => dispatch('create');
	const closeModal = () => dispatch('close');
</script>

<Modal bind:showModal>
	<h2>Create Note</h2>
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
	<span class="button-span">
		<button on:click={create}>Create Note</button>
		<button on:click={closeModal}>Cancel</button>
	</span>
</Modal>
