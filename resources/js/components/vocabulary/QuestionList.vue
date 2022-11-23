<template>
    <div class="container">
        <div class="flex flex-col justify-center w-full items-center">
            <div
                class="card w-full mt-3 mb-3"
                v-for="(data, index) in dataQuestion"
                :key="index"
                ref="card"
            >
                <div class="card-header flex justify-between items-center">
                    <span>Question {{ index + 1 }}</span>
                    <div class="flex items-center">
                        <span
                            class="
                            text-yellow-400 text-[14px]
                            font-semibold
                            cursor-pointer
                            mr-2
                            edit
                        "
                            @click="EditQuestion(index)"
                        >Edit</span>
                        <span
                            class="
                            text-green-600 text-[14px]
                            font-semibold
                            cursor-pointer
                            mr-2
                            save
                            hidden
                        "
                            @click="SaveQuestion(data.id, index)"
                        >Save</span>
                        <span
                            v-if="dataQuestion.length > 1"
                            class="
                            text-red-600 text-[14px]
                            font-semibold
                            cursor-pointer
                        "
                            @click="deleteQues(data.id)"
                        >Delete</span
                        >
                    </div>

                </div>

                <div class="card-body hidden">
                    <div class="w-full">
                        <textarea
                            name=""
                            id=""
                            class="border-none outline-none w-full text-[15px] font-bold"
                            placeholder="Nhập câu hỏi..."
                            v-model="data.question"
                            rows="3"
                        ></textarea>

                        <div
                            class="w-full mt-2"
                            v-for="(item, index) in data.answers"
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
                                    :placeholder="`Câu trả lời ${alphabet[index].toUpperCase()}`"
                                    v-model="item.text"
                                />
                                <button
                                    v-if="data.answers.length > 1"
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
                                    @click="deleteAns(data.id,item.id)"
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
                        <div class="flex justify-between items-center">
                            <div>
                                <span class="text-[13px] font-semibold my-2"
                                >Level: {{ data.level == 1 ? 'Easy' : data.level == 2 ? 'Medium' : 'Hard' }}</span
                                >
                                <star-rating :star-size="20" :animate="true" v-model="data.level" :show-rating="false"
                                             :max-rating="3"/>
                            </div>
                            <div class="w-[180px] mt-3 flex items-center">
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
                                    v-model="data.right_answers.answer_id"
                                >
                                    <option
                                        :value="item.id"
                                        v-for="(item, index) in data.answers"
                                        :key="item.idAns"
                                    >
                                        {{ alphabet[index].toUpperCase() }}
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div
                            v-if="data.answers.length < maxAns"
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
                            v-for="(item,index) in data.answers"
                            :key="item.idAns"
                        >
                            <div class="mt-3 flex items-center">
                                <span class="text-[15px] font-semibold"></span>
                                <span class="uppercase mr-2 font-bold">{{ alphabet[index] }}:</span> {{ item.text }}
                            </div>
                        </div>
                        <div class="flex justify-between items-center mt-4">
                            <div>
                                <span class="text-[13px] font-semibold my-2"
                                >Level: {{ data.level == 1 ? 'Easy' : data.level == 2 ? 'Medium' : 'Hard' }}</span
                                >
                                <star-rating :star-size="20" :animate="false" v-model="data.level" :show-rating="false"
                                             :max-rating="3" :read-only="true"/>
                            </div>
                            <div class="justify-end mt-3 ml-auto flex items-center">
                            <span class="text-[13px] font-semibold mr-2"
                            >Anwser:</span
                            >
                                <span class="uppercase mr-2 font-bold">{{ alphabet[getAlphabet(data)] }}</span>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <p class="text-[14px] text-blue-500 uppercase font-bold cursor-pointer mb-4" @click="takeMore(5)"
           v-if="take < count">More</p>
    </div>

</template>

<script>
import axios from "axios";
import StarRating from "vue-star-rating";

