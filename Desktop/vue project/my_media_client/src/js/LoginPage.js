import axios from "axios"

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
                                        console.log('Login Success');
                                }
                            })
                        .catch(error=>console.log(error));
                }
        }
}