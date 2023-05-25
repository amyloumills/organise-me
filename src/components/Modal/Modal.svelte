<script lang="ts">
	export let showModal = false;

	function closeModal() {
		showModal = false;
	}

	function handleKeyDown() {
		console.log('I need to change this');
	}
</script>

{#if showModal}
	<div class="modal-background" on:click={closeModal} on:keydown={handleKeyDown}>
		<dialog class="modal" on:click|stopPropagation on:keydown={handleKeyDown}>
			<slot />
		</dialog>
		<!--Stop propogation prevents bubbling-->
	</div>
{/if}

<!--Slot is a function that allows you to pass properties into another component - essentially 'slotting' them in-->

<style>
	.modal-background {
		position: fixed;
		z-index: 1;
		left: 0;
		top: 0;
		width: 100%;
		height: 100%;
		overflow: auto;
		background: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.7));
		animation: fade-in 1s;
	}

	.modal {
		background-color: #fefefe;
		margin: 15% auto;
		padding: 20px;
		border: 1px solid #888;
		width: 40%;
		display: flex;
		flex-direction: column;
		gap: 20px;
		transition: all 2s;
		border-radius: 5px;
	}

	@keyframes fade-in {
		from {
			opacity: 0;
		}
		to {
			opacity: 1;
		}
	}
</style>
