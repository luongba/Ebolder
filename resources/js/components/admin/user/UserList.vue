<template>
  <div class="container">
    <LoadingVue v-if="isLoading" />
    <el-table
      :data="
        tableData.filter(
          (data) =>
            !search || data.name.toLowerCase().includes(search.toLowerCase())
        )
      "
      style="width: 100%"
    >
      <el-table-column label="Name" prop="name"> </el-table-column>
      <el-table-column label="Email" prop="email"> </el-table-column>
      <el-table-column label="Phone" prop="phone"> </el-table-column>
      <el-table-column align="right">
        <template slot="header" slot-scope="scope">
          <el-input
            v-model="search"
            size="small"
            placeholder="Type to search"
          />
        </template>
        <template slot-scope="scope">
          <el-button
            size="mini"
            type="info"
            plain
            @click="handleHistory(scope.$index, scope.row)"
            v-if="scope.row.is_admin == 0"
            >History
          </el-button>
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
      total: 1,
      current: 1,
      pageSize: 1,
      perPage: 1,
      isLoading: false,
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
    async getAllUser() {
      try {
        this.isLoading = true;
        let result = await baseRequest.get(`/admin/list-user?page=${this.current}`);
        let { data } = result;
        if (data.status == 200) {
          setTimeout(() => {
            this.isLoading = false;
          }, 1000);
          this.tableData = data.data?.data.map((item) => ({
            id: item.id,
            name: item.name,
            email: item.email,
            phone: item.phone,
            is_admin: item.is_admin,
          }));
          this.isAdmin = data.isAdmin;
          this.total = result.data.data.total;
          this.current = result.data.data.current_page;
          this.pageSize = result.data.data.last_page;
          this.perPage = result.data.data.per_page;
        }
      } catch (error) {
        setTimeout(() => {
          this.isLoading = false;
        }, 1000);
        console.log(error);
      }
    },
    paginateClick(curentPage) {
      this.current = curentPage;
      this.getAllUser();
    },
  },
  created() {
    this.getAllUser();
  },
};
</script>
