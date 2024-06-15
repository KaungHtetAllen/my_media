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
                this.postLists = response.data.posts;
                console.log(this.postLists);
            
            })
        }
    },
    mounted () {
        this.getALlPosts();
    }
}