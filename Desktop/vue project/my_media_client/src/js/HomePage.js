import axios from "axios";

export default {
    name:'HomePage',
    data () {
        return {
            postLists:{},
        }
    },
    methods: {
        getALlPosts () {
            axios.get('http://localhost:8000/api/allPost').then((response)=>{
                for(let i = 0; i < response.data.posts.length; i++){
                    // console.log(response.data.posts);
                    if(response.data.posts[i].image != null){
                        response.data.posts[i].image = 'http://127.0.0.1:8000/postImage/' + response.data.posts[i].image;
                    }
                    else{
                        response.data.posts[i].image = 'http://127.0.0.1:8000/default_image.jpg';
                    }
                }
                this.postLists = response.data.posts;
            
            })
        }
    },
    mounted () {
        this.getALlPosts();
    }
}