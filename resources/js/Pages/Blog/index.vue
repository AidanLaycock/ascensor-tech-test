<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head,router, Link } from '@inertiajs/vue3';

defineProps({ posts: Array });

function deletePost(id)
{
    router.delete(route('blog.destroy', {'blog': id}), {
        onBefore: () => confirm("Are you sure you want to delete the blog post"),
        onSuccess: () => alert('Post successfully deleted!')
    });
}
</script>

<template>
    <Head title="Blogs" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Blogs</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="flex justify-between">
                        <div class="p-6 text-gray-900">
                            Blog Posts
                        </div>
                        <div class="p-6">
                            <Link :href="route('blog.create')" as="button" type="button">+ Add new post</Link>
                        </div>
                    </div>
                    <div class="flex flex-col p-5">
                        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                                <div class="overflow-hidden">
                                    <table class="min-w-full">
                                        <thead class="border-b">
                                        <tr>
                                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                #
                                            </th>
                                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                Title
                                            </th>
                                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                Slug
                                            </th>
                                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                Publish at
                                            </th>
                                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                Created at
                                            </th>
                                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                Last Updated
                                            </th>
                                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                Edit
                                            </th>
                                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                Delete
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr class="border-b" v-for="post in posts">
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                {{ post.id }}
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                {{ post.title }}
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                {{ post.slug }}
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                {{ post.publish_at }}
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                {{ post.created_at }}
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                {{ post.updated_at }}
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                <Link :href="route('blog.edit', post.id)">Edit Post</link>
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                <button @click.prevent="deletePost(post.id)">Delete Post</button>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>

                                    <div class="text-gray-500 text-center m-12" v-if="posts.length === 0">
                                        <p>No Posts!</p>
                                        <Link :href="route('blog.create')" as="button" type="button">Add new post</Link>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
