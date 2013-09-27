/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function() {

  $("#addressForm").hide();
  
  
  $("#fullAddress").click(function() {
    $("#addressForm").slideToggle(300);
  });
  
  $("#addressButton").click(function() {
    $("#addressForm").slideToggle(300);
   });
  
  $("#grade").click(function(){
      $('#matricType').slideToggle(300);
  
});

});