import { NgModule } from '@angular/core';
import { SharedModule } from '../../shared/shared.module';
import { RegisterComponent } from './register/register.component';
import { AssetRoutingModule } from './asset-routing.module';
import { CrudComponent } from './crud/crud.component';
import { IntegrationComponent } from './integration/integration.component';
import { MaintenanceRecordComponent } from './maintenance-record/maintenance-record.component';

@NgModule({
  declarations: [
    RegisterComponent,
    CrudComponent,
    IntegrationComponent,
    MaintenanceRecordComponent
  ],
  imports: [
    SharedModule,
    AssetRoutingModule
  ],
  entryComponents: [MaintenanceRecordComponent]
})
export class AssetModule { }
