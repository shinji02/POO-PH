
function cal_age(){
    var today = new Date();
    
    var birth = document.getElementById("birth").value;
    var Bday = +new Date(birth);
    var age=((Date.now() - Bday) / (31557600000));
    
    var new_age =Math.round(age * 1);
    document.getElementById("age").value = new_age;
}


