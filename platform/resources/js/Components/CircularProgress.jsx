export default  function CircularProgress({percentage}){
    // Calculate the circumference of the circle
    const radius = 16;
    const circumference = 2 * Math.PI * radius;

    // Calculate the stroke dash offset based on the percentage
    const strokeDashoffset = ((100 - percentage) / 100) * circumference;

    // Determine the color based on the percentage
    const colorClass = percentage < 30 ? 'text-orange-primary' : 'text-green-primary';

    return (
        <div className="relative size-10">
            <svg
                className="size-full -rotate-90"
                viewBox="0 0 36 36"
                xmlns="http://www.w3.org/2000/svg"
            >
                <circle
                    cx="18"
                    cy="18"
                    r={radius}
                    fill="none"
                    className="stroke-current text-gray-200"
                    strokeWidth="2"
                ></circle>
                <circle
                    cx="18"
                    cy="18"
                    r={radius}
                    fill="none"
                    className={`stroke-current ${colorClass}`}
                    strokeWidth="2"
                    strokeDasharray={circumference}
                    strokeDashoffset={strokeDashoffset}
                    strokeLinecap="round"
                ></circle>
            </svg>
            <div className="absolute top-1/2 start-1/2 transform -translate-y-1/2 -translate-x-1/2">
                <span className={`text-center font-bold ${colorClass}`}>{percentage}%</span>
            </div>
        </div>
    );
}
