<template>
    <div class="container">
        <transition name="fade">
            <div class="w-full h-full" v-if="show">
                <div class="absolute inset-0 bg-blur flex items-center justify-center" >
                    <div class="w-[95%] md:w-[70%] bg-white shadow-sm px-4 py-4">
                        <div class="border-b py-2 relative">
                            <h1 class="font-semibold uppercase text-[14px]">Create new Topic</h1>
                            <span class="absolute right-[5px] top-[5px] text-[20px] cursor-pointer" @click="show = !show">
                        <i class="lnr-cross"></i>
                    </span>
                        </div>
                        <div class="my-2">
                            <span class="text-[14px] font-semibold my-2 inline-block">Name Topic: </span>
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
                                placeholder="Name Topic"
                                v-model="topicData.name"

                            />
                        </div>
                        <div class="my-2">
                            <span class="text-[14px] font-semibold my-2 inline-block">Description: </span>
                            <textarea
                                type="text"
                                class="
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
                                placeholder="Description"
                                row="3"
                                v-model="topicData.description"

                            ></textarea>
                        </div>
                        <div class="flex justify-between items-center">
                            <button class="px-2 py-2 bg-red-600 rounded-md shadow-sm text-white" @click="resetFeild">Cancel</button>
                            <button class="px-2 py-2 bg-green-600 rounded-md shadow-sm text-white" @click="createTopic">Create</button>
                        </div>
                    </div>
                </div>
            </div>

        </transition>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div
                class="bg-white shadow-sm flex items-center justify-between cursor-pointer py-4 px-4 text-[14px] font-semibold"
            v-for="item in listTopic" :key="item.id">
                <span class="flex-1">{{item.name}}</span>
                <div class="flex items-center">
                    <div class="w-[32px] h-[32px] border rounded-full mr-2 flex items-center justify-center">
                        <i class="lnr-trash" @click="deleteTopic(item.id)"></i>
                    </div>
                    <a :href="`http://127.0.0.1:8000/admin/volabulary-level-test/detail/${item.id}`" class="w-[32px] h-[32px] border rounded-full flex items-center justify-center">
                        <i class="lnr-pencil"></i>
                    </a>
                </div>
            </div>
            <div
                class="bg-white shadow-sm flex items-center justify-center cursor-pointer py-4 px-4 text-[14px] font-semibold" @click="show = !show">
                <div class="flex items-center">
                    <div class="w-[32px] h-[32px] flex items-center justify-center">
                        <i class="lnr-plus-circle text-[20px]"></i>
                    </div>
                </div>
            </div>
        </div>

    </div>

</template>

<script>
import axios from "axios";

export default {
    data() {
        return {
            show: false,
            topicData: {
                name: null,
                description: null
            },
            listTopic: []
        };
    },
    computed: {},
    watch: {},
    methods: {
        resetFeild(){
            this.show = false;
            this.topicData = {
                name: null,
                description: null
            }
        },
        async createTopic(){
            try {
                let rs = await axios.post('http://127.0.0.1:8000/api/admin/store-topic-vocabulary', this.topicData);
                if(rs.data.status == 200){
                    this.getAllTopic();

                    this.resetFeild();
                }
            }catch (e) {
                console.log(e)
            }
        },
        async getAllTopic(){
            try {
                let rs = await axios.get('http://127.0.0.1:8000/api/admin/list-topic-vocabulary');
                if(rs.data.status == 200){
                    this.listTopic = rs.data.data
                }
            }catch (e) {
                console.log(e)
            }
        },
        async deleteTopic(id){
            try {
                let rs = await axios.post('http://127.0.0.1:8000/api/admin/delete-topic-vocabulary', {id});
                if(rs.data.status == 200){
                    this.getAllTopic();
                }
            }catch (e) {
                console.log(e)
            }
        }
    },

    created() {
        this.getAllTopic();
    },
};
</script>
<style scoped>
.bg-blur {
    background: rgba(0, 0, 0, 0.3);
}
.fade-enter-active, .fade-leave-active {
    transition: opacity .2s;
}
.fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
    opacity: 0;
}
</style>
