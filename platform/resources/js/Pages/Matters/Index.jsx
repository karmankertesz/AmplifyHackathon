import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head } from '@inertiajs/react';
import DataTable from 'react-data-table-component';


export default function MattersIndex({ auth, matters }) {
    const columns = [
        {
            name:'Matter ID',
            selector: row => row.matter_id
        },
        {
            name:'Title',
            selector: row => row.title
        },
        {
            name:'Client',
            selector: row => row.client_name
        },
        {
            name:'Industry',
            selector: row => row.industry
        },
        {
            name:'Closure Date',
            selector: row => row.closure_date
        }
    ]
    return (
        <AuthenticatedLayout
            user={auth.user}
            header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">Matters</h2>}
        >
            <Head title='Matters' />
            <div className='py-5'>
                <DataTable
                    columns={columns}
                    data={matters}
                    pagination={true}
                />
            </div>

        </AuthenticatedLayout>
    )
}