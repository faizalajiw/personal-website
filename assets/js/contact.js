/*==================== CONTACT FORM ====================*/
const form = document.querySelector("form"),
statusTxt = form.querySelector(".button--area span");

form.onsubmit = (e)=>{
    e.preventDefault(); //preventing form from submiting
    statusTxt.style.color = "#5C85D6";
    statusTxt.style.display = "block";

    let xhr = new XMLHttpRequest(); //Creating new xml object
    xhr.open("POST", "message.php", true); //Sending post request to message.php file
    xhr.onload = ()=>{ //Once ajax loaded
        if(xhr.readyState == 4 && xhr.status == 200){ //if ajax response status is 200 & ready status is 4 means there is no any error
            let response =  xhr.response; //storing ajax response in a response variable
            //jika misal email yg dimasukkan ngawur, maka akan muncul kalimat di bawah ini dengan tulisan merah 
            if(response.indexOf("Name and Email field is required!") != -1 || response.indexOf("Please enter a valid email!") || response.indexOf("Sorry, failed to send your message :(")){
                statusTxt.style.color = "red";
            }else{
                form.reset();
                setTimeout(()=>{
                    statusTxt.style.display = "none";
                }, 3000); //sembunyikan statusTxt setelah 3 detik
            }
            statusTxt.innerText = response;
        }
    }
    let formData = new FormData(form); //creating new FromData object. this objct is used to send form data
    xhr.send(formData); //sending data
}