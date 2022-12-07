<template>
    <div class="w-full">
        <header-component />
        <div class="w-full max-w-[1206px] mx-auto p-4">
            <div class="bg-blur px-[48px] py-[48px]" v-show="isShowLabel">
                <h2
                    class="
                        text-[36px]
                        font-semibold
                        leading-[120%]
                        text-center
                        mb-4
                    "
                >
                    <p>ENGLISH GRAMMAR LEVEL TEST</p>
                </h2>
                <ul>
                    <li class="list-disc text-[16px] mb-2">
                        There are 40 questions in this vocabulary test.
                    </li>
                    <li class="list-disc text-[16px] mb-2">
                        They cover all levels from elementary (A1) to advanced
                        (C1) in a random order. You will get your score at the
                        end
                    </li>

                    <li class="list-disc text-[16px] mb-2">
                        Don’t use a dictionary – the idea is to find your
                        natural level
                    </li>
                    <li class="list-disc text-[16px]">
                        Some of the questions are easier, some are more
                        difficult. Don’t worry if you don’t know the answer!
                    </li>
                </ul>
                <h2
                    class="text-[24px] font-semibold leading-[120%] text-center mt-4"
                >
                    <VueCountdown
                        :time="timeWork"
                        @progress="handleCountdownProgress"
                        ref="countdown"
                    >
                        <template slot-scope="props"
                            >Time Remaining： {{ props.minutes }} minutes,
                            {{ props.seconds }} seconds.</template
                        >
                    </VueCountdown>
                </h2>
            </div>
            <transition name="el-zoom-in-top">
                <div
                    class="bg-blur px-[48px] py-[48px] mt-4"
                    v-show="!isShowLabel"
                >
                    <h2
                        class="
                            text-[36px]
                            font-semibold
                            leading-[120%]
                            text-center
                            mb-4
                        "
                    >
                        <p>
                            You have reached {{ arrRightAns.length }} of
                            {{ questions.length }} point(s),
                        </p>
                    </h2>
                    <div class="flex items-center justify-center">
                        <el-progress
                            type="circle"
                            :percentage="
                                (arrRightAns.length / questions.length) * 100
                            "
                        ></el-progress>
                    </div>
                    <h2
                    class="text-[24px] font-semibold leading-[120%] text-center mt-4"
                >
                    <VueCountdown
                        :auto-start="false"
                        :time="timerun"
                        @progress="handleCountdownProgress"
                    >
                        <template slot-scope="props"
                            >Your time： {{ props.minutes }} minutes,
                            {{ props.seconds }} seconds.</template
                        >
                    </VueCountdown>
                </h2>
                </div>
            </transition>

            <div
                v-if="isShowLabel"
                class="w-full mt-4"
                v-for="(question, index) in questions"
                :key="question.id"
            >
                <p class="text-[16px]">
                    Question <strong>{{ index + 1 }}</strong> of
                    <strong>{{ questions.length }}</strong>
                </p>
                <p class="mt-2 mb-4 text-[16px]">{{ question.question }}</p>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div
                        class="w-full"
                        v-for="(item, indexItem) in question.dataAns"
                        :key="item.id"
                    >
                        <input
                            type="radio"
                            :id="`test${item.id}`"
                            :name="`radio-group${index}`"
                            checked
                            v-model="answerData[index].radioValue"
                            :value="item.id"
                            hidden
                            :disabled="isShowLabel == false"
                        />
                        <label
                            :for="`test${item.id}`"
                            class="
                                flex
                                justify-between
                                items-center
                                w-full
                                py-2
                                px-4
                                border-2
                                rounded-lg
                                border-answer
                            "
                            :class="[
                                answerData[index].radioValue == item.id
                                    ? `active`
                                    : '',
                            ]"
                        >
                            <div
                                class="text-[16px] font-semibold"
                                :style="
                                    answerData[index].radioValue == item.id
                                        ? `color: #5B5EA6`
                                        : 'color: #999'
                                "
                            >
                                {{ item.text }}
                            </div>
                            <div>
                                <AVue
                                    :isActive="
                                        answerData[index].radioValue == item.id
                                            ? true
                                            : false
                                    "
                                    v-if="indexItem == 0"
                                />
                                <BVue
                                    :isActive="
                                        answerData[index].radioValue == item.id
                                            ? true
                                            : false
                                    "
                                    v-if="indexItem == 1"
                                />
                                <CVue
                                    :isActive="
                                        answerData[index].radioValue == item.id
                                            ? true
                                            : false
                                    "
                                    v-if="indexItem == 2"
                                />
                                <DVue
                                    :isActive="
                                        answerData[index].radioValue == item.id
                                            ? true
                                            : false
                                    "
                                    v-if="indexItem == 3"
                                />
                            </div>
                        </label>
                    </div>
                </div>
            </div>

            <div
                v-if="!isShowLabel"
                class="w-full mt-4"
                v-for="(question, index) in questions"
                :key="question.id"
            >
                <p class="text-[16px]">
                    Question <strong>{{ index + 1 }}</strong> of
                    <strong>{{ questions.length }}</strong>
                </p>
                <p class="mt-2 mb-4 text-[16px]">{{ question.question }}</p>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div
                        class="w-full"
                        v-for="(item, indexItem) in question.dataAns"
                        :key="item.id"
                    >
                        <input
                            type="radio"
                            :id="`test${item.id}`"
                            :name="`radio-group${index}`"
                            checked
                            v-model="answerData[index].radioValue"
                            :value="item.id"
                            hidden
                            :disabled="isShowLabel == false"
                        />
                        <label
                            :for="`test${item.id}`"
                            class="
                                flex
                                justify-between
                                items-center
                                w-full
                                py-2
                                px-4
                                border-2
                                rounded-lg
                                border-answer
                                min-h-[70px]
                            "
                            :class="[
                                answerData[index].radioValue == item.id
                                    ? `active`
                                    : '',
                                answerData[index].radioValue ==
                                answerData[index].right_answer
                                    ? `right`
                                    : 'wrong',
                                item.id == answerData[index].right_answer
                                    ? `right_wait`
                                    : '',
                                item.id == answerData[index].right_answer &&
                                item.id == answerData[index].radioValue
                                    ? 'bgright'
                                    : '',
                            ]"
                        >
                            <div
                                class="text-[16px] font-semibold text-answer"
                                :class="[
                                    answerData[index].radioValue == item.id
                                        ? `active`
                                        : '',
                                    answerData[index].radioValue ==
                                    answerData[index].right_answer
                                        ? `right`
                                        : 'wrong',
                                    item.id == answerData[index].right_answer
                                        ? `right_wait`
                                        : '',
                                    item.id == answerData[index].right_answer &&
                                    item.id == answerData[index].radioValue
                                        ? 'bgright'
                                        : '',
                                ]"
                            >
                                {{ item.text }}
                            </div>
                            <div>
                                <el-button
                                    v-if="
                                        item.id ==
                                        answerData[index].right_answer
                                    "
                                    type="success"
                                    icon="el-icon-check"
                                    circle
                                    size="mini"
                                ></el-button>
                                <div v-else>
                                    <AVue
                                        :isActive="
                                            answerData[index].radioValue ==
                                            item.id
                                                ? true
                                                : false
                                        "
                                        v-if="indexItem == 0"
                                    />
                                    <BVue
                                        :isActive="
                                            answerData[index].radioValue ==
                                            item.id
                                                ? true
                                                : false
                                        "
                                        v-if="indexItem == 1"
                                    />
                                    <CVue
                                        :isActive="
                                            answerData[index].radioValue ==
                                            item.id
                                                ? true
                                                : false
                                        "
                                        v-if="indexItem == 2"
                                    />
                                    <DVue
                                        :isActive="
                                            answerData[index].radioValue ==
                                            item.id
                                                ? true
                                                : false
                                        "
                                        v-if="indexItem == 3"
                                    />
                                </div>
                            </div>
                        </label>
                    </div>
                </div>
            </div>
            <button
                v-show="isShowLabel"
                @click="submit"
                class="
                    cursor-pointer
                    px-4
                    py-2
                    text-center
                    uppercase
                    leading-[28px]
                    flex
                    items-center
                    justify-center
                    font-light
                    rounded-md
                    bg-button
                    text-[19px] text-white
                    hover:opacity-80
                    mt-4
                    ml-auto
                "
            >
                Finish
            </button>
        </div>

        <!-- <footer-component /> -->
    </div>
