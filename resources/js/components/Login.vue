<template>
    <div class="flex justify-center items-center">
      <form @submit.prevent="login" class="w-1/3">

        <div >
          <label for="email" class="block text-gray-700">Email</label>
          <input v-model="email" type="email" id="email" placeholder="Email" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" required>
        </div>
        <div >
          <label for="password" class="block text-gray-700">Password</label>
          <input v-model="password" type="password" id="password" placeholder="Password" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" required>
        </div>

        <button type="submit" class="w-full bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Iniciar sesión</button>
      </form>
    </div>
  </template>
  
  <script>

        export default {
            data() {
            return {
                email: '',
                password: ''
                 };
            },
            methods: {
            login() {
                axios
                    .post('/api/login', {
                        email: this.email,
                        password: this.password
                    })
                    .then(response => {
                        alert("Inicio OK");
                        localStorage.setItem('token', response.data.token);
                        this.$router.push({ name: 'Profile' });
                    })
                    .catch((error) => {
                        alert("Inicio OK");
                        console.error('Error de inicio de sesión:', error);
                    });
                }
            }
        };
  </script>
  