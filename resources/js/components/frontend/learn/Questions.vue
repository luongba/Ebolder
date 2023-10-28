<template>
    <div class="bg-white h-full p-3 flex flex-column md:rounded">
        <div class="font-bold text-2xl mb-4"> Questions</div>
        <div v-show="this.questions?.length > 0">
        <div class="flex flex-row flex-wrap mb-4">
            <div v-for="(item, index) in this.questions" :key="item.id"
                class="rounded-full w-7 h-7 sm:w-10 sm:h-10 me-[11px] mb-[11px] sm:mb-[13px] sm:me-[13px] flex items-center justify-center font-semibold text-sm"
                @click="handleSelectQuestion(index)"
                :class="{ 'bg-[#2162FF] text-white': selectedIndex == index, 'bg-[#E6E8EC]': selectedIndex != index }">
                {{ index + 1 }}
            </div>
        </div>
        <div class="py-4 border-t border-[#e6e8ec]">
            <p class="text-lg font-semibold mb-2">Question {{ selectedIndex + 1 }}</p>
            <p class="font-semibold">
                <template v-for="(item, index) in handleQuestionWithInput(selectedQuestion?.question)">
                    <span v-if="item !== '#'" :key="'span' + index">{{ item }}</span>
                    <input v-else type="text"
                            class="
                                mx-2
                                text-white
                                border
                                border-[#e6e8ec]
                                outline-none
                                rounded-md
                                w-[43px]
                                lg:w-[75px]
                                px-2
                                py-1
                            " :key="'input' + index" />
                </template>
            </p>
        </div>
        <!-- , 'border-[#E6E8EC]': isQuestionAnswered(answer?.id, selectedQuestion?.id) == false -->
        <div class="flex-grow">
            <div v-for="(answer, index) in selectedQuestion?.answers" :key="index" class="rounded-[8px] border-2 p-3 mb-3"
                :class="{ 'border-[#2162FF]': isQuestionAnswered(answer?.id, selectedQuestion?.id)} "
                @click="handleSelectAnswer(answer?.id, selectedQuestion?.id)">
                <input type="radio" :id="`test${answer?.id}`" :value="answer?.id" :checked="isQuestionAnswered(answer?.id, selectedQuestion?.id)" />
                <label class="text-lg font-semibold ml-1">
                    {{ convertToCharacter(index) }}
                </label>
                <p class="font-light">{{ answer?.text }}</p>
            </div>
        </div>
        <div class="w-full flex flex-row mt-4">
            <div v-show="selectedIndex <= this.questions?.length - 1 && selectedIndex > 0" class="button-back"
                @click="handleSelectQuestion(selectedIndex - 1)">
                <img :src="arrowLeft" />
                Back
            </div>
            <div v-show="selectedIndex < this.questions?.length - 1" class="button-next"
                @click="handleSelectQuestion(selectedIndex + 1)">
                Next
                <img :src="arrowRight" />
            </div>
            <div v-show="selectedIndex == this.questions?.length - 1" class="button-next">
                Finish
                <img :src="arrowRight" />
            </div>
        </div>
    </div>
    </div>
</template>

<script>

export default {
    props: ["questions"],
    data() {
        return {
            selectedIndex: 0,
            selectedQuestion: this.questions?.[0],
            selectedAnswerId: 0,
            selectedAnswers: {},
            arrowLeft: require('../../../../../public/images/learn/arrow-left.svg'),
            arrowRight: require('../../../../../public/images/learn/arrow-right.svg')
        }
    },
    methods: {
        handleSelectQuestion(index) {
            this.selectedIndex = index;
            this.selectedQuestion = this.questions?.[this.selectedIndex];
        },
        convertToCharacter(number) {
            return String.fromCharCode(65 + number)
        },
        handleSelectAnswer(answerId, questionId) {
            this.selectedAnswerId = answerId;
            if(answerId) this.$set(this.selectedAnswers, questionId, answerId);
            this.isQuestionAnswered(answerId, questionId)
            console.log(this.isQuestionAnswered(answerId, questionId));
        },
        handleQuestionWithInput(question) {
            if (!question?.includes("#")) return [question];
            const executed = question.split(/(#)/)
            return executed;
        },
        isQuestionAnswered(answerId, questionId) {
            return this.selectedAnswers[questionId] == answerId;
        }
    },
    watch: {
        questions(newQuestions) {
            if (newQuestions && newQuestions.length) {
                // reset data
                this.selectedAnswers = {};
                this.selectedIndex = 0;
                this.selectedQuestion = newQuestions[this.selectedIndex];
            }
        }
    }
}
</script>

<style>
.button-next {
    background-color: #3772ff1a;
    border-radius: 8px;
    padding: 12px 16px;
    color: #2162ff;
    font-size: 18px;
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: center;
    flex-grow: 1;
    cursor: pointer;
}

.button-back {
    padding: 12px 16px;
    color: #141416;
    font-size: 18px;
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: center;
    flex-grow: 1;
    cursor: pointer;
}
</style>