import { CommonModule } from '@angular/common';
import { HttpClientModule } from '@angular/common/http';
import { Component } from '@angular/core';
import { RouterOutlet } from '@angular/router';

import columnsConfig from './config';
import { DatatableConfig } from './datatable/datatable-config';
import { DatatableComponent } from './datatable/datatable.component';
import { UserService } from './user.service';
import { User, UserListResponse } from './user';
import { ModalComponent } from './modal/modal.component';
import { Subject } from 'rxjs';

@Component({
  selector: 'app-root',
  standalone: true,
  imports: [
    CommonModule,
    RouterOutlet,
    HttpClientModule,
    DatatableComponent,
    ModalComponent,
  ],
  providers: [UserService],
  templateUrl: './app.component.html',
})
export class AppComponent {
  isAddUsersModalOpened: boolean = false;
  isUserDetailsModalOpened: boolean = false;
  userDetails: User | undefined;
  usersCsv: string = '';
  dtSubject: Subject<void> = new Subject<void>();

  dtConfig: DatatableConfig = {
    columnsConfig: columnsConfig,
    maxRows: 10,
    fetchData: async (page, callback) => {
      this.userService
        .getUsers(page)
        .subscribe((response: UserListResponse) => {
          callback({
            total: response.total,
            data: response.users,
          });
        });
    },
  };

  constructor(private userService: UserService) {}

  openAddUsersModal() {
    this.isAddUsersModalOpened = true;
  }

  closeAddUsersModal() {
    this.isAddUsersModalOpened = false;
  }

  openUserDetailsModal() {
    this.isUserDetailsModalOpened = true;
  }

  closeUserDetailsModal() {
    this.isUserDetailsModalOpened = false;
  }

  onUsersCsvChange(event: any) {
    this.usersCsv = event.target.value;
  }

  onReqUserDetails(value: User) {
    this.userDetails = value;
    this.openUserDetailsModal();
  }

  addUsersCsv() {
    this.userService.addUsersCsv(this.usersCsv).subscribe(
      () => {
        this.closeAddUsersModal();
        this.usersCsv = '';
        this.dtRehydrate();
      },
      (error) => {
        alert('CSV is not valid');
        this.closeAddUsersModal();
      }
    );
  }

  deleteUser(userId: number) {
    this.userService.deleteUser(userId).subscribe(
      () => {
        this.dtRehydrate()
        this.closeUserDetailsModal()
      }
    )
  }

  dtRehydrate() {
    this.dtSubject.next();
  }
}
