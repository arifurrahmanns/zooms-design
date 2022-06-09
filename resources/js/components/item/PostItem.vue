
<script setup>
defineProps(['post'])
</script>
<template>
    <div>
        <a :href="`/post/${post.id}`" class="flex flex-col text-sm hover:cursor-pointer group">
            <img :src="post.thumbnail" :alt="post.title" class="mb-4">
            <h2 class="font-bold mb-4 group-hover:text-[#01c8ce]">{{post.title}}</h2>
            <p class="text-[#555555] mb-6 text-xs">{{post.desc}}</p>
            <hr class="mb-2 bg-[#EBEBEB] h-[1px] border-none">
            <div class="flex space-x-3">
                <div class="font-semibold text-[#888888] text-xs">{{post.created_at}}</div>
                <div class="font-semibold text-[#5CD0EB] text-xs">by {{post.author_name}}</div>
            </div>
        </a>
    </div>
</template>