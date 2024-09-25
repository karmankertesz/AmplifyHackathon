import { useEffect, useState } from "react";
import MatchingLawyerItem from "./MatchingLawyerItem";

export default function MatchingLawyerList({ lawyers = [], firstLoad = true, lawyerSelected }) {

    const [selectedLawyer, setSelectedLawyer] = useState(lawyers[0]);
    const handleLawyerSelected = (lawyer) => {
        lawyerSelected(lawyer);
        setSelectedLawyer(lawyer);
    }

    useEffect(() => {
        handleLawyerSelected(lawyers[0])
    }, [lawyers])

    return (
        <div className='overflow-y-auto w-[33%] max-h-[45rem] mt-10'>
            <div className="h-full">
                {
                    lawyers.length == 0 && !firstLoad ?
                        <div className="flex mt-10 bg-white p-5 justify-center items-center h-full">
                            <p className="text-gray-500">No matching lawyers found</p>
                        </div>
                        :
                        <div className="w-full flex flex-col items-center">
                            {
                                lawyers.map((lawyer, index) => <MatchingLawyerItem key={index} lawyer={lawyer} lawyerClicked={handleLawyerSelected} selected={lawyer.id === selectedLawyer?.id} />)
                            }
                        </div>
                }
            </div>
        </div>
    )
}