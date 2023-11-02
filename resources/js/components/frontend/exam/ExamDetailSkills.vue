<template>
    <div>
        <div class="text-xl font-bold flex flex-row justify-between px-4 py-4 sm:px-6 items-center border-b-2"
            @click="toggle">
            Sections
            <img :src="left" />
        </div>
        <div
            class="relative flex flex-col min-w-0 break-words w-full mb-6 bg-white rounded-br-[16px] rounded-bl-[16px] rounded-tr-[16px]">
            <div class="flex-auto">
                <div class="flex flex-column">
                        <div class=" border-b-2 border-[#f4f5f6]" v-for="skill in skills" :key="skill.skill"
                            :class="{ 'bg-[#2162FF] text-white ': selectedSkill == skill.skill.toLowerCase(), 'cursor-not-allowed': selectedSkill != skill.skill.toLowerCase() }">
                            <div class="p-4">
                                <div class="flex flex-row items-center justify-between">
                                    <div class="flex flex-row">
                                        <div class="rounded p-1 w-fit mr-2 font-bold text-sm uppercase flex flex-row items-center"
                                            :class="{ 'text-white bg-[#447bff]': selectedSkill == skill.skill.toLowerCase(), 'text-[#2162FF] bg-[#D3E0FF]': selectedSkill != skill.skill.toLowerCase() }">
                                            <component :is="skill.icon" :color="activeSkillColor(skill.skill)" class="me-3"/>
                                            {{ skill.skill.toUpperCase() }}
                                        </div>
                                    </div>
                                    <div class="flex flex-row items-center">
                                        <!-- <span class="text-xs me-4" :class="{'text-[#777e90]': selectedSkill != skill.skill.toLowerCase(), 'text-white': selectedSkill == skill.skill.toLowerCase()}"> {{ `4/6` }}</span> -->
                                        <img :src="highlighterWhite" v-show="selectedSkill == skill.skill.toLowerCase()" />
                                    </div>
                                </div>
                                <div class="flex items-center mt-3">
                                    <div class="flex items-center justify-center"  v-show="skill.timeWork">
                                        <Timer :color="timerColor"/>
                                        <VueCountdown
                                            :auto-start="false"
                                            :time="skill.timeWork" 
                                            @progress="handleCountdownProgress" 
                                            v-show="skill.timeWork"
                                            :key="`countdown-${skill.skill}`"
                                            :id="`${skill.skill.toLowerCase()}`"
                                            :ref="getCountdownRef(skill.skill)"
                                        >
                                            <span slot-scope="props" class="text-sm	text-[#777E90]"
                                                >{{ props.hours }}:{{ props.minutes <= 9 ? `0${props.minutes}` : props.minutes }}:{{ props.seconds <= 9 ? `0${props.seconds}` : props.seconds }}</span
                                            >
                                        </VueCountdown>
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
import VueCountdown from "@chenfengyuan/vue-countdown";
import Timer from '../../../svg/Timer.vue';

export default {
    props: ["value"],
    components: {
        BookFill,
        BookFillSmall,
        Ear,
        Highlighter,
        Wave,
        VueCountdown,
        Timer
    },
    data() {
        return {
            time: require('../../../../../public/images/exam/timer.svg'),
            left: require('../../../../../public/images/learn/left.svg'),
            highlighterWhite: require('../../../../../public/images/learn/highlighter-white.svg'),
            selectedSkill: null,
            activeColor: "#fff",
            inactiveColor: "#2162FF",
            timerColor: '#777E90',
            skills: [
                { skill: 'Listening', icon: Ear, timeWork: 40 * 60 * 1000,},
                { skill: 'Speaking', icon: Wave },
                { skill: 'Reading', icon: BookFillSmall, timeWork: 60 * 60 * 1000, },
                { skill: 'Writing', icon: Highlighter, timeWork: 60 * 60 * 1000,},
            ],
            timerun: 0,
        };
    },
    methods: {
        toggle() {
            this.$emit('input', !this.value);
        },
        
        getExamDetail(skill) {
            this.selectedSkill = skill.toLowerCase();
            const countDownRef = this.$refs[this.getCountdownRef(skill)];
            countDownRef && countDownRef.forEach(c => {
                if(c.$el.id == skill) {
                    c.start();
                } else {
                    c.abort();
                }
            })
        },
        activeSkillColor(skill) {
            return this.selectedSkill === skill.toLowerCase() ? '#fff' : '#2162FF';
        },
        isActive(skill) {
            return this.selectedSkill === skill.toLowerCase()
        },
        handleCountdownProgress(data) {
            this.timerun = this.timeWork - data.totalMilliseconds + 1000;
            if (this.timerun === this.timeWork) {
                console.log('time out');
            }
        },
        getCountdownRef(skill) {
            return `countdown-${skill.skill}`;
        },
    },
    created() {
        this.selectedSkill = 'listening';
        this.activeSkillColor(this.selectedSkill);
    }
}
</script>