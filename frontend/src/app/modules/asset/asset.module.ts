import { NgModule } from '@angular/core';
import { SharedModule } from '../../shared/shared.module';
import { RegisterComponent } from './register/register.component';
import { AssetRoutingModule } from './asset-routing.module';
import { CrudComponent } from './crud/crud.component';

@NgModule({
  declarations: [
    RegisterComponent,
    CrudComponent
  ],
  imports: [
    SharedModule,
    AssetRoutingModule
  ]
})
export class AssetModule { }
