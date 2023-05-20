<script lang="ts">
	import type { NoteData } from '../model';
	import NoteActions from './NoteActions.svelte';

	export let data: NoteData;
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
