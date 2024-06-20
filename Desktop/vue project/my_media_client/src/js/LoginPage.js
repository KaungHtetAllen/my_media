import axios from "axios"
import { mapGetters } from "vuex"

export default{
        name:'loginPage',
        data () {
                return {
                        userData: {
                                email:'',
                                password:'',
                        },
                        tokenStatus:false,
                        userStatus : false,
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
                                        this.userStatus = true;
                                        this.userData = {};
                                }
                                else{
                                        this.userStatus = false;
                                        this.$store.dispatch('setToken',response.data.token);       //go to store 
                                        this.$store.dispatch('setUserData',response.data.user);       //go to store 
                                        console.log('login success');
                                        this.home();
                                }
                            })
                        .catch(error=>console.log(error));
                }
        }
}