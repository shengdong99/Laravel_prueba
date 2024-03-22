<template>
    <div class="flex justify-center items-center">
      <form @submit.prevent="register">
        <div class="mb-4">
            <label for="">Name</label>
            <input v-model="name" type="text" id="name" placeholder="Nombre"></input>
        </div>
        <div class="mb-4">
            <label for="">Email</label>
            <input v-model="email" type="email" id="email" placeholder="Email"></input>
        </div>
        <div class="mb-4">
            <label for="">Password</label>
            <input v-model="password" type="password" id="password" placeholder="Password"></input>
        </div>


        <button type="submit" class="bg-blue-500 text-white">
            Register
        </button>
      </form>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return { 
          name: '',
          email: '',
          password: '',       
      };
    },
    methods: {
      register() {
        axios
            .post('api/register',{
                name: this.name,
                email: this.email,
                password: this.password,
            })
            .then((response)=>{
                console.log(response)
                localStorage.setItem('token', response.data.token)
                this.$router.push({name:'Profile'});
            })
            .catch((error) => {
                console.error('Error de registro:', error);
            });
      },
    },
  };
  </script>
  