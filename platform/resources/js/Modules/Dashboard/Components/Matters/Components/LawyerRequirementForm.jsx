import { Link, useForm, usePage } from '@inertiajs/react';
import InputLabel from '@/Components/InputLabel';
import PrimaryButton from '@/Components/PrimaryButton';
import TextArea from '@/Components/TextArea';
import TextInput from '@/Components/TextInput';
import { useEffect } from 'react';


export default function LawyerRequirementForm({matters}) {
    const { setData, post } = useForm({
        lawyerRequirment: '',
        matterIds:[]
    });

    useEffect(()=>{
        const ids = matters.map(matter=>matter.id);
        console.log( ids);
        setData('matterIds',ids)
    },[matters]);
    
    const getMatchingLawyers = () => {
        post(route('matters.getMatchingLawyers'))
    }

    return (
        <>
            <div className="">
                <div className='flex flex-col w-[100%] mt-10'>
                    <InputLabel>Lawyer requirements</InputLabel>
                    <TextArea onChange={(e) => setData('lawyerRequirment', e.target.value)} />
                </div>
                <div className='flex justify-end mt-5'>
                    <PrimaryButton className='bg-teal-700' onClick={getMatchingLawyers}>Find Lawyers</PrimaryButton>
                </div>
            </div>
        </>
    )

}