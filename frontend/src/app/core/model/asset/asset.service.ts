import { Injectable } from '@angular/core';
import { AssetSerializer } from './asset.serializer';
import { HttpClient } from '@angular/common/http';
import { HttpService } from '../../http/http.service';

@Injectable({
  providedIn: 'root'
})
export class AssetService extends HttpService {

  constructor(
    public httpClient: HttpClient
  ) {
    super(
      httpClient,
      'asset/list',
      new AssetSerializer()
    );
  }

  listCategory(item) {
    this.endpoint = 'asset/listCategory';
    return super.get(item);
  }

  listStatus(item) {
    this.endpoint = 'asset/listStatus';
    return super.get(item);
  }

  listWebhooks(item) {
    this.endpoint = 'asset/listWebhooks';
    return super.get(item);
  }

  listTriggers(item) {
    this.endpoint = 'asset/listTriggers';
    return super.get(item);
  }

  list(item) {
    this.endpoint = 'asset/list';
    return super.get(item);
  }

  get(item) {
    this.endpoint = 'asset/'+item.id;
    return super.get(item);
  }

  save(item) {
    this.endpoint = 'asset/save';
    return super.post(item);
  }

  saveWebhook(item) {
    this.endpoint = 'webhook/save';
    return super.post(item);
  }

  saveMaintenance(item) {
    this.endpoint = 'maintenance/save';
    return super.post(item);
  }

}