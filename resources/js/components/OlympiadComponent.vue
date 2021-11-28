<template>
    <div class="test">
        <form action="" @submit.prevent="submit_form()">
            <input  v-model="participantsList"  placeholder="Список участников" class="form-control">
            <button  type="submit" class="btn btn-primary btn-sm mt-3">Добавить участников</button>
        </form>
        <div class="alert alert-danger mt-5" role="alert" v-if="showError">
            <ul>
                <li v-for="err in  this.errorMsgArr">{{err}}</li>
            </ul>
        </div>
        <table class="table" v-if="showTable">
            <thead>
            <tr>
                <th scope="col" @click="sort('index')">#</th>
                <th scope="col" @click="sort('name')">Имя участника</th>
                <th scope="col" @click="sort('ball')">Баллы</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(person, index) in this.sortedParticipantsArray">
                <th scope="row">{{person.index}}</th>
                <td>{{person.name}}</td>
                <td>{{person.ball}}</td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>

export default {
    data() {
        return {
            participantsList: '',
            participantsArray: [],
            currentSort:'id',
            currentSortDir:'asc',
            errorMsgArr: [],
            showError: false,
            showTable: false
        }
    },
    watch: {
        showError: function () {
            console.log(123)
        }
    },
    computed: {
        sortedParticipantsArray() {
            return this.participantsArray.sort((a,b) => {
                let modifier = 1;
                if(this.currentSortDir === 'desc') modifier = -1;
                if(a[this.currentSort] < b[this.currentSort]) return -1 * modifier;
                if(a[this.currentSort] > b[this.currentSort]) return 1 * modifier;
                return 0;
            });
        }
    },
    methods: {
        sort(s) {
            //if s == current sort, reverse
            if(s === this.currentSort) {
                this.currentSortDir = this.currentSortDir==='asc'?'desc':'asc';
            }
            this.currentSort = s;
        },
        submit_form(){
            this.showError = false
            let err = []
            let names = this.participantsList
            names = names.replace(/(\s*,?\s*)*$/, "").replace(/,+/g,",").replace(/(,\s*$)|(^,*)/, "")
            if(names.match(/^[А-Яа-яЁё,\s]*$/) && names != '') {
                let resultArr = this.participantsArray;
                let arrayOfStrings = names.replace(/ /g,'').split(',');
                for(let i=0; i<arrayOfStrings.length; i++) {
                    resultArr.push({index: Number(this.participantsArray.length) +1 , name: arrayOfStrings[i], ball: this.randomInteger(0, 100)})
                }
                if(resultArr.length != 0) {
                    this.participantsArray = resultArr
                    this.showTable = true
                }
                this.participantsList = ''
            } else {
                err.push('Ошибка валидации')
                if(/\d/.test(names)) { err.push('Вы ввели Числа')}
                if(/[a-zA-Z]/g.test(names)) { err.push('Вы ввели латинские буквы')}
                this.showError = true
            }
            if(names == '') {
                err.push('Это поле Обязательно для ввода')
                this.showError = true
            }
            this.errorMsgArr = err
            console.log('нет')
        },
        blockSpecialChar(event) {
            console.log(event.keyCode)
        },
        randomInteger(min, max) {
            // получить случайное число от (min-0.5) до (max+0.5)
            let rand = min - 0.5 + Math.random() * (max - min + 1);
            return Math.round(rand);
        }

    },
    mounted() {
    // https://www.raymondcamden.com/2018/02/08/building-table-sorting-and-pagination-in-vuejs
    }
}
</script>

<style scoped>
    th {cursor: pointer}
</style>
