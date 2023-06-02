<script lang="ts">
	import Burger from './Burger.svelte';
	import Sidebar from './Sidebar.svelte';

	export let sidebarVisible = false;
</script>

<header>
	<nav>
		<Burger bind:sidebarVisible />
		<h1>Organise Me</h1>
	</nav>
	<Sidebar bind:sidebarVisible />
</header>

<style>
	h1 {
		padding-left: 20px;
		padding-bottom: 3px;
	}

	nav {
		padding-left: 10px;
		background-color: #ffffff;
		margin: 0;
		border-bottom: 1px solid #596275;
		display: flex;
		justify-content: flex-start;
	}
</style>
