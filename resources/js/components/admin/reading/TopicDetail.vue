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
                                    @click="SaveQuestion(data.id, index)"
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
                                    v-for="(item, indexAms) in data.dataAns"
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
                                                        alphabet[indexAms].toUpperCase()
                                                    }}</template>
                                                </Input>
                                            </el-form-item>
                                        </el-form>

                                        <el-button
                                            v-if="data.dataAns.length > 1"
                                            class="ml-2"
                                            type="danger"
                                            icon="el-icon-delete"
                                            @click="deleteAns(data, item.idAns)"
                                            plain
                                            circle
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
                                            prop="answer_id"
                                            class="w-full m-0"
                                        >
                                            <span class="text-[13px] font-semibold mr-2"
                                                >Anwser:</span
                                            >
                                            <el-select
                                                v-model="data.answer_id"
                                                placeholder="Select"
                                            >
                                                <el-option
                                                    v-for="(item, ind) in data.dataAns"
                                                    :key="item.idAns"
                                                    :label="alphabet[ind].toUpperCase()"
                                                    :value="item.idAns"
                                                >
                                                </el-option>
                                            </el-select>
                                        </el-form-item>
                                    </div>
                                </div>
                                <div class="mx-auto my-4 lg:my-2 flex justify-center">
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
                    <div class="card-body block">
                        <div class="w-full">
                            <p class="text-[15px] font-bold">
                                {{ data.question }}
                            </p>
                            <!-- <input
                            type="text"
                            class="h-[32px] border-none outline-none w-full"
                            placeholder="Nhập câu hỏi..."
                            v-model="dataQuestion[data.id - 1].question"
                        /> -->

                            <div
                                class="w-full mt-2"
                                v-for="(item, index) in data.dataAns"
                                :key="item.idAns"
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
                                        alphabet[
                                            getAlphabet(data.dataAns, data.answer_id)
                                        ]
                                    }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="w-full my-4 flex justify-between">
                    <el-button
                        @click="pushQues()"
                        type="success"
                        icon="el-icon-circle-plus-outline"
                        plain
                        >More questions
                    </el-button>
                    <el-button @click="saveChangeTopic" type="primary" plain
                        >Save
                    </el-button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import baseRequest from "../../../utils/baseRequest";
import StarRating from "vue-star-rating";
import { Input, Button, Select, Form } from "element-ui";
import Editor from "@tinymce/tinymce-vue";

export default {
    props: ["param"],
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
                content: "Hello",
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
        async getDetailTopic() {
            try {
                let rs = await baseRequest.get(
                    `/admin/detail-topic-reading/${this.param}`
                );
                if (rs.data.status == 200) {
                    let data = rs.data.data;
                    this.dataTopic = {
                        name: data.name,
                        content: data.content,
                    };
                    this.dataQuestion = data.question_reading?.map((item) => {
                        return {
                            id: item.id,
                            question: item.question,
                            level: item.level,
                            dataAns: item.answer_reading.map((itemAns) => {
                                return {
                                    idAns: itemAns.id,
                                    text: itemAns.text,
                                };
                            }),
                            answer_id: item.right_answer_reading.answer_id,
                        };
                    });
                }
            } catch (e) {
                console.log(e);
            }
        },
        async saveChangeTopic() {
            try {
                let dataTemp = {
                    id: this.param,
                    name: this.dataTopic.name,
                    contentReading: this.dataTopic.content,
                    dataQuestion: this.dataQuestion,
                };
                let result = await baseRequest.post(
                    `/admin/update-question-reading`,
                    dataTemp
                );
                let { data } = result;
                if (data.status == 200) {
                    this.getDetailTopic();
                    this.$message({
                        message: data.message,
                        type: "success",
                    });
                    setTimeout(() => {
                        window.location.href = `${$Api.baseUrl}/admin/reading-level-test/topic-detai/${this.param}`;
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
                setTimeout(() => {
                    this.EditQuestion(this.dataQuestion.length - 1);
                }, 100);
            }
        },
        async deleteAns({ id, answer_id }, idAns) {
            if (answer_id == idAns) {
                this.$message({
                    message:
                        "Câu trả lời xóa trùng với đáp án. Vui lòng đổi đáp án trước khi xóa !",
                    type: "error",
                });
            } else {
                try {
                    let result = await baseRequest.post(
                        `/admin/delete-answer-reading`,
                        { id: idAns }
                    );
                    let { data } = result;

                    if (data.status == 200) {
                        this.getDetailTopic();
                        this.$message({
                            message: data.message,
                            type: "success",
                        });
                    } else if (data.status == 100) {
                        let dataQues = this.dataQuestion.find((item) => item.id == id);
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
                    } else {
                        this.$message({
                            message: data.message,
                            type: "error",
                        });
                    }
                } catch (error) {
                    console.log("🚀 ~ ~ error", error);
                }
            }
        },
        async deleteQues(id) {
            // this.dataQuestion = this.dataQuestion.filter(
            //     (item) => item.id != id
            // );
            try {
                let result = await baseRequest.post(
                    `/admin/delete-question-reading`,
                    { id }
                );
                let { data } = result;

                if (data.status == 200) {
                    this.getDetailTopic();
                    this.$message({
                        message: data.message,
                        type: "success",
                    });
                } else if (data.status == 100) {
                    this.dataQuestion = this.dataQuestion.filter((item) => item.id != id);
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
        getAlphabet(data, idAnswer) {
            let index = data.findIndex((item) => {
                return item.idAns === idAnswer;
            });
            return index;
        },
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
        async SaveQuestion(id, index) {
            let isCheck = this.validate("ruleFormData", "ruleFormItem");
            if (isCheck) {
                try {
                    let data = this.dataQuestion.find((item) => {
                        return item.id == id;
                    });
                    console.log(
                        "🚀 ~ file: TopicDetail.vue ~ line 676 ~ SaveQuestion ~ data",
                        data
                    );

                    let temp = {
                        reading_id: this.param,
                        right_answers: data.answer_id || "",
                        id: data.id || null,
                        question: data.question || "",
                        level: data.level,
                        dataAns: data.dataAns.map((itemAns) => {
                            return {
                                id: itemAns.idAns || "",
                                question_id: itemAns.question_id || "",
                                text: itemAns.text || "",
                            };
                        }),
                    };
                    let result = await baseRequest.post(
                        `/admin/add-or-update-question-reading`,
                        temp
                    );
                    console.log(
                        "🚀 ~ file: TopicDetail.vue ~ line 698 ~ SaveQuestion ~ result",
                        result
                    );
                    if (result.data.status == 200) {
                        this.getDetailTopic();
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
                    // console.log(result);
                } catch (e) {
                    console.log(e);
                }
            }
        },
    },

    created() {
        this.getDetailTopic();
    },
};
</script>
