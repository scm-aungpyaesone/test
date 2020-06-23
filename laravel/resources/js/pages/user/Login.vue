<template>
  <div>
    <b-form @submit.stop.prevent="onSubmit">
      <p>{{errors.others}}</p>
      <b-form-group>
        <label>Email</label>
        <b-form-input
          class="form-control"
          id="email"
          name="email"
          v-model="user.email"
          :state="!errors.email?null:false"
        ></b-form-input>
        <b-form-invalid-feedback id="email-live-feedback">{{errors.email}}</b-form-invalid-feedback>
      </b-form-group>
      <b-form-group>
        <label>Password</label>
        <b-form-input
          class="form-control"
          id="password"
          name="password"
          type="password"
          v-model="user.password"
          :state="!errors.password?null:false"
        ></b-form-input>
        <b-form-invalid-feedback id="email-live-feedback">{{errors.password}}</b-form-invalid-feedback>
      </b-form-group>
      <b-button type="submit" variant="primary">Login</b-button>
    </b-form>
  </div>
</template>
<script src="../../services/user/login.js">
</script>

<style scoped>
@import "../../../css/user/login.css";
</style>