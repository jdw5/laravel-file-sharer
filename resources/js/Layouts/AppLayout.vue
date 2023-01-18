<template>
    <div class="w-full md:w-8/12 mx-auto lg:w-6/12 md:mt-20 mt-6 px-6">
        <header class="flex -mx-3 -mt-3 flex-wrap md:flex-nowrap items-center justify-between mb-6">
            <ul class="flex items-center gap-x-2">
                <li>
                    <a href="" class="text-sm inline-block p-3 text-gray-800">
                        Home
                    </a>
                </li>
                <li>
                    <a href="" class="text-sm inline-block p-3 text-gray-800">
                        Your Files
                    </a>
                </li>
            </ul>
            <ul class="flex items-center gap-x-2">
                <li>
                    <a :href="route('login')" class="text-sm inline-block p-3 text-gray-800">
                        Sign in
                    </a>
                </li>
                <li>
                    <a :href="route('register')" class="text-sm inline-block p-3 text-gray-800">
                        Create account
                    </a>
                </li>

            </ul>
        </header>
        <main class="">
            <slot />
        </main>
    </div>
</template>

<script>
// import { Link } from '@inertiajs/inertia-vue3'
export default {

}
</script>