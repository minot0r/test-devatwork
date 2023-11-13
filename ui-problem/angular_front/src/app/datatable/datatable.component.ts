import {
  Component,
  EventEmitter,
  Input,
  OnDestroy,
  OnInit,
  Output,
} from '@angular/core';
import { CommonModule } from '@angular/common';
import { DatatableConfig } from './datatable-config';
import { Observable, Subscription } from 'rxjs';

@Component({
  selector: 'app-datatable',
  standalone: true,
  imports: [CommonModule],
  templateUrl: './datatable.component.html',
})
export class DatatableComponent implements OnInit, OnDestroy {
  private hydrationSubscription: Subscription | undefined;

  @Input()
  dtConfig!: DatatableConfig;
  @Input()
  dtSubject: Observable<void> | undefined;
  @Output()
  rowdblclick = new EventEmitter<any>();

  data: any[] = [];
  page: number = 1;
  total: number = 0;

  sortingField: string = '';
  sortingOrder: 'up' | 'low' | 'none' = 'none';

  ngOnInit(): void {
    if (this.dtSubject) {
      this.hydrationSubscription = this.dtSubject.subscribe(() => {
        this.fetchPage(this.page);
      });
    }
    this.fetchPage(this.page);
  }

  ngOnDestroy(): void {
    if (this.hydrationSubscription) {
      this.hydrationSubscription.unsubscribe();
    }
  }

  fetchPage(page: number) {
    this.dtConfig.fetchData((page - 1) * this.dtConfig.maxRows, (values) => {
      this.data = values.data;
      this.total = values.total;
    });
  }

  get Math() {
    return Math;
  }

  get buttons() {
    if (this.data.length === 0) return [];
    const buttons = [];
    const maxPages = Math.ceil(this.total / this.dtConfig.maxRows);
    for (
      let i =
        maxPages - Math.max(0, this.page - 2) < 5
          ? maxPages - 5
          : Math.max(0, this.page - 2);
      i <
      Math.min(
        5 + (Math.max(0, this.page - 2) > 0 ? Math.max(0, this.page - 2) : 0),
        maxPages
      );
      i++
    ) {
      buttons.push(i + 1);
    }
    return buttons;
  }

  hasNext() {
    return this.page < this.total / this.dtConfig.maxRows;
  }

  hasPrevious() {
    return this.page > 1;
  }

  nextPage() {
    if (this.hasNext()) {
      this.setPage(this.page + 1);
    }
  }

  previousPage() {
    if (this.hasPrevious()) {
      this.setPage(this.page - 1);
    }
  }

  setPage(page: number) {
    this.page = page;
    this.fetchPage(page);
  }

  onRowDoubleClick(value: any) {
    this.rowdblclick.emit(value);
  }

  onColumnClick(fieldName: string) {
    if (this.sortingField == fieldName) {
      this.sortingOrder =
        this.sortingOrder === 'up'
          ? 'low'
          : this.sortingOrder === 'low'
          ? 'none'
          : 'up';
    } else {
      this.sortingField = fieldName;
      this.sortingOrder = 'up';
    }
    this.data = this.data.sort((a, b) => {
      const column0 = this.dtConfig.columnsConfig[0].field;
      if (this.sortingOrder === 'none') return a[column0] - b[column0];
      if (this.sortingOrder === 'up')
        return a[fieldName].toString().localeCompare(b[fieldName].toString());
      return b[fieldName].toString().localeCompare(a[fieldName].toString());
    });
  }

  columnDecorator(fieldName: string) {
    if (fieldName !== this.sortingField) return '';
    if (this.sortingOrder === 'up') return '⬘';
    if (this.sortingOrder === 'low') return '⬙';
    return '';
  }
}
