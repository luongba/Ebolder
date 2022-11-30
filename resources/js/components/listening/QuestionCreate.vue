<template>
    <div>
        <div class="app-page-title flex justify-between items-center">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="lnr-book icon-gradient bg-mean-fruit"></i>
                    </div>
                    <div class="flex justify-between">
                        <p>LISTENING LEVEL TEST</p>
                    </div>
                </div>
            </div>
            <p
                href=""
                class="
                    font-semibold
                    text-[16px] text-[#3f6ad8]
                    cursor-pointer
                    mr-2
                "
                @click="submitFile"
            >
                SAVE
            </p>
        </div>
        <div class="container">
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
                "
                style="border-width: 2px"
                @click="uploadAudio"
            >
                <div class="flex flex-col items-center">
                    <i class="el-icon-upload text-[50px]"></i>
                    <p class="mt-2 text-[15px] font-semibold">
                        Click to upload
                    </p>
                    <p
                        class="mt-2 text-[15px] font-bold text-center"
                        v-if="file != null"
                    >
                        Audio Name: {{ file?.name }}
                    </p>
                </div>
            </div>
            <input
                type="file"
                ref="fileAudio"
                @change="getChangeAudio($event)"
                hidden
            />
            <audio
                id="audio-preview"
                class="w-full"
                controls
                v-show="file != ''"
            />
            <div class="flex flex-col justify-center w-full items-center">
                <div
                    class="card w-full mt-3"
                    v-for="(data, index) in dataQuestion"
                    :key="index"
                >
                    <div class="card-header flex justify-between items-center">
                        <span>Question {{ index + 1 }}</span>
                        <span
                            v-if="dataQuestion.length > 1"
                            class="
                                text-red-600 text-[14px]
                                font-semibold
                                cursor-pointer
                            "
                            @click="deleteQues(data.id)"
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
                                    <div class="mt-4 flex items-start">
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
                                                <Input v-model="item.text">
                                                    <template slot="prepend">{{
                                                        item.alphabet
                                                    }}</template>
                                                </Input>
                                            </el-form-item>
                                        </el-form>

                                        <el-button
                                            v-if="data.dataAns.length > 1"
                                            class="ml-2"
                                            type="danger"
                                            icon="el-icon-delete"
                                            @click="
                                                deleteAns(data.id, item.idAns)
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
                                                v-model="data.answer"
                                                placeholder="Select"
                                            >
                                                <el-option
                                                    v-for="item in data.dataAns"
                                                    :key="item.idAns"
                                                    :label="item.alphabet"
                                                    :value="item.idAns"
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
                                        v-if="data.dataAns.length < maxAns"
                                        @click="pushAns(data.id)"
                                        icon="el-icon-plus"
                                        plain
                                    ></el-button>
                                </div>
                            </el-form>
                        </div>
                    </div>
                </div>

                <div class="mx-auto my-4 flex justify-center">
                    <el-button
                        @click="pushQues()"
                        type="success"
                        icon="el-icon-circle-plus-outline"
                        plain
                        >More questions
                    </el-button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";
import StarRating from "vue-star-rating";
import { Input, Button, Select, Form } from "element-ui";

export default {
    components: {
        StarRating,
        Input,
        Button,
        Select,
        Form,
    },
    data() {
        return {
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
            alphabet: ["a", "b", "c", "d", "e", "f", "g", "h"],
            maxAns: 4,
            level: "Easy",

            rules: {
                name: [
                    {
                        required: true,
                        message: "Please input Activity question",
                        trigger: "blur",
                    },
                ],
            },
            file: null,
        };
    },
    methods: {
        async submitFile() {
            if (this.file == null) {
                this.$message({
                    type: "error",
                    message: "Please select file",
                });
                this.$refs.fileAudio.click();
            } else {
                let isCheck = this.validate("ruleFormData", "ruleFormItem");
                if (isCheck) {
                    try {
                        const formData = new FormData();
                        formData.append("file", this.file);
                        const headers = {
                            "Content-Type": "multipart/form-data",
                        };
                        let result = await axios.post(
                            `${$Api.baseUrlApi}/admin/add-audio-and-question-listening`,
                            formData,
                            { headers }
                        );
                        let { data } = result;
                        if (data.status == 200) {
                            this.createQuestion(data.audio_id);
                        }
                    } catch (error) {
                        console.log(
                            "🚀 ~ file: QuestionCreate.vue ~ line 320 ~ submitFile ~ error",
                            error
                        );
                    }
                }
            }
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
                this.previewAudio();
            } else {
                this.$message({
                    message: "The file is not in the correct format",
                    type: "error",
                });
            }
        },
        pushAns(id) {
            let dataQues = this.dataQuestion.find((item) => item.id == id);
            dataQues.dataAns.push({
                idAns: Date.now(),
                text: null,
                alphabet: this.alphabet[dataQues.dataAns.length].toUpperCase(),
            });
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
        pushQues() {
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
        deleteAns(idQues, idAns) {
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
        deleteQues(id) {
            this.dataQuestion = this.dataQuestion.filter(
                (item) => item.id != id
            );
        },
        async createQuestion(id) {
            let dataTemp = this.dataQuestion.map((item) => ({
                id: item.id,
                audio_id: id,
                question: item.question,
                level: item.level,
                dataAns: item.dataAns,
                answer: item.answer,
            }));
            try {
                let result = await axios.post(
                    `${$Api.baseUrlApi}/admin/add-question-to-audio-listening`,
                    dataTemp
                );
                let { data } = result;
                if (data.status == 200) {
                    this.$message({
                        message: data.message,
                        type: "success",
                    });
                    setTimeout(() => {
                        window.location.href = `${$Api.baseUrl}/admin/listening-level-test/question-list`;
                    }, 1000);
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
    },

    // created() {
    //     setTimeout(() => {
    //         this.isLoading = false;
    //     }, 3000);
    // },
};
</script>
