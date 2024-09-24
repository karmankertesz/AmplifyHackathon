import { BadgeCheck } from "lucide-react";
import { useState } from "react";

export default function MatterModalItem({matter}){
    const [selectedTab, setSelectedTab] = useState('general');

    return (
        <div className="px-5 py-10">
        <div className="font-extrabold text-lg">{matter.title}</div>
        <div className="border-t-2 mt-5">
            <div className="flex p-2 text-gray-400 cursor-pointer text-sm">
                <div onClick={() => setSelectedTab('general')} className={selectedTab == 'general' ? 'text-gray-600 font-semibold' : ''} >General information</div>
                <div onClick={() => setSelectedTab('description')} className={`ml-4 ${selectedTab == 'description' ? 'text-gray-600 font-semibold' : ''}`}>Description</div>
            </div>
        </div>
        <div className="mt-2">
            {
                selectedTab === 'general' ?
                    <>
                        <div className="text-sm flex p-2 justify-between border-b-2">
                            <div className="text-green-primary me-5 w-1/3">
                                Client
                            </div>
                            <div className="flex-1">
                                {matter.client_name}
                            </div>
                        </div>
                        <div className="text-sm flex p-2 justify-between border-b-2">
                            <div className="text-green-primary me-5 w-1/3">
                                Service
                            </div>
                            <div className="flex-1">
                                {matter.service}
                            </div>
                        </div>
                        <div className="text-sm flex p-2 justify-between border-b-2">
                            <div className="text-green-primary me-5 w-1/3">
                                Law Type
                            </div>
                            <div className="flex-1">
                                {matter.type_of_law}
                            </div>
                        </div>
                        <div className="text-sm flex p-2 justify-between border-b-2">
                            <div className="text-green-primary me-5 w-1/3">
                                Budget
                            </div>
                            <div className="flex-1">
                                {'£' + matter.budget}
                            </div>
                        </div>
                        <div className="text-sm flex p-2 justify-between border-b-2">
                            <div className="text-green-primary me-5 w-1/3">
                                Industry
                            </div>
                            <div className="flex-1">
                                {matter.industry}
                            </div>
                        </div>
                        <div className="text-sm flex p-2 justify-between border-b-2">
                            <div className="text-green-primary me-5 w-1/3">
                                Closure Date
                            </div>
                            <div className="flex-1">
                                {matter.closure_date}
                            </div>
                        </div>
                        <div className="text-sm flex p-2 justify-between border-b-2">
                            <div className="text-green-primary me-5 w-1/3">
                                In favour
                            </div>
                            <div className="flex-1">
                                {<BadgeCheck color={matter.in_favour ? '#64be66' : '#9a9e9a'} />}
                            </div>
                        </div>
                        <div className="text-sm flex p-2 justify-between border-b-2">
                            <div className="text-green-primary me-5 w-1/3">
                                Supporting Documents
                            </div>
                            <div className="flex-1">
                               <div className="text-gray-700">
                                    Initial case draft.pdf
                               </div>
                               <div className="text-gray-700">
                                    Contract.pdf
                               </div>
                            </div>
                        </div>
                        <div className="text-sm flex p-2 justify-between border-b-2">
                            <div className="text-green-primary me-5 w-1/3">
                               Lawyer
                            </div>
                            <div className="flex-1">
                               {matter.lawyer.name}
                            </div>
                        </div>
                    </>
                    :
                    <>
                        <div className="text-sm whitespace-pre-line max-h-[400px] px-2 overflow-y-auto ">
                            {matter.description}
                        </div>
                    </>
            }
        </div>
    </div>
    )

}