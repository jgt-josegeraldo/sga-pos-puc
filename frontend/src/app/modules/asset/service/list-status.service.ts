import { Injectable } from '@angular/core';
import { Resolve, RouterStateSnapshot, ActivatedRouteSnapshot } from '@angular/router';
import { AssetService } from '../../../core/model/asset/asset.service';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class ListStatusService implements Resolve<ListStatusService>{

  constructor(
    private assetService: AssetService
  ) { }

  resolve(
    // route: ActivatedRouteSnapshot,
    // state: RouterStateSnapshot
  ): Observable<any> | Promise<any> | any {
    return this.assetService.listStatus({}).toPromise().then((data) => data);
  }
}

