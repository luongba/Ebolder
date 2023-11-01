<template>
    <div class="wrapper h-screen flex flex-column">
        <div class="sticky inset-x-0 top-0 bg-white z-50">
            <main-header-component :user="user" :breadcrumb="breadcrumb" :showTime="true" :onFinish="submit"/>
        </div>
        <div class="w-full h-full sm:overflow-hidden overflow-y-auto content">
            <button @click="toggle()" :class="[open ? 'hidden' : 'block']"
                class="focus:outline-none transition-color duration-700 sidebarButton absolute">
                <span class="block transform origin-center font-bold">
                    <img src="/images/learn/right.svg" alt="" />
                </span>
            </button>
            <div class="flex max-h-full sidebar" :class="[!open ? 'hidden' : ' w-[350px] block']" >
                <!-- Sidebar -->
                <div class="flex w-full">
                    <!-- Sidebar Content -->
                    <!-- :onGetLessonDetail="getLessonDetail"  -->
                    <div ref="content" class="bg-white listLesson" :class="[open ? 'w-[350px]' : 'hidden w-0']">
                        <ExamDetailSkills v-model="open" :onGetExamBySkill="handleSelectedSkill" />
                        <slot></slot>
                    </div>
                </div>
            </div>
            <div class="main">
                <div class="rounded overflow-x-auto lesson flex-grow">
                    <ExamDetailContent :content="examBySkill" />
                </div>
                <div class="w-[350px] rounded overflow-auto questions">
                    <ExamDetailListeningQuestions 
                        ref="listeningQuestions" 
                        :topics="questions"
                        v-if="this.skill == 'listening'" 
                        :skill="skill" 
                        />
                    <ExamDetailQuestions :questions="questions" :skill="skill" v-if="this.skill != 'listening'"/>
                </div>
            </div>
            <VueCountdown :auto-start="true" :time="timeWork" @progress="handleCountdownProgress">
                <template slot-scope="props"
                    >{{ props.minutes }}:{{ props.seconds <= 9 ? `0${props.seconds}` : props.seconds }} </template
                >
            </VueCountdown>
        </div>
    </div>
</template>

<script>
import baseRequest from "../../../utils/baseRequest";
import ExamDetailContent from "./ExamDetailContent.vue";
import ExamDetailQuestions from './ExamDetailQuestions.vue';
import ExamDetailListeningQuestions from './ExamDetailListeningQuestions.vue';
import ExamDetailSkills from "./ExamDetailSkills.vue";
import ExamIcon from '../../../../../public/images/header/exam.svg';
import VueCountdown from "@chenfengyuan/vue-countdown";

