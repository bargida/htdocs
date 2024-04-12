function test(){

var user=document.getElementById("username").value;
var pwd=document.getElementById("password").value;

let user_records=new Array();

user_records=JSON.parse(localStorage.getItem("users"))?JSON.parse(localStorage.getItem("users")):[]
user_records.push({
    "username": user,
    "password" : pwd

})
localStorage.setItem("users", JSON.stringify(user_records));
}