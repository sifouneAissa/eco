<template>
  <div id="address" class="bg-white rounded shadow-sm p-4 mb-4">
    <div>
      <h4 class="mb-1">
        {{ $t("listing.checkout_card.choose_address") }}
        <button
          v-if="showAdd"
          class="float-right btn btn-outline-dark"
          @click="add = !add"
        >
          {{ $t("listing.checkout_card.add") }}
        </button>
      </h4>
      <h6 class="mb-3 text-black-50">{{ $t("listing.checkout_card.desc_address") }}</h6>
    </div>

    <div class="row">
      <div
        v-for="model in sModels"
        :key="model.mobile"
        :class="card_class ? card_class : 'col-md-6'"
      >
        <div class="bg-white card addresses-item">
          <div class="gold-members p-4">
            <div class="media">
              <div class="mr-3"><i class="icofont-location-pin icofont-3x"></i></div>
              <div class="media-body">
                <h6 class="mb-1 text-secondary">{{ model.city }}</h6>
                <p>{{ model.address_line_1 }},{{ model.city }},{{ model.country }}</p>
                <p class="mb-0 text-black font-weight-bold">
                  <a
                    href="javascript: void(0)"
                    @click="setSelectedAddress(model)"
                    :class="
                      'btn btn-sm mr-2 ' +
                      (selectedA.id === model.id ||
                      (selectedA.toCreate === true && model.toCreate)
                        ? 'theme-btn-1'
                        : 'btn-secondary')
                    "
                  >
                    {{ $t("listing.checkout_card.deliver_here") }}</a
                  >
                </p>
                <p v-if="model.toCreate" class="mb-0 text-black font-weight-bold">
                  <a
                    href="javascript: void(0)"
                    @click="add = true"
                    :class="'btn btn-sm mr-2 btn-danger'"
                  >
                    {{ $t("listing.checkout_card.edit") }}</a
                  >
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
   <div class="mt-2">
       <label class="input-info-save mb-0"><input type="checkbox" name="agree"> Create an account?</label>

   </div>
   <div v-if="add" class="modal-content mt-3">
      <div class="modal-header">
        <h5 class="modal-title m-3" id="add-address">
          {{ $t("account.addresses.add_card.title") }}
        </h5>
      </div>
      <div class="modal-body">
        <!--                <form >-->
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="address_line_1">{{
              $t("account.addresses.add_card.address1")
            }}</label>
            <div class="input-group">
              <input
                required
                type="text"
                v-model="add_form.address_line_1"
                class="form-control"
                id="address_line_1"
                :placeholder="$t('account.addresses.add_card.address1')"
              />
              <!--                                <div class="input-group-append">-->
              <!--                                    <button class="btn btn-outline-secondary" type="button" id="button-addon2"><i class="icofont-ui-pointer"></i></button>-->
              <!--                                </div>-->
            </div>
            <div v-if="this.submited && !isText(add_form.address_line_1)">
              <p class="text-sm" style="color: red">
                {{ errors.address_line_1 }}
              </p>
            </div>
          </div>
          <div class="form-group col-md-6">
            <label for="address_line_1">{{
              $t("account.addresses.add_card.address2")
            }}</label>
            <div class="input-group">
              <input
                required
                type="text"
                v-model="add_form.address_line_2"
                class="form-control"
                id="address_line_2"
                :placeholder="$t('account.addresses.add_card.address2')"
              />
            </div>
            <div v-if="this.submited && !isText(add_form.address_line_2)">
              <p class="text-sm" style="color: red">
                {{ errors.address_line_2 }}
              </p>
            </div>
          </div>

          <div class="form-group col-md-6">
            <label for="city">{{ $t("account.addresses.add_card.city") }}</label>
            <div class="input-group">
              <input
                required
                type="text"
                v-model="add_form.city"
                class="form-control"
                id="city"
                :placeholder="$t('account.addresses.add_card.city')"
              />
            </div>
            <div v-if="this.submited && !isText(add_form.city)">
              <p class="text-sm" style="color: red">
                {{ errors.city }}
              </p>
            </div>
          </div>
          <div class="form-group col-md-6">
            <label for="Country">{{ $t("account.addresses.add_card.country") }}</label>
            <div class="input-group">
              <input
                required
                type="text"
                v-model="add_form.country"
                class="form-control"
                id="Country"
                :placeholder="$t('account.addresses.add_card.country')"
              />
            </div>
            <div v-if="this.submited && !isText(add_form.country)">
              <p class="text-sm" style="color: red">
                {{ errors.country }}
              </p>
            </div>
          </div>

          <div class="form-group col-md-6">
            <label for="mobile">{{ $t("account.addresses.add_card.mobile") }}</label>
            <div class="input-group">
              <input
                required
                type="text"
                v-model="add_form.mobile"
                class="form-control"
                id="mobile"
                :placeholder="$t('account.addresses.add_card.mobile')"
              />
            </div>
            <div v-if="this.submited && !isPhone(add_form.mobile)">
              <p class="text-sm" style="color: red">
                {{ errors.mobile }}
              </p>
            </div>
          </div>
          <div class="form-group col-md-6">
            <label for="telephone">{{
              $t("account.addresses.add_card.telephone")
            }}</label>
            <div class="input-group">
              <input
                required
                type="text"
                v-model="add_form.telephone"
                class="form-control"
                id="telephone"
                :placeholder="$t('account.addresses.add_card.telephone')"
              />
            </div>

            <div v-if="this.submited && !isPhone(add_form.telephone)">
              <p class="text-sm" style="color: red">
                {{ errors.telephone }}
              </p>
            </div>
          </div>
          <div class="form-group col-md-6">
            <label for="postal_code">{{
              $t("account.addresses.add_card.postal_code")
            }}</label>
            <div class="input-group">
              <input
                required
                type="text"
                v-model="add_form.postal_code"
                class="form-control"
                id="postal_code"
                :placeholder="$t('account.addresses.add_card.postal_code')"
              />
            </div>

            <div v-if="this.submited && !postalCode()">
              <p class="text-sm" style="color: red">
                {{ errors.postal_code }}
              </p>
            </div>
          </div>
        </div>

        <div class="modal-footer">
          <button
            @click="setSelectedAddress(this.add_form)"
            class="btn d-flex w-50 text-center justify-content-center theme-btn-1"
          >
            {{ $t("account.addresses.add_card.save") }}
          </button>
        </div>
        <!--                </form>-->
      </div>
    </div>
  </div>
