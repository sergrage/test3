import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export default new Vuex.Store({
    state: {
    	districts: ['5-й поселок', 'Голиковка', 'Древлянка', 'Заводская','Зарека', 'Ключевая', 'Кукковка', 'Новый сайнаволок', 'Октябрьский', 'Первомайский', 'Перевалка',
		'Сулажгора', 'Университетский городок', 'Центр'],
		workers: [],
    }, 
    actions: {
    	getWorker(context, payload) {
    		axios.get('/api/findWorkers', { params: { district:payload }}).then(response => {
    			console.log(response)
    			console.log(response.data)
    			context.commit('SET_WORKERS', response.data);
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
    }
})