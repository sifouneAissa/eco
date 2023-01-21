<template>
  <div class="tab-pane fade" id="liton_tab_1_5">
    <div class="ltn__myaccount-tab-content-inner">
      <!-- <p>The following addresses will be used on the checkout page by default.</p> -->
      <div class="ltn__form-box">
        <div>
          <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <div v-if="$page.props.jetstream.canUpdateProfileInformation">
              <UpdateProfileInformationForm :user="$page.props.user" />

              <SectionBorder />
            </div>

            <div v-if="$page.props.jetstream.canUpdatePassword" class="mt-5">
              <UpdatePasswordForm class="mt-10 sm:mt-0" />

              <SectionBorder />
            </div>

            <div
              v-if="$page.props.jetstream.canManageTwoFactorAuthentication"
              class="mt-5"
            >
              <TwoFactorAuthenticationForm
                :requires-confirmation="confirmsTwoFactorAuthentication"
                class="mt-10 sm:mt-0"
              />

              <SectionBorder />
            </div>

            <LogoutOtherBrowserSessionsForm :sessions="sessions" class="mt-10 sm:mt-0" />

            <template v-if="$page.props.jetstream.hasAccountDeletionFeatures">
              <SectionBorder />

              <DeleteUserForm class="mt-10 sm:mt-0" />
            </template>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import DeleteUserForm from "@/Pages/Profile/Partials/DeleteUserForm.vue";
import LogoutOtherBrowserSessionsForm from "@/Pages/Profile/Partials/LogoutOtherBrowserSessionsForm.vue";
import SectionBorder from "@/Components/SectionBorder.vue";
import TwoFactorAuthenticationForm from "@/Pages/Profile/Partials/TwoFactorAuthenticationForm.vue";
import UpdatePasswordForm from "@/Pages/Profile/Partials/UpdatePasswordForm.vue";
import UpdateProfileInformationForm from "@/Pages/Profile/Partials/UpdateProfileInformationForm.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";

export default {
  data() {
    return {
      confirmsTwoFactorAuthentication: this.$page.props.confirmsTwoFactorAuthentication,
      sessions: this.$page.props.sessions,
    };
  },
  mounted() {},
  components: {
    UpdateProfileInformationForm,
    DeleteUserForm,
    LogoutOtherBrowserSessionsForm,
    SectionBorder,
    TwoFactorAuthenticationForm,
    UpdatePasswordForm,
  },
};
</script>
