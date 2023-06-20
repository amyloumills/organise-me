<script lang="ts">
	import { each } from 'svelte/internal';
	import Note from './Note.svelte';
	import type { NoteData } from '../../types';
	import { createEventDispatcher } from 'svelte';

	export let notes: NoteData[];

	const dispatch = createEventDispatcher();

	function onDelete(note: NoteData) {
		notes = notes.filter((n: NoteData) => n.id !== note.id);
		dispatch('delete');
	}

	$: notes = notes.sort((a, b) => {
		if (a.pinned && !b.pinned) {
			return -1;
		} else if (!a.pinned && b.pinned) {
			return 1;
		} else {
			return a.createdAt - b.createdAt;
		}
	});

	$: completedNotes = notes.filter((note) => note.status === 'completed');
	$: activeNotes = notes.filter((note) => note.status !== 'completed');
</script>

<div class="note-container">
	<div>
		<h2>Active</h2>
		{#each activeNotes as note (note.id)}
			<Note
				bind:data={note}
				on:edit={() => dispatch('edit', note)}
				on:delete={() => onDelete(note)}
			/>
		{/each}
	</div>

	<div>
		<h2>Completed</h2>
		{#each completedNotes as note (note.id)}
			<Note
				bind:data={note}
				on:edit={() => dispatch('edit', note)}
				on:delete={() => onDelete(note)}
			/>
		{/each}
	</div>
</div>

<style>
	.note-container {
		display: grid;
		grid-template-columns: 50% auto;
	}
	h2 {
		margin-left: 10px;
	}
</style>
