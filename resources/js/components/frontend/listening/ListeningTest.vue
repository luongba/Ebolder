<template>
    <div class="w-full">
        <header-component />
        <div class="w-full max-w-[1206px] mx-auto p-4">
            <div class="bg-blur-f px-[48px] py-[48px]" v-show="isShowLabel">
                <h2
                    class="
                        text-[36px]
                        font-semibold
                        leading-[120%]
                        text-center
                        mb-4
                    "
                >
                    <p>ENGLISH READING LEVEL TEST</p>
                </h2>
                <ul>
                    <li class="list-disc text-[16px] mb-2">
                        Read the text, then try to answer the questions
                    </li>
                    <li class="list-disc text-[16px] mb-2">
                        There are 20 questions, and you see one at a time in a
                        random order. The answers are not in the same order as
                        the text.
                    </li>

                    <li class="list-disc text-[16px] mb-2">
                        Some questions are easier; some are more difficult.
                        Don’t worry if you don’t know the answer!
                    </li>
                    <li class="list-disc text-[16px]">
                        Try not to use a dictionary – the idea is to find your
                        natural level.
                    </li>
                </ul>
                <h2
                    class="
                        text-[24px]
                        font-semibold
                        leading-[120%]
                        text-center
                        mt-4
                    "
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
                    class="bg-blur-f px-[48px] py-[48px] mt-4"
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
                            {{ answerData.length }} point(s),
                        </p>
                    </h2>
                    <div class="flex items-center justify-center">
                        <el-progress
                            type="circle"
                            :percentage="
                                Number(
                                    (
                                        (arrRightAns.length /
                                            answerData.length) *
                                        100
                                    ).toFixed(2)
                                )
                            "
                        ></el-progress>
                    </div>
                    <h2
                        class="
                            text-[24px]
                            font-semibold
                            leading-[120%]
                            text-center
                            mt-4
                        "
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
                v-for="(topicItem, indexAudio) in topic"
                :key="topicItem.id"
                v-if="indexAudio == indexPage"
            >
                <p class="text-[16px] mt-4">
                    Audio: <strong>{{ indexAudio + 1 }}</strong> of
                    <strong>{{ topic.length }}</strong>
                </p>
                <div class="bg-blur-f px-[48px] py-[16px] mt-4">
                    <audio id="audio-preview" class="w-full" controls disabled>
                        <source
                            :src="`${baseURl}/upload/audio/${topicItem.audio}`"
                            type="audio/mpeg"
                        />
                    </audio>
                </div>

                <div
                    v-if="isShowLabel"
                    class="w-full mt-4"
                    v-for="(question, index) in topicItem.questions"
                    :key="question.id"
                >
                    <p class="text-[16px]">
                        Question <strong>{{ index + 1 }}</strong> of
                        <strong>{{ topicItem.questions.length }}</strong>
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
                                v-model="
                                    answerData.find(
                                        (itemi) => itemi.id == question.id
                                    ).radioValue
                                "
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
                                    answerData.find(
                                        (itemi) => itemi.id == question.id
                                    ).radioValue == item.id
                                        ? `active`
                                        : '',
                                ]"
                            >
                                <div
                                    class="text-[16px] font-semibold"
                                    :style="
                                        answerData.find(
                                            (itemi) => itemi.id == question.id
                                        ).radioValue == item.id
                                            ? `color: #5B5EA6`
                                            : 'color: #999'
                                    "
                                >
                                    {{ item.text }}
                                </div>
                                <div>
                                    <AVue
                                        :isActive="
                                            answerData.find(
                                                (itemi) =>
                                                    itemi.id == question.id
                                            ).radioValue == item.id
                                                ? true
                                                : false
                                        "
                                        v-if="indexItem == 0"
                                    />
                                    <BVue
                                        :isActive="
                                            answerData.find(
                                                (itemi) =>
                                                    itemi.id == question.id
                                            ).radioValue == item.id
                                                ? true
                                                : false
                                        "
                                        v-if="indexItem == 1"
                                    />
                                    <CVue
                                        :isActive="
                                            answerData.find(
                                                (itemi) =>
                                                    itemi.id == question.id
                                            ).radioValue == item.id
                                                ? true
                                                : false
                                        "
                                        v-if="indexItem == 2"
                                    />
                                    <DVue
                                        :isActive="
                                            answerData.find(
                                                (itemi) =>
                                                    itemi.id == question.id
                                            ).radioValue == item.id
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
                    v-for="(question, index) in topicItem.questions"
                    :key="question.id"
                >
                    <p class="text-[16px]">
                        Question <strong>{{ index + 1 }}</strong> of
                        <strong>{{ topicItem.questions.length }}</strong>
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
                                v-model="
                                    answerData.find(
                                        (itemi) => itemi.id == question.id
                                    ).radioValue
                                "
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
                                    answerData.find(
                                        (itemi) => itemi.id == question.id
                                    ).radioValue == item.id
                                        ? `active`
                                        : '',
                                    answerData.find(
                                        (itemi) => itemi.id == question.id
                                    ).radioValue ==
                                    answerData.find(
                                        (itemi) => itemi.id == question.id
                                    ).right_answer
                                        ? `right`
                                        : 'wrong',
                                    item.id ==
                                    answerData.find(
                                        (itemi) => itemi.id == question.id
                                    ).right_answer
                                        ? `right_wait`
                                        : '',
                                    item.id ==
                                        answerData.find(
                                            (itemi) => itemi.id == question.id
                                        ).right_answer &&
                                    item.id ==
                                        answerData.find(
                                            (itemi) => itemi.id == question.id
                                        ).radioValue
                                        ? 'bgright'
                                        : '',
                                ]"
                            >
                                <div
                                    class="
                                        text-[16px]
                                        font-semibold
                                        text-answer
                                    "
                                    :class="[
                                        answerData.find(
                                            (itemi) => itemi.id == question.id
                                        ).radioValue == item.id
                                            ? `active`
                                            : '',
                                        answerData.find(
                                            (itemi) => itemi.id == question.id
                                        ).radioValue ==
                                        answerData.find(
                                            (itemi) => itemi.id == question.id
                                        ).right_answer
                                            ? `right`
                                            : 'wrong',
                                        item.id ==
                                        answerData.find(
                                            (itemi) => itemi.id == question.id
                                        ).right_answer
                                            ? `right_wait`
                                            : '',
                                        item.id ==
                                            answerData.find(
                                                (itemi) =>
                                                    itemi.id == question.id
                                            ).right_answer &&
                                        item.id ==
                                            answerData.find(
                                                (itemi) =>
                                                    itemi.id == question.id
                                            ).radioValue
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
                                            answerData.find(
                                                (itemi) =>
                                                    itemi.id == question.id
                                            ).right_answer
                                        "
                                        type="success"
                                        icon="el-icon-check"
                                        circle
                                        size="mini"
                                    ></el-button>
                                    <div v-else>
                                        <AVue
                                            :isActive="
                                                answerData.find(
                                                    (itemi) =>
                                                        itemi.id == question.id
                                                ).radioValue == item.id
                                                    ? true
                                                    : false
                                            "
                                            v-if="indexItem == 0"
                                        />
                                        <BVue
                                            :isActive="
                                                answerData.find(
                                                    (itemi) =>
                                                        itemi.id == question.id
                                                ).radioValue == item.id
                                                    ? true
                                                    : false
                                            "
                                            v-if="indexItem == 1"
                                        />
                                        <CVue
                                            :isActive="
                                                answerData.find(
                                                    (itemi) =>
                                                        itemi.id == question.id
                                                ).radioValue == item.id
                                                    ? true
                                                    : false
                                            "
                                            v-if="indexItem == 2"
                                        />
                                        <DVue
                                            :isActive="
                                                answerData.find(
                                                    (itemi) =>
                                                        itemi.id == question.id
                                                ).radioValue == item.id
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
            </div>
            <div class="flex items-center justify-between mt-4">
                <div v-if="indexPage == 0"></div>
                <button
                    v-if="indexPage > 0"
                    @click="movePage(-1)"
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
                    "
                >
                    Prev
                </button>
                <button
                    v-show="indexPage != topic.length - 1"
                    @click="movePage(1)"
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
                    "
                >
                    Next
                </button>
                <button
                    v-if="isShowLabel == true && indexPage == topic.length - 1"
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
                    "
                >
                    Finish
                </button>
            </div>
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
import baseRequest from '../../../utils/baseRequest';
export default {
    props: ["data"],
    data() {
        return {
            answerData: [],
            topic: [],

            arrRightAns: [],
            arrWrongAns: [],
            total: 0,
            isShowLabel: true,
            timeWork: 20 * 60 * 1000,
            timerun: 0,
            indexPage: 0,
            baseURl: $Api.baseUrl,
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
        async submit() {
            this.$refs.countdown.abort();
            this.topic.forEach((itemTopic) => {
                itemTopic.questions.forEach((item) => {
                    this.answerData.find(
                        (itemAns) => itemAns.id == item.id
                    ).right_answer = item.right_answer;
                });
            });
            this.answerData.forEach((item) => {
                if (item.radioValue == item.right_answer) {
                    this.arrRightAns.push(item);
                }
            });
            let dataHistory = {
                test_type: "Listening",
                topic_name: this.data.name,
                scores: `${this.arrRightAns.length}/${this.answerData.length}`,
                completion_time: this.timerun,
            };
            try {
                let result = await baseRequest.post(
                    "/admin/save-history",
                    dataHistory
                );
            } catch (e) {}
            window.scrollTo({ top: 0, behavior: "smooth" });
            setTimeout(() => {
                this.isShowLabel = false;
            }, 800);
        },
        handleCountdownProgress(data) {
            this.timerun = this.timeWork - data.totalMilliseconds + 1000;
            if (this.timerun === this.timeWork) {
                this.submit();
            }
        },
        movePage(number) {
            switch (number) {
                case -1: {
                    if (this.indexPage > 0) {
                        this.indexPage += number;
                    }
                    return;
                }
                case 1: {
                    if (this.indexPage < this.topic.length - 1) {
                        this.indexPage += number;
                    }
                    return;
                }
            }
        },
    },
    created() {
        this.topic = this.data.topic_audio_listen.map((audio) => ({
            id: audio.id,
            audio: audio.audio,
            questions: audio.question_listening.map((question) => ({
                id: question.id,
                question: question.question,
                dataAns: $Helper.random(
                    question.answer_listening.map((answer) => ({
                        id: answer.id,
                        text: answer.text,
                    }))
                ),
                right_answer: question.right_answers.answer_id,
            })),
        }));
        this.topic.forEach((itemTopic) => {
            itemTopic.questions.forEach((item) => {
                this.answerData.push({
                    id: item.id,
                    radioValue: null,
                    right_answer: "",
                });
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
