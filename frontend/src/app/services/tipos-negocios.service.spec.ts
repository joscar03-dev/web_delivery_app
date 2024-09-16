import { TestBed } from '@angular/core/testing';

import { TiposNegociosService } from './tipos-negocios.service';

describe('TiposNegociosService', () => {
  let service: TiposNegociosService;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    service = TestBed.inject(TiposNegociosService);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});
