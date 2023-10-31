<template>
    <div class="bg-white px-[16px] py-[24px] md:rounded" style="min-height: 100%; min-width: fit-content;">
        <div class="flex unitName mb-4 px-3">
            <div :class="[`rounded p-1.5 bg-${this.lessonType}-tag w-fit me-[10px] font-bold text-sm uppercase flex flex-row`]">
                <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M3.85491 11.2354H4.51283C4.6635 11.2354 4.72377 11.2053 4.83426 11.1199L5.17076 10.8638C5.35658 11.0496 5.63281 11.0898 5.90904 10.9693L7.57143 10.2762C7.69699 10.226 7.76228 10.1757 7.84263 10.0954L12.6942 5.27897C13.1763 4.79683 13.1763 4.21926 12.6892 3.72707L11.5993 2.63221C11.1122 2.14504 10.5346 2.14002 10.0525 2.62216L5.20089 7.43355C5.11551 7.51893 5.07031 7.57919 5.01507 7.70977L4.31194 9.36714C4.19643 9.63332 4.22656 9.89448 4.41239 10.1004L3.68917 10.8487C3.53348 11.0145 3.60882 11.2354 3.85491 11.2354ZM10.6099 3.28511C10.7405 3.15955 10.8962 3.15453 11.0167 3.28009L12.0413 4.30966C12.1669 4.43522 12.1618 4.58589 12.0262 4.71647L11.6998 5.04292L10.2785 3.61658L10.6099 3.28511ZM6.08984 7.78009L9.73605 4.15899L11.1523 5.58533L7.51116 9.20643L6.08984 7.78009ZM5.80859 10.0803C5.71317 10.1155 5.64788 10.1155 5.5625 10.0301L5.24609 9.7187C5.16574 9.63835 5.16574 9.56301 5.20089 9.47763L5.6529 8.42797L6.85826 9.64337L5.80859 10.0803ZM3.68415 13.0184H13.322C13.5631 13.0184 13.7589 12.8125 13.7589 12.5714C13.7589 12.3303 13.5631 12.1294 13.322 12.1294H3.68415C3.43806 12.1294 3.24219 12.3303 3.24219 12.5714C3.24219 12.8125 3.44308 13.0184 3.68415 13.0184Z" fill="#D35924"/>
                </svg>
                DOING
            </div>
            <div class="text-bold text-xl">
                {{ this.content?.name }}
            </div>
        </div>

        <div class="border-t border-gray-300 w-full h-px"></div>
        <div v-html="this.content?.description || this.content?.content" class="text-[16px] p-3 max-w-[380px] sm:max-w-[764px] md:max-w-[900px]"></div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            highlighter: require('../../../../../public/images/learn/highlighter.svg'),
        }
    },
    props: ["content", "lessonType"],
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