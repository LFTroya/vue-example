<template>
    <h1>Usuarios</h1>
</template>

<script>
    export default {
      props: {
        users: {
          type: Array,
          required: true
        }
      },

      async mounted() {
        const {data: users} = await window.axios.get('/api/users');
        console.log(users);
      }
    }
</script>
