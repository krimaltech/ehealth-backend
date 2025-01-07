//user register
var input = document.querySelector("#phone1"),
    errorMsg = document.querySelector("#error-msg1"),
    validMsg = document.querySelector("#valid-msg1");

// here, the index maps to the error code returned from getValidationError - see readme
var errorMap = [
    "Invalid number",
    "Invalid country code",
    "Too short",
    "Too long",
    "Invalid number",
];

// initialise plugin
var iti = window.intlTelInput(input, {
    utilsScript: "/global_assets/countrycode/js/utils.js?1638200991544",
    autoPlaceholder: "aggresive",
});

var reset = function () {
    input.classList.remove("error");
    errorMsg.innerHTML = "";
    errorMsg.classList.add("hide");
    validMsg.classList.add("hide");
};

// on blur: validate
input.addEventListener("blur", function () {
    reset();
    var full_number = iti.getNumber();
    $("input[id='phone1'").val(full_number);
    if (input.value.trim()) {
        if (iti.isValidNumber()) {
            validMsg.classList.remove("hide");
        } else {
            input.classList.add("error");
            var errorCode = iti.getValidationError();
            errorMsg.innerHTML = errorMap[errorCode];
            errorMsg.classList.remove("hide");
        }
    }
});

// on keyup / change flag: reset
input.addEventListener("change", reset);
input.addEventListener("keyup", reset);

//doctor register
var input2 = document.querySelector("#phone2"),
    errorMsg2 = document.querySelector("#error-msg2"),
    validMsg2 = document.querySelector("#valid-msg2");

var iti2 = window.intlTelInput(input2, {
    utilsScript: "/global_assets/countrycode/js/utils.js?1638200991544",
    autoPlaceholder: "aggresive",
});

var reset = function () {
    input2.classList.remove("error");
    errorMsg2.innerHTML = "";
    errorMsg2.classList.add("hide");
    validMsg2.classList.add("hide");
};

// on blur: validate
input2.addEventListener("blur", function () {
    reset();
    var full_number = iti2.getNumber();
    $("input[id='phone2'").val(full_number);
    if (input2.value.trim()) {
        if (iti2.isValidNumber()) {
            validMsg2.classList.remove("hide");
        } else {
            input2.classList.add("error");
            var errorCode = iti2.getValidationError();
            errorMsg2.innerHTML = errorMap[errorCode];
            errorMsg2.classList.remove("hide");
        }
    }
});

// on keyup / change flag: reset
input2.addEventListener("change", reset);
input2.addEventListener("keyup", reset);

//vendor register
var input3 = document.querySelector("#phone3"),
    errorMsg3 = document.querySelector("#error-msg3"),
    validMsg3 = document.querySelector("#valid-msg3");

var iti3 = window.intlTelInput(input3, {
    utilsScript: "/global_assets/countrycode/js/utils.js?1638200991544",
    autoPlaceholder: "aggresive",
});

var reset = function () {
    input3.classList.remove("error");
    errorMsg3.innerHTML = "";
    errorMsg3.classList.add("hide");
    validMsg3.classList.add("hide");
};

// on blur: validate
input3.addEventListener("blur", function () {
    reset();
    var full_number = iti3.getNumber();
    $("input[id='phone3'").val(full_number);
    if (input3.value.trim()) {
        if (iti3.isValidNumber()) {
            validMsg3.classList.remove("hide");
        } else {
            input3.classList.add("error");
            var errorCode = iti3.getValidationError();
            errorMsg3.innerHTML = errorMap[errorCode];
            errorMsg3.classList.remove("hide");
        }
    }
});

// on keyup / change flag: reset
input3.addEventListener("change", reset);
input3.addEventListener("keyup", reset);

//nurse register
var input4 = document.querySelector("#phone4"),
    errorMsg4 = document.querySelector("#error-msg4"),
    validMsg4 = document.querySelector("#valid-msg4");

var iti4 = window.intlTelInput(input4, {
    utilsScript: "/global_assets/countrycode/js/utils.js?1638200991544",
    autoPlaceholder: "aggresive",
});

var reset = function () {
    input4.classList.remove("error");
    errorMsg4.innerHTML = "";
    errorMsg4.classList.add("hide");
    validMsg4.classList.add("hide");
};

// on blur: validate
input4.addEventListener("blur", function () {
    reset();
    var full_number = iti4.getNumber();
    $("input[id='phone4'").val(full_number);
    if (input4.value.trim()) {
        if (iti4.isValidNumber()) {
            validMsg4.classList.remove("hide");
        } else {
            input4.classList.add("error");
            var errorCode = iti4.getValidationError();
            errorMsg4.innerHTML = errorMap[errorCode];
            errorMsg4.classList.remove("hide");
        }
    }
});

// on keyup / change flag: reset
input4.addEventListener("change", reset);
input4.addEventListener("keyup", reset);

//driver register
var input6 = document.querySelector("#phone6"),
    errorMsg6 = document.querySelector("#error-msg6"),
    validMsg6 = document.querySelector("#valid-msg6");

var iti6 = window.intlTelInput(input6, {
    utilsScript: "/global_assets/countrycode/js/utils.js?1638200991544",
    autoPlaceholder: "aggresive",
});

var reset = function () {
    input6.classList.remove("error");
    errorMsg6.innerHTML = "";
    errorMsg6.classList.add("hide");
    validMsg6.classList.add("hide");
};

// on blur: validate
input6.addEventListener("blur", function () {
    reset();
    var full_number = iti6.getNumber();
    $("input[id='phone6'").val(full_number);
    if (input6.value.trim()) {
        if (iti6.isValidNumber()) {
            validMsg6.classList.remove("hide");
        } else {
            input6.classList.add("error");
            var errorCode = iti6.getValidationError();
            errorMsg6.innerHTML = errorMap[errorCode];
            errorMsg6.classList.remove("hide");
        }
    }
});

// on keyup / change flag: reset
input6.addEventListener("change", reset);
input6.addEventListener("keyup", reset);
