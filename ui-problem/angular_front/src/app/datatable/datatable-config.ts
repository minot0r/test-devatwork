export interface IColumnConfig {
    field: string;
    title?: string;
    render?: (value: any) => string;
}

interface IDatatableCallbackValues {
    total: number;
    data: any[];
}

type DatatableCallback = (values: IDatatableCallbackValues) => void;

export interface DatatableConfig {
    columnsConfig: IColumnConfig[];
    maxRows: number;
    fetchData: (page: number, callback: DatatableCallback) => Promise<void>;
}