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
</script>

<div>
	<!--This is instead of map!!!!-->
	{#each notes as note (note.id)}
		<!--remember keyed each statements instead of key=note.id-->
		<Note
			bind:data={note}
			on:titleChange
			on:edit={() => dispatch('edit', note)}
			on:delete={() => onDelete(note)}
		/>
	{/each}
</div>
