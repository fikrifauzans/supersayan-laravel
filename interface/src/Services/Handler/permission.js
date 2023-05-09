export default {
    getPermission() {
        return (this.getLS('permissions'));
    }
    ,
    checkPermission(key) {
        const permissions = this.getPermission() ? this.getPermission() : [] 
        const permission = permissions.filter((val) => {
            return val == key
        })
        if (permission.length > 0) return true
        else return false

    }


}