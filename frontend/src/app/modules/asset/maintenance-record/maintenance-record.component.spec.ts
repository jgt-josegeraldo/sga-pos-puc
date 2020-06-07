import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { MaintenanceRecordComponent } from './maintenance-record.component';

describe('MaintenanceRecordComponent', () => {
  let component: MaintenanceRecordComponent;
  let fixture: ComponentFixture<MaintenanceRecordComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ MaintenanceRecordComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(MaintenanceRecordComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
