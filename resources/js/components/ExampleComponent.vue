<template>
    <div class="container">
        <div class="flex flex-col justify-center w-full items-center">
            <div
                class="card w-full mt-3"
                v-for="(data, index) in dataQuestion"
                :key="index"
            >
                <div class="card-header flex justify-between items-center">
                    <span>Câu {{ index + 1 }}</span>
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
                        <textarea
                            name=""
                            id=""
                            class="border-none outline-none w-full"
                            placeholder="Nhập câu hỏi..."
                            v-model="data.question"
                            rows="3"
                        ></textarea>
                        <!-- <input
                            type="text"
                            class="h-[32px] border-none outline-none w-full"
                            placeholder="Nhập câu hỏi..."
                            v-model="dataQuestion[data.id - 1].question"
                        /> -->

                        <div
                            class="w-full mt-2"
                            v-for="item in data.dataAns"
                            :key="item.idAns"
                        >
                            <div class="mt-3 flex items-center">
                                <input
                                    type="text"
                                    class="
                                        h-[32px]
                                        border-2
                                        outline-none
                                        w-full
                                        rounded-md
                                        p-[1.25rem]
                                        border-gray-400
                                        focus:border-main-color
                                        focus:text-main-color
                                        text-[14px]
                                    "
                                    :placeholder="`Câu trả lời ${item.alphabet}`"
                                    v-model="item.text"
                                />
                                <button
                                    v-if="data.dataAns.length > 1"
                                    class="
                                        p-2
                                        h-[32px]
                                        bg-red-600
                                        shadow-sm
                                        ml-2
                                        flex
                                        items-center
                                        justify-center
                                        border border-transparent
                                        rounded-md
                                    "
                                    @click="deleteAns(data.id, item.idAns)"
                                >
                                    <i
                                        class="
                                            metismenu-icon
                                            lnr-trash lnr
                                            text-[20px] text-white
                                        "
                                    ></i>
                                </button>
                            </div>
                        </div>
                        <div class="w-[180px] mt-3 ml-auto flex items-center">
                            <span class="text-[13px] font-semibold mr-2"
                                >Anwser:</span
                            >
                            <select
                                class="
                                    h-[38px]
                                    border-2
                                    outline-none
                                    w-full
                                    rounded-md
                                    border-gray-400
                                    focus:border-main-color
                                    focus:text-main-color
                                    text-[14px] text-black text-center
                                "
                                v-model="data.answer"
                            >
                                <option
                                    :value="item.idAns"
                                    v-for="item in data.dataAns"
                                    :key="item.idAns"
                                >
                                    {{ item.alphabet }}
                                </option>
                            </select>
                        </div>
                        <div
                            v-if="data.dataAns.length < maxAns"
                            class="
                                w-[64px]
                                flex
                                items-center
                                justify-center
                                bg-white
                                shadow-sm
                                my-4
                                p-2
                                mx-auto
                            "
                            @click="pushAns(data.id)"
                        >
                            <i
                                class="
                                    metismenu-icon
                                    lnr-plus-circle lnr
                                    text-[28px]
                                "
                            ></i>
                        </div>
                    </div>
                </div>
            </div>
            <div
                class="
                    w-[64px]
                    h-[64px]
                    flex
                    items-center
                    justify-center
                    bg-white
                    shadow-sm
                    mt-4
                "
                @click="pushQues"
            >
                <i class="metismenu-icon lnr-plus-circle lnr text-[32px]"></i>
            </div>
        </div>
        <button @click="createQuestion">click</button>
    </div>
    
</template>

<script>
import axios from "axios";
export default {
    data() {
        return {
            dataQuestion: [
                {
                    id: Date.now(),
                    question: null,
                    dataAns: [
                        {
                            idAns: Date.now(),
                            text: null,
                            alphabet: "A",
                        },
                    ],
                    answer: null,
                },
            ],
            alphabet: ["a", "b", "c", "d", "e", "f", "g", "h"],
            maxAns: 4,
        };
    },
    methods: {
        pushAns(id) {
            let dataQues = this.dataQuestion.find((item) => item.id == id);
            dataQues.dataAns.push({
                idAns: Date.now(),
                text: null,
                alphabet: this.alphabet[dataQues.dataAns.length].toUpperCase(),
            });
        },
        pushQues() {
            this.dataQuestion.push({
                id: Date.now(),
                question: null,
                dataAns: [
                    {
                        idAns: 1,
                        text: null,
                        alphabet: "A",
                    },
                ],
                answer: null,
            });
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
        createQuestion() {
            axios.post(
                "http://127.0.0.1:8000/api/admin/create-question-vocabulary",
                this.dataQuestion
            );
        },
    },

    // created() {
    //     setTimeout(() => {
    //         this.isLoading = false;
    //     }, 3000);
    // },
};
</script>
