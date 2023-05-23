export default{
    getContent(code = '' , group = 'Menu'){
        let contents = this.getLS('contents')
        contents = contents.filter((val) => {
           return val.group == group || val.code == code
        })
        return contents
    }   
}