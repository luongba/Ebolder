<template>
    <div>
        <div class="text-xl font-bold flex flex-row justify-between px-4 py-4 sm:px-6 items-center border-b-2"
            @click="toggle">
            Unit of {{ type }}
            <img :src="left" />
        </div>
        <div>
            <ul
                class=" px-3 sm:px-4 flex mb-0 list-none flex-wrap pt-2 sm:pt-3 bg-white flex-grow rounded-tl-[16px] rounded-tr-[16px] border-b-2 border-[#F4F5F6]">
                <li class="-mb-px mr-2 last:mr-0 flex-auto text-center max-w-[84px] sm:max-w-[116px]"
                    v-bind:class="[ openTab !== 1 ? 'border-0' : `border-b-2 border-${lessonType}`]">
                    <a class="text-xs font-bold uppercase sm:px-3 sm:py-3 leading-normal flex items-center justify-start "
                        v-on:click="toggleTabs(1)">
                        All
                    </a>
                </li>
                <!-- <li class="-mb-px mr-2 last:mr-0 flex-auto text-center max-w-[84px] sm:max-w-[116px]"
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
                </li> -->
            </ul>
        </div>
        <div
            class="relative flex flex-col min-w-0 break-words w-full mb-6 bg-white rounded-br-[16px] rounded-bl-[16px] rounded-tr-[16px]">
            <div class="flex-auto">
                <div class="tab-content tab-space flex">
                    <div v-bind:class="{ 'hidden': openTab !== 1, 'block': openTab === 1 }" class=" pb-4 w-full">
                        <div class="border-b-2 border-[#f4f5f6]" v-for="item in this.lessons" :key="item.id"
                            :class="[selectedLessonId == item.id ? [ `bg-${lessonType}`, 'text-white'] : '']"
                            @click="getLessonDetail(item.id, item.name)">
                            <div class="p-4">
                                <div class="flex flex-row items-center justify-between">
                                    <div class="flex flex-row">
                                        <div class="rounded p-1.5  w-fit mr-2 font-bold text-sm"
                                            :class="[selectedLessonId == item.id ? `bg-${lessonType}-tag` : 'text-white bg-[#141416]' ]">
                                            {{ levelName }}
                                        </div>
                                        <div class="rounded p-1 w-fit mr-2 font-bold text-sm uppercase flex flex-row items-center"
                                            :class="[selectedLessonId == item.id ? `bg-${lessonType}-tag` : `text-[#2162FF] bg-${lessonType}-tag` ]">
                                            <BookFill class="me-2"
                                                :color="selectedLessonId == item.id ? activeColor : inactiveColor" />
                                            {{ type }}
                                        </div>
                                    </div>
                                    <div class="flex flex-row items-center">
                                        <!-- <span class="text-xs text-[#777e90] me-4"> {{ `4/6` }}</span> -->
                                        <img :src="highlighterWhite" v-show="selectedLessonId == item.id" />
                                        <img :src="item?.is_exam ? checked : unchecked"
                                            v-show="selectedLessonId != item.id" />
                                    </div>
                                </div>
                                <p class="pt-4"> {{ item.name }} </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import BookFill from '../../../svg/BookFill.vue';

export default {
    props: ["lessons", "lessonType", "value", "onGetLessonDetail", "levelName"],
    components: {
        BookFill
    },
    data() {
        return {
            left: require('../../../../../public/images/learn/left.svg'),
            checked: require('../../../../../public/images/learn/check.svg'),
            unchecked: require('../../../../../public/images/learn/uncheck.svg'),
            highlighterWhite: require('../../../../../public/images/learn/highlighter-white.svg'),
            openTab: 1,
            type: this.lessonType,
            selectedLessonId: null,
            activeColor: "#fff",
            inactiveColor: "#2162FF",
        };
    },
    methods: {
        toggleTabs(tabNumber) {
            this.openTab = tabNumber
        },
        toggle() {
            this.$emit('input', !this.value);
        },
        getLessonDetail(lessonId, lessonName) {
            this.onGetLessonDetail(lessonId, lessonName);
            this.selectedLessonId = lessonId;
        }
    },
    watch: {
        lessons(newLessons) {
            if (newLessons && newLessons.length) {
                this.selectedLessonId = newLessons[0]?.id;

            }
        }
    }
}
</script>
