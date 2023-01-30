<template>
  <Add @resetModel="resetModel" :id="'add-product-category'" title="Add Category">
    <div class="modal-body mx-3 bg">
      <form @submit.prevent="submit">
        <div class="mb-5 form-label-group">
          <div class="form-group">
            <label>Name</label>
            <input
              v-model="form.name"
              type="text"
              class="form-control"
              placeholder="Product Name"
            />
            <add-t :type="'input'" @write="write" :attr="'Name'" :keyV="'name'" :cvalues="form.langs"/>

            <div v-show="form.errors.name">
              <p class="text-sm" style="color: red">
                {{ form.errors.name }}
              </p>
            </div>

          </div>
          <div class="form-group">
            <label>Description</label>
            <textarea
              class="form-control"
              v-model="form.desc"
              placeholder="Description"
            ></textarea>

              <add-t :type="'textarea'" @write="write" :attr="'Description'" :keyV="'desc'" :cvalues="form.langs"/>
            <div v-show="form.errors.desc">
              <p class="text-sm text-red-600" style="color: red">
                {{ form.errors.desc }}
              </p>
            </div>
          </div>


<!--            <div class=form-group>-->
<!--                <div class="custom-control custom-radio custom-control-inline">-->
<!--                    <input v-model="form.show_in_dash" type="checkbox" id="customRadioInline1" name="customRadioInline1" class="custom-control-input">-->
<!--                    <label class="custom-control-label " for="customRadioInline1">Show in Dashboard</label>-->
<!--                </div>-->
<!--            </div>-->
            <div class="mb-5 form-label-group">
                <div class="form-group">
                    <label>Section to show (Dashboard)</label>
                    <multiselect
                        v-model="form.show_in_dash"
                        :options="$page.props.sections"
                        label="name"
                        track-by="name"
                        :multiple="false"
                        placeholder="Select section"
                    ></multiselect>
<!--                    <div v-show="form.errors.product_category_id">-->
<!--                        <p class="text-sm " style="color: red">-->
<!--                            {{ form.errors.product_category_id }}-->
<!--                        </p>-->
<!--                    </div>-->
                </div>
            </div>
        </div>

        <div class="modal-footer d-flex">
          <button
            type="button"
            class="btn btn-outline-primary"
            @click="resetModel"
            data-dismiss="modal"
          >
            {{ $t("account.addresses.add_card.cancel") }}</button
          ><button type="submit" class="btn btn-primary">
            {{ $t("account.addresses.add_card.save") }}
          </button>
        </div>
      </form>
    </div>
  </Add>
</template>
<script>
import Add from "@/Pages/Admin/DataTable/Modals/Add.vue";
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import Multiselect from 'vue-multiselect'
import AddT from '@/Pages/Admin/Translations/addTranslation.vue';

export default {
  components: {
    Add,AddT,Multiselect
  },
  props: {},
  mounted() {
    let app = this;
    let modal = $("#add-product-category");
    modal.on("hidden.bs.modal", function () {
      app.$emit("ResetModel");
    });
    modal.modal("show");


  },
  data() {
    return {
      form: useForm({
        name: "",
        desc: "",
        show_in_dash : "",
        langs:[]
      }),
    };
  },
  methods: {
      write(ditem){
          this.form.langs = ditem;
      },
    resetModel: function () {
      this.$emit("ResetModel");
    },
    submit: function () {
      // this.form
      this.form
        .transform((data) => ({
          name: data.name,
          desc: data.desc,
          show_in_dash:  data.show_in_dash?.id,
          langs : data.langs
        }))
        .post(route("admin.category.store", {}), {
          headers: {
                'Content-Type' : 'application/octet-stream'
          },
          onFinish: () => {},
          onSuccess: () => {
            $("#add-product-category").modal("hide");
            $("#dataTable").DataTable().ajax.reload();
            this.$emit("ResetModel");
          },
        });
    },
  },
};
</script>

<style src="vue-multiselect/dist/vue-multiselect.css"></style>
