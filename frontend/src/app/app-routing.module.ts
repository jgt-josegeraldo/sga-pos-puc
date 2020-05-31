import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { AuthGuard } from './core/auth/auth.guard';
import { AuthLoginGuard } from './core/auth/auth-login.guard';


const routes: Routes = [
  {
    path: '',
    loadChildren: () => import('./modules/authentication/authentication.module').then(m => m.AuthenticationModule),
    canActivate: [ AuthLoginGuard ],
  },
  {
    path: 'ativos',
    loadChildren: () => import('./modules/asset/asset.module').then(m => m.AssetModule),
    canActivate: [ AuthGuard ],
  },
  {
    path: 'usuarios',
    loadChildren: () => import('./modules/user/user.module').then(m => m.UserModule),
    canActivate: [AuthGuard],
  }
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
