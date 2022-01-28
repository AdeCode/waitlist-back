<template>
  <div class="wait-list">
    <div class="wait-list-col">
      <div class="left">
        <div class="left-top">
          <img :src="getLogo()" class="img" alt="" id="home-landing-img" />
        </div>
        <div class="left-bottom">
          <h2>Join Us</h2>
          <p>
            We're building a Community for Creatives and Creators. And we'll
            like you to be a part of this new budding community of talented
            individuals.
          </p>
          <div class="form">
            <h2 class="header">Subscribe</h2>
            <form
              class="needs-validation"
              novalidate
              @submit.prevent="onSubmit"
            >
              <div class="col-md-12 mb-3">
                <input
                  type="text"
                  class="form-control"
                  id="validationCustom01"
                  placeholder="Name"
                  v-model="form.name"
                  required
                />
                <div class="valid-feedback">Looks good!</div>
                <div class="invalid-feedback">Please enter your name.</div>
              </div>
              <div class="col-md-12 mb-3">
                <input
                  type="email"
                  v-model="form.email"
                  class="form-control"
                  id="validationCustom01"
                  placeholder="Enter Email"
                  required
                />
                <div class="valid-feedback">Looks good!</div>
                <div class="invalid-feedback">Please enter a valid email.</div>
              </div>

              <button class="btn btn-primary" type="submit">
                Join Our Waitlist
              </button>
            </form>

            <div class="form-footer">
              We respect your privacy, Unsubsribe at anytime.
            </div>
          </div>
        </div>
      </div>
      <div class="right">
        <img :src="getJoinImage()" class="img" alt="" id="home-landing-img" />
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";

export default {
  name: "Waitlist",

  components: {},

  data() {
    return {
      form: {
        email: "",
        name: "",
      },
      isLoading: false,
      url: "",
    };
  },

  methods: {
    onSubmit(event) {
      event.preventDefault();
      this.isLoading = true;
      axios
        .post("/submitWaitlist", this.form)
        .then((response) => {
          const result = response.data;
          console.log(result);
          this.form.email = "";
          this.form.name = "";
        })
        .catch((error) => {
          console.error(error);
        });
    },

    getLogo() {
      return "images/logo.jpg";
    },
    getJoinImage() {
      return "images/join.jpg";
    },
  },
};
</script>

<style lang="scss">
@import "../static/scss/_config";

.wait-list {
  width: var(--full);
  height: 100%;
  background-color: var(--background-color);
  display: flex;
  align-items: center;
  justify-content: center;

  &-col {
    background-color: #fff;
    width: 60%;
    height: 80%;
    border-radius: 10px;
    display: flex;
    margin: 30px 0;

    @media (max-width: 480px) {
      flex-direction: column-reverse;
      width: 95%;
    }

    .left {
      background-color: var(--white);
      height: 100%;
      width: 50%;
      border-top-left-radius: 10px;
      border-bottom-left-radius: 10px;
      display: flex;
      flex-direction: column;

      @media (max-width: 480px) {
        display: flex;
        width: 100%;
        border-bottom-right-radius: 10px;
      }

      &-top {
        img {
          width: 100%;
          height: 200px;
          border-top-left-radius: 10px;
        }
      }

      &-bottom {
        width: 100%;
        margin: 10px 0;
        padding: 0 20px;

        @media (max-width: 480px) {
          padding: 0 17px;
        }

        .form {
          width: 100%;

          input {
            background-color: #d9d9d9;
            height: 50px;
            border-radius: 0;
          }

          input:focus {
            outline: none;
          }

          input {
            background-color: #d9d9d9;
            border-radius: 0;
          }

          input:focus {
            outline: none;
          }

          .error {
            color: red;
          }

          .btn {
            background-color: #0f2b53;
            color: var(--white);
            width: 100%;
            height: 50px;
            border-radius: 0;
          }

          .form-footer {
            font-size: 12px;
            text-align: center;
            color: #bbb8b8;
            margin-top: 20px;
          }
        }
      }
    }

    .right {
      background-color: brown;
      height: 100%;
      width: 50%;
      border-top-right-radius: 10px;
      border-bottom-right-radius: 10px;

      @media (max-width: 480px) {
        width: 100%;
      }

      .img {
        height: 100%;
        width: 100%;
        border-top-right-radius: 10px;

        @media (min-width: 481px) {
          border-bottom-right-radius: 10px;
        }

        @media (max-width: 480px) {
          border-top-right-radius: 10px;
          border-top-left-radius: 10px;
          height: 200px;
        }
      }
    }
  }

  .loginBut {
    padding: 7px 25px !important;
    letter-spacing: 0px;
    font-weight: 600;
    margin-top: 25px;
    border-radius: var(--border-radius);
    width: 125px;
    background: var(--blue) !important;
    color: var(--white);
  }
}
</style>
