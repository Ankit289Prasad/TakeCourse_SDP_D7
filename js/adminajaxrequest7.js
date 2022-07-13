// Ajax Call for admin Login Verification
function checkAdminLogin() {
    var adminLogEmail = $("#adminLogEmail").val();
    var adminLogPass = $("#adminLogPass").val();
    if (adminLogEmail.trim() == "") {
        $("#statusAdminLogMsg1").html(
            '<small style="color:red;"> Please Enter Email ! </small>'
        );
        $("#adminLogEmail").focus();
        return false;
    } else if (adminLogPass.trim() == "") {
        $("#statusAdminLogMsg2").html(
            '<small style="color:red;"> Please Enter Password ! </small>'
        );
        $("#adminLogPass").focus();
        return false;
    } else $.ajax({
        url: "admin/admin.php",
        type: "post",
        data: {
            checkLogemail: "checklogmail",
            adminLogEmail: adminLogEmail,
            adminLogPass: adminLogPass
        },
        success: function(data) {
            console.log(data);
            if (data == 0) {
                $("#statusAdminLogMsg").html(
                    '<small class="alert alert-danger"> Invalid Email ID or Password ! </small>'
                );
            } else if (data == 1) {
                $("#statusAdminLogMsg").html(
                    '<small class="alert alert-success"> Success! Loading..... </small>'
                );
                // Empty Login Fields
                clearAdminLoginField();
                setTimeout(() => {
                    window.location.href = "./admin/adminDashboard.php";
                }, 1000);
            }
        }
    });
}

//check if email is valid/ not null
$(document).ready(function() {

    $("#adminLogEmail").on("keypress blur", function() {
        var reg = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
        var adminemail = $("#adminLogEmail").val();
        $.ajax({
            url: "admin/admin.php",
            type: "post",
            data: {
                checkemail: "checkmail",
                adminemail: adminemail,
            },
            success: function(data) {
                console.log(data);
                clearAdminLoginWithStatus1();
                if (data == 1 && reg.test(adminemail)) {
                    $("#statusAdminLogMsg1").html(
                        '<small style="color:green;"> There you go ! </small>'
                    );
                    $("#adminLoginBtn").attr("disabled", false);
                } else if (!reg.test(adminemail)) {
                    $("#statusAdminLogMsg1").html(
                        '<small style="color:blue;"> Please Enter Valid Email e.g. example@mail.com </small>'
                    );
                    $("#adminLoginBtn").attr("disabled", false);
                }
                if (adminemail == "") {
                    $("#statusAdminlogMsg1").html(
                        '<small style="color:red;"> Please Enter Email ! </small>'
                    );
                }
            }
        });
    });

    //check if Account is created or not 

    $("#adminLogEmail").on("blur", function() {
        var reg = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
        var adminemail = $("#adminLogEmail").val();
        $.ajax({
            url: "admin/admin.php",
            type: "post",
            data: {
                checkemail: "checkmail",
                adminemail: adminemail
            },
            success: function(data) {
                console.log(data);
                clearAdminLoginWithStatus1();
                if (!reg.test(adminemail)) {
                    $("#statusAdminLogMsg1").html(
                        '<small style="color:blue;"> Please Enter Valid Email e.g. example@mail.com </small>'
                    );
                    $("#adminLoginBtn").attr("disabled", false);
                } else if (data == 0 && adminemail != "") {
                    $("#statusAdminLogMsg1").html(
                        '<small style="color:violet;"> Sorry you are not an ADMIN ! </small>'
                    );
                    $("#adminLoginBtn").attr("disabled", true);
                }
            }
        });
    });

    $("#adminLogEmail").keypress(function() {
        var stuEmail = $("#adminLogEmail").val();
        if (stuEmail !== "") {
            $("#statusAdminLogMsg1").html(" ");
        }
    });
    // Checking Password on keypress
    $("#adminLogPass").keypress(function() {
        var stuPass = $("#adminLogPass").val();
        if (stuPass !== "") {
            clearAdminLoginWithStatus1();
            $("#statusAdminLogMsg2").html(" ");
        }
    });
});

// Empty Login Fields
function clearAdminLoginField() {
    $("#adminLoginForm").trigger("reset");
}

// Empty Login Fields and Status Msg
function clearAdminLoginWithStatus() {
    $("#statusAdminLogMsg").html(" ");
    clearAdminLoginField();
    $("#statusAdminLogMsg1").html(" ");
    $("#statusAdminLogMsg2").html(" ");
}

function clearAdminLoginWithStatus1() {
    $("#statusAdminLogMsg").html(" ");
}