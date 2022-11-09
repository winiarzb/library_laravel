import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class BookService {

  url:string = 'http://localhost:8000';

  constructor(private http: HttpClient) {  }

  listBooks() {
    return this.http.get<any>(this.url + '/api/books');
  }

  httpOptions = {
    headers : new HttpHeaders({
      'Content-Type': 'application/json'
    })
  }

  addBook(article:any): Observable<any> {
    return this.http.post<any>(this.url + '/api/books', article, this.httpOptions
    )
  }

  find(id:number): Observable<any> {
    return this.http.get(this.url + '/api/book/' + id)
  }
}
