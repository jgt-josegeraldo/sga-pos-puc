import { Injectable } from '@angular/core';

import { Observable } from 'rxjs';
import { Serializer } from './serializer';
import { environment } from './../../../environments/environment';
import { HttpClient, HttpErrorResponse, HttpHeaders, HttpRequest, HttpEventType, HttpResponse, HttpEvent } from '@angular/common/http';
import { map, catchError } from 'rxjs/operators';

export class HttpService {

  constructor(
    public httpClient: HttpClient,
    public endpoint: any,
    public serializer: Serializer
  ) { }

  private urlServer = environment.urlApi;
  public handleError;

  post(item) {
    const options = {
      headers: new HttpHeaders({
        'Content-Type': 'application/json',
        Authorization: 'Bearer ' + localStorage.getItem('tokenPoc'),
      })
    };
    return this.httpClient
      .post(`${this.urlServer}${this.endpoint}`, this.serializer.toJson(item), options)
      .pipe(
        map(data => this.serializer.fromJson(data)),
        catchError(this.handleError)
      );
  }

  get(item) {
    const options = {
      headers: new HttpHeaders({
        'Content-Type': 'application/json',
        Authorization: 'Bearer ' + localStorage.getItem('tokenPoc'),
      })
    };
    return this.httpClient
      .get(`${this.urlServer}${this.endpoint}`, options)
      .pipe(
        map(data => this.serializer.fromJson(data)),
        catchError(this.handleError)
      );
  }
}
