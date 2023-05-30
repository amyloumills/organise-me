<script lang="ts">
	import type { NoteData } from '../../types';
	import NoteActions from './NoteActions.svelte';

	export let data: NoteData;
</script>

<div>
	<p class="title">{data.title}</p>
	<p class="body">{data.body}</p>
	<NoteActions on:delete on:edit />
</div>

<style>
	div {
		display: flex;
		flex-direction: column;
		margin: 10px;
		width: 20vw;
		padding: 20px;
		border-radius: 8px;
		box-shadow: rgba(0, 0, 0, 0.05) 0px 6px 24px 0px, rgba(0, 0, 0, 0.08) 0px 0px 0px 1px;
	}
	.title {
		font-weight: 600;
	}
	.body {
		font-weight: 300;
	}
</style>
