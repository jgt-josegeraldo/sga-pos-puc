import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { RegisterComponent } from './register/register.component';
import { CrudComponent } from './crud/crud.component';
import { ListAssetsService } from './service/list-assets.service';
import { ListCategoryService } from './service/list-category.service';
import { ListStatusService } from './service/list-status.service';

export const routes: Routes = [
  {
    path: '',
    component: CrudComponent,
    resolve: {
      assets: ListAssetsService,
      categorys: ListCategoryService,
      status: ListStatusService
    }
  },
  {
    path: 'cadastro',
    component: RegisterComponent,
    resolve: {
      categorys: ListCategoryService,
      status: ListStatusService
    }
  },
  {
    path: 'cadastro/:id',
    component: RegisterComponent,
    resolve: {
      categorys: ListCategoryService,
      status: ListStatusService
    }
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class AssetRoutingModule { }
