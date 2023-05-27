<script lang="ts">
	import type { NoteData } from '../../types';
	import NoteActions from './NoteActions.svelte';

	export let data: NoteData;
</script>

<div>
	<p>{data.title}</p>
	<p>{data.body}</p>
	<NoteActions on:delete on:edit />
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
