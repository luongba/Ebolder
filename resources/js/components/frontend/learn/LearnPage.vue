<template>
    <div class="wrapper">
        <transition name="fade">
            <div class="w-full h-full relative z-10" v-show="show">
                <div class="absolute w-[70%] bg-box-lesson rounded-md p-4">
                    <span
                        class="absolute right-[5px] top-[5px] text-[20px] cursor-pointer text-[#fff]"
                        @click="dongMoPopup()"
                    >
                        <i class="lnr-cross"></i>
                    </span>
                    <h2 class="text-[26px] text-center text-white uppercase">
                        Danh sách bài học
                    </h2>
                    <div
                        data-v-61751496=""
                        class="w-full border relative mt-2 mb-4"
                    ></div>
                    <div
                        class="grid grid-cols-2 sm:grid-cols-4 mt-4"
                        v-if="listLesson.length > 0"
                    >
                        <div
                            class="p-3 border text-[#fff] text-[18px] leading-[1] hover:bg-white hover:text-[#000] rounded-sm mx-2 text-center font-thin cursor-pointer"
                            @click="openLesson(itemLesson.id)"
                            v-for="itemLesson in listLesson"
                            :key="itemLesson.id"
                        >
                            {{ itemLesson.name }}
                        </div>
                    </div>
                    <div
                        v-else
                        class="p-3 text-[#fff] text-[18px] leading-[1] mx-2 text-center font-thin"
                    >
                        Không có bài học nào
                    </div>
                </div>
            </div>
        </transition>
        <div id="background-wrap">
            <!-- <div class="x1">
                <div class="cloud"></div>
            </div>

            <div class="x2">
                <div class="cloud"></div>
            </div>

            <div class="x3">
                <div class="cloud"></div>
            </div>

            <div class="x4">
                <div class="cloud"></div>
            </div>

            <div class="x5">
                <div class="cloud"></div>
            </div> -->
            <div class="cloud-box px-2" id="cloud-box" v-show="!show">
                <div
                    class="box"
                    :id="`cloud-${listLevel.length - index}`"
                    v-for="(item, index) in listLevel"
                    :key="index"
                >
                    <div class="box-inner">
                        <div class="box-filter"></div>
                        <div class="box-content">
                            <h2 class="title">{{ item.name }}</h2>
                            <div>
                                <div class="w-full border relative mt-2 mb-4"></div>
                                <div class="flex justify-center flex-col items-center">
                                    <div class="mt-2">
                                        <el-tooltip
                                            class="item"
                                            effect="dark"
                                            content="Học"
                                            placement="right"
                                        >
                                            <div
                                                class="p-3 border text-[#fff] text-[20px] leading-[1] hover:bg-white hover:text-[#000] rounded-sm"
                                                @click="openListLesson(item.id)"
                                            >
                                                <i class="fa-solid fa-graduation-cap"></i>
                                            </div>
                                        </el-tooltip>
                                    </div>
                                    <div class="flex justify-center mt-4">
                                        <el-tooltip
                                            class="item"
                                            effect="dark"
                                            content="Nghe"
                                            placement="bottom"
                                        >
                                            <div
                                                v-if="item.listening_id != null"
                                                class="p-3 border text-[#fff] text-[20px] leading-[1] hover:bg-white hover:text-[#000] rounded-sm mx-2 exam"
                                                :class="
                                                    findLevel(item.id) &&
                                                    findLevel(item.id).is_done_listen &&
                                                    findLevel(item.id).is_done_listen == 1
                                                        ? 'active'
                                                        : ''
                                                "
                                                @click="openExamPage('listening', item)"
                                            >
                                                <i class="fa-solid fa-ear-listen"></i>
                                            </div>
                                        </el-tooltip>
                                        <el-tooltip
                                            class="item"
                                            effect="dark"
                                            content="Đọc"
                                            placement="bottom"
                                        >
                                            <div
                                                v-if="item.reading_id != null"
                                                class="p-3 border text-[#fff] text-[20px] leading-[1] hover:bg-white hover:text-[#000] rounded-sm mx-2 exam"
                                                :class="
                                                    findLevel(item.id) &&
                                                    findLevel(item.id).is_done_read &&
                                                    findLevel(item.id).is_done_read == 1
                                                        ? 'active'
                                                        : ''
                                                "
                                                @click="openExamPage('reading', item)"
                                            >
                                                <i
                                                    class="fa-solid fa-book-open-reader"
                                                ></i>
                                            </div>
                                        </el-tooltip>
                                        <el-tooltip
                                            class="item"
                                            effect="dark"
                                            content="Từ vựng"
                                            placement="bottom"
                                        >
                                            <div
                                                v-if="item.vocabulary_id != null"
                                                class="p-3 border text-[#fff] text-[20px] leading-[1] hover:bg-white hover:text-[#000] rounded-sm mx-2 exam"
                                                :class="
                                                    findLevel(item.id) &&
                                                    findLevel(item.id)
                                                        .is_done_vocabulary &&
                                                    findLevel(item.id)
                                                        .is_done_vocabulary == 1
                                                        ? 'active'
                                                        : ''
                                                "
                                                @click="openExamPage('vocabulary', item)"
                                            >
                                                <i class="fa-solid fa-spell-check"></i>
                                            </div>
                                        </el-tooltip>
                                        <el-tooltip
                                            class="item"
                                            effect="dark"
                                            content="Ngữ pháp"
                                            placement="bottom"
                                        >
                                            <div
                                                v-if="item.grammar_id != null"
                                                class="p-3 border text-[#fff] text-[20px] leading-[1] hover:bg-white hover:text-[#000] rounded-sm mx-2 exam"
                                                :class="
                                                    findLevel(item.id) &&
                                                    findLevel(item.id).is_done_grammar &&
                                                    findLevel(item.id).is_done_grammar ==
                                                        1
                                                        ? 'active'
                                                        : ''
                                                "
                                                @click="openExamPage('grammar', item)"
                                            >
                                                <i class="fa-solid fa-gears"></i>
                                            </div>
                                        </el-tooltip>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="big-cloud">
                    <h2 class="title" id="cloud-3">Level 3</h2>
                    <div class="clound-children"></div>
                </div>
                <div class="big-cloud" id="cloud-2">
                    <h2 class="title">Level 2</h2>
                    <div class="clound-children"></div>
                </div>
                <div class="big-cloud" id="cloud-1">
                    <h2 class="title">Level 1</h2>
                    <div class="clound-children"></div>
                </div> -->
            </div>
        </div>
        <div class="absolute bottom-[5%] right-[5%] z-10" v-show="!show">
            <div class="mb-4">
                <el-button
                    :disabled="!(level < listLevel.length)"
                    icon="el-icon-arrow-up"
                    circle
                    @click="cloudUp"
                ></el-button>
            </div>
            <div>
                <el-button
                    :disabled="!(level > 1)"
                    icon="el-icon-arrow-down"
                    circle
                    @click="cloudDown"
                ></el-button>
            </div>
        </div>
    </div>
