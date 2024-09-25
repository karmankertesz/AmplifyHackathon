export default function MatterStats(params) {
    return (
        <>
            <div className="bg-white p-5  overflow-hidden shadow-sm sm:rounded-lg">
                <div className="mb-5 font-bold text-xl text-teal-600">
                    Matter Stats
                </div>
                {params.mattersStats.map((item, index) => (
                    <div key={index} className="flex justify-between">
                        <div>{item.service}</div>
                        <div className="font-semibold">{item.cnt}</div>
                    </div>
                ))}

            </div>
        </>
    )
}
