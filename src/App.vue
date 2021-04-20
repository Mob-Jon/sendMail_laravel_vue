<template>
  <v-app>
    <v-app-bar
      app
      color="#000000"
      dark
    >
      <div class="d-flex align-center">
        <v-img
          alt="Vuetify Logo"
          class="shrink mr-2"
          contain
          src="https://4.bp.blogspot.com/-yYrR3xd7428/W6n1_nO_hMI/AAAAAAAAF9Y/KRxAgHldpD4_fdlJwAaVuvjQIczOZxzOACLcBGAs/s1600/3.png"
          transition="scale-transition"
          width="40"
        />
        <h3>ML-Project</h3>
      </div>

      <v-spacer></v-spacer>

      <v-btn
        text
      >
        <span class="mr-2">Logout</span>
      </v-btn>
      <template v-slot:extension>
        <v-tabs color="white" background-color="#B71C1C">
          <v-tab>Manage request</v-tab>
          <v-tab>Manage content</v-tab>
          <v-tab>Reports</v-tab>
        <v-tab>Manage users</v-tab>
        </v-tabs>
      </template>
    </v-app-bar>


    <v-main>
      <Email/>
    </v-main>
  </v-app>
</template>

<script>

import Email from './components/Email';

export default {
  name: 'App',

  components: {
    Email,
  },

  data: () => ({
    //
  }),
};
</script>
