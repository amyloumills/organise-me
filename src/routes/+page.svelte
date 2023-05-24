<script lang="ts">
	import NoteList from '../components/Notes/NoteList.svelte';
	import NoteCreate from '../components/Notes/NoteCreate.svelte';
	import type { NoteData } from '../model';
	import EditModal from '../components/Modal/EditModal.svelte';
	import { onMount } from 'svelte';

	let notes: NoteData[] = [];

	let editModalVisible = false;
	let editModalData: NoteData | null = null;

	function onNoteEdit(e) {
		editModalData = structuredClone(e.detail); // clones the object
		editModalVisible = true;
	}

	function onNoteEditSave(e) {
		notes = notes.map((n: NoteData) => (n.id === e.detail.id ? e.detail : n));
		saveToLocalStorage();
	}

	function saveToLocalStorage() {
		window.localStorage.setItem('notes', JSON.stringify(notes));
	}

	// like useEffect - lifecycle hook
	onMount(() => {
		const allNotes = window.localStorage.getItem('notes');
		if (allNotes === null) {
			return;
		} else {
			try {
				const data: NoteData[] = JSON.parse(allNotes);
				notes = data;
			} catch (e) {
				console.log(e);
			}
		}
	});
</script>

<!-- main page nav -->
<NoteCreate bind:notes on:create={saveToLocalStorage} />
<NoteList
	bind:notes
	on:edit={onNoteEdit}
	on:delete={saveToLocalStorage}
	on:titleChange={saveToLocalStorage}
/>
<EditModal bind:data={editModalData} bind:showModal={editModalVisible} on:save={onNoteEditSave} />
