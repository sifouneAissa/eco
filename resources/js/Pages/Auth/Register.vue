<script setup>
    import { Head, Link, useForm } from '@inertiajs/inertia-vue3';
    import AuthenticationCard from '@/Components/AuthenticationCard.vue';
    import AuthenticationCardLogo from '@/Components/AuthenticationCardLogo.vue';
    import Checkbox from '@/Components/Checkbox.vue';
    import InputError from '@/Components/InputError.vue';
    import InputLabel from '@/Components/InputLabel.vue';
    import PrimaryButton from '@/Components/PrimaryButton.vue';
    import TextInput from '@/Components/TextInput.vue';

    const form = useForm({
        name: '',
        email: '',
        password: '',
        password_confirmation: '',
        terms: false,
    });

    const submit = () => {
        form.post(route('register'), {
            onFinish: () => form.reset('password', 'password_confirmation'),
            onSuccess : () => window.location.reload()
        });
    };
</script>
<template>
    <div  class="container-fluid" style="background-color: white">
        <Head :title="$t('register.welcome')" />
        <div class="row no-gutter">
            <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>
            <div class="col-md-8 col-lg-6">
                <div class="login d-flex align-items-center py-5">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-9 col-lg-8 mx-auto pl-5 pr-5">

                                <h3 class="login-heading mb-4">{{$t('register.welcome')}} !</h3>

                                <form @submit.prevent="submit">
                                    <div class="form-label-group">
                                        <input v-model="form.name" type="text" id="inputName" class="form-control" :placeholder="$t('register.name')">
                                        <label for="inputName">{{$t('register.name')}}</label>
                                        <div v-show="form.errors.name">
                                            <p class="text-sm " style="color: red">
                                                {{ form.errors.name }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="form-label-group">
                                        <input v-model="form.email" type="email" id="inputEmail" class="form-control" :placeholder="$t('register.email')">
                                        <label for="inputEmail">{{$t('register.email')}}</label>
                                        <div v-show="form.errors.email">
                                            <p class="text-sm text-red-600" style="color: red">
                                                {{ form.errors.email }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="form-label-group">
                                        <input v-model="form.password" type="password" id="inputPassword" class="form-control" :placeholder="$t('register.password')">
                                        <label for="inputPassword">{{$t('register.password')}}</label>
                                        <div v-show="form.errors.password">
                                            <p class="text-sm text-red-600" style="color: red">
                                                {{ form.errors.password }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="form-label-group">
                                        <input v-model="form.password_confirmation" type="password" id="inputPasswordCofirmation" class="form-control" :placeholder="$t('register.password_confirmation')">
                                        <label for="inputPasswordCofirmation">{{$t('register.password_confirmation')}}</label>
                                        <div v-show="form.errors.password_confirmation">
                                            <p class="text-sm text-red-600">
                                                {{ form.errors.password_confirmation }}
                                            </p>
                                        </div>
                                    </div>
                                    <!--                                <div class="form-label-group mb-4">-->
                                    <!--                                    <input type="text" id="ptext" class="form-control" placeholder="Promocode">-->
                                    <!--                                    <label for="ptext">Promocode</label>-->
                                    <!--                                </div>-->
                                    <button type="submit" class="btn btn-lg btn-outline-primary btn-block btn-login text-uppercase font-weight-bold mb-2">{{$t('register.sign_up')}}</button>
                                    <!--                                <div class="text-center pt-3">-->
                                    <!--                                    Already have an Account? <a class="font-weight-bold" href="login.html">Sign In</a>-->
                                    <!--                                </div>-->
                                    <div class="text-center pt-3">
                                        <Link  :href="route('login')" >{{$t('login.login')}}</Link>
                                    </div>
                                    <!--                                <div>-->
                                    <!--                                    <InputLabel for="name" value="Name" />-->
                                    <!--                                    <TextInput-->
                                    <!--                                        id="name"-->
                                    <!--                                        v-model="form.name"-->
                                    <!--                                        type="text"-->
                                    <!--                                        class="mt-1 block w-full"-->
                                    <!--                                        required-->
                                    <!--                                        autofocus-->
                                    <!--                                        autocomplete="name"-->
                                    <!--                                    />-->
                                    <!--                                    <InputError class="mt-2" :message="form.errors.name" />-->
                                    <!--                                </div>-->

                                    <!--                                <div class="mt-4">-->
                                    <!--                                    <InputLabel for="email" value="Email" />-->
                                    <!--                                    <TextInput-->
                                    <!--                                        id="email"-->
                                    <!--                                        v-model="form.email"-->
                                    <!--                                        type="email"-->
                                    <!--                                        class="mt-1 block w-full"-->
                                    <!--                                        required-->
                                    <!--                                    />-->
                                    <!--                                    <InputError class="mt-2" :message="form.errors.email" />-->
                                    <!--                                </div>-->

                                    <!--                                <div class="mt-4">-->
                                    <!--                                    <InputLabel for="password" value="Password" />-->
                                    <!--                                    <TextInput-->
                                    <!--                                        id="password"-->
                                    <!--                                        v-model="form.password"-->
                                    <!--                                        type="password"-->
                                    <!--                                        class="mt-1 block w-full"-->
                                    <!--                                        required-->
                                    <!--                                        autocomplete="new-password"-->
                                    <!--                                    />-->
                                    <!--                                    <InputError class="mt-2" :message="form.errors.password" />-->
                                    <!--                                </div>-->

                                    <!--                                <div class="mt-4">-->
                                    <!--                                    <InputLabel for="password_confirmation" value="Confirm Password" />-->
                                    <!--                                    <TextInput-->
                                    <!--                                        id="password_confirmation"-->
                                    <!--                                        v-model="form.password_confirmation"-->
                                    <!--                                        type="password"-->
                                    <!--                                        class="mt-1 block w-full"-->
                                    <!--                                        required-->
                                    <!--                                        autocomplete="new-password"-->
                                    <!--                                    />-->
                                    <!--                                    <InputError class="mt-2" :message="form.errors.password_confirmation" />-->
                                    <!--                                </div>-->

                                    <!--                                <div v-if="$page.props.jetstream.hasTermsAndPrivacyPolicyFeature" class="mt-4">-->
                                    <!--                                    <InputLabel for="terms">-->
                                    <!--                                        <div class="flex items-center">-->
                                    <!--                                            <Checkbox id="terms" v-model:checked="form.terms" name="terms" required />-->

                                    <!--                                            <div class="ml-2">-->
                                    <!--                                                I agree to the <a target="_blank" :href="route('terms.show')" class="underline text-sm text-gray-600 hover:text-gray-900">Terms of Service</a> and <a target="_blank" :href="route('policy.show')" class="underline text-sm text-gray-600 hover:text-gray-900">Privacy Policy</a>-->
                                    <!--                                            </div>-->
                                    <!--                                        </div>-->
                                    <!--                                        <InputError class="mt-2" :message="form.errors.terms" />-->
                                    <!--                                    </InputLabel>-->
                                    <!--                                </div>-->

                                    <!--                                <div class="flex items-center justify-end mt-4">-->
                                    <!--                                    <Link :href="route('login')" class="underline text-sm text-gray-600 hover:text-gray-900">-->
                                    <!--                                        Already registered?-->
                                    <!--                                    </Link>-->

                                    <!--                                    <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">-->
                                    <!--                                        Register-->
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
