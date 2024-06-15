import axios from "axios";

export default {
    name:'HomePage',
    data () {
        return {
            message: 'HI Bitch'
        }
    },
    mounted () {
        axios.get('http://localhost:8000/api/allPost').then((response)=>{
            console.log(response.data);
        })
    }
}