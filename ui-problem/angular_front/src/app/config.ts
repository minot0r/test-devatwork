import { IColumnConfig } from './datatable/datatable-config';

const datatableColumnConfig: IColumnConfig[] = [
  {
    field: 'id',
    title: 'ID',
  },
  {
    field: 'name',
    title: 'Name',
  },
  {
    field: 'surname',
    title: 'Last name',
  },
  {
    field: 'birthDate',
    title: 'Birth date',
    render: (value: any) => {
      return new Date(value).toLocaleDateString();
    },
  },
  {
    field: 'status',
    title: 'Status',
    render: (value: any) => {
      return value.slice(0, 1).toUpperCase() + value.slice(1);
    },
  },
  {
    field: 'gender',
    title: 'Gender',
    render: (value: any) => {
      return value === 'F' ? 'Woman' : value === 'M' ? 'Man' : 'Not specified';
    },
  },
];

export default datatableColumnConfig;
