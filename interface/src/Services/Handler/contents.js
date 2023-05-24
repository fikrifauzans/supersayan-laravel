export default{
    getContent(code = '' , group = 'Menu' , first = false){
        let contents = this.getLS('contents')
        contents = contents.filter((val) => {
           return val.group == group || val.code == code
        })
        if(first) return contents[0];
        else return contents
    }   
}