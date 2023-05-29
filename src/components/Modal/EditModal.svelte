<script lang="ts">
	import { createEventDispatcher } from 'svelte';
	import type { NoteData } from '../../types';
	import Modal from './Modal.svelte';

	export let showModal = false;
	export let data: NoteData;

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
	<span>
		<input bind:checked={data.pinned} type="checkbox" id="pinned" />
		<label for="pinned">Pin to top</label>
	</span>
	<span>
		<label for="priority">Change Priority:</label>
		<select bind:value={data.priority} name="priority" id="priority">
			<option value="high">High</option>
			<option value="normal">Normal</option>
			<option value="low">Low</option>
		</select>
	</span>
	<span>
		<label for="status">Set current status</label>
		<select bind:value={data.status} name="status" id="status">
			<option value="todo">To Do</option>
			<option value="inProgress">In Progress</option>
			<option value="completed">Completed</option>
		</select>
	</span>
	<span class="button-span">
		<button type="button" on:click={saveData}>Save</button>
		<button type="button" on:click={closeModal}>Close</button>
	</span>
</Modal>

<style>
	button {
		width: 100px;
		background-color: #f19066;
		color: #ffffff;
		font-weight: 500;
		line-height: 20px;
		height: 40px;
		margin: 0;
		padding: 10px 16px;
		&:hover {
			background-color: #f3a683;
		}
	}

	.button-span {
		display: flex;
		flex-direction: row nowrap;
		justify-content: space-between;
	}
</style>
