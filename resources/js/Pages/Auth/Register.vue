<script setup>
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import AuthenticationCard from "@/Components/AuthenticationCard.vue";
import AuthenticationCardLogo from "@/Components/AuthenticationCardLogo.vue";
import Checkbox from "@/Components/Checkbox.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import GuestLayout from "@/Layouts/GuestLayout.vue";
import breadcrumb from "@/Pages/Common/breadcrumb.vue";

const form = useForm({
  name: "",
  email: "",
  password: "",
  password_confirmation: "",
  terms: false,
  check_email: true,
});

const submit = () => {
  form.post(route("register"), {
    onFinish: () => form.reset("password", "password_confirmation"),
    onSuccess: () => window.location.reload(),
    preserveScroll: true,
  });
};
</script>
<template>
  <GuestLayout :title="$t('register.welcome')">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ $t("register.welcome") }}
      </h2>
    </template>
    <!-- BREADCRUMB AREA START -->
    <breadcrumb :title="$t('nav_menu.pages.register')" />
    <!-- BREADCRUMB AREA END -->

    <!-- LOGIN AREA START (Register) -->
    <div class="ltn__login-area pb-110">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="section-title-area text-center">
              <h1 class="section-title">
                {{ $t("register.register") }} <br />{{ $t("register.your_account") }}
              </h1>
              <p>
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. <br />
                Sit aliquid, Non distinctio vel iste.
              </p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-6 offset-lg-3">
            <div class="account-login-inner">
              <form @submit.prevent="submit" class="ltn__form-box contact-form-box">
                <input
                  v-model="form.name"
                  type="text"
                  id="inputName"
                  class="form-control"
                  :placeholder="$t('register.name')"
                />
                <div v-show="form.errors.name">
                  <p class="text-sm" style="color: red">
                    {{ form.errors.name }}
                  </p>
                </div>
                <input
                  v-model="form.email"
                  type="email"
                  id="inputEmail"
                  class="form-control"
                  :placeholder="$t('register.email')"
                />
                <div v-show="form.errors.email">
                  <p class="text-sm text-red-600" style="color: red">
                    {{ form.errors.email }}
                  </p>
                </div>
                <input
                  v-model="form.password"
                  type="password"
                  id="inputPassword"
                  class="form-control"
                  :placeholder="$t('register.password')"
                />
                <div v-show="form.errors.password">
                  <p class="text-sm text-red-600" style="color: red">
                    {{ form.errors.password }}
                  </p>
                </div>
                <input
                  v-model="form.password_confirmation"
                  type="password"
                  id="inputPasswordCofirmation"
                  class="form-control"
                  :placeholder="$t('register.password_confirmation')"
                />
                <div v-show="form.errors.password_confirmation">
                  <p class="text-sm text-red-600">
                    {{ form.errors.password_confirmation }}
                  </p>
                </div>
                <label class="checkbox-inline">
                  <input type="checkbox" value="" />
                  {{ $t("register.checkbox1") }}
                </label>
                <label class="checkbox-inline">
                  <input type="checkbox" value="" />
                  {{ $t("register.checkbox2") }}
                </label>
                <div class="btn-wrapper">
                  <button
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing"
                    class="theme-btn-1 btn reverse-color btn-block"
                    type="submit"
                  >
                    {{ $t("register.sign_up") }}
                  </button>
                </div>
              </form>
              <div class="by-agree text-center">
                <p>{{ $t("register.desc1") }}:</p>
                <p>
                  <a href="#"
                    >{{ $t("nav_menu.help.terms_conditions") }} &nbsp; &nbsp; | &nbsp;
                    &nbsp; {{ $t("nav_menu.help.privacy_policy") }}</a
                  >
                </p>
                <div class="go-to-btn mt-50">
                  <Link :href="route('login')">{{ $t("login.login") }}</Link>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- LOGIN AREA END -->
  </GuestLayout>
</template>
