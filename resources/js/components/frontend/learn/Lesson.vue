<template>
    <div class="bg-blur-f px-[16px] py-[24px] mt-4">
        <div class="flex flex-row my-4">
            <div class="rounded p-1.5 bg-[#D3E0FF] text-[#2162FF] w-fit me-[10px] font-bold text-sm uppercase flex flex-row">
                <img :src="highlighter" />
                DOING
            </div>
            <div class="text-bold text-2xl">
                {{ this.content?.name }}
            </div>
        </div>

        <div class="border-t border-gray-300 w-full h-px"></div>
        <div v-html="this.content?.description" class="text-[16px] px-[16px] max-w-[380px] sm:max-w-[764px] md:max-w-[900px]"></div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            highlighter: require('../../../../../public/images/learn/highlighter.svg'),
        }
    },
    props: ["content"],
}
</script>