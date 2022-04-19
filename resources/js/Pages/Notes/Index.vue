<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
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
          <div class="px-4 sm:px-0">
            <h3 class="text-lg text-gray-900">Notes list</h3>
            <p class="text-sm text-gray-600">
              Take the correct register of your notes and ejecut functions (delete, edit, etc)
            </p>
          </div>
        </div>
      </div>
    </div>
  </AppLayout>
</template>
