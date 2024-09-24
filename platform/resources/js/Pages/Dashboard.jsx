import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import BaseStats from '@/Modules/Dashboard/Components/BaseStats';
import LawyerStats from '@/Modules/Dashboard/Components/LawyerStats';
import MatterStats from '@/Modules/Dashboard/Components/MatterStats';
import TimeLine from '@/Modules/Dashboard/Components/Timeline';
import { Head } from '@inertiajs/react';

export default function Dashboard({ auth }) {
    return (
        <AuthenticatedLayout
            user={auth.user}
            header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>}
        >
            <Head title='Dashboard'/>
            <div className='py-10'>
                <BaseStats />
                <div className='flex justify-between mt-20'>
                    <div className='w-[65%]'>
                        <MatterStats className="w-[45%]" />
                        <div className='mt-10 flex'>
                            <LawyerStats className="mt-10" />
                        </div>
                    </div>
                    <div>
                        <TimeLine />
                    </div>
                </div>

            </div>

        </AuthenticatedLayout>
    );
}
