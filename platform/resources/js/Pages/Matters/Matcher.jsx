
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import LawyerItem from '@/Modules/Lawyer/LawyerItem';
import MatcherForm from '@/Modules/Matters/Components/MatcherForm';
import MatchingLawyerList from '@/Modules/Matters/Components/MatchingLawyerList';
import { Head } from '@inertiajs/react';
import { useEffect, useState } from 'react';

import { router } from '@inertiajs/react'
import BlurOverlayLoading from "@/Components/BlurOverlayLoading.jsx";

export default function MattersIndex({ auth, data = {} }) {

    const [matchingLawyers, setMatchingLawyers] = useState([]);
    const [selectedLawyer, setSelectedLawyer] = useState([]);
    const [firstLoad, setFirstLoad] = useState(true);
    const [loading, setLoading] = useState(false);

    router.on('start', () => setLoading(true));
    router.on('finish', () => setLoading(false));

    useEffect(() => {
        setMatchingLawyers(data && data.matchingLawyers ? data.matchingLawyers : []);
        setFirstLoad(!data)
    }, [data])



    return (
        <AuthenticatedLayout
            user={auth.user}
            header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">Matcher</h2>}
        >
            <Head title='Matters | Matcher' />

                    <BlurOverlayLoading loading={loading}/>
                        <MatcherForm />
                        {
                            !firstLoad && matchingLawyers.length>0 ?
                                <div class="flex">
                                    <MatchingLawyerList lawyers={matchingLawyers} firstLoad={firstLoad} lawyerSelected={(lawyer) => setSelectedLawyer(lawyer)} />
                                    <div className='w-[70%] mt-10 pl-10'>
                                        <LawyerItem lawyer={selectedLawyer} />
                                    </div>
                                </div>
                                : !firstLoad ? <div className="text-center mt-10">No matching lawyers found</div> : ''
                        }
        </AuthenticatedLayout>
    )
}
