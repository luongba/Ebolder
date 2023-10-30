<template>
    <div class="flex items-center py-2 md:py-[24px] px-4 justify-between relative z-10 border-b-2 header"
        style="font-family: lexend !important;">
        <div class="flex items-center cursor-pointer" @click="backToHome">
            <img src="/images/landing/logo.svg" alt="" />
            <img :src="home" @click="backToHome" class="home"/>
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
            <div class="flex items-center justify-center px-3 h-[44px] rounded-[100px] bg-[#2162FF] text-white count-down" v-show="showTime">
                <img :src="timer" />
                <VueCountdown :auto-start="true" :time="timeWork" @progress="handleCountdownProgress">
                    <template slot-scope="props"
                            >{{ props.minutes }}:{{ props.seconds <= 9 ? `0${props.seconds}` : props.seconds }} | Next</template
                        >
                </VueCountdown>
            </div>
            <nav class="relative flex flex-wrap items-center justify-between px-2 py-3">
                <div class="flex mx-auto flex-row items-center justify-between">
                    <div class="w-fit rounded-[100px] bg-white px-4 py-2 cursor-pointer" @click="openLink" v-show="!user">
                        <div class="text-lg leading-relaxed inline-block whitespace-nowrap	">
                            Sign in
                        </div>
                    </div>
                    <el-dropdown  trigger="click" @command="handleCommand" v-if="user">
                        <div class="flex items-center justify-center cursor-pointer">
                            <el-avatar shape="square"> {{ user ? user.name[0] : "" }} </el-avatar>
                        </div>
                        <template #dropdown>
                            <el-dropdown-menu >
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
</template>
<script>
import VueCountdown from "@chenfengyuan/vue-countdown";
export default {
    components: {
        VueCountdown
    },
    props: ["user", "breadcrumb", "showTime"],
    data() {
        return {
            home: require('../../../../public/images/header/home.svg'),
            right: require('../../../../public/images/header/right.svg'),
            timer: require('../../../../public/images/header/timer.svg'),
            timeWork: 45 * 60 * 1000,
            timerun: 0,
        }

    },
    methods: {
        handleCommand(e) {
            debugger
            if(e === "history") {
                window.location.href = "/history";
            } else if(e === 'logout') {
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
                this.submit();
            }
        },
    },
    created() {
        console.log(this.breadcrumb);
    },
};
</script>
<style>
@media only screen and (max-width: 900px) {
    .home, .breadscrumb, .count-down  {
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
</style>
  