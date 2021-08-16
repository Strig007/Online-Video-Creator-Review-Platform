function checkRegistrationForm(val)
{
    var fname = val.fname.value;
    var lname = val.lname.value;
    var gender = val.gender.value;
    var dob = val.dob.value;
    var religion = val.religion.value;
    var email = val.email.value;
    var uname = val.uname.value;
    var password = val.password.value;

    var flag = true;

    document.getElementById("firstnameErr").innerHTML = "";
    document.getElementById("lastnameErr").innerHTML = "";
    document.getElementById("genderErr").innerHTML = "";
    document.getElementById("dobErr").innerHTML = "";
    document.getElementById("religionErr").innerHTML = "";
    document.getElementById("emailErr").innerHTML = "";
    document.getElementById("unameErr").innerHTML = "";
    document.getElementById("passwordErr").innerHTML = "";

    if (fname === "")
    {
        document.getElementById("firstnameErr").innerHTML = "First name cannot be empty!";
        flag = false;
    }
    if (lname === "")
    {
        document.getElementById("lastnameErr").innerHTML = "Last name cannot be empty!";
        flag = false;
    }
    if (gender === "")
    {
        document.getElementById("genderErr").innerHTML = "Gender cannot be empty!";
        flag = false;
    }
    if (dob === "")
    {
        document.getElementById("dobErr").innerHTML = "Date of birth cannot be empty!";
        flag = false;
    }
    if (religion === "")
    {
        document.getElementById("religionErr").innerHTML = "Religion cannot be empty!";
        flag = false;
    }
    if (email === "")
    {
        document.getElementById("emailErr").innerHTML = "Email cannot be empty!";
        flag = false;
    }
    if (uname === "")
    {
        document.getElementById("unameErr").innerHTML = "Username cannot be empty!";
        flag = false;
    }
    if (password === "")
    {
        document.getElementById("passwordErr").innerHTML = "Password cannot be empty!";
    }

    return flag;

}


function submitRegistrationForm(pForm)
{
    var isValid = checkRegistrationForm(pForm);

    if (isValid)
    {
        var xhttp = new XMLHttpRequest();
        xhttp.onload = function(){
            if (this.status === 200)
            {
                document.getElementById("registrationMessage").innerHTML = this.responseText;
            }
        }

        xhttp.open("POST", pForm.action, true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("fname="+pForm.fname.value+"&lname="+pForm.lname.value
        +"&gender="+pForm.gender.value+"&dob="+pForm.dob.value+"&religion="+pForm.religion.value
        +"&email="+pForm.email.value+"&uname="+pForm.uname.value+"&password="+pForm.password.value
        +"&phone="+pForm.phone.value);
    }

}