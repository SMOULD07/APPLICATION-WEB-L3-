const searchWrapper=document.querySelector('.search-input');
const inputBox=searchWrapper.querySelector("input");
const suggbox= searchWrapper.querySelector('.autocomplete');
let suggestion=[];
suggestion=document.querySelectorAll('.autocomplete li');
inputBox.addEventListener("keyup",e=> {
    let userData=e.target.value;
    let starts=[];
if(userData){
  for(let i=0;i<suggestion.length;i++){
       if(suggestion[i].textContent.toLocaleLowerCase().startsWith(userData.toLocaleLowerCase())){
        starts[i]=suggestion[i].textContent;
        starts[i]='<li>'+starts[i]+'</li>';
    }}
    searchWrapper.classList.add("active")
    console.log(starts);
}
else{
    searchWrapper.classList.remove("active")
}
showSuggestions(starts);
let allList=suggbox.querySelectorAll(".search-input li");
for(let i=0; i<allList.length;i++){
    allList[i].setAttribute("onclick","select(this)");
}
});

function select(element){
    let SelectUserData=element.textContent;
    inputBox.value=SelectUserData;
    input="'"+inputBox.value+"'";
    var i=1;
        var x = document.createElement("li");
        document.getElementById('checklist').appendChild(x);
        var y=document.createElement('input');
        y.setAttribute("name","ch[]");
        y.setAttribute("readonly",true);
        y.setAttribute("value",String(input));
        document.querySelector('#checklist li').appendChild(y);
        var z=document.createElement("button");

        document.querySelector('#checklist input').appendChild(z);
        
        let v=document.querySelectorAll('#checklist input button');
         for(let i=0;i<v.length;i++){
            if(v[i].innerHTML.length>0) continue;
            else{
            v[i].appendChild(document.createElement('img')).src='images/close.png';}
         }

        var li=document.querySelectorAll('#checklist li input');
        for(var i=0;i<li.length;i++){
            if(li[i].innerHTML.length>0) continue;
            else{
         li[i].innerHTML=inputBox.value;}
}}
function showSuggestions(list){
    let listData;
    if(!list.length){

    }else{
        listData=list.join(' ');
    }
    suggbox.innerHTML=listData;
}