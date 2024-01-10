<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Pagination from '@/Components/Pagination.vue';
import Swal from 'sweetalert2'
import { Head, Link, useForm} from '@inertiajs/vue3';

// import {Link} from '@inertiajs/vue3'
import DangerButton from '@/Components/DangerButton.vue';


const props = defineProps({
  users: {
    // type: Array,
    type: Object,
    // default: () => ({}),
  }
  // roles:{
  //   type: Object,
  //   default: () => ({}),
  // },

});
const form = useForm({
  id: '',
});


const deleteUser = (id, name) => {
    const alert = Swal.mixin({
        buttonsStyling: true
    });
    alert.fire({
        title: 'Are you sure? ' + name + ' will be deleted!',
        icon: 'question', showCancelButton: true,
        confirmButtonText: '<i class="fa-solid fa-check"></i> Yes, delete it!',
        cancelButtonText: '<i class="fa-solid fa-ban"></i> Cancel',
    }).then((result) => {
        if (result.isConfirmed) {
            form.delete(route('users.destroy', id));
        }        
    });
}



//

</script>

<template>
  <Head title="Users"/>

  <AuthenticatedLayout>
  <template #header>
    Users
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
          <span class="font-semibold text-blue-500">Classes Table</span>
          <p class="text-sm text-gray-600">Manage Classes Table</p>
        </div>
      </div>
    </div>

    <div class="overflow-hidden mb-8 w-full rounded-lg border shadow-xs">
      <div class="overflow-x-auto w-full">

        <div class="flex justify-end px-4 py-4">
          <Link 
            :href="route('users.create')"
            class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-500 active:bg-blue-700 focus:outline-none focus:border-blue-700 focus:ring focus:ring-blue-300 disabled:opacity-25 transition">
                Add New User
          </Link>
        </div>

        <table class="w-full whitespace-no-wrap">
          <thead>
          <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase bg-gray-50 border-b">
            <th class="px-4 py-3">Name</th>
            <th class="px-4 py-3">Email</th>
            <th class="px-4 py-3">Role</th>
          </tr>
          </thead>
          <tbody class="bg-white divide-y">
         
          </tbody>
        </table>
      </div>
      <div
          class="px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase bg-gray-50 border-t sm:grid-cols-9">
        <pagination :links="users.links" />
      </div>
    </div>
  </div>
  </AuthenticatedLayout>
</template>

