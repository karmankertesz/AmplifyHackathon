import LablledValue from "@/Components/LabelledValue";
import CircularProgress from "@/Components/CircularProgress.jsx";

export default function MatchingLawyerItem({ lawyer, lawyerClicked, selected, extraInfo }) {
    const getPercentage = () => {
        return Math.round(lawyer.score * 100 / 10.0);
    }
    return <>
        <div className={`bg-white p-3 transition-all overflow-hidden shadow-md sm:rounded-lg cursor-pointer mt-4 ${selected ? 'w-[100%]' : 'w-[95%]'} `} onClick={() => lawyerClicked(lawyer)}>
            <div className="flex justify-between">
                <div className="font-extrabold text-lg">{lawyer.name}</div>
                <div className="text-xs flex items-center">
                <div>Match Percentage</div>
                    <div className="ml-1">
                        {/*<div class="relative size-10">*/}
                        {/*    <svg class="size-full -rotate-90" viewBox="0 0 36 36" xmlns="http://www.w3.org/2000/svg">*/}
                        {/*        <circle cx="18" cy="18" r="16" fill="none" className="stroke-current text-gray-200 " stroke-width="2"></circle>*/}
                        {/*        <circle cx="18" cy="18" r="16" fill="none" className={`stroke-current `+ (lawyer.score < 2 ? 'text-orange-primary' : 'text-green-primary')}  stroke-width="2" stroke-dasharray="100" stroke-dashoffset="65" stroke-linecap="round"></circle>*/}
                        {/*    </svg>*/}
                        {/*    <div className="absolute top-1/2 start-1/2 transform -translate-y-1/2 -translate-x-1/2">*/}
                        {/*        <span className={`text-center  font-bold `+(lawyer.score < 2 ? 'text-orange-primary' : 'text-green-primary')}>{getPercentage()}%</span>*/}
                        {/*    </div>*/}
                        {/*</div>*/}
                        <CircularProgress percentage={getPercentage()}/>
                    </div>
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
