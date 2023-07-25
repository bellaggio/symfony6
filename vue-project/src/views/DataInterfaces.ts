export interface Description{
    id:number;
    description?:string;
    book: Book
}

export interface Book{
    id:number;
    title:string;
    price?:number;
}

