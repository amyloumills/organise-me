<script lang="ts">
	export let sidebarVisible = false;
	import { fly } from 'svelte/transition';

	// I should organise this so there is a link to view all notes. Then I can categorise based on tags.
</script>

{#if sidebarVisible}
	<aside class:sidebarVisible transition:fly={{ x: -500, opacity: 1, duration: 500 }}>
		<nav>
			<div>
				<a href="www.google.com">Tags</a>
				<a href="www.google.com">All Notes</a>
			</div>
		</nav>
	</aside>
{/if}

<style lang="scss">
	aside {
		position: absolute;
		width: 25vw;
		height: calc(100vh - 76px);
		background-color: #574b90;

		left: -100%;
	}

	.sidebarVisible {
		left: 0;
	}
	div {
		display: flex;
		flex-direction: column;
		flex-wrap: nowrap;
		gap: 25px;

		padding-top: 20px;
		padding-left: 20px;

		a {
			text-decoration: none;
			color: #ffffff;
			&:hover {
				font-weight: 700;
			}
		}
	}
</style>
