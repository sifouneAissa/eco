<script>
import AdminLayout from "@/Pages/Admin/Layout/AdminLayout.vue";
import Datatable from "@/Pages/Admin/DataTable/Datatable.vue";
import editCategory from "@/Pages/Admin/Categories/editCategory.vue";
import deleteCategory from "@/Pages/Admin/Categories/deleteCategory.vue";
import addCategory from "@/Pages/Admin/Categories/addCategory.vue";

import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import { Inertia } from "@inertiajs/inertia";

export default {
  components: {
    AdminLayout,
    Datatable,
    editCategory,
    deleteCategory,
    addCategory,
  },
  props: ["datatableUrl", "datatableColumns", "datatableHeaders"],
  methods: {
    ShowEditModel: function (data) {
      this.modelToUpdate = data;
    },
    ShowDeleteModel: function (data) {
      this.modelToDelete = data;
    },
    ShowAddModel: function () {
      this.modelToAdd = true;
    },

    resetModel: function () {
      this.modelToUpdate = null;
      this.modelToDelete = null;
      this.modelToAdd = null;
    },
  },
  data() {
    return {
      modelToUpdate: null,
      modelToDelete: null,
      modelToAdd: null,
    };
  },
  computed: {
    model: function () {
      return this.modelToUpdate !== null;
    },
  },
};
</script>

<template>
  <AdminLayout :title="'Product categories'">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Product categories
      </h2>
    </template>

    <Datatable
      @ShowAddModel="ShowAddModel"
      @ShowDeleteModel="ShowDeleteModel"
      @ShowEditModel="ShowEditModel"
      :title="'Product categories table'"
      :datatableHeaders="datatableHeaders"
      :datatableColumns="datatableColumns"
      :datatableUrl="datatableUrl"
    />
    <editCategory
      @ResetModel="resetModel"
      v-if="model"
      :model="modelToUpdate"
    ></editCategory>
    <deleteCategory
      @ResetModel="resetModel"
      v-if="modelToDelete != null"
      :model="modelToDelete"
    ></deleteCategory>
    <addCategory @ResetModel="resetModel" v-if="modelToAdd != null"></addCategory>
  </AdminLayout>
</template>
