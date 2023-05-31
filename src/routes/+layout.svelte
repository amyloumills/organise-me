<script>
	import '../app.css';
	import '@fontsource-variable/nunito-sans';
	import Nav from '../components/Navigation/Nav.svelte';

	let open = false;
</script>

<Nav bind:sidebar={open} />

<slot />
