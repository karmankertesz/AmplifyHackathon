export default function BlurOverlayLoading({loading}){
    return (
        <>
        {
            loading ? <>
                <div className={`fixed inset-0 bg-gray-300 bg-opacity-50 z-50 flex items-center justify-center`}>
                    <div className=" p-5 rounded-lg ">
                        <div className="flex items-center justify-center bg-white">
                            <img src={'/assets/loading.gif'} className="h-20"/>
                        </div>
                    </div>
                </div>
            </>: ''
        }
        </>
    );

}
