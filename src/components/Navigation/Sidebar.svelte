<script>
	export let open = false;
</script>

<aside class:open>
	<nav>
		<p>hello</p>
		<p>placeholder</p>
	</nav>
</aside>

<style>
	aside {
		display: absolute;
		width: 100%;
		height: 100%;
		left: -100%;
		transition: left 0.3s ease-in-out;
	}

	.open {
		left: 0;
	}
</style>
