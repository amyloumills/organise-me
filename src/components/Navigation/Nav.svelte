<script>
	import Burger from './Burger.svelte';

	export let sidebar = false;
</script>

<header>
	<nav>
		<Burger bind:open={sidebar} />
		<h1>Organise Me</h1>
	</nav>
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
		border-bottom: 1px solid gray;
		margin-bottom: 25px;
		display: flex;
		justify-content: flex-start;
	}
</style>
