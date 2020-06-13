import { Injectable } from '@angular/core';
import { CanActivate, ActivatedRouteSnapshot, RouterStateSnapshot, Router, UrlTree } from '@angular/router';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class AuthUserGuard implements CanActivate {

  constructor(private route: Router) { }

  canActivate(
    next: ActivatedRouteSnapshot,
    state: RouterStateSnapshot): Observable<boolean | UrlTree> | Promise<boolean | UrlTree> | boolean | UrlTree {

    const showUser = localStorage.getItem('showUser');
    if (showUser !== null && typeof showUser !== 'undefined' && showUser === '1') {
      return true;
    }
    localStorage.removeItem('tokenPoc');
    this.route.navigate(['login']);
    return false;
  }

}
