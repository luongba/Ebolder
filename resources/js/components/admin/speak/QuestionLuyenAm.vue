<template>
  <div>
    <LoadingVue v-if="isLoading" />
    <transition name="fade">
      <div class="w-full h-full" v-if="show">
        <div
          class="absolute inset-0 bg-blur flex items-center justify-center"
          style="z-index: 999"
        >
          <div class="w-[95%] md:w-[70%] bg-white shadow-sm px-4 py-4">
            <div class="py-2 relative">
              <h1 class="font-semibold uppercase text-[14px]">
                Create new Topic
              </h1>
              <span
                class="absolute right-[5px] top-[5px] text-[20px] cursor-pointer"
                @click="resetFeild()"
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
              <div class="">
                <el-form-item label="Exam" prop="isExam">
                  <el-switch v-model="form.isExam"></el-switch>
                </el-form-item>
              </div>
              <div class="flex justify-end items-center mt-4">
                <el-button plain @click="resetFeild">Cancel</el-button>
                <el-button type="primary" @click="createQuestion('ruleForm')">{{
                  !isEdit ? "Create" : "Edit"
                }}</el-button>
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
            <p>SPEAKING </p>
          </div>
        </div>
        <div
          class="page-title-actions"
          @click="
            show = true;
            isEdit = false;
          "
        >
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
          <el-table-column prop="is_exam" label="is exam">
            <template slot-scope="scope">
              <el-tag
                :type="scope.row.is_exam == 0 ? 'danger' : 'success'"
                disable-transitions
                >{{ scope.row.is_exam == 0 ? 'Disable' : "Enable" }}</el-tag
              >
            </template>
          </el-table-column>
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
                @click="deleteQuestion(scope.$index, scope.row)"
                >Delete</el-button
              >
            </template>
          </el-table-column>
        </el-table>
        <el-pagination
          background
          layout="prev, pager, next"
          :total="total"
          :current-page.sync="current"
          :page-size="perPage"
          @prev-click="paginateClick"
          @next-click="paginateClick"
          @current-change="paginateClick"
        >
        </el-pagination>
      </div>
    </div>
  </div>
</template>
  
  <script>
import baseRequest from "../../../utils/baseRequest";

import StarRating from "vue-star-rating";
import { Input, Button, Select, Form } from "element-ui";
import Editor from "@tinymce/tinymce-vue";
import LoadingVue from "../loading/Loading.vue";

export default {
  components: {
    StarRating,
    Input,
    Button,
    Select,
    Form,
    Editor,
    LoadingVue,
  },
  data() {
    return {
      tableData: [],
      show: false,
      form: {
        name: "",
        content: "",
        isExam: false,
      },
      rules: {
        name: [
          {
            required: true,
            message: "Please input name",
            trigger: "blur",
          },
        ],
        content: [
          {
            required: true,
            message: "Please input content",
            trigger: "blur",
          },
        ],
      },
      total: 1,
      current: 1,
      pageSize: 1,
      perPage: 1,
      isLoading: false,
      isEdit: false,
      ids: null,
    };
  },

  methods: {
    formatter(row, column) {
      return row.address;
    },
    handleEdit(index, row) {
      this.show = true;
      this.isEdit = true;
      this.ids = row.id;
      this.form = {
        name: row.name,
        content: row.content,
        isExam: row.is_exam === 0 ? false : true,
      };
    },
    resetFeild() {
      this.form = {
        name: "",
        content: "",
      };
      this.show = false;
    },
    async createQuestion(rule) {
      this.$refs[rule].validate(async (valid) => {
        if (!valid) {
          return false;
        } else {
          if (this.form.content.length === 0) {
            this.$notify({
              title: "Cảnh báo",
              message: "Trường content chưa được nhập!",
              type: "warning",
            });
            return;
          } else {
            if (!this.isEdit) {
              try {
                let result = await baseRequest.post(
                  `/admin/create-question-luyen-am/`,
                  {
                    name: this.form.name,
                    content: this.form.content,
                    isExam: this.form.isExam ? 1 : 0,
                  }
                );
                if (result.data.status === 200) {
                  this.$message({
                    message: result.data.message,
                    type: "success",
                  });
                  this.getAllData();
                }
              } catch (error) {
                console.log(
                  "🚀 ~ file: QuestionLuyenAm.vue:224 ~ this.$refs[rule].validate ~ error:",
                  error
                );
              } finally {
                this.show = false;
              }
            } else {
              this.updateQuestion();
            }
            return true;
          }
        }
      });
    },
    async updateQuestion() {
      try {
        let result = await baseRequest.post(
          `/admin/update-question-luyen-am/${this.ids}`,
          {
            name: this.form.name,
            content: this.form.content,
            isExam: this.form.isExam ? 1 : 0,
          }
        );
        if (result.data.status === 200) {
          this.$message({
            message: result.data.message,
            type: "success",
          });
          this.getAllData();
        }
      } catch (error) {
        console.log(
          "🚀 ~ file: QuestionLuyenAm.vue:224 ~ this.$refs[rule].validate ~ error:",
          error
        );
      } finally {
        this.show = false;
      }
    },
    async getAllData() {
      this.isLoading = true;
      try {
        let result = await baseRequest.get(
          `/admin/all-question-luyen-am?page=${this.current}`,
          this.form
        );
        if (result.data.status === 200) {
          this.tableData = result.data.data.data;
          this.total = result.data.data.total;
          this.current = result.data.data.current_page;
          this.pageSize = result.data.data.last_page;
          this.perPage = result.data.data.per_page;
        }
      } catch (error) {
        console.log(
          "🚀 ~ file: QuestionLuyenAm.vue:224 ~ this.$refs[rule].validate ~ error:",
          error
        );
      } finally {
        this.isLoading = false;
      }
    },
    paginateClick(curentPage) {
      this.current = curentPage;
      this.getAllData();
    },
    deleteQuestion(id, row) {
      this.$confirm(
        "This will permanently delete the Question. Continue?",
        "Warning",
        {
          confirmButtonText: "OK",
          cancelButtonText: "Cancel",
          type: "warning",
        }
      )
        .then(async () => {
          try {
            let rs = await baseRequest.post(
              `/admin/delete-question-luyen-am/${row.id}`
            );
            if (rs.data.status == 200) {
              this.getAllData();
              this.$message({
                type: "success",
                message: "Delete completed",
              });
            } else {
              this.$message({
                type: "error",
                message: "Delete error",
              });
            }
          } catch (e) {
            console.log(e);
            this.$message({
              type: "error",
              message: "Delete error",
            });
          }
        })
        .catch(() => {
          return;
        });
    },
  },

  created() {
    this.getAllData();
  },
};
</script>
<style scoped>
::v-deep .el-table .cell {
  white-space: nowrap;
  text-overflow: ellipsis;
}
.bg-blur {
  background: rgba(0, 0, 0, 0.1);
}
.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.2s;
}
.fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
  opacity: 0;
}
</style>
  