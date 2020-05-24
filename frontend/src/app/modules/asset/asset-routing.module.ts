import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { RegisterComponent } from './register/register.component';
import { CrudComponent } from './crud/crud.component';

export const routes: Routes = [
  {
    path: '',
    component: CrudComponent
  },
  {
    path: 'cadastro',
    component: RegisterComponent
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class AssetRoutingModule { }
