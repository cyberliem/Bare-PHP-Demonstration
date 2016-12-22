function displayJSON( obj ){
  'use strict';
   // create variables, declared at the top of the function
   var retText = "<h2>Employees</h2>",
       employees = obj.company.employee,
       nEmployees = obj.company.employee.length,
       n, currentEmployee;
   // loop through the employees
   for (n = 0; n < nEmployees; n += 1) {
      // store the current employee for easy reference
      currentEmployee = employees[n];
      // add the employee info to the return variable
      retText += "<p>name: " +currentEmployee.name +
                   "<br/>id: " + currentEmployee.id +
                   ", gender: " + currentEmployee.gender +
                   ", age: " + currentEmployee.age +
                 "</p>";
   }
   // write the return text variable into the display element on the html page
   document.getElementById('display').innerHTML = retText;
}
