<template>
    <div class="w-full md:w-8/12 mx-auto lg:w-6/12 md:mt-20 mt-6 px-6">
        <header class="flex -mx-3 -mt-3 flex-wrap md:flex-nowrap items-center justify-between mb-6">
            <ul class="flex items-center">
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
            <ul class="flex items-center">
                <li>
                    <a href="" class="text-sm inline-block p-3 text-gray-800">
                        Sig in
                    </a>
                </li>
                <li>
                    <a href="" class="text-sm inline-block p-3 text-gray-800">
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
</script>