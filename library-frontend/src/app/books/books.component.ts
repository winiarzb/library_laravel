import { Component, OnInit } from '@angular/core';
import {BookService} from "../service/book.service";

@Component({
  selector: 'app-books',
  templateUrl: './books.component.html',
  styleUrls: ['./books.component.scss']
})
export class BooksComponent implements OnInit {

  constructor(private bookService: BookService) { }

  books: any;

  ngOnInit(): void {
    this.showBooks();
  }

  showBooks(){
    this.books = this.bookService.listBooks().subscribe(book=>{
      this.books = book;
      console.log(this.books);
    })
  }

}
