<template>
  <div data-testid="todos-list"
    v-if="todoStore.todoList.length">
    <TodoItem v-for="it in todoStore.todoList"
      :key="it.id"
      :name="it.name"
      @confirm="finish(it.id)"
      btn="Done" />
  </div>
  <div class="flex rounded-md">
    <input data-testid="todo-text-to-add"
      type="text"
      class="border rounded-none rounded-l-md px-3 py-1.5 flex-1 focus:outline-none"
      placeholder="todo"
      v-model.trim="todo"
      @keyup.enter="add(todo,expireIn )" />
    <input data-testid="todo-expire-at"
      type="number"
      class="border rounded-none rounded-l-md px-3 py-1.5 flex-1 focus:outline-none"
      placeholder="seconds to expire"
      v-model="expireIn"
      @keyup.enter="add(todo, expireIn)" />
    <button data-testid="todo-add"
      class="border rounded-none rounded-r-md px-4 border-green-600 bg-green-600 text-white select-none"
      @click="add(todo, expireIn)">Add</button>
  </div>
</template>

<script lang="ts">
import { defineComponent, ref } from 'vue'
import TodoItem from '../components/TodoItem.vue'
import { addTodo, finish, todoStore } from '../store/todoStore'

export default defineComponent({
  components: { TodoItem },
  setup() {
    const todo = ref('');
    const expireIn = ref<number | ''>('');
    function add(_todo: string, _expireIn: number) {
      addTodo(_todo, _expireIn);
      todo.value = '';
      expireIn.value = '';
    }
    return {
      todo,
      expireIn,
      todoStore,
      addTodo,
      finish,
      add
    }
  }
})
</script>
