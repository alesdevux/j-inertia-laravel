<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Link } from '@inertiajs/inertia-vue3';
</script>
<script>
  export default {
    props: {
      notes: Array,
    },
    methods: {
      destroyNote($id) {
        if (confirm('Are you sure to delete this note?')) {
          this.$inertia.delete(this.route('notes.destroy', $id));
        }
      },
    },
    data() {
      return {
        search: '',
      };
    },
    watch: {
      // search() {
      //   this.$inertia.reload();
      // },
      search: function(value) {
        this.$inertia.replace(this.route('notes.index', { search: value }));
      },
    },
  }
</script>

<template>
  <AppLayout title="Notes">
    <template #header>
      <h2 class="text-xl font-semibold leading-tight text-gray-800">
        Notes
      </h2>
    </template>

    <div class="py-12">
      <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="md:grid md:grid-cols-3 md:gap-6">
          <div class="md-col-span-1">
            <div class="px-4 sm:px-0">
              <h3 class="text-lg text-gray-900">Notes list</h3>
              <p class="text-sm text-gray-600">
                Take the correct register of your notes and ejecut functions (delete, edit, etc)
              </p>
            </div>
          </div>
          <div class="p-4 mt-5 bg-white shadow md:col-span-2 md:mt-0 md:rounded-md">
            <div class="flex justify-between mb-4">
              <input type="text" class="rounded-md shadow-sm form-input" placeholder="Search..." v-model="search">
              <Link :href="route('notes.create')"
                class="px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700"
              >
                Create new note
              </Link>
            </div>
            <table>
              <tr v-for="note in notes">
                <td class="px-4 py-2 border">
                  {{ note.excerpt }}
                </td>
                <td class="px-4 py-2 border">
                  <Link :href="route('notes.show', note.id)">
                    View
                  </Link>
                </td>
                <td class="px-4 py-2 border">
                  <Link :href="route('notes.edit', note.id)">
                    Edit
                  </Link>
                </td>
                <td class="px-4 py-2 text-gray-600 border">
                  <button @click.prevent="destroyNote(note.id)">
                    Delete
                  </button>
                </td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>
  </AppLayout>
</template>
