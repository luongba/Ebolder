<template>
    <div class="bg-white p-3 flex flex-column md:rounded min-h-full">
        <div class="font-bold text-xl mb-4"> Questions</div>
        <div v-show="this.questions?.length > 0">
        <div class="flex flex-row flex-wrap mb-4">
            <div v-for="(item, index) in this.questions" :key="item.id"
                class="rounded-full w-7 h-7 sm:w-10 sm:h-10 me-[11px] mb-[11px] sm:mb-[13px] sm:me-[13px] flex items-center justify-center font-semibold text-sm"
                @click="handleSelectQuestion(index)"
                :class="{ 'bg-[#2162FF] text-white': selectedIndex == index, 'bg-[#35509A] text-white': selectedIndex != index && questionDone[item.id] }">
                {{ index + 1 }}
            </div>
        </div>
        <div class="py-4 border-t border-[#e6e8ec]">
            <p class="text-lg font-semibold mb-2">Question {{ selectedIndex + 1 }}</p>
            <p class="font-semibold" id="question">
                <span v-for="(item, index) in handleQuestionWithInput(selectedQuestion?.question)" :key="'div' + selectedQuestion?.id  + index">
                    <span v-if="item !== '#'" :key="'span' + index">{{ item }}</span>
                    <input v-else type="text"
                            @input="(event) => handleAnswerInput(event, selectedQuestion, index)"
                            v-model="inputAnswerValues[`${index}${selectedQuestion?.id}`]"
                            class="
                                mx-2
                                text
                                border
                                border-[#e6e8ec]
                                outline-none
                                rounded-md
                                w-[43px]
                                lg:w-[75px]
                                px-2
                                py-1
                            " 
                            :key="'input' + index"
                            :id="'input' + selectedQuestion?.id + index"
                            />
                </span>
            </p>
        </div>
        <div class="flex-grow"  v-show="selectedQuestion?.type == 1">
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
    props: ["questions", "skill", "onSubmit", "value"],
    data() {
        return {
            selectedIndex: 0,
            selectedQuestion: this.questions?.[0],
            selectedAnswerId: 0,
            selectedAnswers: {},
            correctAnswers: {},
            questionCount: 0,
            questionDone: {},
            correctInputAnswers: {},
            inputAnswerValues: {},
            inputAnswersByQuestion: {},
            inputAnswers: {},
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
            const rightAnswer = this.selectedQuestion.right_answers.answer_id;

            if(answerId) {
                this.$set(this.selectedAnswers, questionId, answerId);
                if (answerId == rightAnswer) {
                    this.correctAnswers[questionId] = true;
                } else {
                    this.correctAnswers[questionId] = false;
                }
            }
            this.saveResult();
            this.questionDone[questionId] = true;
            this.isQuestionAnswered(answerId, questionId)
        },
        handleAnswerInput(event, question, elementIndex) {
            // get index of input
            const inputIndex = this.findCollectionIndex(document.getElementById('question').getElementsByTagName('input'), event.target.id)
            const answerId = question.answers[inputIndex].answer_id;
            const rightAnswer = question.answers[inputIndex].text.toLowerCase().trim();
            const inputText = event.target.value ? event.target.value.toLowerCase().trim() : '';
            // store value of each input
            this.$set(this.inputAnswerValues, `${elementIndex}${question.id}`, event.target.value)
            
            if(rightAnswer == inputText) {
                this.correctInputAnswers[answerId] = true;
            } else {
                this.correctInputAnswers[answerId] = false;
            }
            if(event.target.value || event.target.value != '' ) {
                this.questionDone[question.id] = true;
            } else {
                this.questionDone[question.id] = false;
            }
            this.saveResult();
        },
        findCollectionIndex(collectionsArray, targetId) {
            for (let i = 0; i < collectionsArray.length; i++) {
                if (collectionsArray[i].id === targetId) {
                    return i;
                }
            }
            return -1;
        },
        handleQuestionWithInput(question) {
            if (!question?.includes("#")) return [question];
            const executed = question.split(/(#)/)
            return executed;
        },
        isQuestionAnswered(answerId, questionId) {
            return this.selectedAnswers[questionId] == answerId;
        },
        saveResult() {
            const correctAnswers = Object.values(this.correctAnswers).filter(val => val === true).length;
            const correctInputAnswers = Object.values(this.correctInputAnswers).filter(val => val === true).length;

            const type = `result_${this.skill}`;
            const result = `${correctAnswers + correctInputAnswers}/${this.questionCount}`;
            localStorage.setItem(type, result);
        },
    },
    watch: {
        questions(newQuestions) {
            console.log('newQuestions', newQuestions);
            if (newQuestions && newQuestions.length) {
                // reset data
                this.selectedAnswers = {};
                this.correctAnswers = {};
                this.selectedIndex = 0;

                this.selectedQuestion = newQuestions[this.selectedIndex];
                newQuestions.forEach(question => {
                    if(question.type == 2) {
                        this.questionCount += question.answers.length;
                    } else {
                        this.questionCount += 1
                    }
                })
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