import { Head, Link } from '@inertiajs/react';
import { Button } from "@/components/ui/button";
import { Card, CardContent, CardHeader, CardTitle } from "@/components/ui/card";
import { Badge } from "@/components/ui/badge";
import DarkModeToggle from '@/Components/DarkModeToggle';
import ApplicationLogo from '@/Components/ApplicationLogo';

export default function Welcome({ auth, laravelVersion, phpVersion }) {
    return (
        <>
            <Head title="Welcome" />
            <div className="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
                <div className="relative flex min-h-screen flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
                    <div className="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                        <header className="grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3">
                            <div className="flex lg:col-start-2 lg:justify-center">
                                <ApplicationLogo className="w-20 h-20"/>
                            </div>
                            <nav className="-mx-3 flex flex-1 justify-end">
                                {auth.user ? (
                                    <>
                                        <Link
                                            href={route('dashboard')}
                                            className="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                                        >
                                            Dashboard
                                        </Link>
                                        <DarkModeToggle />
                                    </>
                                ) : (
                                    <>
                                        <Link
                                            href={route('login')}
                                            className="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                                        >
                                            Log in
                                        </Link>
                                        <Link
                                            href={route('register')}
                                            className="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                                        >
                                            Register
                                        </Link>
                                        <DarkModeToggle />
                                    </>
                                )}
                            </nav>
                        </header>

                        <main className="min-h-screen bg-gradient-to-br from-gray-50 to-gray-200 rounded-xl dark:from-black dark:to-gray-900 flex items-center justify-center px-4 round">
                            <div className="max-w-4xl w-full space-y-6">
                                <Card className="shadow-xl border dark:border-gray-800">
                                    <CardHeader className="text-center">
                                        <CardTitle className="text-3xl font-bold">
                                            RentAuto — Your Reliable Car Rental Service
                                        </CardTitle>
                                        <p className="text-sm text-muted-foreground">
                                            Easily rent, manage, and return vehicles with transparency and speed.
                                        </p>
                                    </CardHeader>

                                    <CardContent className="flex flex-col items-center gap-6">
                                        <img
                                            src="/images/car-banner.jpg"
                                            alt="Car Rental"
                                            className="w-full h-64 object-cover rounded-xl"
                                            onError={(e) => e.target.style.display = 'none'}
                                        />

                                        <div className="flex gap-4 flex-wrap justify-center">
                                            {auth.user ? (
                                                <Button asChild variant="default">
                                                    <Link href={route('dashboard')}>Go to Dashboard</Link>
                                                </Button>
                                            ) : (
                                                <>
                                                    <Button asChild variant="default">
                                                        <Link href={route('login')}>Log In</Link>
                                                    </Button>
                                                    <Button asChild variant="outline">
                                                        <Link href={route('register')}>Register</Link>
                                                    </Button>
                                                </>
                                            )}
                                        </div>

                                        <div className="text-center mt-6">
                                            <Badge variant="secondary">
                                                Duhone v12
                                            </Badge>
                                        </div>
                                    </CardContent>
                                </Card>

                                <footer className="text-center text-sm text-muted-foreground">
                                    &copy; {new Date().getFullYear()} RentAuto. All rights reserved.
                                </footer>
                            </div>
                        </main>

                        <footer className="py-16 text-center text-sm text-black dark:text-white/70">
                            Laravel v{laravelVersion} (PHP v{phpVersion})
                            {auth.admin ? (
                                <>
                                    <Link
                                        href={route('admin.dashboard')}
                                        className="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                                    >
                                        Admin Dashboard
                                    </Link>
                                </>
                            ) : (
                                <>
                                    <Link
                                        href={route('admin.login')}
                                        className="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                                    >
                                        Admin Log in
                                    </Link>
                                    <Link
                                        href={route('admin.register')}
                                        className="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                                    >
                                        Admin register
                                    </Link>
                                </>
                            )}

                        </footer>
                    </div>
                </div>
            </div>
        </>
    );
}
