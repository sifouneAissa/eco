<script>
import GuestLayout from "@/Layouts/GuestLayout.vue";
import breadcrumb from "@/Pages/Common/breadcrumb.vue";
export default {
  components: {
    GuestLayout,
    breadcrumb,
  },
};
</script>

<template>
  <GuestLayout :title="$t('nav_menu.help.privacy_policy')">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ $t("nav_menu.help.privacy_policy") }}
      </h2>
    </template>
    <breadcrumb :title="$t('nav_menu.help.privacy_policy')" />
    <div class="ltn__about-us-area padding-section">
      <div class="container">
        <div class="row">
          <div class="col-12 align-self-center">
            <h1>{{ $t("nav_menu.help.privacy_policy") }}</h1>
            <p>
              {{ $t("privacy_policy.text") }}
            </p>
            <p>
              {{ $t("privacy_policy.text2") }}
            </p>
            <p>
              {{ $t("privacy_policy.text3") }}
            </p>
          </div>
        </div>
      </div>
    </div>
  </GuestLayout>
</template>
<style scoped>
@media only screen and (min-width: 800px) {
  .padding-section {
    padding-bottom: 80px;
    padding-top: 0px;
  }
}
@media only screen and (max-width: 600px) {
  .padding-section {
    padding-bottom: 40px;
    padding-top: 0px;
  }
}
</style>
