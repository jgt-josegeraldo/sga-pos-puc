import { TestBed } from '@angular/core/testing';

import { ListStatusService } from './list-status.service';

describe('ListStatusService', () => {
  beforeEach(() => TestBed.configureTestingModule({}));

  it('should be created', () => {
    const service: ListStatusService = TestBed.get(ListStatusService);
    expect(service).toBeTruthy();
  });
});
