<script setup lang="ts">
import { Head, Link, router } from '@inertiajs/vue3';
const props = defineProps({
    article: Object
});

const deleteArticle = () => {
    let id = props.article.id;
    console.log();
    router.delete(route('article.destroy', id))
}
</script>

<template>
    <Head title="Список статей" />

    <div class="bg-white py-24 sm:py-32">
        <div class="mx-auto max-w-7xl px-6 lg:px-8 text-black">
            <h1 class="text-2xl font-semibold tracking-tight text-pretty text-gray-900 sm:text-5xl mb-5">{{ article.title }}</h1>
            <p v-if="article.author" class="font-semibold text-gray-900 mb-3">Автор: {{ article.author }}</p>
            <div v-html="article.content" class="mb-5 line-clamp-3 text-sm/6 text-gray-600"></div>
            <div class="flex justify-between">
                <Link :href="route('articles.index')" class="text-gray-500">Вернуться к списку</Link>
                <button @click="deleteArticle" class="text-red-700" type="button">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trash2-icon lucide-trash-2"><path d="M3 6h18"/><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/><line x1="10" x2="10" y1="11" y2="17"/><line x1="14" x2="14" y1="11" y2="17"/></svg>
                </button>
            </div>

        </div>
    </div>
</template>
<style scoped>

</style>
