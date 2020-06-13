import { Component, Inject } from '@angular/core';
import { MatDialog, MatDialogRef, MAT_DIALOG_DATA } from '@angular/material/dialog';
import { AssetService } from '../../../core/model/asset/asset.service';
import { ToastrService } from 'ngx-toastr';

export interface DialogData {

}

@Component({
  selector: 'app-maintenance-record',
  templateUrl: './maintenance-record.component.html',
  styleUrls: ['./maintenance-record.component.scss']
})
export class MaintenanceRecordComponent {
  users = [
    { id: 1, name: "José Geraldo"},
    { id: 2, name: "Juliano Souza"}
  ];
  maintenance_status_option = [
    { id: 1, name: "Agendada"},
    { id: 2, name: "Atrasada"},
    { id: 3, name: "Realizada"}
  ];
  description: string;
  maintenance_date: any;
  maintenance_status: any;
  responsible: number;

  constructor(
    private toastr: ToastrService,
    private assetService: AssetService,
    public dialogRef: MatDialogRef<MaintenanceRecordComponent>,
    @Inject(MAT_DIALOG_DATA) public data: DialogData
  ) { }

    onNoClick(): void {
      this.dialogRef.close();
    }

    registrar(): void {
      //this.loading = true;
      this.assetService.saveMaintenance(
        {
          maintenance_date: this.maintenance_date,
          note: this.description,
          asset_id: 100,
          responsible_id: this.responsible,
          maintenance_status_id: this.maintenance_status,
        }
      ).subscribe(
        success => {
          this.toastr.success("Manutenção registrada com sucesso.");
          //this.router.navigate(['/ativos']);
          //this.loading = false;
        },
        error => {
          //this.loading = false;
        }
      );
      
      this.dialogRef.close();
    }

}
