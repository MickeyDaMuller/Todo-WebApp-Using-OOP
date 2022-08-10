<?php
namespace dbn;
use PDO;
use \dbn\DbConnect;
	include_once('classes/todoController.php');
	include_once('classes/todoView.php');

	if(isset($_POST['submit-todo'])){
		$todo = $_POST['todo'];

		$todoAdd = new TodoController();
		$todoAdd->addTodo($todo);
	}

	if(isset($_POST['completed'])){
		echo "completed";
	}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>php tut</title>
	<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script type="text/javascript">
		function complete(e){
			$.ajax({
			  type: "POST",
			  url: 'includes/completedTodo.php',
			  data: {
			  	id:e.id
			  },
			  success: function(response){
			  	alert(response);
			  	window.location.reload();
			  }
			});
		}
		
	</script>
</head>
<body>
	<h1 class="heading">Todos</h1>
	<form action="" method="post" id="todoForm">
		<input type="text" name="todo" placeholder="Enter your todo..." required/>
		<input type="submit" name="submit-todo" value="ADD" form="todoForm"/>
	</form>

	<!-- show todos -->
	<?php

		$todos = new TodoView();

		$allTodos = $todos->getTodos();

		foreach ($allTodos as $todo) {
			if($todo['completed'] == 'yes'){
	?>
			<div class="todo">
				
				<h1 style="text-decoration: line-through;">
					<input type="checkbox" checked disabled onclick="complete(this);" class="checkbox" id="<?php echo $todo['id']; ?>"/> 
					<?php echo $todo['title']; ?>
					<form action="includes/deleteTodo.php" method="post">
						<input type="hidden" name="id"  value="<?php echo $todo['id']; ?>"/>
						<input type="submit" name="deleteTodoSubmit" value="delete" />
					</form>
				</h1>
				
			</div>
	<?php

			}else{
			
	?>
			<div class="todo">
				
				<h1>
					<input type="checkbox" onclick="complete(this);" class="checkbox" id="<?php echo $todo['id']; ?>"/> 
					<?php echo $todo['title']; ?>
					<form action="includes/deleteTodo.php" method="post" >
						<input type="hidden" name="id"  value="<?php echo $todo['id']; ?>"/>
						<input type="submit" name="deleteTodoSubmit" value="delete" />
					</form>
				</h1>
				
			</div>
			

	<?php
			}
		}


	?>

</body>
</html>
