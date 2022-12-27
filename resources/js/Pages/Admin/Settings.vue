<script>
import AdminLayout from "@/Pages/Admin/Layout/AdminLayout.vue";
import Datatable from "@/Pages/Admin/DataTable/Datatable.vue";
import editSetting from "@/Pages/Admin/Settings/editSetting.vue";

import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import { Inertia } from "@inertiajs/inertia";

export default {
  components: {
    AdminLayout,
    Datatable,
    editSetting,
  },
  props: ["datatableUrl", "datatableColumns", "datatableHeaders", "without"],
  methods: {
    ShowEditModel: function (data) {
      this.modelToUpdate = data;
    },
    resetModel: function () {
      this.modelToUpdate = null;
    },
  },
  data() {
    return {
      modelToUpdate: null,
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
  <AdminLayout :title="'Settings'">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">Settings</h2>
    </template>

    <Datatable
      @ShowEditModel="ShowEditModel"
      :title="'Settings table'"
      :datatableHeaders="datatableHeaders"
      :datatableColumns="datatableColumns"
      :datatableUrl="datatableUrl"
      :without="without"
    />
    <editSetting
      @ResetModel="resetModel"
      v-if="model"
      :model="modelToUpdate"
    ></editSetting>
  </AdminLayout>
</template>
