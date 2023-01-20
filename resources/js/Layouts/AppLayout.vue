<template>
    <div class="w-full md:w-8/12 mx-auto lg:w-6/12 md:mt-20 mt-6 px-6">
        <header class="flex -mx-3 -mt-3 flex-wrap md:flex-nowrap items-center justify-between mb-6">
            <ul class="flex items-center gap-x-2">
                <li>
                    <Link href="" class="text-sm inline-block p-3 text-gray-800">
                        Home
                    </Link>
                </li>
                <li>
                    <Link href="" class="text-sm inline-block p-3 text-gray-800">
                        Your Files
                    </Link>
                </li>
            </ul>
            <ul class="flex items-center gap-x-2">
                <template v-if="$page.props.auth.user">
                    <li>
                        <Link :href="route('profile.edit')" class="text-sm inline-block p-3 text-gray-800">
                            Account
                        </Link>
                    </li> 
                    <li>
                        <Link :href="route('logout')" class="text-sm inline-block p-3 text-gray-800" method="post" as="button">
                            Log out
                        </Link>
                    </li> 
                </template>
                <template v-else>
                    <li>
                        <Link :href="route('login')" class="text-sm inline-block p-3 text-gray-800">
                            Sign in
                        </Link>
                    </li>
                    <li>
                        <Link :href="route('register')" class="text-sm inline-block p-3 text-gray-800">
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