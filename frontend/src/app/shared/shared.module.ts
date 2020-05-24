import { NgModule, Injector } from '@angular/core';
import { CommonModule } from '@angular/common';

import { FormsModule, ReactiveFormsModule } from '@angular/forms';
import { RouterModule } from '@angular/router';

import { MaterialModule } from './material.module';
import { FlexLayoutModule } from '@angular/flex-layout';
import { BarComponent } from './bar/bar.component';
import { LoadingComponent } from './loading/loading.component';

@NgModule({
  declarations: [BarComponent, LoadingComponent],
  imports: [
    CommonModule,
    FormsModule,
    ReactiveFormsModule,
    MaterialModule
  ],
  exports: [
    CommonModule,
    FormsModule,
    ReactiveFormsModule,
    RouterModule,
    FlexLayoutModule,
    MaterialModule,
    LoadingComponent,
    BarComponent
  ],
  providers: [],
})
export class SharedModule {
  constructor(injector: Injector) {
    console.log('Shared');
  }
}
