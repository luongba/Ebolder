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
                            {{ topic.questions.length }} point(s),
                        </p>
                    </h2>
                    <div class="flex items-center justify-center">
                        <el-progress
                            type="circle"
                            :percentage="
                                (arrRightAns.length / topic.questions.length) *
                                100
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
            <div class="bg-blur px-[48px] py-[16px] mt-4">
                <div v-html="topic.content" class="text-[16px]"></div>
            </div>

            <div
                v-if="isShowLabel && index == indexPage"
                class="w-full mt-4"
                v-for="(question, index) in topic.questions"
                :key="question.id"
            >
                <p class="text-[16px]">
                    Question <strong>{{ index + 1 }}</strong> of
                    <strong>{{ topic.questions.length }}</strong>
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
                v-if="(!isShowLabel && index == indexPage)"
                class="w-full mt-4"
                v-for="(question, index) in topic.questions"
                :key="question.id"
            >
                <p class="text-[16px]">
                    Question <strong>{{ index + 1 }}</strong> of
                    <strong>{{ topic.questions.length }}</strong>
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
            <div class="flex items-center justify-between mt-4">
                <div  v-if="(indexPage == 0)"></div>
                <button
                v-if="(indexPage > 0)"
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
                v-show="(indexPage != topic.questions.length - 1)"
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
                v-show="((indexPage == topic.questions.length - 1) && isShowLabel == true)"
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
export default {
    data() {
        return {
            answerData: [],
            topic: {
                content: `"<center><strong>Sarah&rsquo;s Life in Canada</strong></center>\n<p><br />Sarah is 36 years old, and she lives in Canada. She has two young daughters. She works two days a week as a teacher. Her husband&rsquo;s name is Nathan, and he&rsquo;s a sales manager. Nathan&rsquo;s job is very busy, so he often comes home late. At weekends, they often go driving or walking in the countryside.</p>\n<p>&nbsp;</p>\n<p>Nathan was born in Canada, but Sarah wasn&rsquo;t. She was born in Argentina, and she moved to Canada when she was 26. When she was growing up, she was really interested in English. At first, she thought it was difficult, but when she finished school, she could already speak quite fluently and understand almost everything she heard or read. She spent a lot of time listening to songs and watching TV shows and films in English.</p>\n<p>After she graduated from university, she decided to train as an English teacher. The certificate she needed was quite expensive, and competition for places was intense, but she was determined to do it&mdash;she simply couldn&rsquo;t imagine doing anything else. She finished the course with a distinction, which was the highest grade possible. Soon, she found work as a teaching assistant in a local primary school. She enjoyed the work, although it was often challenging&mdash;the children were not always well-disciplined, and she didn&rsquo;t think that the classroom teacher had enough understanding of teaching methods.</p>\n<p>When she first went to Canada, she never would have imagined that she would end up staying there. It was supposed to be a short-term placement in a high school. She thought that she would be able to see a different part of the world and gain some useful experience, which could help her to find a better teaching position when she came back to Argentina. At first, she found living overseas much more difficult than she had expected. She felt homesick, and she had problems getting used to everything which was different in Canada&mdash;the interpersonal culture, the climate, the food&hellip; For the first three months she was there, she spent most of her free time in her room, dreaming of going back to Argentina and seeing her family again.</p>\n<p>Over time, she adjusted to life in Canada, and even started to enjoy herself a bit more. One day, she met Nathan at a party. She liked his sense of humour, and how kind he was, but she was reluctant to get involved, knowing that she was planning to leave in the near future. When her placement finished, he convinced her to apply for a permanent job in another school. She told herself that she would give it one more year and see how things went.</p>\n<p>Now, Sarah is settled, although she still misses Argentina. She tries to make it back at least yearly, and she is bringing up her daughters to be bilingual, so that they can talk to their Argentinian relatives in Spanish. When she thinks back to her first few months in Canada, she can scarcely recognise herself. In some ways, she wishes she weren&rsquo;t so far away from her family, but at the same time, she feels that she&rsquo;s learned many things which she never would have experienced had she stayed in Argentina. She wants to give her daughters the chance to travel and experience life in other countries as soon as she can, although of course she hopes they don&rsquo;t move too far away!</p>"`,
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
                            "If I were you, I’d leave earlier, so you can avoid the win _________.",
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
            },

            arrRightAns: [],
            arrWrongAns: [],
            total: 0,
            isShowLabel: true,
            timeWork: 20 * 60 * 1000,
            timerun: 0,
            indexPage: 0,
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
            this.topic.questions.forEach((item, index) => {
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
            if (this.timerun === this.timeWork) {
                this.submit();
            }
        },
        movePage(number){
           
            switch(number){
                case -1: {
                    if(this.indexPage > 0){
                        this.indexPage += number;
                    }
                    return;
                }case 1: {
                    if(this.indexPage < this.topic.questions.length - 1){
                        this.indexPage += number;
                    }
                    return;
                }
            }
        }
    },
    created() {
        this.topic.questions.forEach((item) => {
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
