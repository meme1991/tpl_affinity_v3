/**
 * @Author: SPEDI srl
 * @Date:   25-02-2018
 * @Email:  sviluppo@spedi.it
 * @Last modified by:   SPEDI srl
 * @Last modified time: 25-02-2018
 * @License: GNU/GPL license: http://www.gnu.org/copyleft/gpl.html
 * @Copyright: Copyright (c) SPEDI srl
 */

 function validUsername(){
   // var num   = new RegExp('[a-zA-Z-_]+[0-9]+', 'i');
   // //var upper = new RegExp('[A-Z]');
   // var username = $('#jform_username').val();
   // if(num.test(username)){
   //   $('#jform_username').removeClass('is-invalid');
   //   $('#jform_username').addClass('is-valid');
   //   return true;
   // }
   // else{
   //   $('#jform_username').removeClass('is-valid');
   //   $('#jform_username').addClass('is-invalid');
   //   return false;
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
