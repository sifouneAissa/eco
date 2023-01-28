<script setup>
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import AuthenticationCard from "@/Components/AuthenticationCard.vue";
import AuthenticationCardLogo from "@/Components/AuthenticationCardLogo.vue";
import Checkbox from "@/Components/Checkbox.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";

defineProps({
  canResetPassword: Boolean,
  status: String,
});

const form = useForm({
  email: "",
  password: "",
  for_admin: true,
  remember: false,
});

const submit = () => {
  form
    .transform((data) => ({
      ...data,
      remember: form.remember ? "on" : "",
    }))
    .post(route("login"), {
      onFinish: () => form.reset("password"),
      onSuccess: () => window.location.reload(),
    });
};
</script>

<template>
  <Head :title="$t('login.welcome')" />

  <div id="layoutAuthentication" class="bg-primary">
    <div id="layoutAuthentication_content">
      <main>
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-5">
              <div class="card shadow-lg border-0 rounded-lg mt-5">
                <div class="card-header">
                  <h3 class="text-center font-weight-light my-4">Login</h3>
                </div>
                <div class="card-body">
                  <form @submit.prevent="submit">
                    <div class="form-group">
                      <label class="small mb-1" for="inputEmailAddress">Email</label>
                      <input
                        v-model="form.email"
                        class="form-control py-4"
                        id="inputEmailAddress"
                        required
                        type="email"
                        placeholder="Enter email address"
                      />
                      <div v-show="form.errors.email">
                        <p class="text-sm text-red-600" style="color: red">
                          {{ form.errors.email }}
                        </p>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="small mb-1" for="inputPassword">Password</label>
                      <input
                        v-model="form.password"
                        class="form-control py-4"
                        id="inputPassword"
                        required
                        type="password"
                        placeholder="Enter password"
                      />
                      <div v-show="form.errors.password">
                        <p class="text-sm text-red-600" style="color: red">
                          {{ form.errors.password }}
                        </p>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox">
                        <input
                          v-model="form.remember"
                          class="custom-control-input"
                          id="rememberPasswordCheck"
                          type="checkbox"
                        />
                        <label class="custom-control-label" for="rememberPasswordCheck"
                          >Remember password</label
                        >
                      </div>
                    </div>
                    <div
                      class="form-group d-flex align-items-center justify-content-between mt-4 mb-0"
                    >
                      <!--                                            <a class="small" href="password.html">Forgot Password?</a>-->
                      <button
                        type="submit"
                        :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing"
                        class="btn btn-primary"
                      >
                        Login
                      </button>
                    </div>
                  </form>
                </div>
                <!--                                <div class="card-footer text-center">-->
                <!--                                    <div class="small"><a href="register.html">Need an account? Sign up!</a></div>-->
                <!--                                </div>-->
              </div>
            </div>
          </div>
        </div>
      </main>
    </div>
    <div id="layoutAuthentication_footer">
      <footer class="py-4 bg-light mt-auto">
        <div class="container-fluid">
          <div class="d-flex align-items-center justify-content-between small">
            <div class="text-muted">Himpies © 2023 Developed by Cover Data</div>
            <div>
              <a href="#">Privacy Policy</a>
              &middot;
              <a href="#">Terms &amp; Conditions</a>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>
</template>
<style scoped>
/* a {
  color: #7aa649;
}
.btn-primary {
  border-color: #7aa649;
  background-color: #7aa649;
}
.bg-primary {
  background: linear-gradient(45deg, #7aa649 0%, #7aa649 100%);
} */
</style>
