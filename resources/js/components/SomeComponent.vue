<template>
    <div class="w-25">
        <form>
            <div class="mb-3">
                <input type="text" class="form-control" v-model="name" id="name" placeholder="name">
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" v-model="age" id="age" placeholder="age">
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" v-model="job" id="job" placeholder="job">
            </div>
            <div class="mb-3">
                <input @click.prevent="addPerson" class="btn btn-primary" value="добавить">
            </div>

        </form>
    </div>
</template>

<script>

import axios from 'axios';

export default {
    data() {
        return {
            name: null,
            age: null,
            job: null,
        }

    },

    methods: {
        addPerson() {
            axios.post('/api/people', {name: this.name, age: this.age, job: this.job})
                .then(res => {
                    console.log(res);
                })
                .catch(res=> {
                    console.log(res)
                })
        }
    },

    name: "CreateComponent"
}
</script>

<style scoped>

</style>
