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
	<span class="priority-span">
		<label for="priority">Change Priority:</label>
		<select bind:value={data.priority} name="priority" id="priority">
			<option value="high">High</option>
			<option value="normal">Normal</option>
			<option value="low">Low</option>
		</select>
	</span>
	<span class="status-span">
		<label for="status">Current Status:</label>
		<select bind:value={data.status} name="status" id="status">
			<option value="todo">To Do</option>
			<option value="inProgress">In Progress</option>
			<option value="completed">Completed</option>
		</select>
	</span>
	<span class="button-span">
		<button type="button" on:click={closeModal}>Close</button>
		<button type="button" on:click={saveData}>Save</button>
	</span>
</Modal>

<style lang="scss">
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
	input,
	textarea {
		font-weight: 700;
		padding: 10px;
		border-width: 1px;
		border-color: #f3a683;
		border-style: solid;
		background: url('transparent');
		&:focus {
			background-color: #fcf2ef;
			transition: all 0.3s ease;
			color: gray;
			outline: none;
		}
	}

	input[type='checkbox'] {
		display: none;
	}
	input[type='checkbox'] + label {
		display: block;
		position: relative;
		padding-left: 35px;
		margin-bottom: 20px;
		font-weight: 700;
		color: gray;
		font-size: 0.8em;
		padding-top: 2px;
		cursor: pointer;
		&:last-child {
			margin-bottom: 0;
		}
		&:before {
			content: '';
			display: block;
			width: 20px;
			height: 20px;
			border: 1px solid #f3a683;
			position: absolute;
			left: 0;
			top: 0;
			opacity: 1;
			-webkit-transition: all 0.12s, border-color 0.08s;
			transition: all 0.12s, border-color 0.08s;
		}
	}
	input[type='checkbox']:checked + label:before {
		width: 10px;
		top: -5px;
		left: 5px;
		border-radius: 0;
		opacity: 1;
		border-top-color: transparent;
		border-left-color: transparent;
		-webkit-transform: rotate(45deg);
		transform: rotate(45deg);
	}

	.priority-span,
	.status-span {
		label {
			color: gray;
			font-size: 0.8em;
			font-weight: 700;
		}
		select {
			margin-left: 5px;
			padding: 0 5px;
			font-weight: 700;
			color: gray;
			font-size: 0.8em;
			outline: none;
			border: 1px solid #f3a683;
			&:focus {
				outline: none;
				border: 1px solid #f3a683;
			}
		}
	}
	.status-span {
		select {
			margin-left: 10px;
		}
	}
</style>
