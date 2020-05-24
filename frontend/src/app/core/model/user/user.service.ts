import { Injectable } from '@angular/core';
import { UserSerializer } from './user.serializer';
import { HttpClient } from '@angular/common/http';
import { HttpService } from '../../http/http.service';

@Injectable({
  providedIn: 'root'
})
export class UserService extends HttpService {

  constructor(
    public httpClient: HttpClient
  ) {
    super(
      httpClient,
      'login',
      new UserSerializer()
    );
  }

}