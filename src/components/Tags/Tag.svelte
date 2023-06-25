<script lang="ts">
	// I'll want a db of tags that the user can select when creating a note
	// user can then edit tags onEditModal.
	// When creating a tag, they can select a colour to be associated with that tag

	import type { TagData } from '../../types';

	export let data: TagData;
	export let editing = false;

	function getColour(colour: string) {
		// make sure hex can't be hacked by user
		return colour;
	}
</script>

{#if editing}
	<div>
		<input type="checkbox" id={data.id} name="FrontEnd" value="Front End" />
		<label for={data.id} style="border-color: {getColour(data.colour)}">{data.label}</label>
	</div>
{:else}
	<div class="tags" style="border-color: {getColour(data.colour)}">{data.label}</div>
{/if}

<style lang="scss">
	.tags {
		@include tag-styles;
	}

	input[type='checkbox'] {
		display: none;
	}
	input[type='checkbox'] + label {
		@include tag-styles;
		cursor: pointer;
	}
	input:checked + label {
		background-color: $red;
	}
</style>
