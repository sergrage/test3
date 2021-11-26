import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export default new Vuex.Store({
    state: {
    	districts: ['5-й поселок', 'Голиковка', 'Древлянка', 'Заводская','Зарека', 'Ключевая', 'Кукковка', 'Новый сайнаволок', 'Октябрьский', 'Первомайский', 'Перевалка',
		'Сулажгора', 'Университетский городок', 'Центр'],
    }, 
    actions: {
    	getWorker(context, payload) {
    		axios.get('/api/findWorkers', { params: { district:payload }}).then(response => {
    			console.log(response)
    		}).catch( error => {

            });
    	},
    },
    getters: {

    },
    mutations: {

    }
})