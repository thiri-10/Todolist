document.addEventListener('DOMContentLoaded',()=>{


  const checkboxes = document.querySelectorAll('.task-checkbox');
  const selectedTasks = [];

  checkboxes.forEach(checkbox =>{
      if (checkbox.checked) {
         selectedTasks.push(checkbox.getAttribute('data-task-id'));
      }
      checkbox.addEventListener('change',()=>{
       
           const taskId = checkbox.getAttribute('data-task-id');
           if(checkbox.checked){
                selectedTasks.push(taskId);
               

           }else{
              const Index = selectedTasks.indexOf(taskId);
              if(Index !== -1){
                selectedTasks.splice(Index,1);
              }
              
           }

        //    console.log('Selected Tasks',selectedTasks);
        const url = "/api/Task";
        const data = selectedTasks;
    
        fetch(url,{
          method : 'POST',
          header : {
              'Content-Type': 'application/json',
          },
          body: JSON.stringify(data),
      }).then(function (response) {
          if (response.ok) {
            return response.json();
          } else {
            throw new Error("Request failed.");
          }
        })
        .then(function (data) {
          console.log(data);
        })
        .catch(function (error) {
          
          console.error(error);
        });
    

      });
    });

    
    
});



 


