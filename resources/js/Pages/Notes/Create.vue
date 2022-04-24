<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Link } from '@inertiajs/inertia-vue3';
</script>
<script>
  export default {
    data() {
      return {
        form: {
          excerpt: '',
          content: '',
        },
      };
    },
    methods: {
      storeNote() {
        this.$inertia.post(this.route('notes.store'), this.form);
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
              <h3 class="text-lg text-gray-900">Create note</h3>
              <p class="text-sm text-gray-600">
                After creating this note, you can edit it.
              </p>
            </div>
          </div>
          <form class="flex flex-col gap-4 p-4 mt-5 bg-white shadow md:col-span-2 md:mt-0 md:rounded-md"
            @submit.prevent="storeNote"
            @keydown.enter.prevent="storeNote"
          >
            <div>
              <label for="excerpt" class="block text-sm font-medium text-gray-700">
                Excerpt
              </label>
              <textarea name="excerpt"
                class="w-full rounded-md shadow-sm form-textarea"
                v-model="form.excerpt"
              >
              </textarea>
            </div>
            <div>
              <label for="content" class="block text-sm font-medium text-gray-700">
                Content
              </label>
              <textarea name="content"
                class="w-full rounded-md shadow-sm form-textarea"
                v-model="form.content"
              >
              </textarea>
            </div>
            <button class="px-4 py-2 font-bold text-white bg-blue-500 rounded-md hover:bg-blue-700">
              Create note
            </button>
          </form>
        </div>
      </div>
    </div>
  </AppLayout>
</template>
