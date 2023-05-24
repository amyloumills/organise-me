<script lang="ts">
	import { createEventDispatcher } from 'svelte';
	import type { NoteData } from '../../model';
	import { v4 as uuidv4 } from 'uuid';

	export let notes: NoteData[];

	const dispatch = createEventDispatcher();

	let title = '';

	function onKeyDown(e: KeyboardEvent) {
		if (e.key != 'Enter') return;

		if (title.length < 3) return;

		notes = [
			...notes,
			{
				id: uuidv4(),
				title,
				body: '',
				priority: '',
				status: '',
				tagIds: [],
				pinned: false,
				createdAt: 0,
				updatedAt: 0
			}
		];
		dispatch('create');
		title = '';
	}
</script>

<textarea on:keydown={onKeyDown} bind:value={title} placeholder="create a new note" />

<style>
	textarea {
		width: 20vw;
		height: 50px;
		margin-left: 10px;
		resize: none;
		font-size: 1rem;
		padding: 10px;
		font-family: 'Times New Roman', Times, serif;
	}
</style>
