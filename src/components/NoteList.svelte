<script lang="ts">
	import { each } from 'svelte/internal';
	import Note from '../components/Note.svelte';
	import type { NoteData } from '../model';

	export let notes: NoteData[];

	function onDelete(note: NoteData) {
		notes = notes.filter((n: NoteData) => n.id !== note.id);
	}
</script>

<div>
	<!--This is instead of map!!!!-->
	{#each notes as note (note.id)}
		<!--remember keyed each statements instead of key=note.id-->
		<Note bind:data={note} on:delete={() => onDelete(note)} />
	{/each}
</div>
