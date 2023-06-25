<script lang="ts">
	import { createEventDispatcher } from 'svelte';
	import Modal from './Modal.svelte';
	import { v4 as uuidv4 } from 'uuid';
	import Tags from '../Tags/Tags.svelte';

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

	function create() {
		dispatch('create');
	}

	function closeModal() {
		dispatch('close');
	}
</script>

<Modal bind:showModal>
	<h3>Create Note</h3>
	<input type="text" bind:value={newNote.title} placeholder="Enter title" />
	<textarea bind:value={newNote.body} placeholder="Enter your note" />
	<span>
		<input bind:checked={newNote.pinned} type="checkbox" id="pinned" />
		<label for="pinned">Pin to top</label>
	</span>
	<span class="priority-span">
		<label for="priority">Set Priority:</label>
		<select bind:value={newNote.priority} name="priority" id="priority">
			<option value="high">High</option>
			<option value="normal">Normal</option>
			<option value="low">Low</option>
		</select>
	</span>
	<span class="tag-select">
		<p>Select Tag (if required)</p>
		<Tags editing={true} />
	</span>
	<span class="button-span">
		<button class="cancel-button" on:click={closeModal}>Cancel</button>
		<button class="create-button" on:click|once={create}>Create Note</button>
	</span>
</Modal>

<style lang="scss">
	.button-span {
		display: flex;
		flex-direction: row nowrap;
		justify-content: space-between;
	}

	.create-button {
		background-color: $blue;
		color: $white;
		padding: 10px;
		&:hover {
			background-color: $blue-hover;
		}
	}

	.cancel-button {
		padding: 10px;
		background-color: $red;
		color: $white;
		&:hover {
			background-color: $red-hover;
		}
	}

	input,
	textarea {
		font-weight: 700;
		padding: 10px;
		border-width: 1px;
		border-color: $coral-hover;
		border-style: solid;

		&:focus {
			background-color: $off-white;
			transition: all 0.3s ease;
			color: $deep-grey;
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
		color: $deep-grey;
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
			border: 1px solid $coral-hover;
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

	.priority-span {
		label {
			color: $deep-grey;
			font-size: 0.8em;
			font-weight: 700;
		}
		select {
			margin-left: 5px;
			padding: 0 5px;
			font-weight: 700;
			color: $deep-grey;
			font-size: 0.8em;
			outline: none;
			border: 1px solid $coral-hover;
			&:focus {
				outline: none;
				border: 1px solid $coral-hover;
			}
		}
	}
</style>
