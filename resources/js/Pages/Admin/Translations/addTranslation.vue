<template>

    <div :key="keyV"  class="mt-2 ml-2">
        <div class="ml-auto">
            <a class="text-danger" data-toggle="collapse" :href="'#collapseExample'+keyV" role="button" aria-expanded="false" :aria-controls="'collapseExample'+keyV"><i class="fa fa-plus-circle"></i> Add translations to {{attr}}</a>
        </div>
        <div class="collapse mt-2" :id="'collapseExample'+keyV">
            <div class="d-flex">
                <div class="form-group">
                    <div class="styled-select">
                        <select v-model="lselected" class="custom-select">
                            <option disabled>Choose Language</option>
                            <option :value="locale"  v-for="locale in $page.props.locales.filter((item) => item!=='en')" :key="locale">{{locale}}</option>
                        </select>
                    </div>
                </div>
            </div>
            <div v-if="type==='input' && lselected" class="form-group">
                <label>{{attr + ' ' + lselected}}</label>
                <input @input="writing" :dir="lselected === 'ar' ? 'rtl' : 'ltr'" v-model="data[lselected]"  type="text" class="form-control" :placeholder="attr + ' ' + lselected">
            </div>
            <div v-else-if="type==='textarea' && lselected" class="form-group">
                <label>{{attr + ' ' + lselected}}</label>
                <textarea
                    @input="writing" :dir="lselected === 'ar' ? 'rtl' : 'ltr'" v-model="data[lselected]"  type="text" class="form-control" :placeholder="attr + ' ' + lselected"
                ></textarea>
            </div>

        </div>
    </div>
</template>
<script >
    export default {
        props : [
            'attr','keyV','type','cvalues'
        ],
        methods : {
            writing (){
                let data = this.$page.props.locales.filter((item) => item!=='en').map((lang) => {
                    return {
                        key: this.keyV,
                        lang: lang,
                        value: this.data[lang]
                        }
                    }
                )

                this.cvalues.filter((item) => item.key !== this.keyV).map((item) => {
                    data.push(item);
                });

                this.$emit('write',data)
            }
        },
        data () {
            return {
                lselected : null,
                data : [

                ]
            }
        }
    }
</script>
