<template>
    <div>
        <div class="text-xl sm:text-2xl font-bold flex flex-row justify-between px-4 py-4 sm:px-6 items-center"
            @click="toggle">
            Sections
            <img :src="left" />
        </div>
        <div
            class="relative flex flex-col min-w-0 break-words w-full mb-6 bg-white rounded-br-[16px] rounded-bl-[16px] rounded-tr-[16px]">
            <div class="flex-auto">
                <div class="flex flex-column">
                    
                        <div class=" border-b-2 border-[#f4f5f6]" v-for="skill in skills" :key="skill.skill"
                            :class="{ 'bg-[#2162FF] text-white': selectedSkill == skill.skill }"
                            @click="getExamDetail(skill.skill)">
                            <div class="p-4">
                                <div class="flex flex-row items-center justify-between">
                                    <div class="flex flex-row">
                                        <div class="rounded p-1.5 w-fit me-[10px] font-bold text-sm uppercase flex flex-row items-center"
                                            :class="{ 'text-white bg-[#447bff]': selectedSkill == skill.skill, 'text-[#2162FF] bg-[#D3E0FF]': selectedSkill != skill.skill }">
                                            <component :is="skill.icon" :color="activeSkillColor(skill.skill)" class="me-3"/>
                                            {{ skill.skill.toUpperCase() }}
                                        </div>
                                    </div>
                                    <div class="flex flex-row items-center">
                                        <span class="text-xs me-4" :class="{'text-[#777e90]': selectedSkill != skill.skill, 'text-white': selectedSkill == skill.skill}"> {{ `4/6` }}</span>
                                        <img :src="highlighterWhite" v-show="selectedSkill == skill.skill" />
                                    </div>
                                </div>
                                <div class="flex items-center mt-3">
                                    <div class="flex text-sm text-[#777e90]">
                                        <img :src="time" class="me-3"/>
                                        00:45:00
                                    </div>
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
import BookFillSmall from '../../../svg/BookFillSmall.vue';
import Ear from '../../../svg/Ear.vue';
import Highlighter from '../../../svg/Highlighter.vue';
import Wave from '../../../svg/Wave.vue';

export default {
    props: ["lessons", "lessonType", "value", "onGetExamBySkill", "levelName"],
    components: {
        BookFill,
        BookFillSmall,
        Ear,
        Highlighter,
        Wave,
    },
    data() {
        return {
            time: require('../../../../../public/images/exam/timer.svg'),
            left: require('../../../../../public/images/learn/left.svg'),
            highlighterWhite: require('../../../../../public/images/learn/highlighter-white.svg'),
            selectedSkill: null,
            activeColor: "#fff",
            inactiveColor: "#2162FF",
            skills: [
                { skill: 'Listening', icon: Ear },
                { skill: 'Speaking', icon: Wave },
                { skill: 'Reading', icon: BookFillSmall },
                { skill: 'Writing', icon: Highlighter,
 },
            ],
        };
    },
    methods: {
        toggle() {
            this.$emit('input', !this.value);
        },
        getExamDetail(skill) {
            this.selectedSkill = skill
            this.onGetExamBySkill(skill)
        },
        activeSkillColor(skill) {
            return this.selectedSkill === skill ? '#fff' : '#2162FF';
        }
    },
}
</script>