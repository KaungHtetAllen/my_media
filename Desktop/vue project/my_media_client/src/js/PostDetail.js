import axios from 'axios';

export default {
    name:'PostDetail',
    data () {
        return {
            postId: 0,
            posts:{}
        }
    },
    methods: {
        loadPost (id) {
            let post = {
                postId:id
            };
            axios.post('http://localhost:8000/api/post/details',post).then((response)=>{
                // console.log(response.data.post);
                    // console.log(response.data.post);
                    if(response.data.post.image != null){
                        response.data.post.image = 'http://127.0.0.1:8000/postImage/' + response.data.post.image;
                    }
                    else{
                        response.data.post.image = 'http://127.0.0.1:8000/default_image.jpg';
                    }
                this.posts = response.data.post;
            });
        },
        back(){
            history.back();
        }
    },
    mounted () {
        // console.log(this.$route.params);
        this.postId = this.$route.params.postId;
        this.loadPost(this.postId);
    },

}