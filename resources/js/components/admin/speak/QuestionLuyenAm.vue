<template>
  <div>
    <transition name="fade">
      <div class="w-full h-full" v-if="show">
        <div class="absolute inset-0 bg-blur flex items-center justify-center">
          <div class="w-[95%] md:w-[70%] bg-white shadow-sm px-4 py-4">
            <div class="py-2 relative">
              <h1 class="font-semibold uppercase text-[14px]">
                Create new Topic
              </h1>
              <span
                class="absolute right-[5px] top-[5px] text-[20px] cursor-pointer"
                @click="show = !show"
              >
                <i class="lnr-cross"></i>
              </span>
            </div>
            <el-form :model="form" :rules="rules" ref="ruleForm">
              <div class="my-2">
                <el-form-item label="Name Topic" prop="name">
                  <el-input
                    placeholder="Name Topic"
                    v-model="form.name"
                  ></el-input>
                </el-form-item>
              </div>
              <div class="">
                <editor
                  v-model="form.content"
                  api-key="hri1xykfk0d1gnrwf70v71zn81p6f7s5e3z1edxly9mansfq"
                  :init="{
                    height: 400,
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
                    visual: false,
                    content_style: `
		table, th, td {
    		border: 1px solid #000 !important;
		}	`,
                    paste_data_images: true,
                  }"
                />
              </div>
              <div class="flex justify-end items-center mt-4">
                <el-button plain @click="resetFeild">Cancel</el-button>
                <el-button type="primary" @click="createTopic('ruleForm')"
                  >Create</el-button
                >
              </div>
            </el-form>
          </div>
        </div>
      </div>
    </transition>
    <div class="app-page-title">
      <div class="page-title-wrapper">
        <div class="page-title-heading">
          <div class="page-title-icon">
            <i class="lnr-book icon-gradient bg-mean-fruit"></i>
          </div>
          <div>
            <p>SPEAKING LEVEL TEST</p>
          </div>
        </div>
        <div class="page-title-actions" @click="show = true">
          <span class="btn-icon-wrapper pr-2">
            <p
              class="btn-icon btn dev-button btn-primary"
              style="padding: 10px 15px"
            >
              <i
                class="pe-7s-plus dev-icon btn-icon-wrapper"
                style="margin-top: -3px"
              ></i
              >Create New Question
            </p>
          </span>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="flex flex-col justify-center w-full items-center">
        <el-table
          v-if="!show"
          :data="tableData"
          :default-sort="{ prop: 'name', order: 'descending' }"
          style="width: 100%"
        >
          <el-table-column prop="name" label="Name" sortable width="240">
          </el-table-column>
          <el-table-column prop="content" label="Content"> </el-table-column>
          <el-table-column width="160" label="Action">
            <template slot-scope="scope">
              <el-button
                size="mini"
                @click="handleEdit(scope.$index, scope.row)"
                >Edit</el-button
              >
              <el-button
                size="mini"
                type="danger"
                @click="handleDelete(scope.$index, scope.row)"
                >Delete</el-button
              >
            </template>
          </el-table-column>
        </el-table>
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
  components: {
    StarRating,
    Input,
    Button,
    Select,
    Form,
    Editor
  },
  data() {
    return {
      tableData: [
        {
          id: "1",
          name: "Luyện chủ đề 1",
          content:
            "Tomomomomomomomomomomomomomomomomomomomomomomomomomomomomomomomomomomomomomomomomomomomomomomomomomomomomomomomomomomomomomomomomomomomomomomomomomomomomomomomomomomomomomomomomomomomomomomomomomomomomomomomomomomomomomomomomomomomomomomomomomom",
        },
        {
          id: "2",
          name: "Luyện chủ đề 2",
          content: "Tom",
        },
        {
          id: "3",
          name: "Luyện chủ đề 3",
          content: "Tom",
        },
        {
          id: "4",
          name: "Luyện chủ đề 4",
          content: "Tom",
        },
      ],
      show: false,
      form: {
        name: "",
        content: "",
      },
    };
  },
  methods: {
    formatter(row, column) {
      return row.address;
    },
  },

  // created() {
  //     setTimeout(() => {
  //         this.isLoading = false;
  //     }, 3000);
  // },
};
</script>
<style scoped>
::v-deep .el-table .cell {
  white-space: nowrap;
  text-overflow: ellipsis;
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
</style>
  