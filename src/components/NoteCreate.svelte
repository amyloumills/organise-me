<script lang="ts">
	import type { NoteData } from '../model';
	import { v4 as uuidv4 } from 'uuid';
	export let notes: NoteData[];

	let title = '';

	function onKeyDown(e: KeyboardEvent) {
		if (e.key != 'Enter') {
			return;
		}

		notes = [
			...notes,
			{
				id: '4',
				title,
				completed: false,
				body: '',
				inProgress: false
			}
		];

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
