import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export default new Vuex.Store({
    state: {
    	districts: ['5-й поселок', 'Голиковка', 'Древлянка', 'Заводская','Зарека', 'Ключевая', 'Кукковка', 'Новый сайнаволок', 'Октябрьский', 'Первомайский', 'Перевалка',
		'Сулажгора', 'Университетский городок', 'Центр'],
		workers: [],
		carriers: {},
        selectDistrict: '',
        message: '',
        showMessage: false,
        intervalError: false,
        intervalMessage: '',
        intervalCrossing: [],
        selectedCarrier: {
    	    name: '',
    	    prices: []
        }
    },
    actions: {
    	getWorker(context, payload) {
    		axios.get('/api/findWorkers', { params: { district:payload }}).then(response => {
    			context.commit('SET_WORKERS', response.data.result)
    			context.commit('SET_MESSAGE', response.data.msg)
    			context.commit('SET_SHOW_MESSAGE', true)
    		}).catch( error => {

            });
    	},
        crossInterval(context, payload) {
            axios.get('/api/crossIntervals', { params: { interval:payload }}).then(response => {
                context.commit('SET_INTERVAL_ERROR', response.data.error)
                context.commit('SET_INTERVAL_MESSAGE', response.data.msg)
                context.commit('SET_INTERVAL_CROSSING', response.data.result)
            }).catch( error => {

            });
        },
        getCarriers(context) {
            axios.get('/api/getCarriers').then(response => {
                // console.log(response.data.data)
                context.commit('SET_CARRIERS', response.data.data)
            }).catch( error => {

            });
        },
    },
    getters: {

    },
    mutations: {
    	SET_WORKERS(state, payload) {
            state.workers = payload;
        },
        SET_MESSAGE(state, payload) {
            state.message = payload;
        },
        SET_SHOW_MESSAGE(state, payload) {
            state.showMessage = payload;
        },
        SET_SELECT_DISTRICT(state, payload) {
            state.selectDistrict = payload;
        },
        SET_INTERVAL_ERROR(state, payload) {
            state.intervalError = payload;
        },
        SET_INTERVAL_MESSAGE(state, payload) {
            state.intervalMessage = payload;
        },
        SET_INTERVAL_CROSSING(state, payload) {
            state.intervalCrossing = payload;
        },
        SET_CARRIERS(state, payload) {
            state.carriers = payload;
        },
        SET_SELECTED_CARRIER(state, payload) {
            state.selectedCarrier = payload;
        },
    }
})
