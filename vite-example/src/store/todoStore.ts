import { reactive } from 'vue'

interface Todo {
  id: number
  name: string,
  willExpireAt: number
}

const PERSISTED_KEY = 'todosStore';
const emptyState = {
  id: 0,
  todoList: new Array<Todo>(),
  doneList: new Array<Todo>()
}
const persistedState = readFromLocalStorage();

function readFromLocalStorage() {
  const saved = localStorage.getItem(PERSISTED_KEY) || 'null'
  const state = JSON.parse(saved) || emptyState;

  return state;
}
function persistToLocalStorage() {
  localStorage.setItem(PERSISTED_KEY, JSON.stringify(todoStore))
}

export const todoStore = reactive(persistedState);
todoStore.todoList.forEach((todo: Todo) => removeItWhenItShould(todo));

export const addTodo = (todo: string, expireIn: number) => {
  if (todo.trim() !== '') {
    todoStore.id += 1;
    const willExpireAt = expireIn ? Date.now() + expireIn * 1000 : 0;
    const newTodo: Todo = {
      id: todoStore.id,
      name: todo,
      willExpireAt
    }
    todoStore.todoList.push(newTodo);
    if (willExpireAt) {
      removeItWhenItShould(newTodo);
    }
  }
  persistToLocalStorage();
}

function removeItWhenItShould(todo: Todo) {
  const now = Date.now();
  const delayUntilItExpires = todo.willExpireAt - now;

  if (delayUntilItExpires < 0) {
    todoStore.todoList = todoStore.todoList.filter((it: Todo) => it.id !== todo.id);
    todoStore.doneList.push(todo);
    persistToLocalStorage();

  } else {
    setTimeout(() => {
      removeItWhenItShould(todo);
    }, delayUntilItExpires);
  }



}

export const finish = (id: number) => {
  const idx = todoStore.todoList.findIndex((it: Todo) => it.id === id)
  if (idx !== -1) {
    todoStore.doneList.push({ ...todoStore.todoList[idx] })
    todoStore.todoList.splice(idx, 1)
  }
  persistToLocalStorage();

}


export const remove = (id: number) => {

  const confirmed = confirm('Are you sure?');
  if (!confirmed) {
    return;
  }

  const idx = todoStore.doneList.findIndex((it: Todo) => it.id === id)
  if (idx !== -1) {
    todoStore.doneList.splice(idx, 1)
    if (todoStore.doneList.length === 0) {
      todoStore.id = 0
    }
  }
  persistToLocalStorage();
}
