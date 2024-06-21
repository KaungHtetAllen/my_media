import axios from 'axios';
import { mapGetters } from 'vuex/dist/vuex.cjs.js';

export default {
    name:'PostDetail',
    data () {
        return {
            postId: 0,
            posts:{},
            viewCount:0,
        }
    },
    computed:{
        ...mapGetters(['getToken','getUserData'])
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
        },
        home(){
            this.$router.push({
                name:'home'
            })
        },
        loginPage(){
            this.$router.push({
                name:'loginPage'
            })
        },
        viewCountLoading(){
            let data = {
                userId:this.getUserData.id,
                postId:this.$route.params.postId
            };
            axios.post('http://localhost:8000/api/post/actionLog',data).then((response)=>{
                this.viewCount = response.data.posts.length;
            })
            .catch(error=>console.log(error));
        },
    },
    mounted () {
        // console.log(this.$route.params);
        // console.log(this.getUserData.id);
        this.viewCountLoading();
        this.postId = this.$route.params.postId;
        this.loadPost(this.postId);
    },

}