</template>
<script>
import AVue from "../alphabet/A.vue";
import BVue from "../alphabet/B.vue";
import CVue from "../alphabet/C.vue";
import DVue from "../alphabet/D.vue";
import VueCountdown from "@chenfengyuan/vue-countdown";
export default {
    data() {
        return {
            answerData: [],
            questions: [
                {
                    id: 1,
                    question:
                        "If I were you, I’d leave earlier, so you can avoid the _________.",
                    dataAns: [
                        {
                            id: 121212,
                            text: "hello",
                        },
                        {
                            id: 121213,
                            text: "hi",
                        },
                        {
                            id: 121214,
                            text: "my name ba",
                        },
                        {
                            id: 121215,
                            text: "wow",
                        },
                    ],

                    right_answer: 121212,
                },
                {
                    id: 2,
                    question:
                        "If I were you, I’d leave earlier, so you can avoid the _________.",
                    dataAns: [
                        {
                            id: 221212,
                            text: "hello",
                        },
                        {
                            id: 221213,
                            text: "hi",
                        },
                        {
                            id: 221214,
                            text: "my name ba",
                        },
                        {
                            id: 221215,
                            text: "wow",
                        },
                    ],

                    right_answer: 221212,
                },
                {
                    id: 3,
                    question:
                        "If I were you, I’d leave earlier, so you can avoid the _________.",
                    dataAns: [
                        {
                            id: 321212,
                            text: "hello",
                        },
                        {
                            id: 321213,
                            text: "hi",
                        },
                        {
                            id: 321214,
                            text: "my name ba",
                        },
                        {
                            id: 321215,
                            text: "wow",
                        },
                    ],

                    right_answer: 321212,
                },
                {
                    id: 4,
                    question:
                        "If I were you, I’d leave earlier, so you can avoid the _________.",
                    dataAns: [
                        {
                            id: 421212,
                            text: "hello",
                        },
                        {
                            id: 421213,
                            text: "hi",
                        },
                        {
                            id: 421214,
                            text: "my name ba",
                        },
                        {
                            id: 421215,
                            text: "wow",
                        },
                    ],

                    right_answer: 421212,
                },
                {
                    id: 5,
                    question:
                        "If I were you, I’d leave earlier, so you can avoid the _________.",
                    dataAns: [
                        {
                            id: 521212,
                            text: "hello",
                        },
                        {
                            id: 521213,
                            text: "hi",
                        },
                        {
                            id: 521214,
                            text: "my name ba",
                        },
                        {
                            id: 521215,
                            text: "wow",
                        },
                    ],

                    right_answer: 521212,
                },
            ],
            arrRightAns: [],
            arrWrongAns: [],
            total: 0,
            isShowLabel: true,
            timeWork: 20 * 60 * 1000,
            timerun: 0,
        };
    },
    components: {
        AVue,
        BVue,
        CVue,
        DVue,
        VueCountdown,
    },
    methods: {
        submit() {
            this.$refs.countdown.abort();
            this.questions.forEach((item, index) => {
                this.answerData[index].right_answer = item.right_answer;
            });
            window.scrollTo({ top: 0, behavior: "smooth" });
            setTimeout(() => {
                this.isShowLabel = false;
            }, 800);

            this.answerData.forEach((item) => {
                if (item.radioValue == item.right_answer) {
                    this.arrRightAns.push(item);
                }
            });
        },
        handleCountdownProgress(data) {
            this.timerun = this.timeWork - data.totalMilliseconds + 1000;
            if(this.timerun === this.timeWork){
                this.submit();
            }
        },
    },
    created() {
        this.questions.forEach((item) => {
            this.answerData.push({
                radioValue: null,
                right_answer: "",
            });
        });
    },
};
</script>
<style>
.border-answer {
    border-color: #999;
}
.border-answer.active {
    border-color: #5b5ea6;
    border-width: 3px;
}
.border-answer.active.right {
    border-color: #009b77;
    border-width: 3px;
}
.border-answer.wrong.right_wait {
    border-color: #009b77;
    border-width: 3px;
}
.border-answer.active.right_wait.bgright {
    background-color: #009b77;
}
.border-answer.active.wrong {
    border-color: #dd4124;
    border-width: 3px;
}
.text-answer {
    color: #999;
}
.text-answer.active {
    color: #5b5ea6;
}
.text-answer.active.right {
    color: #009b77;
}
.text-answer.wrong.right_wait {
    color: #009b77;
}
.text-answer.active.wrong {
    color: #dd4124;
}
.text-answer.active.right_wait.bgright {
    color: #fff;
}
</style>
