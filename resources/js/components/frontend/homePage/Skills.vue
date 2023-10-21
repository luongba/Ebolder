<template>
    <div class="xl:w-[62.5%] w-[95%] mx-auto rounded-br-[16px] rounded-bl-[16px] shadow">

        <div class="w-full relative">
            <div class="absolute right-0 top-[-13px] sm:top-[-40px] z-10 cursor-pointer" @click="openLink">
                <img :src="startButton" class="hidden sm:block"/>
                <img :src="startMobileButton" class="sm:hidden" />
            </div>
            <div class="flex border-b w-full">
                <!-- flex-grow px-5 bg-white -->
                <ul class=" px-3 sm:px-4 flex mb-0 list-none flex-wrap pt-2 sm:pt-3 bg-white flex-grow rounded-tl-[16px] rounded-tr-[16px]">
                    <li class="-mb-px mr-2 last:mr-0 flex-auto text-center max-w-[84px] sm:max-w-[116px]"
                        v-bind:class="{ 'border-0': openTab !== 1, 'border-b-4 border-[#2162FF]': openTab === 1 }">
                        <a class="text-xs font-bold uppercase sm:px-3 sm:py-3 leading-normal flex items-center justify-start "
                            v-on:click="toggleTabs(1)">
                            <BookSVG :color="openTab === 1 ? activeColor : inactiveIconColor" />
                            Study
                        </a>
                    </li>
                    <li class="-mb-px mr-2 last:mr-0 flex-auto text-center max-w-[84px] sm:max-w-[116px]"
                        v-bind:class="{ 'border-0': openTab !== 2, 'border-b-4 border-[#2162FF]': openTab === 2 }">
                        <a class="text-xs font-bold uppercase sm:p-3 sm:p-3 leading-normal flex items-center"
                            v-on:click="toggleTabs(2)">
                            <GraduationCapSVG :color="openTab === 2 ? activeColor : inactiveIconColor" /> Exam
                        </a>
                    </li>
                    <li class="-mb-px mr-2 last:mr-0 flex-auto text-center max-w-[84px] sm:max-w-[116px]"
                        v-bind:class="{ 'border-0': openTab !== 3, 'border-b-4 border-[#2162FF]': openTab === 3 }">
                        <a class="text-xs font-bold uppercase sm:px-3 sm:py-3 leading-normal flex items-center"
                            v-on:click="toggleTabs(3)">
                            <GameSVG :color="openTab === 3 ? activeColor : inactiveIconColor" /> Game
                        </a>
                    </li>
                </ul>
                <div class="sm:w-[219px] w-[56px]">

                </div>
            </div>


            <div
                class="relative flex flex-col min-w-0 break-words w-full mb-6 bg-white rounded-br-[16px] rounded-bl-[16px] rounded-tr-[16px]">
                <div class="px-4 py-4 flex-auto">
                    <div class="tab-content tab-space">
                        <div v-bind:class="{ 'hidden': openTab !== 1, 'block': openTab === 1 }" class=" pb-4">
                            <div class="rounded-lg p-3 bg-[#F4F5F6] w-fit">
                                A2-B1
                            </div>
                        </div>
                    </div>
                    <div class="grid sm:grid-cols-7 gap-3 grid-cols-2">
                        <div v-for="skill in skills" :key="skill.skill"
                            class="border-3 px-2 py-3 rounded-[8px] flex items-center sm:flex-col"
                            v-bind:class="{ 'bg-[#2162ff]': active.skill === skill.skill, 'bg-[#f4f5f6]': active.skill !== skill.skill }">
                            <component :is="skill.icon" :color="activeSkillColor(skill.skill)" />
                            <div :style="{ color: activeSkillColor(skill.skill) }">{{ skill.skill }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
import BookSVG from '../../../svg/BookSVG.vue';
import GraduationCapSVG from '../../../svg/GraduationCapSVG.vue';
import GameSVG from '../../../svg/GameSVG.vue';
import GrammarSVG from '../../../svg/GrammarSVG.vue';
import Pronunciation from '../../../svg/Pronunciation.vue';
import Vocabulary from '../../../svg/Vocabulary.vue';
import ListeningSVG from '../../../svg/ListeningSVG.vue';
import SpeakingSVG from '../../../svg/SpeakingSVG.vue';
import ReadingSVG from '../../../svg/ReadingSVG.vue';
import WritingSVG from '../../../svg/WritingSVG.vue';

export default {
    components: {
        BookSVG,
        GraduationCapSVG,
        GameSVG,
        GrammarSVG,
        Pronunciation,
        Vocabulary,
        ListeningSVG,
        SpeakingSVG,
        ReadingSVG,
        WritingSVG
    },
    data() {
        return {
            startButton: require('../../../../../public/images/landing/start.svg'),
            startMobileButton: require('../../../../../public/images/landing/start-mobile.svg'),
            openTab: 1,
            activeColor: "#2162FF",
            inactiveIconColor: "#141416",
            inactiveSkillColor: "#f4f5f6",
            active: { level: '1', skill: 'Grammar' },
            skills: [
                { skill: 'Grammar', icon: GrammarSVG },
                { skill: 'Pronunciation', icon: Pronunciation },
                { skill: 'Vocabulary', icon: Vocabulary },
                { skill: 'Listening', icon: ListeningSVG },
                { skill: 'Speaking', icon: SpeakingSVG },
                { skill: 'Reading', icon: ReadingSVG },
                { skill: 'Writing', icon: WritingSVG },
            ]
        }
    },
    methods: {
        openLink() {
            window.location.href = `${$Api.baseUrl}/choose-action`;
        },
        toggleTabs(tabNumber) {
            this.openTab = tabNumber
        },
        activeSkillColor(skill) {
            return this.active.skill === skill ? '#fff' : '#000';
        }

    },
    // computed: {
    //     activeSkillColor() {
    //         console.log(this.active.skill)
    //         return this.active.skill === 'grammar' ? "#fff" : "#141416"
    //     }
    // }
}
</script>
<style>
.shadow {
    box-shadow: 0px 50px 200px rgba(0, 7, 43, 0.15), -1px 0px 200px rgba(0, 7, 43, 0.15), 1px 0px 200px rgba(0, 7, 43, 0.15);
}
</style>