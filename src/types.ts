export interface NoteData {
    id: string; //UUID string
    title: string; //250 max chars
    body: string; //500 max chars
    priority: string; //enum high/med/low
    status: string // active, archived
    tagIds: string[];
    pinned: boolean;
    createdAt: number;
    updatedAt: number;
}

export interface Tags {
    id: string;
    label: string;
    createdAt: number;
    updatedAt: number;
}