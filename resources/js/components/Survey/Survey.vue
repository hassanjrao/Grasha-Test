<template>
  <v-app app>
    <v-container>
      <v-card>
        <v-card-title class="text-center">
          <h2 class="pt-2">Questionaire</h2>
        </v-card-title>
        <v-card-text>
          <v-row>
            <v-col cols="12" sm="6" md="4">
              <v-select
                v-model="userInfo.type"
                :items="['Student', 'Tutor']"
                label="Student/Tutor"
                required
                disabled
                @input="$v.userInfo.type.$touch()"
                :error-messages="userTypeErrors"
                @blur="$v.userInfo.type.$touch()"
              ></v-select>
            </v-col>
            <v-col cols="12" sm="6" md="4">
              <v-text-field
                v-model="userInfo.name"
                label="Name"
                required
                :disabled="useInfoDisabled"
                @input="$v.userInfo.name.$touch()"
                :error-messages="userNameErrors"
                @blur="$v.userInfo.name.$touch()"
              ></v-text-field>
            </v-col>
            <v-col cols="12" sm="6" md="4">
              <v-text-field
                v-model="userInfo.email"
                label="Email"
                required
                :disabled="useInfoDisabled"
                @input="$v.userInfo.email.$touch()"
                :error-messages="userEmailErrors"
                @blur="$v.userInfo.email.$touch()"
              ></v-text-field>
            </v-col>
          </v-row>

          <v-row class="justify-content-end">
            <!-- sumbit -->

            <v-col cols="12" sm="6" md="4" class="text-end">
              <v-btn
                color="primary"
                v-if="!useInfoDisabled"
                :loading="submitUserInfoLoading"
                @click="submitUserInfo"
                >Submit & Start</v-btn
              >
            </v-col>
          </v-row>
        </v-card-text>
      </v-card>

      <v-divider></v-divider>

      <Question :user="user" v-if="user"></Question>
    </v-container>
  </v-app>
</template>

<script>
import { required, requiredIf, email } from "vuelidate/lib/validators";
import alert from '../../shared/alert'

import Question from "./Question.vue";

export default {

    props:{
        type:{
            type:String,
            required:true
        }
    },

  validations: {
    userInfo: {
      type: {
        required,
      },
      name: {
        required,
      },
      email: {
        required,
        email,
      },
    },
  },

  computed: {
    userTypeErrors() {
      const errors = [];
      if (!this.$v.userInfo.type.$dirty) return errors;
      !this.$v.userInfo.type.required && errors.push("Type is required.");
      return errors;
    },
    userNameErrors() {
      const errors = [];
      if (!this.$v.userInfo.name.$dirty) return errors;
      !this.$v.userInfo.name.required && errors.push("Name is required.");
      return errors;
    },
    userEmailErrors() {
      const errors = [];
      if (!this.$v.userInfo.email.$dirty) return errors;
      !this.$v.userInfo.email.required && errors.push("Email is required.");
      !this.$v.userInfo.email.email && errors.push("Must be valid e-mail");
      return errors;
    },
  },

  created() {
    this.showStatus = alert.showStatus;

    this.userInfo.type = this.type;
    console.log("type",this.type);
  },
  data() {
    return {
      power: 26,
      userInfo: {
        type: "",
        name: "",
        email: "",
      },
      useInfoDisabled: false,
      submitUserInfoLoading: false,
      baseURL: "/survey",
      user:null,
    };
  },

  methods: {
    submitUserInfo() {
      this.$v.$touch();
      if (this.$v.$invalid) {
        return;
      }

      this.submitUserInfoLoading = true;

      axios
        .post(this.baseURL + "/submit-user-info", {
            name: this.userInfo.name.toLowerCase(),
            email: this.userInfo.email.toLowerCase(),
            type: this.userInfo.type.toLowerCase(),
        })
        .then((response) => {

            console.log(response);

          this.submitUserInfoLoading = false;

          this.user = response.data.data.user;

          this.user.type = this.userInfo.type.toLowerCase();

          console.log("user",this.user);

          this.showStatus(response.data.message, "success");

            this.useInfoDisabled = true;

        })
        .catch((error) => {
          console.log(error);
          this.submitUserInfoLoading = false;
            this.showStatus(error.response.data.message, "error");
        });
    },
  },

  components:{
    Question
  }
};
</script>
