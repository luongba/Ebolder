<template>
    <div class="bg-white px-[16px] py-[24px] md:rounded" style="min-height: 100%; min-width: fit-content;">
        <div class="flex unitName mb-4 px-3">
            <div class="rounded p-1.5 bg-[#D3E0FF] text-[#2162FF] w-fit me-[10px] font-bold text-sm uppercase flex flex-row">
                <img :src="highlighter" />
                DOING
            </div>
            <div class="text-bold text-xl">
                {{ this.content?.name }}
            </div>
        </div>

        <div class="border-t border-gray-300 w-full h-px"></div>
        <div v-html="this.content?.description" class="text-[16px] p-3 max-w-[380px] sm:max-w-[764px] md:max-w-[900px]"></div>
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
<style>
    @media only screen and (max-width: 640px) { 
        .unitName {
            flex-direction: column;
        }
    }
    @media only screen and (min-width: 640px) { 
        .unitName {
            flex-direction: row;
        }
    }
</style>