</template>
<script>
import baseRequest from "../../../utils/baseRequest";
import "./learn.css";
export default {
    data() {
        return {
            level: 1,
            show: false,
            listLevel: [],
            listLesson: [],
            levelCountPassed: 1,
            examResult: [],
        };
    },
    methods: {
        cloudUp() {
            if (this.level < this.listLevel.length) {
                this.level++;
                this.scrollToCloud();
            }
            return;
        },
        cloudDown() {
            if (this.level > 1) {
                this.level--;
                this.scrollToCloud();
            }
            return;
        },
        scrollToCloud() {
            let cloud = document.getElementById(`cloud-${this.level}`);
            cloud.scrollIntoView({
                behavior: "smooth",
                block: "center",
                inline: "center",
            });
        },
        dongMoPopup() {
            this.show = !this.show;
        },
        openListLesson(id) {
            this.show = true;
            this.listLesson = this.listLevel.find((item) => item.id === id).lessons;
        },
        async getAllLevel() {
            try {
                let rs = await baseRequest.get(`/admin/get-all-level`);
                if (rs.data.status == 200) {
                    this.listLevel = rs.data.data.map((item) => ({
                        id: item.id,
                        name: item.name,
                        listening_id: item.listening_id,
                        reading_id: item.reading_id,
                        vocabulary_id: item.vocabulary_id,
                        grammar_id: item.grammar_id,
                        lessons: item.learn || [],
                    }));

                    this.listLevel = this.listLevel
                        .filter((item, index) => index < this.levelCountPassed)
                        .reverse();
                    this.examResult = rs.data.examResult || [];
                }
            } catch (e) {
                console.log(e);
            }
        },
        async checkPassedLevel() {
            try {
                let rs = await baseRequest.get(`/admin/check-passed-level`);
                if (rs.data.status == 200) {
                    this.levelCountPassed = rs.data.data;
                    this.level = rs.data.data;
                }
            } catch (e) {
                console.log(e);
            }
        },
        openExamPage(type, item) {
            switch (type) {
                case "reading":
                    window.location.href = `${$Api.baseUrl}/english-level-test/Reading?testId=${item.reading_id}?levelId=${item.id}`;
                    break;
                case "listening":
                    window.location.href = `${$Api.baseUrl}/english-level-test/Listening?testId=${item.listening_id}?levelId=${item.id}`;
                    break;
                case "vocabulary":
                    window.location.href = `${$Api.baseUrl}/english-level-test/Vocabulary?testId=${item.vocabulary_id}?levelId=${item.id}`;
                    break;
                case "grammar":
                    window.location.href = `${$Api.baseUrl}/english-level-test/Grammar?testId=${item.grammar_id}?levelId=${item.id}`;
                    break;
                default:
                    return;
            }
        },
        openLesson(id) {
            window.location.href = `${$Api.baseUrl}/lesson/${id}`;
        },
        findLevel(id) {
            return this.examResult.find((item) => item.level_id === id);
        },
    },
    async created() {
        await this.checkPassedLevel();
        this.getAllLevel();
    },
    mounted() {
        setTimeout(() => {
            this.scrollToCloud();
        }, 1000);
    },
};
</script>
<style scoped>
.title {
    font-size: 40px;
    text-align: center;
    z-index: 3;
    color: #fff;
}
::-webkit-scrollbar {
    display: none;
}
.box-content {
    width: 100%;
    position: relative;
    padding: 40px;
    z-index: 6;
    background: linear-gradient(
        96.6deg,
        rgba(0, 115, 121, 0.112) 11.23%,
        rgba(0, 95, 100, 0) 115.9%
    );

    box-sizing: border-box;
}
.box-filter {
    position: absolute;
    inset: 0;
    filter: blur(8px);
    -webkit-filter: blur(8px);
    z-index: 5;
}
.box-disable {
    cursor: not-allowed;
    position: relative;
}
.box-disable::before {
    content: "";
    position: absolute;
    top: 50%;
    left: 0;
    width: 100%;
    height: 2px;
    background: #fff;
    transform: rotate(45deg);
}
.box-disable::after {
    content: "";
    position: absolute;
    top: 50%;
    left: 0;
    width: 100%;
    height: 2px;
    background: #fff;
    transform: rotate(-45deg);
}

.box-disable:hover {
    background: transparent;
    color: #fff;
}

.bg-box-lesson {
    width: 80%;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
    /* z-index: 6; */
    background: linear-gradient(
        96.6deg,
        rgba(0, 115, 121, 0.112) 11.23%,
        rgba(0, 95, 100, 0) 115.9%
    );
    box-sizing: border-box;
}
.bg-blur {
    background: rgba(0, 0, 0, 0.3);
}
.fade-enter-active,
.fade-leave-active {
    transition: opacity 0.2s;
}
.fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
    opacity: 0;
}

.exam.active {
    background: green;
    color: #fff;
}
</style>
