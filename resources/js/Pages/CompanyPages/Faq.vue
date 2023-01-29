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
    Link,
  },
};
</script>

<template>
  <GuestLayout :title="$t('nav_menu.help.faq')">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ $t("nav_menu.help.faq") }}
      </h2>
    </template>
    <breadcrumb :title="$t('nav_menu.help.faq')" />
    <!-- FAQ AREA START (faq-2) (ID > accordion_2) -->
    <div class="ltn__faq-area mb-80">
      <div class="container">
        <div class="row">
          <div class="col-lg-8">
            <div class="ltn__faq-inner ltn__faq-inner-2">
              <div id="accordion_2">
                <!-- card -->
                <div class="card">
                  <h6
                    class="collapsed ltn__card-title"
                    data-toggle="collapse"
                    data-target="#faq-item-2-1"
                    aria-expanded="false"
                  >
                    {{ $t("faq.questions.question1") }}
                  </h6>
                  <div id="faq-item-2-1" class="collapse" data-parent="#accordion_2">
                    <div class="card-body">
                      <p>
                        {{ $t("faq.questions.answer1") }}
                      </p>
                    </div>
                  </div>
                </div>
                <!-- card -->
                <div class="card">
                  <h6
                    class="ltn__card-title"
                    data-toggle="collapse"
                    data-target="#faq-item-2-2"
                    aria-expanded="true"
                  >
                    {{ $t("faq.questions.question2") }}
                  </h6>
                  <div id="faq-item-2-2" class="collapse show" data-parent="#accordion_2">
                    <div class="card-body">
                      <p>
                        {{ $t("faq.questions.answer2") }}
                      </p>
                    </div>
                  </div>
                </div>
                <!-- card -->
                <div class="card">
                  <h6
                    class="collapsed ltn__card-title"
                    data-toggle="collapse"
                    data-target="#faq-item-2-3"
                    aria-expanded="false"
                  >
                    {{ $t("faq.questions.question3") }}?
                  </h6>
                  <div id="faq-item-2-3" class="collapse" data-parent="#accordion_2">
                    <div class="card-body">
                      <p>
                        {{ $t("faq.questions.answer3") }}
                      </p>
                    </div>
                  </div>
                </div>
                <!-- card -->
                <div class="card">
                  <h6
                    class="collapsed ltn__card-title"
                    data-toggle="collapse"
                    data-target="#faq-item-2-4"
                    aria-expanded="false"
                  >
                    {{ $t("faq.questions.question4") }}
                  </h6>
                  <div id="faq-item-2-4" class="collapse" data-parent="#accordion_2">
                    <div class="card-body">
                      <p>
                        {{ $t("faq.questions.answer4") }}
                      </p>
                    </div>
                  </div>
                </div>
                <!-- card -->
                <div class="card">
                  <h6
                    class="collapsed ltn__card-title"
                    data-toggle="collapse"
                    data-target="#faq-item-2-5"
                    aria-expanded="false"
                  >
                    {{ $t("faq.questions.question4") }}
                  </h6>
                  <div id="faq-item-2-5" class="collapse" data-parent="#accordion_2">
                    <div class="card-body">
                      <p>
                        {{ $t("faq.questions.answer4") }}
                      </p>
                    </div>
                  </div>
                </div>
                <!-- card -->
                <div class="card">
                  <h6
                    class="collapsed ltn__card-title"
                    data-toggle="collapse"
                    data-target="#faq-item-2-6"
                    aria-expanded="false"
                  >
                    {{ $t("faq.questions.question5") }}
                  </h6>
                  <div id="faq-item-2-6" class="collapse" data-parent="#accordion_2">
                    <div class="card-body">
                      <p>
                        {{ $t("faq.questions.answer5") }}
                      </p>
                    </div>
                  </div>
                </div>
                <!-- card -->
                <div class="card">
                  <h6
                    class="collapsed ltn__card-title"
                    data-toggle="collapse"
                    data-target="#faq-item-2-7"
                    aria-expanded="false"
                  >
                    {{ $t("faq.questions.question6") }}
                  </h6>
                  <div id="faq-item-2-7" class="collapse" data-parent="#accordion_2">
                    <div class="card-body">
                      <p>
                        {{ $t("faq.questions.answer6") }}
                      </p>
                    </div>
                  </div>
                </div>
                <!-- card -->
                <div class="card">
                  <h6
                    class="collapsed ltn__card-title"
                    data-toggle="collapse"
                    data-target="#faq-item-2-8"
                    aria-expanded="false"
                  >
                    {{ $t("faq.questions.question7") }}
                  </h6>
                  <div id="faq-item-2-8" class="collapse" data-parent="#accordion_2">
                    <div class="card-body">
                      <p>
                        {{ $t("faq.questions.answer7") }}
                      </p>
                    </div>
                  </div>
                </div>
                <!-- card -->
                <div class="card">
                  <h6
                    class="collapsed ltn__card-title"
                    data-toggle="collapse"
                    data-target="#faq-item-2-9"
                    aria-expanded="false"
                  >
                    {{ $t("faq.questions.question8") }}
                  </h6>
                  <div id="faq-item-2-9" class="collapse" data-parent="#accordion_2">
                    <div class="card-body">
                      <p>
                        {{ $t("faq.questions.answer8") }}
                      </p>
                    </div>
                  </div>
                </div>
                <!-- card -->
                <div class="card">
                  <h6
                    class="collapsed ltn__card-title"
                    data-toggle="collapse"
                    data-target="#faq-item-2-10"
                    aria-expanded="false"
                  >
                    {{ $t("faq.questions.question9") }}
                  </h6>
                  <div id="faq-item-2-10" class="collapse" data-parent="#accordion_2">
                    <div class="card-body">
                      <p>
                        {{ $t("faq.questions.answer9") }}
                      </p>
                    </div>
                  </div>
                </div>
                <!-- card -->
                <div class="card">
                  <h6
                    class="collapsed ltn__card-title"
                    data-toggle="collapse"
                    data-target="#faq-item-2-11"
                    aria-expanded="false"
                  >
                    {{ $t("faq.questions.question10") }}
                  </h6>
                  <div id="faq-item-2-11" class="collapse" data-parent="#accordion_2">
                    <div class="card-body">
                      <p>
                        {{ $t("faq.questions.answer10") }}
                      </p>
                    </div>
                  </div>
                </div>
                <!-- card -->
                <div class="card">
                  <h6
                    class="collapsed ltn__card-title"
                    data-toggle="collapse"
                    data-target="#faq-item-2-12"
                    aria-expanded="false"
                  >
                    {{ $t("faq.questions.question11") }}
                  </h6>
                  <div id="faq-item-2-12" class="collapse" data-parent="#accordion_2">
                    <div class="card-body">
                      <p>
                        {{ $t("faq.questions.answer11") }}
                      </p>
                    </div>
                  </div>
                </div>
                <!-- card -->
                <div class="card">
                  <h6
                    class="collapsed ltn__card-title"
                    data-toggle="collapse"
                    data-target="#faq-item-2-13"
                    aria-expanded="false"
                  >
                    {{ $t("faq.questions.question12") }}
                  </h6>
                  <div id="faq-item-2-13" class="collapse" data-parent="#accordion_2">
                    <div class="card-body">
                      <p>
                        {{ $t("faq.questions.answer12") }}
                      </p>
                    </div>
                  </div>
                </div>
                <!-- card -->
                <div class="card">
                  <h6
                    class="collapsed ltn__card-title"
                    data-toggle="collapse"
                    data-target="#faq-item-2-14"
                    aria-expanded="false"
                  >
                    {{ $t("faq.questions.question13") }}
                  </h6>
                  <div id="faq-item-2-14" class="collapse" data-parent="#accordion_2">
                    <div class="card-body">
                      <p>
                        {{ $t("faq.questions.answer13") }}
                      </p>
                    </div>
                  </div>
                </div>
                <!-- card -->
                <div class="card">
                  <h6
                    class="collapsed ltn__card-title"
                    data-toggle="collapse"
                    data-target="#faq-item-2-15"
                    aria-expanded="false"
                  >
                    {{ $t("faq.questions.question14") }}
                  </h6>
                  <div id="faq-item-2-15" class="collapse" data-parent="#accordion_2">
                    <div class="card-body">
                      <p>
                        {{ $t("faq.questions.answer14") }}
                      </p>
                    </div>
                  </div>
                </div>
                <!-- card -->
                <div class="card">
                  <h6
                    class="collapsed ltn__card-title"
                    data-toggle="collapse"
                    data-target="#faq-item-2-16"
                    aria-expanded="false"
                  >
                    {{ $t("faq.questions.question15") }}
                  </h6>
                  <div id="faq-item-2-16" class="collapse" data-parent="#accordion_2">
                    <div class="card-body">
                      <p>
                        {{ $t("faq.questions.answer15") }}
                      </p>
                    </div>
                  </div>
                </div>
                <!-- card -->
                <div class="card">
                  <h6
                    class="collapsed ltn__card-title"
                    data-toggle="collapse"
                    data-target="#faq-item-2-17"
                    aria-expanded="false"
                  >
                    {{ $t("faq.questions.question16") }}
                  </h6>
                  <div id="faq-item-2-17" class="collapse" data-parent="#accordion_2">
                    <div class="card-body">
                      <p>
                        {{ $t("faq.questions.answer16") }}
                      </p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="need-support text-center mt-100">
                <h2>{{ $t("faq.help") }}</h2>
                <div class="btn-wrapper mb-30">
                  <Link :href="route('contact-us')" class="theme-btn-1 btn">{{
                    $t("nav_menu.help.contact_us")
                  }}</Link>
                </div>
                <h3><i class="fas fa-phone"></i> {{ $page.props.phone }}</h3>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <aside class="sidebar-area ltn__right-sidebar">
              <!-- Newsletter Widget -->
              <div class="widget ltn__search-widget ltn__newsletter-widget">
                <h6 class="ltn__widget-sub-title">// {{ $t("faq.subscribe") }}</h6>
                <h4 class="ltn__widget-title">{{ $t("faq.newsletter") }}</h4>
                <form action="#">
                  <input type="text" name="search" :placeholder="$t('faq.search')" />
                  <button type="submit"><i class="fas fa-search"></i></button>
                </form>
                <div class="ltn__newsletter-bg-icon">
                  <i class="fas fa-envelope-open-text"></i>
                </div>
              </div>
              <!-- Banner Widget -->
              <div class="widget ltn__banner-widget">
                <Link :href="route('listing')"
                  ><img src="/img/banner/13.jpg" alt="Banner Image"
                /></Link>
              </div>
            </aside>
          </div>
        </div>
      </div>
    </div>
    <!-- FAQ AREA START -->
    <!-- COUNTER UP AREA START -->
    <div
      class="ltn__counterup-area bg-image bg-overlay-theme-black-10 pt-115 pb-80"
      data-bg="/img/bg/6.jpg"
    >
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-md-12">
            <div class="section-title-area ltn__section-title-2">
              <h6 class="section-subtitle white-color">// {{ $t("faq.activity") }}</h6>
              <h1 class="section-title white-color">
                {{ $t("faq.journey") }}<span>.</span>
              </h1>
            </div>
          </div>
          <div class="col-lg-2 col-md-3 col-sm-6 align-self-center">
            <div class="ltn__counterup-item-3 text-color-white">
              <div class="counter-icon">//</div>
              <h1>
                <span class="counter">733</span><span class="counterUp-icon">+</span>
              </h1>
              <h6>{{ $t("faq.clients") }}</h6>
            </div>
          </div>
          <div class="col-lg-2 col-md-3 col-sm-6 align-self-center">
            <div class="ltn__counterup-item-3 text-color-white">
              <div class="counter-icon">//</div>
              <h1>
                <span class="counter">33</span><span class="counterUp-letter">K</span
                ><span class="counterUp-icon">+</span>
              </h1>
              <h6>{{ $t("faq.coffee") }}</h6>
            </div>
          </div>
          <div class="col-lg-2 col-md-3 col-sm-6 align-self-center">
            <div class="ltn__counterup-item-3 text-color-white">
              <div class="counter-icon">//</div>
              <h1>
                <span class="counter">100</span><span class="counterUp-icon">+</span>
              </h1>
              <h6>{{ $t("faq.rewards") }}</h6>
            </div>
          </div>
          <div class="col-lg-2 col-md-3 col-sm-6 align-self-center">
            <div class="ltn__counterup-item-3 text-color-white">
              <div class="counter-icon">//</div>
              <h1>
                <span class="counter">21</span><span class="counterUp-icon">+</span>
              </h1>
              <h6>{{ $t("faq.country") }}</h6>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- COUNTER UP AREA END -->
    <PBlog :models="$page.props.blogs" />
  </GuestLayout>
</template>
