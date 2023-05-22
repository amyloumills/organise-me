<script lang="ts">
	import NoteList from '../components/NoteList.svelte';
	import NoteCreate from '../components/NoteCreate.svelte';
	import type { NoteData } from '../model';

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

<!-- main page nav -->
<NoteCreate bind:notes />
<NoteList bind:notes />
