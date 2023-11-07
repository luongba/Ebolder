<template>
    <div>
        <div class="flex items-center py-2 md:py-[24px] px-4 justify-between relative z-10 border-b-2 header"
            style="font-family: lexend !important;">
            <div class="flex items-center cursor-pointer" @click="backToHome">
                <img src="/images/landing/logo.svg" alt="" />
                <img :src="home" @click="backToHome" class="home" />
                <div class="flex items-center justify-center px-4 py-2 rounded-[100px] bg-[#E6E8EC] breadscrumb">
                    <div v-if="breadcrumb && breadcrumb.length" v-for="(item, index) in breadcrumb" :key="item.label"
                        class="flex items-center justify-center">
                        <img class="mr-3" :src="item.icon" />
                        {{ item?.label }}
                        <img class="ml-2" :src="right" v-show="index < breadcrumb.length - 1" />
                    </div>
                </div>
            </div>
            <div class="flex flex-wrap py-2 items-center">
                <div class="flex items-center justify-center px-3 h-[44px] rounded-[100px] bg-[#2162FF] text-white count-down"
                    v-show="showClock">
                    <img :src="timer" />
                    <VueCountdown :auto-start="true" :time="timeWork" @progress="handleCountdownProgress">
                        <template slot-scope="props">{{ props.minutes }}:{{ props.seconds <= 9 ? `0${props.seconds}` :
                            props.seconds }} </template>
                    </VueCountdown>
                    <div @click="handleExam" class="cursor-pointer">&nbsp | {{ action }} </div>
                </div>
                <nav class="relative flex flex-wrap items-center justify-between px-2">
                    <div class="flex mx-auto flex-row items-center justify-between">
                        <div class="w-fit rounded-[100px] bg-white px-4 py-2 cursor-pointer" @click="openLink"
                            v-show="!user">
                            <div class="text-lg leading-relaxed inline-block whitespace-nowrap	">
                                Sign in
                            </div>
                        </div>
                        <el-dropdown trigger="click" @command="handleCommand" v-if="user">
                            <div class="flex items-center justify-center cursor-pointer">
                                <Avatar />
                                <!-- <el-avatar shape="square"> {{ user ? user.name[0] : "" }} </el-avatar> -->
                            </div>
                            <template #dropdown>
                                <el-dropdown-menu>
                                    <el-dropdown-item command="history">
                                        History
                                    </el-dropdown-item>
                                    <el-dropdown-item command="logout">
                                        Logout
                                    </el-dropdown-item>
                                </el-dropdown-menu>
                            </template>
                        </el-dropdown>
                    </div>
                </nav>
            </div>
        </div>
        <div class="fixed flex w-full h-full top-0 items-center justify-center" v-if="isOpen" :style="{zIndex: 100}">

            <transition name="fade">
                <div>
                    <div class="absolute inset-0 bg-gray-600 opacity-70 " @click="handleToggle"></div>

                    <div class="w-full max-w-lg p-3 relative mx-auto my-auto rounded-xl shadow-lg bg-white">
                        <div>
                            <div class="text-center p-3 flex-auto justify-center leading-6">
                                <h2 class="text-2xl font-bold py-4">Are you sure?</h2>
                                <p class="text-md text-gray-500 px-8">
                                    Do you really want to finish this test?
                                </p>
                            </div>
                            <div class="p-3 mt-2 text-center space-x-4 md:block">
                                <button
                                    class="mb-2 md:mb-0 bg-white px-5 py-2 text-sm shadow-sm font-medium tracking-wider border text-gray-600 rounded-md hover:shadow-lg hover:bg-gray-100"
                                    @click="handleToggle">
                                    Close
                                </button>
                                <button @click="handleOk"
                                    class="mb-2 md:mb-0 bg-blue-500 border border-blue-500 px-5 py-2 text-sm shadow-sm font-medium tracking-wider text-white rounded-md hover:shadow-lg hover:bg-blue-600">
                                    OK
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </transition>
        </div>
    </div>
</template>
<script>
import VueCountdown from "@chenfengyuan/vue-countdown";
import Avatar from '../../svg/Avatar.vue';
export default {
    components: {
        VueCountdown,
        Avatar
    },
    props: ["user", "breadcrumb", "showTime", "onFinish", "value"],
    data() {
        return {
            home: require('../../../../public/images/header/home.svg'),
            right: require('../../../../public/images/header/right.svg'),
            timer: require('../../../../public/images/header/timer.svg'),
            timeWork: 0,
            showClock: this.showTime || false,
            timerun: 0,
            action: null,
            skills: [
                'Listening', 'Speaking', 'Reading', 'Writing'
            ],
            isOpen: false,
        }
    },
    methods: {
        handleCommand(e) {
            if (e === "history") {
                window.location.href = "/history";
            } else if (e === 'logout') {
                window.location.href = "/logout";
            }
        },
        openLink() {
            window.location.href = `${$Api.baseUrl}/sign-in`;
        },
        logout() {
            window.location.href = "/logout";
        },
        history() {
            window.location.href = "/history";
        },
        learn() {
            window.location.href = "/history-learn";
        },
        backToHome() {
            window.location.href = "/";
        },
        handleCountdownProgress(data) {
            this.timerun = this.timeWork - data.totalMilliseconds + 1000;
            if (this.timerun === this.timeWork) {
                this.handleExam(false);
            }
        },
        handleExam(isConfirm = true) {
            const indexOfSkill = this.skills.findIndex(skill => skill.toLowerCase() == this.value);
            if (indexOfSkill < this.skills.length - 1) {
                this.$emit('handleExam', this.skills[indexOfSkill + 1].toLowerCase());
            } else {
                isConfirm && this.handleToggle()
                if(!isConfirm) {
                    this.showClock = false;
                    this.onFinish();
                }
            }
        },
        handleOk() {
            this.showClock = false
            this.onFinish();
            this.isOpen = !this.isOpen;
        },
        handleToggle() {
            this.isOpen = !this.isOpen;
        },
    },
    watch: {
        value(newValue) {
            const timeWorkMapping = {
                'writing': 60 * 60 * 1000,
                'listening': 40 * 60 * 1000,
                'reading': 60 * 60 * 1000 + 1,
            }
            if (!newValue) return;
            this.timeWork = timeWorkMapping[newValue];

            if (newValue == 'writing') {
                this.action = "Finish";
            } else {
                this.action = "Next";
            }
        }
    }
};
</script>
<style>
@media only screen and (max-width: 900px) {

    .home,
    .breadscrumb {
        display: none;
    }
}

a,
a:hover {
    text-decoration: none;
    color: unset;
}

.header {
    border: 2px solid #F4F5F6
}

.fade-enter,
.fade-leave-to {
    opacity: 0;
}

.fade-enter-active,
.fade-leave-active {
    transition: opacity 500ms ease-out;
}
</style>
  