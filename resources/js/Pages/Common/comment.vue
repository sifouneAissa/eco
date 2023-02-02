<template>
  <!-- comment-area -->
  <div class="ltn__comment-area mb-50">
    <h4 class="title-2">{{ $page.props.comments.length }} {{ $t("blog.comments") }}</h4>
    <div class="ltn__comment-inner">
      <ul>
        <li v-for="comment in $page.props.comments" :key="comment.id">
          <div class="ltn__comment-item clearfix">
            <div class="ltn__commenter-img">
              <img
                v-if="comment.commenter"
                :src="comment.commenter.profile_photo_url"
                alt="Image"
              />
              <img
                v-else
                :src="
                  'https://ui-avatars.com/api/?name=' +
                  comment.guest_name[0] +
                  '&color=7F9CF5&background=EBF4FF'
                "
                alt="Image"
              />
            </div>
            <div class="ltn__commenter-comment">
              <h6>
                <a href="#">{{ comment.uname ? comment.uname : comment.guest_name }}</a>
              </h6>
              <span class="comment-date">{{ comment.date }}</span>
              <p>
                {{ comment.comment }}
              </p>
              <!--              <a href="#" class="ltn__comment-reply-btn"-->
              <!--                ><i class="icon-reply-1"></i>Reply</a-->
              <!--              >-->
            </div>
          </div>
          <scomment :children="comment.children" />
        </li>
      </ul>
    </div>
  </div>
  <hr />
  <!-- comment-reply -->
  <div class="ltn__comment-reply-area ltn__form-box mb-60">
    <h4 class="title-2">{{ $t("blog.post_comment") }}</h4>
    <form action="#">
      <div>
        <!--            <h4 class="ltn__widget-title">Add Price</h4>-->
        <div class="rating">
          <label>
            <input v-model="form.rate" type="radio" name="stars" value="1" />
            <span class="icon">★</span>
          </label>
          <label>
            <input v-model="form.rate" type="radio" name="stars" value="2" />
            <span class="icon">★</span>
            <span class="icon">★</span>
          </label>
          <label>
            <input v-model="form.rate" type="radio" name="stars" value="3" />
            <span class="icon">★</span>
            <span class="icon">★</span>
            <span class="icon">★</span>
          </label>
          <label>
            <input v-model="form.rate" type="radio" name="stars" value="4" />
            <span class="icon">★</span>
            <span class="icon">★</span>
            <span class="icon">★</span>
            <span class="icon">★</span>
          </label>
          <label>
            <input v-model="form.rate" type="radio" name="stars" value="5" />
            <span class="icon">★</span>
            <span class="icon">★</span>
            <span class="icon">★</span>
            <span class="icon">★</span>
            <span class="icon">★</span>
          </label>
        </div>
      </div>
      <div class="input-item input-item-textarea ltn__custom-icon">
        <textarea
          v-model="form.comment"
          :placeholder="$t('blog.type_comment')"
        ></textarea>
        <div v-show="this.submited && !isComment()">
          <p class="text-sm" style="color: red">
            {{ this.errors.comment }}
          </p>
        </div>
      </div>
      <div v-if="!$page.props.auth" class="input-item input-item-name ltn__custom-icon">
        <input
          v-model="form.guest_name"
          type="text"
          :placeholder="$t('blog.type_name')"
        />
        <div v-show="this.submited && !isName()">
          <p class="text-sm" style="color: red">
            {{ this.errors.name }}
          </p>
        </div>
      </div>
      <div v-if="!$page.props.auth" class="input-item input-item-email ltn__custom-icon">
        <input
          v-model="form.guest_email"
          type="email"
          :placeholder="$t('contact_us.email')"
        />
        <div v-show="this.submited && !emailReg()">
          <p class="text-sm" style="color: red">
            {{ this.errors.email }}
          </p>
        </div>
      </div>

      <label class="mb-0 input-info-save"
        ><input type="checkbox" name="agree" /> {{ $t("blog.desc_comment") }}</label
      >
      <div class="btn-wrapper">
        <button
          @click="submit()"
          class="btn theme-btn-1 btn-effect-1 text-uppercase"
          type="button"
        >
          <i class="far fa-comments"></i> {{ $t("blog.post_comment") }}
        </button>
      </div>
    </form>
  </div>
</template>
<script>
import scomment from "@/Pages/Common/scomment.vue";
import { useForm } from "@inertiajs/inertia-vue3";
import { useToast } from "vue-toastification";

export default {
  components: {
    scomment,
  },
  data() {
    return {
      submited: false,
      form: useForm({
        approved: false,
        rate: 1,
        comment: "",
        guest_name: "",
        guest_email: "",
      }),

      errors: {
        name: this.$t("errors.correct_field"),
        email: this.$t("errors.correct_field"),
        comment: this.$t("errors.correct_field"),
      },
    };
  },
  methods: {
    emailReg: function () {
      return String(this.form.guest_email)
        .toLowerCase()
        .match(
          /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
        );
    },
    isName: function () {
      return this.form.guest_name.length > 3;
    },
    isComment: function () {
      return this.form.comment.length > 0;
    },
    submit: function () {
      // this.form
      this.submited = true;
      if (this.$page.props.auth && this.isComment()) this.dform();
      else if (this.emailReg() && this.isName() && this.isComment()) this.dform();
    },
    dform() {
      let app = this;
      this.form
        .transform((data) => ({
          approved: data.approved,
          rate: data.rate,
          comment: data.comment,
          guest_email: data.guest_email,
          guest_name: data.guest_name,
          commentable_type: this.$page.props.blog.cclass,
          commentable_id: this.$page.props.blog.id,
        }))
        .post(route("review.store", {}), {
          onFinish: () => {},
          onSuccess: () => {
            const toast = useToast();
            toast.success(this.$t("notifications.success_comment"));
          },
        });
    },
  },
};
</script>
<style scoped>
.rating {
  display: inline-block;
  position: relative;
  height: 50px;
  line-height: 50px;
  font-size: 50px;
}

.rating label {
  position: absolute;
  top: 0;
  left: 0;
  height: 100%;
  cursor: pointer;
}

.rating label:last-child {
  position: static;
}

.rating label:nth-child(1) {
  z-index: 5;
}

.rating label:nth-child(2) {
  z-index: 4;
}

.rating label:nth-child(3) {
  z-index: 3;
}

.rating label:nth-child(4) {
  z-index: 2;
}

.rating label:nth-child(5) {
  z-index: 1;
}

.rating label input {
  position: absolute;
  top: 0;
  left: 0;
  opacity: 0;
}

.rating label .icon {
  float: left;
  color: transparent;
}

.rating label:last-child .icon {
  color: #000;
}

.rating:not(:hover) label input:checked ~ .icon,
.rating:hover label:hover input ~ .icon {
  color: #86bc31;
}

.rating label input:focus:not(:checked) ~ .icon:last-child {
  color: #000;
  text-shadow: 0 0 5px #86bc31;
}
</style>
