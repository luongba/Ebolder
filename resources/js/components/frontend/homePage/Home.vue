<template>
    <div class="w-full" :style="bgStyle">
        <div class="absolute bg-svg">
            <!-- background image -->
        </div>
        <div class="xl:w-[62.5%] w-[95%] mx-auto">
            <header-component :user="user" />
        </div>
        <div class="xl:w-[62.5%] w-[95%] mx-auto  my-[16px] xl:my-[48px]">
            <h2 class="text-[37px] sm:text-[50px] font-normal leading-[120%]">
                Learning
            </h2>
            <div class="text-[37px] sm:text-[50px] font-bold">
                English faster, <br> easier.
            </div>
        </div>

        <Skills />

        <div class="xl:w-[62.5%] w-[95%] mx-auto my-[16px] xl:my-[48px]">
            <h2 class="text-[28px] font-semibold leading-[120%] col-span-3  my-[16px] xl:my-[48px]">
                <p>Step out into the world</p>
            </h2>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                <div
                    class="rounded-tl-[16px] rounded-tr-[56px] rounded-br-[16px] rounded-bl-[16px] border-2 border-solid border-[#F4F5F6] bg-[#FFF] p-12 flex flex-col justify-between">
                    <div>
                        <h2 class="text-[22px] font-semibold mb-4">English collection</h2>
                        <p class="text-[16px] font-light">
                            Collection of new types of English problems, intuitive interface system that is easy to use and
                            suitable for all ages.
                        </p>
                    </div>
                    <div class="flex justify-between items-center mt-12 cursor-pointer" @click="openLink">
                        <img :src="viewMore1" />
                        <span class="flex ms-6"> View more <img :src="arrowRightBlack" /> </span>
                    </div>
                </div>
                <div
                    class="rounded-tl-[16px] rounded-tr-[56px] rounded-br-[16px] rounded-bl-[16px] border-2 border-solid border-[#F4F5F6] bg-[#FFF] p-12 flex flex-col justify-between">
                    <div>
                        <h2 class="text-[22px] font-semibold mb-4">Four Exam Modules</h2>
                        <p class="text-[16px] font-light">
                            The set of four exam modules includes Listening, Reading, Vocabulary, Grammar, providing all
                            types
                            of questions.
                        </p>
                    </div>
                    <div class="flex justify-between items-center mt-12 cursor-pointer" @click="openLink">
                        <img :src="viewMore2" />
                        <span class="flex ms-6"> View more <img :src="arrowRightBlack" /> </span>
                    </div>
                </div>
                <div
                    class="rounded-tl-[16px] rounded-tr-[56px] rounded-br-[16px] rounded-bl-[16px] border-2 border-solid border-[#F4F5F6] bg-[#FFF] p-12 flex flex-col justify-between">
                    <div>
                        <h2 class="text-[22px] font-semibold mb-4">Experienced Test Prep</h2>
                        <p class="text-[16px] font-light">
                            The test set is prepared by an English teacher with many years of experience in teaching.
                        </p>
                    </div>
                    <div class="flex justify-between items-center mt-12 cursor-pointer" @click="openLink">
                        <img :src="viewMore3" />
                        <span class="flex ms-6"> View more <img :src="arrowRightBlack" /> </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-full my-[16px] xl:my-[48px]">
            <h2 class="text-[28px] xl:text-[42px] font-semibold leading-[120%] text-center my-[16px] xl:my-[48px]">
                <p class="text-center">Make faster, easier...</p>
            </h2>
            <div class="xl:w-[62.5%] w-[95%] mx-auto grid md:grid-cols-3 gap-4 grid-cols-1">
                <img class="m-auto" :src="dictionary" />
                <img class="m-auto" :src="pronunciation" />
                <img class="m-auto" :src="games" />
            </div>
        </div>
        <div class="w-full  my-[16px] xl:my-[48px]">
            <h2 class="text-[28px] xl:text-[42px] font-semibold leading-[120%] text-center my-[16px] xl:my-[48px]">
                <p class="text-center">Why should you <br> study here?</p>
            </h2>
            <div class="xl:w-[62.5%] w-[95%] bg-[#E8F9ED] mx-auto relative bg-blur-f
                grid xl:grid-cols-2 grid-cols-1]">
                <div class="border-r-2 border-[#E6E8EC]">
                    <div class="flex h-full justify-evenly flex-col py-8 px-8 md:px-[60px]">
                        <h2 class="text-[38px] xl:text-[40px] font-semibold leading-[120%] text-start">
                            <p>Reality,<br> Enough knowledge, <br> Follow the route.</p>
                        </h2>
                        <button @click="openLink" class="flex text-lg md:mt-12 mt-8 items-center">
                            <div class="rounded-full bg-[#24B24C] p-1 w-fit me-3">
                                <img :src="arrowLeft" />
                            </div>
                            Start now!
                        </button>
                    </div>
                </div>
                <div class="flex flex-col">
                    <div class="border-b-2 border-[#E6E8EC] py-8 px-8 md:px-[60px] flex justify-between">
                        <div>
                            <p class="text-[20px] mt-4 font-semibold">Reality</p>
                            <p>Suitable for people going to school or working</p>
                        </div>
                        <img :src="reality" />
                    </div>
                    <div class="border-b-2 border-[#E6E8EC] py-8 px-8 md:px-[60px] flex justify-between">
                        <div class="">
                            <p class="text-[20px] mt-4 font-semibold">Enough knowledge</p>
                            <p>Understand sentence structure clearly</p>
                        </div>
                        <img :src="knowledge" />
                    </div>
                    <div class="py-8 px-8 md:px-[60px] flex justify-between">
                        <div class="">
                            <p class="text-[20px] mt-4 font-semibold">Follow the route</p>
                            <p>The roadmap is designed by experienced teachers</p>
                        </div>
                        <img :src="route" />
                    </div>
                </div>
            </div>
        </div>
        <div
            class="xl:py-[134px] xl:px-[134px] xl:w-[62.5%] w-[95%] bg-[#E8F9ED] mx-auto relative bg-blur-f mt-[16px] xl:mt-[128px]">
            <div class="grid grid-cols-1 xl:grid-cols-2 p-4">
                <div class="col-span-1 flex justify-start items-start flex-col">
                    <h2 class="text-[38px] xl:text-[40px] font-semibold leading-[120%] text-start">
                        <p>The</p>
                        <p class="text-[#36D362]">Easiest way</p>
                        <p>to learn</p>
                        <p>English!</p>
                    </h2>
                    <button @click="openLink" class="flex text-lg md:mt-12 mt-8 items-center">
                        <div class="rounded-full bg-[#24B24C] p-1 w-fit me-3">
                            <img :src="arrowLeft" />
                        </div>
                        Start now!
                    </button>
                </div>
            </div>
            <div
                class="absolute  block  listening">
                <img :src="listening" />
            </div>
        </div>
        <div class="md:mt-[100px] mt-[80px]">
            <footer-component />
        </div>
    </div>
