<script lang="ts">
	import type { NoteData } from '../../types';
	import NoteActions from './NoteActions.svelte';
	import Completed from '../../lib/Icons/Completed.svelte';
	import Pin from '../../lib/Icons/Pin.svelte';
	import Tags from '../Tags/Tags.svelte';
	export let data: NoteData;
</script>

<div class="note-container">
	<span class="pinned">
		<p class="title">{data.title}</p>

		{#if data.pinned}<Pin />{/if}</span
	>
	<p class="body">{data.body}</p>
	<Tags />
	<span class="completed">
		<span class="completed-button"
			>{#if data.status === 'completed'}<Completed />{/if}
		</span>
		<NoteActions bind:data on:delete on:edit />
	</span>
</div>

<style lang="scss">
	.note-container {
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
	.completed {
		display: flex;
		justify-content: space-between;
	}
	.completed-button {
		padding-top: 5px;
		color: $teal;
		&:hover {
			color: $teal-hover;
		}
	}
	.pinned {
		display: flex;
		justify-content: space-between;
		align-items: center;
	}
</style>
