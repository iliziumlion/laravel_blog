<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import Pagination from '@/components/Pagination.vue';

defineProps({
   articles: Object
});
</script>

<template>
    <Head title="Blog" />

    <div class="bg-white py-24 sm:py-32">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-3xl lg:mx-0">
                <h2 class="text-4xl font-semibold tracking-tight text-pretty text-gray-900 sm:text-5xl">Blog</h2>
                <p class="mt-2 text-lg/8 text-gray-600 flex items-center gap-4"><span class="text-gray-800">Test task</span> - creating a blog with conditions and dividing the application into layers.
                    <Link :href="route('articles.create')" class="text-green-800">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-plus-icon lucide-plus">
                            <path d="M5 12h14"/><path d="M12 5v14"/>
                        </svg>
                    </Link>
                </p>

            </div>
            <div class="mx-auto mt-10 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 border-t border-gray-200 pt-10 sm:mt-16 sm:pt-16 lg:mx-0 lg:max-w-none lg:grid-cols-3">
                <article v-for="article in articles.data" :key="article.id" class="flex max-w-xl flex-col items-start justify-between">
                    <div class="flex items-center gap-x-4 text-xs">
                        <time :datetime="article.formatted_date" class="text-gray-500">{{ article.formatted_date }}</time>
                    </div>
                    <div class="group relative">
                        <h3 class="mt-3 text-lg/6 font-semibold text-gray-900 group-hover:text-gray-600">
                            <Link :href="route('article.show', article.id)">
                                <span class="absolute inset-0" />
                                {{ article.title }}
                            </Link>
                        </h3>
                        <p class="mt-5 line-clamp-3 text-sm/6 text-gray-600">{{ article.brief }}</p>
                    </div>
                    <div class="relative mt-8 flex items-center gap-x-4">
                        <div class="text-sm/6">
                            <p class="font-semibold text-gray-900">
                                <Link :href="route('article.show', article.id)">
                                    <span class="absolute inset-0" />
                                    {{ article.author }}
                                </Link>
                            </p>
                        </div>
                    </div>

                </article>
            </div>
            <Pagination :links="articles.links" />
        </div>
    </div>
</template>

<style scoped>

</style>
