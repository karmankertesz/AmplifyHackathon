import PrimaryButton from "@/Components/PrimaryButton";
import MatchingMatterItem from "./MatchingMatterItem";

export default function MatchingMattersList({ matters = [], firstLoad = true }) {
    return (
        <div className="h-full">
            <div className="h">
                {
                    matters.length == 0 && !firstLoad ?
                        <div className="flex mt-10 bg-white p-5 justify-center items-center h-full">
                            <p className="text-gray-500">No matching matters found</p>
                        </div>
                        :
                        <div className="w-full">
                            {
                                matters.map( (matter,index) => <MatchingMatterItem key={index} matter={matter} />)
                            }
                        </div>
                }
            </div>
        </div>
    )
}