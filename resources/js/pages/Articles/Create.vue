<script setup lang="ts">
import { Head, useForm } from '@inertiajs/vue3';

const props = defineProps({
    errors: {
        type: Object,
        default: () => ({})
    }
});

const form = useForm({
    title: '',
    author: '',
    content: ''
});

const submit = () => {
    form.post(route('articles.store'));
};
</script>

<template>
    <Head title="Создание статьи" />
    <div class="bg-white py-24 sm:py-32">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-3xl lg:mx-0">
                <h2 class="text-4xl font-semibold tracking-tight text-pretty text-gray-900 sm:text-5xl">Добавить статьи</h2>
            </div>
            <form method="POST" @submit.prevent="submit">
                <div class="space-y-12">
                    <div class="border-b border-gray-900/10 pb-12">
                        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                            <div class="sm:col-span-12">
                                <label for="title" class="block text-sm/6 font-medium text-gray-900">Название</label>
                                <div class="mt-2">
                                    <input v-model="form.title" required type="text" name="title" id="title" class="border border-gray-900/10 block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
                                </div>
                            </div>
                            <div class="sm:col-span-12">
                                <label for="author" class="block text-sm/6 font-medium text-gray-900">Автор</label>
                                <div class="mt-2">
                                    <input v-model="form.author" type="text" name="author" id="author" class="border border-gray-900/10 block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
                                </div>
                            </div>
                            <div class="sm:col-span-12">
                                <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your message</label>
                                <textarea v-model="form.content" required id="message" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 focus:outline-indigo-600" placeholder="Write your thoughts here..."></textarea>
                                <div v-if="errors.content" class="text-danger">
                                    <span v-for="(error, index) in errors.content" :key="index">{{ error }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-6 flex items-center justify-end gap-x-6">
                    <button type="submit" class="rounded-md bg-blue-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-blue-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">Сохранить</button>
                </div>
            </form>
        </div>
    </div>
</template>

<style scoped>
.text-danger {
    color: #d01547;
}
</style>
