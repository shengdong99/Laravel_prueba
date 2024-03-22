<template>
    <div>
      <h2>Perfil de Usuario</h2>
      <div v-if="user">
        <p>Nombre: {{ user.name }}</p>
        <p>Correo electrónico: {{ user.email }}</p>
      </div>
      <button class="big-blue-500 text-white" @click="logout">Salir</button>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        user: null
      };
    },

    mounted(){
        fetch('api/user',{
            method : 'GET',
            headers:{
                'Authorization': 'Bearer' + localStorage.getItem('token'),
            },
        })
        .then((response) => response.json())
        .then((data) =>{
            this.user = data;
        })
        .catch((error)=>{
            console.error('Error al cargar los datos', error);
        });
  
  },
  method:{
    logout(){
        fetch('/logout',{
            method : 'POST',
            headers:{
                'Authorization': 'Bearer' + localStorage.getItem('token'),
            },
        })
        .then(() =>{
            localStorage.removeItem('token');
            this.$router.push({name:'Login'});
        })
        .catch((error)=>{
            console.error('Error al cerrar sesion', error);
        });
    },
  },
};
  </script>
  