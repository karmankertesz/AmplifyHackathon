export default function BaseStats(params) {
    return (
        <>
            <div className="flex justify-between">
                <div className="bg-white p-5  overflow-hidden shadow-sm sm:rounded-lg w-[30%]">
                    <div className="font-extrabold text-4xl">{params.mattersCount}</div>
                    <div className='flex justify-between'>
                        <div className="text-gray-700 text-sm">Matters</div>
                        <div className="font-semibold text-teal-700 text-sm">Last synced: 1hr ago</div>
                    </div>
                </div>
                <div className="bg-white p-5  overflow-hidden shadow-sm sm:rounded-lg w-[30%]">
                    <div className="font-extrabold text-4xl">{params.lawyersCount}</div>
                    <div className='flex justify-between'>
                        <div className="text-gray-700 text-sm">Lawyers</div>
                        <div className="font-semibold text-teal-700 text-sm">Last synced: 1hr ago</div>
                    </div>
                </div>

                <div className="bg-white p-5  overflow-hidden shadow-sm sm:rounded-lg w-[30%]">
                    <div className="font-extrabold text-teal-500 text-4xl">10</div>
                    <div className="text-gray-700 text-sm">Matters matched</div>
                </div>
            </div>
        </>
    )
}
