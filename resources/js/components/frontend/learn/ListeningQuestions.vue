<template>
    <div class="bg-white h-full p-3 flex flex-column md:rounded">
        <div class="font-bold text-xl mb-4"> Topics</div>
        <div class="flex flex-row flex-wrap mb-3 cursor-pointer">
            <div v-for="(item, index) in this.topics" :key="item.id"
                class="rounded-full w-7 h-7 sm:w-10 sm:h-10 me-[11px] mb-[11px] sm:mb-[13px] sm:me-[13px] flex items-center justify-center font-semibold text-sm"
                @click="handleSelectTopic(index)"
                :class="{ 'bg-[#2162FF] text-white': selectedTopicIndex == index, 'bg-[#E6E8EC]': selectedTopicIndex != index }">
                {{ index + 1 }}
            </div>
        </div>
        <div class="bg-blur-f mb-4">
            <audio id="audio-preview" class="w-full bg-transparent" controls disabled hidden>
                <source :src="`${baseURl}/upload/audio/${this.selectedTopic?.audio}`"
                    type="audio/mpeg" />
            </audio>
            <div class="controls bg-[#E6E8EC] rounded px-3">
                <button class="player-button">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="#FFF">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z"
                            clip-rule="evenodd" />
                    </svg>
                </button>
                <input type="range" class="timeline" max="100" value="0" disabled />
                <button class="sound-button">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="#FFF">
                        <path fill-rule="evenodd"
                            d="M9.383 3.076A1 1 0 0110 4v12a1 1 0 01-1.707.707L4.586 13H2a1 1 0 01-1-1V8a1 1 0 011-1h2.586l3.707-3.707a1 1 0 011.09-.217zM14.657 2.929a1 1 0 011.414 0A9.972 9.972 0 0119 10a9.972 9.972 0 01-2.929 7.071 1 1 0 01-1.414-1.414A7.971 7.971 0 0017 10c0-2.21-.894-4.208-2.343-5.657a1 1 0 010-1.414zm-2.829 2.828a1 1 0 011.415 0A5.983 5.983 0 0115 10a5.984 5.984 0 01-1.757 4.243 1 1 0 01-1.415-1.415A3.984 3.984 0 0013 10a3.983 3.983 0 00-1.172-2.828 1 1 0 010-1.415z"
                            clip-rule="evenodd" />
                    </svg>
                </button>
            </div>
        </div>
        <div class="font-bold text-xl mb-4"> Questions</div>
        <div v-show="this.questions?.length > 0">
            <div class="flex flex-row flex-wrap mb-4 cursor-pointer">
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
                        <input v-else type="text" class="
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
            <div class="flex-grow">
                <div v-for="(answer, index) in selectedQuestion?.answer_listening" :key="index"
                    class="rounded-[8px] border-2 p-3 mb-3"
                    :class="{ 'border-[#2162FF]': isQuestionAnswered(answer?.id, selectedQuestion?.id) }"
                    @click="handleSelectAnswer(answer?.id, selectedQuestion?.id)">
                    <input type="radio" :id="`test${answer?.id}`" :value="answer?.id"
                        :checked="isQuestionAnswered(answer?.id, selectedQuestion?.id)" />
                    <label class="text-lg font-semibold ml-1">
                        {{ convertToCharacter(index) }}
                    </label>
                    <p class="font-light">{{ answer?.text }}</p>
                </div>
            </div>
            <div class="w-full flex flex-row mt-4">
                <div v-show="selectedTopicIndex <= this.topics?.length - 1 && selectedTopicIndex > 0" class="button-back"
                    @click="handleSelectTopic(selectedTopicIndex - 1)">
                    <img :src="arrowLeft" />
                    Back
                </div>
                <div v-show="selectedTopicIndex < this.topics?.length - 1" class="button-next"
                    @click="handleSelectTopic(selectedTopicIndex + 1)">
                    Next
                    <img :src="arrowRight" />
                </div>
                <div v-show="selectedTopicIndex == this.topics?.length - 1" class="button-next" @click="submit">
                    Finish
                    <img :src="arrowRight" />
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import baseRequest from "../../../utils/baseRequest";

