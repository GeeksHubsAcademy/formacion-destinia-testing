import { reactive } from 'vue'

interface Todo {
  id: number
  name: string
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

export const addTodo = (todo: string) => {
  if (todo.trim() !== '') {
    todoStore.id += 1
    todoStore.todoList.push({
      id: todoStore.id,
      name: todo
    })
  }
  persistToLocalStorage();
}

export const finish = (id: number) => {
  const idx = todoStore.todoList.findIndex((it: Todo) => it.id === id)
  if (idx !== -1) {
    todoStore.doneList.push({ ...todoStore.todoList[idx] })
    todoStore.todoList.splice(idx, 1)
  }

}

export const remove = (id: number) => {
  const idx = todoStore.doneList.findIndex((it: Todo) => it.id === id)
  if (idx !== -1) {
    todoStore.doneList.splice(idx, 1)
    if (todoStore.doneList.length === 0) {
      todoStore.id = 0
    }
  }
}
