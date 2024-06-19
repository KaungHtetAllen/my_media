import axios from "axios"
import { mapGetters } from "vuex"

export default{
        name:'loginPage',
        data () {
                return {
                        userData: {
                                email:'',
                                password:'',
                        }
                }
        },
        computed:{             //call from store and show
                ...mapGetters(['getToken','getUserData'])
        },
        methods: {
                home () {
                        this.$router.push({
                                name:"home"
                        })
                },
                loginPage(){
                        this.$router.push({
                                name:'loginPage'
                        })
                },
                accountLogin(){
                        // console.log(this.userData);
                        axios
                        .post('http://localhost:8000/api/user/login',this.userData)
                        .then((response)=>{
                                if(response.data.token == null){
                                        console.log('There is no account');
                                }
                                else{
                                        this.$store.dispatch('setToken',response.data.token);       //go to store 
                                        this.$store.dispatch('setUserData',response.data.user);       //go to store 
                                }
                            })
                        .catch(error=>console.log(error));
                }
        }
}