<template>
    <div class="wrapper h-screen">
        <div class="sticky inset-x-0 top-0 bg-white z-50">
            <main-header-component :user="user" :breadcrumb="breadcrumb" :showTime="true"/>
        </div>
        <div class="w-full h-full overflow-hidden content">
            <div class="flex max-h-full w-[350px] overflow-x-auto sidebar">
                <!-- Sidebar -->
                <div class="flex w-full">
                    <button @click="toggle()" :class="[open ? 'hidden' : 'block']"
                        class="focus:outline-none transition-color duration-700 sidebarButton">
                        <span class="block transform origin-center font-bold">
                            <img src="/images/learn/right.svg" alt="" />
                        </span>
                    </button>
                    <!-- Sidebar Content -->
                    <!-- :onGetLessonDetail="getLessonDetail"  -->
                    <div ref="content" class="bg-white overflow-hidden listLesson" :class="[open ? 'w-[350px]' : 'w-0']">
                        <ExamDetailSkills v-model="open" :onGetExamBySkill="getExamBySkill"/>
                        <slot></slot>
                    </div>
                </div>
            </div>
            <div class="main">
                <div class="rounded overflow-x-auto lesson">
                    <ExamDetailContent :content="examBySkill"/>
                </div>
                <div class="w-[350px] rounded  questions">
                    <ExamDetailQuestions :questions="questions" :skill="skill"/>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import baseRequest from "../../../utils/baseRequest";
import ExamDetailContent from "./ExamDetailContent.vue";
import ExamDetailQuestions from './ExamDetailQuestions.vue';
import ExamDetailSkills from './ExamDetailSkills.vue';
import ExamIcon from '../../../../../public/images/header/exam.svg';

export default {
    props: ["param", "user"],
    components: {
        ExamDetailContent,
        ExamDetailQuestions,
        ExamDetailSkills,

    },
    data() {
        return {
            open: true,
            lessonContent: null,
            lessonQuestions: null,
            data: null,
            examBySkill: null,
            questions: null,
            skill: null,
            breadcrumb: [
                {label: 'Exam', icon: ExamIcon},
            ]
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
                            speak: data?.speaking_id,
                            lesson: data?.writing_id,
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
            let s;
            if(skill == 'Writing') {
                s = 'lesson'
            } else if (skill == 'Speaking') {
                s = 'speak'
            } else {s = skill.toLowerCase()}

            this.skill = s;
            
            const loading = this.$loading({
                lock: true,
                text: "Loading",
                spinner: "el-icon-loading",
                background: "rgba(0, 0, 0, 0.7)",
            });
            try {
                let rs = await baseRequest.get(`/admin/detail-topic-${s}/${this.data[s]}`);
                if (rs.data.status == 200) {
                    const data = rs.data.data;
                    if (data) {
                        this.examBySkill = data;
                        this.questions = data[`question_${s}`]
                    }
                }
            } catch (e) {
                console.log(e);
            } finally {
                loading.close();
            }
            console.log(skill);
        },
        getBreadcrumb(label) {
            return [
                ...this.breadcrumb, {label: label}
            ]
        }
    },
    async created() {
        await this.getExamDetail();
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