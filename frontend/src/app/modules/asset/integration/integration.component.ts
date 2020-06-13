import { Component, OnInit, ViewChild } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';
import { MatPaginator } from '@angular/material/paginator';
import { MatTableDataSource } from '@angular/material/table';
import { AssetService } from '../../../core/model/asset/asset.service';
import { ToastrService } from 'ngx-toastr';

export interface PeriodicElement {
  id: number,
  code: string,
  name: string,
  date_of_last_maintenance: any,
  categoryDescription: string
}

/**
 * @title Basic use of `<table mat-table>`
 */
@Component({
  selector: 'app-integration',
  templateUrl: './integration.component.html',
  styleUrls: ['./integration.component.scss']
})
export class IntegrationComponent implements OnInit {
  displayedColumns: string[] = ['trigger', 'link', 'id'];
  triggers: any = [];
  link: string;
  trigger: number;
  dataSource: any;
  private data: any;
  assetsStatus: any = [];
  categorys: any = [];
  filterOpen = false;
  loading: boolean = false;

  constructor(
    private toastr: ToastrService,
    private assetService: AssetService,
    private route: ActivatedRoute,
    private router: Router,
  ) { }

  @ViewChild(MatPaginator, { static: true }) paginator: MatPaginator;

  ngOnInit() {
    this.data = this.route.snapshot.data;
    if (this.data) {
      this.dataSource = new MatTableDataSource<PeriodicElement>(this.data.webhooks.data)
      this.dataSource.paginator = this.paginator;
      this.triggers = this.data.triggers.data;
    }
  }

  save() {
    this.loading = true;
    this.assetService.saveWebhook(
      {
        link: this.link,
        trigger_id: this.trigger
      }
    ).subscribe(
      success => {
        this.toastr.success("Webhook adicionado com sucesso.");
        this.assetService.listWebhooks({}).subscribe(
          success => {
            this.dataSource = new MatTableDataSource<PeriodicElement>(success.data);
            this.loading = false;
            this.link = null;
            this.trigger = null;
          },
          error => {
            this.loading = false;
          }
        );
      },
      error => {
        this.loading = false;
      }
    );
  }

}
