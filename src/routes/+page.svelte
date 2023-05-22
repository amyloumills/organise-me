<script lang="ts">
	import NoteList from '../components/Notes/NoteList.svelte';
	import NoteCreate from '../components/Notes/NoteCreate.svelte';
	import type { NoteData } from '../model';
	import Modal from '../components/Modal/Modal.svelte';
	import EditModal from '../components/Modal/EditModal.svelte';

	let notes: NoteData[] = [];

	let editModalVisible = false;
	let editModalData: NoteData | null = null;

	function onNoteEdit(e) {
		editModalData = structuredClone(e.detail);
		editModalVisible = true;
	}

	function onNoteEditSave(e) {
		notes = notes.map((n: NoteData) => (n.id === e.detail.id ? e.detail : n));
	}
</script>

<!-- main page nav -->
<NoteCreate bind:notes />
<NoteList bind:notes on:edit={onNoteEdit} />
<EditModal data={editModalData} showModal={editModalVisible} on:save={onNoteEditSave} />
