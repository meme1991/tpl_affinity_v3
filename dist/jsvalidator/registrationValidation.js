/**
 * @Author: SPEDI srl
 * @Date:   25-02-2018
 * @Email:  sviluppo@spedi.it
 * @Last modified by:   SPEDI srl
 * @Last modified time: 26-02-2018
 * @License: GNU/GPL license: http://www.gnu.org/copyleft/gpl.html
 * @Copyright: Copyright (c) SPEDI srl
 */

 function validUsername(){
   //var num   = new RegExp('[a-zA-Z-_]+[0-9]+', 'i');
   var exp = new RegExp("((?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[_-]).{6,20})");
   //var upper = new RegExp('[A-Z]');
   var username = $('#jform_username').val();
   if(exp.test(username)){
     $('#jform_username').removeClass('is-invalid');
     $('#jform_username').addClass('is-valid');
     //return true;
   }
   else{
     $('#jform_username').removeClass('is-valid');
     $('#jform_username').addClass('is-invalid');
     //return false;
   }
 }

 function validPassword(){
   //var num   = new RegExp('[a-zA-Z-_]+[0-9]+', 'i');
   var exp = new RegExp("((?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[_-]).{6,20})");
   //var upper = new RegExp('[A-Z]');
   var password1 = $('#jform_password1').val();
   if(exp.test(password1)){
     $('#jform_password1').removeClass('is-invalid');
     $('#jform_password1').addClass('is-valid');
     //return true;
   }
   else{
     $('#jform_password1').removeClass('is-valid');
     $('#jform_password1').addClass('is-invalid');
     //return false;
   }
 }

 function validPasswordConfirm(){
   //var num   = new RegExp('[a-zA-Z-_]+[0-9]+', 'i');
   //var exp = new RegExp("((?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[_-]).{6,20})");
   //var upper = new RegExp('[A-Z]');
   var password1 = $('#jform_password1').val();
   var password2 = $('#jform_password2').val();
   if(password1 == password2){
     $('#jform_password2').removeClass('is-invalid');
     $('#jform_password2').addClass('is-valid');
     //return true;
   }
   else{
     $('#jform_password2').removeClass('is-valid');
     $('#jform_password2').addClass('is-invalid');
     //return false;
   }
 }

 function validEmail(){
   var email = $('#jform_email1').val();

  $.post( "jtest/templates/affinity/html/com_users/registration/emailVerify.php", { email: email}, function( data ) {
    alert(data);
  });
   // //var num   = new RegExp('[a-zA-Z-_]+[0-9]+', 'i');
   // //var exp = new RegExp("((?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[_-]).{6,20})");
   // //var upper = new RegExp('[A-Z]');
   // var password1 = $('#jform_password1').val();
   // var password2 = $('#jform_password2').val();
   // if(password1 == password2){
   //   $('#jform_password2').removeClass('is-invalid');
   //   $('#jform_password2').addClass('is-valid');
   //   //return true;
   // }
   // else{
   //   $('#jform_password2').removeClass('is-valid');
   //   $('#jform_password2').addClass('is-invalid');
   //   //return false;
   // }
 }




 jQuery(document).ready(function($){

     var forms = $('#member-registration');
     // Loop over them and prevent submission
     var validation = Array.prototype.filter.call(forms, function(form) {

       form.addEventListener('submit', function(event) {
         if (form.checkValidity() === false) {
           event.preventDefault();
           event.stopPropagation();
         }

         form.classList.add('was-validated');
         // if(!validUsername()){
         //   event.preventDefault();
         //   event.stopPropagation();
         // }

       }, false);

     });

 })