</template>

<script>
import { useForm } from "@inertiajs/inertia-vue3";

export default {
  props: ["models", "card_class"],
  created() {
    if (this.models && this.models.length) {
      this.setSelectedAddress(this.models[0]);
      this.selectedA = this.models[0];
    }

    this.add = this.selectedA === null;
  },
  data() {
    return {
      submited: false,
      selectedA: null,
      sModels: this.models ? this.models : [],
      add_form: {
        address_line_1: "",
        address_line_2: "",
        city: "",
        postal_code: "",
        country: "",
        mobile: "",
        telephone: "",
        toCreate: true,
      },
      errors: {
        address_line_1: this.$t("errors.correct_field"),
        address_line_2: this.$t("errors.correct_field"),
        city: this.$t("errors.correct_field"),
        postal_code: this.$t("errors.correct_field"),
        country: this.$t("errors.correct_field"),
        mobile: this.$t("errors.mobile"),
        telephone: this.$t("errors.telephone"),
      },
      add: false,
    };
  },
  computed: {
    vData: function () {
      return (
        this.isText(this.add_form.address_line_1) &&
        this.isText(this.add_form.address_line_2) &&
        this.isText(this.add_form.city) &&
        this.isText(this.add_form.country) &&
        this.isPhone(this.add_form.mobile) &&
        this.isPhone(this.add_form.telephone) &&
        this.postalCode()
      );
    },
    showAdd: function () {
      return !this.sModels.filter(function (item) {
        return item.toCreate;
      }).length;
    },
  },
  methods: {
    isPhone: function (value) {
      return value.match(
        /^(?:(?:\(?(?:00|\+)([1-4]\d\d|[1-9]\d?)\)?)?[\-\.\ \\\/]?)?((?:\(?\d{1,}\)?[\-\.\ \\\/]?){0,})(?:[\-\.\ \\\/]?(?:#|ext\.?|extension|x)[\-\.\ \\\/]?(\d+))?$/g
      );
    },
    isText: function (value) {
      return value.length > 2;
    },
    postalCode: function () {
      return this.add_form.postal_code.match(/^[0-9]{5}(?:-[0-9]{4})?$/);
    },

    setSelectedAddress(model) {
      this.submited = model.toCreate === true;
      if (!model.toCreate || (model.toCreate && this.vData)) {
        this.selectedA = model;

        if (model.toCreate) {
          if (this.showAdd) this.sModels.push(model);
          this.add = false;
        }

        this.$emit("SetSelectedAddress", model);
      }
    },
  },
};
</script>