</template>
<script>
import Skills from './Skills.vue';

export default {
    props: ["user"],
    components: {
        Skills
    },
    computed: {
        bgStyle() {
            return {
                backgroundImage: `url(${require('../../../../../public/images/landing/background.svg')})`,
                backgroundRepeat: 'no-repeat',
            };
        }
    },
    data() {
        return {
            listening: require('../../../../../public/images/landing/listening.png'),
            easiestWay: require('../../../../../public/images/landing/easiest-way.svg'),
            timer: require('../../../../../public/images/landing/timer.svg'),
            volume: require('../../../../../public/images/landing/volume.svg'),
            arrowUp: require('../../../../../public/images/landing/arrow-up.svg'),
            calendar: require('../../../../../public/images/landing/calendar.svg'),
            arrowLeft: require('../../../../../public/images/landing/arrow-left.svg'),
            reality: require('../../../../../public/images/landing/reality.svg'),
            knowledge: require('../../../../../public/images/landing/knowledge.svg'),
            route: require('../../../../../public/images/landing/route.svg'),
            games: require('../../../../../public/images/landing/games.svg'),
            pronunciation: require('../../../../../public/images/landing/pronunciation.svg'),
            dictionary: require('../../../../../public/images/landing/dictionary.svg'),
            viewMore1: require('../../../../../public/images/landing/view-more1.svg'),
            viewMore2: require('../../../../../public/images/landing/view-more2.svg'),
            viewMore3: require('../../../../../public/images/landing/view-more3.svg'),
            arrowRightBlack: require('../../../../../public/images/landing/arrow-right-black.svg'),
            start: require('../../../../../public/images/landing/start.svg'),
            background: require('../../../../../public/images/landing/background.svg'),
            openTab: 1,
            activeColor: "#2162FF",
        };
    },
    methods: {
        openLink() {
            window.location.href = `${$Api.baseUrl}/sign-in`;
        },
        toggleTabs(tabNumber) {
            this.openTab = tabNumber
        }
    },
};
</script>
<style scoped>
body {
    overflow-x: hidden;
}
.strong {
    -webkit-text-fill-color: transparent;
    background: -webkit-linear-gradient(45deg, #5ebbff -33%, #a174ff 69%);
    -webkit-background-clip: text;
    background-clip: text;
    font-weight: unset;
}

.bg-button {
    background: linear-gradient(177.34deg, #21a2ff, #8951ff 73.36%);
}

.color-gadient {
    color: linear-gradient(177.34deg, #21a2ff, #8951ff 73.36%);
}

.bg-blur-f {
    backdrop-filter: blur(20px);
    -webkit-backdrop-filter: blur(20px);
    border-radius: 20px;
    border: 1px solid rgba(95, 95, 95, 0.1);
}

.bg-description {
    background: linear-gradient(141.34deg, #21a2ff, #8951ff 73.36%);
    border-radius: 50%;
    height: 52px;
    width: 52px;
}

.text-color.active {
    -webkit-text-fill-color: transparent;
    background: linear-gradient(180deg, #5ebbff, #a174ff);
    -webkit-background-clip: text;
    background-clip: text;
    font-weight: 600;
}

.footer-line::after {
    content: "";
    width: 100%;
    border: 1px solid #333c6d;
}

.text-base-500 {
    color: #777E90;
}

.shadow {
    box-shadow: 0px 10px 50px 0px #002E2814;
}

.icon-shadow {
    box-shadow: 0px 40px 80px -20px #1313131A;
}

@media only screen and (min-width: 1280px) {
  .listening {
    right: -22%;
    width: 70%;
    bottom: -15%;
  }
}

@media only screen and (max-width: 1279px) {
  .listening {
    right: 0px;
    bottom: -25%;
  }
  .listening img {
    height: 400px;
  }
}

@media only screen and (max-width: 900px) {
  .listening {
    position: static;
    width: 100%;
  }
  .listening img {
    height: auto;
  }
}
</style>
