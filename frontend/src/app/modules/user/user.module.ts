import { NgModule } from '@angular/core';
import { SharedModule } from '../../shared/shared.module';
import { CoreModule } from '../../core/core.module';
import { CrudUserComponent } from './crud-user/crud-user.component';
import { UserRoutingModule } from './user-routing.module';

@NgModule({
  declarations: [CrudUserComponent],
  imports: [
    SharedModule,
    CoreModule,
    UserRoutingModule
  ]
})
export class UserModule { }
