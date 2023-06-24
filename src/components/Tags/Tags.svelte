<script lang="ts">
	import Tag from './Tag.svelte';
	// import Add from '../../lib/Icons/Add.svelte';
	export let editing: boolean = false;

	// let adding: boolean = false;

	// let addInput: HTMLInputElement | null = null;

	// function addTag() {
	// 	adding = true;
	// 	setTimeout(() => {
	// 		addInput?.focus();
	// 	}, 5);
	// }

	// function onLoseFocus() {
	// 	adding = false;
	// }
</script>

<div class="tags">
	<Tag bind:editing data={{ id: '1', label: 'Front End', colour: '#546de5' }} />

	<!-- {#if editing}
		{#if adding}
			<input type="text" bind:this={addInput} on:blur={onLoseFocus} class="add-tags-input" />
		{/if} 
		<button on:click={addTag}><Add /></button>
	{/if} -->
</div>

<style lang="scss">
	.tags {
		display: flex;
		flex-direction: row;
		gap: 5px;
	}
</style>
