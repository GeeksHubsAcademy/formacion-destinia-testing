import { reactive } from 'vue'

interface Todo {
  id: number
  name: string
}

interface State {
  id: number;
  todoList: Todo[];
  doneList: Todo[];
}

const initialState: State = {
  id: 0,
  todoList: [],
  doneList: []
}

export const todoStore = reactive(loadStateFromLocalStorage())


function loadStateFromLocalStorage(): State {
  const state = localStorage.getItem('todoStore');
  console.log(state);
  if (state) {
    return JSON.parse(state)
  }
  return initialState;
}

function saveStateToLocalStorage(state: State) {
  console.log(state);
  localStorage.setItem('todoStore', JSON.stringify(state));
}

export const addTodo = (todo: string) => {
  if (todo.trim() !== '') {
    todoStore.id += 1
    todoStore.todoList.push({
      id: todoStore.id,
      name: todo
    });
    saveStateToLocalStorage(todoStore);


  }
}

export const finish = (id: number) => {
  const idx = todoStore.todoList.findIndex(it => it.id === id)
  if (idx !== -1) {
    todoStore.doneList.push({ ...todoStore.todoList[idx] })
    todoStore.todoList.splice(idx, 1);
    saveStateToLocalStorage(todoStore);
  }
}

export const remove = (id: number) => {
  const idx = todoStore.doneList.findIndex(it => it.id === id)
  if (idx !== -1) {
    todoStore.doneList.splice(idx, 1);
    if (todoStore.doneList.length === 0) {
      todoStore.id = 0
    }
    saveStateToLocalStorage(todoStore);
  }
}
