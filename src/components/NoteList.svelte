<!-- <script lang="ts">
	import { writable } from 'svelte/store';

	import Note from '../components/Note.svelte';

	let notes = writable<{}[]>([]);

	function addNote() {
		notes.update((arr) => [...arr, {}]);
	}
</script>



{#each $notes as textbox, i}
	<Note key={i} />
{/each} -->

<script>
	import Note from '../components/Note.svelte';
</script>

<div><Note on:delete /></div>
