<script setup lang="ts">
import { Link } from '@inertiajs/vue3';

defineProps({
    links: {
        type: Array,
        required: true,
    },
});

function transformLabel(label) {
    const lower = label.toLowerCase();
    if (lower.includes('previous')) {
        return 'Предыдущая';
    }
    if (lower.includes('next')) {
        return 'Следующая';
    }
    return label;
}
</script>

<template>
    <nav>
        <ul class="pagination mt-12 font-semibold flex justify-center gap-4">
            <li v-for="link in links" :key="link.label" :class="{ active: link.active, disabled: link.url === null }">
                <Link v-if="link.url" :href="link.url" v-html="transformLabel(link.label)"></Link>
                <span v-else v-html="transformLabel(link.label)"></span>
            </li>
        </ul>
    </nav>
</template>

<style scoped>
.pagination {
    display: flex;
    list-style: none;
    padding: 0;
    color: #1a202c;
}
.pagination li {
    margin: 0 4px;
}
.pagination li.active span,
.pagination li.active a {
    font-weight: bold;
    color: #d01547;
}
.pagination li.disabled span,
.pagination li.disabled a {
    pointer-events: none;
    opacity: 0.5;
}
</style>
