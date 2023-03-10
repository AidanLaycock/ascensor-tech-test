<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head} from '@inertiajs/vue3';
import { useForm } from '@inertiajs/vue3'
import TextInput from "@/Components/TextInput.vue";
import InputLabel from "@/Components/InputLabel.vue";
import InputError from "@/Components/InputError.vue";
import Checkbox from "@/Components/Checkbox.vue";

const props = defineProps({ category: Object });

const form = useForm({
    id: props.category?.id ?? null,
    name: props.category?.name ?? null,
    status: props.category?.status ?? false,
});

function submit() {
    form.submit(form.id ? 'patch': 'post', form.id ? route('categories.update', form.id) : route('categories.store'), {
        onSuccess: () => alert(form.id ? ('Category successfully updated!'): ('Category successfully created!'))
    });
}
</script>

<template>
    <Head :title="(category ? 'Edit Category' : 'Create New Category')" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Category</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">Categories</div>

                    <div class="flex flex-col p-5">
                        <div class="mt-5 md:col-span-2 md:mt-0">
                            <form @submit.prevent="submit">
                                <div class="sm:overflow-hidden sm:rounded-md">

                                    <div class="space-y-6 bg-white px-4 py-5 sm:p-6">
                                        <div class="grid grid-cols-3 gap-6">
                                            <div class="col-span-3 sm:col-span-2">
                                                <InputLabel for="title" value="Category Title" />
                                                <TextInput
                                                    id="title"
                                                    type="text"
                                                    class="mt-1 block w-full"
                                                    v-model="form.name"
                                                    required
                                                />
                                                <InputError class="mt-2" :message="form.errors.name" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="space-y-6 bg-white px-4 py-5 sm:p-6">
                                        <div class="grid grid-cols-3 gap-6">
                                            <div class="col-span-3 sm:col-span-2">
                                                <label class="flex items-center">
                                                    <Checkbox name="status" v-model:checked="form.status" />
                                                    <span class="ml-2 text-sm text-gray-600">Status</span>
                                                </label>
                                                <InputError class="mt-2" :message="form.errors.status" />
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="px-4 py-3 text-right sm:px-6">
                                    <button type="submit"
                                            class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                                            :disabled="form.processing"
                                    >
                                        Save
                                    </button>
                                </div>

                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
