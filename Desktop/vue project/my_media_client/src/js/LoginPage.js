export default{
        name:'loginPage',
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
                }
        }
}