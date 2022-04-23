<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
</script>
<script>
  export default {
    props: {
      notes: Array,
    }
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
            <table>
              <tr v-for="note in notes">
                <td class="px-4 py-2 border">
                  {{ note.excerpt }}
                </td>
                <td class="px-4 py-2 border">
                  <inertia-link :href="route('notes.show', note.id)">
                    Ver
                  </inertia-link>
                </td>
                <td class="px-4 py-2 border">
                  <inertia-link :href="route('notes.edit', note.id)">
                    Editar
                  </inertia-link>
                </td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>
  </AppLayout>
</template>
