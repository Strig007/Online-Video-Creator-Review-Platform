function checkChangePasswordForm(val)
{
    var pass = val.newpassword.value;
    document.getElementById("newPassErr").innerHTML = "";
    var flag = true;

    if (pass === "")
    {
        document.getElementById("newPassErr").innerHTML = "Enter new password!";
        flag = false;
    }
    return flag;
}


function changePassForm(pForm)
{
    var isValid = checkChangePasswordForm(pForm);

    if (isValid)
    {
        var xhttp = new XMLHttpRequest();
        xhttp.onload = function(){
            if (this.status === 200)
            {
                document.getElementById("changePasswordMessage").innerHTML = this.responseText;
            }
        }

        xhttp.open("POST", pForm.action, true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("newpassword="+pForm.newpassword.value);
    }
}
