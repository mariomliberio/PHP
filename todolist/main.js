$(function(){
  $(document).ready(function(){
      $.ajax({
          url: 'todo.json',
          type: 'GET',
          datatype: 'json',
          complete: function(awnser, status){
              let tasks = JSON.parse(awnser.responseText);
              displayTasks(tasks);
          } 
      })
  });
  
function addEventListenerOnTasks() {
    $('#list i').on('click', function(){
        let taskId = $(this).attr('id');
        $.ajax({
            url:'ajax.php',
            type: 'GET',
            data: 'id=' + taskId +'&action = update',
            success: function(awnser,status) {
                let tasks = JSON.parse(awnser);
                $('#todo, #done').text('');
                displayTasks(task['todolist']);
            }
        })
    })
};
function getValueAndSendIt() {
    let task = $('#task').val();
    $.ajax({
        url:'ajax.php',
        type: 'POST',
        data: $('#taskForm').serialize(),
        datatype: 'html',
        success: function(awnser, status) {
            let tasks = JSON.parse(awnser);
            if (tasks ['status']['code'] == 1000){ 
                $('#error').text(tasks['status']['message']);              
            } else {
                 $('#error').text('Error, ' + tasks['status']['code'] + ' : ' + tasks['status']['message']);
                 }
        $('#todo, #done').text('');
        displayTasks(tasks['todolist']);
        $('#task').val('');
                },
                error: function(result, status, error) {
               $('#error').text('Connection error');
                }
    });
};
function displayTasks(tasks){
    tasks.forEach(function(element) {
        if (element['complete'] == 0) {
            $('#todo').append('<div>'+ element['task'] + '</div>');
        } else if (element['complete'] == 1) {
            $('#done').append('<div>' + element['task'] + '</div>');
        } else {
            console.log('JSON file corrupted !');
        };
    });
  addEventListenerOnTasks();
}

function checkEntry() {
    document.getElementById('task').addEventListener('keyup', displayCharsAndRestrictAdd);
  };

  function addEventToPreventSubmit() {
    document.getElementById('taskForm').addEventListener('submit', preventSubmit);
  };

  function addRequestEventListener() {
document.getElementById('addTask').addEventListener('click', getValueAndSendIt);
};

checkEntry();
addEventToPreventSubmit();
addRequestEventListener();
})