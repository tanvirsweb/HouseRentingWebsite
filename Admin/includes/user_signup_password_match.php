<script>        
    const passwordReInput = document.getElementById('rinputPassword');
    const passwordInput=document.getElementById('inputPassword');
    
    const submitBtn=document.getElementById("submit");    
    if(page=="account") submitBtn.disabled = false;
    else submitBtn.disabled = true;

    // check if password matches
    passwordReInput.addEventListener('input', function(event) {
    // Handle the input event here
        let v1=event.target.value;
        let v2=passwordInput.value;
        document.getElementById('rinputPassword').style.visibility='visible';
        if(v1==v2)
        {                
            document.getElementById('rtxt').innerHTML="";
            submitBtn.disabled = false;
        }
        else{                                
            document.getElementById('rtxt').innerHTML="password did not match !!";
            submitBtn.disabled = true;
        }
                    
    });
</script>