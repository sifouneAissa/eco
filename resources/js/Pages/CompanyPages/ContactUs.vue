<script >
import GuestLayout from "@/Layouts/GuestLayout.vue";
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import breadcrumb from "@/Pages/Common/breadcrumb.vue";
import { useToast } from "vue-toastification";
 export  default   {
    components : {
        GuestLayout,
        Head,
        Link,
        breadcrumb,
    },
     data () {
        return {
            submited : false,
            form : useForm({
                name: "",
                email: "",
                phone: "",
                message: "",
            }),
            errors: {
                message : this.$t("errors.correct_field"),
                email: this.$t("errors.correct_field"),
                phone: this.$t("errors.mobile"),
                name: this.$t("errors.correct_field"),
            },
        }
     },
     methods : {
        submit : function (){
            this.form.post(this.route('contactus.store'),{
                onSuccess : () => {
                    const toast = useToast();
                    toast.success('Your message has been sent successfully');
                    this.form.reset('name','email','phone','message')
                }
            })
        },
         emailReg : function (){
             return String(this.form.email)
                 .toLowerCase()
                 .match(
                     /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
                 );
         },
        vData(){

            this.submited  = true;
            if(this.isPhone() && this.isName() && this.isMessage() && this.emailReg()){
                this.submit();
            }
        },
         isPhone: function () {
             return this.form.phone.match(
                 /^(?:(?:\(?(?:00|\+)([1-4]\d\d|[1-9]\d?)\)?)?[\-\.\ \\\/]?)?((?:\(?\d{1,}\)?[\-\.\ \\\/]?){0,})(?:[\-\.\ \\\/]?(?:#|ext\.?|extension|x)[\-\.\ \\\/]?(\d+))?$/g
             );
         },
         isName: function () {
             return this.form.name.length > 3;
         },
         isMessage : function (){

             return this.form.message.length > 3;
         }
     }
}
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
              <form id="contact-form">
                <input v-model="form.name" type="text" name="name" :placeholder="$t('contact_us.name')" />
                  <div v-show="this.submited && !isName()">
                      <p class="text-sm" style="color: red">
                          {{ this.errors.name }}
                      </p>
                  </div>
                <input v-model="form.email" type="email" name="email" :placeholder="$t('contact_us.email')" />
                  <div v-show="this.submited && !emailReg()">
                      <p class="text-sm" style="color: red">
                          {{ this.errors.email }}
                      </p>
                  </div>
                <input v-model="form.phone" type="text" name="phone" :placeholder="$t('contact_us.phone')" />
                  <div v-show="this.submited && !isPhone()">
                      <p class="text-sm" style="color: red">
                          {{ this.errors.phone }}
                      </p>
                  </div>
                <textarea
                  v-model="form.message"
                  name="message"
                  :placeholder="$t('contact_us.message')"
                ></textarea>
                  <div v-show="this.submited && !isMessage">
                      <p class="text-sm" style="color: red">
                          {{ this.errors.message }}
                      </p>
                  </div>
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
                    type="button"
                    @click="vData"
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
