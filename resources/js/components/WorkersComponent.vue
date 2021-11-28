<template>
    <div class="test">
        <form action="">
            <select class="form-select" v-model="selected">
                <option disabled value="">Выберите район</option>
                <option v-for="district in districtsList" :value="district">{{district}}</option>
            </select>
        </form>
        <div class="pt-3" v-if="showMessage">
            <div class="alert alert-primary" role="alert">
                {{message}}  <span v-for="(login, index) in workersLogins"> {{login}} </span>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    computed: {
        selected: {
            get() {
                return this.$store.state.selectDistrict;
            },
            set(value) {
                this.$store.commit('SET_SELECT_DISTRICT', value)
                this.$store.dispatch('getWorker', this.$store.state.selectDistrict)
            }

        },
    	districtsList() {
    		return this.$store.state.districts
    	},
        showMessage() {
            return this.$store.state.showMessage
        },
        message() {
            return this.$store.state.message
        },
        workersLogins() {
            return this.$store.state.workers
        }
    },
    methods: {
    	districtClick(event) {
    		// let districtName =  event.target.outerText
    		this.$store.dispatch('getWorker', event.target.outerText)
    		// return event.target.outerText
    		// return ;
    	}
    },
    mounted() {
        // console.log('Component mounted.')
    }
}
</script>

<style scoped>

li {
	cursor: pointer;
}
</style>
