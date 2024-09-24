export default function TimeLine() {
    return (
        <>
            <div className="bg-white  p-4 shadow-sm sm:rounded">
                <div class="ps-2 my-2 first:mt-0">
                    <h3 class="text-xs font-medium uppercase text-gray-500 dark:text-neutral-400">
                        20 Sept, 2024
                    </h3>
                </div>

                <div class="flex gap-x-3">
                    <div class="relative last:after:hidden after:absolute after:top-7 after:bottom-0 after:start-3.5 after:w-px after:-translate-x-[0.5px] after:bg-gray-200 dark:after:bg-neutral-700">
                        <div class="relative z-10 size-7 flex justify-center items-center">
                            <div class="size-2 rounded-full bg-gray-400 dark:bg-neutral-600"></div>
                        </div>
                    </div>
                    <div class="grow pt-0.5 pb-8">
                        <h3 class="flex gap-x-1.5 font-semibold text-gray-800">
                            Matter Updated
                        </h3>
                        <p class="mt-1 text-sm text-gray-600 dark:text-neutral-400">
                           Peter Braganza [Employee Benifit Plan]
                        </p>
                    </div>
                </div>

                <div class="flex gap-x-3">
                    <div class="relative last:after:hidden after:absolute after:top-7 after:bottom-0 after:start-3.5 after:w-px after:-translate-x-[0.5px] after:bg-gray-200 dark:after:bg-neutral-700">
                        <div class="relative z-10 size-7 flex justify-center items-center">
                            <div class="size-2 rounded-full bg-gray-400 dark:bg-neutral-600"></div>
                        </div>
                    </div>
                    <div class="grow pt-0.5 pb-8">
                        <h3 class="flex gap-x-1.5 font-semibold text-gray-800 ">
                            Matter Allocated
                        </h3>
                        <div class="mt-1 text-sm text-gray-600 dark:text-neutral-400">
                            Mill Hill [Accounting Fraud]
                            <div className="flex mt-1">
                                <span class="flex me-2 shrink-0 justify-center items-center size-4 bg-white border border-gray-200 text-[10px] font-semibold uppercase text-gray-600 rounded-full dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400">
                                    A
                                </span>
                                Alex Gregarov
                            </div>

                        </div>
                    </div>
                </div>

                <div class="flex gap-x-3">
                    <div class="relative last:after:hidden after:absolute after:top-7 after:bottom-0 after:start-3.5 after:w-px after:-translate-x-[0.5px] after:bg-gray-200 dark:after:bg-neutral-700">
                        <div class="relative z-10 size-7 flex justify-center items-center">
                            <div class="size-2 rounded-full bg-gray-400 dark:bg-neutral-600"></div>
                        </div>
                    </div>

                    <div class="grow pt-0.5 pb-8">
                        <h3 class="flex gap-x-1.5 font-semibold text-gray-800 ">
                            Data Synced
                        </h3>
                        <p class="mt-1 text-sm text-gray-600 dark:text-neutral-400">
                            07:12 am
                        </p>
                    </div>
                </div>

                <div class="ps-2 my-2 first:mt-0">
                    <h3 class="text-xs font-medium uppercase text-gray-500 dark:text-neutral-400">
                        19 Sept, 2024
                    </h3>
                </div>

                <div class="flex gap-x-3">
                    <div class="relative last:after:hidden after:absolute after:top-7 after:bottom-0 after:start-3.5 after:w-px after:-translate-x-[0.5px] after:bg-gray-200 dark:after:bg-neutral-700">
                        <div class="relative z-10 size-7 flex justify-center items-center">
                            <div class="size-2 rounded-full bg-gray-400 dark:bg-neutral-600"></div>
                        </div>
                    </div>

                    <div class="grow pt-0.5 pb-8">
                        <h3 class="flex gap-x-1.5 font-semibold text-gray-800 ">
                            Matter updated
                        </h3>
                        <p class="mt-1 text-sm text-gray-600 dark:text-neutral-400">
                            Mill Hill [Accounting Fraud]
                        </p>
                    </div>
                </div>
            </div>
        </>
    )
}