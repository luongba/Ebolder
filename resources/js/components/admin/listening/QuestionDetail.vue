<template>
    <div class="container">
        <transition name="fade">
            <div class="w-full h-full" v-if="show">
                <div
                    class="
                        fixed
                        lg:absolute
                        top-[35px]
                        lg:top-0
                        inset-0
                        bg-blur
                        flex
                        items-center
                        justify-center
                        z-[999]
                    "
                >
                    <div
                        class="w-[95%] md:w-[70%] bg-white shadow-sm px-4 py-4"
                    >
                        <div class="py-2 relative">
                            <h1 class="font-semibold uppercase text-[14px]">
                                Create Question
                            </h1>
                            <span
                                class="
                                    absolute
                                    right-[5px]
                                    top-[5px]
                                    text-[20px]
                                    cursor-pointer
                                "
                                @click="show = !show"
                            >
                                <i class="lnr-cross"></i>
                            </span>
                        </div>
                        <div
                            class="w-full h-[500px]"
                            style="overflow-y: scroll"
                        >
                            <div
                                class="card w-full mt-3 mb-2"
                                v-for="(data, index) in dataQuestion"
                                :key="index"
                            >
                                <div
                                    class="
                                        card-header
                                        flex
                                        justify-between
                                        items-center
                                    "
                                >
                                    <span>Question {{ index + 1 }}</span>
                                    <span
                                        v-if="dataQuestion.length > 1"
                                        class="
                                            text-red-600 text-[14px]
                                            font-semibold
                                            cursor-pointer
                                        "
                                        @click="deleteQuesMore(data.id)"
                                        >Xóa</span
                                    >
                                </div>

                                <div class="card-body">
                                    <div class="w-full">
                                        <el-form
                                            ref="ruleFormData"
                                            :model="data"
                                            class="w-full"
                                        >
                                            <el-form-item
                                                prop="question"
                                                :rules="[
                                                    {
                                                        required: true,
                                                        message:
                                                            'Please enter your question',
                                                    },
                                                ]"
                                                class="w-full m-0"
                                            >
                                                <el-input
                                                    type="textarea"
                                                    placeholder="Nhập câu hỏi..."
                                                    v-model="data.question"
                                                    rows="3"
                                                ></el-input>
                                            </el-form-item>
                                            <div
                                                class="w-full mt-2"
                                                v-for="item in data.dataAns"
                                                :key="item.idAns"
                                            >
                                                <div
                                                    class="
                                                        mt-4
                                                        flex
                                                        items-start
                                                    "
                                                >
                                                    <el-form
                                                        ref="ruleFormItem"
                                                        :model="item"
                                                        :rules="rules"
                                                        class="w-full"
                                                    >
                                                        <el-form-item
                                                            prop="text"
                                                            :rules="[
                                                                {
                                                                    required: true,
                                                                    message:
                                                                        'Please enter your answer',
                                                                },
                                                            ]"
                                                            class="w-full m-0"
                                                        >
                                                            <el-input
                                                                v-model="
                                                                    item.text
                                                                "
                                                            >
                                                                <template
                                                                    slot="prepend"
                                                                    >{{
                                                                        item.alphabet
                                                                    }}</template
                                                                >
                                                            </el-input>
                                                        </el-form-item>
                                                    </el-form>

                                                    <el-button
                                                        v-if="
                                                            data.dataAns
                                                                .length > 1
                                                        "
                                                        class="ml-2"
                                                        type="danger"
                                                        icon="el-icon-delete"
                                                        @click="
                                                            deleteAnsQuestion(
                                                                data.id,
                                                                item.idAns
                                                            )
                                                        "
                                                        plain
                                                        circle
                                                    ></el-button>
                                                </div>
                                            </div>
                                            <div
                                                class="
                                                    flex
                                                    justify-between
                                                    items-start
                                                    mt-4
                                                "
                                            >
                                                <div class="leading-[40px]">
                                                    <span
                                                        class="
                                                            text-[13px]
                                                            font-semibold
                                                        "
                                                        >Level:
                                                        {{
                                                            data.level == 1
                                                                ? "Easy"
                                                                : data.level ==
                                                                  2
                                                                ? "Medium"
                                                                : "Hard"
                                                        }}</span
                                                    >
                                                    <star-rating
                                                        :star-size="20"
                                                        :animate="true"
                                                        v-model="data.level"
                                                        :show-rating="false"
                                                        :max-rating="3"
                                                    />
                                                </div>

                                                <div class="w-[180px]">
                                                    <el-form-item
                                                        :rules="[
                                                            {
                                                                required: true,
                                                                message:
                                                                    'Please select answer',
                                                                trigger: 'blur',
                                                            },
                                                        ]"
                                                        prop="answer"
                                                        class="w-full m-0"
                                                    >
                                                        <span
                                                            class="
                                                                text-[13px]
                                                                font-semibold
                                                                mr-2
                                                            "
                                                            >Anwser:</span
                                                        >
                                                        <el-select
                                                            v-model="
                                                                data.answer
                                                            "
                                                            placeholder="Select"
                                                        >
                                                            <el-option
                                                                v-for="item in data.dataAns"
                                                                :key="
                                                                    item.idAns
                                                                "
                                                                :label="
                                                                    item.alphabet
                                                                "
                                                                :value="
                                                                    item.idAns
                                                                "
                                                            >
                                                            </el-option>
                                                        </el-select>
                                                    </el-form-item>
                                                </div>
                                            </div>
                                            <div
                                                class="
                                                    mx-auto
                                                    my-4
                                                    lg:my-2
                                                    flex
                                                    justify-center
                                                "
                                            >
                                                <el-button
                                                    v-if="
                                                        data.dataAns.length <
                                                        maxAns
                                                    "
                                                    @click="
                                                        pushAnsQuestion(data.id)
                                                    "
                                                    icon="el-icon-plus"
                                                    plain
                                                ></el-button>
                                            </div>
                                        </el-form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mx-auto my-4 flex justify-between">
                            <el-button
                                @click="pushQuesMore()"
                                type="success"
                                icon="el-icon-circle-plus-outline"
                                plain
                                >More questions
                            </el-button>
                            <el-button
                                @click="createQuestionMore()"
                                type="primary"
                                plain
                                >Create
                            </el-button>
                        </div>
                    </div>
                </div>
            </div>
        </transition>
        <div class="flex items-center justify-center">
            <p
                class="
                    font-bold
                    lg:text-[30px]
                    text-[20px]
                    uppercase
                    text-center
                    w-full
                "
            >
                {{ detailAudio.name }}
            </p>
        </div>
        <p class="font-semibold text-[15px] mt-4 mb-2">Statistical</p>
        <div
            class="
                bg-white
                shadow-sm
                flex
                items-center
                justify-between
                cursor-pointer
                py-2
                px-4
                text-[14px]
                font-semibold
                flex flex-col
                items-start
            "
        >
            <div class="flex justify-between items-center w-full">
                <p>{{ levelEasy }}</p>
                <star-rating
                    :star-size="20"
                    :animate="false"
                    :show-rating="false"
                    :max-rating="1"
                    :read-only="true"
                    :rating="1"
                />
            </div>
            <div class="flex justify-between items-center w-full">
                <p>{{ levelMedium }}</p>
                <star-rating
                    :star-size="20"
                    :animate="false"
                    :show-rating="false"
                    :max-rating="2"
                    :read-only="true"
                    :rating="2"
                />
            </div>
            <div class="flex justify-between items-center w-full">
                <p>{{ levelhard }}</p>
                <star-rating
                    :star-size="20"
                    :animate="false"
                    :show-rating="false"
                    :max-rating="3"
                    :read-only="true"
                    :rating="3"
                />
            </div>

            <div class="flex justify-between items-center w-full border-t my-2">
                <p class="mt-2">
                    Total: {{ levelhard + levelMedium + levelEasy }}
                </p>
            </div>
        </div>
        <div
            class="
                w-full
                p-4
                rounded-sm
                border-dashed
                bg-white
                flex
                items-center
                justify-center
                cursor-pointer
                mt-4
            "
            style="border-width: 2px"
            @click="uploadAudio"
        >
            <div class="flex flex-col items-center">
                <i class="el-icon-upload text-[50px]"></i>
                <p class="mt-2 text-[15px] font-semibold">Click to upload</p>
            </div>
        </div>
        <input
            type="file"
            ref="fileAudio"
            @change="getChangeAudio($event)"
            hidden
        />
        <div class="flex justify-between items-center">
            <audio id="audio-preview" class="w-full" controls />
            <div class="flex-1">
                <el-button
                    v-if="isEditFile"
                    size="small"
                    type="success"
                    icon="el-icon-check"
                    circle
                    @click="saveEditAudio"
                ></el-button>
            </div>
        </div>

        <!--        <p class="font-semibold text-[15px] mt-2">Description: {{ detailAudio.description }}</p>-->
        <p class="font-semibold text-[15px] mt-4 mb-2">Questions of Audio</p>
        <div
            class="card w-full mt-3 mb-3"
            v-for="(data, index) in detailAudio.question"
            :key="index"
            ref="card"
        >
            <div class="card-header flex justify-between items-center">
                <span>Question {{ index + 1 }}</span>
                <div class="flex items-center">
                    <div class="save hidden mr-2">
                        <el-button
                            size="small"
                            type="success"
                            icon="el-icon-check"
                            @click="SaveQuestion(data.idQues, index)"
                            circle
                        ></el-button>
                    </div>
                    <div class="edit block mr-2">
                        <el-button
                            size="small"
                            type="primary"
                            icon="el-icon-edit"
                            circle
                            @click="EditQuestion(index)"
                        ></el-button>
                    </div>

                    <el-button
                        size="small"
                        type="danger"
                        icon="el-icon-delete"
                        circle
                        @click="deleteQues(data.id)"
                        v-if="dataQuestion.length > 1"
                    ></el-button>
                </div>
            </div>

            <div class="card-body hidden">
                <div class="w-full">
                    <el-form ref="ruleFormData" :model="data" class="w-full">
                        <el-form-item
                            prop="question"
                            :rules="[
                                {
                                    required: true,
                                    message: 'Please enter your question',
                                },
                            ]"
                            class="w-full m-0"
                        >
                            <el-input
                                type="textarea"
                                placeholder="Nhập câu hỏi..."
                                v-model="data.question"
                                rows="3"
                            ></el-input>
                        </el-form-item>

                        <div
                            class="w-full mt-2"
                            v-for="(item, index) in data.answers"
                            :key="item.id"
                        >
                            <div class="mt-4 flex items-center">
                                <el-form
                                    ref="ruleFormItem"
                                    :model="item"
                                    class="w-full"
                                >
                                    <el-form-item
                                        prop="text"
                                        :rules="[
                                            {
                                                required: true,
                                                message:
                                                    'Please enter your answer',
                                            },
                                        ]"
                                        class="w-full m-0"
                                    >
                                        <el-input v-model="item.text">
                                            <template slot="prepend">{{
                                                alphabet[index].toUpperCase()
                                            }}</template>
                                        </el-input>
                                    </el-form-item>
                                </el-form>
                                <el-button
                                    v-if="data.answers.length > 1"
                                    class="ml-2"
                                    type="danger"
                                    icon="el-icon-delete"
                                    @click="deleteAns(data.idQues, item.id)"
                                    circle
                                    plain
                                ></el-button>
                            </div>
                        </div>
                        <div class="flex justify-between items-start mt-4">
                            <div class="leading-[40px]">
                                <span class="text-[13px] font-semibold"
                                    >Level:
                                    {{
                                        data.level == 1
                                            ? "Easy"
                                            : data.level == 2
                                            ? "Medium"
                                            : "Hard"
                                    }}</span
                                >
                                <star-rating
                                    :star-size="20"
                                    :animate="true"
                                    v-model="data.level"
                                    :show-rating="false"
                                    :max-rating="3"
                                />
                            </div>
                            <div class="w-[180px]">
                                <el-form-item
                                    :rules="[
                                        {
                                            required: true,
                                            message: 'Please select answer',
                                            trigger: 'blur',
                                        },
                                    ]"
                                    prop="right_answers.answer_id"
                                    class="w-full m-0"
                                >
                                    <span class="text-[13px] font-semibold mr-2"
                                        >Anwser:</span
                                    >
                                    <el-select
                                        v-model="data.right_answers.answer_id"
                                        placeholder="Select"
                                    >
                                        <el-option
                                            v-for="(
                                                item, index
                                            ) in data.answers"
                                            :key="item.id"
                                            :label="
                                                alphabet[index].toUpperCase()
                                            "
                                            :value="item.id"
                                        >
                                        </el-option>
                                    </el-select>
                                </el-form-item>
                            </div>
                        </div>

                        <div class="mx-auto my-4 lg:my-2 flex justify-center">
                            <el-button
                                v-if="data.answers.length < maxAns"
                                @click="pushAns(data.idQues)"
                                icon="el-icon-plus"
                                plain
                            ></el-button>
                        </div>
                    </el-form>
                </div>
            </div>
            <div class="card-body block">
                <div class="w-full">
                    <p class="text-[15px] font-bold">{{ data.question }}</p>
                    <!-- <input
                            type="text"
                            class="h-[32px] border-none outline-none w-full"
                            placeholder="Nhập câu hỏi..."
                            v-model="dataQuestion[data.id - 1].question"
                        /> -->

                    <div
                        class="w-full mt-2"
                        v-for="(item, index) in data.answers"
                        :key="item.id"
                    >
                        <div class="mt-3 flex items-center">
                            <span class="text-[15px] font-semibold"></span>
                            <span class="uppercase mr-2 font-bold"
                                >{{ alphabet[index] }}:</span
                            >
                            {{ item.text }}
                        </div>
                    </div>
                    <div class="flex justify-between items-center mt-4">
                        <div>
                            <span class="text-[13px] font-semibold my-2"
                                >Level:
                                {{
                                    data.level == 1
                                        ? "Easy"
                                        : data.level == 2
                                        ? "Medium"
                                        : "Hard"
                                }}</span
                            >
                            <star-rating
                                :star-size="20"
                                :animate="false"
                                v-model="data.level"
                                :show-rating="false"
                                :max-rating="3"
                                :read-only="true"
                            />
                        </div>
                        <div class="justify-end mt-3 ml-auto flex items-center">
                            <span class="text-[13px] font-semibold mr-2"
                                >Anwser:</span
                            >
                            <span class="uppercase mr-2 font-bold">{{
                                alphabet[getAlphabet(data)]
                            }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div
            class="
                flex
                items-center
                justify-center
                cursor-pointer
                my-4
                text-[14px]
                font-semibold
            "
        >
            <el-button @click="show = !show" icon="el-icon-plus"></el-button>
        </div>
    </div>
</template>

<script>
import baseRequest from "../../../utils/baseRequest";
import StarRating from "vue-star-rating";

export default {
    components: {
        StarRating,
    },
    data() {
        return {
            rules: {
                name: [
                    {
                        required: true,
                        message: "Please input Activity question",
                        trigger: "blur",
                    },
                ],
            },

            show: false,
            listTopic: [],
            detailAudio: {
                id: null,
                name: null,
                audio: null,
                question: [],
            },
            dataQuestion: [],
            take: 5,
            isEditFile: false,
            file: null,
            audio: null,
            alphabet: ["a", "b", "c", "d", "e", "f", "g", "h"],
            maxAns: 4,
            take: 5,
            count: null,
            show: false,
            dataQuestion: [
                {
                    id: Date.now(),
                    question: null,
                    level: 1,
                    dataAns: [
                        {
                            idAns: Date.now() + 123,
                            text: null,
                            alphabet: "A",
                        },
                    ],
                    answer: null,
                },
            ],
        };
    },
    props: ["param"],
    computed: {
        levelEasy() {
            return this.detailAudio.question.reduce((sum, item) => {
                if (item.level == 1) {
                    return (sum += 1);
                } else {
                    return (sum += 0);
                }
            }, 0);
        },
        levelMedium() {
            return this.detailAudio.question.reduce((sum, item) => {
                if (item.level == 2) {
                    return (sum += 1);
                } else {
                    return (sum += 0);
                }
            }, 0);
        },
        levelhard() {
            return this.detailAudio.question.reduce((sum, item) => {
                if (item.level == 3) {
                    return (sum += 1);
                } else {
                    return (sum += 0);
                }
            }, 0);
        },
    },
    watch: {},
    methods: {
        EditQuestion(id) {
            this.$refs.card[id].children[1].classList.add("block");
            this.$refs.card[id].children[1].classList.remove("hidden");
            this.$refs.card[id].children[2].classList.add("hidden");
            this.$refs.card[id].children[2].classList.remove("block");

            let card_head = this.$refs.card[id].children[0];
            let edit = card_head.querySelector(".edit");
            let save = card_head.querySelector(".save");
            edit.classList.add("hidden");
            edit.classList.remove("block");
            save.classList.add("block");
            save.classList.remove("hidden");
        },
        closeEditQuestion(index) {
            console.log(this.$refs.card[index]);
            this.$refs.card[index].children[1].classList.add("hidden");
            this.$refs.card[index].children[1].classList.remove("block");
            this.$refs.card[index].children[2].classList.add("block");
            this.$refs.card[index].children[2].classList.remove("hidden");

            let card_head = this.$refs.card[index].children[0];
            let edit = card_head.querySelector(".edit");
            let save = card_head.querySelector(".save");
            edit.classList.add("block");
            edit.classList.remove("hidden");
            save.classList.add("hidden");
            save.classList.remove("block");
        },
        validate(formNameItem, formNameData) {
            let isCheck = true;
            this.$refs[formNameItem].forEach((item) => {
                item.validate((valid) => {
                    if (!valid) {
                        isCheck = false;
                    } else {
                        console.log("error submit!!");
                        return false;
                    }
                });
            });
            this.$refs[formNameData].forEach((item) => {
                item.validate((valid) => {
                    if (!valid) {
                        isCheck = false;
                    } else {
                        console.log("error submit!!");
                        return false;
                    }
                });
            });
            return isCheck;
        },
        async SaveQuestion(id, index) {
            let isCheck = this.validate("ruleFormData", "ruleFormItem");
            if (isCheck) {
                try {
                    let data = this.detailAudio.question.find(
                        (item) => item.idQues == id
                    );
                    let temp = {
                        right_answers: data.right_answers || [],
                        id: data.idQues || null,
                        question: data.question || "",
                        level: data.level,
                        dataAns: data.answers.map((itemAns) => {
                            return {
                                id: itemAns.id || "",
                                question_id: itemAns.question_id || "",
                                text: itemAns.text || "",
                            };
                        }),
                    };
                    let result = await baseRequest.put(
                        `/admin/update-question-listening`,
                        temp
                    );
                    if (result.data.status == 200) {
                        console.log(
                            "🚀 ~ file: QuestionDetail.vue ~ line 461 ~ SaveQuestion ~ result.data",
                            result.data
                        );
                        this.closeEditQuestion(index);
                        this.$message({
                            type: "success",
                            message: "Edit success",
                        });
                    } else {
                        this.$message({
                            type: "error",
                            message: "Edit error",
                        });
                    }
                    console.log(result);
                } catch (e) {
                    console.log(e);
                }
            }
        },
        pushAns(id) {
            console.log(id);
            let dataQues = this.detailAudio.question.find(
                (item) => item.idQues == id
            );

            dataQues.answers.push({
                id: Date.now(),
                question_id: id,
                text: null,
            });
        },
        async deleteAns(idQues, idAns) {
            try {
                let res = await baseRequest.post(
                    `/admin/delete-answer-listening`,
                    { id: idAns }
                );
                let { data } = res;
                if (data.status == 200) {
                    this.getAllData();
                } else {
                    let dataQues = this.detailAudio.question.find(
                        (item) => item.idQues == idQues
                    );
                    dataQues.answers = dataQues.answers.filter(
                        (item) => item.id != idAns
                    );
                }
            } catch (e) {
                let dataQues = this.detailAudio.question.find(
                    (item) => item.idQues == idQues
                );
                dataQues.answers = dataQues.answers.filter(
                    (item) => item.id != idAns
                );
            }
        },
        getAlphabet(data) {
            return data.answers.findIndex(
                (item) => item.id == data.right_answers.answer_id
            );
        },
        previewAudio() {
            let audio = document.getElementById("audio-preview");
            let reader = new FileReader();

            reader.readAsDataURL(this.file);
            reader.addEventListener("load", function () {
                audio.src = reader.result;
            });
        },
        uploadAudio() {
            this.$refs.fileAudio.click();
        },
        getChangeAudio(event) {
            console.log(event.target.files[0]);
            if (event.target.files[0].type == "audio/mpeg") {
                this.file = event.target.files[0];
                this.detailAudio.name = event.target.files[0].name;
                this.previewAudio();
                this.isEditFile = true;
            } else {
                this.$message({
                    message: "The file is not in the correct format",
                    type: "error",
                });
            }
        },
        resetFeild() {
            this.show = false;
            this.topicData = {
                name: null,
                description: null,
            };
        },
        async createTopic() {
            try {
                let rs = await baseRequest.post(
                    `/admin/store-topic-vocabulary`,
                    this.topicData
                );
                if (rs.data.status == 200) {
                    this.getAllTopic();

                    this.resetFeild();
                }
            } catch (e) {
                console.log(e);
            }
        },
        async getDetailAudio() {
            try {
                let rs = await baseRequest.get(
                    `/admin/get-detail-audio-question-listening/${this.param}`
                );
                if (rs.data.status == 200) {
                    let data = rs.data.data;
                    console.log(data);
                    this.detailAudio = {
                        id: data.id,
                        name: data.name,
                        audio: data.audio,
                        question: data.question_listening?.map((item) => {
                            return {
                                idQues: item.id,
                                level: item.level,
                                question: item.question,
                                answers: item.answer_listening?.map(
                                    (itemAns) => ({
                                        id: itemAns.id,
                                        question_id: itemAns.id,
                                        text: itemAns.text,
                                    })
                                ),
                                right_answers: item.right_answers,
                            };
                        }),
                    };
                    this.audio = data.audio;
                }
            } catch (e) {
                console.log(e);
            }
        },
        async deleteTopic(id) {
            try {
                let rs = await baseRequest.post(
                    `/admin/delete-topic-vocabulary`,
                    { id }
                );
                if (rs.data.status == 200) {
                    this.getAllTopic();
                }
            } catch (e) {
                console.log(e);
            }
        },
        async addTopic(id) {
            try {
                let { data } = await baseRequest.post(
                    `/admin/add-question-to-topic-vocabulary`,
                    {
                        idTopic: this.dataQuestion.id,
                        idQues: id,
                    }
                );
                if (data.status == 200) {
                    this.getDetailAudio();
                    this.dataQuestion = this.dataQuestion.filter(
                        (item) => item.id != id
                    );
                }
            } catch (error) {
                console.log(error);
            }
        },
        async removeTopic(id) {
            try {
                let { data } = await baseRequest.post(
                    `/admin/remove-question-from-topic-vocabulary`,
                    {
                        idTopic: this.dataQuestion.id,
                        idQues: id,
                    }
                );
                if (data.status == 200) {
                    this.getDetailAudio();
                }
            } catch (error) {
                console.log(error);
            }
        },
        async saveChangeTitle(id) {
            try {
                let { data } = await baseRequest.post(
                    `/admin/edit-topic-vocabulary`,
                    {
                        id,
                        name: this.dataQuestion.name,
                    }
                );
                if (data.status == 200) {
                    this.getDetailAudio();
                }
            } catch (error) {
                console.log(error);
            }
        },
        pushAnsQuestion(id) {
            let dataQues = this.dataQuestion.find((item) => item.id == id);
            dataQues.dataAns.push({
                idAns: Date.now(),
                text: null,
                alphabet: this.alphabet[dataQues.dataAns.length].toUpperCase(),
            });
        },
        pushQuesMore() {
            let isCheck = this.validate("ruleFormData", "ruleFormItem");
            if (isCheck) {
                this.dataQuestion.push({
                    id: Date.now(),
                    question: null,
                    level: 1,
                    dataAns: [
                        {
                            idAns: Date.now() + 123,
                            text: null,
                            alphabet: "A",
                        },
                    ],
                    answer: null,
                });
            }
        },
        deleteAnsQuestion(idQues, idAns) {
            console.log(
                "🚀 ~ file: QuestionDetail.vue ~ line 1007 ~ deleteAnsQuestion ~ idQues, idAns",
                idQues,
                idAns
            );
            let dataQues = this.dataQuestion.find((item) => item.id == idQues);
            dataQues.dataAns = dataQues.dataAns.filter(
                (item) => item.idAns != idAns
            );
            let data = dataQues.dataAns;
            let temp = [];
            for (let i = 0; i < data.length; i++) {
                temp.push({
                    idAns: data[i].idAns,
                    text: data[i].text,
                    alphabet: this.alphabet[i].toUpperCase(),
                });
            }
            dataQues.dataAns = temp;
        },
        deleteQuesMore(id) {
            this.dataQuestion = this.dataQuestion.filter(
                (item) => item.id != id
            );
        },
        async createQuestionMore() {
            let dataTemp = this.dataQuestion.map((item) => ({
                id: item.id,
                audio_id: this.detailAudio.id,
                question: item.question,
                level: item.level,
                dataAns: item.dataAns,
                answer: item.answer,
            }));
            try {
                let result = await baseRequest.post(
                    `/admin/add-question-to-audio-listening`,
                    dataTemp
                );
                let { data } = result;
                if (data.status == 200) {
                    this.$message({
                        message: data.message,
                        type: "success",
                    });
                    this.show = !this.show;
                    this.getDetailAudio();
                } else {
                    this.$message({
                        message: data.message,
                        type: "error",
                    });
                }
            } catch (error) {
                console.log("🚀 ~ ~ error", error);
            }
        },
        async saveEditAudio() {
            let isCheck = this.validate("ruleFormData", "ruleFormItem");
            if (isCheck) {
                try {
                    const formData = new FormData();
                    formData.append("file", this.file);
                    const headers = { "Content-Type": "multipart/form-data" };
                    let result = await baseRequest.post(
                        `/admin/update-audio-listening/${this.param}`,
                        formData,
                        { headers }
                    );
                    let { data } = result;
                    if (data.status == 200) {
                        this.isEditFile = false;
                        this.$message({
                            type: "success",
                            message: "delete successful Audio",
                        });
                    }else {
                        this.$message({
                            type: "error",
                            message: "delete error Audio",
                        });
                    }
                } catch (error) {
                    console.log(
                        "🚀 ~ file: QuestionCreate.vue ~ line 320 ~ submitFile ~ error",
                        error
                    );
                }
            }
        },
    },

    created() {
        this.getDetailAudio();
    },
    mounted() {
        console.log(this.detailAudio.audio);
        let audio = document.getElementById("audio-preview");
        setTimeout(() => {
            audio.src = `${$Api.baseUrl}/upload/audio/${this.audio}`;
        }, 500);
    },
};
</script>
<style scoped>
.bg-blur {
    background: rgba(0, 0, 0, 0.3);
}

.fade-enter-active,
.fade-leave-active {
    transition: opacity 0;
}

.fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
    opacity: 0;
}
</style>