export default {
    props: ["param", "user"],
    components: {
        ExamDetailContent,
        ExamDetailQuestions,
        ExamDetailSkills,
        ExamDetailListeningQuestions,
        VueCountdown
    },
    data() {
        return {
            open: null,
            lessonContent: null,
            lessonQuestions: null,
            data: null,
            examBySkill: null,
            questions: null,
            skill: null,
            breadcrumb: [
                { label: 'Exam', icon: ExamIcon },
            ],
            timeWork: 45 * 60 * 1000,
            timerun: 0,
            result: null,
            content: null,
            reading: {},
            speaking: {},
            writing: {},
            listening: {},
        }
    },
    watch: {
        "open" : {
            handler(value) {
                localStorage.setItem('section-list-show', value ? 1 : 0)
            }
        }
    },
    methods: {
        toggle() {
            this.open = !this.open;
        },
        async getExamDetail() {
            const loading = this.$loading({
                lock: true,
                text: "Loading",
                spinner: "el-icon-loading",
                background: "rgba(0, 0, 0, 0.7)",
            });
            try {
                let rs = await baseRequest.get(`/admin/get-detail-exam/${this.param}`);
                if (rs.data.status == 200) {
                    const data = rs.data.data;
                    this.breadcrumb = this.getBreadcrumb(data.name);

                    if (data) {
                        this.data = {
                            reading: data?.reading_id,
                            speaking: data?.speaking_id,
                            writing: data?.writing_id,
                            listening: data?.listening_id,
                        }
                    }
                }
            } catch (e) {
                console.log(e);
            } finally {
                loading.close();
            }
        },
        async getExamBySkill(skill) {
            const loading = this.$loading({
                lock: true,
                text: "Loading",
                spinner: "el-icon-loading",
                background: "rgba(0, 0, 0, 0.7)",
            });
            try {
                let rs = await baseRequest.get(`/admin/detail-topic-${skill}/${this.data[skill]}`);
                if (rs.data.status == 200) {
                    const data = rs.data.data;
                    if(data) {
                        const formatedData = {
                            name: data.name,
                            description: data.description || data.content,
                            listening: data.topic_audio_listen,
                            speaking: data.question_speak,
                            reading: data.question_reading,
                            writing: data.question_lesson
                        };
                        return formatedData;
                    }
                        return null;
                }
            } catch (e) {
                console.log(e);
            } finally {
                loading.close();
            }
        },
        handleSelectedSkill(skill) {
            this.skill = skill.toLowerCase();

            if(skill == 'reading') {
                const _data = JSON.parse(JSON.stringify(this.reading))
                _data && _data?.['reading']?.forEach(question => {
                    question.answers = question.answer_reading;
                    delete question.answer_reading;
                    question.right_answers = question.right_answer_reading;
                    delete question.right_answer_reading;
                })
                this.questions = _data['reading'];
            } else if (skill == 'listening') {
                this.questions = this.listening['listening'];
            } else if (skill == 'speaking') {
                this.questions = this.speaking['speaking'];
            } else if (skill == 'writing') {
                this.questions = this.writing['writing'];
            }
            this.examBySkill = this[skill];
        },
        getBreadcrumb(label) {
            return [
                ...this.breadcrumb, { label: label }
            ]
        },
        async submit() {
            
            const result_reading = localStorage.getItem('result_reading')
            const result_listening = localStorage.getItem('result_listening')
            const result_speaking = localStorage.getItem('result_speaking')
            const result_writing = localStorage.getItem('result_writing')
            
            const requestHistoryFinalParams = {
                exam_id: this.param,
                result_reading: result_reading,
                result_speaking: result_speaking,
                result_listening: result_listening,
                result_writing: result_writing,
                user_id: this.user.id,
                time: this.timerun,
                status: 'create',
            }
            const loading = this.$loading({
                lock: true,
                text: "Loading",
                spinner: "el-icon-loading",
                background: "rgba(0, 0, 0, 0.7)",
            });
            try {
                const rs = await baseRequest.post(`/admin/save-exam-history-final`, requestHistoryFinalParams);
                if (rs.data.status == 200) {
                    //todo
                }
            } catch (e) {
                console.log(e);
            } finally {
                loading.close();
            }
        },
        handleCountdownProgress(data) {
            this.timerun = this.timeWork - data.totalMilliseconds + 1000;
            if (this.timerun === this.timeWork) {
                this.finishExam();
            }
        },
    },
    async created() {
        if(this.user) {
            await this.getExamDetail();
            
            // const reading =  await this.getExamBySkill('reading');
            // const listening = await this.getExamBySkill('listening');
            // const speaking = await this.getExamBySkill('speaking');
            // const writing = await this.getExamBySkill('writing');

            // this.reading =  JSON.parse(JSON.stringify(reading))
            // this.listening = JSON.parse(JSON.stringify(listening))
            // this.speaking = JSON.parse(JSON.stringify(speaking))
            // this.writing = JSON.parse(JSON.stringify(writing))
        }
    },
    async mounted() {
        let x = await localStorage.getItem('section-list-show')
        this.open = Number(x)
    }
}
</script>

<style scoped>
@media only screen and (min-width: 1280px) {
    .content {
        display: flex;
    }

    .sidebar {}

    .lesson {
        flex-grow: 1;
        margin: 0.75rem 2.25rem;
    }

    .questions {
        width: 350px;
        margin: 0.75rem 0.75rem 0.75rem 0;
    }

    .sidebarButton {
        border-radius: 0px 0px 24px 0px;
        border-right: 2px solid var(--color-base-200, #F4F5F6);
        background: var(--color-white-100, #FFF);
        box-shadow: 0px 4px 20px 0px rgba(0, 0, 0, 0.15);
        padding: 0.75rem;
        height: fit-content;
    }

    .main {
        width: 100%;
        display: flex;
    }
}

@media only screen and (max-width: 1279px) and (min-width: 901px) {
    .content {
        display: flex;
    }

    .sidebarButton {
        border-radius: 0px 0px 24px 0px;
        border-right: 2px solid var(--color-base-200, #F4F5F6);
        background: var(--color-white-100, #FFF);
        box-shadow: 0px 4px 20px 0px rgba(0, 0, 0, 0.15);
        height: 96px;
    }

    .main {
        width: 100%;
        display: flex;
        flex-direction: row;
        margin: 12px;
    }

    .sidebar {
        height: 100%;
        position: absolute;
    }

    .lesson {
        margin-right: 12px;
    }
}

@media only screen and (max-width: 900px) {
    .content {
        display: block;
        margin-top: 2px;
    }

    .lesson {
        width: 100%;
        flex-grow: 1;
        margin: 0;
        border-radius: unset !important;
    }

    .questions {
        width: 100%;
        border-radius: unset !important;
    }

    .sidebar {
        height: 100%;
        position: absolute;
    }

    .sidebarButton {
        border-radius: 0px 0px 24px 0px;
        border-right: 2px solid var(--color-base-200, #F4F5F6);
        background: var(--color-white-100, #FFF);
        box-shadow: 0px 4px 20px 0px rgba(0, 0, 0, 0.15);
        height: 96px;
    }

    .main {
        display: block;
    }
}
</style>