$(document).ready(function() {
    // Ajax Call for Already Exists Email Verification
    $("#stuemail").on("keypress blur", function() {
        var reg = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
        var stuemail = $("#stuemail").val();
        $.ajax({
            url: "Student/addstudent.php",
            type: "post",
            data: {
                checkemail: "checkmail",
                stuemail: stuemail
            },
            success: function(data) {
                console.log(data);
                if (data != 0) {
                    $("#statusMsg2").html(
                        '<small style="color:red;"> Email ID Already Registered ! </small>'
                    );
                    $("#signup").attr("disabled", true);
                } else if (data == 0 && reg.test(stuemail)) {
                    $("#statusMsg2").html(
                        '<small style="color:green;"> There you go ! </small>'
                    );
                    $("#signup").attr("disabled", false);
                } else if (!reg.test(stuemail)) {
                    $("#statusMsg2").html(
                        '<small style="color:blue;"> Please Enter Valid Email e.g. example@mail.com </small>'
                    );
                    $("#signup").attr("disabled", true);
                }
                if (stuemail == "") {
                    $("#statusMsg2").html(
                        '<small style="color:red;"> Please Enter Email ! </small>'
                    );
                }
            }
        });
    });
    // Checking name on keypress
    $("#stuname").keypress(function() {
        var stuname = $("#stuname").val();
        if (stuname !== "") {
            $("#statusMsg1").html(" ");
        }
    });
    // Checking Password on keypress
    $("#stupass").keypress(function() {
        var stupass = $("#stupass").val();
        if (stupass !== "") {
            $("#statusMsg3").html(" ");
        }
    });
});

// Ajax Call for Adding New Student
function addStu() {
    var reg = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
    var stuname = $("#stuname").val();
    var stuemail = $("#stuemail").val();
    var stupass = $("#stupass").val();
    // checking fields on form submission
    if (stuname.trim() == "") {
        $("#statusMsg1").html(
            '<small style="color:red;"> Please Enter Name ! </small>'
        );
        $("#stuname").focus();
        return false;
    } else if (stuemail.trim() == "") {
        $("#statusMsg2").html(
            '<small style="color:red;"> Please Enter Email ! </small>'
        );
        $("#stuemail").focus();
        return false;
    } else if (stuemail.trim() != "" && !reg.test(stuemail)) {
        $("#statusMsg2").html(
            '<small style="color:blue;"> Please Enter Valid Email e.g. example@mail.com </small>'
        );
        $("#stuemail").focus();
        return false;
    } else if (stupass.trim() == "") {
        $("#statusMsg3").html(
            '<small style="color:red;"> Please Enter Password ! </small>'
        );
        $("#stupass").focus();
        return false;
    } else {
        $.ajax({
            url: "Student/addstudent.php",
            type: "post",
            data: {
                // assigned stusignup value just to check all iz well
                stusignup: "stusignup",
                stuname: stuname,
                stuemail: stuemail,
                stupass: stupass
            },
            success: function(data) {
                console.log(data);
                if (data == "OK") {
                    $("#successMsg").html(
                        '<span class="alert alert-success"> Registration Successful ! </span>'
                    );
                    // making field empty after signup
                    clearStuRegField();
                    setTimeout(() => {
                        $("#successMsg").html(
                            '<span class="alert alert-success"> Please Login ! </span>'
                        );
                    }, 2000);
                } else if (data == "Failed") {
                    $("#successMsg").html(
                        '<span class="alert alert-danger"> Unable to Register ! </span>'
                    );
                }
            }
        });
    }
}

// Empty All Fields and Status Msg
function clearStuRegField() {
    $("#stuRegForm").trigger("reset");
    $("#statusMsg1").html(" ");
    $("#statusMsg2").html(" ");
    $("#statusMsg3").html(" ");
}

function clearAllStuReg() {
    $("#successMsg").html(" ");
    clearStuRegField();
}

