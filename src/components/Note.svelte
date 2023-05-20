<script lang="ts">
	import type { Note } from '../model';
	import NoteActions from './NoteActions.svelte';

	let data: Note = {
		id: 'i',
		title: 'my first note',
		body: 'hello this is my first note',
		completed: false,
		inProgress: false
	};
</script>

<div>
	<p>{data.title}</p>
	<p>{data.body}</p>
	<NoteActions on:delete />
</div>

<style>
	div {
		display: flex;
		flex-direction: column;
		margin: 10px;
		border: 1px solid black;
		width: 20vw;
		padding: 10px;
	}
</style>
