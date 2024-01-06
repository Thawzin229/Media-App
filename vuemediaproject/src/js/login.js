import axios from "axios"
export default{
  name:"LoginPage",
  data:()=>({
    userData : {email:"" , password:""},
    tokenStatus:true
  }),
  methods: {
    home() {
      this.$router.push({name:"homepage"});
    },
    accLogin(){
      axios.post("http://127.0.0.1:8000/api/user/login",this.userData).then((data)=>{
        if(data.data.token != null){
          this.$store.dispatch("setToken", data.data);
          this.home();
        }else{
          this.tokenStatus = false;
        }
      })
    },
  },
}