import { Injectable } from '@angular/core';
import { Resolve, RouterStateSnapshot, ActivatedRouteSnapshot } from '@angular/router';
import { AssetService } from '../../../core/model/asset/asset.service';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class ListCategoryService implements Resolve<ListCategoryService>{

  constructor(
    private assetService: AssetService
  ) { }

  resolve(
    // route: ActivatedRouteSnapshot,
    // state: RouterStateSnapshot
  ): Observable<any> | Promise<any> | any {
    return this.assetService.listCategory({}).toPromise().then((data) => data);
  }
}
