/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//determine inputed field is id
var username = false;

//determine inputed field is email
var email = false;

//determine inputed field is password and not empty
var password = false;


/**
 * Email or username validator function
 * Color the border with 'red' color if the input is empty or invalid email
 * as well as indicate either 'id' or 'email' is ok, 
 * such that login submssion can be forwarded to server
 */
var EmailValidator = function () {

    var redField = false;
    var field = document.getElementsByName('username')[0];

    if (field.value !== '') {

        //if the field is email
        if (field.value.indexOf('@') !== -1) {

            //as the field contain '@', it is not id
            username = false;

            var filter = /^(\w([.]\w)*)+@[a-zA-Z_]+?([.][a-zA-Z]{2,3}){1,3}$/;

            //filed contains valid email
            if (filter.test(field.value)) {

                email = true;
                redField = false;

            } else {

                //field contains '@' but not a valid email
                redField = true;
                email = false;
            }
        } else {

            //if the field is id
            username = true;
            email = false;
            redField = false;
        }
    } else {

        //if field is empty
        redField = true;
        username = false;
        email = false;
    }

    if (redField) {

        field.style.borderColor = "red";
    } else {

        field.style.borderColor = "#a2cf6f";
    }
};


/**
 * Password validator function
 * Color the border with 'red' color if the input is empty
 * as well as indicate 'password' is ok, 
 * such that login submssion can be forwarded to server
 */

var passwordValidator = function () {

    var field = document.getElementsByName("password")[0];

    if (field.value !== '') {

        password = true;
        field.style.borderColor = "#a2cf6f";
    } else {

        password = false;
        field.style.borderColor = "red";
    }
};


var loginRequest = function () {

    if ((username || email) && password) {

        return true;

    }

    if (!username && !email) {

        EmailValidator();
    }
    if (!password) {

        passwordValidator();
    }

    return false;
};




