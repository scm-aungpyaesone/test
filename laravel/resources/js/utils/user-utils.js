/**
 * This is utils functions for user.
 */
const utilsFunc = {
    /**
     * This is to get current login user.
     * @returns object userInfo
     */
    async getCurrentLoginUser() {
        return await axios
            .get("/auth/user").then(response => {
                return response.data;
            })
            .catch(err => {
                console.log(err);
                return response.data;
            });
    }
}

export default utilsFunc;