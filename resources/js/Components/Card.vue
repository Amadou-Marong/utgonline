<script setup>

</script>
<template>

    <div
        class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
      >
        <div
          class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500"
        >
        <slot name="icon"></slot>
          
        </div>
        <div>
          <p
            class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400"
          >
            <slot name="text"></slot>
          </p>
          <p
            class="text-lg font-semibold text-gray-700 dark:text-gray-200"
          >
            <slot name="value"></slot>
          </p>
        </div>
      </div>
      <!-- Card -->
</template>