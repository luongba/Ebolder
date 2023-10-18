<template>
  <div class="container">
    <LoadingVue v-if="isLoading" />
    <el-table
      :data="tableData"
      style="width: 100%"
    >
      <el-table-column label="Name" prop="name"> </el-table-column>
      <el-table-column label="Email" prop="email"> </el-table-column>
      <el-table-column label="Phone" prop="phone"> </el-table-column>
      <el-table-column align="right">
        <template slot="header" slot-scope="scope">
          <el-input
            v-model="search"
            @change="handleSearch"
            size="small"
            placeholder="Type to search"
          />
        </template>
        <template slot-scope="scope">
          <el-dropdown v-if="scope.row.is_admin == 0" size="small" split-button type="info" class="mr-2">
            History
            <el-dropdown-menu  slot="dropdown">
              <el-dropdown-item
                ><span @click="handleHistoryLearn(scope.$index, scope.row)"
                  >Learn History</span
                ></el-dropdown-item
              >
              <el-dropdown-item
                ><span @click="handleHistory(scope.$index, scope.row)"
                  >Test History</span
                ></el-dropdown-item
              >
            </el-dropdown-menu>
          </el-dropdown>
          <el-button
            size="mini"
            type="warning"
            plain
            @click="handleEdit(scope.$index, scope.row)"
            v-if="isAdmin"
            >Edit
          </el-button>
          <el-button
            size="mini"
            type="danger"
            @click="handleDelete(scope.$index, scope.row)"
            v-if="isAdmin"
            >Delete
          </el-button>
        </template>
      </el-table-column>
    </el-table>
    <div class="mt-2 flex items-center justify-center"> 
          <el-pagination background layout="prev, pager, next" v-model="page" :page-size="10" :total="total" @current-change="handleChangePage" />
        </div>
  </div>
</template>

<script>
import baseRequest from "../../../utils/baseRequest";
import LoadingVue from "../loading/Loading.vue";

export default {
  components: {
    LoadingVue,
  },
  data() {
    return {
      tableData: [
        {
          id: null,
          email: null,
          name: null,
          phone: null,
        },
      ],
      search: "",
      show: true,
      isLoading: false,
      isAdmin: true,
      isAdmin: true,
      total : 0,
      page: 1,
      timeOut: null
    };
  },
  methods: {
    handleEdit(index, row) {
      window.location.href = `${$Api.baseUrl}/admin/user/edit/` + row.id;
    },
    handleHistory(index, row) {
      window.location.href =
        `${$Api.baseUrl}/admin/user/exam-history/` + row.id;
    },
    handleHistoryLearn(index, row) {
      window.location.href =
        `${$Api.baseUrl}/admin/user/learn-history/` + row.id;
    },
    handleDelete(index, row) {
      this.$confirm(
        "This will permanently delete the file. Continue?",
        "Warning",
        {
          confirmButtonText: "OK",
          cancelButtonText: "Cancel",
          type: "warning",
        }
      )
        .then(async () => {
          try {
            let result = await baseRequest.post(`/admin/delete-user/${row.id}`);
            let { data } = result;
            if (data.status == 200) {
              this.getAllUser();
              this.$message({
                type: "success",
                message: "Delete completed",
              });
            }
          } catch (error) {
            console.log(error);
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
    async handleChangePage (page) {
      this.page = page
      await this.getAllUser()
    },
    handleSearch () {
      this.page = 1;
      this.total = 0;
      clearTimeout(this.timeOut)
      this.timeOut = setTimeout(async() => {
          await this.getAllUser()
      }, 300);
    },
    async getAllUser() {
      try {
        this.isLoading = true;
        const { data } = await baseRequest.get(`/admin/list-user?page_number=${this.page}&search=${this.search || ''}`);
        if (data.status == 200) {
          this.isLoading = false;
          const users = data?.data?.data || [];
          this.tableData = users.map((item) => ({
            id: item.id,
            name: item.name,
            email: item.email,
            phone: item.phone,
            is_admin: item.is_admin,
          }));
          this.isAdmin = data?.data?.isAdmin;
          this.total = data?.data?.total;
          this.page = data?.data?.current_page;
          
        }
      } catch (error) {
        this.isLoading = false;
      }
    }
  },
  created() {
    this.getAllUser();
  },
};
</script>
