function updateSpinner(obj)
{
    var contentObj = document.getElementById("content");
    var value = parseInt(contentObj.value);
    
   

    if(obj.id == "down") {
        value--;
    } else {
        value++;
    }   
    contentObj.value = value;

    

}  



