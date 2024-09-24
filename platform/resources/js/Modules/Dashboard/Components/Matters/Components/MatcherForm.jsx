import { useForm } from '@inertiajs/react';
import InputLabel from '@/Components/InputLabel';
import PrimaryButton from '@/Components/PrimaryButton';
import TextInput from '@/Components/TextInput';


export default function MatcherForm() {
    const { setData, post } = useForm({
        brief: '',
    });

    const getMatchingLawyers = () => {
        post(route('matters.getMatchingLawyers'))
    }

    return (
        <>
            <div className='flex flex-col w-[100%] '>
                <InputLabel>Matter Brief</InputLabel>
                <TextInput
                    onChange={(e) => setData('brief', e.target.value)}
                    placeholder="Brief description about the matter..." />
            </div>
            <div className='flex justify-center'>
                <PrimaryButton className='mt-4' onClick={getMatchingLawyers}>
                    Suggest Lawyers
                </PrimaryButton>
            </div>
        </>
    )

}