export default {
    props: ["topics", "query", "onSubmit"],
    data() {
        return {
            selectedIndex: 0,
            selectedTopicIndex: 0,
            selectedQuestion: this.questions?.[0],
            selectedAnswerId: 0,
            selectedAnswers: {},
            selectedTopic: this.topics?.[0],
            questions: null,
            arrowLeft: require('../../../../../public/images/learn/arrow-left.svg'),
            arrowRight: require('../../../../../public/images/learn/arrow-right.svg'),
            baseURl: $Api.baseUrl,
            correctAnswers: {},
            questionCount: 0
        }
    },
    methods: {
        async handleSelectTopic(index) {
            this.selectedTopicIndex = index;
            this.selectedTopic = this.topics?.[this.selectedTopicIndex];
            await this.getAudioDetail(this.topics?.[this.selectedTopicIndex]?.id);
        },
        handleSelectQuestion(index) {
            this.selectedIndex = index;
            this.selectedQuestion = this.questions?.[this.selectedIndex];
        },
        convertToCharacter(number) {
            return String.fromCharCode(65 + number)
        },
        handleSelectAnswer(answerId, questionId) {
            const rightAnswer = this.selectedQuestion.right_answers.answer_id;
            this.selectedAnswerId = answerId;
            if (answerId) {
                this.$set(this.selectedAnswers, questionId, answerId);
                if (answerId == rightAnswer) {
                    this.correctAnswers[questionId] = true;
                } else {
                    this.correctAnswers[questionId] = false;
                }
            }

            this.isQuestionAnswered(answerId, questionId)
        },
        handleQuestionWithInput(question) {
            if (!question?.includes("#")) return [question];
            const executed = question.split(/(#)/)
            return executed;
        },
        isQuestionAnswered(answerId, questionId) {
            return this.selectedAnswers[questionId] == answerId;
        },
        async getAudioDetail(audioId) {
            const loading = this.$loading({
                lock: true,
                text: "Loading",
                spinner: "el-icon-loading",
                background: "rgba(0, 0, 0, 0.7)",
            });
            try {
                let rs = await baseRequest.get(`/admin/get-detail-audio-question-listening/${audioId}`);
                if (rs.data.status == 200) {
                    const data = rs.data.data;
                    if (data) {
                        this.questions = data?.question_listening;
                    }
                }
            } catch (e) {
                console.log(e);
            } finally {
                loading.close();
            }
        },
        async submit() {
            const correctAnswers = Object.values(this.correctAnswers).filter(val => val === true).length;
            this.onSubmit(correctAnswers, this.questionCount);
        },
        customAudio() {
            const playerButton = document.querySelector(".player-button"),
                audio = document.querySelector("audio"),
                playIcon = `
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="#FFF">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd" />
                </svg>
                    `,
                pauseIcon = `
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="#FFF">
                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zM7 8a1 1 0 012 0v4a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v4a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                </svg>
                    `;
            function toggleAudio() {
                console.log(audio);
                if (audio.paused) {
                    audio.play();
                    playerButton.innerHTML = pauseIcon;
                } else {
                    audio.pause();
                    playerButton.innerHTML = playIcon;
                }
            }
            playerButton.addEventListener("click", toggleAudio);
            function audioEnded() {
                playerButton.innerHTML = playIcon;
            }

            audio.onended = audioEnded;
            const timeline = document.querySelector(".timeline");
            function changeTimelinePosition() {
                const percentagePosition = (100 * audio.currentTime) / audio.duration;
                timeline.style.backgroundSize = `${percentagePosition}% 100%`;
                timeline.value = percentagePosition;
            }

            audio.ontimeupdate = changeTimelinePosition;
            function changeSeek() {
                const time = (timeline.value * audio.duration) / 100;
                audio.currentTime = time;
            }

            timeline.addEventListener("change", changeSeek);
            const soundButton = document.querySelector(".sound-button"),
                soundIcon = `
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="#FFF">
                <path fill-rule="evenodd" d="M9.383 3.076A1 1 0 0110 4v12a1 1 0 01-1.707.707L4.586 13H2a1 1 0 01-1-1V8a1 1 0 011-1h2.586l3.707-3.707a1 1 0 011.09-.217zM14.657 2.929a1 1 0 011.414 0A9.972 9.972 0 0119 10a9.972 9.972 0 01-2.929 7.071 1 1 0 01-1.414-1.414A7.971 7.971 0 0017 10c0-2.21-.894-4.208-2.343-5.657a1 1 0 010-1.414zm-2.829 2.828a1 1 0 011.415 0A5.983 5.983 0 0115 10a5.984 5.984 0 01-1.757 4.243 1 1 0 01-1.415-1.415A3.984 3.984 0 0013 10a3.983 3.983 0 00-1.172-2.828 1 1 0 010-1.415z" clip-rule="evenodd" />
                </svg>`,
                muteIcon = `
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="#FFF">
                <path fill-rule="evenodd" d="M9.383 3.076A1 1 0 0110 4v12a1 1 0 01-1.707.707L4.586 13H2a1 1 0 01-1-1V8a1 1 0 011-1h2.586l3.707-3.707a1 1 0 011.09-.217zM12.293 7.293a1 1 0 011.414 0L15 8.586l1.293-1.293a1 1 0 111.414 1.414L16.414 10l1.293 1.293a1 1 0 01-1.414 1.414L15 11.414l-1.293 1.293a1 1 0 01-1.414-1.414L13.586 10l-1.293-1.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>`;
            function toggleSound() {
                audio.muted = !audio.muted;
                soundButton.innerHTML = audio.muted ? muteIcon : soundIcon;
            }

            soundButton.addEventListener("click", toggleSound);
        }
    },
    mounted() {
        this.customAudio();
    },
    watch: {
        topics(newTopics) {
            // reset data
            this.selectedAnswers = {};
            this.selectedIndex = 0;
            this.selectedTopicIndex = 0;
            this.questions = {}
            if (newTopics && newTopics.length) {
                this.newTopics && this.newTopics.forEach(topic => {
                    this.questionCount += topic.question_listening.length;
                })
                this.selectedTopic = newTopics[this.selectedTopicIndex];
            }
        },
        questions(newQuestions) {
            this.selectedIndex = 0;
            this.selectedQuestion = this.questions[this.selectedIndex];
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

.player-button {
    background-color: transparent;
    border: 0;
    width: 3em;
    height: 3em;
    cursor: pointer;
    padding: 0;
}

.sound-button {
    background-color: transparent;
    border: 0;
    width: 2em;
    height: 2em;
    cursor: pointer;
    padding: 0;
}

.timeline {
    -webkit-appearance: none;
    width: calc(100% - 3em);
    height: 0.5em;
    background-color: #e5e5e5;
    border-radius: 5px;
    background-size: 0% 100%;
    background-image: linear-gradient(#5b5ea6, #5b5ea6);
    background-repeat: no-repeat;
    margin: 0 16px;
}

.timeline::-webkit-slider-thumb {
    -webkit-appearance: none;
    width: 1em;
    height: 1em;
    border-radius: 50%;
    cursor: pointer;
    opacity: 0;
    transition: all 0.1s;
    background-color: #5b5ea6;
}

.timeline::-webkit-slider-runnable-track {
    -webkit-appearance: none;
    box-shadow: none;
    border: none;
    background: transparent;
}

.timeline {
    width: calc(100% - (3em + 2em + 0.5em));
    margin-right: 0.5em;
}

.controls {
    display: flex;
    flex-direction: row;
    align-items: center;
    width: 100%;
}
</style>