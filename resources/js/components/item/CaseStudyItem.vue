
<script setup>
defineProps(['caseStudy'])
</script>
<template>
    <div>
        <a :href="`/case-studies/${caseStudy.id}`" class="flex flex-col text-sm hover:cursor-pointer group">
            <img :src="caseStudy.thumbnail" :alt="caseStudy.title" class="mb-4">
            <h2 class="font-bold mb-4 group-hover:text-[#01c8ce]">{{caseStudy.title}}</h2>
            <p class="text-[#555555] mb-6 text-xs">{{caseStudy.desc}}</p>
            <hr class="mb-2 bg-[#EBEBEB] h-[1px] border-none">
            <div class="flex space-x-3">
                <div class="font-semibold text-[#888888] text-xs">{{caseStudy.created_at}}</div>
                <div class="font-semibold text-[#5CD0EB] text-xs">by {{caseStudy.author_name}}</div>
            </div>
        </a>
    </div>
</template>