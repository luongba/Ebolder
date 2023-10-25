<template>
    <div class="bg-blur-f lg:px-[48px] px-[16px] py-[16px] mt-4">
        <div v-html="this.content" class="text-[16px]"></div>
      </div>
</template>

<script>
    export default {
        props: ["content"],
    }
</script>