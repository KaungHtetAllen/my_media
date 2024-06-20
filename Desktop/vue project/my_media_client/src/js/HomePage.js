import axios from "axios";
import { mapGetters } from "vuex/dist/vuex.cjs.js";

export default {
    name:'HomePage',
    data () {
        return {
            postLists:{},
            categoryLists:{},
            searchKey:'',
            tokenStatus : false,
        }
    },
    computed:{
        ...mapGetters(['getToken','getUserData'])
    },
    methods: {
        getALlPosts () {
            axios
            .get('http://localhost:8000/api/allPost')
            .then((response)=>{
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
            .catch((error)=>{
                console.log(error);
            });
        },
        getAllCategories(){
            axios
            .get('http://localhost:8000/api/allCategory')
            .then((response)=>{
                this.categoryLists = response.data.categories;
            })
            .catch((error)=>{
                console.log(error);
            });
        },
        search(){
            // console.log(this.searchKey);
            let search = {
                key:this.searchKey
            };
            axios.post('http://localhost:8000/api/post/search',search).then((response)=>{
                // console.log(response);
                for(let i = 0; i < response.data.searchData.length; i++){
                    // console.log(response.data.searchData);
                    if(response.data.searchData[i].image != null){
                        response.data.searchData[i].image = 'http://127.0.0.1:8000/postImage/' + response.data.searchData[i].image;
                    }
                    else{
                        response.data.searchData[i].image = 'http://127.0.0.1:8000/default_image.jpg';
                    }
                }
                this.postLists = response.data.searchData;
            })
        },
        categorySearch(searchKey){
            let search = {
                key:searchKey,
            };
            axios.post('http://localhost:8000/api/category/search',search).then((response)=>{
                for(let i = 0; i < response.data.result.length; i++){
                    // console.log(response.data.result);
                    if(response.data.result[i].image != null){
                        response.data.result[i].image = 'http://127.0.0.1:8000/postImage/' + response.data.result[i].image;
                    }
                    else{
                        response.data.result[i].image = 'http://127.0.0.1:8000/default_image.jpg';
                    }
                }
                this.postLists = response.data.result;
            }).catch(error=>console.log(error));
        },
        postDetail(id){
            // console.log(id);
            this.$router.push({
                name:'postDetail', //name from index.ts 
                params:{
                    postId : id,
                }
            });
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
        checkToken(){
            if(this.getToken !== null && this.getToken !== undefined && this.getToken !== ''){
                this.tokenStatus = true;
                this.getALlPosts();
            }
            else{
                this.tokenStatus = false;
            }
        },
        accountLogout(){
            this.$store.dispatch('setToken',null);
            this.loginPage();
        }
    },
    mounted () {
        this.checkToken();
        this.getALlPosts();
        this.getAllCategories();
    }
}