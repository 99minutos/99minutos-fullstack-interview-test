import { TestBed } from '@angular/core/testing';

import { GetApiService } from './get-api.service';

describe('GetApiService', () => {
  beforeEach(() => TestBed.configureTestingModule({}));

  it('should be created', () => {
    const service: GetApiService = TestBed.get(GetApiService);
    expect(service).toBeTruthy();
  });
});