// Ajax Call for Student Login Verification
function checkStuLogin() {
    var stuLogEmail = $("#stuLogEmail").val();
    var stuLogPass = $("#stuLogPass").val();
    //check if Email or Password field is Empty
    if (stuLogEmail.trim() == "") {
        $("#statusLogMsg1").html(
            '<small style="color:red;"> Please Enter Email ! </small>'
        );
        $("#stuLogEmail").focus();
        return false;
    } else if (stuLogPass.trim() == "") {
        $("#statusLogMsg2").html(
            '<small style="color:red;"> Please Enter Password ! </small>'
        );
        $("#stuLogPass").focus();
        return false;
    } else {
        $.ajax({
            url: "Student/addstudent.php",
            type: "post",
            data: {
                checkLogemail: "checklogmail",
                stuLogEmail: stuLogEmail,
                stuLogPass: stuLogPass
            },
            success: function(data) {
                console.log(data);
                if (data == 0) {
                    $("#statusLogMsg").html(
                        '<small class="alert alert-danger"> Invalid Email ID or Password ! </small>'
                    );
                } else if (data == 1) {
                    $("#statusLogMsg").html(
                        '<div class="spinner-border text-success" role="status"></div>'
                    );
                    // Empty Login Fields
                    clearStuLoginField();
                    setTimeout(() => {
                        window.location.href = "index.php";
                    }, 1000);
                }
            }
        });
    }
}
//check if email is valid/ not null
$(document).ready(function() {

    $("#stuLogEmail").on("keypress blur", function() {
        var reg = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
        var stuemail = $("#stuLogEmail").val();
        $.ajax({
            url: "Student/addstudent.php",
            type: "post",
            data: {
                checkemail: "checkmail",
                stuemail: stuemail
            },
            success: function(data) {
                console.log(data);
                clearStuLoginWithStatus1();
                if (data == 1 && reg.test(stuemail)) {
                    $("#statusLogMsg1").html(
                        '<small style="color:green;"> There you go ! </small>'
                    );
                    $("#stuLoginBtn").attr("disabled", false);
                } else if (!reg.test(stuemail)) {
                    $("#statusLogMsg1").html(
                        '<small style="color:blue;"> Please Enter Valid Email e.g. example@mail.com </small>'
                    );
                    $("#stuLoginBtn").attr("disabled", false);
                }
                if (stuemail == "") {
                    $("#statuslogMsg1").html(
                        '<small style="color:red;"> Please Enter Email ! </small>'
                    );
                }
            }
        });
    });

    //check if Account is created or not 

    $("#stuLogEmail").on("blur", function() {
        var reg = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
        var stuemail = $("#stuLogEmail").val();
        $.ajax({
            url: "Student/addstudent.php",
            type: "post",
            data: {
                checkemail: "checkmail",
                stuemail: stuemail
            },
            success: function(data) {
                console.log(data);
                clearStuLoginWithStatus1();
                if (!reg.test(stuemail)) {
                    $("#statusLogMsg1").html(
                        '<small style="color:blue;"> Please Enter Valid Email e.g. example@mail.com </small>'
                    );
                    $("#stuLoginBtn").attr("disabled", true);
                } else if (data == 0 && stuemail != "") {
                    $("#statusLogMsg1").html(
                        '<small style="color:#7e0058;"> Please Sign Up First ! </small>'
                    );
                    $("#stuLoginBtn").attr("disabled", true);
                }
            }
        });
    });

    $("#stuLogEmail").keypress(function() {
        var stuEmail = $("#stuLogEmail").val();
        if (stuEmail !== "") {
            $("#statusLogMsg1").html(" ");
        }
    });
    // Checking Password on keypress
    $("#stuLogPass").keypress(function() {
        var stuPass = $("#stuLogPass").val();
        if (stuPass !== "") {
            clearStuLoginWithStatus1();
            $("#statusLogMsg2").html(" ");
        }
    });
});

// Empty Login Fields
function clearStuLoginField() {
    $("#stuLoginForm").trigger("reset");
}

// Empty Login Fields and Status Msg
function clearStuLoginWithStatus() {
    $("#statusLogMsg").html(" ");
    clearStuLoginField();
    $("#statusLogMsg1").html(" ");
    $("#statusLogMsg2").html(" ");
}

function clearStuLoginWithStatus1() {
    $("#statusLogMsg").html(" ");
}