<template>
  <div class="container">
    <div class="card">
      <div class="card-header">ToDo App</div>
      <form @submit.prevent="save">

<div class="form-group">
    <label>Name</label>
    <input type="text" v-model="todo.name" class="form-control"  placeholder="name">

</div>

<div class="form-group">
    <label>Address</label>
    <input type="text" v-model="todo.address" class="form-control"  placeholder="Address">

</div>

<div class="form-group">
    <label>Mobile</label>
    <input type="text" v-model="todo.mobile" class="form-control"  placeholder="Mobile">

</div>

<div class="form-group">
    <label>Country</label>
    <input type="text" v-model="todo.country" class="form-control"  placeholder="Country">

</div>

<button type="submit" class="btn btn-primary">Save Data</button>
</form>

    </div>

<h2>View All ToDo List</h2>
    <table class="table table-dark">
<thead>
  <tr>
    <th scope="col">ID</th>
    <th scope="col">Name</th>
    <th scope="col">Address</th>
    <th scope="col">Mobile</th>
    <th scope="col">Country</th>
    <th scope="col">Action</th>
  </tr>
</thead>

<tbody>
  <tr v-for="todo in result" v-bind:key="todo.id">

        <td>{{ todo.id }}</td>
        <td>{{ todo.name }}</td>
        <td>{{ todo.address }}</td>
        <td>{{ todo.mobile }}</td>
        <td>{{ todo.country }}</td>
        <td>
          <button type="button" class="btn btn-warning" @click="edit(todo)">Edit</button>
          <button type="button" class="btn btn-danger"  @click="remove(todo)">Delete</button>
        </td>
      </tr>

</tbody>
</table>
</div>

</template>

<script>
import Vue from 'vue'
import axios from 'axios'

Vue.use(axios)

export default {
  name: 'ToDo',
  data () {
    return {
      result: {},
      todo: {
        id: '',
        name: '',
        address: '',
        mobile: '',
        country: ''

      }
    }
  },
  created () {
    this.ToDoLoad()
  },
  mounted () {
    console.log('mounted() called.......')
  },

  methods: {
    ToDoLoad () {
      var page = 'http://127.0.0.1:8000/api/todo'
      axios.get(page)
        .then(
          ({data}) => {
            console.log(data)
            this.result = data
          }
        )
    },

    save () {
      if (this.todo.id === '') {
        this.saveData()
      } else {
        this.updateData()
      }
    },
    saveData () {
      axios.post('http://127.0.0.1:8000/api/save', this.todo)
        .then(
          ({data}) => {
            alert('Save Data')
            this.ToDoLoad()
            this.todo.name = ''
            // eslint-disable-next-line no-unused-expressions, no-sequences
            this.todo.address = '',
            this.todo.mobile = '',
            this.todo.country = ''
            this.id = ''
          }
        )
    },
    edit (todo) {
      this.todo = todo
    },
    updateData () {
      var editrecords = 'http://127.0.0.1:8000/api/update/' + this.todo.id
      axios.put(editrecords, this.todo)
        .then(
          ({data}) => {
            this.todo.name = ''
            // eslint-disable-next-line no-unused-expressions, no-sequences
            this.todo.address = '',
            this.todo.mobile = '',
            this.todo.country = ''
            this.id = ''
            alert('Updated Data')
            this.ToDoLoad()
          }
        )
    },

    remove (todo) {
      var url = `http://127.0.0.1:8000/api/delete/${todo.id}`

      // var url = 'http://127.0.0.1:8000/api/delete/'+ employee.id;
      axios.delete(url)
      alert('Deleted Data')
      this.ToDoLoad()
    }
  }
}
</script>
