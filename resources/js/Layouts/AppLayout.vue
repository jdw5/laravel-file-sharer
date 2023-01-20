<template>
    <div class="w-full md:w-8/12 mx-auto lg:w-6/12 md:mt-20 mt-6 px-6">
        <header class="flex -mx-3 -mt-3 flex-wrap md:flex-nowrap items-center justify-between mb-6">
            <ul class="flex items-center gap-x-2">
                <li>
                    <Link :href="route('home')" :class="route().current('home') ? 'text-indigo-500' : 'hover:text-gray-800'" class="text-sm inline-block p-3 text-gray-600 font-medium leading-5">
                        Home
                    </Link>
                </li>
                <li>
                    <Link :href="route('files')" :class="route().current('files') ? 'text-indigo-500' : 'hover:text-gray-800'" class="text-sm inline-block p-3 text-gray-600 font-medium leading-5">
                        Your Files
                    </Link>
                </li>
            </ul>
            <ul class="flex items-center gap-x-2">
                <template v-if="$page.props.auth.user">
                    <li>
                        <Link :href="route('profile.edit')" class="text-sm inline-block p-3 text-gray-600 font-medium leading-5">
                            Account
                        </Link>
                    </li> 
                    <li>
                        <Link :href="route('logout')" class="text-sm inline-block p-3 text-gray-600 hover:text-gray-800 font-medium leading-5" method="post" as="button">
                            Log out
                        </Link>
                    </li> 
                </template>
                <template v-else>
                    <li>
                        <Link :href="route('login')" :class="route().current('login') ? 'text-indigo-500' : 'hover:text-gray-800'" class="text-sm inline-block p-3 text-gray-600 font-medium leading-5">
                            Sign in
                        </Link>
                    </li>
                    <li>
                        <Link :href="route('register')" :class="route().current('register') ? 'text-indigo-500' : 'hover:text-gray-800'" class="text-sm inline-block p-3 text-gray-600 font-medium leading-5">
                            Create account
                        </Link>
                    </li>
                </template>
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