window.onload = function () {
  document.getElementById('new').addEventListener("click", promptNew);
  document.getElementById('ft_list').addEventListener('click', removeTodo);
  createInitialList();
}

function removeAll()
{
  var cookies = document.cookie.split(";");
  for (var i = 0; i < cookies.length; i++)
  removeCookie(cookies[i].split("="));
}

function createInitialList()
{
  if (document.cookie)
  {
    const todos = document.cookie.split(';');
    console.log(todos);
    for (var i = 0; i < todos.length; i++) {
      addTodo(todos[i]);
    }
  }
}

function promptNew()
{
  const todo = prompt();
  if (todo != null)
  {
    document.cookie = todo;
    addTodo(todo);
  }
}

function addTodo(todo)
{
  const newP = document.createElement("p");
  const newContent = document.createTextNode(todo);
  newP.appendChild(newContent);
  document.getElementById("ft_list").appendChild(newP);
}

function removeTodo(clickedElement)
{

  if (clickedElement.target && clickedElement.target.nodeName == "P") {
    removeCookie(clickedElement.target.innerHTML)
    clickedElement.target.parentNode.removeChild(clickedElement.target);
  }
}

function removeCookie(id)
{
    document.cookie = id + "=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
}
