import {Link, Head} from '@inertiajs/react';
import ApplicationLogo from '@/Components/ApplicationLogo';
import SecondaryButton from '@/Components/SecondaryButton';
import ApplicationLogoNoText from "@/Components/ApplicationLogoNoText";

export default function Welcome({auth, laravelVersion, phpVersion}) {
    return (
        <>
            <Head title="Welcome"/>
            <div className=" flex flex-col min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter   selection:bg-red-500 selection:text-white">
                <div className="flex shadow px-20">
                    <ApplicationLogo height={100}/>
                    <div className="sm:fixed sm:top-0 sm:right-0 p-6 text-end">
                        {auth.user ? (
                            <Link
                                href={route('dashboard')}
                                className="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                            >
                                Dashboard
                            </Link>
                        ) : (
                            <>
                                <Link
                                    href={route('login')}
                                    className="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                                >
                                    Log in
                                </Link>

                                <Link
                                    href={route('register')}
                                    className="ms-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                                >
                                    Register
                                </Link>
                            </>
                        )}
                    </div>
                </div>
                <div className="flex flex-1 px-20 h-[100%]">
                    <div className="p-20 w-2/3">
                        <div className="flex">
                            <ApplicationLogoNoText />
                            <div className="text-6xl font-bold ml-4">CaseCatalyst:</div>
                        </div>
                        <div className="text-6xl font-bold">
                            Unlock you Firm's true speed
                        </div>
                        <div className="mt-5 text-lg">
                            Discover the ideal legal advocate with CaseMatching Technology, where our cutting-edge algorithm swiftly connects you to a lawyer tailored to your case's specific needs. Experience a seamless, secure, journey to the right legal expertise, backed by a diverse network of attorneys and AI, to match with confidence, knowing your case is in the right hands.
                        </div>
                        <div className="mt-5">
                            <SecondaryButton>Book a demo</SecondaryButton>
                        </div>
                    </div>
                    <div className="p-20 ">
                        <img src={'@/'}/>
                    </div>
                </div>
            </div>



            <style>{`
                .bg-dots-darker {
                    background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(0,0,0,0.07)'/%3E%3C/svg%3E");
                }
                @media (prefers-color-scheme: dark) {
                    .dark\\:bg-dots-lighter {
                        background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(255,255,255,0.07)'/%3E%3C/svg%3E");
                    }
                }
            `}</style>
        </>
    );
}
