<template>
    <div class="w-full px-6 mx-auto mt-6 md:w-8/12 lg:w-6/12 md:mt-20">
        <header class="flex flex-wrap items-center justify-between mb-6 -mx-3 -mt-3 md:flex-nowrap">
            <ul class="flex items-center gap-x-2">
                <li>
                    <Link :href="route('home')" :class="route().current('home') ? 'text-indigo-500' : 'hover:text-gray-800'" class="inline-block p-3 text-sm font-medium leading-5 text-gray-600">
                        Home
                    </Link>
                </li>
                <li>
                    <Link :href="route('files')" :class="route().current('files') ? 'text-indigo-500' : 'hover:text-gray-800'" class="inline-block p-3 text-sm font-medium leading-5 text-gray-600">
                        Files
                    </Link>
                </li>
                <li>
                    <Link :href="route('uploader')" :class="route().current('uploader') ? 'text-indigo-500' : 'hover:text-gray-800'" class="inline-block p-3 text-sm font-medium leading-5 text-gray-600">
                        Uploader
                    </Link>
                    <Link :href="route('user.usage')" :class="route().current('user.usage') ? 'text-indigo-500' : 'hover:text-gray-800'" class="inline-block p-3 text-sm font-medium leading-5 text-gray-600">
                        Usage
                    </Link>
                </li>
            </ul>
            <ul class="flex items-center gap-x-2">
                <template v-if="$page.props.auth.user">
                    <li>
                        <Link :href="route('user.account')" class="inline-block p-3 text-sm font-medium leading-5 text-gray-600" :class="route().current('user.account') ? 'text-indigo-500' : 'hover:text-gray-800'">
                            Account
                        </Link>
                    </li> 
                    <li>
                        <Link :href="route('logout')" class="inline-block p-3 text-sm font-medium leading-5 text-gray-600 hover:text-gray-800" method="post" as="button">
                            Log out
                        </Link>
                    </li> 
                </template>
                <template v-else>
                    <li>
                        <Link :href="route('login')" :class="route().current('login') ? 'text-indigo-500' : 'hover:text-gray-800'" class="inline-block p-3 text-sm font-medium leading-5 text-gray-600">
                            Sign in
                        </Link>
                    </li>
                    <li>
                        <Link :href="route('register')" :class="route().current('register') ? 'text-indigo-500' : 'hover:text-gray-800'" class="inline-block p-3 text-sm font-medium leading-5 text-gray-600">
                            Create account
                        </Link>
                    </li>
                </template>
                <li>
                        <Link :href="route('plans')" :class="route().current('plans') ? 'text-indigo-500' : 'hover:text-gray-800'" class="inline-block p-3 text-sm font-medium leading-5 text-indigo-600">
                            Upgrade
                        </Link>
                    </li>
            </ul>
        </header>
        <main class="">
            <slot />
        </main>
    </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';

</script>