import { Component, Inject } from '@angular/core';
import { MatDialog, MatDialogRef, MAT_DIALOG_DATA } from '@angular/material/dialog';

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
  description: string;
  maintenance_date: any;

  constructor(
    public dialogRef: MatDialogRef<MaintenanceRecordComponent>,
    @Inject(MAT_DIALOG_DATA) public data: DialogData) { }

    onNoClick(): void {
      this.dialogRef.close();
    }

}
