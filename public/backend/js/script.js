//User password update
$(document).ready(function(){
    $("#current_pwd").keyup(function(){
        var current_pwd = $("#current_pwd").val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type:'post',
            url:'/current-pwd',
            data:{current_pwd:current_pwd},
            success:function(resp){
                if(resp=="false"){
                    $("#check_pwd").html("<font color=red>Password is incorrect</font>");
                }else if(resp=="true"){
                    $("#check_pwd").html("<font color=green>Password is correct</font>");
                }
            },error:function(){
                alert("Current password is wrong");
            }
        });
    });

    $("#confirm_pwd").keyup(function(){
        var new_pwd = $("#new_pwd").val();
        var confirm_pwd = $("#confirm_pwd").val();

        if(new_pwd != confirm_pwd){
            $("#show_error").html("<font color=red>Password is not match</font>");
        }else{
            $("#show_error").html("<font color=green>Password is match</font>");
        }
    });

});

//New employee Salary Calculation
function salary() {
    var gross = document.getElementById('gross').value;
    var basic = parseInt(gross) * 0.5;
    var house_rent = parseInt(gross) * 0.3;
    var mobile = parseInt(gross) * 0.1;
    var conveyance = parseInt(gross) * 0.05;
    var other = parseInt(gross) * 0.05;
    if (!isNaN(gross)) {
        document.getElementById('basic').value = basic;
        document.getElementById('house_rent').value = house_rent;
        document.getElementById('mobile').value = mobile;
        document.getElementById('conveyance').value = conveyance;
        document.getElementById('other').value = other;
    }
}


function sum() {
    var text1 = document.getElementById('txt1').value;
    var text2 = document.getElementById('txt2').value;
    var result = parseFloat(text1) + parseFloat(text2);
    if (!isNaN(result)) {
        document.getElementById('txt3').value = result;
    }
}

function project_value() {
    var value1 = document.getElementById('project_inception_val').value;
    var value2 = document.getElementById('tec_amount').value;
    var value3 = document.getElementById('variation_1').value;
    var value4 = document.getElementById('variation_2').value;
    var result = parseFloat(value1) + parseFloat(value2) + parseFloat(value3) + parseFloat(value4);
    if (!isNaN(result)) {
        document.getElementById('total_project_value').value = result;
    }
}
