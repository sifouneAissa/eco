<script setup>
    import GuestLayout from '@/Layouts/GuestLayout.vue';
    import { Head, Link, useForm } from '@inertiajs/inertia-vue3';

     const form = useForm({
        name: '',
        email: '',
        phone: '',
        message: '',
    });

    const submit = () => {
        // form.post(route(''));
    };
</script>

<template>
    <GuestLayout title="Contact Us">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Contact Us
            </h2>
        </template>
        <section class="breadcrumb-osahan pt-5 pb-5 bg-light position-relative text-center" style=" background-image: url('https://himpies.com/wp-content/uploads/2021/09/himpies-banner-scaled.jpg');">
         <h1 class="text-white">Contact Us</h1>
        </section>
        <section class="section pt-5 pb-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-6 mb-2">
                        <h1 class="text-center">
                            <a title="Dubai, UAE" target="_self" href="#">
                              <i class="fas fa-map-marker-alt"></i>
                            </a>
                        </h1>
                        <h4 class="text-center">Dubai, UAE</h4>
                    </div>
                    <div class="col-md-4 col-sm-6 mb-2">
                        <h1 class="text-center">
                            <a title="+971557658376" target="_self" href="#">
                              <i class="fas fa-phone"></i>
                            </a>
                        </h1>
                        <h4 class="text-center">+971557658476</h4>
                    </div>
                    <div class="col-md-4 col-sm-6 mb-2">
                        <h1 class="text-center">
                            <a title="a.elnashar1@gmail.com" target="_self" href="#">
                              <i class="fas fa-envelope"></i>
                            </a>
                        </h1>
                        <h4 class="text-center">a.elnashar1@gmail.com </h4>
                    </div>
                </div>
            </div>
        </section>
        <section class="section pt-5 pb-5 bg-white becomemember-section border-bottom">
            <div class="container">
                <div class="section-header text-center white-text">
                    <h2>CONTACT US</h2>
                    <p>Send us a message</p>
                    <span class="line"></span>
                </div>
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <form @submit.prevent="submit">
                            <div class="form-group">
                                <input v-model="form.name" type="text" id="inputName" class="form-control" placeholder="Name">
                                <div v-show="form.errors.name">
                                    <p class="text-sm " style="color: red">
                                        {{ form.errors.name }}
                                    </p>
                                </div>
                            </div>
                            <div class="form-group">
                                <input v-model="form.phone" type="text" id="phone" class="form-control" placeholder="phone">
                                <div v-show="form.errors.phone">
                                    <p class="text-sm " style="color: red">
                                        {{ form.errors.phone }}
                                    </p>
                                </div>
                            </div>
                            <div class="form-group">
                                <input v-model="form.email" type="email" id="inputEmail" class="form-control" placeholder="Email address">
                                <div v-show="form.errors.email">
                                    <p class="text-sm text-red-600" style="color: red">
                                        {{ form.errors.email }}
                                    </p>
                                </div>
                            </div>
                            <div class="form-group">
                                <textarea v-model="form.message" name="message" id="message" cols="30" rows="10" class="form-control" placeholder="message"></textarea>
                                <div v-show="form.errors.password_confirmation">
                                    <p class="text-sm text-red-600">
                                        {{ form.errors.message }}
                                    </p>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-lg btn-outline-primary btn-block btn-login text-uppercase font-weight-bold mb-2">Send Message</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </GuestLayout>
</template>
