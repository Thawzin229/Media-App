import axios from "axios";

export default{
  name:"PostDetailView",
  data:()=>({
    postid:0,
    detail:{},
    viewcount:0
  }),
  methods: {
    postDetail(){
      this.postid = this.$route.params.postid
      let postid = {"postid":this.postid}
      axios.post("http://127.0.0.1:8000/api/postdetail" ,postid).then((data)=>{
        let postdetail = data.data.detailpost;
        if(postdetail.image != null){
          postdetail.image = "http://127.0.0.1:8000/storage/" + postdetail.image;
        }else{
          postdetail.image = "http://127.0.0.1:8000/default-image.jpg";
        }
        this.detail = postdetail;
      })
    },
    back(){
      this.$router.push({name:"homepage"});
    },
    home(){
      this.$router.push({name:"homepage"});
    },
    login(){
      this.$router.push({name:"loginpage"});
    },
    viewCount(){
      let data = {
        userdata : this.$store.state.userdata.id,
        post_id : this.$route.params.postid
      }
      axios.post("http://127.0.0.1:8000/api/viewcount",data).then((data)=>{
        this.viewcount = data.data.viewcount.length;
      })

    }

  },
  mounted () {
    this.postDetail();
    this.viewCount();
  },
}