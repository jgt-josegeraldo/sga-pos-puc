import { Component, OnInit } from '@angular/core';
import { UserService } from '../../../core/model/user/user.service';
import { Router } from '@angular/router';

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.scss']
})
export class LoginComponent implements OnInit {
  public email;
  public password;
  public loading = false;

  constructor(private userService: UserService, private route: Router) { }

  ngOnInit() {
  }

  login() {
    this.loading = true;
    this.userService.post(
      {
        login: this.email,
        password: this.password
      }
    ).subscribe(
      success =>  {
        localStorage.setItem('tokenPoc', success.token);
        localStorage.setItem('showUser', success.permissionUser);
        this.route.navigate(['/ativos/']);
        this.loading = false;
      },
      error => {
        this.loading = false;
      }
    );
  }
}
