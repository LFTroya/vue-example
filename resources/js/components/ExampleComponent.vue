<template>
    <div>
        <h1>{{ label }}</h1>

        <ul>
            <li v-for="user in users">
                {{user.name}} | {{user.email}}
                <button @click="destroy(user)">X</button>
            </li>
        </ul>

        <form @submit.prevent="create">
            <input type="text" v-model="form.name">
            <input type="text" v-model="form.email">
            <input type="password" v-model="form.password">
            <button>Create</button>
        </form>
    </div>
</template>

<script>
  export default {
    props: {
      users: {
        type: Array,
        required: true
      }
    },

    data() {
      return {
        form: {
          name: 'Michael Gallego',
          email: 'mgallego@ccxc.us',
          password: 'secret123',
          age: 20
        }
      }
    },

    computed: {
      label() {
        return 'Soy un label';
      }
    },

    methods: {
      async create() {
        const {data: user} = await window.axios.post(
          `/api/users`,
          this.form
        );

        // this.users.push(user);
      },

      async destroy(userToDestroy) {
        const {data: user} = await window.axios.delete(
          `/api/users/${userToDestroy.id}`
        );

        this.users = this.users.filter(u => u.id !== user.id);
      }
    }
  }
</script>
