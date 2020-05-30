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
  selector: 'app-crud',
  templateUrl: './crud.component.html',
  styleUrls: ['./crud.component.scss']
})
export class CrudComponent implements OnInit {
  displayedColumns: string[] = ['code', 'name', 'date_of_last_maintenance', 'categoryDescription', 'id'];
  dataSource: any;
  private data: any;
  assetsStatus: any = [];
  categorys: any = [];

  constructor(
    private route: ActivatedRoute,
    private router: Router,
  ) { }

  @ViewChild(MatPaginator, { static: true }) paginator: MatPaginator;

  ngOnInit() {
    this.data = this.route.snapshot.data;
    this.dataSource = new MatTableDataSource<PeriodicElement>(this.data.assets.data)
    this.dataSource.paginator = this.paginator;
    this.assetsStatus = this.data.status.data;
    this.categorys = this.data.categorys.data;
  }

  navRegister(id) {
    this.router.navigate(['/ativos/cadastro/'+id]);
  }
}
