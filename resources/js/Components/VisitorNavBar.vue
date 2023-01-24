<template>
    <div class="w-full bg-gray-900">
        <div class="flex flex-col max-w-screen-xl p-5 mx-auto md:items-center md:justify-between md:flex-row md:px-6 lg:px-8 text-white">
            <div class="flex flex-row items-center justify-between lg:justify-start">
                <a href="/" class="text-lg font-bold tracking-tighter transition duration-500 ease-in-out transform tracking-relaxed lg:pr-8"> Company Name </a>
                <button class="rounded-lg md:hidden focus:outline-none focus:shadow-outline" @click="open = !open">
                    <svg fill="black" viewBox="0 0 20 20" class="w-8 h-8">
                        <path v-if="!open" fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                        <path v-if="open" fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" style="display: none"></path>
                    </svg>
                </button>
            </div>
            <nav :class="{'flex': open, 'hidden': !open}" class="flex-col flex-grow hidden md:flex md:justify-end md:flex-row">
                <ul class="space-y-2 list-none lg:space-y-0 lg:items-center lg:inline-flex">
                    <li>
                        <a href="/" class="px-2 lg:px-6 py-6 text-sm border-b-2 border-transparent hover:border-blue-600 leading-[22px] md:px-3 hover:text-blue-500"> Blog
                        </a>
                    </li>
                    <div>
                        <Link
                            v-if="$page.props.auth.user"
                            :href="route('dashboard')"
                            class="px-2 lg:px-6 py-6 text-sm border-b-2 border-transparent hover:border-blue-600 leading-[22px] md:px-3 hover:text-blue-500"
                            as="li"
                        >Dashboard</link
                        >
                        <template v-else>
                            <Link :href="route('login')" class="px-2 lg:px-6 py-6 text-sm border-b-2 border-transparent hover:border-blue-600 leading-[22px] md:px-3 hover:text-blue-500">Log in</Link>

                            <Link
                                :href="route('register')"
                                class="px-2 lg:px-6 py-6 text-sm border-b-2 border-transparent hover:border-blue-600 leading-[22px] md:px-3 hover:text-blue-500"
                            >Register</Link
                            >
                        </template>
                    </div>
                </ul>
            </nav>
        </div>
    </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
</script>
