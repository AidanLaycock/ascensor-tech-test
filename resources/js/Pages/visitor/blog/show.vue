<script setup>
import { Head } from '@inertiajs/vue3';
import VisitorLayout from "@/Layouts/VisitorLayout.vue";
import ImageBanner from "@/Components/ImageBanner.vue";

defineProps({
    post: Object,
});
</script>

<template>
    <Head :title="$page.props.post.title" />
    <visitor-layout>
        <image-banner>{{ $page.props.post.title }}</image-banner>
        <section>
            <div class="flex flex-col md:flex-row pt-5 pb-24 px-24">
                <div class="sm:w-full md:w-3/4 lg:divide-y lg:divide-gray-100">
                    <div class="sm:flex lg:items-end group bg-gray-100 m-5 p-5">
                        <div>
                            <h1 class="font-medium leading-6 text-xl text-gray-800 lg:text-2xl">{{ post.title }}</h1>
                            <span class="text-sm text-gray-500">{{ post.created_at }}</span>
                            <p class="mt-2 text-lg text-gray-500">{{ post.content }}</p>
                        </div>
                    </div>
                </div>
                <div class="flex flex-wrap justify-start flex-grow mt-8 text-left">
                    <div class="w-full space-y-4 md:w-1/2">
                        <nav class="mb-10 list-none">
                            <li v-for="category in post.categories" :key="category.id" class="mb-3">
                                <a href="#">{{ category.name }}</a>
                            </li>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
    </visitor-layout>
</template>
