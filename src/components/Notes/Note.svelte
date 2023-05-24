<script lang="ts">
	import { createEventDispatcher } from 'svelte';
	import type { NoteData } from '../../types';
	import NoteActions from './NoteActions.svelte';

	export let data: NoteData;

	const dispatch = createEventDispatcher();

	function onTitleBlur() {
		dispatch('titleChange');
	}
</script>

<div>
	<p
		contenteditable="true"
		spellcheck="false"
		on:blur={onTitleBlur}
		bind:textContent={data.title}
	/>
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
