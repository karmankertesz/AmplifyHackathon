
import InputLabel from '@/Components/InputLabel';
import PrimaryButton from '@/Components/PrimaryButton';
import TextArea from '@/Components/TextArea';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import LawyerItem from '@/Modules/Lawyer/LawyerItem';
import LawyerRequirementForm from '@/Modules/Matters/Components/LawyerRequirementForm';
import MatcherForm from '@/Modules/Matters/Components/MatcherForm';
import MatchingLawyerList from '@/Modules/Matters/Components/MatchingLawyerList';
import MatchingMattersList from '@/Modules/Matters/Components/MatchingMattersList';
import { Head } from '@inertiajs/react';
import { Link, useForm, usePage } from '@inertiajs/react';
import { useEffect, useState } from 'react';


export default function MattersIndex({ auth, data = {} }) {

    const [matchingLawyers, setMatchingLawyers] = useState([]);
    const [selectedLawyer, setSelectedLawyer] = useState([]);
    const [firstLoad, setFirstLoad] = useState(true);


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
            <MatcherForm />
            {
                !firstLoad ?
                    <div class="flex">
                        <MatchingLawyerList lawyers={matchingLawyers} firstLoad={firstLoad} lawyerSelected={(lawyer) => setSelectedLawyer(lawyer)} />
                        <div className='w-[70%] mt-10 pl-10'>
                            <LawyerItem lawyer={selectedLawyer} />
                        </div>
                    </div>
                    : ''
            }
        </AuthenticatedLayout>
    )
}