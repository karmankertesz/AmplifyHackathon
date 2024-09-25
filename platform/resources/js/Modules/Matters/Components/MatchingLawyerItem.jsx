import LablledValue from "@/Components/LabelledValue";

export default function MatchingLawyerItem({ lawyer, lawyerClicked, selected, extraInfo }) {
    return <>
        <div className={`bg-white p-3 transition-all overflow-hidden shadow-md sm:rounded-lg cursor-pointer mt-4 ${selected ? 'w-[100%]' : 'w-[95%]'} `} onClick={() => lawyerClicked(lawyer)}>
            <div className="flex justify-between">
                <div className="font-extrabold text-lg">{lawyer.name}</div>
                <div className="text-xs flex items-center">
                    <span>Match Score:</span> 
                    <span className={`font-bold text-xxl ml-2 `+ (lawyer.score < 3 ? 'text-orange-primary' : 'text-green-primary')}>{lawyer.score}</span> 
                    {/* <span className={`font-bold text-lg ml-2 `+ (lawyer.score < 3 ? 'text-orange-primary' : 'text-green-primary')}>/10</span>  */}
                </div>
            </div>
            <div className="mt-4">
                <div className={`grid grid-flow-col gap-x-5 ${extraInfo ? 'grid-cols-5 ' : 'grid-cols-3 '}`}>
                    <LablledValue label={'Location'} value={lawyer.location} />
                    <LablledValue label={'Service'} value={lawyer.service} />
                    {
                        extraInfo ? <>
                            <LablledValue label={'Law Type'} value={lawyer.type_of_law} />
                            <LablledValue label={'Total Matter(s)'} value={lawyer.total_cases} />
                        </>
                            : ''
                    }
                    <LablledValue label={'Win Rate'} value={lawyer.winning_rate * 100 + '%'} />
                </div>
            </div>
        </div>
    </>
}