import { TestBed } from '@angular/core/testing';

import { ListAssetsService } from './list-assets.service';

describe('ListAssetsService', () => {
  beforeEach(() => TestBed.configureTestingModule({}));

  it('should be created', () => {
    const service: ListAssetsService = TestBed.get(ListAssetsService);
    expect(service).toBeTruthy();
  });
});
