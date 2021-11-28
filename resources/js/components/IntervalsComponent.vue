<template>
    <div class="test">
        <p>Заданные интервалы</p>
        <p>'09:00-11:00', '11:00-13:00', '15:00-16:00', '17:00-20:00', '20:30-21:30', '21:30-22:30',</p>
        <div class="progress">
            <div class="progress-bar" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
            <div class="progress-bar bg-success" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
            <div class="progress-bar bg-info" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <form action="" class="my-3" @submit.prevent="submit_form()">
            <input type="text" v-model="interval" class="form-control" placeholder="Введите интервал в формате 'чч:мм-чч:мм' ">
            <button  type="submit" class="btn btn-primary btn-sm mt-3">Проверка</button>
        </form>
        <div class="alert alert-danger" role="alert" v-if="intervalError">
            <span>Неправильный формат данных</span>
        </div>
        <div class="alert alert-success" role="alert" v-if="showBadge">
            <ul class="list-group">
                <li class="list-group-item" v-for="(interval, key) in intervalCrossing">{{key}} - {{interval}}</li>
            </ul>
        </div>

    </div>
</template>

<script>
export default {
    data(){
        return {
            interval: ''
        }
    },
    computed: {
        intervalError() {
            return this.$store.state.intervalError
        },
        intervalMessage() {
            return this.$store.state.intervalMessage
        },
        intervalCrossing() {
            return this.$store.state.intervalCrossing
        },
        showBadge() {
            return !this.intervalError && !this.isEmpty(this.intervalCrossing)
        }
    },
    methods: {
        submit_form() {
            this.$store.dispatch('crossInterval', this.interval)
        },
        isEmpty(obj) {
            for(let prop in obj) {
                if(obj.hasOwnProperty(prop))
                  return false;
            }
            return true;
}
    },
    mounted() {
        console.log('Component mounted.')
    }
}
</script>

<style scoped>

</style>
