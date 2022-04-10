var i = document.getElementById('output');
var op = document.getElementById('operator');

function inputAngka(y){
   
    if(i.value=="0"){
        i.value =y;
        addOperator(y);
    }else{
        i.value += y;
        addOperator(y);
    }

    
}
function c(){
    i.value="";
    r();
}
function hs(){
    i.value = i.value.substr(0,i.value.length - 1);
}
function h(){
    i.value = eval(i.value);
}
function r(){
    if(i.value == ""){
        i.value = "0";
    }
}

function opDouble(op){
    if(op += 1 ){
        op.splice(0,1);
    }
}

