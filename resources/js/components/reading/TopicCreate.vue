<template>
    <div>
        <div class="app-page-title flex justify-between items-center">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="lnr-book icon-gradient bg-mean-fruit"></i>
                    </div>
                    <div class="flex justify-between">
                        <p>READING LEVEL TEST</p>
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
                @click="createTopic"
            >
                SAVE
            </p>
        </div>
        <div class="container">
            <div class="mb-4">
                <el-form ref="ruleFormItem" :model="dataTopic" class="w-full">
                    <el-form-item
                        label="Name"
                        prop="name"
                        :rules="[
                            {
                                required: true,
                                message: 'Please enter your answer',
                            },
                        ]"
                        class="w-full m-0"
                    >
                        <el-input
                            v-model="dataTopic.name"
                            placeholder="Please enter name..."
                        >
                        </el-input>
                    </el-form-item>
                </el-form>
            </div>
            <editor
                v-model="dataTopic.content"
                api-key="hri1xykfk0d1gnrwf70v71zn81p6f7s5e3z1edxly9mansfq"
                :init="{
                    height: 500,
                    menubar: false,
                    plugins: [
                        'advlist autolink lists link image charmap print preview anchor',
                        'searchreplace visualblocks code fullscreen',
                        'insertdatetime media table paste code help wordcount',
                    ],
                    toolbar:
                        'undo redo | formatselect | bold italic backcolor | \
           alignleft aligncenter alignright alignjustify | \
           bullist numlist outdent indent | removeformat | help',
                }"
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
import baseRequest from "../../utils/baseRequest";
import StarRating from "vue-star-rating";
import { Input, Button, Select, Form } from "element-ui";
import Editor from "@tinymce/tinymce-vue";

export default {
    components: {
        StarRating,
        Input,
        Button,
        Select,
        Form,
        Editor,
    },
    data() {
        return {
            dataTopic: {
                name: null,
                content: "hello",
            },

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
        async createTopic() {
            try {
                let dataTemp = {
                    name: this.dataTopic.name,
                    contentReading: this.dataTopic.content,
                    dataQuestion: this.dataQuestion,
                };
                let result = await baseRequest.post(
                    `/admin/add-question-reading`,
                    dataTemp
                );
                let { data } = result;
                if (data.status == 200) {
                    this.$message({
                        message: data.message,
                        type: "success",
                    });
                    setTimeout(() => {
                        window.location.href = `${$Api.baseUrl}/admin/reading-level-test/topic-list`;
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
