import PrimaryButton from "@/Components/PrimaryButton";
import MatchingLawyerItem from "../Matters/Components/MatchingLawyerItem";
import MatchingMattersList from "../Matters/Components/MatchingMattersList";
import SecondaryButton from "@/Components/SecondaryButton";
import { Send } from "lucide-react";

export default function LawyerItem({ lawyer }) {
    return (
        <div className="bg-white p-3  overflow-hidden shadow-sm sm:rounded-lg cursor-pointer">
            <div className="flex items-center w-[100%]">
                <MatchingLawyerItem lawyer={lawyer} extraInfo={true}/>
            </div>
            <div className="mt-10">
                <div className="text-gray-700 text-sm uppercase border-b-2 pb-3">Matters</div>
                <MatchingMattersList matters={lawyer.matters} />
            </div>
            <div className="flex justify-end mt-10">
                <SecondaryButton color="bg-orange-primary"><span className="mr-2">Get In touch</span> <Send size={13} /> </SecondaryButton>
            </div>
        </div>
    )
}