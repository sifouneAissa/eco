<template>

    <div v-if="models" class="bg-white rounded shadow-sm p-4 mb-4">
        <h4 class="mb-1">Choose a delivery address</h4>
        <h6 class="mb-3 text-black-50">Multiple addresses in this location</h6>
        <div  class="row">
            <div v-for="model in models" :key="model.id" class="col-md-6">
                <div class="bg-white card addresses-item">
                    <div class="gold-members p-4">
                        <div class="media">
                            <div class="mr-3"><i class="icofont-location-pin icofont-3x"></i></div>
                            <div class="media-body">
                                <h6 class="mb-1 text-secondary">{{model.city}}</h6>
                                <p>{{model.address_line_1}},{{model.city}},{{model.country}}
                                </p>
                                <p class="mb-0 text-black font-weight-bold"><a href="javascript: void(0)" @click="selectedA=model" :class="'btn btn-sm mr-2 '+ ( selectedA.id === model.id ? 'btn-success' : 'btn-secondary' )"> DELIVER HERE</a>
<!--                                    <span>{{model.mobi}}</span>-->
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>


<script>
    export  default  {
        props : [
            'models'
        ],
        data(){
            return {
                selectedA : this.models[0]
            }
        }
    }
</script>
