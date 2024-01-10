<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Pagination from '@/Components/Pagination.vue';
import Swal from 'sweetalert2'
import { Head, Link, useForm } from '@inertiajs/vue3';
import DangerButton from '@/Components/DangerButton.vue';
// import PrimaryButton from '@/Components/PrimaryButton.vue';


const props = defineProps({

  questions: {
    // type: Array,
    type: Object,
    default: () => ({}),
  },
  answers: {
    type: Array,
   // type: Object,
    default: () => ({}),
  },

});

const form = useForm({});


function destroy(id) {
  // if (confirm("Are you sure you want to Delete")) {
  //     form.delete(route("courses.destroy", id));
  // }


  Swal.fire({
      title: "Are you sure?",
      text: "You won't be able to revert this!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Yes, delete it!"
    }).then((result) => {
      if (result.isConfirmed) {
        // form.delete(route("admin.exams.destroy", id));
        Swal.fire({
          title: "Deleted!",
          text: "Exam has been deleted.",
          icon: "success"
        });
      }
  });

}



</script>

<template>
  <Head title="Dashboard"/>

  <AuthenticatedLayout>
    <template #header>
      Questions Dashboard
    </template>

    <div class="p-4 bg-white rounded-lg shadow-xs">
      
      <div class="inline-flex overflow-hidden mb-4 w-full bg-white rounded-lg shadow-md">
        <div class="flex justify-center items-center w-12 bg-blue-500">
          <svg class="w-6 h-6 text-white fill-current" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM21.6667 28.3333H18.3334V25H21.6667V28.3333ZM21.6667 21.6666H18.3334V11.6666H21.6667V21.6666Z"></path>
          </svg>
        </div>
  
        <div class="px-4 py-2 -mx-3">
          <div class="mx-3">
            <span class="font-semibold text-blue-500">Questions Table</span>
            <p class="text-sm text-gray-600">Manage Questions Table</p>
          </div>
        </div>
      </div>
  
      <div class="overflow-hidden mb-8 w-full rounded-lg border shadow-xs">
        <div class="overflow-x-auto w-full">
  
          <div class="flex justify-end px-4 py-4">
            <Link 
              :href="route('lecturer.questions.create')"
              class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-500 active:bg-blue-700 focus:outline-none focus:border-blue-700 focus:ring focus:ring-blue-300 disabled:opacity-25 transition">
                  Add New Question
            </Link>
          </div>
          <table class="w-full whitespace-no-wrap">
            <thead>
            <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase bg-gray-50 border-b">
              <th class="px-4 py-3">Questions</th>
              <th class="px-4 py-3">Answer</th>
              <th class="px-4 py-3">Selected</th>
              <th class="px-4 py-3">Actions</th>
            </tr>
            </thead>
            <tbody class="bg-white divide-y">
             
            <!-- <tr class="text-gray-700" v-for="exam in exams" :key="exam.id"> -->
            <tr class="text-gray-700" >
              <!-- v-for="course in courses.data" :key="course.id" -->
              <td class="px-4 py-3 text-sm">
                Question
              </td>
              <td class="px-4 py-3 text-sm">
                Answer
              </td>
              <td class="px-4 py-3 text-sm">
                Seleted
              </td>
  
              <td class="px-6 py-3 text-sm">
                  <!-- <Link :href="route('courses.edit', course.id)"> -->

                  <!-- <Link :href="route('exams.edit', course.id)" class="inline-flex items-center px-4 py-2 bg-yellow-600 border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150"> -->
                  <Link
                  
                  class="inline-flex items-center px-4 py-2 bg-yellow-600 border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">
                    <svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512">
                    <path d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z"/></svg>
                  </Link>
                  <!-- <DangerButton @click="destroy(exam.id)"> -->
                  <DangerButton>
                    <svg xmlns="http://www.w3.org/2000/svg" height="16" width="14" viewBox="0 0 448 512">
                      <path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"/>
                    </svg>
                  </DangerButton>

              </td>
            
            </tr>
            </tbody>
          </table>
        </div>
        <div
            class="px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase bg-gray-50 border-t sm:grid-cols-9">
          <!-- <pagination :links="courses.links" /> -->
        </div>
      </div>

    </div>
  </AuthenticatedLayout>
</template>


