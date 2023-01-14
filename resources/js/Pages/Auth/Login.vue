<script setup>
    import {Head, Link, useForm} from "@inertiajs/inertia-vue3";
    import AuthenticationCard from "@/Components/AuthenticationCard.vue";
    import AuthenticationCardLogo from "@/Components/AuthenticationCardLogo.vue";
    import Checkbox from "@/Components/Checkbox.vue";
    import InputError from "@/Components/InputError.vue";
    import InputLabel from "@/Components/InputLabel.vue";
    import PrimaryButton from "@/Components/PrimaryButton.vue";
    import TextInput from "@/Components/TextInput.vue";
    import GuestLayout from '@/Layouts/GuestLayout.vue';
    import breadcrumb from '@/Pages/Common/breadcrumb.vue';

    defineProps({
        canResetPassword: Boolean,
        status: String,
    });

    const form = useForm({
        email: "",
        password: "",
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
                preserveScroll : true
            });
    };
</script>

<template>
    <GuestLayout :title="$t('login.welcome')">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{$t('login.welcome')}}
            </h2>
        </template>

        <!-- BREADCRUMB AREA START -->
        <breadcrumb  :title="$t('nav_menu.pages.login')" />
        <!-- BREADCRUMB AREA END -->
        <!-- LOGIN AREA START -->
        <div class="ltn__login-area pb-65">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title-area text-center">
                            <h1 class="section-title">Sign In <br>To Your Account</h1>
                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. <br>
                                Sit aliquid, Non distinctio vel iste.</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="account-login-inner">
                            <form @submit.prevent="submit" action="#" class="ltn__form-box contact-form-box">
                                <input v-model="form.email" autofocus type="email" id="inputEmail" required
                                       class="form-control" :placeholder="$t('login.email')">
                                <div v-show="form.errors.email">
                                    <p class="text-sm text-red-600" style="color: red">
                                        {{ form.errors.email }}
                                    </p>
                                </div>
                                <input v-model="form.password" required type="password" id="inputPassword"
                                       class="form-control" :placeholder="$t('login.password')">
                                <div v-show="form.errors.password">
                                    <p class="text-sm text-red-600" style="color: red">
                                        {{ form.errors.password }}
                                    </p>
                                </div>
                                <div class="btn-wrapper mt-0">
                                    <button
                                    :class="{ 'opacity-25': form.processing }"
                                    :disabled="form.processing"
                                    class="theme-btn-1 btn btn-block" type="submit">{{$t("login.login") }}</button>
                                </div>
                                <div class="go-to-btn mt-20">
                                    <a href="#"><small>FORGOTTEN YOUR PASSWORD?</small></a>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="account-create text-center pt-50">
                            <h4>DON'T HAVE AN ACCOUNT?</h4>
                            <p>Add items to your wishlistget personalised recommendations <br>
                                check out more quickly track your orders register</p>
                            <div class="btn-wrapper">
                                <Link :href="route('register')" class="theme-btn-1 btn black-btn">{{ $t("login.register") }}</Link>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- LOGIN AREA END -->
    </GuestLayout>
</template>
