<template>
  <v-app>
    <v-card color="lighten-4" flat height="200px" tile>
      <v-toolbar dark color="primary" tile>
        <v-container>
          <v-row>
            <v-toolbar-title class="title">
              <span>{{title}}</span>
            </v-toolbar-title>
            <v-spacer></v-spacer>
            <div class="route-links">
              <router-link class="route-link" :to="{ name: 'login'}" v-if="!isLoggedIn">Login</router-link>
              <v-btn color="primary" v-if="isLoggedIn" @click="logout">Logout</v-btn>
            </div>
          </v-row>
        </v-container>
      </v-toolbar>
      <v-container>
        <router-view></router-view>
      </v-container>
    </v-card>
  </v-app>
</template>

<script src="../services/components/layout.js">
</script>
<style scoped>
@import "../../css/components/layout.css";
</style>
