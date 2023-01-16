<script setup>
import GuestLayout from "@/Layouts/GuestLayout.vue";
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import breadcrumb from "@/Pages/Common/breadcrumb.vue";
const form = useForm({
  name: "",
  email: "",
  phone: "",
  message: "",
});

const submit = () => {
  // form.post(route(''));
};
</script>

<template>
  <GuestLayout :title="$t('nav_menu.help.contact_us')">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ $t("nav_menu.help.contact_us") }}
      </h2>
    </template>
    <breadcrumb :title="$t('nav_menu.help.contact_us')" />
    <!-- CONTACT MESSAGE AREA START -->
    <div class="ltn__contact-message-area pt-50 pb-70">
      <!-- pt-115 -->
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-7">
            <div class="ltn__form-box contact-form-box mb-50 box-shadow--- white-bg--">
              <h3>{{ $t("contact_us.send") }}</h3>
              <form id="contact-form" action="mail.php" method="post">
                <input type="text" name="name" :placeholder="$t('contact_us.name')" />
                <input type="email" name="email" :placeholder="$t('contact_us.email')" />
                <input type="text" name="phone" :placeholder="$t('contact_us.phone')" />
                <textarea
                  name="message"
                  :placeholder="$t('contact_us.message')"
                ></textarea>
                <p>
                  <label class="input-info-save mb-0"
                    ><input type="checkbox" name="agree" />{{
                      $t("contact_us.note")
                    }}</label
                  >
                </p>
                <div class="btn-wrapper mt-0">
                  <button
                    class="btn theme-btn-1 btn-effect-1 text-uppercase"
                    type="submit"
                  >
                    {{ $t("contact_us.send") }}
                  </button>
                </div>
                <p class="form-messege mb-0 mt-20"></p>
              </form>
            </div>
          </div>
          <div class="col-lg-4 col-md-5">
            <div class="ltn__contact-address-area pl-70">
              <div class="ltn__contact-address-item-4">
                <h3>{{ $t("contact_us.address") }}</h3>
                <p>
                  {{ $page.props.address }}
                </p>
              </div>
              <div class="ltn__contact-address-item-4">
                <h3>{{ $t("contact_us.email") }}</h3>
                <p>{{ $page.props.email }}</p>
              </div>
              <div class="ltn__contact-address-item-4">
                <h3>{{ $t("contact_us.phone") }}</h3>
                <p>
                  {{ $page.props.phone }}
                </p>
              </div>
              <div class="ltn__social-media mt-15">
                <ul>
                  <li>
                    <a href="#" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                  </li>
                  <li>
                    <a href="#" title="Twitter"><i class="fab fa-twitter"></i></a>
                  </li>
                  <li>
                    <a href="#" title="Behance"><i class="fab fa-behance"></i></a>
                  </li>
                  <li>
                    <a href="#" title="Youtube"><i class="fab fa-youtube"></i></a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- CONTACT MESSAGE AREA END -->
  </GuestLayout>
</template>