export default {
    components: {
        StarRating
    },
    data() {
        return {
            dataQuestion: [],
            alphabet: ["a", "b", "c", "d", "e", "f", "g", "h"],
            maxAns: 4,
            take: 5,
            count: null,
        };
    },
    computed: {},
    watch: {
        take() {
            this.getAllData();
        }

    },
    methods: {
        takeMore(number) {
            this.take = this.take + number
        },
        pushAns(id) {
            console.log(id)
            let dataQues = this.dataQuestion.find((item) => item.id == id);
            dataQues.answers.push({
                id: Date.now(),
                question_id: id,
                text: null,
                updated_at: Date.now()
            });
        },
        pushQues() {
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
        },
        async deleteAns(idQues, idAns) {
            try {
                let res = await axios.post('http://127.0.0.1:8000/api/admin/delete-answer-vocabulary', {id: idAns});
                let {data} = res;
                if (data.status == 200) {
                    this.getAllData();
                } else {
                    let dataQues = this.dataQuestion.find((item) => item.id == idQues);
                    dataQues.answers = dataQues.answers.filter(
                        (item) => item.id != idAns
                    );
                }
            } catch (e) {
                let dataQues = this.dataQuestion.find((item) => item.id == idQues);
                dataQues.answers = dataQues.answers.filter(
                    (item) => item.id != idAns
                );
            }
            // let dataQues = this.dataQuestion.find((item) => item.id == idQues);
            // dataQues.dataAns = dataQues.dataAns.filter(
            //     (item) => item.idAns != idAns
            // );
            // let data = dataQues.dataAns;
            // let temp = [];
            // for (let i = 0; i < data.length; i++) {
            //     temp.push({
            //         idAns: data[i].idAns,
            //         text: data[i].text,
            //         alphabet: this.alphabet[i].toUpperCase(),
            //     });
            // }
            // dataQues.dataAns = temp;
        },
        async deleteQues(id) {
            try {
                let res = await axios.post('http://127.0.0.1:8000/api/admin/delete-question-vocabulary', {id: id});
                let {data} = res;
                if (data.status == 200) {
                    this.getAllData();
                }
            } catch (e) {
                console.log(e)
            }
        },
        async getAllData() {
            try {
                let {data} = await axios.get(
                    `http://127.0.0.1:8000/api/admin/list-question-vocabulary?take=${this.take}`,
                );
                console.log(data.data);
                this.count = data.count;
                this.dataQuestion = data.data;


            } catch (error) {
                console.log(error)
            }


        },
        getAlphabet(data) {
            return data.answers.findIndex((item) => item.id == data.right_answers.answer_id);
        },
        EditQuestion(id) {
            this.$refs.card[id].children[1].classList.add('block');
            this.$refs.card[id].children[1].classList.remove('hidden');
            this.$refs.card[id].children[2].classList.add('hidden');
            this.$refs.card[id].children[2].classList.remove('block');

            let card_head = this.$refs.card[id].children[0];
            let edit = card_head.querySelector('.edit');
            let save = card_head.querySelector('.save');
            edit.classList.add('hidden');
            edit.classList.remove('block');
            save.classList.add('block');
            save.classList.remove('hidden');
        },
        closeEditQuestion(index) {
            console.log(this.$refs.card[index]);
            this.$refs.card[index].children[1].classList.add('hidden');
            this.$refs.card[index].children[1].classList.remove('block');
            this.$refs.card[index].children[2].classList.add('block');
            this.$refs.card[index].children[2].classList.remove('hidden');

            let card_head = this.$refs.card[index].children[0];
            let edit = card_head.querySelector('.edit');
            let save = card_head.querySelector('.save');
            edit.classList.add('block');
            edit.classList.remove('hidden');
            save.classList.add('hidden');
            save.classList.remove('block');
        },
        async SaveQuestion(id, index) {
            try {
                let data = this.dataQuestion.find(item => item.id == id);
                let temp = {
                    right_answers: data.right_answers || [],
                    id: data.id || null,
                    question: data.question || "",
                    level: data.level,
                    dataAns: data.answers.map(itemAns => {
                            return {
                                id: itemAns.id || "",
                                question_id: itemAns.question_id || "",
                                text: itemAns.text || ""
                            }
                        },
                    )
                }
                let result = await axios.put('http://127.0.0.1:8000/api/admin/update-question-vocabulary', temp);
                if (result.data.status == 200) {
                    this.getAllData();
                    this.closeEditQuestion(index);

                }
                // console.log(result);
            } catch (e) {
                console.log(e);
            }
        },

    },

    created() {
        this.getAllData();
    },
};
</script>
