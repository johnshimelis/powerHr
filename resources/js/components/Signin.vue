<template >
  <article>
    <div class="container">
            <div class="overlay-container" :class="{'sign-up-active' : signUp}">
               <div class="overlay">
                 <div class="overlay-left">
                      <div class="sign-up">
                            <form class="sign-up" action="/signup" method="post">
                                 @csrf
                                <h1>Create Login</h1>
                                <div id="reg_student">
                                <div >Use your email for registration</div>
                                <input type="text" placeholder="Student ID" />
                                <input type="text" name="student_name" placeholder="Name" />
                                <input type="email" name="student_email" placeholder="Email" />
                                <input type="password" name="student_pass" placeholder="Password" />
                                <input type="password" name="student_pass_confirm" placeholder="Confirm Password" />
                                </div>
                                <div id='reg_admin'>
                                    <div >Use your email for registration</div>
                                    <input type="text" name="admin_name" placeholder="Name" />
                                <input type="email" name="admin_email" placeholder="Email" />
                                <input type="password" name="admin_pass" placeholder="Password" />
                                <input type="password" name="admin_pass_confirm" placeholder="Confirm Password" />
                               
                                    </div>
                                    <div id='reg_psychiatry'>
                                        <div >Use your email for registration</div>
                                        <input type="text" name="psychiatry_name"  placeholder="Name" />
                                    <input type="email" name="psychiatry_email" placeholder="Email" />
                                    <input type="password" name="psychiatry_pass" placeholder="Password" />
                                    <input type="password" name="psychiatry_pass_confirm" placeholder="Confirm Password" />
                                    <input type='file'/>
                                        </div>
                                <select name='roles' id='dropdown'>
                                    <option value='student'>Student</option>
                                    <option value='admin' selected>Admin</option>
                                    <option value='psychiatry'>Psychiatry</option>
                                    </select>
                                <button type='submit' value='submit'>Sign Up</button>
                            </form>
                        </div>
                    </div>
                    
            <div  class="sign-in">
                <form class="sign-in" action="#">
                    <h1>Sign In</h1>
                    <div>Use your account</div><br>
                    <div class="social-container">
                        <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                        <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                    <input type="email" placeholder="Email" />
                    <input type="password" placeholder="Password" />
                    <a href="#">Forget Your Password?</a>
                    <button>Sign In</button>
                </form>
            </div>
                    <div class="overlay-right">
                        <h2>Hello, Users!</h2>
                        <p v-if="!signUp">Please enter your personal detail to create account</p>
                        <p v-else-if="signUp">Please enter your personal detail to login</p>
                        <button class="invert" id="signUp" @click="signUp = !signUp" v-if="!signUp">Sign Up</button>
                        <button class="invert" id="signUp" @click="signUp = !signUp" v-else-if="signUp">Sign In</button>
                    </div>
                  
                     
                
                </div>
                
            </div>
       
      
        </div>
  </article>
</template>
<script>
const $ = require('jquery');
window.$ = $;
 $(document).ready(function(){
    $('#reg_student').hide();
    $('#reg_psychiatry').hide();
   $('#dropdown').on('change',function(){
    if(this.value=='admin'){
        $('#reg_student').hide();
        $('#reg_psychiatry').hide();
        $('#reg_admin').show();

    }
    else if(this.value=='student'){
        $('#reg_admin').hide();
        $('#reg_psychiatry').hide();
        $('#reg_student').show();
    }
    else if(this.value =='psychiatry'){
        $('#reg_admin').hide();
        $('#reg_student').hide();
        $('#reg_psychiatry').show();
    }

   })
 });

export default {
  name: "sign-in",
  data() {
    return {
      signUp: false,
    };
  },

  methods: {},
};
</script>

<style lang="scss" scoped>

body {
  background: blue;
}
.container {
  position: relative;
  margin: auto;
  margin-top: 50px;
  width: 768px;
  height: 480px;
  border-radius: 10px;
  overflow: hidden;
  box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2), 0 10px 10px rgba(0, 0, 0, 0.2);
  background: linear-gradient(to bottom, #efefef, #ccc);
}
.overlay-container {
  position: absolute;
  top: 0;
  left: 50%;
  width: 50%;
  height: 100%;

  transition: transform 0.5s ease-in-out;
  z-index: 100;
}
.overlay {
  position: relative;
  left: -100%;
  height: 100%;
  width: 200%;
  background: linear-gradient(to bottom right, red, blue);
  color: #fff;
  transform: translate(0);
  transition: transform 0.5s ease-in-out;
}

