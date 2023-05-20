<script lang="ts">
	import { each } from 'svelte/internal';
	import Note from '../components/Note.svelte';
	import type { NoteData } from '../model';

	function onDelete(note: NoteData) {
		notes = notes.filter((n: NoteData) => n.id !== note.id);
	}

	let notes: NoteData[] = [
		{
			id: '1',
			title: 'my first note',
			body: 'hello this is my first note',
			completed: false,
			inProgress: false
		},
		{
			id: '2',
			title: 'my second note',
			body: 'hello this is my second note',
			completed: false,
			inProgress: false
		}
	];
</script>

<div>
	<!--This is instead of map!!!!-->
	{#each notes as note (note.id)}
		<!--remember keyed each statements instead of key=note.id-->
		<Note bind:data={note} on:delete={() => onDelete(note)} />
	{/each}
</div>
