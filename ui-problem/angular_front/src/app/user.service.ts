import { Injectable } from '@angular/core';
import { CreateUser, MessageResponse, User, UserListResponse } from './user';
import { HttpClient } from '@angular/common/http';

@Injectable({
  providedIn: 'root',
})
export class UserService {
  constructor(private httpClient: HttpClient) {}

  getUsers(offset: number) {
    return this.httpClient.get<UserListResponse>(
      `http://localhost:8000/user/?offset=${offset}`
    );
  }

  getUser(id: number) {
    return this.httpClient.get<User>(`http://localhost:8000/user/${id}`);
  }

  addUser(user: CreateUser) {
    return this.httpClient.post<MessageResponse>('http://localhost:8000/user/new', user);
  }

  addUsersCsv(csv: string) {
    return this.httpClient.post<MessageResponse>(
      'http://localhost:8000/user/csv',
      csv
    );
  }

  updateUser(user: User) {
    return this.httpClient.post<MessageResponse>(
      `http://localhost:8000/user/${user.id}/edit`,
      user
    );
  }

  deleteUser(userId: number) {
    return this.httpClient.delete<MessageResponse>(
      `http://localhost:8000/user/${userId}`
    );
  }
}
