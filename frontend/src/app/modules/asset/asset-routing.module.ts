import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { RegisterComponent } from './register/register.component';
import { CrudComponent } from './crud/crud.component';
import { ListAssetsService } from './service/list-assets.service';
import { ListCategoryService } from './service/list-category.service';
import { ListStatusService } from './service/list-status.service';
import { ListTriggerService } from './service/list-trigger.service';
import { ListWebhooksService } from './service/list-webhooks.service';
import { IntegrationComponent } from './integration/integration.component';

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
    path: 'integracao',
    component: IntegrationComponent,
    resolve: {
      triggers: ListTriggerService,
      webhooks: ListWebhooksService
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
