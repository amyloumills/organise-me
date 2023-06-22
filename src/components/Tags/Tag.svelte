<script lang="ts">
	// how do I want tags to look? Do I want them to be colour coded? Set tags and tag creation
	// I'll want a db of tags that the user can select when creating a note
	// user can then edit tags onEditModal.
	// When creating a tag, they can select a colour to be associated with that tag

	import type { TagData } from '../../types';

	export let data: TagData;

	function getColour(colour: string) {
		// make sure hex can't be hacked by user
		return colour;
	}
</script>

<div class="tags" style="border-color: {getColour(data.colour)}">{data.label}</div>

<style>
	.tags {
		font-size: x-small;
		border: #546de5 solid 2px;
		border-radius: 6px;
		color: black;
		width: fit-content;
		padding: 5px;
		margin-bottom: 10px;
	}
</style>
