<script setup>
import { Head } from '@inertiajs/vue3';
import VisitorLayout from "@/Layouts/VisitorLayout.vue";
import ImageBanner from "@/Components/ImageBanner.vue";

defineProps({
    posts: Array,
    categories: Array
});
</script>

<template>
    <Head title="Blog" />

    <visitor-layout>
        <image-banner>Blog</image-banner>
        <section>
            <div class="flex flex-col md:flex-row pt-5 pb-24 px-24">
                <div class="sm:w-full md:w-3/4 lg:divide-y lg:divide-gray-100">
                <div class="sm:flex lg:items-end group bg-gray-100 m-5 p-5" v-for="post in posts" :key="post.id">
                    <div>
                        <p class="text-lg font-medium leading-6">
                            <a :href="route('blog.show', {'id': post.slug})" class="text-xl text-gray-800 group-hover:text-gray-500 lg:text-2xl">{{ post.title }} </a>
                        </p>
                        <span class="text-sm text-gray-500">{{ post.created_at }}</span>
                        <p class="mt-2 text-lg text-gray-500">{{ post.content }}</p>
                    </div>
                </div>
            </div>
                <div class="flex flex-wrap justify-start flex-grow mt-8 text-left">
                    <div class="w-full space-y-4 md:w-1/2">
                        <nav class="mb-10 list-none">
                            <li v-for="category in categories" :key="category.id">
                                <a href="#">{{ category.name }}</a>
                            </li>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
    </visitor-layout>
</template>
