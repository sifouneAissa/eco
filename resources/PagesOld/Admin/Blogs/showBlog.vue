<script >
    import AdminLayout from '@/Pages/Admin/Layout/AdminLayout.vue';
    import {useForm} from "@inertiajs/inertia-vue3";
    import {Inertia} from "@inertiajs/inertia";

    export default {
        props : ['model'],
        components : {
            AdminLayout
        },
        data () {
            return {

                urls : [
                    {
                        name : 'Blogs',
                        route : this.route('admin.blog.index')
                    },
                    {
                        name : 'Show Blog',
                        route : '#'
                    }
                ],
            }
        },
        mounted() {
        },
        methods : {
        }
    }
</script>


<template>

    <AdminLayout :title="'Show Blog'" :urls="urls">

        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Orders
            </h2>
        </template>
        <main id="sample">
            <div class="card">
                <div class="card-header">
                    <h3>
                        Blog : {{model.title}}
                    </h3>

                </div>
                <div class="card-body" v-html="model.blog">
                </div>
            </div>
        </main>

    </AdminLayout>
</template>

<style scoped>
</style>

