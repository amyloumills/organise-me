<script lang="ts">
	export let showModal = false;

	function closeModal() {
		showModal = false;
	}
</script>

{#if showModal}
	<div class="modal-background" on:click={closeModal}>
		<div class="modal" on:click|stopPropagation><slot /></div>
		<!--Stop propogation prevents bubbling-->
	</div>
{/if}

<!--Slot is a function that allows you to pass properties into another component - essentially 'slotting' them in-->

<style>
	.modal-background {
		position: fixed; /* Stay in place */
		z-index: 1; /* Sit on top */
		left: 0;
		top: 0;
		width: 100%; /* Full width */
		height: 100%; /* Full height */
		overflow: auto; /* Enable scroll if needed */
		background-color: rgb(0, 0, 0); /* Fallback color */
		background-color: rgba(0, 0, 0, 0.4); /* Black w/ opacity */
	}

	.modal {
		background-color: #fefefe;
		margin: 15% auto; /* 15% from the top and centered */
		padding: 20px;
		border: 1px solid #888;
		width: 80%; /* Could be more or less, depending on screen size */
	}
</style>
