<script>
import GuestLayout from "@/Layouts/GuestLayout.vue";
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import breadcrumb from "@/Pages/Common/breadcrumb.vue";
import PBlog from "@/Pages/Blog/BlogCarousel.vue";
export default {
  components: {
    GuestLayout,
    PBlog,
    breadcrumb,
  },
};
</script>

<template>
  <GuestLayout :title="$t('nav_menu.help.terms_conditions')">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ $t("nav_menu.help.terms_conditions") }}
      </h2>
    </template>
    <breadcrumb :title="$t('nav_menu.help.terms_conditions')" />
    <!-- FAQ AREA START (faq-2) (ID > accordion_2) -->
    <div class="ltn__faq-area mb-80">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <h1>{{ $t("terms_conditions.title") }}</h1>
            <p>{{ $t("terms_conditions.desc") }}</p>
          </div>
          <div class="col-lg-12">
            <div class="ltn__faq-inner ltn__faq-inner-2">
              <div id="accordion_2">
                <!-- card -->
                <div class="card">
                  <h6
                    class="collapsed ltn__card-title"
                    data-toggle="collapse"
                    data-target="#terms_conditions-item-2-1"
                    aria-expanded="false"
                  >
                    {{ $t("terms_conditions.questions.question1") }}
                  </h6>
                  <div
                    id="terms_conditions-item-2-1"
                    class="collapse"
                    data-parent="#accordion_2"
                  >
                    <div class="card-body">
                      <p>
                        {{ $t("terms_conditions.questions.answer1") }}
                      </p>
                    </div>
                  </div>
                </div>
                <!-- card -->
                <div class="card">
                  <h6
                    class="ltn__card-title"
                    data-toggle="collapse"
                    data-target="#terms_conditions-item-2-2"
                    aria-expanded="true"
                  >
                    {{ $t("terms_conditions.questions.question2") }}
                  </h6>
                  <div
                    id="terms_conditions-item-2-2"
                    class="collapse show"
                    data-parent="#accordion_2"
                  >
                    <div class="card-body">
                      <p>
                        {{ $t("terms_conditions.questions.answer2") }}
                      </p>
                    </div>
                  </div>
                </div>
                <!-- card -->
                <div class="card">
                  <h6
                    class="collapsed ltn__card-title"
                    data-toggle="collapse"
                    data-target="#terms_conditions-item-2-3"
                    aria-expanded="false"
                  >
                    {{ $t("terms_conditions.questions.question3") }}?
                  </h6>
                  <div
                    id="terms_conditions-item-2-3"
                    class="collapse"
                    data-parent="#accordion_2"
                  >
                    <div class="card-body">
                      <p>
                        {{ $t("terms_conditions.questions.answer3") }}
                      </p>
                    </div>
                  </div>
                </div>
                <!-- card -->
                <div class="card">
                  <h6
                    class="collapsed ltn__card-title"
                    data-toggle="collapse"
                    data-target="#terms_conditions-item-2-4"
                    aria-expanded="false"
                  >
                    {{ $t("terms_conditions.questions.question4") }}
                  </h6>
                  <div
                    id="terms_conditions-item-2-4"
                    class="collapse"
                    data-parent="#accordion_2"
                  >
                    <div class="card-body">
                      <p>
                        {{ $t("terms_conditions.questions.answer4") }}
                      </p>
                    </div>
                  </div>
                </div>
                <!-- card -->
                <div class="card">
                  <h6
                    class="collapsed ltn__card-title"
                    data-toggle="collapse"
                    data-target="#terms_conditions-item-2-5"
                    aria-expanded="false"
                  >
                    {{ $t("terms_conditions.questions.question4") }}
                  </h6>
                  <div
                    id="terms_conditions-item-2-5"
                    class="collapse"
                    data-parent="#accordion_2"
                  >
                    <div class="card-body">
                      <p>
                        {{ $t("terms_conditions.questions.answer4") }}
                      </p>
                    </div>
                  </div>
                </div>
                <!-- card -->
                <div class="card">
                  <h6
                    class="collapsed ltn__card-title"
                    data-toggle="collapse"
                    data-target="#terms_conditions-item-2-6"
                    aria-expanded="false"
                  >
                    {{ $t("terms_conditions.questions.question5") }}
                  </h6>
                  <div
                    id="terms_conditions-item-2-6"
                    class="collapse"
                    data-parent="#accordion_2"
                  >
                    <div class="card-body">
                      <p>
                        {{ $t("terms_conditions.questions.answer5") }}
                      </p>
                    </div>
                  </div>
                </div>
                <!-- card -->
                <div class="card">
                  <h6
                    class="collapsed ltn__card-title"
                    data-toggle="collapse"
                    data-target="#terms_conditions-item-2-7"
                    aria-expanded="false"
                  >
                    {{ $t("terms_conditions.questions.question6") }}
                  </h6>
                  <div
                    id="terms_conditions-item-2-7"
                    class="collapse"
                    data-parent="#accordion_2"
                  >
                    <div class="card-body">
                      <p>
                        {{ $t("terms_conditions.questions.answer6") }}
                      </p>
                    </div>
                  </div>
                </div>
                <!-- card -->
                <div class="card">
                  <h6
                    class="collapsed ltn__card-title"
                    data-toggle="collapse"
                    data-target="#terms_conditions-item-2-8"
                    aria-expanded="false"
                  >
                    {{ $t("terms_conditions.questions.question7") }}
                  </h6>
                  <div
                    id="terms_conditions-item-2-8"
                    class="collapse"
                    data-parent="#accordion_2"
                  >
                    <div class="card-body">
                      <p>
                        {{ $t("terms_conditions.questions.answer7") }}
                      </p>
                    </div>
                  </div>
                </div>
                <!-- card -->
                <div class="card">
                  <h6
                    class="collapsed ltn__card-title"
                    data-toggle="collapse"
                    data-target="#terms_conditions-item-2-9"
                    aria-expanded="false"
                  >
                    {{ $t("terms_conditions.questions.question8") }}
                  </h6>
                  <div
                    id="terms_conditions-item-2-9"
                    class="collapse"
                    data-parent="#accordion_2"
                  >
                    <div class="card-body">
                      <p>
                        {{ $t("terms_conditions.questions.answer8") }}
                      </p>
                    </div>
                  </div>
                </div>
                <!-- card -->
                <div class="card">
                  <h6
                    class="collapsed ltn__card-title"
                    data-toggle="collapse"
                    data-target="#terms_conditions-item-2-10"
                    aria-expanded="false"
                  >
                    {{ $t("terms_conditions.questions.question9") }}
                  </h6>
                  <div
                    id="terms_conditions-item-2-10"
                    class="collapse"
                    data-parent="#accordion_2"
                  >
                    <div class="card-body">
                      <p>
                        {{ $t("terms_conditions.questions.answer9") }}
                      </p>
                    </div>
                  </div>
                </div>
                <!-- card -->
                <div class="card">
                  <h6
                    class="collapsed ltn__card-title"
                    data-toggle="collapse"
                    data-target="#terms_conditions-item-2-11"
                    aria-expanded="false"
                  >
                    {{ $t("terms_conditions.questions.question10") }}
                  </h6>
                  <div
                    id="terms_conditions-item-2-11"
                    class="collapse"
                    data-parent="#accordion_2"
                  >
                    <div class="card-body">
                      <p>
                        {{ $t("terms_conditions.questions.answer10") }}
                      </p>
                    </div>
                  </div>
                </div>
                <!-- card -->
                <div class="card">
                  <h6
                    class="collapsed ltn__card-title"
                    data-toggle="collapse"
                    data-target="#terms_conditions-item-2-12"
                    aria-expanded="false"
                  >
                    {{ $t("terms_conditions.questions.question11") }}
                  </h6>
                  <div
                    id="terms_conditions-item-2-12"
                    class="collapse"
                    data-parent="#accordion_2"
                  >
                    <div class="card-body">
                      <p>
                        {{ $t("terms_conditions.questions.answer11") }}
                      </p>
                    </div>
                  </div>
                </div>
                <!-- card -->
                <div class="card">
                  <h6
                    class="collapsed ltn__card-title"
                    data-toggle="collapse"
                    data-target="#terms_conditions-item-2-13"
                    aria-expanded="false"
                  >
                    {{ $t("terms_conditions.questions.question12") }}
                  </h6>
                  <div
                    id="terms_conditions-item-2-13"
                    class="collapse"
                    data-parent="#accordion_2"
                  >
                    <div class="card-body">
                      <p>
                        {{ $t("terms_conditions.questions.answer12") }}
                      </p>
                    </div>
                  </div>
                </div>
                <!-- card -->
                <div class="card">
                  <h6
                    class="collapsed ltn__card-title"
                    data-toggle="collapse"
                    data-target="#terms_conditions-item-2-14"
                    aria-expanded="false"
                  >
                    {{ $t("terms_conditions.questions.question13") }}
                  </h6>
                  <div
                    id="terms_conditions-item-2-14"
                    class="collapse"
                    data-parent="#accordion_2"
                  >
                    <div class="card-body">
                      <p>
                        {{ $t("terms_conditions.questions.answer13") }}
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </GuestLayout>
</template>
