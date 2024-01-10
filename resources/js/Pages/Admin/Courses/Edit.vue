<template>
    <Head title="Dashboard"/>
  
    <AuthenticatedLayout>
      <template #header>
        Dashboard
  
        <div class="p-4 bg-white rounded-lg shadow-xs">
          Edit Course
        </div>
      
      </template>
      <div class="p-4 bg-white rounded-lg shadow-xs">
        
        <form @submit.prevent="submit">
          <div>
              <InputLabel for="name" value="name" />
  
              <input v-model="form.name" id="name" class="block mt-1 w-full" type="text" name="name" required autofocus autocomplete="name" />
          </div>
  
          <div class="flex mt-4">
              <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Update Course
              </PrimaryButton>
          </div>
      </form>
      
      </div>
  
    </AuthenticatedLayout>
  </template>
  
  <script setup>
  
    import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
    import Swal from 'sweetalert2';
    import PrimaryButton from '@/Components/PrimaryButton.vue';
    import InputLabel from '@/Components/InputLabel.vue';

    import { Head, useForm } from '@inertiajs/vue3';


    const props = defineProps({
      course: {
          type: Object,
          default: () => ({}),
      },
    });
  

    const form = useForm({
      name: props.course.name,
    });

    const submit = () => {
      form.patch(route("admin.courses.update", props.course.id));
    };
  
  
      // const submit = () => {
      //     // Handle form submission logic here
      //     // console.log('Form submitted');
      //     form.post(route('courses.store'), {
      //   // onFinish: () => form.reset('password', 'password_confirmation'),
      //     onError: () => Swal.fire({
      //                       title: "Error!",
      //                       text: "Something went wrong!",
      //                       icon: "error",
      //               }),
      //     });
      // };
  

  
  </script>
  

  
  <!-- </script> -->
  