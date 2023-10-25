<template>
    <div>
        <div class="text-xl sm:text-2xl font-bold flex flex-row justify-between px-4 py-4 sm:px-6 items-center"
            @click="toggle">
            Unit of {{ type }}
            <img :src="left" />
        </div>
        <div>
            <ul
                class=" px-3 sm:px-4 flex mb-0 list-none flex-wrap pt-2 sm:pt-3 bg-white flex-grow rounded-tl-[16px] rounded-tr-[16px]">
                <li class="-mb-px mr-2 last:mr-0 flex-auto text-center max-w-[84px] sm:max-w-[116px]"
                    v-bind:class="{ 'border-0': openTab !== 1, 'border-b-2 border-[#2162FF]': openTab === 1 }">
                    <a class="text-xs font-bold uppercase sm:px-3 sm:py-3 leading-normal flex items-center justify-start "
                        v-on:click="toggleTabs(1)">
                        All
                    </a>
                </li>
                <li class="-mb-px mr-2 last:mr-0 flex-auto text-center max-w-[84px] sm:max-w-[116px]"
                    v-bind:class="{ 'border-0': openTab !== 2, 'border-b-2 border-[#2162FF]': openTab === 2 }">
                    <a class="text-xs font-bold uppercase sm:p-3 sm:p-3 leading-normal flex items-center"
                        v-on:click="toggleTabs(2)">
                        Completed
                    </a>
                </li>
                <li class="-mb-px mr-2 last:mr-0 flex-auto text-center max-w-[84px] sm:max-w-[116px]"
                    v-bind:class="{ 'border-0': openTab !== 3, 'border-b-2 border-[#2162FF]': openTab === 3 }">
                    <a class="text-xs font-bold uppercase sm:px-3 sm:py-3 leading-normal flex items-center"
                        v-on:click="toggleTabs(3)">
                        Unexecuted
                    </a>
                </li>
            </ul>
        </div>
        <div
            class="relative flex flex-col min-w-0 break-words w-full mb-6 bg-white rounded-br-[16px] rounded-bl-[16px] rounded-tr-[16px]">
            <div class="px-4 py-4 flex-auto">
                <div class="tab-content tab-space flex">
                    <div v-bind:class="{ 'hidden': openTab !== 1, 'block': openTab === 1 }" class=" pb-4">
                        <div class=" border-b-2 border-[#f4f5f6]" v-for="item in this.data" :key="item.id"
                            @click="getLessonDetail(item.id)">
                            <div class="flex flex-row items-center justify-between">
                                <div class="flex flex-row">
                                    <div
                                        class="rounded p-1.5 bg-[#D3E0FF] text-[#2162FF] w-fit me-[10px] font-bold text-sm">
                                        A1-A2
                                    </div>
                                    <div
                                        class="rounded p-1.5 bg-[#D3E0FF] text-[#2162FF] w-fit me-[10px] font-bold text-sm uppercase">
                                        {{ type }}
                                    </div>
                                </div>
                                <div class="flex flex-row">
                                    <span> 4/6</span>
                                    <img :src="left" />
                                </div>
                            </div>
                            <p> {{ item.name }} </p>
                            <p> 00:45:00 </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ["data", "lessonType", "value", "onGetLessonDetail"],
    data() {
        return {
            left: require('../../../../../public/images/learn/left.svg'),
            openTab: 1,
            type: this.lessonType,
            selectedLessonId: this.data[0]?.id
        };
    },
    methods: {
        toggleTabs(tabNumber) {
            this.openTab = tabNumber
        },
        toggle() {
            this.$emit('input', !this.value);
        },
        getLessonDetail(lessonId) {
            this.onGetLessonDetail(lessonId)
        }
    },
    async created() {
        console.log("list lesson", this.data)
    },
}
</script>