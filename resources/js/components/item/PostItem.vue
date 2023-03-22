
<script setup>
defineProps(['post'])
</script>
<template>
    <div>
        <a :href="`/post/${post.slug}`" class="flex flex-col text-sm hover:cursor-pointer group">
            <img :src="post.thumbnail" :alt="post.title" class="mb-4">
            <h2 class="font-bold mb-4 group-hover:text-[#5FC3DF]">{{post.title}}</h2>
            <p class="text-[#555555] mb-6 text-xs">{{post.desc}}</p>
            <hr class="mb-2 bg-[#EBEBEB] h-[1px] border-none">
            <div class="flex space-x-3">
                <div class="font-semibold text-[#888888] text-xs">{{post.created_at}}</div>
                <div class="font-semibold text-[#5FC3DF] text-xs">by {{post.author_name}}</div>
            </div>
        </a>
    </div>
</template>