<template>
    <div class="xl:w-[62.5%] w-[95%] mx-auto rounded-br-[16px] rounded-bl-[16px] shadow">

        <div class="w-full relative">
            <div class="absolute right-0 top-[-13px] sm:top-[-40px] z-10 cursor-pointer" @click="handleNavigateToLearn">
                <img :src="startButton" class="hidden sm:block" />
                <img :src="startMobileButton" class="sm:hidden" />
            </div>
            <div class="flex border-b w-full">
                <!-- flex-grow px-5 bg-white -->
                <ul
                    class=" px-3 sm:px-4 flex mb-0 list-none flex-wrap pt-2 sm:pt-3 bg-white flex-grow rounded-tl-[16px] rounded-tr-[16px]">
                    <li class="cursor-pointer -mb-px mr-2 last:mr-0 flex-auto text-center max-w-[84px] sm:max-w-[116px]"
                        v-bind:class="{ 'border-0': openTab !== 1, 'border-b-4 border-[#2162FF]': openTab === 1 }">
                        <a class="text-xs font-bold uppercase sm:px-3 sm:py-3 leading-normal flex items-center justify-start "
                            v-on:click="toggleTabs(1)">
                            <BookSVG :color="openTab === 1 ? activeColor : inactiveIconColor" />
                            Study
                        </a>
                    </li>
                    <li class="cursor-pointer -mb-px mr-2 last:mr-0 flex-auto text-center max-w-[84px] sm:max-w-[116px]"
                        v-bind:class="{ 'border-0': openTab !== 2, 'border-b-4 border-[#2162FF]': openTab === 2 }">
                        <a class="text-xs font-bold uppercase sm:p-3 sm:p-3 leading-normal flex items-center"
                            v-on:click="navigatoToExam()">
                            <GraduationCapSVG :color="openTab === 2 ? activeColor : inactiveIconColor" /> Exam
                        </a>
                    </li>
                    <li class="cursor-pointer -mb-px mr-2 last:mr-0 flex-auto text-center max-w-[220px] sm:max-w-[220px]"
                        v-bind:class="{ 'border-0': openTab !== 3, 'border-b-4 border-[#2162FF]': openTab === 3 }">
                        <a class="text-xs font-bold uppercase sm:px-3 sm:py-3 leading-normal flex items-center"
                            v-on:click="navigatoToFeature()">
                            <GameSVG :color="openTab === 3 ? activeColor : inactiveIconColor" /> Dictionary - Game
                        </a>
                    </li>
                </ul>
                <div class="sm:w-[219px] w-[56px]">
                </div>
            </div>


            <div
                class="relative flex flex-col min-w-0 break-words w-full mb-6 bg-white rounded-br-[16px] rounded-bl-[16px] rounded-tr-[16px]">
                <div class="px-4 py-4 flex-auto">
                    <div class="tab-content tab-space flex flex-row cursor-pointer">
                        <div v-bind:class="{
                            'hidden': openTab !== 1, 'block': openTab === 1}" class=" pb-4" v-for="level in levels" :key="level.id"
                            @click="handleSelectLevel(level)">
                            <div class="rounded-lg px-3 py-2 w-fit mr-3 " v-bind:class="{'bg-[#3772ff1a] border-2 border-[#3772ff4d] text-[#2162FF]': selectedLevel?.name === level.name, 'bg-[#f4f5f6]': selectedLevel?.name !== level.name}">
                                {{ level.name }}
                            </div>
                        </div>
                    </div>
                    <div v-bind:class="{
                            'hidden': openTab !== 1, 'block': openTab === 1}" 
                        class="grid sm:grid-cols-7 gap-3 grid-cols-2 cursor-pointer">
                        <div v-for="skill in skills" :key="skill.skill"
                            class="border-3 px-2 py-3 rounded-[8px] flex items-center sm:flex-col"
                            v-bind:class="{ 'bg-[#2162ff]': selectedSkill === skill.skill, 'bg-[#f4f5f6]': selectedSkill !== skill.skill }"
                            @click="handleSelectSkill(skill.skill)">
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
    props: ["levels"],
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
    watch: {
        "levels": {
            handler(value) {
                if(value) {
                    this.selectedLevel.name = value[0].name
                    this.selectedLevel.id = value[0].id
                }
            }
        },
    },
    data() {
        return {
            startButton: require('../../../../../public/images/landing/start.svg'),
            startMobileButton: require('../../../../../public/images/landing/start-mobile.svg'),
            openTab: 1,
            activeColor: "#2162FF",
            inactiveIconColor: "#141416",
            inactiveSkillColor: "#f4f5f6",
            skills: [
                { skill: 'Grammar', icon: GrammarSVG },
                { skill: 'Pronunciation', icon: Pronunciation },
                { skill: 'Vocabulary', icon: Vocabulary },
                { skill: 'Listening', icon: ListeningSVG },
                { skill: 'Speaking', icon: SpeakingSVG },
                { skill: 'Reading', icon: ReadingSVG },
                { skill: 'Writing', icon: WritingSVG },
            ],
            selectedLevel: {
                name: 'A2-B2',
            },
            selectedSkill: 'Grammar'
        }
    },
    methods: {
        navigatoToExam() {
            window.location.href = `${$Api.baseUrl}/exam`;
        },
        navigatoToFeature() {
            window.location.href = `${$Api.baseUrl}/features`;
        },
        toggleTabs(tabNumber) {
            this.openTab = tabNumber
        },
        activeSkillColor(skill) {
            return this.selectedSkill === skill ? '#fff' : '#000';
        },
        handleSelectLevel(level) {
            this.selectedLevel = level;
        },
        handleSelectSkill(skill) {
            this.selectedSkill = skill;
        },
        handleNavigateToLearn() {
            if(!this.selectedLevel || !this.selectedSkill) return;
            console.log();
            window.location.href = `${$Api.baseUrl}/learn?levelName=${this.selectedLevel?.name}&levelId=${this.selectedLevel?.id}&skill=${this.selectedSkill}`;
        }
    },
}
</script>
<style>
.shadow {
    box-shadow: 0px 50px 200px rgba(0, 7, 43, 0.15), -1px 0px 200px rgba(0, 7, 43, 0.15), 1px 0px 200px rgba(0, 7, 43, 0.15);
}
</style>