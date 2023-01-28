<script>
import AdminLayout from "@/Pages/Admin/Layout/AdminLayout.vue";
import Editor from "@/Pages/Admin/Editor/EditorText.vue";
import { useForm } from "@inertiajs/inertia-vue3";
import { Inertia } from "@inertiajs/inertia";

export default {
  props: ["model"],
  components: {
    AdminLayout,
    Editor,
  },
  data() {
    return {
        csrf: document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
        urls: [
        {
          name: "Blogs",
          route: this.route("admin.blog.index"),
        },
        {
          name: "Edit Blog",
          route: "#",
        },
      ],

      form: useForm({
        title: this.model.title,
        blog: this.model.blog,
        description: this.model.description
      }),
    };
  },
  mounted() {},
  methods: {
    Writing: function (data) {
      this.form.blog = data;
    },
    submit: function () {
      let app = this;
      this.form.patch(
        this.route("admin.blog.update", {
          id: this.model.id,
        }),
        {

            // headers: {
            //     'Content-Type' : 'application/x-www-form-urlencoded'
            // },
          onCancelToken: cancelToken => {
                console.log("this is cencel token")
          },
          onCancel: () => {
              console.log("this is on cancel")
          },
          onSuccess: () => {
            Inertia.visit(app.route("admin.blog.index"));
          },
        }
      );
    },
  },
};
</script>

<template>
  <AdminLayout :title="'Edit Blog'" :urls="urls">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">Orders</h2>
    </template>
    <main id="sample">
      <div class="card">
        <div class="card-header">
          <h3>Edit Blog</h3>
        </div>
        <div class="card-body">
          <div>
            <form @submit.prevent="submit">
              <div class="row">
                <div class="col-12">
                  <div class="form-group">
                    <label>Title</label>
                    <input
                      v-model="form.title"
                      type="text"
                      class="form-control"
                      placeholder="Title"
                    />
                  </div>
                  <div v-show="form.errors.title">
                    <p class="text-sm text-red-600" style="color: red">
                      {{ form.errors.title }}
                    </p>
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-group">
                    <label>Description</label>
                    <textarea
                      v-model="form.description"
                      type="text"
                      class="form-control"
                      placeholder="Description"
                    ></textarea>
                  </div>
                  <div v-show="form.errors.description">
                    <p class="text-sm text-red-600" style="color: red">
                      {{ form.errors.description }}
                    </p>
                  </div>
                </div>
                <!--                                <div class="col-md-6">-->
                <!--                                    <div class="form-group">-->
                <!--                                        <label>Category</label>-->
                <!--                                        <div>-->
                <!--                                            <select class="custom-select">-->
                <!--                                                <option>Italian</option>-->
                <!--                                                <option>Japanese</option>-->
                <!--                                                <option>Vegetarian</option>-->
                <!--                                                <option>Chinese</option>-->
                <!--                                            </select>-->
                <!--                                        </div>-->
                <!--                                    </div>-->
                <!--                                </div>-->
              </div>
              <div class="form-group">
                <Editor @Writing="Writing" :initValue="form.blog" />
                <div v-show="form.errors.blog">
                  <p class="text-sm text-red-600" style="color: red">
                    {{ form.errors.blog }}
                  </p>
                </div>
              </div>
              <button type="submit" class="btn btn-primary float-right">Save</button>
            </form>
          </div>
        </div>
      </div>
    </main>
  </AdminLayout>
</template>

<style scoped></style>
