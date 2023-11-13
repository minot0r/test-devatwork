export interface CreateUser {
  name: string;
  surname: string;
  birthDate: Date;
  status: 'high' | 'low';
  gender: 'M' | 'F' | '/';
}

export interface User extends CreateUser {
  id: number;
}

export interface UserListResponse {
  total: number;
  shown: number;
  hasMore: boolean;
  users: User[];
}

export interface MessageResponse {
  message: string;
}
