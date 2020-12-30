import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { CommitBranchComponent } from './commit-branch.component';

describe('CommitBranchComponent', () => {
  let component: CommitBranchComponent;
  let fixture: ComponentFixture<CommitBranchComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ CommitBranchComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(CommitBranchComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
