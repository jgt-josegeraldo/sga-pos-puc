import { Component, OnInit } from '@angular/core';
import { AssetService } from '../../../core/model/asset/asset.service';
import { Router, ActivatedRoute } from '@angular/router';
import { ToastrService } from 'ngx-toastr';

@Component({
  selector: 'app-register',
  templateUrl: './register.component.html',
  styleUrls: ['./register.component.scss']
})
export class RegisterComponent implements OnInit {
  public code;
  public name;
  public description;
  public category;
  public status;
  public acquisition_date;
  public loading = false;
  public data: any;
  categorys: any = [];
  assetsStatus: any = [];

  constructor(
    private toastr: ToastrService,
    private assetService: AssetService,
    private router: Router,
    private route: ActivatedRoute,
  ) { }

  ngOnInit() {
    this.data = this.route.snapshot.data;
    this.assetsStatus = this.data.status.data;
    this.categorys = this.data.categorys.data;
  }

  save() {
    this.loading = true;
    this.assetService.endpoint = 'asset/save';
    this.assetService.post(
      {
        code: this.code,
        name: this.name,
        description: this.description,
        asset_status_id: this.status,
        category_id: this.category,
        acquisition_date: this.acquisition_date,
      }
    ).subscribe(
      success => {
        this.toastr.success("Ativo cadastrado com sucesso.");
        this.router.navigate(['/ativos']);
        this.loading = false;
      },
      error => {
        this.loading = false;
      }
    );
  }

  noSave() {
    this.router.navigate(['/ativos']);
    this.loading = false;
  }
}
