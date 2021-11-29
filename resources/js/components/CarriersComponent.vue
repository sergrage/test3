<template>
    <div class="test" style="height: 600px">
        <div class="col-6">
            <form action="">
                <select class="form-select" v-model="selected">
                    <option disabled value="">Выберите перевозчика</option>
                    <option v-for="(carrier, index) in carriers" :value="index">{{carrier.name}}</option>
                </select>
            </form>
            <div class="" v-if="carrierIsTake">
                <table class="table" >
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Цена, руб.</th>
                        <th scope="col">Вес, кг</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="(price, index) in this.carriers[this.selectedCarrierIndex].prices">
                        <th scope="row">{{index}}</th>
                        <td>{{price.price}}</td>
                        <td>{{price.interval}}</td>
                    </tr>
                    </tbody>
                </table>

                <h5>Расчитать доставку</h5>
                <form action="" class="my-3" @submit.prevent="submit_form()">
                    <input type="text" v-model="cargoWeight" class="form-control" placeholder="Введите вес груза">
                    <button  type="submit" class="btn btn-primary btn-sm mt-3">Расчет</button>
                </form>
                <div class="alert alert-danger" role="alert" v-if="validationError">
                    Введите число
                </div>
                <div class="alert alert-warning" role="alert" v-if="showAnswer">
                    Цена составит - {{this.result}}

                </div>
            </div>

        </div>
        <div class="col-6"></div>
    </div>
</template>

<script>
export default {
    data(){
        return {
            selectCarrier: '',
            carrierIsTake: false,
            selectedCarrierIndex: '',
            cargoWeight: null,
            showPrice: false,
            validationError: false,
            pricesList: [],
            showAnswer: false,
            result: 0,
            payment: ''
        }
    },
    computed: {
        selected: {
            get() {
                return this.selectedCarrierIndex;
            },
             set(value) {
                 this.selectedCarrierIndex = value
                 this.carrierIsTake = true
                 this.pricesList = this.carriers[this.selectedCarrierIndex].prices
                 this.showAnswer = false
            }

        },
        carriers() {
            return this.$store.state.carriers
        }
    },
    methods: {
        submit_form(){
            this.showAnswer = false
            this.payment = ''
            if(isNaN(this.cargoWeight)) {
                this.validationError = true
                return true
            }
            let pricesListRev = this.pricesList
            let result = 0
            let weight = this.cargoWeight
            let payment = ''
            for(let i = pricesListRev.length-1; i>=0; i--) {
                if(pricesListRev[i].interval <= weight) {
                    result += (weight - pricesListRev[i].interval) * pricesListRev[i].price
                    weight = weight - (weight - pricesListRev[i].interval)
                }
            }

            this.result = result
            this.showAnswer = true
        }
    },
    mounted() {
    }
}

</script>

<style scoped>
</style>