.overlay-left {
  position: absolute;
  top: 0;

  display: flex;
  align-items: center;
  justify-content: space-around;
  flex-direction: column;
  padding: 70px 20px;
  width: calc(50% - 80px);
  height: calc(100% - 140%);
  text-align: center;
  transform: translateX(0);
  transition: transform 0.5s ease-in-out;
}

.overlay-right {
  position: absolute;
  top: 150px;
  right: 50px;
  display: flex;
  align-items: center;
  justify-content: space-around;
  flex-direction: column;
  padding: 70px 40px;
  width: calc(50% - 80px);
  height: calc(100% - 140%);
  text-align: center;
  transform: translateX(20%);
  transition: transform 0.5s ease-in-out;
}
h2 {
  margin: 0;
}
P {
  margin: 20px 0 30px;
  color: #fff;
  margin-top: 50px;
  font-size: 20px;
  font-weight: bold;
}
a {
  color: #222;
  text-decoration: none;
  margin: 15px 0;
  font-size: 1rem;
}
h1 {
  font-weight: bold;
  color: #000;
  font-size: 30px;
}
button {
  border-radius: 20px;
  border: 1px solid blue;
  background-color: blue;
  color: #fff;
  font-size: 1rem;
  font-weight: bold;
  padding: 10px 40px;
  letter-spacing: 1px;
  text-transform: uppercase;
  transition: transform 0.1s ease-in-out;

  &:active {
    transform: scale(0.9);
  }
  &.focus {
    outline: none;
  }
}

button.invert {
  background-color: transparent;
  border-color: #fff;
}
select {
  margin-left: -160px;
  border-radius: 10px;
  border: 1px solid #fff;
  margin-top: 10px;
  background: linear-gradient(to bottom, #efefef, #ccc);
  height: 150px;
  width: 120px;
}
select option {
  background-color: #ddd;
}
form {
  position: absolute;
  top: 0;
  display: flex;
  align-items: center;
  justify-content: space-around;
  flex-direction: column;
  padding: 90px 60px;
  width: 300px;
  height: 300px;
  text-align: center;
  background: linear-gradient(to bottom, #efefef, #ccc);
  transition: all 0.5s ease-in-out;
}
.sign-up div {
  font-size: 1rem;
  color: black;
}
.sign-in div {
  font-size: 1rem;
  color: black;
}
input {
  background-color: #eee;
  border: none;
  padding: 8px 15px;
  margin: 6px 0;
  width: calc(100% - 30px);
  border-radius: 15px;
  border-bottom: 1px solid #ddd;
  box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.4), 0 -1px 1px #fff, 0 1px 0 #fff;
  overflow: hidden;
  &.focus {
    outline: none;
    background-color: #fff;
  }
}

div.sign-in {
  margin-left: -30px;
  z-index: 2;
  width: 100%;
}
.sign-up button {
  margin-right: -170px;
}
div.sign-up {
  margin-top: -200px;
  left: 0;
  margin-left: 50px;
  z-index: 1;
  opacity: 0;
  width:100%;
}
.sign-up button {
  margin-top: 30px;
}

.sign-up-active {
  .sign-up {
    transform: translateX(115%);
    opacity: 1;
    z-index: 5;
  }
  .sign-in {
    transform: translateX(100%);
  }
  .overlay {
    transform: translateX(-40%);
    opacity: 1;
    margin-left: 20px;

    p {
      margin-left: -200px;
    }
    h2 {
      margin-left: -200px;
    }
    button {
      margin-left: -200px;
    }
  }
}
.sign-in input {
  margin-top: 20px;
  height: 30px;
}
.social-container {
  margin: 20px 0;
}
.social-container a {
  border: 1px solid #ddd;

  font-size: 20px;
  border-radius: 50%;
  display: inline-flex;
  justify-content: center;
  align-items: center;
  margin: 0 5px;
  height: 20px;
  width: 40px;
}
form {
  height: 380px;
}
</style>
