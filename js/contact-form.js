let btn = document.getElementById("submitbtn")
 
   btn.addEventListener("click", function login(e) {
    e.preventDefault()
  

    console.log('test');
    
    var params = {
      name: document.getElementById("con_lname").value,
      email: document.getElementById("con_email").value,
      message: document.getElementById("con_message").value,
      phone: document.getElementById("con_phone").value,
    };
  
    console.log('params',params);
    
    const serviceID = "service_zp9vqhq";
    const templateID = "template_zcl6njq";
  
      emailjs.send(serviceID, templateID, params)
      .then(res=>{
          document.getElementById("con_lname").value = "";
          document.getElementById("con_email").value = "";
          document.getElementById("con_message").value = "";
          document.getElementById("con_phone").value = "";
          
          
          console.log('ress',res);
          alert("Your message sent successfully!!")
  
      })
      .catch(err=>console.log(err));
  
} )
