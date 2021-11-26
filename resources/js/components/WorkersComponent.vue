<template>
    <div class="test">
    	<h1 class="pb-5">Выбирите район для поиска работника</h1>
    	<ul class="list-group">
    		<li v-for="district in districtsList" class="list-group-item" @click="districtClick($event)">{{district}}</li>
    	</ul>
    </div>
</template>

<script>
export default {
    computed: {
    	districtsList() {
    		return this.$store.state.districts
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
        console.log('Component mounted.')
    }
}
</script>

<style scoped>

li {
	cursor: pointer;
}
</style>