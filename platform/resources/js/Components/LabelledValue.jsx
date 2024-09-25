export default function LablledValue({ label, value, icon }) {
    return <div>
        {
            icon ? <>
                <div className="font-bold text-xs flex justify-center">{icon}</div>
                <div className="text-gray-500 text-xxs uppercase flex justify-center">{label}</div>
            </>
                :
                <>
                    <div className="font-bold text-xs text-green-primary">{value}</div>
                    <div className="text-gray-500 text-xxs uppercase">{label}</div>
                </>
        }

    </div>
}