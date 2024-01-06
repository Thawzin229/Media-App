import axios from "axios"
export default{
  name:"HomePageView",
  data:()=>({
    post:[],
    category:[],
    searchVal:"",
    tokenStatus:true
  }),
  methods: {
    getPostData() {
      axios.get("http://127.0.0.1:8000/api/post").then((data)=>{
        for (let i = 0; i < data.data.post.length; i++) {
          if(data.data.post[i].image != null){
          data.data.post[i].image = "http://127.0.0.1:8000/storage/" + data.data.post[i].image;
          }else{
            data.data.post[i].image = "http://127.0.0.1:8000/default-image.jpg";
          }

        }
        this.post = data.data.post;
      })
    },
    getCategoryData(){
      axios.get("http://127.0.0.1:8000/api/category").then((data)=>{
        this.category = data.data.category;
      })
    },
    //search post
    searchPost(){
      let searchVal = {"searchVal" : this.searchVal}
      axios.post("http://127.0.0.1:8000/api/searchpost",searchVal).then((data)=>{
        for (let i = 0; i < data.data.data.length; i++) {
          if(data.data.data[i].image != null){
            data.data.data[i].image  = "http://127.0.0.1:8000/storage/"+data.data.data[i].image;
          }else{
            data.data.data[i].image  = "http://127.0.0.1:8000/default-image.jpg";
          }
        }
        this.post = data.data.data;
      })
    },
    //search category
    searchCategoryData(id){
      let ID = {"id":id}
      axios.post("http://127.0.0.1:8000/api/searchcategory",ID).then((data)=>{
        for (let i = 0; i < data.data.result.length; i++) {
          if(data.data.result[i].image != null){
            data.data.result[i].image  ="http://127.0.0.1:8000/storage/"+data.data.result[i].image;
          }else{
            data.data.result[i].image  = "http://127.0.0.1:8000/default-image.jpg";
          }
        }
        this.post = data.data.result;
      })
    },
    // to post detail page
    toPostDetail(id){
      this.$router.push({name:"postdetail",params:{postid:id}})
    },
    login(){
      this.$router.push({name:"loginpage"});
    },
    logout(){
      this.$store.dispatch("setToken",null);
      this.login();
    }
  },
  mounted () {
    if(this.$store.state.token != null){
      this.getPostData();
      this.getCategoryData();
    }else{
      this.tokenStatus =false;
    }
  },
}