<script>
	let text = `Enter your note here!`;
</script>

<div><textarea bind:value={text} /></div>
<button>Save</button>
<button>Delete</button>

<style>
	textarea {
		width: 50%;
		height: 200px;
	}
</style>
