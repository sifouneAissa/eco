<script setup>
    import { Head, Link, useForm } from '@inertiajs/inertia-vue3';
    import AuthenticationCard from '@/Components/AuthenticationCard.vue';
    import AuthenticationCardLogo from '@/Components/AuthenticationCardLogo.vue';
    import Checkbox from '@/Components/Checkbox.vue';
    import InputError from '@/Components/InputError.vue';
    import InputLabel from '@/Components/InputLabel.vue';
    import PrimaryButton from '@/Components/PrimaryButton.vue';
    import TextInput from '@/Components/TextInput.vue';

    defineProps({
        canResetPassword: Boolean,
        status: String,
    });

    const form = useForm({
        email: '',
        password: '',
        remember: false,
    });

    const submit = () => {

        form.transform(data => ({
            ...data,
            remember: form.remember ? 'on' : '',
        })).post(route('login'), {
            onFinish: () => form.reset('password'),
        });
    };
</script>

<template>
    <div class="container-fluid" style="background-color: white">
        <Head :title="$t('login.welcome')" />
        <div class="row no-gutter">
            <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>
            <div class="col-md-8 col-lg-6">
                <div class="login d-flex align-items-center py-5">
                    <div class="container">

                        <div class="row">
                            <div class="col-md-9 col-lg-8 mx-auto pl-5 pr-5">
                        <h3 class="login-heading mb-4">{{$t('login.welcome')}}!</h3>
                        <!--                            <template #logo>-->
                        <!--                                <AuthenticationCardLogo />-->
                        <!--                            </template>-->
                        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
                            {{ status }}
                        </div>

                        <form >@submit.prevent="submit"
                            <div class="form-label-group">
                                <input v-model="form.email" autofocus type="email" id="inputEmail" required class="form-control" :placeholder="$t('login.email')">
                                <label for="inputEmail">{{$t('login.email')}}</label>
                                <div v-show="form.errors.email">
                                    <p class="text-sm text-red-600" style="color: red">
                                        {{ form.errors.email }}
                                    </p>
                                </div>
                            </div>
                            <div class="form-label-group">
                                <input v-model="form.password" required type="password" id="inputPassword" class="form-control" :placeholder="$t('login.password')">
                                <label for="inputPassword">{{$t('login.password')}}</label>
                                <div v-show="form.errors.password">
                                    <p class="text-sm text-red-600" style="color: red">
                                        {{ form.errors.password }}
                                    </p>
                                </div>
                            </div>
                            <div class="custom-control custom-checkbox mb-3">
                                <input v-model="form.remember"  type="checkbox" class="custom-control-input" id="customCheck1">
                                <label class="custom-control-label" for="customCheck1">{{$t('login.remember_me')}}</label>
                            </div>
                            <button :class="{ 'opacity-25': form.processing }" :disabled="form.processing" class="btn btn-lg btn-outline-primary btn-block btn-login text-uppercase font-weight-bold mb-2">{{$t('login.login')}}</button>
                            <div class="text-center pt-3">
                                <Link  :href="route('register')" >{{$t('login.register')}}</Link>
                            </div>
                            <!--                                <div>-->
                            <!--                                    <InputLabel for="email" :value="$t('login.email')" />-->
                            <!--                                    <TextInput-->
                            <!--                                        id="email"-->
                            <!--                                        v-model="form.email"-->
                            <!--                                        type="email"-->
                            <!--                                        class="mt-1 block w-full"-->
                            <!--                                        required-->
                            <!--                                        autofocus-->
                            <!--                                    />-->
                            <!--                                    <InputError class="mt-2" :message="form.errors.email" />-->
                            <!--                                </div>-->

                            <!--                                <div class="mt-4">-->
                            <!--                                    <InputLabel for="password" :value="$t('login.password')" />-->
                            <!--                                    <TextInput-->
                            <!--                                        id="password"-->
                            <!--                                        v-model="form.password"-->
                            <!--                                        type="password"-->
                            <!--                                        class="mt-1 block w-full"-->
                            <!--                                        required-->
                            <!--                                        autocomplete="current-password"-->
                            <!--                                    />-->
                            <!--                                    <InputError class="mt-2" :message="form.errors.password" />-->
                            <!--                                </div>-->

                            <!--                                <div class="block mt-4">-->
                            <!--                                    <label class="flex items-center">-->
                            <!--                                        <Checkbox v-model:checked="form.remember" name="remember" />-->
                            <!--                                        <span class="ml-2 text-sm text-gray-600">{{$t('login.remember_me')}}</span>-->
                            <!--                                    </label>-->
                            <!--                                </div>-->

                            <!--                                <div class="flex items-center justify-end mt-4">-->
                            <!--&lt;!&ndash;                                    <Link v-if="canResetPassword" :href="route('password.request')" class="underline text-sm text-gray-600 hover:text-gray-900">&ndash;&gt;-->
                            <!--&lt;!&ndash;                                        Forgot your password?&ndash;&gt;-->
                            <!--&lt;!&ndash;                                    </Link>&ndash;&gt;-->
                            <!--                                    <Link  :href="route('register')" class="underline text-sm text-gray-600 hover:text-gray-900">-->
                            <!--                                        {{$t('login.register')}}-->
                            <!--                                    </Link>-->
                            <!--                                    <PrimaryButton class="ml-4 text" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">-->
                            <!--                                        {{$t('login.login')}}-->
                            <!--                                    </PrimaryButton>-->
                            <!--                                </div>-->
                        </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>


