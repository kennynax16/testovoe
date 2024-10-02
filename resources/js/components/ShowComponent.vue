<template>
    <div>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">name</th>
                <th scope="col">age</th>
                <th scope="col">job</th>
                <th scope="col">edit</th>
                <th scope="col">delete</th>
            </tr>
            </thead>
            <tbody>
            <template v-for="person in people">


                <tr :class="isEdit(person.id) ? 'd-none' : ''">
                    <th scope="row">{{ person.id }}</th>
                    <td>{{ person.name }}</td>
                    <td>{{ person.age }}</td>
                    <td>{{ person.job }}</td>
                    <td><a href="#" @click.prevent="changeEditPersonId(person.id, person.name ,person.age,person.job)"
                           class="btn btn-success">edit</a></td>
                    <td><a href="#" @click.prevent="deletePerson(person.id)" class="btn btn-danger">delete</a></td>
                </tr>
                <edit-component :person="person" :ref="`edit_${person.id}`"></edit-component>
            </template>
            </tbody>
        </table>
    </div>
</template>

<script>

import axios from 'axios';
import EditComponent from "./EditComponent.vue";
import {th} from "vuetify/locale";

export default {
    data() {
        return {
            people: null,
            editPersonId: null,
            name: '',
            age: null,
            job: '',
        }

    },

    mounted() {
        this.getPeople()


    },
    methods: {
        getPeople() {
            axios.get('/api/people')
                .then(res => {
                    this.people = res.data;
                })
        },

        UpdatePerson(id) {
            this.editPersonId = null
            axios.patch(`/api/people/${id}`, {name: this.name, age: this.age, job: this.job})
                .then(res => {
                    this.getPeople()
                })
        },
        deletePerson(id) {
            axios.delete(`/api/people/${id}`)
                .then(res => {
                    this.getPeople()
                })
        },
        changeEditPersonId(id, name, age, job) {
           this.editPersonId = id
            let  editName = `edit_${id}`
            let fullEditName = this.$refs[editName][0];

            fullEditName.name = name;
            fullEditName.age = age;
            fullEditName.job = job;

        },
        isEdit(id) {
            return this.editPersonId === id
        }
    },
    name: "IndexComponent",
    components: {
        EditComponent
    }
}
</script>

<style scoped>

</style>
