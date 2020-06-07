import { Component, OnInit, ViewChild } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';
import { MatPaginator } from '@angular/material/paginator';
import { MatTableDataSource } from '@angular/material/table';

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
  searchText: any;
  dataSource: any;
  private data: any;
  assetsStatus: any = [];
  categorys: any = [];
  filterOpen = false;

  constructor(
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

}
