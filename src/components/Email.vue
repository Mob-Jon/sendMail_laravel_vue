<template>
  <div class="container pt-5">
    <br /><br /><br />
    <div class="card p-5">
      <h4>Email Our Mailing List</h4>
      <small class="pb-3"
        >Sending bulk email to our mailing list contacts using Twilio
        SendGrid</small
      >
      <form v-on:submit.prevent="send">
        <div class="form-group">
          <label>
            <input
              type="text"
              class="form-control"
              placeholder="Topic"
              v-model="data.topic"
            />
          </label>
        </div>
        <div class="form-group">
          <label>
            <input
              type="text"
              class="form-control"
              placeholder="Sender Email"
              v-model="data.email"
            />
          </label>
        </div>
        <div class="form-group">
          <label>
            <textarea
              class="form-control"
              placeholder="Enter email body"
              v-model="data.body"
            ></textarea>
          </label>
        </div>
        <button type="submit" class="btn btn-outline-success">
          Send Emails
        </button>
      </form>
      <div class="pt-3 danger">
        {{ this.error }}
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
export default {
  data() {
    return {
      data: {},
      error: {},
    };
  },
  mounted(){
    console.log('component mounted')
  },
  methods: {
    send() {
      console.log('sdsfdgfd');
        axios.post("http://127.0.0.1:8000/api/send/email", this.data)
        .then((res) => {
          console.log(res);
        })
        .catch((error) => {
          console.log(error);
          alert(this.data.errors);
        });
    },
  },
};
</script>