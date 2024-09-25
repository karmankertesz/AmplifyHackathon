import LablledValue from "@/Components/LabelledValue";
import Modal from "@/Components/Modal";
import { BadgeCheck } from "lucide-react";
import { useState } from "react";
import MatterModalItem from "./MatterModalItem";

export default function MatchingMatterItem({ matter }) {

    const [showMatterModal, setShowMatterModal] = useState(false);
    return <>
        <div className="bg-white p-3  overflow-hidden shadow-sm sm:rounded-lg cursor-pointer mt-4" onClick={() => setShowMatterModal(true)}>
            <div className="font-extrabold text-lg">{matter.title}</div>
            <div className="mt-4">
                <div class="grid grid-cols-4 grid-flow-col gap-x-10">
                    <LablledValue label={'Client'} value={matter.client_name} />
                    <LablledValue label={'Service'} value={matter.service} />
                    <LablledValue label={'Law Type'} value={matter.type_of_law} />
                    <LablledValue label={'Budget'} value={'£' + matter.budget} />
                    <LablledValue label={'In Favour'} icon={<BadgeCheck color={matter.in_favour ? '#64be66' : '#9a9e9a'} />} />
                </div>
            </div>
        </div>
        <Modal show={showMatterModal} onClose={() => setShowMatterModal(false)}>
           <MatterModalItem matter={matter}/>
        </Modal>
    </>
}