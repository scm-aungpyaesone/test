import utilsFunc from "../../utils/user-utils";
export default {
    data() {
        return {
            userName: "",
        }
    },
    async mounted() {
        const userInfo = await utilsFunc.getCurrentLoginUser();
        this.userName = userInfo.name;
    }
};