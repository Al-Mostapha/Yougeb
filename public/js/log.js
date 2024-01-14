

$(document).ready(function (){
    
    /*validate max length*/
    $(document).on("input keydown keyup mousedown mouseup select contextmenu drop", "#form-container .input", function (){
    
    
        var val = this.value;
        var maxLength = $(this).attr("data-max-length");
        

        if (val.length <= maxLength) {

            this.oldValue = this.value;
            this.oldSelectionStart = this.selectionStart;
            this.oldSelectionEnd = this.selectionEnd;

        }else if (this.hasOwnProperty("oldValue")) {

            this.value = this.oldValue;
            this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);

        }
        
        $(this).next(".max-num").children("label").html($(this).val().length);
    
    });

    /*validate Email*/
    $(document).on("input keydown keyup mousedown mouseup select contextmenu drop", "#user-email", function (){
    
    
        var val = this.value;
        

        if (validateEmail(val)) {

            this.oldValue = this.value;
            this.oldSelectionStart = this.selectionStart;
            this.oldSelectionEnd = this.selectionEnd;

        }else if (this.hasOwnProperty("oldValue")) {

            this.value = this.oldValue;
            this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);

        }
        
        $(this).next(".max-num").children("label").html($(this).val().length);
    
    });

    $("#form-container .input").each(function (){
        $(this).next(".max-num").children("label").html($(this).val().length);
    });
});

/*sign up new account*/
$(document).on("click" , "#sign-up-btn" , function (){
    
    var userName        = $("#user-name").val();
    var userPass        = $("#user-password").val();
    var userMail        = $("#user-email").val();
    var userPassConfirm = $("#password-confirm").val();
    
    $(this).attr("disabled","disabled");
    $("#sign-up-btn .spinner-border").show();
    let _this = $(this);
    $.ajax({
        url: "/api/User/Create",
        type: 'POST',
        data:{
            userName:userName,
            userPass:userPass,
            userPass_confirmation: userPassConfirm,
            userMail:userMail
        },
        beforeSend: function (xhr) {
            
        },
        success: function (data, textStatus, jqXHR) {
            if(data.state === "ok"){
                window.location.href = "/login";
            }
        },
        error: function (jqXHR) {
            let JsonError = jqXHR.responseJSON;
            let ErrorList = Object.keys(JsonError?.errors);
            for(let oneError in ErrorList){
                let Error = ErrorList[oneError];
                let ErrorMsg = JsonError.errors[Error][0];
                $(`#${Error}-wrapper`).addClass("has-error");
                $(`#${Error}-error-msg`).html(ErrorMsg);
                alertBox.tipTop(ErrorMsg);
            }
            _this.removeAttr("disabled");
            $("#sign-up-btn .spinner-border").hide();
        }
    });
});


$(document).on("click" , "#log-in-btn", function (){
    var userMail        = $("#user-mail").val();
    var userPass        = $("#user-password").val();
    var _this = $(this);
    _this.attr("disabled" , "disabled");
    
    $.ajax({
        url:"/api/User/Login",
        type: 'POST',
        data:{
            userMail: userMail,
            userPass: userPass
        },
        beforeSend: function (xhr) {
            
        },
        success: function (data, textStatus, jqXHR) {
            $("#log-in-btn").removeAttr("disabled");
            if(isJson(data)){
                var jsonData = JSON.parse(data);
            }else{
                alert(data);
            }
            
            if(jsonData.state === "error_email"){
                
                alertBox.tipTop("خطاء فى البريد الالكترونى");
                
            }else if(jsonData.state === "error_pass"){
                
                alertBox.tipTop("خطاء كلمة المرور");
                
            }
            if(jsonData.state === "ok"){
                
                window.location.href   = BASE_URL;
                window.location.replace(BASE_URL);
                
            }
            
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log(jqXHR);
            $("#log-in-btn").removeAttr("disabled");
        }
    });
});