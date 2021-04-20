<template>
  <v-card class="mx-auto" max-width="344">
    <v-card-text>
      <v-form ref="form" v-model="valid">
        <v-text-field
          v-model="data.email"
          :rules="[rules.required]"
          label="Email"
        ></v-text-field>
        <span>{{this.error.email}}</span>

        <v-text-field
          v-model="data.topic"
          :rules="[rules.required]"
          label="Topic"
        ></v-text-field>
        <v-textarea
          v-model="data.body"
          :rules="[rules.required]"
          label="Email Body"
        ></v-textarea>
        <v-btn :disabled="!valid" color="success" class="mr-4" @click="send">
          SEND
        </v-btn>
      </v-form>
    </v-card-text>
  </v-card>
</template>
<script>
import axios from "axios";
export default {
  data() {
    return {
      data: {},
      error: {},
      valid: false,

      rules: {
        required: value => !!value || "Required.",
        email: v => /.+@.+\..+/.test(v) || "E-mail must be valid" 
        
      }
    };
  },
  mounted() {
    console.log("component mounted");
  },
  methods: {
    send() {
      console.log("sdsfdgfd");
      axios
        .post("http://127.0.0.1:8000/api/send/email/", this.data)
        .then(res => {
          console.log(res.data);
          if (res.data.message == "Failed") {
            this.error = res.data.errors;
            console.log("Error message : ", this.error);
          } else {
            console.log("Result: ", res.data);
          }
        })
        .catch(error => {
          console.log("Error Message :", error);
        });
    }
  }
};
</script>