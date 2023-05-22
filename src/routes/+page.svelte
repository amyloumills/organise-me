<script lang="ts">
	import NoteList from '../components/Notes/NoteList.svelte';
	import NoteCreate from '../components/Notes/NoteCreate.svelte';
	import type { NoteData } from '../model';

	let notes: NoteData[] = [];
</script>

<!-- main page nav -->
<NoteCreate bind:notes />
<NoteList bind:notes />
