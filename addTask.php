<?php include "header.php" ?>

<form id="addTaskForm" action="#" method="post" onsubmit="return validateAddTaskForm()">
<div class="taskPriority">
    <div class="form-group-task">
        <input type="text" id="task" name="task" placeholder=" " />
        <label for="task">Tarefa*</label>
    </div>
    <div class="priority">
        <select id="priority" name="priority">
            <option value="baixa">Baixa</option>
            <option value="media">Média</option>
            <option value="alta">Alta</option>
        </select>
    </div>
</div>
<div class="taskDescription">    
    <div class="form-group-task description">
        <textarea id="taskDescription" name="taskDescription" rows="10" placeholder=" "></textarea> 
        <label class="labelDescription" for="taskDescription">Descrição</label>
    </div>
</div>
<div class="taskProjectResp">
    <div class="form-group-task">
        <input type="text" id="project" name="project" placeholder=" " />
        <label for="project">Projeto</label>
    </div>
    <div class="form-group-task">
        <input type="text" id="responsible" name="responsible" placeholder=" " />
        <label for="responsible">Responsável</label>
    </div>
</div>

<button type="submit">Entrar</button>
</form>

<?php include "footer.php" ?>