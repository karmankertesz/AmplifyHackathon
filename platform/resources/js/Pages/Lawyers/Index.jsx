import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head } from '@inertiajs/react';
import DataTable from 'react-data-table-component';


export default function LawyerIndex({ auth, lawyers }) {
    const columns = [
        {
            name:'Name',
            selector: row => row.name
        },
        {
            name:'Location',
            selector: row => row.location
        },
        {
            name:'Matters',
            selector: row => row.total_cases
        },
        {
            name:'Service',
            selector: row => row.service
        },
        {
            name:'Type of law',
            selector: row => row.type_of_law
        }
    ];

    return (
        <AuthenticatedLayout
            user={auth.user}
            header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">Lawyers</h2>}
        >
            <Head title='Matters' />
            <div className='py-5'>
                <DataTable
                    columns={columns}
                    data={lawyers}
                    pagination={true}
                />
            </div>

        </AuthenticatedLayout>
    )
}