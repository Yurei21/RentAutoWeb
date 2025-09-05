import AuthenticatedLayout from "@/Layouts/AuthenticatedAdminLayout";
import {Head, Link} from "@inertiajs/react";

export default function Index({}){
    <AuthenticatedLayout
        header={
            <div className="flex justify-between items-center">
                <h2 className="text-3xl font-semibold leading-tight text-gray-800 dark:text-gray-200">Vehicles</h2>
            </div>
        }
    >
    </AuthenticatedLayout>
}